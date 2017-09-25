<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 14:59
 */
namespace app\admin\controller;

use think\Controller;

class Index extends Controller{
    public function index(){
        return $this->fetch();
    }

    //退出登录
    public function outLogin(){
        session("admin",null);
        return $this->redirect("Login/index");
    }
}
