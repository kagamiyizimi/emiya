<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/4
 * Time: 16:04
 */
namespace app\index\controller;
use app\index\model\Goods;
class Item extends Base{

    public function index(){
        //cookie('cart',null);
        //$cookie = unserialize(cookie('cart'));
        //dump($cookie);exit;
        $goods_id = input('goods_id');
        $data = Goods::goodsItem($goods_id);
        $this->assign('data',$data);
        return $this->fetch();
    }
}