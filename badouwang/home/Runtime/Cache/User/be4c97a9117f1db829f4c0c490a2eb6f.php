<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="__ROOT__/public/css/home/Individualcenter.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/home/imgareaselect-animated.css">
<script src="__ROOT__/public/js/jquery-min.js"></script>
<title>基本信息</title>
</head>

<body>
    
    <div class="hy-indall">
          <div class="hy-ite"><p class="py2">会员信息</p></div>
        <div class="hy-inone" style="margin-top:-16px;">
            <div class="hy-iwy"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($user["user_pic"]); ?>" class="hy-img" /></div>
               <div class="hy-wen">
                  <p class="hy-zy"><?php $h=date('H',time()); if(($h > 0) AND ($h < '12')): ?>早上<?php elseif($h == '12'): ?>中午<?php elseif(($h > 12) AND ($h < 19)): ?>下午<?php else: ?>晚上<?php endif; ?>好，<?php echo (session('uname')); echo ($user["user_pic"]); ?></p>
                  <p>个人信息:<?php if($user["content"] != ""): echo ($user["content"]); else: ?>暂未设置！<?php endif; ?></p>
                  <p>你目前的身份是:<span><?php if($user["type"] == 1): ?>用户<?php elseif($user["type"] == 2): ?>家教<?php elseif($user["type"] == 3): ?>培训机构<?php else: ?>代理商<?php endif; ?></span>       &nbsp;账户余额:<span><?php if($user["money"] > 0): echo ($user["money"]); else: ?>0.00<?php endif; ?></span>元          &nbsp;账户积分:<span><?php if($user["u_credit"] > 0): echo ($user["u_credit"]); else: ?>0<?php endif; ?></span></p>
                  <p>学豆:<span><?php if($user["vmoney"] > 0): echo ($user["vmoney"]); else: ?>0<?php endif; ?></span>个     &nbsp;免费发布机会:<span><?php if($total > 0): echo ($total); else: ?>0<?php endif; ?></span>次</p>
               </div>
        </div>

        <div class="hy-intwo">
           <div class="hy-intwyi">
              <div class="hy-ite"><p class="py">会员服务</p></div>
               <div class="hy-itasi">
                  <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/y1.gif" />
                  <p><a href="__APP__/Consume/Consume/charge" target="ifrm">充值</a><br />
                  成功后，现金计入账户余额</p>
               </div>
               <div class="hy-itasi">
                  <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/y2.gif" />
                  <p><a href="__APP__/Consume/Consume/posit" target="ifrm">兑换</a><br />
                  获取收益</p>
               </div>

               <div style="clear:both;"></div>
               <div class="hy-itasi">
                  <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/y3.gif" />
                  <p><a href="__APP__/Consume/Consume/deposit" target="ifrm">钱包</a><br />
                  查看我的财富值</p>
               </div>


               <div class="hy-itasi" style="margin-left:90px;">
                  <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/y4.gif" />
                  <p><a href="javascript:">换肤</a><br />
                  选择你喜欢的主题和颜色</p>
               </div>

           </div>

            <div class="hy-ite"><p class="py1">天气服务</p></div>
            <div class="hy-intwer" id="s_time" style="margin-top:-17px;border:none;border-top:1px solid #C0CFCB">
                
               <iframe style='margin-left:10px;'  allowtransparency="true" frameborder="0" width="140" height="203" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=2&z=1&t=0&v=1&d=2&bd=0&k=&f=&q=1&e=1&a=1&c=54511&w=140&h=203&align=center"></iframe>
            </div>
        </div>


    </div>
    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
    <script src="__ROOT__/public/js/home/common.js"></script>
    <script>
    $(".per-inimg").wrap("<form id='myupload' action='__URL__/uploadimg' method='post' enctype='multipart/form-data'></form>");
    $('#sctp').click(function(){
      $('#img').change(function(){var file=this.files[0],r=new FileReader();
        r.readAsDataURL(file);
        $(r).load(function(){
          $('#re-img').html('<img src="'+ this.result +'" width="100px" height="100px" /><p id="qdsc"  class="per-inimghy" style="cursor:pointer;">确定</p>');

        });
      });
     $('#qdsc').live('click',function(){
        var showimg = $("#re-img");
            $("#myupload").ajaxSubmit({dataType:'json',
                beforeSend:function(){showimg.empty();showimg.html("上传中<img   src='__ROOT__/public/images/home/index/loading.gif' />");}, 
                success:function(data){var img = "__ROOT__/"+data.pic;
                    showimg.html('<img  src="'+img+'" width="100px" height="100px" />');$("#cht").fadeIn().delay(800).fadeOut();},
                error:function(xhr){showimg.html("上传失败");showimg.html(xhr.responseText);}  
            });
      });
      
    }); 
     
     
     $(function(){
         
     })
     
    </script>
    
</body>
</html>