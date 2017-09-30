<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/4
 * Time: 16:14
 */

namespace app\index\controller;
use app\index\model\Goods;
class Cart extends Base{

    /*
     * 购物车页面
     */
    public function index(){
        //cookie('cart',null);
        //判断是否登录
        $login = $this->isLogin();
        if($login){
            //已登录
            //直接查表，返回二维数组
            $data = Goods::goodsByMemberId($login['member_id']);
        }else{
            //未登录
            $data = cookie('cart');
            $data = unserialize($data);

        }
        //如果商品数据不为空
        if(!empty($data)){
            //通过二维数据把goods_id拿出来    1,2
            $goods_ids = '';
            foreach($data as $key=>$val){
                $goods_ids .= $val['goods_id'].',';
            }
            $goods_ids = rtrim($goods_ids,',');
            $arr = Goods::goodsItems($goods_ids);
            foreach ($arr as $key=>$val){
                foreach ($data as $k=>$v){
                    if($val['goods_id'] == $v['goods_id']){
                        //把数量放到$arr里面
                        $arr[$key]['goods_num'] = $v['goods_num'];
                    }
                }
            }

            //总计
            $total = '';

            foreach ($arr as $k=>$v){
                $total += $v['sell_price']*$v['goods_num'];
            }
            $data = [
                'total'=>$total,
                'data'=>$arr,
            ];
        }
        $data = $data?$data:[];
        $this->assign('data',$data);
        return $this->fetch();
    }

    /*
     *
     * 结算页面
     */
    public function checkout(){
        //判断是否登录
        $login = $this->isLogin();
        //未登录用户，不能来这里
        if(!$login){
            //下次要跳转的页面
            $next_url = 'Cart/checkout';
            session('next_url',$next_url);
            return $this->redirect('Login/login');
        }
        //没有选中的商品的也不能来这里,直接跳到购物车
        $data = Goods::seletedGoods($login['member_id']);
        if(empty($data) || !$data){
            return $this->redirect('Cart/index');
        }
        return $this->fetch();
    }

    /**
     *
     * 加入购物车 --项目组 x0315
     */

    public function add(){
        $data = [
            'goods_id'=>input('goods_id'),
            'goods_num'=>input('goods_num'),
        ];

        //判断会员是否登录
        $login = $this->isLogin();
        if($login){
            //登录状态--直接添加到数据表cart
            //先查出cart表中的数据
            $res = Goods::goodsByMemberId($login['member_id']);
            $arr = [];
            foreach ($res as $key=>$val){
                $arr[$val['goods_id']] = $val;
            }
            if(array_key_exists($data['goods_id'],$arr)){
                //重复添加--更新数据 update
                $arr[$data['goods_id']]['goods_num'] += $data['goods_num'];
                db('cart')->update($arr[$data['goods_id']]);
            }else{
                //新加数据--insert
                $data['member_id'] = $login['member_id'];
                db('cart')->insert($data);
            }
        }else{
            //未登录状态
            $cart = cookie('cart');
            if(!$cart){
                // cookie里面没商品
                $arr[$data['goods_id']] = $data;
                cookie('cart',serialize($arr));
            }else{
                //cookie里面有商品--返回一个二维数组
                $cart = unserialize($cart);
                //购物车已经有的商品，累加数量
                if(array_key_exists($data['goods_id'],$cart)){
                    $cart[$data['goods_id']]['goods_num'] += $data['goods_num'];
                }else{
                    //给cart数组，增加元素
                    $cart[$data['goods_id']] = $data;
                }


                //存到cookie里面
                cookie('cart',serialize($cart));
            }

        }
        $res = [
            'status'=>'success',
            'msg'=>'添加购物车成功',
        ];
        return json($res);
    }


    /**
     *
     * 加入购物车--项目组 all
     */

