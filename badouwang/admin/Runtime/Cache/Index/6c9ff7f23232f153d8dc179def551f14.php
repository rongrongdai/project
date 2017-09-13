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
<body>
<div class="testing">
<header class="main">
	<h1><strong>八斗网</strong> -管理后台</h1>
	<input type="text" value="search" />
</header>
<section class="user">
	<div class="profile-img">
		<p><img src="__ROOT__/public/images/admin/uiface2.png" alt="" height="40" width="40" />欢迎回来 <?php echo (session('admin')); ?></p>
	</div>
	<div class="buttons">
		<button class="ico-font">&#9206;</button>
		<span class="button dropdown">
			<a href="#">常用功能 </a>
			<ul class="notice">
				<li>
					<hgroup>
						<h1>网站设置</h1>
					</hgroup>
					
				</li>
				<li>
					<hgroup>
						<h1>个人资料</h1>
						
					</hgroup>
					
				</li>
				<li>
					<hgroup>
						<h1>配置管理</h1>
						
					</hgroup>
					
				</li>
				<li>
					<hgroup>
						<h1>分类管理</h1>
						
					</hgroup>
					
				</li>
			</ul>
		</span> 
		
		<span class="button blue"><a href="__ROOT__/admin.php/Index/Index/logout">退出登录</a></span>
	</div>
</section>
</div>
<nav>
	<ul id="nav">
                <li name="mmemu">
			<a href="javascript:;"><span class="icon">&#59171;</span>网站设置</a>
			<ul class="submenu" >
				<li ><a href="__ROOT__/admin.php/WebConfig/BasicConfig/configView" target="ifrm">配置管理 </a></li>
				<li ><a href="__ROOT__/admin.php/WebConfig/BasicConfig/index" target="ifrm">网站设置</a></li>
                                <li ><a href="__ROOT__/admin.php/WebConfig/Classfiy/index" target="ifrm">分类管理</a></li>
                        <li><a href="__ROOT__/admin.php/WebConfig/BasicConfig/city" target="ifrm">城市管理</a></li>
                        <li><a href="__ROOT__/admin.php/WebConfig/BasicConfig/link" target="ifrm">友情链接</a></li>
                                <li><a href="page-timeline.html" target="ifrm">seo管理</a></li>
			</ul>	
		</li>
		
		<li name="mmemu">
			<a href="javascript:;"><span class="icon">&#59160;</span> 用户管理 </a><!--<span class="pip">12</span>-->
			<ul class="submenu" <?php if($mmenu == 'user'): ?>style="display:block"<?php endif; ?>>
				<li><a href="__ROOT__/admin.php/User/User/index"  target="ifrm">会员管理</a></li>
				<li><a  href="__ROOT__/admin.php/User/Admin/index" target="ifrm">管理员管理</a></li>
				<li><a  href="__ROOT__/admin.php/User/Authentication/index" target="ifrm">认证管理</a></li>
                                <!--<li><a href="__ROOT__/admin.php/User/Authentication/proxyer"  target="ifrm">代理商管理</a></li>
                                <li><a href="__ROOT__/admin.php/User/Authentication/organization"  target="ifrm">培训机构管理</a></li>-->
			</ul>
		</li>
                <li name="mmemu" >
			<a href="javascript:;"><span class="icon">&#59160;</span> 内容管理 </a>
			<ul class="submenu">
				<li><a href="__ROOT__/admin.php/Content/Course/index"  target="ifrm">课程管理</a></li>
				<li><a href="__APP__/Content/Article/index" target="ifrm">文章管理</a></li>
                                <li><a href="comments-timeline.html" target="ifrm">学习资料管理</a></li>
                                <li><a href="__ROOT__/admin.php/Content/Exam/index" target="ifrm">在线考试管理</a></li>
                                
			</ul>
		</li>
                <li name="mmemu">
			<a href="javascript:;"><span class="icon">&#59160;</span> 广告位管理 </a>
			<ul class="submenu">
				<li><a href="blog-new.html" target="ifrm">课程管理</a></li>
				<li><a href="blog-table.html" target="ifrm">新闻内容管理</a></li>
				<li><a href="comments-timeline.html" target="ifrm">文章管理</a></li>
                                <li><a href="comments-timeline.html" target="ifrm">学习资料管理</a></li>
                                <li><a href="comments-timeline.html" target="ifrm">在线考试管理</a></li>
			</ul>
		</li>
                <li name="mmemu">
			<a href="javascript:;"><span class="icon">&#59160;</span> 推荐管理 </a>
			<ul class="submenu">
				<li><a href="blog-new.html" target="ifrm">课程管理</a></li>
				<li><a href="blog-table.html" target="ifrm">新闻内容管理</a></li>
				<li><a href="comments-timeline.html" target="ifrm">文章管理</a></li>
                                <li><a href="comments-timeline.html" target="ifrm">学习资料管理</a></li>
                                <li><a href="comments-timeline.html" target="ifrm">在线考试管理</a></li>
			</ul>
		</li>
                <li name="mmemu">
			<a href="javascript:;"><span class="icon">&#59160;</span> 财务管理 </a>
			<ul class="submenu">
				<li><a href="blog-new.html" target="ifrm">报表查看</a></li>
				<li><a href="blog-table.html" target="ifrm">收益状况</a></li>
				<li><a href="comments-timeline.html" target="ifrm">统计报表</a></li>
			</ul>
		</li>
                 
                 
               
                
                
	</ul>
</nav>
<section class="content">
    <iframe src="__APP__/Index/Index/icontent" name="ifrm" id="irm" scrolling="no" frameborder="0" width="80%" onLoad="iFrameHeight('irm')">
        
    </iframe>
</section>
<script type="text/javascript" language="javascript"> 
function iFrameHeight(ele) { 
    var ifm= document.getElementById(ele);
    var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument; 
    if(ifm != null && subWeb != null) { 
        console.log(subWeb.body.scrollHeight);
        ifm.height = subWeb.body.scrollHeight;
    } 
} 
$(function(){
    $("li[name=mmemu]").find("li").click(function(){
        $("li[name=mmemu]").find("li").css('#313131');
        $(this).mouseout(function(){
            $(this).css("background","#262626");  
        })
        $(this).css("background","#262626");
    });
})
</script> 
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>