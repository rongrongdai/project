<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——首页</title>
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/common.css"/>
<link href="__ROOT__/public/images/home/2.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" href="__ROOT__/public/css/home/Individualcenter.css" />

<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body>
<div class="indexone">
    <div class="indexone-y"> 
        <?php if($_SESSION['uname']!= ''): ?><a href='__ROOT__/index.php/Space/Space/space'> <img src='__ROOT__/public/images/home/kj.png' class="kjming"/>空间</a>
            <span class="wensi"><span style='margin-right:20px;'></span><a href="__ROOT__/index.php/User/User/ucenter"><?php echo (session('uname')); ?></a></span>

	    <a href="__ROOT__/index.php/User/User/logout">退出</a>
         <?php else: ?>	
	    <span class="wensi"><a href="__ROOT__/index.php/User/User/login">亲，请先登录</a></span>
	    <a href="__ROOT__/index.php/User/User/register">注册</a><?php endif; ?>
         <a href="#">代理招商</a>
       <a href="#">帮助中心</a>
    </div>  
</div>

<div class="indextwo">
       <div class="indextwo-y"> 
            <img src="__ROOT__/public/images/home/logoin.png" class="mgimg"/>
       </div>
       <div class="indextwo-e">
           <p> <span id='city'>深圳市</span> <a href="#" class="mgseny"><img src="__ROOT__/public/images/home/xiaosanjiao.png" /></a></p>
       </div>
           
       <div class="indextwo-s">
            <input type="text" id="indexte" name="keyword" value="" placeholder="英语一对一"/>
            <div class="indextwo-syi" onclick="search()">
            <a href="#"> <img src="__ROOT__/public/images/home/sousuo.png" /></a>
            </div>
       </div>
       
       
       <div class="indextwo-si">
            <ul>
             <a href="__ROOT__/index.php/Index/Index/index" class="select"><li>首页</li></a>
             <a href="__ROOT__/index.php/Teach/Teach/index"><li>家教</li></a>
             <a href="__ROOT__/index.php/Organ/Organ/"><li>培训</li></a>
             <a  href="__ROOT__/index.php/Exam/Exam/index"><li>在线考试</li></a>
             <a href="#"><li class="idebud"><img src="__ROOT__/public/images/home/xinxy.png" /><img class="mgyi" src="__ROOT__/public/images/home/yuan.png" /><span>1</span></li></a>
            </ul>
           
       </div>       
</div>
 <div class="indxdisy" style="display:none;">
            <div class="z-al">
               <div class="z-yi"><p>ui设计</p></div>
               <div class="z-er">
                  <ul>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                </ul>
               </div>
             </div>
             
             <div class="z-al">
               <div class="z-yi"><p>ui设计</p></div>
               <div class="z-er">
                  <ul>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                </ul>
               </div>
             </div>
             
             
             <div class="z-al">
               <div class="z-yi"><p>ui设计</p></div>
               <div class="z-er">
                  <ul>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                </ul>
               </div>
             </div>
             
    

         </div>   
</div>


