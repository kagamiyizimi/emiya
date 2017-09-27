<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26 0026
 * Time: 19:06
 */

namespace app\index\controller;

use think\Controller;
use php\api_demo\SmsDemo;

class Reg extends Controller
{
    public function index()
    {
        return $this->fetch('reg');
    }
    //发送短信
    public function message()
    {
        $data = [
            'mobile' => input('mobile'),
        ];
//            验证手机号是否已经注册
//        $validate = validate('Reg');
//        if (!$validate->scene('ajax')->check($data)) {
//            return json([
//                'status' => 'error',
//                'msg' => $validate->getError()
//            ]);
//        }
        //发送手机验证码
        $demo = new SmsDemo(
            "LTAIeok3IDKwUXN1",
            "iU0r0G7owKjyu2R0AhvYTK1pZ2OZg1"
        );

        //生成随机验证码
        $randomCode = rand(100000, 999999);
        //将验证码保存到session中
        session('msg_code',$randomCode);
        //发送短信验证码
        $response = $demo->sendSms(
            "小小人兒", // 短信签名
            "SMS_99275053", // 短信模板编号
            $data['mobile'], // 短信接收者
            Array(  // 短信模板中字段的值
                "code" => $randomCode,
                "product" => "dsd"
            ),
            "123"
        );
//        var_dump($response);exit;
        $arr = (array)$response;
        if ($arr['Code'] == 'OK') {
            return json([
                'status' => 'success',
                'msg' => '发送成功',
            ]);
        } else {
            return json([
                'status' => 'error',
                'msg' => '发送失败',
            ]);
        }
    }

    //添加会员
    public function add(){
        if(request()->isPost()){
            $data=[
                'mobile'=>input('mobile'),
                'password'=>input('password'),
            ];
            $code=input('code');
            $validate=validate('Reg');
            if(!$validate->scene('add')->check($data)){
                return $this->success($validate->getError());
            }
            if(!captcha_check($code)){
                return $this->error('校检码填写错误');
            }
            $msg_code=input('msg_code');
            $msg_session=session("msg_code");
            if($msg_code!=$msg_session){
                return $this->error('验证码填写错误');
            }
            $data['password']=md5($data['password']);
            $res=db('member')->insert($data);
            if($res){
                return $this->success('注册成功',url('Login/index'));
            }else{
                return $this->error('注册失败');
            }
        }
    }
}

?>