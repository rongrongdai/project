<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——预约报名</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>

<body style="margin:8px;">

<div class="per">
        <div class="per-make">
             <div class="make aclick">我的考场</div>
        </div>

       <h2><a href="#" id="tjlx">套卷练习</a>  <a href="#" id="dzsj">定制试卷</a>
       </h2>
       <div id="tjl" style="height:200px;border:1px red solid;display:block;font-size:20px;margin:20px;padding:20px;"><a href="#">金融类</a></div>

       <div id="dzs" style="height:200px;border:1px green solid;display:none;font-size:20px;margin:20px;padding:20px;">
         <ul>
           <li>已成功添加:<?php echo ($res1["0"]["sid"]); ?>套试卷，总共:<?php echo ($res1["0"]["total"]); ?>道题</li>
           <li>单选题:<?php echo ($res["0"]["total"]); ?>道，选<input type="text" name="dan" value="2" id="dan" style="width:50px;height:20px;"/>道</li>
           <li>多选题:<?php echo ($res["1"]["total"]); ?>道，选<input type="text" name="duo" value="2" id="duo" style="width:50px;height:20px;">道</li>
           <li><button type="submit" id="xuan">提交</button>
         </ul>
       </div>
   </div>



<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>

<script>
var pb = {"display":"block"},pn = {'display':'none'};
$("#tjlx").click(function(){$("#tjl").css(pb);$("#dzs").css(pn)});
$("#dzsj").click(function(){$("#tjl").css(pn);$("#dzs").css(pb)});


$("#xuan").click(function(){
  var dan = $("#dan").val(),duo = $("#duo").val();
  $.get("__ROOT__/index.php/Ajax/AjaxExam/exam",{'dan':dan,'duo':duo},function(data){
      if(data){
        layer.confirm('选题成功，本次你将花费0学豆', function(){
         window.location.href = "__ROOT__/index.php/Exam/Exam/paper?tid="+data;
        },function(){
          layer.msg('你已经取消进入考场',1,-1);
        });
      }
  });
})
$("#tjl").click(function(){
  layer.confirm('本次套卷练习你将花费0学豆',function(){
    window.location.href = "__ROOT__/index.php/Exam/Exam/paper";
  });
});

</script>
</body>
</html>