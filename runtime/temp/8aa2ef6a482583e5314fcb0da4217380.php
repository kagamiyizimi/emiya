<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\php_project\test2\emiya\public/../application/index\view\login\login.html";i:1506513041;}*/ ?>

<?php echo widget('Widget/header'); ?>
<div class="login">
    <div class="container">
        <div class="login-left">
            <div class="title">
                <h2>登录</h2>
            </div>
            <form action="<?php echo url('Login/doLogin'); ?>" class="form" method="post">
                <span>登录账号</span>
                <div class="form-control input_box">
                    <input type="text" required="" style="width: 300px" placeholder="用户名/邮箱地址/手机号" name="username">
                </div>
                <span>密码</span>
                <div class="form-control input_box">
                    <input type="password" required="" id="password" style="width: 300px" placeholder="填写密码" name="password">
                </div>
                <div class="checkbox-inline">
                    <input type="checkbox"><span>记住账号</span>
                </div>
                <button type="submit" class="btn" style="color: white">登录</button>
                <a href="#">忘记密码?</a>
            </form>
        </div>
        <!--右侧图片-->
        <div class="login-right">
            <img src="__STATIC__/index/images/bkg_tags.jpg" style="width: 790px;height: 480px">
            <span>我不是会员，</span><a href="#">要加入</a>
        </div>
    </div>
    <!--左侧登录框-->

</div>
<?php echo widget('Widget/footer'); ?>