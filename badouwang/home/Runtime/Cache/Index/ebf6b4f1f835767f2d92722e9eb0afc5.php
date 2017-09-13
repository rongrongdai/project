<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们</title>
<link href="__ROOT__/public/css/home/renc.css" rel="stylesheet" type="text/css" />
</head>

<body>
    
<div class="rencall">
<!--导航条-->
<div class="nav-one"></div>
     <div class="nav-two"></div>
     <div class="nav-there">
         <div class="nav-yi"><a href="index"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/logoq.jpg"></a></div>
         <div class="nav-er">
             <ul>
                <a href="about"><li>关于我们</li></a>
                <a href="tuser"><li>用户协议</li></a>
                <a href="renc"><li  class="guan">人才招聘</li></a>
                <a href="busition"><li>商务合作</li></a>
                <a href="cmer"><li>招商加盟</li></a>
                <a href="helpcenter"><li>帮助中心</li></a>
                <a href="http://www.weibo.com/badoue" target="_blank"><li class="zhu">关注我们<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/xinlang.png" /></li></a>
              </ul>
         </div>     
     </div>
     
           
<!--内容-->
<div class="renc-one">
<div class="renc-oneg">
       <div class="reno-yi">
           <div class="reno-y"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/wozhao.png" /></div>
           <div class="reno-e">
            <p>收拾行李，寻找最新的自己，</p>
            <p>青春是挽不回的水，转眼消失在指尖，用力的浪费，再用力的</p>
            <p>后悔，不要沉溺于过去，</p>
            <p>接受新的生活，新的自己，新的团队！</p>
            <p>在这里，你能收获的不仅仅是高薪，还有技能、知识和家人！</p>
            <p>收拾行李，寻找新的自己，加入我们吧！</p>
           </div>
       </div>
       
       <div class="reno-er">
           <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fuzhuye/zhaopin.png" />
       </div>
</div>
</div>

<?php if(is_array($zhaos)): foreach($zhaos as $key=>$zhao): $class=""; if($key%2){ $class="renc-tow"; }else{ $class="renc-three"; } ?>
<div class="<?php echo ($class); ?>">
        <div class="rent-yi">
             <div class="rt-yi"></div>
             <div class="rt-er">
                <div class="rt-ziw"><?php echo (substr($zhao["0"],0,1)); ?></div>
                <div class="rt-ziz"><?php echo (substr($zhao["0"],1)); ?></div>
             </div>
             <div class="rt-san"></div>
             
        </div>
        <div class="rent-er">
        
            <div class="rte-yi">
              <p class="retwe-y">岗位要求</p>
              <?php if(is_array($zhao["1"])): foreach($zhao["1"] as $key=>$r): ?><p><?php echo ($key+1); ?>、<?php echo ($r); ?></p><?php endforeach; endif; ?>
            </div>
            
            <div class="rte-yi">
               <p class="retwe-y">任职要求</p>
               <?php if(is_array($zhao["2"])): foreach($zhao["2"] as $key=>$d): ?><p><?php echo ($key+1); ?>、<?php echo ($d); ?></p><?php endforeach; endif; ?>
              
            </div>
            
        </div>
        


</div><?php endforeach; endif; ?>






<div class="renc-Seven">
      <p>申请感兴趣的岗位并将您的简历投递至<a href="JavaScript:">ceo@bsxkj.com</a>，期待你的加入</p>
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