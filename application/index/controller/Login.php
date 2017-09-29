<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25
 * Time: 14:40
 */
namespace app\index\controller;

use think\Controller;

class Login extends Controller{

//    //登录界面
    public function index(){
        return $this->fetch("login");
    }
//    //执行登录
    public function doLogin(){
        //传入数据
        $data=[
            "username"=>input("username"),
            "password"=>input("password"),
        ];
        //验证用户
        $user=db('member')->where(array('username'=>$data['username']))->find();
//      如果用户名是电话号码的话，执行登录。
        if(preg_match('/^1[34578]\d{9}$/',$data["username"])) {
            //在数据库中查询该号码
            $num=db("member")->where(array('mobile'=>$data['username']))->find();
            //通过电话号码查询该用户名
            $user=db('member')->where(array('mobile'=>$num['mobile']))->find();
            if($data['username']!=$num['mobile']){
                return $this->error("请输入正确的手机号码");
            }
        }
        //如果"username"是字符 用户名登录
        else if(!$user){
            return $this->error("账号名或者密码错误");
        }
        //将用户名存在session中
        session("admin",$user);
        return $this->success("登录成功",url("Index/index"));
    }


}
