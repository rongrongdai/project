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
         <img src="__ROOT__/public/images/home/pxjgs1.jpg" />
         <p class="set-up">培训机构设置</p>
     </div>
     <div class="per-form">
         <form action="" method="post" enctype="multipart/form-data" id="dataform">
           <div class="pheig">
              <div class="pflat1">机构名称：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" id="real_name" name="real_name" value="<?php echo ($data["real_name"]); ?>" />
              		<span class="prompt">机构名称，中英文均可， 不超过20字符</span>
              </div>
           </div>

           <div class="pheig">
              <div class="pflat1">机构Log：</div>
              <div class="pflat2 pflat2tx">
              	   <input type="file"  name="id_img" />
                <!--   <?php if($data.id_img): ?><img src="__ROOT__<?php echo ($data["id_img"]); ?>"<?php endif; ?>-->
              </div>
              <span class="prompt">最佳尺寸：232*137像素！</span>
           </div>
           
           <div class="pheig">
              <div class="pflat1">机构所在地：</div>
              <div class="pflat2">
                   <select id="s_province" name="s_province"></select>
                   <select id="s_city" name="s_city"></select>
                   <select id="s_county" name="s_county"></select>
                   <span class="prompt">机构地址</span>
                   <script src="__ROOT__/public/js/home/area.js" type="text/javascript"></script>
                   <script type="text/javascript">var opt0 = ["<?php if($data["citys"] != ''): echo ($data["citys"]["0"]); else: ?>请选择<?php endif; ?>","<?php if($data["citys"] != ''): echo ($data["citys"]["1"]); else: ?>请选择<?php endif; ?>","<?php if($data["citys"] != ''): echo ($data["citys"]["2"]); else: ?>请选择<?php endif; ?>"];_init_area();</script>
              </div>
           </div>

           <div class="pheig">
              <div class="pflat1">联系电话：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs"  name="telephone" id="telephone" value="<?php echo ($data["telephone"]); ?>"/>
              		<span class="prompt">请输入您的手机号码</span>
              </div>
           </div> 

           <div class="pheig">
              <div class="pflat1">详细地址：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" name="address" id="address" value="<?php echo ($data["address"]); ?>" />
              		<span class="prompt">培训机构详细地址，不超过100字符</span>
              </div>
           </div>    

    	   <div class="pheigtet">
              <div class="pflat1">机构简介:</div>
              <div class="pflat2">
              		<textarea name="self_info" cols="60" rows="5" id="self_info" /><?php echo ($data["self_info"]); ?></textarea>
              		<span class="prompt">培训机构简介，中英文均可，不超过150字符</span>
     	   	  </div>
           </div>

           <div class="pheig psub">
             <input type="submit" class="subinput" value="确认保存"  id="perqreng"/>
             <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
             <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
           </div>
       </form>   
	</div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('real_name','self_info','address','telephone');
                var nullinfo=new Array('机构名称','机构简介','个人地址','手机号码');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                      res=phone_check('telephone');
                      if(res===true){
                          if($("#s_county").val()!=='请选择'){
                              return true;
                          }else{
                              $("#s_county").next(".prompt").text("请选择机构所在地！").css("color","red");
                              return false;
                          }
                          
                      }else{
                          $("#telephone").parent().find(".prompt").text(res).css("color","red");
                          return false;
                      }
                      
                  }
                  return false;
            });
</script>
</body>
</html>