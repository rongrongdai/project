<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>八斗网-管理后台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="__ROOT__/public/css/admin/style.css" />
	<script src="__ROOT__/public/js/jquery-min.js"></script>
       
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
	<!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->
</head>
<body >

<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/table.css" />
<div class="p_position"><span>当前位置 > </span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">

<div class="widget-container"> 
<!-- <div class="widget-container"> begin -->
	<table style="width:98%">
		<tr><td>序号</td><td>城市</td><td>标题</td><td>科目</td><td>发布者</td><td>元/小时</td><td>报名人次</td><td>发布日期</td><td>操作</td></tr>
	<?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
			<td><?php echo ($i+1+$limit); ?></td>
			<td><?php echo ($vo["cname"]); ?></td>
			<td><?php echo ($vo["title"]); ?></td>
			<td><?php echo ($vo["fname"]); ?></td>
			<td><?php echo ($vo["uname"]); ?></td>
			<td><?php echo ($vo["price"]); ?></td>
			<td><?php echo ($vo["hit"]); ?></td>
			<td><?php echo (date("Y-m-d",$vo["atime"])); ?></td>
			<td><a href='__ROOT__/index.php/Teach/Teach/agentdetail?<?php if($vo['type'] == 1): ?>id<?php else: ?>pid<?php endif; ?>=<?php echo ($vo["id"]); ?>' target="parent">查看</a></td>
		</tr><?php endforeach; endif; ?>
	</table>
	<?php echo ($link); ?>
</div>
<!-- <div class="widget-container"> end -->


<script src="__ROOT__/public/js/classfiy.js"></script>
<script>
	getTclass('在线考试');//获取在线考试分类

</script>

<div class="content cycle">
	<div id="flot-example-2" class=""></div>
	<div id="flot-example-1" class=""></div>
</div>
</div>
    </section>
    <div class="footinfo">
        <div style="height:80px">
		Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2
        </div>            
    </div>
</section>

<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>