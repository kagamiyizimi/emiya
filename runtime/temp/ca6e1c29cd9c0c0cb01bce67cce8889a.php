<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"E:\UPUPW_NP7.0\htdocs\emiya\public/../application/index\view\index\index.html";i:1506396256;s:79:"E:\UPUPW_NP7.0\htdocs\emiya\public/../application/index\view\widget\header.html";i:1506429703;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="__STATIC__/index/css/repair.css">
    <script src="__STATIC__/index/JQ/jquery-3.2.1.min.js"></script>
    <script src="__STATIC__/index/js/header.js"></script>
    <link rel="stylesheet" href="__STATIC__/index/css/repair.css">
    <link href="__STATIC__/index/css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="__STATIC__/index/css/login.css">
    <link rel="stylesheet" href="__STATIC__/index/css/header.css">
    <link rel="stylesheet" href="__STATIC__/index/css/bootstrap.css">
    <link rel="stylesheet" href="__STATIC__/index/css/animate.css">
    <script src="__STATIC__/index/JQ/jquery-3.2.1.min.js"></script>
</head>
<body>
<!--导航栏-->
<div class="nav">
    <div class="nav-top"></div>
    <div class="container">
        <!--logo-->
        <div class="col-lg-2 logo">
            <img src="__STATIC__/index/images/header/logo.png" width="170" height="auto">
        </div>
        <!--选项列表-->
        <div class="col-lg-8 list">
            <ul>
                <li>
                    <a href="#">所有商品</a>
                    <div class="detail some_li">

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_1.jpg" width="40"></div>

                            <a href="#" class="boss_ca">四时蔬菜</a>
                            <ul>
                                <?php foreach($catePid_1 as $v_1): ?>
                                <li><a href="#"><?php echo $v_1['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_2.jpg" width="40"></div>

                            <a href="#" class="boss_ca">安全水果</a>
                            <ul>
                                <?php foreach($catePid_2 as $v_2): ?>
                                <li><a href="#"><?php echo $v_2['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_3.jpg" width="40"></div>

                            <a href="#" class="boss_ca">肉禽蛋类</a>
                            <ul>
                                <?php foreach($catePid_3 as $v_3): ?>
                                <li><a href="#"><?php echo $v_3['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_4.jpg" width="40"></div>

                            <a href="#" class="boss_ca">乳类制品</a>
                            <ul>
                                <?php foreach($catePid_4 as $v_4): ?>
                                <li><a href="#"><?php echo $v_4['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_5.jpg" width="40"></div>

                            <a href="#" class="boss_ca">水中鲜物</a>
                            <ul>
                                <?php foreach($catePid_5 as $v_5): ?>
                                <li><a href="#"><?php echo $v_5['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_6.jpg" width="40"></div>

                            <a href="#" class="boss_ca">早餐&面点</a>
                            <ul>
                                <?php foreach($catePid_6 as $v_6): ?>
                                <li><a href="#"><?php echo $v_6['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_7.jpg" width="40"></div>

                            <a href="#" class="boss_ca">吃吃零嘴</a>
                            <ul>
                                <?php foreach($catePid_7 as $v_7): ?>
                                <li><a href="#"><?php echo $v_7['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_8.jpg" width="40"></div>

                            <a href="#" class="boss_ca">饮料酒水</a>
                            <ul>
                                <?php foreach($catePid_8 as $v_8): ?>
                                <li><a href="#"><?php echo $v_8['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_9.jpg" width="40"></div>

                            <a href="#" class="boss_ca">粮油酱醋</a>
                            <ul>
                                <?php foreach($catePid_9 as $v_9): ?>
                                <li><a href="#"><?php echo $v_9['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="cate_div">
                            <div><img src="__STATIC__/index/images/header/cate_10.jpg" width="40"></div>

                            <a href="#" class="boss_ca">环保生活</a>
                            <ul>
                                <?php foreach($catePid_10 as $v_10): ?>
                                <li><a href="#"><?php echo $v_10['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>


                    </div>
                </li>
                <li>
                    <a href="#">好事发生</a>
                    <div class="detail2 some_li">
                        <ul>
                            <li><a href="#" class="col-lg-12">新到尖货</a></li>
                            <li><a href="#" class="col-lg-12">优惠推选</a></li>
                            <li><a href="#" class="col-lg-12">好物预购</a></li>
                            <li><a href="#" class="col-lg-12">充值卡</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#">吃的主张</a>
                    <div class="detail3 some_li">
                        <ul>
                            <li><a href="#" class="col-lg-12">做个选择</a></li>
                            <li><a href="#" class="col-lg-12">农友伙伴</a></li>
                            <li><a href="#" class="col-lg-12">好物预购</a></li>
                            <li><a href="#" class="col-lg-12">充值卡</a></li>
                            <li><a href="#" class="col-lg-12">好物预购</a></li>
                            <li><a href="#" class="col-lg-12">充值卡</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="saarch">
                        <input type="search" placeholder="搜索你喜欢的" value="周年庆">
                    </div>
                </li>
            </ul>
        </div>
        <!--登录和购物车-->
        <div class="col-lg-2 login">
            <!--购物车-->
            <div class="cart cartone">
                <img src="__STATIC__/index/images/header/ym_icon_cart.png" width="25" height="auto">
                <div class="cartdetail">
                    <div class="none">购物篮中空空的喔,慢慢逛，不要忘记带上「食欲」</div>
                </div>
            </div>
            <!--登录注册-->
            <div class="cart cartsec">
                <img src="__STATIC__/index/images/header/ym_icon_user.png" width="25" height="auto">
                <div class="cartdetail">
                    <div><a href="#">登录</a></div>
                    <div><a href="#">注册</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
