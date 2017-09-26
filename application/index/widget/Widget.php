<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 14:40
 */
namespace app\index\Widget;

use think\Controller;

class Widget extends Controller{
    public function header(){
//        查询所有分类
         $catePid_1=db('cate')->where('pid',1)->select();
        $catePid_2=db('cate')->where('pid',2)->select();
        $catePid_3=db('cate')->where('pid',3)->select();
        $catePid_4=db('cate')->where('pid',4)->select();
        $catePid_5=db('cate')->where('pid',5)->select();
        $catePid_6=db('cate')->where('pid',6)->select();
        $catePid_7=db('cate')->where('pid',7)->select();
        $catePid_8=db('cate')->where('pid',8)->select();
        $catePid_9=db('cate')->where('pid',9)->select();
        $catePid_10=db('cate')->where('pid',10)->select();

         $this->assign([
             'catePid_1'=>$catePid_1,
             'catePid_2'=>$catePid_2,
             'catePid_3'=>$catePid_3,
             'catePid_4'=>$catePid_4,
             'catePid_5'=>$catePid_5,
             'catePid_6'=>$catePid_6,
             'catePid_7'=>$catePid_7,
             'catePid_8'=>$catePid_8,
             'catePid_9'=>$catePid_9,
             'catePid_10'=>$catePid_10,
         ]);
        return $this->fetch("widget/header");
    }
    public function footer(){
        return $this->fetch("widget/footer");
    }
}