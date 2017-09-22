<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\UPUPW_NP7.0\htdocs\emiya\public/../application/admin\view\goods\list.html";i:1506068634;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>一米市集后端</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__STATIC__/admin/style/bootstrap.css" rel="stylesheet">
    <link href="__STATIC__/admin/style/font-awesome.css" rel="stylesheet">
    <link href="__STATIC__/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="__STATIC__/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__STATIC__/admin/style/demo.css" rel="stylesheet">
    <link href="__STATIC__/admin/style/typicons.css" rel="stylesheet">
    <link href="__STATIC__/admin/style/animate.css" rel="stylesheet">
    
</head>
<body>
	<!-- 头部 -->
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
                                        <li class="active">商品管理</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="添加商品" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('Goods/add'); ?>'"> <i class="fa fa-plus"></i> Add
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
                                <th class="text-center">商品名称</th>
                                <th class="text-center">缩略图</th>
                                <th class="text-center">分类名</th>
                                <th class="text-center">销售价格</th>
                                <th class="text-center">市场价格</th>
                                <th class="text-center">库存</th>
                                <th class="text-center">冻结库存</th>
                                <th class="text-center">商品状态</th>
                                <th class="text-center">关键字</th>
                                <th class="text-center">更新人</th>
                                <th class="text-center">发布时间</th>
                                <th class="text-center">更新时间</th>
                                <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach($data as $v): ?>
                            <tr>
                                <td align="center"><?php echo $v['goods_id']; ?></td>
                                <td align="center"><?php echo $v['goods_name']; ?></td>
                                <td align="center">
                                    <img src="" alt=""height="40"width="40">
                                </td>
                                <td align="center"><?php echo $v['cate_id']; ?></td>
                                <td align="center"><?php echo $v['sell_price']; ?></td>
                                <td align="center"><?php echo $v['market_price']; ?></td>
                                <td align="center"><?php echo $v['store']; ?></td>
                                <td align="center"><?php echo $v['freez']; ?></td>
                                <td align="center"><?php echo $v['maketable']; ?></td>
                                <td align="center"><?php echo $v['keywords']; ?></td>
                                <td align="center"><?php echo $v['last_modify_id']; ?></td>
                                <td align="center"><?php echo date("y-m-d",$v['create_time']); ?></td>
                                <td align="center"><?php echo date("y-m-d",$v['last_modify']); ?></td>
                                <td align="center">
                                    <a href="<?php echo url('Image/index'); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 图片管理
                                    </a>
                                    <a href="<?php echo url('Goods/edit'); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a href="#" onClick="warning('{'确实要删除吗':'确实要撤销删除吗'}', '<?php echo url('Goods/delete'); ?>')" class="btn btn-danger btn-sm shiny">
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