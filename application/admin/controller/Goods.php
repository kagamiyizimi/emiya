<?php
namespace app\admin\controller;

use app\admin\model\Goods as GoodsModel;
use app\admin\model\Image as ImageModel;
use think\Db;
class Goods extends Base
{
    public function index()

    {

//        查询数据
        $data=Db::table('goods')
            ->alias('a')
            ->join('manager m','m.manager_id = a.last_modify_id','left')
            ->join('image i','a.goods_id = i.goods_id','left')
            ->join('cate c','c.cate_id = a.cate_id','left')
            ->field('m.username,c.name,i.image_s_url,a.*')
            ->order('a.goods_id asc')
//            ->where(['i.is_face'=>1])
            ->paginate(6);
//        echo db('goods')->getLastSql();exit();
//
        $this->assign('data',$data);

        return $this->fetch('list');
    }

//    添加商品
    public function add()
    {
        $cateData=db('cate')->where('pid',0)->select();
        $this->assign('cateData',$cateData);
//        $imageData=db('image')->select();
//        $this->assign('imageData',$imageData);
        //模型遍历分类表数据
        if (request()->isPost()) {

            $data = [
                'goods_name' => input('goods_name'),
                'desc' => input('desc'),
                'keywords' => input('keywords'),
                'content' =>input('content'),
                'sell_price' => input('sell_price'),
                'market_price' => input('market_price'),
                'store' => input('store'),
                'freez' => input('freez'),
                'cate_id'=>input('cate_id'),
//                'last_modify_id'=>$Request.session.manager.manager_id,
                'create_time' => time(),
                'last_modify'=>time(),
            ];
            $data['maketable']=input('maketable');
            if(input("maketable")=="on"){
                $data["maketable"]="1";
            }else{
                $data["maketable"]="0";
            }
            //验证器验证
            $validate = \think\Loader::validate('Goods');   //助手函数
            if(!$validate->scene('add')->check($data)){

                return $this->error($validate->getError());
            }
            if ($_FILES['image_url']['tmp_name'] != '') {
                //上传图片
                $arr = ImageModel::uploadPic('image_url');
                if ($arr['status'] == 'success') {
                    $imageData['image_url'] = $arr['url'];
                } else {
                    return $this->error($arr['msg']);
                }
            }else{
                return $this->error('未选择图片');
            }
            //把商品信息加入数据库，返回id
            $goods_id = GoodsModel::addGoods($data);
            if (!$goods_id) {
                $this->error('添加失败');
            }
            $imageData['goods_id'] = $goods_id;
            $imageData['is_face'] = 1;
            $imageData['image_b_url'] = ImageModel::thumb($imageData['image_url'], $width = 650, $height = 650);
            $imageData['image_m_url'] = ImageModel::thumb($imageData['image_url'], $width = 240, $height = 240);
            $imageData['image_s_url'] = ImageModel::thumb($imageData['image_url'], $width = 120, $height = 120);
            $res = ImageModel::addImage($imageData);
            if ($res) {
                return $this->success('添加成功', url('Goods/index'));
            } else {
                return $this->error('添加失败');
            }


        }
        return $this->fetch();
    }


//编辑商品
    public function edit(){
        $id=input('id');
//        返回结果是一个一维数组
        $data=Db::name('goods')->find($id);
        $this->assign('data',$data);

        $cateData=db('cate')->where('pid',0)->select();
        $this->assign('cateData',$cateData);

        return $this->fetch();
    }
//    执行编辑
     public function upd(){
         //session里面的manager_id 用来做更新人
//         $id=input('manager_id');
         //定义一个数组：商品要添加的数据
         $data=[
             'goods_id'=>input('goods_id'),
             'goods_name'=>input('goods_name'),
             'desc'=>input('desc'),
             'keywords'=>input('keywords'),
             'content'=>input('content'),
             'sell_price'=>input('sell_price'),
             'market_price'=>input('market_price'),
             'store'=>input('store'),
             'freez'=>input('freez'),
             'cate_id'=>input('cate_id'),
//             'last_modify_id'=>$id,
             'create_time' => time(),
             'last_modify'=>time(),
         ];
         $data['maketable']=input('maketable');
         if(input("maketable")=="on"){
             $data["maketable"]="1";
         }else{
             $data["maketable"]="0";
         }
         $validate = \think\Loader::validate('Goods');   //助手函数
         if(!$validate->scene('edit')->check($data)){

             return $this->error($validate->getError());
         }
         //更新商品数据
         $updateGoods=db('goods')->update($data);
         if ($updateGoods ){
             return $this->success('修改成功',url('Goods/index'));
         }else{
             return $this->error('修改失败');
         }

     }
    //删除
    public function del(){
        $id=input("id");
        $res=Db::name("goods")->delete($id);
        if($res){
            return $this->success("删除成功",url("Goods/index"));
        }else{
            return $this->error("删除失败");
        }
    }


}