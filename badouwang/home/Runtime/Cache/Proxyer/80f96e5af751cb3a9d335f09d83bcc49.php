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
         <img src="__ROOT__/public/images/home/xiaotu.gif" />
         <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>培训机构</div>
    </div>

    <div class="per-form">
         <form action="" method="post" enctype="multipart/form-data" id="dataform">
            <div class="pheig">
              <div class="pflat1">培训机构名：</div>
              <div class="pflat2">
              	<input type="text"  class="inputcs" name="oname" id='oname' value="<?php echo ($data["oname"]); ?>" />
                <span class="prompt">培训机构姓名， 不超过20字符</span>
              </div>
            </div>  
            
            <div class="pheigtet">
              <div class="pflat1">培训机构简介:</div>
              <div class="pflat2">
              	<textarea name="tintroduce" id="tintroduce" class="pregrjj"/><?php echo ($data["tintroduce"]); ?></textarea>
                <span class="prompt">培训机构简介，不超过100字符</span>
              </div>
            </div>      

            <div class="pheig">
              <div class="pflat1">培训机构图像:</div>
              <div class="pflat2">
              	<input type="file" id="o_img"  name="o_img" />

                <?php if($data["o_img"] != ''): ?><img src="__ROOT__<?php echo ($data["o_img"]); ?>" ><?php endif; ?>

              </div>
            </div> 

            <div class="pheig">
              <div class="pflat1">推荐语:</div>
              <div class="pflat2">
              	<input type="text" class="inputcs" name="treson" id="tcourse" value="<?php echo ($data["treson"]); ?>" />
                <span class="prompt"></span>
              </div>
            </div> 

            <div class="pheig">
              <div class="pflat1">联系电话:</div>
              <div class="pflat2">
              	<input type="text"  class="inputcs" name="telephone" id="telephone" value="<?php echo ($data["telephone"]); ?>" />
                <span class="prompt"></span>
              </div>
            </div> 

            <div class="pheig">
              <div class="pflat1">机构地址：</div>
              <div class="pflat2">
              	<input type="text"  name="o_address" id="o_address" value="<?php echo ($data["o_address"]); ?>" />
                <span class="prompt"></span>
              </div>
            </div>  

            <div class="pheig">
              <div class="pflat1">服务区域：</div>
              <div class="pflat2">
                       <select id="s_province" name="s_province"></select>
                       <select id="s_city" name="s_city"></select>
                       <select id="s_county" name="s_county"></select>
                       <script src="__ROOT__/public/js/home/area.js" type="text/javascript"></script>
                       <script type="text/javascript">var opt0 = ["<?php if($add): echo ($add["0"]); else: ?>请选择<?php endif; ?>","<?php if($add): echo ($add["1"]); else: ?>请选择<?php endif; ?>","<?php if($add): echo ($add["2"]); else: ?>请选择<?php endif; ?>"];_init_area();</script>
                	   <span class="prompt"></span>
              </div>
            </div>


            <div class="pheig psub">
				<input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
                <input type="hidden" name="id" value="<?php echo ($id); ?>">
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>                
            </div> 
        </div>
         </form>   
    </div>
</div>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('oname','tintroduce','telephone','o_address');
                var nullinfo=new Array('机构名','机构简介','联系电话','机构地址');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".hint").text(res[1]).css("color","red");
                      return false;
                  }else{
                    if($("#s_county").val() && $("#s_county").val()!=='请选择' ){
                        return true;
                    }else{
                        $("#s_county").parent().find(".hint").text("请选择服务区域").css("color","red");
                        return false;
                    }
                  }
                  return false;
            });
			
			




			
//父页面获取框架高度自动调整
ifram()   //运行
var he = $(document).height();
function ifram(){	$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	}) 		}
$(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高度
 </script>
</body>
</html>