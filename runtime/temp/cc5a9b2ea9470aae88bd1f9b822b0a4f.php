<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\php_project\test2\emiya\public/../application/index\view\reg\reg.html";i:1506479781;}*/ ?>
<?php echo widget('Widget/header'); ?>;

<div class="contain">
    <div class="reg_con container">
        <form action="<?php echo url('Reg/add'); ?>" class="reg_form col-lg-4" method="post">
            <h3>会员注册</h3>
            <label for="username">手机号
                <div class="reg_inp col-lg-10">
                    <input class="reg_chan form-control" required="" placeholder="请填写正确的手机号" id="username" name="mobile">
                    <div class="woring">
                        <i>!</i><span>填写的手机号格式不正确</span>
                    </div>
                </div>
            </label>
            <label for="password">密码
                <div class="reg_inp col-lg-10">
                    <input type="password" required="" class="reg_chan form-control" placeholder="6-20个字符"  id="password" name="password">
                    <div class="woring">
                        <i>!</i><span>请输入正确的密码格式</span>
                    </div>
                    <span style="float: left">密码强度:</span>
                    <div class="reg_level reg_level1"></div>
                    <div class="reg_level reg_level2"></div>
                    <div class="reg_level reg_level3"></div>
                </div>
            </label>
            <label for="password_che">确认密码
                <div class="reg_inp col-lg-10">
                    <input type="password" required="" class="reg_chan form-control" placeholder="再次填写密码" id="password_che" name="password_che">
                    <div class="woring">
                        <i>!</i><span>两次填写的密码不相同</span>
                    </div>
                </div>
            </label>
            <label for="code" class="reg_lable"><span>校检码</span>
                <div class="reg_inp1 col-lg-4">
                    <input class="reg_chan form-control" required="" placeholder="校检码" id="code" name="code">
                    <div><img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>'"/></div>
                    <div class="woring">
                        <i>!</i><span>校检码不正确</span>
                    </div>
                </div>
                <div class="col-lg-2"><img src=""></div>
                <a href="#">看不清楚换一个</a>
            </label>

            <label for="msg_code" class="reg_lable"><span>验证码</span>
                <div class="reg_inp1 col-lg-4">
                    <input class="reg_chan form-control" required="" placeholder="验证码" id="msg_code" name="msg_code">
                    <div class="woring">
                        <i>!</i><span>验证码不正确</span>
                    </div>
                </div>
                <span class="reg_btn msg_send">获取短信验证码</span>
                <span>如未收到短信，请联络客服或拨打400-655-1212</span>
            </label>
            <label>
                <input type="checkbox" checked="checked" class="col-lg-1">
                <div class="col-lg-11">我已阅读并同意<a href="#">会员注册协议</a>和<a href="#">隐私保护政策</a></div>
            </label>
            <button class="btn btn-block reg_btn">注册</button>
        </form>
        <div class="back_img col-lg-8">

        </div>
    </div>
</div>
<div style="clear: both"></div>
<script src="__STATIC__/index/js/reg.js"></script>

<?php echo widget('Widget/footer'); ?>