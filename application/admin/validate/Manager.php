<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/23
 * Time: 10:25
 */
namespace app\admin\validate;

use think\Validate;

class Manager extends Validate{
    protected $rule=[
        'username'=>'require|unique:manager',
        'password'=>'require'
    ];
    protected $message=[
        'username.unique'=>'用户名必须唯一',
        'username.require'=>'用户名不能为空',
        'password.require'=>'密码不能为空'
    ];
    protected $scence=[
        'add'=>['username','password'],
        'edit'=>['username'],
        'saveEdit'=>['username']
    ];

}