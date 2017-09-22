<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\yimishiji\emiya\public/../application/admin\view\widget\left.html";i:1506043021;}*/ ?>
<!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <!--管理员-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Manager/lis'); ?>">
                                    <span class="menu-text">
                                        管理列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <!--客户-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">会员</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Manager/lis'); ?>">
                                    <span class="menu-text">
                                        会员列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <!--商品-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">分类</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        添加顶级分类                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        添加子分类                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <!--商品-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">商品</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        商品列表                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        商品图片                                    </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <!--订单-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">订单</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        订单详情                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">地址</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/document/index.html">
                                    <span class="menu-text">
                                        地址详情                                   </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>



    </ul>
    <!-- /Sidebar Menu -->
</div>