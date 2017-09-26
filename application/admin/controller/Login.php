<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/23
 * Time: 11:13
 */
namespace app\admin\controller;

use think\Controller;

class Login extends Controller{
    //加载到登录页面
    public function index(){
        return $this->fetch("Login/login");
    }
    //执行登录
    public function goLogin(){
        $data=[
            "username"=>input("username"),
            "password"=>input("password"),
            "code"=>input("code")
        ];
       //验证
        if(!$data["username"]){
           return $this->error("用户名不能为空");
        }
        if(!$data["password"]){
            return $this->error("密码不能为空");
        }
        if(!$data["code"]){
            return $this->error("验证码不能为空");
        }
        //验证码验证
        if(!captcha_check($data["code"])){
            //dump(!captcha_check($data["code"]));exit;
            return $this->error("验证码错误",url("Login/index"));
        }
        //验证用户
        $info=db("manager")->where(array("username"=>$data["username"]))->find();
        if(!isset($info)||empty($info)){
            return $this->error("用户名或密码错误",url("Login/index"));
        }
        //判断密码
        if($info["password"]!=md5($data["password"])){
            return $this->error("用户名或密码错误",url("Login/index"));
        }
        //登录成功,信息存入session
        session("admin",$info);
        return $this->success("登录成功",url("Index/index"));

    }



}
