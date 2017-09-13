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
<script src='__ROOT__/public/js/validater.js'></script>
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <form id='dataform' method='post' action="<?php echo ($action); ?>">
                <table>
                    <?php if(is_array($form)): foreach($form as $key=>$f_item): ?><tr>
                           <td width="20%"><?php echo ($f_item["info"]); ?></td><td width="80%"><?php echo ($f_item["html"]); ?><br><span class='hint'></span></td>
                       </tr><?php endforeach; endif; ?>
                </table>
                <inptut type='hidden' name='edit' value="<?php if($edit): ?>1<?php else: ?>0<?php endif; ?>" />
                <input type="hidden" name="token" value="<?php echo ($token); ?>" />
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>" />
                <?php if(is_array($hiddens)): foreach($hiddens as $key=>$item): echo ($item); endforeach; endif; ?>
            </form>
            <div class="button blue" style="margin-left:500px;margin-top:30px;width:50px;" id="s_data">保存<?php if($edit): ?>修改<?php else: echo ($entity); endif; ?></div>
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
    //校验函数
    function check(field,fname){
                var res=false;
                 if(field){
                       var femail=field.split(',');
                       console.log(femail);return;
                       for(fd in femail){
                            res=fname(fd);
                            if(res){
                               $("#"+fd).parent().find(".hint").text(res).css("color","red");
                           }
                        }
                    }
                    return res;
    }   
    $(function(){
             
            $("#s_data").click(function(){
            var nullcheck="<?php echo ($null); ?>";
            var nullinfo="<?php echo ($null_info); ?>";
            var email="<?php echo ($email); ?>";
            var spec="<?php echo ($spec); ?>";
            var res=false;
            if(nullcheck){
                var nullck=nullcheck.split(',');
                var nullinfo=nullinfo.split(',');
                res=null_check(nullck,nullinfo);
                 if(res){
                 var fk="#"+res[0];
                 $(fk).parent().find(".hint").text(res[1]).css("color","red");
               }else{
                   res=check(email,'email_check')
                   if (res==false){
                       res=check(spec,'spe_check');
                   }
               }
            }
            if(!res){
               $("#dataform").submit();
            }
        })
        $("input[type=text]").focus(function(){
            $(".hint").text("");
        })
    })
    
</script>
<script type="text/javascript" src="/badouwang/Public/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>