    public function addCart(){
        $goods_id = input('goods_id');
        $goods_num =input('goods_num');
        //判断是否是登录状态
        $login = $this->isLogin();
        if($login){
            //登录状态
        }else{
            //先判断cookie里面有没有商品数据
            $cookie = cookie('cart');
            //未登录状态
            $data = [
                'goods_id'=>$goods_id,
                'goods_num'=>$goods_num,
                'selected'=>1,//默认选中
            ];
            if($cookie){
                $cart = unserialize($cookie);
                //cookie里面有没有现在添加的商品数据
                //foreach 可以
                if(array_key_exists($goods_id,$cart)){
                    //cookie存在该商品
                    //商品数量累加
                    $cart[$goods_id]['goods_num'] += $data['goods_num'];
                    $cart = serialize($cart);
                    cookie('cart',$cart);
                }else{
                    //cookie里面不存在该商品
                    $cart[$goods_id] = $data;
                    $cart = serialize($cart);
                    cookie('cart',$cart);
                }
            }else{
                $arr[$goods_id] = $data;
                $cart = serialize($arr);
                cookie('cart',$cart);
            }
            $respons = [
                'status'=>'success',
                'msg'=>'添加成功'
            ];
           /* echo json_encode($respons);
            exit;*/
           return json($respons);
        }
    }


    /**
     *
     * 加入购物车
     * x1726
     */

    public function x1726Cart() {
        $goods_id = input('goods_id');
        $goods_num = input('goods_num');
        //判断是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin){
            //未登录
            //先说去cookie里面的商品数据
            $cart = unserialize(cookie('cart'));
            //判断cookie里面有没有商品
            if(empty($cart)){
                //cookie里面没有商品
                $data[$goods_id] = [
                    'goods_id'=>$goods_id,
                    'goods_num'=>$goods_num,
                    'selected'=>1
                ];
                //序列化成字符串存在cookie里面
                cookie('cart',serialize($data));
            }else{
                //cookie里面有商品
                //先判断新加的商品数据  cookie里面有没有
                if(array_key_exists($goods_id,$cart)){
                    //如果cookie里面有该商品，直接 累加数量
                    //$cart[$goods_id]['goods_num'] += $goods_num;
                    $cart[$goods_id]['goods_num'] = $cart[$goods_id]['goods_num'] + $goods_num;
                }else{
                    //如果cookie里面没有该商品，把该商品加到cookie里面
                    $cart[$goods_id] = [
                        'goods_id'=>$goods_id,
                        'goods_num'=>$goods_num,
                        'selected'=>1
                    ];
                }
                //添加到cookie里面
                cookie('cart',serialize($cart));
            }
        }else{
            //已登录
            //先根据member_id查出该用户所有所购物车的商品数据
            $cartData = db('cart')->where(['member_id'=>$isLogin['member_id']])->select();
            //判断这个人购物车表有没有商品数据
            if(empty($cartData)){
                //购物车表没有数据
                $arr = [
                    'goods_id'=>$goods_id,
                    'goods_num'=>$goods_num,
                    'selected'=>1,
                    'member_id'=>$isLogin['member_id']
                ];
                db('cart')->insert($arr);
            }else{
                //购物车表有数据
                //先判断 提交过来的商品数据，购物车表有没有该商品数据
                foreach ($cartData as $key=>$val){
                    //把二维数组中的键  换成goods_id
                    $cartData[$val['goods_id']] = $val;
                }

                if(array_key_exists($goods_id,$cartData)){
                    //购物车表有该商品-- 累加数量
                    $cartData[$goods_id]['goods_num'] += $goods_num;
                    //update
                    db('cart')->update($cartData[$goods_id]);
                }else{
                    //购物车表没有该商品 -- 添加到购物车表
                    //insert
                    db('cart')->insert([
                        'goods_id'=>$goods_id,
                        'goods_num'=>$goods_num,
                        'selected'=>1,
                        'member_id'=>$isLogin['member_id']
                    ]);
                }
            }
        }

        //返回结果
        return json(
            [
                'status'=>'success',
                'msg'=>'添加成功'
            ]
        );
    }
}