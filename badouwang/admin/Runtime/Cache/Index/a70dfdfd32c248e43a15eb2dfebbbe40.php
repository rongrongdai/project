<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>八斗网</title>
<script src="__ROOT__/public/js/admin/jquery-min.js"></script>
<style>
body{margin:0;background:url(__ROOT__/public/images/admin/ht_bj.jpg) 0px -200px}
.pbor{/* css3圆角 */border-radius:4px;-webkit-border-radius:4px;-o-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;}
.coner{width:360px;height:260px;margin:10% 25% auto auto;overflow:hidden;background:#FFF;border:2px solid #31719D;position:relative; z-index:2;color:#31719D;}
.coner .top{width:318px;margin:0 auto;}
.coner .inpdiv{height:35px;line-height:30px;padding:5px 25px;font-size:12px; }
.coner .inpdiv .inp{width:150px;height:20px;line-height:14px;padding:2px 4px;margin:0 0 0 5px;border:1px solid #31719D;}
.coner .inpdiv .code{width:56px;height:20px;line-height:14px;padding:2px 4px;margin:0 0 0 5px;border:1px solid #31719D;}
.coner .inpdiv .imgcs{float:left;}
.coner .login{background:#CB7417; clear:both;padding:12px;
	background-image: -moz-linear-gradient(center top , #FFF, #31719D);
	background-image: -ms-linear-gradient(top, #FFF, #31719D);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#FFF), to(#31719D));
	background-image: -webkit-linear-gradient(top, #FFF, #31719D);
	background-image: -o-linear-gradient(top, #FFF, #31719D);
	background-image: linear-gradient(top, #FFF, #31719D);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='FFF', endColorstr='#31719D', GradientType=0);
	}
.coner .login #logipt{width:80px;height:38px;margin:0 35%; cursor:pointer;

	line-height:28px;
	color: #31719D;
	font-size:12px;
	text-align:center;
	background-color: #3daa01;
	border:1px solid #31719D;
	text-decoration:none;
	background-repeat: repeat-x;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;	
	background-image: -moz-linear-gradient(center top , #FFF, #31719D);
	background-image: -ms-linear-gradient(top, #FFF, #31719D);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#FFF), to(#31719D));
	background-image: -webkit-linear-gradient(top, #FFF, #31719D);
	background-image: -o-linear-gradient(top, #FFF, #31719D);
	background-image: linear-gradient(top, #FFF, #31719D);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='FFF', endColorstr='#31719D', GradientType=0);
/*box-shadow: 1px 1px 3px #FFDBBE   inset;   inset是内阴影    */
}
.coner .login #logipt:hover{color:#FFF;}

.hh_bj{height:217px;background:#FFF url(__ROOT__/public/images/admin/htimg02.jpg) no-repeat center;border-bottom:2px solid #31719D;margin:-235px 0 0 0; position:relative;z-index:1;}
.hh_company{ position:absolute;bottom:0;right:40px;height:60px;color:#F93;font-size:24px}
</style>
</head>

<body>


<div class="coner pbor"><div class="conis">
	<form action="login"   method="post">
		<div class="top"><img src="__ROOT__/public/images/admin/htimg01.png" width="318" height="60" alt="img..." /></div>
    	<div class="inpdiv">管理员帐号:<input name="admin" class="inp" type="text" id="" value=""></div>
    	<div class="inpdiv">管理员密码:<input name="password" class="inp" type="password" id="" value="" /></div>
    	<div class="inpdiv">
        <div class="imgcs">验 证 码:<input name="verify" class="code"  /></div>
        <div class="imgcs"><img style="padding:0 0 0 5px"  src="logImg" width="60" height="27" id="vimg"></div>
        <div class="imgcs" id="nimg"><a href="javascript:;">[看不清？换一张]</a></div>
        </div>
    	<div class="login"><input name="" id="logipt" type="submit" value="登录" /></div>
        <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
	</form>   
</div></div>

<div class="hh_bj"><!--背景图片A--></div>
<div class="hh_company"><!--公司-->深圳市百士兴科技有限公司</div>
<script>
    $(function(){
        var date=new Date();
        $("#nimg").click(function(){
            $("#vimg").attr("src",$("#vimg").attr("src")+"?time="+date.getTime());
        })
    })
</script>





</body>
</html>