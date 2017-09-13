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
        <?php if($_SESSION['uname']!= ''): ?><a href='__APP__/Space/Space/space'> <img src='__ROOT__/public/images/home/kj.png' class="kjming"/>空间</a>
            <span class="wensi"><span></span><a href="__APP__/User/User/ucenter"><?php echo (session('uname')); ?></a></span>

	    <a href="__APP__/User/User/logout">退出</a>
         <?php else: ?>	
	    <span class="wensi"><a href="__APP__/User/User/login">亲，请先登录</a></span>
	    <a href="__APP__/User/User/register">注册</a><?php endif; ?>
         <a href="#">代理招商</a>
       <a href="__APP__/Index/Index/helpcenter">帮助中心</a>
    </div>  
</div>

<div class="indextwo">
       <div class="indextwo-y"> 
            <img src="__ROOT__/public/images/home/logoin.png" class="mgimg"/>
     
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
             <a href="__APP__/Index/Index/index" class="select"><li>首页</li></a>
             <a href="__APP__/Teach/Teach/index"><li>家教</li></a>
             <a href="__APP__/Organ/Organ/"><li>培训</li></a>
             <a  href="__APP__/Exam/Exam/index"><li>在线考试</li></a>
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

  </div>
<link href="__ROOT__/public/css/home/Space.css" type="text/javascript" rel="stylesheet" />
<div class="sp-yi">
      <div class="sp-yiapp"> 
         <div class="sp-yiayi"> 
             <div class="ayi-s">
                 <div class="ayi-syi"><img width="158" height="144" src="<?php if($user["user_pic"] != '' ): ?>__ROOT__<?php echo ($user["user_pic"]); else: ?>__ROOT__/public/images/home/uimg.png<?php endif; ?>"></div>
                 <a href="#"><div class="ayi-ser"><span>ONLINE</span></div></a>
                 <a href="#"><p>当前<?php if($user["type"] == 1): ?>用户<?php elseif($user["type"] == 2): ?>教师<?php elseif($user["type"] == 3): ?>培训机构<?php elseif($user["type"] == 4): ?>代理商<?php endif; ?>在线</p></a>
                
             </div>
             
                <div class="ayi-y" <?php if($other != ''): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
                   <img src="__ROOT__/public/images/home/space/guanz.png" />
                   <?php if($concerend == '1'): ?><span>已关注</span><?php else: ?><a href='javascrpt:;' name='concern'><span>关注该<?php if($user["type"] == 1): ?>用户<?php elseif($user["type"] == 2): ?>教师<?php elseif($user["type"] == 3): ?>培训机构<?php elseif($user["type"] == 4): ?>代理商<?php endif; ?></span></a><?php endif; ?>
                </div>  
             
         </div>
         
         <div class="sp-yiaer">

             <p><span class="spwyi"><?php if($user["rname"] != ''): echo ($user["rname"]); endif; ?></span>   <span class="spwer"><?php if($user["type"] == 1): ?>用户<?php elseif($user["type"] == 2): ?>教师<?php elseif($user["type"] == 3): ?>培训机构<?php elseif($user["type"] == 4): ?>代理商<?php endif; ?></span><span class="spwer">等级：<?php echo ($user["u_lev"]); ?>星</span> <span class="spwer">积分：<?php echo ($user["u_credit"]); ?></span> </p>

            
             <p><span class="spwsan"><img src="__ROOT__/public/images/home/space/diz.png" />所在地：<span><?php echo ($user["address"]); ?></span></span></p>
             <p><span class="spwsi">个性说明</span>：<span class="spwwu"><?php if($user["content"] != ''): echo ($user["content"]); else: ?>暂未设置<?php endif; ?></span></p>

             <p class="sp-ly">性别:<span><?php if($user["sex"] == 1): ?>男<?php elseif($user["sex"] == 2): ?>女<?php else: ?>暂未设置<?php endif; ?></span>&nbsp;   
             身份:<span>学生</span>&nbsp;      
             生日:<span><?php if($user["birth"] != ''): echo ($user["birth"]); else: ?>暂无<?php endif; ?></span></p>
             <p class="spwwuy"><a href="__ROOT__/index.php/User/User/ucenter?page=uset" target="_blank">设置</a></p>

         </div>
         <div class="sp-yiasan">
                   <div class="san-y">
                          <div class="san-yi">
                              <p class="sp-hui">关注</p>
                              <p class="sp-dai"><?php echo ($user["visitnumber"]); ?></p>
                          </div>
                          <div class="san-yi">
                              <p class="sp-hui">粉丝</p>
                              <p class="sp-dai"><?php echo ($user["visitednumber"]); ?></p>
                          </div>
                          <div class="san-yi qxu">
                              <p class="sp-hui">学问</p>
                              <p class="sp-dai"><?php echo ($user["sq"]); ?></p>
                          </div>
                   </div>
             <?php if($other != ''): ?><div class="san-e">
                       <a href="javascript:;"><img src="__ROOT__/public/images/home/space/huihua.png" /><span name="pmessage" mid="<?php echo ($user["uid"]); ?>">给TA私信</span></a>
                  </div><?php endif; ?>
                   <div class="san-s" style='margin-top:10px;'>
                       <p>标签：<?php echo ($user["lab"]); ?></p>
                   </div>
         </div>
              
      </div>
    
 
 </div>
 </div>
