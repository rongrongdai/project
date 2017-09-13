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
          <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>课程</div>
     </div>

     <div class="per-form">
          <form action="" method="post" enctype="multipart/form-data" id="dataform">
                    <div class="pheig">
              		<div class="pflat1">优惠卷名称：</div>
              		<div class="pflat2">
                            <input type="text" class="inputcs"  name="name" id='name' value="<?php echo ($data["cname"]); ?>" />
                            <span class="prompt">优惠券名称， 不超过20字符</span>
              		</div>
                    </div> 
                    <div class="pheig">
              		<div class="pflat1">优惠卷价格：</div>
              		<div class="pflat2">
                            <input type="text" class="inputcs"  name="price" id='price' value="<?php echo ($data["price"]); ?>" />
                            <span class="prompt">优惠券价格(元)</span>
              		</div>
                    </div> 
                    <div class="pheig">
              		<div class="pflat1">优惠卷数目：</div>
              		<div class="pflat2">
                            <input type="text" class="inputcs"  name="number" id='number' value="<?php echo ($data["cname"]); ?>" />
                            <span class="prompt">优惠券数目(张)</span>
              		</div>
                    </div> 

		    <div class="pheig">
              		<div class="pflat1">优惠券背景图:</div>
              		<div class="pflat2">
                           <input type="file" id="bac_img"  name="bac_img" />
                           <?php if($data["bac_img"] != ''): ?><img src="__ROOT__<?php echo ($data["bac_img"]); ?>"<?php endif; ?>
                           <span class="prompt">背景图(如无，系统默认！)，147*215像素最佳 例如：</span><br /><img src='__ROOT__/public/images/home/bond.png' width='147' height="215" style='margin-top:10px;'/>
              		</div>
                    </div>
                   
              <div style='clear:both;'></div>
		    <div class="pheigtet">
              		<div class="pflat1">优惠说明:</div>
              		<div class="pflat2">
                            <textarea name="descript" id="descript" class="pregrjj"/><?php echo ($data["descript"]); ?></textarea>
                            <span class="prompt">优惠规则,请以英文状态下分号分割,不超过100字符</span>
              		</div>
                    </div> 
		<div class="pheig psub">
		    <input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
                    <input type="hidden" name="id" value="<?php echo ($id); ?>">
                    <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                    <input type="hidden" name="cid" value="" /> 
                    <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>                    
            	</div> 
          </form>   
     </div>
</div>


<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('name','price','number','descript');
                var nullinfo=new Array('优惠券名称','优惠券面额','优惠券数目','优惠券说明');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                     var cid=$("#cid").find("select:last").val();
                     if(cid!=='请选择分类'){
                       $("input[name=cid]").val(cid);
                       return true;  
                     }
                     $("#cid").parent().find(".prompt").text('请选择分类').css("color","red");
                     return false;
                  }
                  return false;
            });
            $(function(){
                var id="<?php echo ($data["oid"]); ?>";
                $("#"+id).attr("selected","selected");
            })	
            $(function(){
                var cid="<?php echo ($cid); ?>";
                initclass(cid,'课程分类','','');
            })
           
</script>
</body>
</html>