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
            "mobile"=>input("username"),
            "password"=>input("password"),
        ];
        //如果"username"是字符
        //验证用户
        //$info=db("member")->where(array("username"=>$data["username"]))->find();
      //dump($data);exit;
//        if(!isset($info)||empty($info)){
//            return $this->error("用户名或密码错误",url("Login/index"));
//        }
//        //判断密码
//        if($info["password"]!=md5($data["password"])){
//            return $this->error("用户名或密码错误",url("Login/index"));
//        }
//        //登录成功,信息存入session
//        session("admin",$info);
//        return $this->success("登录成功",url("Index/index"));

        //如果"username"是电话号码
        if(preg_match('/^1[34578]\d{9}$/',$data["mobile"])){
            //符合电话号码就查询信息
            $info=db("member")->where(array("mobile"=>$data["mobile"]))->find();
            echo db("member")->getLastSql();exit;
            //dump($info);exit;
//
        }else{
            return $this->error("请输入正确的手机号码",url("Login/index"));
        }
        //如果"username"是链接

    }


}
