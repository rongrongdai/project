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
            <table style="width:95%;">
                <tr class="t_user">
                    <th>序号</th><th>试卷分类</th><th>试卷名称</th><th>上传时间</th><th>提供者</th><th>需要学豆</th><th>考试次数</th><th>操作</th>
                </tr>

                <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr class="<?php if($i%2==1): ?>odd<?php else: ?>even<?php endif; ?>">
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo ($vo["cname"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$vo["ctime"])); ?></td>
                        <td><?php echo ($vo["uname"]); ?></td>
                        <td><?php echo ($vo["ispay"]); ?></td>
                        <td><?php echo ($vo["answer"]); ?></td>
                        <td><a href="__URL__/examlist?sid=<?php echo ($vo["id"]); ?>">查看考试记录</a></td>
                   </tr><?php endforeach; endif; ?>
            </table>



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

<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>