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
            <table>
                <tr>
                    <td width="20%">管理员名称</td><td width="20%">管理员状态</td><td width="20%">管理员角色</td><td width="40%">操作<a href="./entity" title="添加分类"><span class="icon" style="color:gray;" >&oplus;</span></a></td>
                </tr>
                <?php if(is_array($admins)): foreach($admins as $key=>$admin): ?><tr>
                        <td width="20%"><?php echo ($admin["admin"]); ?></td><td width="20%"><?php if($admin["isforbidden"] == 0): ?>正常状态<?php else: ?><span style="color:red;">禁用状态</span><?php endif; ?></td><td width="20%"><?php echo ($admin["c_key"]); ?></td><td><span class="s_info"><a href="configDetail?cid=<?php echo ($config["id"]); ?>">权限管理</a></span><span class="s_info"><a href="handelAdmin?fid=<?php echo ($admin["id"]); ?>"><?php if($admin["isforbidden"] == 0): ?>锁定用户<?php else: ?>解除锁定<?php endif; ?></a></span></td>
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



<script type="text/javascript" src="/badouwang/Public/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>