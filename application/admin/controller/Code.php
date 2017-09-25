<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/23
 * Time: 15:28
 */
namespace app\admin\controller;
use think\captcha\Captcha;
use think\Controller;

class Code extends Controller {
    //生成验证码
    public function makeCode(){
        $captcha=new Captcha();
        $captcha->entry();
        dump($captcha);
    }
}