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
           <img src="__ROOT__/public/images/home/dlssz.jpg" />
           <p class="set-up">代理信息设置</p>
      </div>

      <div class="per-form">
           <form action="" method="post" enctype="multipart/form-data" id="dataform">

          <div class="pheig">
              <div class="pflat1">真实姓名：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" id="real_name" name="real_name" value="<?php echo ($data["real_name"]); ?>" />
                    <span class="prompt">代理商真实姓名，不超过20字符</span>
              </div>
          </div>

          <div class="pheig">
              <div class="pflat1">公司名称:</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" name="company" value="<?php echo ($data["company"]); ?>" />
                    <span class="prompt">公司名称，没有可不填写，不超过50字符</span>
              </div>
          </div>

          <div class="pheig">
              <div class="pflat1">代理地域：</div>
              <div class="pflat2">
              		   <select id="s_province" name="s_province"></select>
                       <select id="s_city" name="s_city"></select>
                       <select id="s_county" name="s_county"></select>
                       <script src="__ROOT__/public/js/home/area.js" type="text/javascript"></script>
                       <script type="text/javascript">
					   var opt0 = ["<?php if($data["city"] != ""): echo ($data["city"]["0"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ""): echo ($data["city"]["1"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ""): echo ($data["city"]["2"]); else: ?>请选择<?php endif; ?>"];
					   _init_area();
                       </script>
                       <span class="prompt"></span>
              </div>
          </div>

          <div class="pheig">
              <div class="pflat1">常住地址:</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs" name="address" id="address" value="<?php echo ($data["address"]); ?>" />
                    <span class="prompt">常住详细地址，不超过100字符</span>
              </div>
          </div>
           <div class="pheig">
              <div class="pflat1">公司官网:</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs" name="c_url" id="c_url" value="<?php echo ($data["c_url"]); ?>" />
                    <span class="prompt">官方网站，不超过100字符</span>
              </div>
          </div>
          <div class="pheig">
              <div class="pflat1">动态消息:</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs" name="dymess" id="dymess" value="<?php echo ($data["dymess"]); ?>" />
                    <span class="prompt">主页动态消息设置，不超过100字符</span>
              </div>
          </div>
          <div class="pheig">
              <div class="pflat1">联系人电话:</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" name="telephone" id="telephone" value="<?php echo ($data["telephone"]); ?>"/>
                    <span class="prompt"></span>
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



<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('real_name','address','telephone');
                var nullinfo=new Array('真实姓名','个人地址','手机号码');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                      if($("#s_city").val()=='请选择'){
                          $("#s_city").parent().find(".prompt").text("请选择代理区域！").css("color","red");
                          return false;
                      }else{
                          res=phone_check('telephone');
                          if($("#c_url").val() && $("#c_url").val().length>100){
                              $(this).next(".prompt").text("连接地址过长！").css("color","red");
                              return false;
                          }
                          if(res===true){
                              return true;
                          }else{
                              $("#telephone").parent().find("prompt").text("手机号码格式不正确！").css("color","red");
                              return false;
                          }
                      }
                      
                  }
                  return false;
            });
          $(function(){
              $("#s_county").css("display","none");
          })
		  








		  
//父页面获取框架高度自动调整
ifram()   //运行
var he = $(document).height();
function ifram(){	$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	}) 		}
$(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高度
</script>
</body>
</html>