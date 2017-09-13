<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>

</head>
<body>

<div class="per">
     <div class="per-top">
          <img src="__ROOT__/public/images/home/jjxxgl1.jpg" />
          <p class="set-up">家教信息设置</p>
     </div>

     <div class="per-form" id="dataform">
        <form action="" method="post" enctype="multipart/form-data">
        
           <div class="pheig">
              <div class="pflat1">推荐语：</div>
              <div class="pflat2"><input type="text" id="title"  class="inputcs" name="title" value="<?php echo ($data["info"]); ?>"/></div>
              <span class="prompt"></span>
           </div>  
                             
           <div class="pheig">
              <div class="pflat1">教育分类：</div>
              <div class="pflat2" id="cid"></div>
              <span class="prompt"></span>
           </div>
           <div class="pheig">
              <div class="pflat1">所在区域：</div>
              <div class="pflat2">
                        	<select id="s_province" name="s_province"></select>
                       		<select id="s_city" name="s_city"></select>
                       		<select id="s_county" name="s_county"></select>
                       		<script src="__ROOT__/public/js/home/area.js" type="text/javascript"></script>
                       		<script type="text/javascript">var opt0 = ["<?php if($data["city"] != ""): echo ($data["city"]["0"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ""): echo ($data["city"]["1"]); else: ?>请选择<?php endif; ?>","<?php if($data["city"] != ""): echo ($data["city"]["2"]); else: ?>请选择<?php endif; ?>"];_init_area();</script>
               </div>
           </div>
           <div class="pheig">
              <div class="pflat1">图片上传:</div>
              <div class="pflat2 pflat2tx"><input type="file"  name="c_img" /></div>
           </div> 
           <div class="pheig psub">
              <input type="submit" class="subinput" name="submit" value="确认提交"  id="perqreng"/>
           </div>  
            <input type="hidden" name="cid"  value=""/>
            <input type="hidden" name="grade" value=""/>
            <input type="hidden" name="token" value="<?php echo ($token); ?>" />
            <input name="timestamp" type="hidden" value="<?php echo ($timestamp); ?>" />
      </form>   
	</div>
</div>
    <script src="__ROOT__/public/js/classfiy.js"></script>
    <script src="__ROOT__/public/js/validater.js"></script>
    <script src="__ROOT__/public/js/home/common.js"></script>
<script>
    $(function(){
        var cid="<?php echo ($data["cid"]); ?>";
        initclass('cid','家教分类','','',cid);
        if(cid){
            $("#cid").find("select:last").find("option").each(function(){
                if($(this).val()===cid){
                    $(this).attr("selected","selected");
                }
            })
        }
        $("#dataform").submit(function(){
            var nullcheck=new Array('title');
            var nullinfo=new Array('标题');
            var res=null_check(nullcheck,nullinfo);
            if(!res){
                var cid=$("#cid").find("select:last").val();
                if(cid==='请选择分类'){
                   $("#cid").parent().find(".prompt").text('请选择教育分类').css("color","red"); 
                   return false;
                }else{
                    $("input[name=cid]").val(cid);
                }
                return true;
            }else{
                $("#"+res[0]).parent().parent().find(".prompt").text(res[1]).css("color","red");
            }
            return false;
        })
        
    })
</script>
</body>
</html>