<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>帮助中心</title>
<link href="__ROOT__/public/css/home/Helpcen.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Helpcenall">
   <!--导航条-->
     <div class="nav-one"></div>
     <div class="nav-two"></div>
     <div class="nav-there">
         <div class="nav-yi"><a href="__APP__"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/logoq.jpg"/></a></div>
         <div class="nav-er">
             <ul>
                <a href="about"><li>关于我们</li></a>
                <a href="tuser"><li>用户协议</li></a>
                <a href="renc"><li>人才招聘</li></a>
                <a href="busition"><li>商务合作</li></a>
                <a href="cmer"><li>招商加盟</li></a>
                <a href="helpcenter"><li class="guan">帮助中心</li></a>
                <a href="http://www.weibo.com/badoue"><li class="zhu">关注我们<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/xinlang.png" /></li></a>
              </ul>
         </div>         
     </div>
     
<!--内容-->
<div class="help-one"></div>
<div class="help-two">
   <div class="help-twy">
   <!--滑动————左边的内容：-->
      <div class="hepl-ton">
      <?php if(is_array($classfiy)): foreach($classfiy as $i=>$vo): ?><a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" /><?php echo ($vo["name"]); ?></p></a>
          <?php $article=$vo['article'] ?>
          <?php if($article): if(is_array($article)): foreach($article as $k=>$v): ?><a href="?aid=<?php echo ($v["id"]); ?>"><p class="help-y"><span><?php echo ($v["title"]); ?></span></p></a><?php endforeach; endif; endif; endforeach; endif; ?>

        <!--
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />新手入门</p></a>
          
          
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />常见问题分类</p></a>

          <a href="javascript:"><p class="help-y"><span>修改注册信息</span></p></a>
          <a href="javascript:"><p class="help-y"><span>忘记密码</span></p></a>
          <a href="javascript:"><p class="help-y"><span>如何找资料</span></p></a>
          <a href="javascript:"><p class="help-y"><span>手机上八斗网</span></p></a>
          <a href="javascript:"><p class="help-y"><span> 享受网站优惠</span></p></a>
          
          
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />热点问题分类</p></a>
          <a href="javascript:"><p class="help-y"><span> 注册认证会员的好处</span></p></a>
          <a href="javascript:"><p class="help-y"><span>  会员级别/经验值</span></p></a> 
          <a href="javascript:"><p class="help-y"><span> 如何获得培训优惠券</span></p></a>
          <a href="javascript:"><p class="help-y"><span> 什么是学豆</span></p></a>
          
          
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />家教</p></a>
          <a href="javascript:"><p class="help-y"><span>  如何预约</span></p></a>
          
          
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />培训</p></a>
          
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />在线考试</p></a>
          <a href="javascript:"><p class="help-y"><span>试题下载</span></p></a>
          <a href="javascript:"><p class="help-y"><span>答案查看</span></p></a> 
          <a href="javascript:"><p class="help-y"><span>手动评分</span></p></a>
          <a href="javascript:"><p class="help-y"><span>上传试题</span></p></a>
            
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />学吧</p></a>  
          <a href="javascript:"><p class="help-y"><span>什么是八斗问答</span></p></a>
          <a href="javascript:"><p class="help-y"><span>关于每日提问次数</span></p></a> 
          <a href="javascript:"><p class="help-y"><span>如何提问</span></p></a>
          <a href="javascript:"><p class="help-y"><span>问答规则</span></p></a>
          
           
          <a href="javascript:"><p class="xishou"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/ter.gif" />会员中心</p></a>  
          <a href="javascript:"><p class="help-y"><span> 积分规则</span></p></a>
          <a href="javascript:"><p class="help-y"><span> 任务中心</span></p></a> 
          <a href="javascript:"><p class="help-y"><span>个人订单</span></p></a>
          <a href="javascript:"><p class="help-y"><span>如何进行充值</span></p></a>
          <a href="javascript:"><p class="help-y"><span>会员特权使用说明</span></p></a>
        -->
      </div>
   
   
   
   
   
   
   <!--滑动————右边的内容：-->
      <div class="hepl-totw">
          <?php echo ($content); ?>
      </div> 
       
    
   </div>

</div>



<!--尾部-->    
<div class="weibu">
        <p class="Ceigt-yi"><a href="abount">关于八斗</a>|<a href="tuser">用户协议|<a href="renc">人才招聘</a>|<a href="busition">商务合作</a>|<a href="cmer">招商加盟</a>|<a href="helpcenter">帮助中心</a></p>
        <p class="Ceigt-er">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2</p>
        <p class="Ceigt-sa">服务热线：0755-29494667 QQ:397595720 邮箱：kefu@bsxkj.com</p>
</div>


</div>
</body>
</html>