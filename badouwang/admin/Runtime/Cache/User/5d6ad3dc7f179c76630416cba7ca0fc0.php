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

<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/admin/table.css" />
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <div style="height:40px;margin:10px;width:600px;margin-left:230px">
                教师名：<input type="text" style="display: inline;width:100px;height: 30px;" name="real_name"/>  城市：<input type="text" style="display: inline;width:100px;height: 30px;" name="city"/> 类别：<input type="text" style="display: inline;width:100px;height: 30px;" name="grade"/><select name="verified" style="border: 1px solid lightgrey;width:80px;height:30px;margin-left:20px;"><option value="1">已认证</option><option value="0">待认证</option></select> <button id="sea">搜索</button>
            </div>
            <table style="width:1000px;">
                <tr>
                    <td width="10%">教师会员名</td><td width="10%">教师真实姓名</td><td width="10%">认证状态</td><td width="10%">学校</td><td width="10%">类别</td><td width="10%">城市</td><td width="10%">操作</td>
                </tr>
                <?php if(is_array($datas)): foreach($datas as $key=>$teacher): ?><tr>
                        <td width="10%"><?php echo ($teacher["uname"]); ?></td><td width="10%"><?php echo ($teacher["real_name"]); ?></td><td width="10%"><?php if($teacher["verified"] == 1): ?>已认证<?php else: ?>待认证<?php endif; ?></td><td width="10%"><?php echo ($teacher["school"]); ?></td>
                        <td width="10"><?php if(is_array($identity)): foreach($identity as $k=>$v): if($teacher['type'] == $k): echo ($v); endif; endforeach; endif; ?></td>

                        <td width="10%"><?php echo ($teacher["city"]); ?></td>
                        <td width="10%"><?php if($teacher['verified'] == 3): ?><a href="./detail?id=<?php echo ($teacher["id"]); ?>&type=teacher&uid=<?php echo ($teacher["uid"]); ?>" title="审核">审核</a>
                        <?php else: ?><a style="color:green;">已审核</a><?php endif; ?></td>
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

<script>
    $(function(){
        $("#sea").click(function(){
            var search='';
            var sarr=new Array('real_name','city','grade');
            for(i in sarr){
                if(search){
                    if($("input[name="+sarr[i]+"]").val()){
                        search+='&'+sarr[i]+'='+$("input[name="+sarr[i]+"]").val();
                    }
                }else{
                  if($("input[name="+sarr[i]+"]").val()){
                        search+='?'+sarr[i]+'='+$("input[name="+sarr[i]+"]").val();
                    }
                }
            }
            if(search){
                search+='&verified='+$("select[name=verified]").val();
            }else{
                search+='?verified='+$("select[name=verified]").val();
            }
            location.href='index'+search;
           
        })
    })
</script>

<script type="text/javascript" src="/badouwang/Public/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>