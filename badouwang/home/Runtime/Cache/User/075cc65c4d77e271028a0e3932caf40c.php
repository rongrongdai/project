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
          <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/hy3.gif" />
          <p class="set-up">申请认证</p>
      </div>

      <div class="per-form">
          <?php if($data["verified"] == 3): ?><div class="pheig">
              <div class="pflat1">当前状态：</div>
              <div class="pflat2">申请等待中···</div>
          </div> 
                 
          <div class="pheig">
              <div class="pflat1">认证类型：</div>
              <div class="pflat2"><?php echo ($data["type"]); ?></div>
          </div>          
        
		  <?php elseif($data["verified"] == 1): ?>
          
          <div class="pheig">
              <div class="pflat1">当前状态：</div>
              <div class="pflat2">通过</div>
          </div>
          
          <div class="pheig">
              <div class="pflat1">认证类型：</div>
              <div class="pflat2"><?php echo ($data["type"]); ?></div>
          </div>          

          <div class="pheig">
              <div class="pflat1">电话：</div>
              <div class="pflat2"><?php echo ($data["telephone"]); ?></div>
          </div>  
  
          <div class="pheig">
              <div class="pflat1">所在城市：</div>
              <div class="pflat2"><?php echo ($data["city"]); ?></div>
          </div>   
  
          <div class="pheig">
              <div class="pflat1">地址：</div>
              <div class="pflat2"><?php echo ($data["address"]); ?></div>
          </div>     
  
           <div class="pheig">
              <div class="pflat1">通过日期：</div>
              <div class="pflat2"><?php echo (date("Y年m月d日",$data["ctime"])); ?></div>
          </div>  
  
      <?php elseif($data["verified"] == 2): ?>

           <div class="pheig">
              <div class="pflat1">当前状态：</div>
              <div class="pflat2">未能通过</div>
          </div>  

           <div class="pheig">
              <div class="pflat1">认证类型：</div>
              <div class="pflat2"><?php echo ($data["type"]); ?></div>
          </div>

           <div class="pheig">
              <div class="pflat1">失败原因：</div>
              <div class="pflat2">您提交的信息不全或不真实<button>完善申请</button></div>
          </div>

      <?php else: ?> 
          
          <form action="__URL__/doapply" method="post" enctype="multipart/form-data" id="rzform">
           <div class="pheig">
              <div class="pflat1">认证类别：</div>
              <div class="pflat2  pflat2pb">
                  <input type="radio" id="rz1" class="inputcs" name="type" value="1" checked="checked"/><span>教师</span>
                  <input type="radio" id="rz2" class="inputcs" name="type" value="2" /><span>机构</span>
                  <input type="radio" id="rz3" class="inputcs" name="type" value="3" /><span>代理</span>
                  <span>您只能选择其中一种身份。</span>
              </div>
          </div>

          <div class="pheig">
              <div class="pflat1">当前选择：</div>
              <div class="pflat2" id="rzs" style="color:#f93;font-size:18px;">教师认证</div>
          </div>

          <div class="pheig">
              <div id="name" class="pflat1">真实姓名：</div>
              <div class="pflat2"><input type="text" class="inputcs"  name="real_name" id="real_name"/><span class="hint"></span></div>
          </div>

           <div class="pheig">
              <div id="phone" class="pflat1">手机号码：</div>
              <div class="pflat2"><input type="text" class="inputcs"  name="telephone" id="telephone"/><span class="hint"></span></div>
          </div>

      <div id="sq1" style="display:block;">
          <div id="kcfl" class="pheig">
              <div class="pflat1">科目分类：</div>
              <div class="pflat2" id="tclass"></div><span class="hint"></span>
          </div>   
           <div class="pheig">
              <div class="pflat1">正面照片：</div>
              <div class="pflat2"><input type="file" name="id_front" id="id_front" /><span class="hint"></span></div>
          </div>
          <div id="kcfl" class="pheig">
              <div class="pflat1">自我评价：</div>
              <div class="pflat2"><input type="text" id="info"  class="inputcs" name="info" /><span class="hint"></span></div>
          </div>
          <div id="kcfl" class="pheig">
              <div class="pflat1">毕业学校：</div>
              <div class="pflat2"><input type="text" id="school" class="inputcs" name="school" /><span class="hint"></span></div>
          </div>
          <div id="kcfl" class="pheig">
              <div class="pflat1">邀请码：</div>
              <div class="pflat2"><input type="text" id="invite" class="inputcs" name="invite" placeholder="无邀请码，留空" /><span class="hint"> 拥有邀请码，可成为平台老师</span></div>
          </div> 
      </div> 

      <div id="sq2" style="display:none;">
          <div id="kcfl" class="pheig">
              <div class="pflat1">课程分类：</div>
              <div class="pflat2"><input type="text" class="inputcs"  name="grade" id="grade" /><span class="hint"></span></div>
          </div>
           <div class="pheig">
              <div class="pflat1">营业执照：</div>
              <div class="pflat2"><input type="file" name="lincence" id="lincence"/><span class="hint"></span></div>
          </div>
          <div class="pheig">
              <div class="pflat1">机构Log：</div>
              <div class="pflat2">
                  <input type="file"  name="id_img" id="id_img" /><span class="hint">最佳尺寸：232*137像素！</span>
              </div>
              
          </div>               
      </div>

      <div id="sq3" style="display:none;">
          <div class="pheig">
              <div class="pflat1">营业执照：</div>
              <div class="pflat2"><input type="file" name="lincence" id="lincence"/><span class="hint"></span></div>
          </div>
          <div class="pheig">
              <div class="pflat1">公司官网:</div>
              <div class="pflat2"><input type="text"  class="inputcs" name="c_url" id="c_url" /><span class="hint">官方网站，不超过100字符</span>
              </div>
          </div>
          <div class="pheig">
              <div class="pflat1">动态消息:</div>
              <div class="pflat2"><input type="text"  class="inputcs" name="dymess" id="dymess" /><span class="hint">主页动态消息设置，不超过100字符</span>
              </div>
          </div>
      </div>

           <div class="pheig">
              <div class="pflat1">选择城市：</div>
              <div class="pflat2"  id="getcity"></div><span class="hint"></span>
          </div>

           <div class="pheig">
              <div class="pflat1">详细地址：</div>
              <div class="pflat2"><input type="text" class="inputcs" name="address" id="address" /><span class="hint"></span></div>
          </div>
           <div class="pheigtet">
              <div class="pflat1">简　　介：</div>
              <div class="pflat2"><textarea type="text" name="self_info"  id="self_info"></textarea><span class="hint"></span></div>
          </div>


           <div class="pheig psub">
				<input type="submit" class="subinput" name="submit" value="确认提交"  id="perqreng"/>
          </div>
          <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
          <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>

 
          </form><?php endif; ?>         
      </div> 
