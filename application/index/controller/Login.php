<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25 0025
 * Time: 15:14
 */
namespace app\index\controller;

use think\Controller;

class Login extends Controller{
    public function index(){
        return $this->fetch('login/login');
    }
}
?>