<div class="pxjg-two">
     <div class="ptw-y">
        <div class="ptw-yi"><p><img src="__ROOT__/public/images/home/pxu/007.gif" />上周更新周更周更周更周更周更周更周更周更周 <span class="pty-ged">更多</span></p></div>
        <div class="ptw-ye">
          <ul name="lti">
            <li class="wda">学吧动态</li>
            <li >学问</li>
          </ul>

        </div>
        <script id="dynamic" type="text/html">
            <div class="cent-yincy">
                <div class="centw-ere" margin-top="40px">
                    <img src='<?php if($user["user_pic"] != ''): ?>__ROOT__/<?php echo ($user["user_pic"]); else: ?>__ROOT__/public/images/home/xueba/022.gif<?php endif; ?>' width="60" style="float:left;margin-right:40px;"/>{{d.content}}
                </div>
                <div class="centw-ery">{{# if(d.contentpic){}}<img src="__ROOT__{{d.contentpic}}" />{{#}}}</div>
                <div class="centw-san">
                                       <div class="centw-sy">
                                         <a href="javascript:;"><span>折叠</span><div class="sy-yi"></div></a>
                                        </div>
                                        <div class="centw-se">
                                        <span>发表于：{{d.publisttime}}</span>  
                                        <span><a href="#">来自:<?php if($nickname): echo ($nickname); else: echo (session('uname')); endif; ?></a></span>     
                                        <span>{{d.readnumber}} 人阅读</span>        
                                        <span><a href="javascript:;" name="gcomment" number="<?php echo ($key); ?>"><img src="__ROOT__/public/images/home/space/shuo.gif" /> <span name="goodnumber">{{d.goodnumber}}</span></a></span>        
                                        </div>                           
                </div> 
            </div>

        </script>    
        <script id="question" type="text/html">
            <div class="askme-centesi">
                       <p class="answ-wy"  name="question"><img src="__ROOT__/public/images/home/xueba/020.png"/><a href="__ROOT__/index.php/Space/Question/answerdetail?tid=<?php echo ($question["id"]); ?>">{{d.content}}</a></p>
                       <p class="answ-we">提问人：{{d.uname}} </p>
                       <p class="answ-we">时间：{{d.c_timestamp}}</p>
                       <p class="answ-ws">阅读：0</p>
               </div>
        </script>
        
            </div>
     
  
  <!--八斗代购商-->
<div class="ptw-er">
     <img src="__ROOT__/public/images/home/pxu/009.gif" class="pt-ry" />
     <div class="ptw-ery"></div>
</div>
</div> 
</div>

<script src="__ROOT__/public/js/laytpl.js"></script>
<script>
    $(function(){
        $("ul[name=lti]").find("li").click(function(){
             $("ul[name=lti]").find("li").removeClass("wda");
             $(this).addClass("wda");
        })
    })
    $(function(){
        var dymics=[];
        var ques=[];
        var page=1;
        var uid="<?php echo ($user["uid"]); ?>";
        $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/getDymics',{'uid':uid,'page':page},function(data){
            if(data.code ===1){
                dymics=data.dys;
                for(var i in data.dys){
                     var cdata=data.dys[i];
                     var ttpl=document.getElementById('dynamic').innerHTML;
                        laytpl(ttpl).render(cdata, function(html){
                             $(".pxjg-two").append(html);
                        });
                }
               $(".pxjg-two").append("<button style='float:right;'>更多</button>");
               $(".centw-ere").find("p").css("float","left");
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
        if(data.code===1 && data.city.city){
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