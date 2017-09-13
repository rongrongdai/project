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
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <div id="cht"><span>友情链接</span><span>家教主页</span><span>培训主页</span><span>添加链接</span></div>
            <div class="addlink"></div>
            <table style="width:95%;">
                <tr>
                    <td>序号</td><td>名称</td><td>网址</td><td>类别</td><td>操作</td>
                </tr>
                <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
                        <td><?php echo ($i+1+$limit); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["url"]); ?></td>
                        <td><?php echo ($vo["type"]); ?></td>
                        <td><a href="javascript:mod(<?php echo ($vo["id"]); ?>);">修改</a> | <a href="javascript:del(<?php echo ($vo["id"]); ?>);">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                
            </table>
            <?php echo ($link); ?>
        </div>
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

<script>
    $(function(){
        $("#cht").find("span:last").addClass("active").css('color','#fff');
        $("#cht").find("span").hover(function(){
            $("#cht").find("span").removeClass("active").css('color','#666');
            $(this).addClass("active").css('color','#fff');
        });
        $("#cht").find("span:first").click(function(){
            window.location.href = "?type="+$(this).text();
        });
        $("#cht").find("span:last").click(function(){
            window.location.href = "./addlink";
        });

        /*$("#sea").click(function(){
            $(".search").wrap('<form action="" method="post" id="search"></form>');

        });*/

    })

    	function mod(id){
	        if(confirm('您确认编辑吗？')){
	            window.location.href="__URL__/addlink?id="+id;
	        }
	    }
	    function del(id){
	        if(confirm('您确认删除吗？删除后不可恢复')){
	            window.location.href="__URL__/dellink?id="+id;
	        }
	    }

</script>


<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>