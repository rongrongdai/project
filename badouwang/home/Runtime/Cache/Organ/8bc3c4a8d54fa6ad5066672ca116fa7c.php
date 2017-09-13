<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——首页</title>
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/common.css"/>
<link href="__ROOT__/public/images/home/2.ico" type="image/x-icon" rel="shortcut icon">
<meta name="viewport"content="width=1280, initial-scale=0.25,minimum-scale=0, maximum-scale=1.0"/> 
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body> 
<div class="head">
	<div class="top">
        <div class="wid">
            <div class="left">
                <div class="cher">深圳</div>
                <span>[</span>
                <a href="javascript:;" name="cg">切换城市</a>
                <?php if(is_array($cities)): foreach($cities as $key=>$city): ?><a href="javascript:;" cid="<?php echo ($city["id"]); ?>" <?php if($city["id"] == $cityid): ?>style="color:#F93;"<?php endif; ?>><?php echo ($city["name"]); ?></a><?php endforeach; endif; ?>
                <span>]</span>
                <div class="hswitch" style="display:none;position:absolute;z-index:2004" id="ccity">
                   <?php if(is_array($ocitys)): foreach($ocitys as $key=>$city): ?><ul>
                     <li><a href="javascript:;"  class="biat"><?php echo ($key); ?></a></li>  
                     <?php if(is_array($city)): foreach($city as $k=>$c): ?><li><a href="javascript:;" cid="<?php echo ($c["id"]); ?>"><?php echo ($c["name"]); ?></a></li><?php endforeach; endif; ?>
                    
                   </ul><?php endforeach; endif; ?>
                    

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
                        <div class="con_tit"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xinxisx.png"/><span><?php if($sumcount > 0): echo ($sumcount); else: ?>0<?php endif; ?>+</span></div>
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
                <a href="__APP__" target="_top"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/logoin.png" /></a>
            </div>
            <div class="nav_ser">
                    <input type="text" class="valcs" id="indexte" name="keyword" placeholder="请输入搜索内容" autocomplete="off"><input type="submit" name="search" value="" class="subcs">
            </div>
            <div class="nav_con">
                 <a id="pindex" href="__APP__/Index/Index/index" target="_top" onfocus="this.blur()">首页</a>
                 <a id="pteach" href="__APP__/Teach/Teach/index" target="_top" onfocus="this.blur()">家教</a>
                 <a id="pcourse" href="__APP__/Organ/Organ/" target="_top" onfocus="this.blur()">培训</a>
                 <a id="pexam" href="__APP__/Exam/Exam/index" target="_top" onfocus="this.blur()">题库</a>
                 <a id="pquestion" href="__APP__/Space/Question" target="_top" onfocus="this.blur()">学问</a>
                 <a id="pcenter" href='__APP__/Space/StudyCenter' target="_top" onfocus="this.blur()">学吧</a>
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
    var url=location.href;var Css = 'hover';
    console.log(url.indexOf('Space'));
    if(url.indexOf('Teach')!==-1){ 					$("#pteach").addClass(Css);
        }else if(url.indexOf('Organ')!==-1){  		$("#pcourse").addClass(Css);
        }else if(url.indexOf('Exam')!==-1){     	$("#pexam").addClass(Css);
        }else if(url.indexOf('StudyCenter')!==-1){  $("#pcenter").addClass(Css);
        }else if(url.indexOf('Question')!==-1){  
            $("#pquestion").addClass(Css);
        }else if(url.indexOf('Space')!==-1){
            console.log("gg");
            $("#pcenter").addClass(Css);
        }else{  
            $("#pindex").addClass(Css);  
        }
