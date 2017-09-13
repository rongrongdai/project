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


<!-- <div class="widget-container"> begin -->    
<div class="widget-container">
	<div style="font-size:16px;margin:20px;">
		<span>文章分类</span>
		<?php if(is_array($classfiy)): foreach($classfiy as $i=>$vo): ?><a href="?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?>  </a><?php endforeach; endif; ?>
		<a href="./addArticle">添加文章  </a>
	</div>
	<table style="width:95%;">
		<tr>
			<td width="5%">序号</td><td>文章标题</td><td>分类名称</td><td>发布者</td><td width="15%">时间</td><td>操作</td>
		</tr>
		<?php if(is_array($data)): foreach($data as $k=>$vv): ?><tr>
				<td><?php echo ($k+1+$count); ?></td>
				<td><a href="__ROOT__/index.php/Index/Index/helpcenter?aid=<?php echo ($vv["id"]); ?>" target="_new"><?php echo ($vv["title"]); ?></a></td>
				<td><?php echo ($vv["name"]); ?></td>
				<td><?php echo ($vv["admin"]); ?></td>
				<td><?php echo (date("Y-m-d H:i:s",$vv["mtime"])); ?></td>
				<td><a href="javascript:mod(<?php echo ($vv["id"]); ?>)">编辑</a> | <a href="javascript:del(<?php echo ($vv["id"]); ?>)">删除</a></td>
			</tr><?php endforeach; endif; ?>

	</table>
	<?php echo ($link); ?>

	
	

</div>
<!-- <div class="widget-container"> end -->


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


<script>
    function mod(id){
        if(confirm('您确认要编辑该文章吗？')){
            window.location.href="__URL__/addArticle?id="+id;
        }
    }
    function del(id){
        if(confirm('您确认要编辑该篇文章吗？')){
            window.location.href="__URL__/delArticle?id="+id;
        }
    }    
</script>