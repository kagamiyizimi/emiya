<?php
namespace app\admin\controller;

use think\Controller;
class Base extends Controller{
    public function __construct(){
        parent::__construct();
        $admin=session("admin");
        if(!empty($admin)||!isset($admin)){
            return $this->error("请先登录。。。",url("Login/index"));
        }
    }
}