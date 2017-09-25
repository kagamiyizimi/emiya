<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 19:00
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
class Member extends Controller{
    //会员主页
    public function index(){
        $data=Db::name("member")->paginate(10);
        //分配到模板
        $this->assign("data",$data);
        return $this->fetch();
    }

    //添加列表
    public function memberAdd(){
        //判断传输方式
        if(request()->isPost()){
            $data=[
                "username"=>input("username"),
                "password"=>input("password"),
                "mobile"=>input("moblie"),
                "email"=>input("email"),
                "reg_time"=>input("reg_time"),
                "ip"=>input("ip"),
                "login_count"=>input("login_count"),
                "login_time"=>input("login_time"),
                "pic"=>input("pic"),
            ];
            $data["password"]=md5($data["password"]);
           dump($data);exit;
            //保存数据
            $res=Db::name("member")->insert($data);
            if($res){
                return $this->success("添加成功",url("Member/index"));
            }else{
                return $this->error("添加失败");
            }
        }
        return $this->fetch();
    }

}