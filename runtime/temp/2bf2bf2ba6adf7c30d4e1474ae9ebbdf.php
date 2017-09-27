<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\yimishiji\emiya\public/../application/admin\view\manager\list.html";i:1506398034;}*/ ?>
<?php echo widget("Widget/header"); ?>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <?php echo widget("Widget/left"); ?>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="#">系统</a>
                    </li>
                    <li class="active">用户管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '<?php echo url('Manager/add'); ?>'"> <i class="fa fa-plus"></i> Add
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">用户名称</th>
                                            <th class="text-center">修改时间</th>
                                            <th class="text-center">是否冻结</th>
                                            <!--<th class="text-center">ip</th>-->
                                            <th class="text-center">登录时间</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach($data as $v): ?>
                                        <tr>
                                            <td align="center"><?php echo $v['manager_id']; ?></td>
                                            <td align="center"><?php echo $v['username']; ?></td>
                                            <td align="center"><?php echo date("y-m-d",$v['create_time']); ?></td>
                                            <td align="center"><?php echo $v['lock']=="1"?"是":"否"; ?></td>
                                            <!--<td align="center"><?php echo $v['ip']; ?></td>-->
                                            <td align="center"><?php echo date("y-m-d",$v['login_time']); ?></td>
                                            <td align="center">
                                                <a href="<?php echo url("Manager/edit",array("id"=>$v['manager_id'])); ?>"
                                                class="btn btn-primary btn-sm shiny" >
                                                <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '<?php echo url("Manager/del",array("id"=>$v['manager_id'])); ?>')"
                                                class="btn btn-danger btn-sm shiny">
                                                <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $data->render(); ?>
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="__STATIC__/admin/style/jquery_002.js"></script>
<script src="__STATIC__/admin/style/bootstrap.js"></script>
<script src="__STATIC__/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="__STATIC__/admin/style/beyond.js"></script>


</body></html>