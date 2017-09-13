<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录 - 八斗网</title>
<link type="text/css" href="__ROOT__/public/css/home/style.css" rel="stylesheet" />
<link href="__ROOT__/public/images/home/2.ico" type="image/x-icon" rel="shortcut icon">
<script src="__ROOT__/public/js/jquery-min.js" type="text/javascript"></script>
</head>

<body>
  <div id="allba">
     <div id="thehead">
        <div class="theheadone">
          <a title="返回首页" href="__APP__"><img src="__ROOT__/public/images/home/fheader.gif" /></a>
        </div>
        
        <div class="theheadtwo">
            <div class="Contentone">
            <form id="loginForm" class="loginForm" name="login" action="__URL__/doLogin" method="post"> 

	            <input type="text" class="inp" id="email" name="uname"  placeholder="请输入登录邮箱地址" autofocus /><br />
	            <input type="password"  class="inp" id="password" name="password" placeholder="请输入密码"><span class="npass" id="vpass"></span></br>
              <input type="checkbox" id="remember" value="" checked="checked" name="autoLogin"><span class="wenyi">记住我</span>
	            <a href="javascript:;" class="fr" name="fr" target="_blank">忘记密码？</a> 
              <span id="msg"></span>
              <input type="hidden" name="pre_url" value="<?php echo ($pre_url); ?>" />
	            <input type="submit" id="submitLogin" value="登     录"> 
	        </form> 
	        </div>
        <div class="Contenttwo">
           <div class="Contenttwoyi"></div>
         <div class="pepro"><span></span></div>
           <div class="Contenttwoer"> 还没有八斗帐号？</div> 
            <a href="__URL__/register" class="registor_now">立即注册</a>
             <div class="login_others">
              使用以下帐号直接登录:
            </div>  
            <div class="tupcs">
           <div class="icon_wb" ><a href="__ROOT__/index.php/User/User/webLogin" target="_blank" title="使用新浪微博帐号登录"></a></div> 
           <div class="icon_qq"><a href="__ROOT__/index.php/User/User/qqLogin"  target="_blank" title="使用腾讯QQ帐号登录"></a> </div>
           
            </div>
        </div>
        
        </div>     
     </div>
  </div>

</body>
</html>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script type="text/javascript">
window.onload = function(){
  var fm = document.forms['login'];
  var username = fm.elements['uname'];
  var password = fm.elements['password'];

    $("#loginForm").submit(function(){
      if(username.value.length<1 || password.value.length<1){
          $("#msg").text("用户名或密码不能为空");
          return false;
      }else{
        $.ajaxSetup({
          async: false
        });
        $.post('__ROOT__/index.php/Ajax/AjaxUser/vpass',{'uname':username.value,'password':password.value},function(data){
          if(data == 'pass'){
            $("#vpass").attr("class","right");
          }else if(data.limit == 'limit'){
            $("#vpass").attr("class","npass");
            $("#msg").text(data.msg);
          }else if(data == 'wrong'){
            $("#vpass").attr("class","npass");
            $("#msg").text("用户名或密码错误");
          }
        },'json')

        if($(".npass").attr('class') === 'npass'){
          return false;
        }

      }
    })

} 
$(function(){
   $("a[name=fr]").click(function(){
       if(!$("#email").val()){
           $("#email").focus();
           $("#msg").text("请输入用户名！");
       }else{
            location.href="__ROOT__/index.php/User/User/fpassword?uname="+$("#email").val();
       }
   })
})
</script>