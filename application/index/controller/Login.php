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

    //登录界面
    public function index(){
        return $this->fetch("login");
    }
    //执行登录
    public function goLogin(){
        $data=[
            "username"=>input("usermane"),
        ];
    }

}
