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
            <table style="width:98%">
                <tr class="t_user">
                    <th>会员ID</th><th>用户名</th><th>地区</th><th>注册时间</th><th>注册IP</th><th>身份</th><th>使用状态</th><th>操作</th>
                </tr>

                <?php if(is_array($users)): foreach($users as $i=>$user): ?><tr class="<?php if($user.uid%2==1): ?>odd<?php else: ?>even<?php endif; ?>">
                        <td><?php echo ($user["uid"]); ?></td>
                        <td><?php echo ($user["uname"]); ?></td>
                        <td><?php echo ($user["city"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$user["reg_timestamp"])); ?></td>
                        <td><?php echo ($user["reg_ip"]); ?></td>
                        <td><?php if(is_array($identity)): foreach($identity as $k=>$v): if($user['identity'] == $k): echo ($v); endif; endforeach; endif; ?></td>
                        <td><?php if(is_array($isforbidden)): foreach($isforbidden as $k=>$v): if($user['isforbidden'] == $k): echo ($v); endif; endforeach; endif; ?></td>
                        <td>
                        	<a href="">编辑</a>--
                        	<?php if($user['isforbidden'] == 0): ?><a href="javascript:forbd(<?php echo ($user["uid"]); ?>);" >禁用</a><?php else: ?><a href="javascript:restore(<?php echo ($user["uid"]); ?>);" style="color:#3B3E40;">恢复</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <?php echo ($link); ?>

<script>
    function forbd(uid){
        if(confirm('您确认要禁用该用户吗？')){
            window.location.href="__URL__/forbd?id="+uid;
        }
    }
    function restore(uid){
        if(confirm('您确认要恢复该用户吗？')){
            window.location.href="__URL__/restore?id="+uid;
        }
    }    
</script>

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