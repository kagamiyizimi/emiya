<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\php_project\test2\emiya\public/../application/index\view\login\login.html";i:1506329134;}*/ ?>
<?php echo widget('Widget/header'); ?>
<div class="containe">
    <div class="login_row row">
        <h2 class="col-lg-12" style="color: rgb(0,46,72); font-weight: 500">登录</h2>

        <form class="col-xs-4">
            <div class="form-group">
                <label for="account">登录账号</label>
                <input type="text" class="form-control" id="account">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="check">记住账号</label>
                <input type="checkbox" class="checkbox-inline" id="check">
            </div>
            <button class="btn btn-block" style="background-color: rgb(0,46,72); color: white">登录</button>
            <a href="#">忘记密码</a>
        </form>
        <div class="login_back col-xs-8"></div>
        <span class="caret"></span>
    </div>

</div>
<?php echo widget('Widget/footer'); ?>