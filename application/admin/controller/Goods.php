<?php
namespace app\admin\controller;

use app\admin\model\Goods as GoodsModel;
use think\Db;
class Goods extends Base
{
    public function index()

    {
        $data=db('goods')
            ->alias('a')
            ->field('a.goods_id,a.goods_name,a.sell_price,a.market_price,a.store,a.freez,a.create_time,a.keywords,a.desc,a.last_modify,a.last_modify_id,a.maketable,a.last_modify_id,a.cate_id,c.name,d.username')
            ->join('cate c','a.cate_id=c.cate_id','left')
            ->join('manager d','d.manager_id = a.last_modify_id','left')
            ->paginate(6);
//        echo db('goods')->getLastSql();exit();
//
        $this->assign('data',$data);

        return $this->fetch('list');
    }

//    添加商品
    public function add()
    {
        $cateData=db('cate')->select();
        $this->assign('cateData',$cateData);
        //模型遍历分类表数据
        if (request()->isPost()) {
            //定义数组要添加商品的数据
//            $id=input('manager_id');
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
//                'last_modify_id'=>$id,
                'create_time' => time(),
                'last_modify'=>time(),
            ];
            $data['maketable']=input('maketable');
            if(input("maketable")=="on"){
                $data["maketable"]="1";
            }else{
                $data["maketable"]="0";
            }
//            dump($data);exit();
            //验证器验证
            $validate = \think\Loader::validate('Goods');   //助手函数
            if(!$validate->scene('add')->check($data)){

                return $this->error($validate->getError());
            }

            $res= Db::name('goods')->insert($data);
            if ($res) {
                return $this->success("添加成功", url("Goods/index"));
            } else {
                return $this->error("添加失败");
            }
        }
        return $this->fetch();
    }
//编辑商品
    public function edit(){
        $cateData=db('cate')->select();
        $this->assign('cateData',$cateData);
        $id=input('id');
//        返回结果是一个一维数组
        $data=Db::name('goods')->find($id);
        $this->assign('data',$data);
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