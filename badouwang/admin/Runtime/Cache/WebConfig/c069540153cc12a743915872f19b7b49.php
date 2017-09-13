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

<link rel="stylesheet" href="__ROOT__/public/css/admin/table.css" />
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <table>
                <tr>
                    <td width="20%">配置项</td><td width="50%">配置说明</td><td>操作<a href="./entity" title="添加分类"><span class="icon" style="color:gray;" >&oplus;</span></a></td>
                </tr>
                <?php if(is_array($configs)): foreach($configs as $key=>$config): ?><tr>
                        <td width="20%"><?php echo ($config["c_name"]); ?></td><td width="50%"><?php echo ($config["c_info"]); ?></td><td><span class="s_info"><a href="configDetail?cid=<?php echo ($config["id"]); ?>">查看详情</a></span><span class="s_info"><a href="delConfig?cid=<?php echo ($config["id"]); ?>">删除该配置</a></span></td>
                    </tr><?php endforeach; endif; ?>
                
            </table>
            <?php echo ($page); ?>
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


<script src="__ROOT__/public/js/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>