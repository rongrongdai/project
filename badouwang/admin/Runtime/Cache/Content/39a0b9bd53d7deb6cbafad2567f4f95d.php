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
<style>
	.art_add{font-size:16px;color:#5daced;margin:20px;}
	.msg1,.msg2,.msg3{color:red;}
</style>
	<form action="./addArticle" method="post" enctype="multipart/form-data" id="addArticle">
		<div class="art_add">文章标题：<input type="text" name="title" id="title" value="<?php echo ($data["title"]); ?>" style="width:200px;height:30px;"/></div>
		<span class="msg1"></span>
		<?php if($data): ?><div class="art_add">所属分类：<span><?php echo ($data["fname"]); ?></span>--<span><?php echo ($data["gname"]); ?></span></div>
			<input type="hidden" name="city_id" value="<?php echo ($data["city_id"]); ?>" />
			<input type="hidden" name="fid" value="<?php echo ($data["fid"]); ?>" />
			<input type="hidden" name="gid" value="<?php echo ($data["gid"]); ?>" />
			<input type="hidden" name="mod" value="<?php echo ($data["id"]); ?>" />
		<?php else: ?>
			<div class="art_add" id="tclass">所属分类：</div>
			<span class="msg2"></span><?php endif; ?>

		<div><span class="art_add">编辑文章：</sapn><?php echo ($txt); ?></div>
		<span class="msg3"></span>

		<input type="submit" value="确认提交" />
	
	</form>
	
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


<script src="__ROOT__/public/js/classfiy.js"></script>
<script>
	getTclass('新闻分类');//获取在线考试分类
	$("#fid").change(function(){
		var zhi = $(this).find('option:selected').text();
		if(zhi == '首页新闻'){
			$("<div class='art_add' id='getcityonly'>所属城市：</div>").insertAfter("#tclass");
			getCityOnly();
		}else{
			$("#getcityonly").remove();
		}
	});

	var a_content = '<?php echo ($data["content"]); ?>';
	$("textarea[name='content']").html(a_content);

	$("#addArticle").submit(function(){
		var title = (/\S/).exec($("#title").val());
		var fid = $("#fid").find('option:selected').val() != 0;
		var gid = $("#gid").find('option:selected').val() != 0;
		var content = (/\S/).exec($("textarea[name='content']").val());
		if(!title){$(".msg1").text("文章标题不能为空");return false;}
		if(!fid || !gid){$(".msg2").text("请选择文章分类");return false;}
		if(!content){$(".msg3").text("文章内容不能为空");return false;}
	})



</script>