</script>
<script>
        var isi=false;
        $(function(){
            var cityid="<?php echo (cookie('cid')); ?>";
            $(".left a").each(function(){
                if($(this).attr("cid")===cityid){
                    $(this).addClass("sel");
                    $(".cher").text($(this).text());
                }
            })
            $("input[name=search]").click(function(){
                console.log(location.href);
            })
            $("a[name=cg]").click(function(){
                $("#ccity").toggle();
            });
            $("#ccity").mouseleave(function(){
                $(this).toggle();
            })
            $("#ccity,.left").find("a").click(function(){
                var cid=$(this).attr('cid');
                var obj=$(this);
                if(cid){
                   $.getJSON('__APP__/Index/Index/setCcity',{'cid':cid},function(data){
                       if(data.code===1){
                           $(".left").find("a").removeClass('sel');
                           obj.addClass("sel");
                           $(".left").find("a:not(:first)").each(function(){
                               if($(this).attr("cid")===obj.attr("cid")){
                                   $(this).addClass("sel");
                               }
                           })
                           $(".cher").text(obj.text());
                       }
                   })
                }
            })
            
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
                "<img onerror='"+'javascript:this.src='+'"__ROOT__/public/images/home/n_pic.png"'+" src='"+"__ROOT__/#img"+"' />"+
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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/Train.css" />
<script src="__ROOT__/public/js/jquery.vticker-min.js"></script>
<!--培训内容-->
<div id="playBox">
 <div class="pre"></div>
    <div class="next"></div>
    <div class="smalltitle hcenter">
      <ul>
        <li class="thistitle"></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <ul class="oUlplay">
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner1.jpg"/></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner2.jpg"/></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner3.jpg"/></a></li>
    </ul>
  </div>


<div class="con_a">
	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_px_01.png" onerror="javascript:this.src='__ROOT__/public/images/home/pxu/pic_px_01.png';"/></div>
	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_px_02.png" /></div>
	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_px_03.png" /></div>
	<div class="con" style="margin:0;border:none;">
		<div class="title"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/gong.png" /><div>最新需求信息</div></div>
        <div class="link">
             <?php if(is_array($notices)): foreach($notices as $key=>$spred): ?><a href="<?php echo ($spred["link"]); ?>"><div name="left"><li><?php echo ($spred["ntext"]); ?></li></div><span name="right"><?php echo (date("y-m-d",$spred["atime"])); ?></span></a><?php endforeach; endif; ?>
        </div>
    </div>
</div>








<div class="train-two ">

   <div class="trtwo-er-oy">优惠课程</div>
    <div class="psyour">
            <div class="roll">
                <div class="prev"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/zuo.png" width="20" height="20"></div>
                    <div id='roll'>
                        <?php if(is_array($ccourses)): foreach($ccourses as $key=>$course): ?><a href="__ROOT__/index.php/Organ/Organ/odetail?id=<?php echo ($course["id"]); ?>">
                            <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($course["timg"]); ?>" width="100%" height="140" />
                            <div class="tixq"><?php echo (mb_substr($course["aname"],0,29)); ?></div>
                            <div class="vnone"><span>查看详情</span></div>
                        </a><?php endforeach; endif; ?>
                    </div>
                
                <div class="next"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/you.png" width="20" height="20"></div>
            </div>
    </div>
    
    
    
<!--培训课程-->
   <div class="trtwo-san">
       <div class="trt-syi">
          <div class="tyi-y"><p>培训课程</p></div>
               <p class="tcjiy"><span  style="margin-left:32px;">共有 <?php if($csum): echo ($csum); ?> <?php else: ?> 0<?php endif; ?>门课程</span> </p>
               <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><div class='ter-er <?php if($key == '0'): ?>cw<?php endif; ?>'name="courses"><p><?php echo ($course["name"]); ?></p></div><?php endforeach; endif; ?>
       </div>
       <div class="trt-ser">
         <div class="tser-yi">
           <ul>
<!--        <a href="javascript:;"><li class="rmen">热门</li></a>
            <a href="javascript:;"><li name='more'>更多</li></a>
            -->
		    <span><a class="rmen Ts">热门</a></span>
            <span><li name='more'><a href='__ROOT__/index.php/Organ/Organ/organList'>更多</a></li></span>
                      
           </ul>
         </div>
         
         
         <!--更多-->
              <div class="trgegduo" name='cclass' style='display:none;'>
              </div>
         <!--更多结束-->
          <!--隐藏对象-->
          <div class="tser-san">
          
          </div>



       </div>

 </div>
   
<!--合作招生-->
	<div class="trtwo-si" class="hui">
       <div class="trtw-sy"><p>合作招生</p></div>
       <div class="trtw-ser">
<div class="paddt20 home-wkt">

<div class="paddt20 dir_wrap" id="kta">	
<!-- --------------------------------------------->
	<div class="dir dir_a">
		<a>
        	
                <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><h<?php if($key == 0): ?>4<?php else: ?>5<?php endif; ?>><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($link["logo"]); ?>" /></h<?php if($key == 0): ?>4<?php else: ?>5<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
		</a>
                <a class="pimg"></a>
                  <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><<?php if($key == 0): ?>b<?php else: ?>i<?php endif; ?>>
                        <div class="d<?php if($key == 0): ?>1<?php else: ?>2<?php endif; ?>">
                            <div class="vtitle"><?php echo ($link["name"]); ?></div>
                            <div class="vdiv"><?php echo ($link["descrip"]); ?></div>
                        </div>
                    <div class="d2">
                        <div class="vdiv"><a class="wtzs" href="http://<?php echo ($link["url"]); ?>">进入官网</a></div>
                    </div>
                    </<?php if($key == 0): ?>b<?php else: ?>i<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                    
	</div>
<!-- --------------------------------------------->
    <div class="dir dir_b">
		<a>
                   <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><h<?php if($key == 2): ?>4<?php else: ?>5<?php endif; ?>><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($link["logo"]); ?>" /></h<?php if($key == 2): ?>4<?php else: ?>5<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
		</a>
        <a class="pimg"></a>
		
                <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><<?php if($key == 2): ?>b<?php else: ?>i<?php endif; ?>>
                        <div class="d<?php if($key == 2): ?>1<?php else: ?>2<?php endif; ?>">
                            <div class="vtitle"><?php echo ($link["name"]); ?></div>
                            <div class="vdiv"><?php echo ($link["descrip"]); ?></div>
                        </div>
                    <div class="d2">
                        <div class="vdiv"><a class="wtzs" href="http://<?php echo ($link["url"]); ?>">进入官网</a></div>
                    </div>
                    </<?php if($key == 2): ?>b<?php else: ?>i<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                   
	</div>

<!-- --------------------------------------------->
    <div class="dir dir_c">
		<a>
                    <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,4,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><h<?php if($key == 4): ?>4<?php else: ?>5<?php endif; ?>><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($link["logo"]); ?>" /></h<?php if($key == 4): ?>4<?php else: ?>5<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
		</a>
                <a class="pimg"></a>
		 <?php if(is_array($links)): $i = 0; $__LIST__ = array_slice($links,4,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><<?php if($key == 4): ?>b<?php else: ?>i<?php endif; ?>>
                        <div class="d<?php if($key == 4): ?>1<?php else: ?>2<?php endif; ?>">
                            <div class="vtitle"><?php echo ($link["name"]); ?></div>
                            <div class="vdiv"><?php echo ($link["descrip"]); ?></div>
                        </div>
                     <div class="d2">
                            <div class="vdiv"><a class="wtzs" href="http://<?php echo ($link["url"]); ?>">进入官网</a></div>
                    </div>
                    </<?php if($key == 4): ?>b<?php else: ?>i<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    
	</div>

<!-- --------------------------------------------->
</div>
</div>

       </div>
    </div>
</div>

</div>
<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script id="c_course" type="text/html">
     <div class="mtrt-san">
            <a href="javascript:;"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($course["timg"]); ?>" class="matrecsim"/></a>
            <p><?php echo (mb_substr($course["aname"],0,29)); ?>...</p>
            <div class="mtrt-si" style="display:block;">
                <div class="mtrt-s-ye"><a href="__ROOT__/index.php/Organ/Organ/odetail?id=<?php echo ($course["id"]); ?>"><p>查看课程</p></a></div> 
            </div>
    </div>
</script>
<script>
    //文字滚动
    function scroll_news(){
    $(function(){
    $('.link a').eq(0).fadeOut('slow',function(){
    //   alert($(this).clone().html());
    //克隆:不用克隆的话，remove()就没了。
    $(this).clone().appendTo($(this).parent()).fadeIn('slow');
    $(this).remove();
    });
    });
    }
    setInterval('scroll_news()',1500);
    </script>
<script>
    var isget=false;
    $(function(){
        var cpage=1;
        var pagedata=[];
        pagedata[cpage]=$(".mtrt-san");
        $("div[name=cclass]").mouseleave(function(){
            $(this).hide();
        })
        function initm(){
            $(".mtrt-san").hover(function(){
                $(".mtrt-s-ye").hide();
                $(this).find(".mtrt-s-ye").show();
                $(this).find(".mtrt-si").css("opacity",0.65);
            })
            $(".mtrt-san").mouseleave(function(){
                $(".mtrt-s-ye").hide();
                $(this).find(".mtrt-si").css("opacity",0);
            })
        }
        initm();
        $(".mtrt-er").click(function(){
            if(pagedata[cpage].length>5){
                $(".mtrt-san").remove();
                cpage++;
                if(pagedata[cpage]){
                    for(var i in pagedata[cpage]){
                        $(this).after(pagedata[cpage][i]);
                    }
                }else{
                    $.getJSON('__ROOT__/index.php/Organ/Organ/getMCourse',{'page':cpage},function(data){
                    if(data.courses.length>0){
                        var gettpl = document.getElementById('c_course').innerHTML;
                        for(var i in data.entities){
                         laytpl(gettpl).render(data.courses[i], function(html){
                                     collection+=html;
                                     $('.mtrt-er').after(html);
                                     pagedata[cpage][i]=$(html);
                               });
                        }
                        initm();
                    }else{
                       // $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type:2,msg:'暂无更多课程'}}); 
                    }
                  });
                }
                
            }
        })
        $(".mtrt-wu").click(function(){
            if(pagedata[cpage].length>5 && cpage>1){
                $(".mtrt-san").remove();
                cpage--;
                 for(var i in pagedata[cpage]){
                        $(this).after(pagedata[cpage][i]);
                 }
            }
        })
    })
   
    function adata(arr){
        console.log(arr);
        $(".tser-san").find(".tser-sany").remove();
        for(i in arr){
                      var img=arr[i].timg?"__ROOT__"+arr[i].timg:'__ROOT__/public/images/home/pxu/shu.gif';
                      var hui=arr[i].blnumber>0?'<span class="hui">&nbsp;惠&nbsp; </span>':'';
                      var tpl='<div class="tser-sany">'+
                        "<img  src='"+img+"' />"+
                        '<p class="title"><span class="diq">'+arr[i].p_address+'</span>'+' ' +arr[i].aname+hui+'</p>'+
                        '<div class="cent"><div class="qian">￥'+arr[i].d_price+'起</div> <div class="pinl"> 3条评论</div>  <div class="geng" id="'+arr[i].id+'" type="'+arr[i].type+'">更多详情</div></div>'+
                        '<p class="wenx">上课地点：'+arr[i].address+'</p>'+
                        '<p class="wenx">开课时间：'+arr[i].s_time+'</p>'+
                     '</div>';
                     
                     $(".tser-san").append(tpl);
                  }
        $(".hui").click(function(){
            //location.href="__ROOT__/index.php/Organ/Bonus";
        })
    }
     function res(res){
           var type=$(res).text();
           $.getJSON("__ROOT__/index.php/Ajax/AjaxCourse/getOspred",{"type":type},function(data){
              $(".tser-san").find(".tser-sany").remove();
              if(data.code===1){
                  adata(data.course);
                  $(".geng").click(function(){
                      if($(".geng").attr("type")==='1'){
                          location.href="__ROOT__/index.php/Organ/Organ/odetail?type=1&id="+$(this).attr("id");
                      }else{
                          location.href="__ROOT__/index.php/Organ/Organ/odetail?id="+$(this).attr("id");
                      }
                      
                  });
              }
           });
     }
    $(function(){
        //隐藏科目
        var first=true;
        var width=$("#playBox").innerWidth();
        var rate=width/1440;
        $("#playBox").height($("#playBox").height()*rate);
        $(".oUlplay").find("img").width(width);
        $(".trw-biali").css("position",'relative').css("left","25px");
        $(".trw-biali").find("li").each(function(){
            var lt=$(this).find("a").find("span[name=left]").text();
           if(lt.length>4){
               $(this).find("a").find("span[name=left]").text(lt.substr(0,4)+"..");
           };
        })
        $(".trw-biali").vTicker({
                speed: 500,
                pause: 3000,
                showItems: 4,
                animation: 'fade',
                mousePause: false,
                height: 180,
                direction: 'up'
            });
        var carr=[];
        var aclass=[];
        $("div[name=courses]").click(function(){
            if(!first){
                var loadi = layer.load('努力加载中…');
            }
            first=false;
            $("div[name=cclass]").css("display","none");
            $(".tser-yi").find("a[name=hotclass]").remove();
            var c=$(this).find("p").text();
            if(c){
                 //var child='<a href="javascript:;" name="hotclass" onclick="res(this)"><li>cname</li></a>';
                 var child='<a href="javascript:;" name="hotclass" onclick="res(this);'+	"Mty('a',this)"		+'">cname</a>';
                 getChidClass(c,carr,child,$('.rmen.Ts'));
                 $.getJSON('__ROOT__/index.php/Ajax/AjaxCourse/getChildCourse',{'type':c},function(data){
                    if(!first){
                        layer.close(loadi);
                    }
                     adata(data.datas);
                      $(".geng").click(function(){
                         if($(this).attr("type")==='1'){
                                location.href="__ROOT__/index.php/Organ/Organ/odetail?type=1&id="+$(this).attr("id");
                            }else{
                                location.href="__ROOT__/index.php/Organ/Organ/odetail?id="+$(this).attr("id");
                            }
                      });
                }); 
            }
            
            $("div[name=courses]").removeClass("cw");
            $(this).addClass("cw");
        });
        
        function handc(data){
            var items='';
            for(i in data.classes){
                             var item='<div class="z-al">';
                             item+= '<div class="z-yi"><p>'+i+'</p></div>'+'<div class="z-er">';
                             for(j in data.classes[i]){
                                 item+= '<a id="'+data.classes[i][j].id+'">'+data.classes[i][j].name+'</a>';
                             }
                             item+= '</div></div>';
                             items+=item;
            }
            $("div[name=cclass]").append(items);
            $("div[name=cclass]").find(".z-al").each(function(k){
                if(k>3){
                    $(this).hide();
                }
            });
            /*if($("span[name=more]").size()<=0){
                $("div[name=cclass]").append("<span name=more><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src='__ROOT__/public/images/home/more.png' style='margin-left:230px;margin-bottom:10px;cursor:pointer'/></span>");
            }
            $("span[name=more]").click(function(){
                $(this).remove();
                $("div[name=cclass]").find(".z-al").show();
            })*/
            $(".z-er").find("li").click(function(){
                location.href="__ROOT__/index.php/Organ/Organ/organList?cid="+$(this).attr('id');
            });
        }
        $("div[name=courses]:first").click();
        /*$("li[name=more]").click(function(e){
            if($("div[name=cclass]").css("display")==="none"){
                if(!isget){
                    var type=$(".cw").find("p").text();
                    if(aclass[type]){
                        var data=aclass[type];
                        handc(data);
                    }else{
                            $.getJSON('__ROOT__/index.php/Ajax/AjaxClassfiy/getOclass',{type:type},function(data){
                            aclass[type]=data;
                            handc(data);
                            $(".z-yi").click(function(){ 		})
                        });  
                    }
                    isget=true;
                    var x=e.pageX;
                    var y=e.pageY;
                    $("div[name=cclass]").css("display","block").css("display","relative").css("left",x-160).css("top",y+22);
                    
                }else{
                    $("div[name=cclass]").css("display","block");
                }
            }else{
                $("div[name=cclass]").css("display","none");
            }
            
        });*/
    })
	
	
	
	
	
	 $
		function getStyle(obj,name)
{
	if(obj.currentStyle)
	{
		return obj.currentStyle[name]
	}
	else
	{
		return getComputedStyle(obj,false)[name]
	}
}

function getByClass(oParent,nClass)
{
	var eLe = oParent.getElementsByTagName('*');
	var aRrent  = [];
	for(var i=0; i<eLe.length; i++)
	{
		if(eLe[i].className == nClass)
		{
			aRrent.push(eLe[i]);
		}
	}
	return aRrent;
}

function startMove(obj,att,add)
{
	clearInterval(obj.timer)
	obj.timer = setInterval(function(){
	   var cutt = 0 ;
	   if(att=='opacity')
	   {
		   cutt = Math.round(parseFloat(getStyle(obj,att)));
	   }
	   else
	   {
		   cutt = Math.round(parseInt(getStyle(obj,att)));
	   }
	   var speed = (add-cutt)/4;
	   speed = speed>0?Math.ceil(speed):Math.floor(speed);
	   if(cutt==add)
	   {
		   clearInterval(obj.timer)
	   }
	   else
	   {
		   if(att=='opacity')
		   {
			   obj.style.opacity = (cutt+speed)/100;
			   obj.style.filter = 'alpha(opacity:'+(cutt+speed)+')';
		   }
		   else
		   {
			   obj.style[att] = cutt+speed+'px';
		   }
	   }
	   
	},30)
}

  window.onload = function()
  {
	  var oDiv = document.getElementById('playBox');
	  var oPre = getByClass(oDiv,'pre')[0];
	  var oNext = getByClass(oDiv,'next')[0];
	  var oUlBig = getByClass(oDiv,'oUlplay')[0];
	  var aBigLi = oUlBig.getElementsByTagName('li');
	  var oDivSmall = getByClass(oDiv,'smalltitle')[0];
          var aLiSmall=$(".smalltitle").find("li");
	  function tab()
	  {
	     for(var i=0; i<aLiSmall.length; i++)
	     {
		    aLiSmall[i].className = '';
	     }
	     aLiSmall[now].className = 'thistitle'
	     startMove(oUlBig,'left',-(now*aBigLi[0].offsetWidth))
	  }
	  var now = 0;
	  for(var i=0; i<aLiSmall.length; i++)
	  {
		  aLiSmall[i].index = i;
		  aLiSmall[i].onclick = function()
		  {
			  now = this.index;
			  tab();
		  }
	 }
	  oPre.onclick = function()
	  {
		  now--
		  if(now ==-1)
		  {
			  now = aBigLi.length;
		  }
		   tab();
	  }
	   oNext.onclick = function()
	  {
		   now++
		  if(now ==aBigLi.length)
		  {
			  now = 0;
		  }
		  tab();
	  }
	  var timer = setInterval(oNext.onclick,5000) //滚动间隔时间设置
	  oDiv.onmouseover = function()
	  {
		  clearInterval(timer)
	  }
	   oDiv.onmouseout = function()
	  {
		  timer = setInterval(oNext.onclick,5000) //滚动间隔时间设置
	  }
          }
 
 



//////////////////////////////////////////////tser-yi
function Mty(b,th){$('.tser-yi ' + b).removeClass('Ts');$(th).addClass('Ts');	}
function Mh(b,i,th){
        $('.home-wkt .dir ' + b ).addClass('pblock').removeClass('pnone');  
        $('.home-wkt .dir ' + i ).addClass('pnone').removeClass('pblock');
        if(th=='.d1'){  $('.home-wkt .dir .pimg').css({  backgroundPosition:'0 -157px'  });   }
        if(th=='.d2'){  $('.home-wkt .dir .pimg').css({  backgroundPosition:'0 -16px'  })  }

        }
function Ma(b,i,th){
        $(th).animate({width:'570px'});
        $('.home-wkt .dir_' + b).animate({width:'213px'});
        $('.home-wkt .dir_' + i).animate({width:'213px'});
        }
$('.home-wkt .dir_a').mouseenter(function(){   Ma('b', 'c', this) })
$('.home-wkt .dir_b').mouseenter(function(){   Ma('a', 'c', this) })
$('.home-wkt .dir_c').mouseenter(function(){   Ma('a', 'b', this) })
$('.home-wkt .dir h4').mouseenter(function(){  Mh('b', 'i', '.d1')       })
$('.home-wkt .dir h5').mouseenter(function(){  Mh('i', 'b', '.d2')       })
$('.tser-yi a').click(function(){	Mty('a',this)	;			})

Ma('a', 'b', '.dir_c');Mh('b', 'i', '.d1')//默认哪个展开
function set(a){
	var vb = $('#roll').find('a');
	var Tvb = vb[a].innerHTML; 
	var Hvb = vb[a].href; 
	if(a==0){	$(vb[a]).remove();	document.getElementById('roll').innerHTML = document.getElementById('roll').innerHTML + '<a href="'+ Hvb + '">'+ Tvb +'</a>'	}
	if(a==9){	$(vb[a]).remove();	document.getElementById('roll').innerHTML = '<a href="'+ Hvb + '">'+ Tvb +'</a>' + document.getElementById('roll').innerHTML  	}
}
$('.next').click(function(){ set(0);	})
$('.prev').click(function(){ set(9);	})


	
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