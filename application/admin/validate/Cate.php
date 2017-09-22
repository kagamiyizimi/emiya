<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21 0021
 * Time: 16:40
 */
namespace app\admin\vadata;

use think\Validate;

class Cate extends Validate {
    protected $rule=[
        'name'=>'require|unique:cate'
    ];
    protected $message=[
        'name.require'=>'分类名不能为空',
        'name.unique'=>'分裂名必须唯一'
    ];
    protected $scence=[
        'add'=>['name'],
        'edit'=>['name']
    ];
}
?>