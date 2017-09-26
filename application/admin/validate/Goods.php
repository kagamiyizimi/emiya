<?php
namespace app\admin\validate;

use think\Validate;

class Goods extends Validate {
    protected $rule=[
        'goods_name'=>'require',
        'cate_id'=>'require',
        'keywords'=>'require',
        'sell_price'=>'require',
        'market_price'=>'require',
        'store'=>'require',
        'freez'=>'require',
        'maketable'=>'require',
    ];
    protected $message=[
        'goods_name.require'=>'商品名不能为空',
        'cate_id.require'=>'分类名不能为空',
        'keywords.require'=>'关键词不能为空',
        'sell_price.require'=>'销售价格不能为空',
        'market_price.require'=>'市场价格不能为空',
        'store.require'=>'库存不能为空',
        'freez.require'=>'冷藏库存不能为空',
        'maketable.require'=>'商品上下架状态不能为空',
    ];
    protected $scence=[
        'add'=>['goods_name','cate_id','keywords','sell_price','market_price','store','freez','maketable'],
        'edit'=>['goods_name','cate_id','keywords','sell_price','market_price','store','freez','maketable']
    ];
}