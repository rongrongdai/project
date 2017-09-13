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
         <img src="__ROOT__/public/images/home/fbsz1.jpg" />
         <p class="set-up">教师发布</p>
     </div>
     <div class="per-form">
         <form action="__URL__/domessage" method="post" enctype="multipart/form-data" id="dataform">
           <div class="pheig">
              <div class="pflat1">标题：</div>
              <div class="pflat2"><input type="text"  class="inputcs"  name="title" id="title"/></div>
              <span class="hint"></span>
           </div>  
                             
           <div class="pheig">
              <div class="pflat1">教育分类：</div>
              <div class="pflat2" id='tclass'></div>
              <span class="hint"></span>
           </div>

            <div class="pheig">
              <div class="pflat1">所在区域：</div>
              <div class="pflat2" id="getcity"></div>
                <span class="hint"></span>
           </div>

           <div class="pheig">
              <div class="pflat1">图片上传:</div>
              <div class="pflat2 pflat2tx"><input type="file"  name="c_img" id="c_img" /></div>
              <span class="hint"></span>
           </div> 

           <div class="pheig">
              <div class="pflat1">上课时间段:</div>
              <div class="pflat2"><select name="dtime" id="dtime"><option>请选择</option><option value="周末">周末</option><option value="晚上">晚上</option><option value="自由安排">自由安排</option></select></div>
              <span class="hint"></span>
           </div> 

           <div class="pheig">
              <div class="pflat1">价格:</div>
              <div class="pflat2"><input type="text"  class="inputcs" name="price" id="price"/></div>
              <span class="hint"></span>
           </div>
                             
           <div class="pheigtet">
              <div class="pflat1">招生简介：</div>
              <div class="pflat2"><textarea rows="5" cols="60" name="introduce" id="introduce"></textarea></div>
              <span class="hint"></span>
           </div> 

           <div class="pheig">
              <div class="pflat1">招生详情：</div>
              <div class="pflat2"><?php echo ($txt); ?></div>
              <span class="hint"></span>
           </div> 


           <div class="pheig psub">
              <input type="submit" class="subinput" name="submit" value="确认提交"  id="perqreng"/>
              <input type="hidden" id="uid" value="<?php echo (session('uid')); ?>" />
              <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
              <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
           </div> 
		</form>   
     </div>
</div>

</body>
</html>
<script src="__ROOT__/public/js/validater.js"></script>
<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script>

window.onload = function(){
    //initClass('class','家教分类');
    getTclass('家教分类');//获取家教分类
    getCity();
    $("#dataform").submit(function(){
      //表单验证
      var narr=new Array('title','c_img','price','introduce');
      var ninfo=new Array('家教标题','图片','家教价格','招生简介');
      var res=null_check(narr,ninfo);
      if(!res){
        if($("#dtime").val()==='请选择'){
          $("#dtime").parent().parent().find(".hint").text('请选择上课时间段').css("color",'red');
          return false;
        }

        if($("#fid").val()==='0'){
          $("#fid").parent().parent().find(".hint").text('请选择家教分类！').css("color",'red');
          return false;
        }
        if($("#gid").val()==='0'){
          $("#gid").parent().parent().find(".hint").text('请选择家教分类！').css("color",'red');
          return false;
        }

        if($("#city option:selected").text()==='请选择'){
          $("#city").parent().parent().find(".hint").text('请选择所在区域').css("color",'red');
          return false;
        }
        if($("#district").val()==='0'){
          $("#district").parent().parent().find(".hint").text('请选择所在区域').css("color",'red');
          return false;
        }else{//判断学豆值,发布次数
          var vmoney = "<?php echo ($vmoney); ?>",vcount = "<?php echo ($vcount); ?>";
          if(vmoney >= 10 || vcount < 3){
            return true;
          }else{
            layer.confirm('你的学豆不足，立刻充值', function(){
              window.location.href = "__APP__/User/User/index";
            },function(){
              layer.msg('取消成功',1,-1);
            });
          }

          return false;
        }
    }else{
        $("#"+res[0]).parent().parent().find('.hint').text(res[1]).css("color",'red');
        return false;
      }

        return false; 
    })
}

var he = $(window).height()+200;  //父页面获取框架高度自动调整  
  function ifram(){ $(window.parent.document).find("#irm").load(function(){ $(this).height(he);});}
  $(window).resize(function(){ifram();})// 改变浏览器可视窗口宽度与高度
  ifram();//运行

</script>