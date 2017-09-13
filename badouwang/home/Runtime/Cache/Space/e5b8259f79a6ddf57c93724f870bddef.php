<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>个人空间-找人-按标签</title>
<link rel="stylesheet" href="css3.css" >
<style>
body{margin:0;}
.connet {width:1200px;margin:0 auto;overflow:hidden;border:1px solid #eee;}
.connet .left {width:199px;float:left;}
.connet .left a {display:block;height:50px;border-bottom:1px solid #eee; position:relative;background:#009170;color:#FFF;transition:background ease .6s;}
.connet .left a:hover {background:#3ad53d;}
.connet .left .hover{background:#3ad53d;}
.connet .left a p{width:188px;float:left; text-align:center;}
.connet .left a span{float:left;margin:20px 0 0 0;width: 0;height: 0; position:absolute;}
.connet .left a .bel{border-color:transparent #FFF transparent transparent ;border-style: solid;border-width: 6px 6px 6px 6px;}

/**/
.connet .right{width:1000px;float:left;margin-left:1px; }


</style>
</head>
<body>
<div class="connet">
	<div class="left">
    	<a href="space.html" target="ifrm" class="hover"><p>我的动态</p><span class="bel"></span></a>
    	<a href="#" target="ifrm"><p>我的问答</p><span></span></a>
    	<a href="mtutor.html" target="ifrm"><p>我的家教</p><span></span></a>
    	<a href="mtraining.html" target="ifrm"><p>我的培训</p><span></span></a>
    	<a href="endad.html" target="ifrm"><p>找 培 训</p><span></span></a>
    </div>
    <div class="right">
		<iframe src="space.html" name="ifrm" id="irm" scrolling="no" frameborder="0" width="100%" ></iframe>
    </div>
</div>


<script  src="__ROOT__/public/js/jquery-min.js"></script>
<script>
$('.left a').click(function(){
	$('.left a').removeClass('hover')
	$(this).addClass('hover');
	$('.left a span').removeClass('bel')
	$(this).find('span').addClass('bel');
	})

</script>
</body>
</html>