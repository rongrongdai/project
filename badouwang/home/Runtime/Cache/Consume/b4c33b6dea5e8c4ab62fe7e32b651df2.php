<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<script src="__ROOT__/public/js/validater.js"></script>

</head>

<body>
<div class="per">
    <div class="per-top">
           <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/cz1.jpg" />
           <div class="set-up">充值中心</div>
    </div>
    
    <div class="per-form">
        <div class="pheig">
          <div class="pflat1">充值金额：</div>
          <div class="pflat2">
          		<input type="text" class="ipnutcs" id="money" name="money" />
          		<span class="prompt">请输入充值金额，最小为1元</span>
          </div>
        </div>
          <input type="hidden" name="order_num" id="o_num" />
          <input type="hidden" name="ordsubject" value="八斗充值" /> 
        <div class="pheig psub">
				    <button class="subinput" id="consub">确认充值</button>
        </div> 
    </div> 

</div>


<script src="__ROOT__/public/js/home/common.js"></script>
<script type="text/javascript">
$("#money").focus(function(){$(".prompt").html("请输入充值金额，最小为1元").css('color','#888')});
var num = 0;
$("#consub").click(function(){
    var money = $("#money").val();$.ajaxSetup({async: false });
    if(!(/^[1-9]\d*$/.test(money))){ $(".prompt").html("充值金额为整数").css('color','red'); return false; }
    if(num === 0){
      $.post("__APP__/Ajax/AjaxConsume/addOrder",{money:money},function(data){
        $("#o_num").val(data);
        if(data!=null){ 
          $(".per-form").wrap("<form action='__APP__/Pay/Pay/doalipay' method='post'></form>");
        }
      },'json');
    }
    num++;
});

</script>

</body>
</html>