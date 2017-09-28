<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/23
 * Time: 10:25
 */
namespace app\index\validate;

use think\Validate;

class Reg extends Validate{
    protected $rule=[
        'mobile'=>'require|max:11|unique:member',
        'password'=>'require'
    ];
    protected $message=[
        'mobile.require'=>'电话号码不能为空',
        'mobile.max'=>'电话号码格式不正确',
        'mobile.unique'=>'电话号码只能唯一',
        'password.require'=>'密码不能为空'
    ];
    protected $scence=[
        'add'=>['mobile','password'],
        'edit'=>['mobile'],
        'ajax'=>['mobile']
    ];

}