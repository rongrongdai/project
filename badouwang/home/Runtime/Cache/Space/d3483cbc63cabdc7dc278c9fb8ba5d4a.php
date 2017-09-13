<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——首页</title>
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/common.css"/>
<link href="__ROOT__/public/images/home/2.ico" type="image/x-icon" rel="shortcut icon">
<meta property="qc:admins" content="140456431262075206375" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body> 
<div class="head">
	<div class="top">
        <div class="wid">
            <div class="left">
                <div class="cher">深圳</div>
                <span>[</span>
                <a href="#">切换城市</a>
                <?php if(is_array($cities)): foreach($cities as $key=>$city): ?><a href="#"><?php echo ($city["name"]); ?></a><?php endforeach; endif; ?>
                <span>]</span>
                <div class="switch">
                	<a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
                </div>
            </div>

            <div class="right">
            	<?php if($_SESSION['uname']!= ''): ?><div class="h_con">
                	<div class="con_tit"><?php echo (session('uname')); ?></div>
                    <div class="menu">
                    	<a href="__APP__/User/User/uframe" target="_top">个人中心</a>
                    	<!--<a href="__APP__/Space/Space/space">我的空间</a>-->
                    	<a href="__APP__/Space/Space/space" target="_top">我的学吧</a>
                    </div>
                </div>
                <?php else: ?><a class="tal" href="__APP__/User/User/login" target="_top">亲，请先登录</a><?php endif; ?>
                
                <?php if($_SESSION['uname']!= ''): ?><div class="h_con">
                        <div class="con_tit"><img src="__ROOT__/public/images/home/xinxisx.png"/><span><?php if($sumcount > 0): echo ($sumcount); else: ?>0<?php endif; ?>+</span></div>
                        <div class="menu">
                            <a href="__APP__/Space/Space/space" target="_top">动态消息(<?php if($dCount > 0): echo ($dCount); else: ?>0<?php endif; ?>)</a>


                            <a href="__APP__/User/User/uframe?page=tsmgement&type=smess" target="_top">系统消息(<?php if($mCount > 0): echo ($mCount); else: ?>0<?php endif; ?>)</a>

                            <?php if(($utype == 3) OR ($utype == 4)): ?><a href="__APP__/User/User/uframe?page=tsmgement&type=tmess" target="_top">家教咨询(<?php if(($tCount) > "0"): echo ($tCount); else: ?>0<?php endif; ?>)</a><?php endif; ?>

                            <?php if(($utype == 3) OR ($utype == 4)): ?><a href="__APP__/User/User/uframe?page=tsmgement&type=cmess" target="_top">培训咨询(<?php if(($cCount) > "0"): echo ($cCount); else: ?>0<?php endif; ?>)</a><?php endif; ?>




                        </div>
                    </div>
                    <a href="__APP__/User/User/logout" target="_top" class="tal exit">退出</a>
                    <?php else: ?><a class="tal" href="__APP__/User/User/register" target="_top">注册</a><?php endif; ?>
                    <a href="__APP__/Index/Index/helpcenter" class="tal help" target="_blank">帮助中心</a>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <div class="nav">
    	<div class="wid">
        	<div class="log_img">
                <a href="__APP__" target="_top"><img src="__ROOT__/public/images/home/logoin.png" /></a>
            </div>
            <div class="nav_ser">
            	<form action="" name="" method="post">
                    <input type="text" class="valcs" id="indexte" name="keyword" placeholder="请输入搜索内容" autocomplete="off"><input type="submit" name="" value="" class="subcs">
                </form>
            </div>
            <div class="nav_con">
                 <a id="pindex" href="__APP__/Index/Index/index" target="_top">首页</a>
                 <a id="pteach" href="__APP__/Teach/Teach/index" target="_top">家教</a>
                 <a id="pcourse" href="__APP__/Organ/Organ/" target="_top">培训</a>
                 <a id="pexam" href="__APP__/Exam/Exam/index" target="_top">题库</a>
                 <a id="pquestion" href="__APP__/Space/Question" target="_top">学问</a>
                 <a id="pcenter" href='__APP__/Space/StudyCenter' target="_top">学吧</a>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <div class="indxdisy" style="display:none;">
        <p class="intjine" id="teach">家教  <a href="javascript:;" class="in-ged">更多</a></p>
        <p class="intjine" id="course">培训  <a href="__ROOT__/index.php/Organ/Organ/organList" class="in-ged">更多</a></p>
        <p class="intjine" id="user">用户  <a href="__ROOT__/index.php/Space/StudyCenter" class="in-ged">更多</a></p>
        <p class="intjine" id="question">学问  <a href="__ROOT__/index.php/Space/Question" class="in-ged">更多</a></p>
    </div>  
