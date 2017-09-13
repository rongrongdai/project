<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body>

   
<div class="per">
    <div class="per-top">
         <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/hy4.gif" />
         <p class="set-up">个人设置</p>
    </div>
            
    <div class="per-form">
                <form action="__URL__/doSet" method="post" enctype="multipart/form-data" name="set">
                   <div class="pheig">
                    	<div class="pflat1">昵称：</div>
                        <div class="pflat2"><input type="text"  class="inputcs" name="rname" value="<?php echo ($data["rname"]); ?>" /><span class="prompt"> 八斗网唯一身份标识，中英文均可，不超过6个汉字或者12个字符</span></div>
                    </div>
                    <div class="pheig">
                    	<div class="pflat1">真实姓名：</div>
                        <div class="pflat2"><input type="text"  class="inputcs" name="tname" value="<?php echo ($data["tname"]); ?>" /><span class="prompt"></span></div>
                    </div>
                
                	<div class="pheig">
                    	<div class="pflat1">性别:</div>
                        <div class="pflat2 pflat2pb"><input type="radio" class="inputcs"  name="sex" value="0" <?php if($data["sex"] == 0): ?>checked="checked"<?php endif; ?> ><span>保密</span> 
                       <input type="radio" class="inputcs"  name="sex" value="1" <?php if($data["sex"] == 1): ?>checked="checked"<?php endif; ?> ><span>男</span>

	                   <input type="radio" class="inputcs"  name="sex" value="2" <?php if($data["sex"] == 2): ?>checked="checked"<?php endif; ?> ><span>女</span></div>
                    </div>
                	
                    <div class="pheig">
                    	<div class="pflat1">居住地：</div>
                        <div class="pflat2">
                        	<select id="s_province" name="s_province"></select>
                       		<select id="s_city" name="s_city"></select>
                       		<select id="s_county" name="s_county"></select>
                       	<script src="__ROOT__/public/js/home/area.js" type="text/javascript"></script>
                       	<script type="text/javascript">
                          var opt0 = ["<?php if($data["city"] != ''): echo ($data["city"]["0"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ''): echo ($data["city"]["1"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ''): echo ($data["city"]["2"]); else: ?>请选择<?php endif; ?>"];
                          $("#s_province").click(function(){
                            opt0 = ["请选择","请选择","请选择"];
                          })
                            _init_area();
                          </script>
                       </div>
                    </div>
                    <div class="pheig">
                    	<div class="pflat1">详细地址：</div>
                        <div class="pflat2"><input type="birthday" class="inputcs"  name="d_detail"  value="<?php echo ($data["d_detail"]); ?>"></div>
                    </div>


                    <div class="pheig">
                    	<div class="pflat1">生日：</div>
                        <div class="pflat2"><input type="birthday" class="inputcs"  name="birth"  value="<?php echo ($data["birth"]); ?>" onclick="WdatePicker({isShowWeek:true})"></div>
                    </div>
                    <div class="pheig">
                    	<div class="pflat1">邮箱：</div>
                        <div class="pflat2"><input type="email" class="inputcs"  name="email" value="<?php echo ($data["email"]); ?>"></div>
                    </div>
                     <div class="pheig">
                    	<div class="pflat1">QQ:</div>
                        <div class="pflat2"><input type="text" class="inputcs"   name="qq" value="<?php echo ($data["qq"]); ?>"/></div>
                    </div>
                    
                    <div class="pheig">
                    	<div class="pflat1">个人简介:</div>
                        <div class="pflat2"><textarea rows="5" cols="70" name="content" id="pregrjj" style="resize:none;" /><?php echo ($data["content"]); ?></textarea></div>
                    </div>                  
   
   
                    <div class="pheig psub">
						<input type="submit" class="subinput" name="submit" value="确认保存"  id="perqreng"/>
                    </div>                                       


                    <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                    <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
                 </form>   
     </div>
</div>

</body>
</html>
<script src="__ROOT__/public/js/home/common.js"></script>
<script type="text/javascript">
window.onload = function(){
  /*var question="<?php echo ($data["p_question"]); ?>";
  $("select[name=p_question]").find("option").each(function(){
      if($(this).val() && $(this).val()===question){
          $(this).attr("selected","selected");
      }
  })*/
  var fm = document.forms['set'],name = fm.elements['rname'],submit = fm.elements['submit'];
  $(function(){$(submit).click(function(){
      var na = $(name).val();
        if(na == ""||na == null){$('.prompt').text("昵称不能为空");return false;
        }else{
            function leng(na){
              var len = 0;for(var i=0;i<na.length;i++){if(na[i].charCodeAt(0)<299){len++;}else{len+=2;}}return len;}
              if(leng(na)>12){$('.prompt').text("您的昵称太长啦");return false;
            }
        }
        
      })
  })
}  
</script>