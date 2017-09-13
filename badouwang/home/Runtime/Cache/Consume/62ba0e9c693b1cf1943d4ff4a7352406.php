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
             <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/txxd1.jpg" />
             <div class="set-up"><?php if($type): ?>购买学豆<?php else: ?>提现学豆（可提现 <?php if($cmoney): echo ($cmoney["vmoney"]); else: ?>0<?php endif; ?> 个）<?php endif; ?></div>
       </div>
       
       <div class="per-form">
          <form action="" method="post" enctype="multipart/form-data" id="dataform">
          
           <div class="pheig">
              <div class="pflat1"><?php if($type): ?>购买<?php else: ?>提现<?php endif; ?>数量：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" id="number" name="number" />
              		<span class="prompt">请输入<?php if($type): ?>购买<?php else: ?>提现<?php endif; ?>数量<?php if($type): ?>。<?php else: ?>，不能超过当前拥有学豆数！<?php endif; ?></span>
              </div>
           </div> 
           
           <div class="pheig psub">
				<input type="submit" class="subinput" value="确认<?php if($type): ?>购买<?php else: ?>提现<?php endif; ?>"  id="perqreng"/>
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
                <input type="hidden" name="type" value="<?php echo ($type); ?>"/>              
           </div>             
         </form>   
     </div>           
</div>
    <script src="__ROOT__/public/js/home/common.js"></script>
<script>
            $(function(){
                $("#dataform").submit(function(){
                    var number=$("#number").val();
                    if(/(\d)+/.test(number)){
                        return true;
                    }else{
                        $("#number").parent().find(".hint").text("请输入正确金额！").css("color","red");
                        
                        return false; 
                    }
                })
            })
</script>
</body>
</html>