</div>
<script>
$('.h_con').mouseenter(function(){	$(this).find('.menu').show().siblings('.con_tit').addClass('hover');	})
$('.h_con').mouseleave(function(){	$(this).find('.menu').hide().siblings('.con_tit').removeClass('hover');	})
$(window).scroll( function(e) { 
        var top=document.documentElement.scrollTop || document.body.scrollTop;
        if(top>30){
            $(".nav").css("top",0);
            $(".indxdisy").css("top","64px");
        }else{  
            $(".indxdisy").css("top","94px");
            $(".nav").css("top",30);
        }
    })
    var url=location.href;var Css = 'hover'
    if(url.indexOf('Teach')!==-1){ 					$("#pteach").addClass(Css);
        }else if(url.indexOf('Organ')!==-1){  		$("#pcourse").addClass(Css);
        }else if(url.indexOf('Exam')!==-1){     	$("#pexam").addClass(Css);
        }else if(url.indexOf('StudyCenter')!==-1){  $("#pcenter").addClass(Css);
        }else if(url.indexOf('Question')!==-1){     $("#pquestion").addClass(Css);
        }else{  									$("#pindex").addClass(Css);    }
</script>
<script>
        var isi=false;
        $(function(){
            $("#mbd").mouseenter(function(){
                $(this).css("background","#F5F5F5");
                $(this).css("border","none");
                $("span[name=reg]").css("border","none");
                $(this).parent().css("background","#F5F5F5").css("border-left","1px solid #666").css("border-right","1px solid #666");
                $(".hsub").show();
                 $(".hsub").mouseenter();
            })
            $("#mbd").parent().mouseleave(function(){
                $(".hsub").mouseenter();
            })
            $(".hsub").mouseenter(function(){
                $("#mbd").css("background","#F5F5F5");
            })
            $(".hsub").mouseleave(function(){
                $("#mbd").parent().css("background","#eeeeee");
                $("#mbd").parent().css("border","none");
                $(this).hide();
                $("#mbd").css("background","#eeeeee");
                $("#mbd").css("border-right","1px solid #666");
                $("span[name=reg]").css("border-right","1px solid #666");
            })
            $(".indextwo-si").find("ul").find("a").find("li").hover(function(){
                 $(".indextwo-si").find("ul").find("a").find("li").removeClass("shueyzhud");
                $(this).addClass("shueyzhud");
            })
        
        var leftv=$("input[name=keyword]").position().left;
        $(".indxdisy").css("left",leftv);
        $("input[name=keyword]").keydown(function(){
            $(".indxdisy").hide();
        });
        $("input[name=keyword]").blur(function(){
            if(!isi){
                $(".indxdisy").hide();
            }
        })
        $(".intjine").click(function(){
            if($("#indexte").val()){
                $(this).find("a").attr('href',$(this).find("a").attr('href')+"?keyword="+$("#indexte").val());
            }else{
                return false;
            }
        })
        $(".indxdisy").hover(function(){
            isi=true;
        })
        $(".indxdisy").mouseleave(function(){
            isi=false;
            $(this).hide();
        })
        $("input[name=keyword]").dblclick(function(){
            $(this).preventDefault();
        })
        $("input[name=keyword]").keyup(function(){
            var ctl='<div class="intjin-e" id="#id" type="#type">'+
                '<div class="e-yi">'+
                '<img src="__ROOT__/#img"/>'+
                '</div>'+
                '<div class="e-er">'+
                '<p>#title</p>'+
                '<sapn>#detail</sapn>'+
                '</div>'+
              '</div>';
            var ct2=' <p class="intjin-s" id="#id">#qes  <span>#number回答</span></p>';
            var ct3='<div class="intjin-e">#nores</div>';
            var ct5='<div class="intjin-s">#nores</div>';
            function appendc(com,res){
                for(var i in com){
                            var img=com[i]['img']?com[i]['img']:"/public/images/home/n_pic.png";
                            ctl=ctl.replace("#img",img);
                            com[i].title=com[i].title.substr(0,5)+'...';
                            com[i].detail=com[i].detail.substr(0,9)+'...';
                            ctl=ctl.replace("#title",com[i].title);
                            ctl=ctl.replace("#detail",com[i].detail);
                            ctl=ctl.replace('#id',com[i].id);
                            if(com[i].type && res==="teach"){
                                ctl=ctl.replace("#type",com[i].type);
                            }
                            $("#"+res).after($(ctl));
                }
                $(".intjin-e").click(function(){
                    var p=$(this).nextAll(".intjine:first").attr("id");
                    switch(p){
                        case 'course':
                            if($(this).attr("type")==='1'){
                                location.href="__ROOT__/index.php/Teach/Teach/agentdetail?id="+$(this).attr("id");
                            }else{
                                location.href="__ROOT__/index.php/Teach/Teach/agentdetail?tid="+$(this).attr("id");
                            }
                            break;
                        case 'user':
                            location.href="__ROOT__/index.php/Organ/Organ/odetail?id="+$(this).attr("id");
                            break
                         case 'question':
                            location.href="__ROOT__/index.php/Space/Space/space?uid="+$(this).attr("id");
                            break   
                    }
                })
            }
            
            if($(this).val()){
                $.getJSON("__APP__/Index/Index/Search",{'keyword':$(this).val()},function(data){
                    $(".indxdisy").show();
                    $(".intjin-e").remove();
                    $(".intjin-s").remove();
                    res=data.res;
                    if(res[0].length){
                        appendc(res[0],'user');
                    }else{
                        $("#user").after($(ct3.replace("#nores",'暂无相关用户')));
                    }   
                    if(res[1].length){
                        appendc(res[1],'teach');
                    }else{
                        $("#teach").after($(ct3.replace("#nores",'暂无相关家教')));
                    }
                    if(res[2].length){
                        var content=$(res[2][0].content).text();
                        content=content.substr(0,9)+"...";
                        ct2=ct2.replace("#qes",content);
                        var sum=res[2][0]['sum']>0?res[2][0]['sum']:0;
                        ct2=ct2.replace("#number",sum);
                        ct2=ct2.replace("#id",res[2][0].id);
                        $("#question").after(ct2);
                        $(".intjin-s").click(function(){
                          location.href="__ROOT__/index.php/Space/Question/answerdetail?tid="+$(this).attr("id");
                        })
                    }else{
                        ct5=ct5.replace("#nores",'暂无相关问题');
                        $("#question").after($(ct5));
                    } 
                    if(res[3].length){
                        appendc(res[3],'course');
                    }else{
                        $("#course").after($( ct3.replace("#nores",'暂无相关课程')));
                    }
                });
            }
            
        })
    })
	
	

		
	
	
    </script>
     


