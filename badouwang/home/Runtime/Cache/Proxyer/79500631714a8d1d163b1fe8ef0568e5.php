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
            <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>老师</div>
      </div>


      <div class="per-form">
        <form action="" method="post" enctype="multipart/form-data" id="dataform">
          <div class="pheig">
              <div class="pflat1">老师姓名：</div>
              <div class="pflat2">
              		<input type="text" class="inputcs" name="tname" id='tname' value="<?php echo ($data["tname"]); ?>" />
                    <span class="prompt">老师姓名， 不超过20字符</span>
              </div>
          </div>

          <div class="pheigtet">
              <div class="pflat1">老师简介:</div>
              <div class="pflat2">
              		<textarea name="tintroduce" id="tintroduce" class="pregrjj"/><?php echo ($data["tintroduce"]); ?></textarea>
                    <span class="prompt">老师简介，不超过100字符</span>
              </div>
          </div>

          <div class="pheig">
              <div class="pflat1">老师图像:</div>
              <div class="pflat2 pflat2tx">
					<input type="file" id="timg"  name="timg" />
                    <?php if($data["timg"] != ''): ?><img src="__ROOT__<?php echo ($data["timg"]); ?>"<?php endif; ?>
              </div>
          </div>
                       
          <div class="pheig">
              <div class="pflat1">家教分类：</div>
              <div class="pflat2" id="cid">
              </div>
              <span class="prompt"></span>
          </div>
 
          <div class="pheig">
              <div class="pflat1">推荐语:</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs"  name="treson" id="tcourse" value="<?php echo ($data["treson"]); ?>" />
                    <span class="prompt"></span>
              </div>
          </div>
          <div class="pheig">
              <div class="pflat1">联系电话:</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs"  name="telephone" id="telephone" value="<?php echo ($data["telephone"]); ?>" />
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
                       <script type="text/javascript">var opt0 = ["<?php if($add): echo ($add[0]); else: ?>请选择<?php endif; ?>","<?php if($add): echo ($add["1"]); else: ?>请选择<?php endif; ?>","<?php if($add): echo ($add["2"]); else: ?>请选择<?php endif; ?>"];_init_area();</script>
                    <span class="prompt"></span>
              </div>
          </div>

          
          
         <div class="pheig psub">
		<input type="submit" class="subinput" value="确认保存"  id="perqreng"/>
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="cid" value=""/>
                <input type="hidden" name="grade" value=""/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
                <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
          </div>
		</form>   
    </div>
</div>



<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('tname','tintroduce','telephone');
                var nullinfo=new Array('教师姓名','教师简介','联系电话');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                    if($("#s_county").val() && $("#s_county").val()!=='请选择'){
                        var cid=$("#cid").find("select:last").val();
                        var grade=$("#grade").find("select:last").val();
                        if(cid==='请选择分类'){
                            $("#cid").parent().find(".prompt").text("请选择课程分类！").css("color","red");
                            return false;
                        }
                        $("input[name=cid]").val(cid);
                        $("input[name=grade]").val(grade);
                        return true;
                    }else{
                        $("#s_county").parent().find(".prompt").text("请选择服务区域").css("color","red");
                    }
                  }
                  return false;
            }); 
            $(function(){
                var cid="<?php echo ($cid); ?>";
                var grade="<?php echo ($grade); ?>";
                initclass('cid','家教分类','','',cid);
            })
            
</script>
</body>
</html>