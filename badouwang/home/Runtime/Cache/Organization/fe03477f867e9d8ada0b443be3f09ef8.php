<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——课程管理</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<script src="__ROOT__/public/js/validater.js"></script>
</head>
<body>
<div class="per">
     <div class="per-top">
          <img src="__ROOT__/public/images/home/zjkc1.jpg" />
          <p class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>课程</p>
     </div>


     <div class="per-form">
          <form action="" method="post" enctype="multipart/form-data" id="dataform">
           <div class="pheig">
              <div class="pflat1">课程名称：</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs" name="aname" id='aname' value="<?php echo ($data["aname"]); ?>" />
                    <span class="prompt">课程名称，中英文均可， 不超过20字符</span>
              </div>
           </div>
           <div class="pheig">
              <div class="pflat1">课程Log：</div>
              <div class="pflat2 pflat2tx">
              		<input type="file" id="c_img"  name="c_img" />
                        <?php if($data["c_img"] != ''): ?><img src="__ROOT__<?php echo ($data["c_img"]); ?>" /><?php endif; ?>
              </div>
           </div>
           <div class="pheig">
              <div class="pflat1">课程价格：</div>
              <div class="pflat2">
              		<input type="text"  class="inputcs" name="price" id="price" value="<?php echo ($data["price"]); ?>" />
                    <span class="prompt">课程价格（元）</span>
              </div>
           </div>
           <div class="pheig">
              <div class="pflat1">课程分类：</div>
              <div class="pflat2" id="cid">
                    
              </div>
              <span class="prompt"></span>
           </div>

           <div class="pheigtet">
              <div class="pflat1">课程简介:</div>
              <div class="pflat2">
              		<textarea name="introduce" id="introduce" class="pregrjj"/><?php echo ($data["introduce"]); ?></textarea>
                    <span class="prompt">课程简介，不超过100字符</span>
              </div>
           </div>
           
           <div class="pheigtet">
              <div class="pflat1">课程详情:</div>
              <div class="pflat2">
					<textarea name="descript" id="descript" class="pregrjj"/><?php echo ($data["descript"]); ?></textarea>
                    <span class="prompt">课程详情，不超过400字符</span>
              </div>
           </div>

           <div class="pheig psub">
				<input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
                <input type="hidden" name="id" value="<?php echo ($id); ?>">
                <input type="hidden" name="cid" value="">
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
           </div>
        </form>   
    </div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script src="__ROOT__/public/js/classfiy.js"></script>
<script>
            $("#dataform").submit(function(){
                $("#cname").val($("select[name=class]:last").val());
                var nullcheck=new Array('aname','introduce','price','descript');
                var nullinfo=new Array('课程名称','课程简介','课程价格','课程详情');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                     var pattern=/(\d+)(\.){0,1}(\d+)/
                     if($("#price").val().match(pattern)){
                         var cid=$("#cid").find("select:last").val();
                         if(cid!=='请选择分类'){
                              $("input[name=cid]").val(cid);
                             
                              return true;
                         }else{
                              $("#cid").parent().find(".prompt").text("请选择课程分类!").css("color","red");
                             return false;
                         }
                     }else{
                         $("#price").parent().find(".prompt").text("课程价格格式不正确!").css("color","red");
                         return false;
                     }
                     $(this).attr('action',$(this).attr('action')+"?c")
                     return true;
                  }
                  return false;

            });
			
	    $(function(){
                var cid="<?php echo ($data["cid"]); ?>";
                initclass('cid','培训分类','','',cid);
            })
</script>
</body>
</html>