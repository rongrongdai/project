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

<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/style.css" />
<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/table.css" />
<script src="__ROOT__/public/js/validater.js"></script>
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <form id='dataform' method='post' action="<?php echo ($action); ?>">
                <table>
                    <tr>
                        <td width="20%">配置项</td><td width="20%">配置说明</td><td width="30%">配置值</td><td>操作<a href="./entity?c_name=<?php echo ($c_name); ?>" title="添加配置项"><span class="icon" style="color:gray;" >&oplus;</span></a></td>
                    </tr>
                    <form method='post' action=''>
                    <?php if(is_array($configs)): foreach($configs as $key=>$config): ?><tr>
                            <td width="20%"><?php echo ($config["c_key"]); ?></td><td width="20%"><?php echo ($config["c_info"]); ?></td><td width="30%" ><input type='text' name='value' value='<?php echo ($config["c_value"]); ?>' style='width:50%'/><br><span class='hint'></span></td><td><a href='saveConfigItem?cid=<?php echo ($config["id"]); ?>' class='blue button' style='color:white;' name='save_item'>保存</a></td>
                       </tr><?php endforeach; endif; ?>
                        </form>
                </table>
                <inptut type='hidden' name='edit' value="<?php if($edit): ?>1<?php else: ?>0<?php endif; ?>" />
            </form>
            
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
       $("a[name=save_item]").click(function(){
           var value=$(this).parent().parent().find("input[name=value]").val();
           $(this).attr("href",$(this).attr("href")+"&val="+value);
        }) 
        
    })
</script>
<script type="text/javascript" src="/badouwang/Public/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>