</div>

    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/classfiy.js"></script>
<script>
  getTclass("家教分类");//获取家教分类
  getCity();
//认证类型切换
  var dpb = {"display":"block"},dpn = {"display":"none"};
  $("#rz1").click(function(){$("#sq1").css(dpb);$("#sq2").css(dpn);$("#sq3").css(dpn);$("#rzs").text("教师认证");$("#name").text("真实姓名：");$("#phone").text("手机号码：")});
  $("#rz2").click(function(){$("#sq2").css(dpb);$("#sq1").css(dpn);$("#sq3").css(dpn);$("#rzs").text("机构认证");$("#name").text("机构名称：");$("#phone").text("电话号码：")});
  $("#rz3").click(function(){$("#sq3").css(dpb);$("#sq2").css(dpn);$("#sq1").css(dpn);$("#rzs").text("代理商认证");$("#name").text("公司名称：");$("#phone").text("电话号码：")});
//修改城市的提示
  $("#city").mouseover(function(){var span = this.nextSibling;span.innerHTML = "修改城市：信息管理 -> 个人设置"});
  $("#city").mouseout(function(){var span = this.nextSibling;span.innerHTML = ""});


//验证邀请码
$("#invite").blur(function(){
  var val = $(this).val();
  if(val.length >= 1 && (/\S/).test(val)){
    $.post("__APP__/Ajax/AjaxTeach/verifyCode",{'code':val},function(data){
      if(data==='success'){
        $("#invite").parent().find(".hint").html("<font color='green'>正确</font>");
      }else{
        $("#invite").parent().find(".hint").html("<font color='red'>"+data+"</font>");
      }
    },'json');
  }
});


$("#rzform").submit(function(){
  var nullcheck=new Array('real_name','telephone','address','self_info'), nullinfo=new Array('真实姓名','联系电话','详细地址','简介'), res=null_check(nullcheck,nullinfo),addr = $("#district").val();
  if(res){ $("#"+res[0]).next(".hint").text(res[1]).css("color","red");
    return false;
  }
  if(!addr || addr === '0'){
    $("#getcity").next(".hint").text("请选择城市").css({'color':'red','font-size':'14px'});
    return false;
  }
  /*--2015-8-19--*/
  var type = $(".pflat2pb").find("input:checked").val();
  if(type === '1'){
    var nullcheck=new Array('info','school'), nullinfo=new Array('自我评价','毕业学校'), res=null_check(nullcheck,nullinfo), gid = $("#gid").val(),id_front = $("#id_front").val();
    if(!gid || gid === '0'){ $("#tclass").next(".hint").text("请选择科目").css({'color':'red','font-size':'14px'});return false;}
    if(!id_front){  $("#id_front").next(".hint").text("请选择正面照片").css('color','red');  return false;}
    if(res){ $("#"+res[0]).next(".hint").text(res[1]).css("color","red");return false;}else{return true;}return false;
  }else if(type === '2'){
    var grade = $("#grade").val(),lincence = $("#lincence").val(),id_img = $("#id_img").val();
    if(!grade){$("#grade").next(".hint").text("课程分类不能空").css("color",'red');return false;}
    if(!lincence){$("#lincence").next(".hint").text("营业执照不能空").css("color",'red');return false;}
    if(!id_img){$("#id_img").next(".hint").text("机构Log不能空").css("color",'red');return false;}else{  return true;}return false;
  }else if(type === '3'){
    var nullcheck=new Array('c_url','dymess'), nullinfo=new Array('公司官网','动态消息'), res=null_check(nullcheck,nullinfo),lincen = $("#sq3").find("#lincence").val();
    if(!lincen){
      $("#sq3").find("#lincence").next(".hint").text("营业执照不能空").css('color','red');return false;}
    if(res){
     $("#"+res[0]).next(".hint").text(res[1]).css("color","red");  return false;}else{ return true;}return false;
  }

})

</script>
</body>
</html>