<link href="__ROOT__/public/css/home/bxjgou.css" rel="stylesheet" type="text/css" />
<style>
    .decet-two{ border:1px #dcdcdc solid;}
    .decrtw-yi{ margin:20px 0px 30px 20px; color:#333333; font-size:18px;}
    .decrtw-yi p{ line-height:45px; }
    .decrtw-yi span{ margin-left:50px;}
    .dectw-kcyi{ height:120px; margin:20px 20px 30px 40px;}
    .de-xmi{ font-size:12px; color:#808080;}
    .dectw-kcyceny{  width:120px; clear:both; float:left; }
    .dectw-kcycenyi{ width:88px; height:88px; border:#dcdcdc 1px solid;}
    .dectw-kcycene{ float:left; color:#808080; font-size:14px; line-height:25px;}
    .dectw-kcycene img{ margin-bottom:20px;}
    .dectw-kcycene .shij{ color:#f39800;}
</style>
   <!--导航条结束-->
   
   <!--培训机构内容-->
   
   <div class="pxjg-one">
      <div class="pxjg-cy">
             <div class="pxjg-ce"></div>
             <p class="pxjg-cs">机构在线</p>
             <div class="pxjg-cw">粉丝:1000</div>
             <div class="pxjg-cl">+ 关注</div>
      </div>
      
      <div class="pxjg-er">
          <p class="plwy"><?php echo ($organ["oname"]); ?> <?php if($organ["o_img"] != ''): ?><img src="<?php echo ($organ["o_img"]); ?>" /><?php endif; ?></p>
      <p class="plwe"><img src="__ROOT__/public/images/home/pxu/001.png" />机构名称：好学指导中心有限公司</p>
      <p class="plws"><img src="__ROOT__/public/images/home/pxu/002.png" />所在地:<?php echo ($organ["city"]); ?>   <span>积分:3000</span></p>
      <p class="plwsi">简介：<?php echo ($organ["tintroduce"]); ?></p>
      </div>
      <div class="pxjg-san">
         <div class="ps-y">
           <p class="ps-xy">老师数量</p>
           <p class="ps-xe"><?php if($sumt > 0): echo ($sumt); else: ?>0<?php endif; ?>名</p>
         </div>
         <div class="ps-y">
             <p class="ps-xy">学生评价</p>
             <p class="ps-xe">9分</p>
         </div>
         <div class="ps-y">
             <p class="ps-xy">服务学生</p>
             <p class="ps-xe"><?php if($sumin > 0): echo ($sumin); else: ?>0<?php endif; ?>名</p>
         </div>
         
         <div class="ps-e">
           <p> <img src="__ROOT__/public/images/home/pxu/004.png" />向TA咨询</p>
         </div>
          <p class="ps-s"><img src="__ROOT__/public/images/home/pxu/005.png" />累计投诉：<span>0 </span>次</p>
          <p class="ps-si">在线联系：<a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=e7b6f4e3e8ae17b84501ccd479d49ccdb6529bf78ae1dd18"><img border="0" src="http://wpa.qq.com/imgd?IDKEY=e7b6f4e3e8ae17b84501ccd479d49ccdb6529bf78ae1dd18&pic=52" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>
      </div>
      
   </div>
  
  
  
  <div class="pxjg-two">
     <div class="ptw-y">
         <div class="ptw-yi"><p style='margin-left:40px;'><?php if($mess["dymess"] != ''): ?><img src="__ROOT__/public/images/home/pxu/007.gif" style='margin-right: 30px;'/><?php echo ($mess["dymess"]); endif; ?></p></div>
        <div class="ptw-ye">
          <ul>
            <li name="teach">家教</li>
            <li class="wda" name="organ">培训</li>
            <li name="bonouns">优惠券</li>
            <li name="comment">服务评论(<?php if($csum > 0): echo ($csum); else: ?>0<?php endif; ?>)</li>
          </ul>
          
        </div>

     
      <!--隐藏div-->
        <div class="ptw-ys" name="organ" >
             <p>全部: 优惠课程</p>
             <?php if(is_array($course)): foreach($course as $key=>$data): ?><div class="ptw-kc" id="<?php echo ($data["id"]); ?>">
                        <img src="__ROOT__/public/images/home/pxu/008.gif" class="pyw-kim" />
                        <p class="ptw-k-a"><span><?php echo ($data["city"]); ?></span><?php echo ($data["cname"]); ?></p>
                        <p class="ptw-k-b">￥<?php echo ($data["price"]); ?>起 <span>详情</span></p>
                        <p class="ptw-k-c">上课地点：<?php echo ($organ["city"]); ?></p>
                        <p class="ptw-k-d">课程开始时间：<?php echo (date("Y-m-d",$data["s_time"])); ?></p>
                    </div><?php endforeach; endif; ?>
            

        </div>
         <!--隐藏div-->
        <div class="ptw-ys" name="teach" style="display:none">
             <p>全部: 优惠课程</p>
             <?php if(is_array($teach)): foreach($teach as $key=>$data): ?><div class="ptw-kc" id="<?php echo ($data["id"]); ?>">
                        <img src="__ROOT__/public/images/home/pxu/008.gif" class="pyw-kim" />
                        <p class="ptw-k-a"><span><?php echo ($data["city"]); ?></span><?php echo ($data["cname"]); ?></p>
                        <p class="ptw-k-b">￥<?php echo ($data["price"]); ?>/小时起 <span>详情</span></p>
                        <p class="ptw-k-c">服务范围：<?php echo ($data["rcity"]); ?></p>
                        <p class="ptw-k-d">课程开始时间：<?php echo ($data["dtime"]); ?></p>
                    </div><?php endforeach; endif; ?>
        </div>
        <!--隐藏__课程评论-->
             <div class="decet-two" style="display:none" name="cmt">
                 <?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><div class="dectw-kcyi">
                     <div class="dectw-kcyceny">
                     <div class="dectw-kcycenyi"></div>
                     <p class="de-xmi">Better Man</p>
                    </div>
                   
                   <div class="dectw-kcycene">
                       <?php for($i=0;$i<$comment['star'];$i++){ echo '<img src="__ROOT__/public/images/home/pxu/xxin.png" />'; } for($i=0;$i<5-$comment['star'];$i++){ echo '<img src="__ROOT__/public/images/home/pxu/xxingx.png" />'; } ?>
                    <p><?php echo ($comment["content"]); ?></p>
                    <p class="shij"><?php echo (date("Y-m-d H:i",$comment["com_timestamp"])); ?></p>
                   </div>
                   
                 </div><?php endforeach; endif; ?>
                 
          </div>
  
  </div>
  
  
  <!--八斗代购商-->
  <div class="ptw-er">
     <img src="__ROOT__/public/images/home/pxu/009.gif" class="pt-ry" />
  </div>
  
  </div> 
  </div>
  <script>
      $(".ptw-ye").find("li").click(function(){
           $(".ptw-ye").find("li").removeClass("wda");
           $(this).addClass("wda");
      })
      $(function(){
          $("li[name=teach]").click(function(){
              $(".ptw-ys").hide();
               $(".decet-two").hide();
               $("div[name=teach]").show();
          });
           $("li[name=organ]").click(function(){
              $(".ptw-ys").hide();
              $(".decet-two").hide();
              $("div[name=organ]").show();
          });
          $("li[name=comment").click(function(){
              $(".ptw-ys").hide();
              $("div[name=cmt]").show();
          });
          $(".ptw-ys").find(".ptw-k-b").find("span").click(function(){
              var t=$(this).parent().parent().parent().attr("name");
              var id=$(this).parent().parent().attr("id");
              switch(t){
                  case 'organ':
                      location.href="__ROOT__/index.php/Organ/Organ/odetail?id="+id;
                      break;
                  case 'teach':
                      location.href="__ROOT__/index.php/Organ/Organ/otdetail?id="+id;
              }
          });
      })
      
  </script>

 <!--尾部-->    
 <!--   <div class="weibu">
        <p class="Ceigt-yi">关于八斗|用户协议|人才招聘|商务合作|招商加盟|帮助中心</p>
        <p class="Ceigt-er">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2</p>
        <p class="Ceigt-sa">服务热线：0755-29494667 QQ:397595720 邮箱：kefu@bsxkj.com</p>
    </div>
</div>-->

<div class="tailall">
        <div class="taily">
           <ul>
             <li><a href="__ROOT__/index.php/Index/Index/about">关于八斗</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/renc">人才招聘</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/busition">商务合作</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/cmer">招商加盟</a></li>
             <li><a href="__ROOT__/index.php/User/User/">用户中心</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/help">帮助中心</a></li>
           </ul>
        </div>
       
       <div  class="tailer">
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">学生</a></p>
              <p><a href="javascript:" class="tai-w">教找培训</a></p>
              <p><a href="javascript:" class="tai-w">模拟考试</a></p>
              <p><a href="javascript:" class="tai-w">学问答疑</a></p>   
            </div>
           
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">教师</a></p>
              <p><a href="javascript:" class="tai-w">在线信息</a></p>
              <p><a href="javascript:" class="tai-w">人气排行</a></p>
              <p><a href="javascript:" class="tai-w">学吧互动</a></p>
            </div>
           
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">学校机构</a></p>
              <p><a href="javascript:" class="tai-w">合作招生</a></p>
              <p><a href="javascript:" class="tai-w">活动策划</a></p>
              <p><a href="javascript:" class="tai-w">广告推广</a></p>
            </div>
           
          
       </div>
       
       
       
        <div class="tailsan">
            
             <p>服务热线：0755-29494667     <span class="hezs">QQ:397595720</span>     <span class="hezs2"> 邮箱：kefu@bsxkj.com</span></p>
             <p class="baixx">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 </p>
             <p class="baixs">All Rights Reserved 粤ICP备13084511号-2</p>
        </div>
     
      
       
   </div>
 <script>
     //js设置cookie
    function setCookie(c_name,value,expiredays)
    {
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        document.cookie=c_name+ "=" +escape(value)+
        ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
    }
    //js获取cookies
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=");
            if (c_start!=-1)
              { 
                c_start=c_start + c_name.length+1;
                c_end=document.cookie.indexOf(";",c_start);
                if (c_end==-1) c_end=document.cookie.length;
                   return unescape(document.cookie.substring(c_start,c_end));
                } 
        }
        return "";
    }
    if(!getCookie("city")){
        $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/getl','',function(data){
        if(data.code===1){
                setCookie('city',data.city.city);
                $("#city").text(data.city.city);
            }
        })
    }else{
        $("#city").text(getCookie("city"));
    }
     
 </script>
</body>

</html>