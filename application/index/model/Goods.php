<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 9:11
 */

namespace app\index\model;
use think\Model;

class Goods extends Model{


    /**
     * 获得所有商品的数据
     *
     */

    static public function getGoods(){
        $data = db('goods')
            ->alias('g')
            ->field('g.*,i.image_m_url')
            ->join('image i','g.goods_id = i.goods_id','left')
            ->where(['i.is_face'=>1,'g.maketable'=>1,'g.recycle'=>0])
            ->select();

        //echo db()->getLastSql();exit;
        return $data;
    }


    /**
     * 通过 goods_id查询商品数据
     */

    static public function goodsItem($goods_id){
        $data = db('goods')
            ->alias('g')
            ->field('g.*,i.*')
            ->join('image i','g.goods_id = i.goods_id','left')
            ->where(['g.goods_id'=>$goods_id,'g.maketable'=>1,'g.recycle'=>0])
            ->select();
//        echo db()->getLastSql();exit;
        return $data;
    }


    /**
     *
     * 通过商品 goods_ids 查询商品数据
     */

    static public function goodsItems($goods_ids){
        $data = db('goods')
            ->alias('g')
            ->field('g.*,i.image_s_url')
            ->join('image i','g.goods_id = i.goods_id','left')
            ->where('g.goods_id','in',$goods_ids)
            ->where(['i.is_face'=>1,'g.maketable'=>1,'g.recycle'=>0])
            ->select();
        //echo db()->getLastSql();exit;
        return $data;
    }

    /**
     *
     * 根据member_id 查询选中的商品 cart 表
     */

    static public function seletedGoods($member_id){
        $data = db('cart')->where(['member_id'=>$member_id,'selected'=>1])->select();
        return $data??false;
    }

    /**
     * 根据member_id 查询给会员自己所有的商品
     *
     */

    static public function goodsByMemberId($member_id){
        $data = db('cart')->where(['member_id'=>$member_id])->select();
        return $data??false;
    }
}