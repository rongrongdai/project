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
        <p> 深圳 <a href="#" class="mgseny"><img src="__ROOT__/public/images/home/xiaosanjiao.png" /></a></p>
       </div>
           
       <div class="indextwo-s">
            <input type="text" id="indexte" placeholder="英语一对一"/>
            <div class="indextwo-syi">
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


    <link href="__ROOT__/public/css/home/newuser.css" rel="stylesheet"  type="text/css" />
   <div class="newu-all">
        <div class="new-one">
            <img src='__ROOT__/public/images/home/<?php if($type == 'qq'): ?>QQ.png<?php else: ?>web.png<?php endif; ?>' width="22"/><span> hi,欢迎加入八斗网,请绑定你的账号!</span>
        </div>
        
        <div class="new-two">
            <div class="new-ty">
              <div class="new-tyi nw"><p>创建一个新账号</p></div>
            </div>
            <form method="post" action="bind">
            <div class="new-te">
            
                <p>请创建一个新的账号，并且绑定你现在登录的QQ或新浪微博.</p>
                
                <p class="bang-y">绑定成功后，你可以使用此邮箱号登录本网站。</p>
                
                <p class="bang-e"> 邮箱：<input type="email" id="emaile" name="email" value="" placeholder="请输入常用邮箱"> </p>
                
                <p class="bang-s"> 密码：<input type="password" id="passw" name="password" placeholder="密码(6-16个字母,数字,无空格)"> </p>
                
                <input type="submit" value="创建并绑定" class="newcjbd" />
            </div>  
           </form>
        
        
        </div>
        
   </div>

     
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

</body>

</html>