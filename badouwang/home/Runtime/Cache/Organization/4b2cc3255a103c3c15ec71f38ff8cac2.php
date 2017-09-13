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
          <img src="__ROOT__/public/images/home/fbsz1.jpg" />
          <p class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>消息</p>
     </div>

     <div class="per-form">
          <form action="" method="post" enctype="multipart/form-data" id="dataform">

           <div class="pheig">
              <div class="pflat1">课程名称：</div>
              <div class="pflat2">
                      <select name="cid">
                      <option>请选择课程</option>
                      <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><option value="<?php echo ($course["id"]); ?>" id="<?php echo ($course["id"]); ?>"><?php echo ($course['aname']); ?></option><?php endforeach; endif; ?>
                      </select>
              </div>
           </div>
           
           <div class="pheig">
              <div class="pflat1">开始时间：</div>
              <div class="pflat2"><input type="text" class="inputcs" id="s_time"  name="s_time" onclick="WdatePicker({isShowWeek:true})" value="<?php echo ($data["s_time"]); ?>"/></div>
           </div>
           <div class="pheig">
              <div class="pflat1">招生人数：</div>
              <div class="pflat2"><input type="text" class="inputcs" id="number"  name="number"  value="<?php echo ($data["s_time"]); ?>"/></div>
           </div>
           <div class="pheig">
              <div class="pflat1">结束时间：</div>
              <div class="pflat2"><input type="text" class="inputcs" id="e_time" name="e_time" onclick="WdatePicker({isShowWeek:true})" value="<?php echo ($data["e_time"]); ?>"/></div>
           </div>

           <div class="pheig">
              <div class="pflat1">课程价格:</div>
              <div class="pflat2"><input type="text" class="inputcs" id="price"  name="price"  value="<?php echo ($data["price"]); ?>"/></div>
           </div>
           
           <div class="pheig">
              <div class="pflat1">优惠价格:</div>
              <div class="pflat2"><input type="text" class="inputcs" id="d_price"  name="d_price"  value='<?php echo ($data["d_price"]); ?>'/></div>
           </div>
           
           <div class="pheig">
              <div class="pflat1">课程详情:</div>
              <div class="pflat2"><?php echo ($edit); ?></div>
           </div>
                      
           <div class="pheig psub">
				<input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
                <input type="hidden" name="id" value="<?php echo ($id); ?>">
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
           </div>
        </form>   
    </div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>        
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('price','s_time','e_time','number');
                var nullinfo=new Array('课程价格','开始时间','结束时间','招生人数');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".hint").text(res[1]).css("color","red");
                      return false;
                  }else{
                     return true;
                  }
                  return false;
            });
            $(function(){
                var s="<?php echo ($data["cid"]); ?>";
                var content="<?php echo ($data["descript"]); ?>"===''?'请输入内容':'<?php echo ($data["descript"]); ?>';
                $("#"+s).attr("selected","selected");
                ue.options.autoClearinitialContent=false;
                ue.options.initialContent=content;
            })
</script>
</body>
</html>