<link href="__ROOT__/public/css/home/forlby.css" type="text/css" rel="stylesheet" />   

  
  
<div class="for-lby-one">
    <div class="for-lby-oy">
       <p class="f-wd">有问题来八斗问答</p>
       <p>已帮助的人数</p>
       <p class="f-wde">111236</p>
       <div class="f-wq">我要提问</div>
    </div>  
</div>


<div class="for-lby-two">
     <div class="ft-rit">
          <div class="ft-rone fd">
            <p>全部</p>
            <div class="sjx fs"></div>
          </div>
          
           <div class="ft-rone">
            <p>电脑/网络</p>
            <div class="sjx"></div>
          </div>
                    
           <div class="ft-rone">
            <p>电脑/网络</p>
            <div class="sjx"></div>
          </div>
          
           <div class="ft-rone">
            <p>电脑/网络</p>
            <div class="sjx"></div>
          </div>
          
           <div class="ft-rone">
            <p>手机/数码</p>
            <div class="sjx"></div>
          </div>
          
           <div class="ft-rone">
            <p>手机/数码</p>
            <div class="sjx"></div>
          </div>
          
           <div class="ft-rone">
            <p>手机/数码</p>
            <div class="sjx"></div>
          </div>
          
           <div class="ft-rone">
            <p>手机/数码</p>
            <div class="sjx"></div>
          </div>  
     </div>
     
     
     
     
     <div class="ft-cen">
          <div class="ft-cey">
             <div class="rm rou">热门</div>
             <div class="rm">零回答</div>
          </div>
          
         <div class="ft-ceei">
                  <div class="ft-ceei-r">
                     <p>问</p>
                  </div>
              
              <div class="ft-ceei-l">
                 <p class="dz">谁知道数学方程数的定律和解释的方法是什么吗？我最近很苦恼不知......</p>
                 <p class="xz">在天津各个民营专业的体检中心越来越多，各个医院也都成立自己的体检中心，给自己家里人体检的话如果想要便宜和服务好就去民营的体检机构，想要图个安心踏实可以就近选择公立医院的体检中心，以下是各个区的医院体检中心：天津医院体检中心预约电话0 2 2-6 0 9 3 3 7 3 8；天津总医院体检中心预约电话6 0 3 6 1 5 9 5；天津中医药大学第一附属医院体检中心预约电话0 2 2-5 8 5 1 5 0 6 9；天津疗养院体检中心0 2 2-6 0 7 1 4 3 7 0  
                 <a href="javascript:" class="au">[详情]</a>  
                <!-- <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/010.gif"/>分享 </span></a> 
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/011.png" />收藏 </span></a>  
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/012.gif" />点赞 </span></a>--></p>
              </div>
         </div>
         
         
         <div class="ft-ceei">
              <div class="ft-ceei-r">
                 <p>问</p>
              </div>
              
              <div class="ft-ceei-l">
                 <p class="dz">谁知道数学方程数的定律和解释的方法是什么吗？我最近很苦恼不知......</p>
                 <p class="xz">这个问题很简单，你需要请家教还是什么来帮...   <a href="javascript:" class="au">[详情]</a>  
                 <!--<span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/010.gif"/>分享 </span></a> 
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/011.png" />收藏 </span></a>  
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/012.gif" />点赞 </span></a>--></p>
              </div>
         </div>
         
         
         <div class="ft-ceei">
              <div class="ft-ceei-r">
                 <p>问</p>
              </div>
              
              <div class="ft-ceei-l">
                 <p class="dz">谁知道数学方程数的定律和解释的方法是什么吗？我最近很苦恼不知......</p>
                 <p class="xz">这个问题很简单，你需要请家教还是什么来帮...   <a href="javascript:" class="au">[详情]</a>  
                <!-- <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/010.gif"/>分享 </span></a> 
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/011.png" />收藏 </span></a>  
                 <span><a href="javascript:"><img src="__ROOT__/public/images/home/xueba/012.gif" />点赞 </span></a>--></p>
              </div>
         </div>
 
     </div> 
     
      
     <div class="ft-lft">
          <div class="ft-lfyi">
           <p>大家都在搜</p>
          </div>
          
          <div class="ft-lfer">
             <p class="zk"><a href="javascript:">中考</a></p>
             <p><a href="javascript:">中考那家家教强？</a></p>
          </div>
          
           <div class="ft-lfer">
             <p class="zk"><a href="javascript:">中考</a></p>
             <p><a href="javascript:">中考那家家教强？</a></p>
          </div>
          
           <div class="ft-lfer">
             <p class="zk"><a href="javascript:">中考</a></p>
             <p><a href="javascript:">中考那家家教强？</a></p>
          </div>
          
           <div class="ft-lfer">
             <p class="zk"><a href="javascript:">中考</a></p>
             <p><a href="javascript:">中考那家家教强？</a></p>
          </div>
          
          <div class="ft-lfsar">
             <img src="__ROOT__/public/images/home/xueba/015.gif" class="imgsw"/>
    
                  <div class="ft-ls">
                     <p class="phb">排行榜</p>
                     <p class="phh">回答     采纳率</p>
                  </div>
              
                 <div class="ft-lsy">
                   <div class="phb">
                     <p class="oe">1</p>
                     <p class="osw"><a href="javasccript:">天空不是白的</a></p>
                   </div>
                   <p class="phh">1110 &nbsp;99%</p>
                </div>
              
               <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe">2</p>
                 <p class="osw"><a href="javasccript:">浪费时间不变的广</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
              <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe">3</p>
                 <p class="osw"><a href="javasccript:">你说的</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
              <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe or">4</p>
                 <p class="osw"><a href="javasccript:">sfd132435</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
               <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe or">5</p>
                 <p class="osw"><a href="javasccript:">事发地点撒</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
              
               <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe or">6</p>
                 <p class="osw"><a href="javasccript:">天空不是白的</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
              
               <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe or">7</p>
                 <p class="osw"><a href="javasccript:">换肤贵航股份</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
               <div class="ft-lsy">
                 <div class="phb">
                 <p class="oe or">8</p>
                 <p class="osw"><a href="javasccript:">代购费大概</a></p>
                 </div>
                 <p class="phh">1110 &nbsp;99%</p>
              </div>
              
          </div>
          </div>
     </div>

 
  
  
  
<script>
$('.ft-rone').click(function(){	
	$('.ft-rone').removeClass('fd');
	$(this).addClass('fd');
	$('.sjx').removeClass('fs');
	$(this).find('.sjx').addClass('fs')
})
	
$('.rm').click(function(){	
    $('.rm').removeClass('rou');
	$(this).addClass('rou');
})	
			
</script> 
<!--尾部 Tail-->
   <div class="tailall">
        <div class="tailal-one">
            <ul>
             <li><a href="__ROOT__/index.php/Index/Index/about">关于八斗</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/renc">人才招聘</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/busition">商务合作</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/cmer">招商加盟</a></li>
             <li><a href="__ROOT__/index.php/User/User/ucenter">用户中心</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/helpcenter">帮助中心</a></li>
           </ul>
           <p class="one-y">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 </p>
           <p class="one-yi"> All Rights Reserved 粤ICP备13084511号-2</p>
        </div>
   </div>
   
 <script>
    $(function(){
        $(".hcenter").each(function(){
            var swidth=$(this).width();
            var pwidth=$(this).parent().width();
            $(this).css("margin-left",(pwidth-swidth)/2);
        })
    })
    
 </script>
</body>

</html>
</body>
</html>