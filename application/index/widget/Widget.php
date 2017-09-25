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
        return $this->fetch("widget/header");
    }
    public function footer(){
        return $this->fetch("widget/footer");
    }
}