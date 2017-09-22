<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20 0020
 * Time: 18:43
 */
namespace app\admin\widget;

use think\Controller;

class Widget extends Controller{
    public function header(){
        return $this->fetch('widget/header');
    }
    public function left(){
        return $this->fetch('widget/left');
    }
    public function footer(){
        return $this->fetch('widget/footer');
    }
}
?>