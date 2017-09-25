<?php
namespace app\admin\controller;

use app\admin\model\Goods as GoodsModel;
use think\Db;
class Goods extends Base
{
    public function index()

    {
        $data=Db::name('goods')->select();
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
            $data = [
                'goods_name' => input('goods_name'),
                'desc' => input('desc'),
                'keywords' => input('keywords'),
                'content' =>input('content'),
                'sell_price' => input('sell_price'),
                'market_price' => input('market_price'),
                'store' => input('store'),
                'freez' => input('freez'),
                'create_time' => time(),
            ];


            $res = Db::name('goods')->insert($data);
        }


        return $this->fetch();

    }
}