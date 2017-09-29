<?php
namespace app\admin\controller;
use app\admin\model\Image as ImageModel;
use app\admin\model\Goods;
use phpDocumentor\Reflection\Types\Array_;

class Image extends Base{
    //加载所有商品的所有的图片
    public function index(){
        $data=ImageModel::imageInfo();
        $this->assign('data',$data);
        return $this->fetch('list');
    }
    //添加图片
    public function add(){
        if (request()->isPost()){
//             $data=Goods::message();
//             $data=$data->all();
//             foreach ($data as $k=>$v){
//                 if ($v['goods_id']==input('goods_id')){
//                     $imageData=[
//                         'goods_name'=>$v['goods_name'],
//                     ];
//                 }
//             }
            $imageData['goods_id']=input('goods_id');
            //判断是否有选择商品
            if (!$imageData['goods_id']){
                return $this->error('请选择商品');
            }
            //当要加入的图片选为封面时判断
            if (input('is_face') == 'on') {
                $imageData['is_face'] = 1;
                //把该商品其他图片的is_face改为0非封面
                $res=ImageModel::changeGoodsPicFace( $imageData['goods_id']);
            } else {
                $imageData['is_face'] = 0;
            }
            //判断是否有上传图片
            if ($_FILES['image_url']['tmp_name'] != '') {
                //上传图片
                $arr = ImageModel::uploadPic('image_url');
                if ($arr['status'] == 'success') {
                    $imageData['image_url'] = $arr['url'];
                } else {
                    return $this->error($arr['msg']);
                }
            }
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
        //通过get访问的
        $goodsData=Goods::getAllGoods();
        $this->assign('goodsData',$goodsData);
        return $this->fetch();
    }
    //根据商品id，加载该商品的图片
    public function goodsPicList(){
        $id=input('id');
        $goods_name=input('goods_name');
        //传入商品id，获取商品所有图片
        $data=ImageModel::goodsImageInfo($id);
        $this->assign([
            'goods_id'=>$id,
            'data'=>$data,
            'goods_name'=>$goods_name,
        ]);
        return $this->fetch();
    }
    //更改图片封面
    public function isFace(){
        $image_id=input('image_id');
        $goods_id=input('goods_id');
        //把该商品其他图片的is_face改为0非封面
        $res1=ImageModel::changeGoodsPicFace($goods_id);
        //把该图片的is_face改为1封面
        $res2=ImageModel::changePicFace($image_id);
        $data=ImageModel::imageInfo();
        $this->assign('data',$data);
        return $this->fetch('list');
    }
    //通过商品id给商品添加图片
    public function addGoodsPic(){
        if (request()->isPost()){
            $imageData['goods_id'] = input('goods_id');
            $arr1=[
                'goods_id'=>input('goods_id')
            ];
            $goods_name=ImageModel::getGoodsName($arr1);
            if (input('is_face') == 'on') {
                $imageData['is_face'] = 1;
                //把该商品其他图片的is_face改为0非封面
                $res=ImageModel::changeGoodsPicFace( $imageData['goods_id']);
            } else {
                $imageData['is_face'] = 0;
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
                return $this->error('没有上传图片');
            }
            $imageData['image_b_url'] = ImageModel::thumb($imageData['image_url'], $width = 650, $height = 650);
            $imageData['image_m_url'] = ImageModel::thumb($imageData['image_url'], $width = 240, $height = 240);
            $imageData['image_s_url'] = ImageModel::thumb($imageData['image_url'], $width = 120, $height = 120);
            $res = ImageModel::addImage($imageData);
            if ($res) {
                return $this->success('添加成功', url('Image/goodsPicList',array('id'=>$imageData['goods_id'],'goods_name'=>$goods_name['goods_name'])));
            } else {
                return $this->error('添加失败');
            }
        }
        //通过get访问的
        $goods_id=input('goods_id');
        $goods_name=input('goods_name');
        $goodsData=Goods::index();
        $this->assign([
            'goods_id'=>$goods_id,
            'goods_name'=>$goods_name,
            'goodsData'=>$goodsData['data'],
        ]);
        return $this->fetch();
    }
    //删除图片
    public function del(){
        {//可以在参数列表填参，接收url传过来的参数del（$id）
            $image_id = input('image_id');//接收url传过来的id
            $is_face=input('is_face');
            if ($is_face == 1) {
                return $this->error('封面不能删除');
            }
            //传入image的id，删除图片
            $res=ImageModel::delImage($image_id);
            if ($res) {
                return $this->success('删除成功！');
            } else {
                return $this->error('删除失败！');
            }
        }
    }
}