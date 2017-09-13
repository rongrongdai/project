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
     


<link href="__ROOT__/public/css/home/forit.css" type="text/css" rel="stylesheet" />   

<!--学吧-轮播图-->
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
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/banner1-xb.jpg"/></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/banner2-xb.jpg"/></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/banner3-xb.jpg"/></a></li>
    </ul>
</div>

<!--wrap-->
<div class="train-two">
  <!--公告-->
  <div class="con_a">
  	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/tb3.png" /></div>
  	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/tb2.png" /></div>
  	<div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/tb1.png" /></div>
  	<div class="con" style="margin:0;border:none;">
  		<div class="title">
        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/gong.png" /><div>最新需求信息</div>
      </div>
        <div class="link">
            <?php if(is_array($notices)): foreach($notices as $key=>$notice): ?><a href="<?php echo ($notice["link"]); ?>"><div name="left"><li><?php echo ($notice["ntext"]); ?></li></div><span name="right"><?php echo (date("y-m-d",$spred["atime"])); ?></span></a><?php endforeach; endif; ?>
        </div>
    </div>
  </div>



  <!--内容container-->
  <div class="fort-there"> 
      <div class="forit-ty">

        <div class="fit-ayi">
          <ul>
            <li class="fi-rm">热门老师</li>
            <li class="fi-ry fot" onclick="change('文')">语文</li>
            <li class="fi-ry" onclick="change('数学')">数学</li>
            <li class="fi-ry" onclick="change('英语')">英语</li>
            <li class="fi-ry" onclick="change('音乐')">文艺</li>
          </ul>
        </div>


              
<!--隐藏一-->   
<div class="fit-aer">
<div class="paddt20 home-wkt">
<div class="paddt20 dir_wrap" id="kta">

<!-- -------------------------------------------->
<?php $__FOR_START_4324__=0;$__FOR_END_4324__=5;for($i=$__FOR_START_4324__;$i < $__FOR_END_4324__;$i+=2){ if($i == 0): ?><div class="dir dir_a"><?php elseif($i == 2): ?><div class="dir dir_b"><?php else: ?><div class="dir dir_c"><?php endif; ?>
        <a style="float:left">
          <h4><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($hotch[$i]["c_img"]); ?>" /></h4>
          <h5><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($hotch[$i+1]["c_img"]); ?>" /></h5>
        </a>
        <a class="pimg"></a>

        <b>
          <div class="d1">
                      <span class="a_jj">介绍：</span>
              		  <?php echo ($hotch[$i]["introduce"]); ?>
          </div>
          <div class="d2">
            <div class="vtitley">
                <div class="vtitleyi">
                  <p class="hay">好评</p>
                  <p class="hae">10分</p>
                </div>
                <div class="vtitleer">
                  <p class="has">服务费</p>
                  <p class="haw"><?php echo ($hotch[$i]["price"]); ?>/小时</p>
                </div>
            </div>
            <a href="__APP__/Space/Space/space?uid=<?php echo ($hotch[$i]["uid"]); ?>"><p class="vtitlesa">查看详情</p></a>
          </div>
        </b>

        <i>
          <div class="d1">
                      <span class="a_jj">介绍：</span>
                      <?php echo ($hotch[$i+1]["introduce"]); ?>
          </div>

          <div class="d2">
            <div class="vtitley">
              <div class="vtitleyi">
                  <p class="hay">好评</p>
                  <p class="hae">10分</p>
              </div>
              <div class="vtitleer">
                  <p class="has">服务费</p>
                  <p class="haw"><?php echo ($hotch[$i+1]["price"]); ?>/小时</p>
              </div>
            </div>
            <a href="__APP__/Space/Space/space?uid=<?php echo ($hotch[$i+1]["uid"]); ?>"><p class="vtitlesa">查看详情</p></a>
          </div>
        </i>

    </div><?php } ?>
<!-- -------------------------------------------->
    </div>
  </div>

<!--隐藏结束-->    
              
              
              
        <div class="fit-asan"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/02.gif" /><span class="tl">最新热门讨论</span></div>
 			<ul class="ul_none">
            <?php if(is_array($hdynimics)): foreach($hdynimics as $i=>$vo): ?><!--<?php if($i == 0): ?>-->
               <!-- <li>
                    <div class="fit-asi" onclick="hit(<?php echo ($vo["id"]); ?>)">
                          <div class="f_left"><?php echo ($vo["content"]); ?><span class="fi-h"><?php echo ($vo["readnumber"]); ?>人阅读</span><span class="fi-d">置顶</span><span class="fi-j">精</span></div>  
                          <div class="f_right"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/05.png" /><?php echo ($vo["rname"]); ?></div>
                    </div>
                </li>-->
             <!-- <?php else: ?>-->
                <li>
                    <div class="fit-asi" onclick="hit(<?php echo ($vo["id"]); ?>)">
                          <div class="f_left"><?php echo (strip_tags($vo["content"],"<img>")); ?><span class="fi-h"><?php echo ($vo["readnumber"]); ?>人阅读</span><span class="fi-j">精</span></div>  
                          <div class="f_right"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/05.png" /><?php echo ($vo["rname"]); ?></div>
                    </div>
                </li>

          <!--<?php endif; ?> --><?php endforeach; endif; ?> 

            </ul>
           
              
              <div class="fit-awu">
              		<ul>
                     <li class="fi-rm">热门学生</li>
                     <li class="fi-ry fot" onclick="student('学霸')">学霸</li>
                     <li class="fi-ry" onclick="student('奋青')">奋青</li>
                     <li class="fi-ry" onclick="student('女神')">女神</li>
                     <li class="fi-ry" onclick="student('萌妹子')">萌妹子</li>
                     </ul>
                    
              </div>
              
              <!--隐藏学生--> 
        <div class="left">      
              <div class="fit-aliu">
                  <div class="ft-liuy" style="overflow:hidden;">
                    <div class="cht" style="position:relative;width:2460px;">
            <?php if(is_array($hotstud)): foreach($hotstud as $i=>$vo): if($vo['user_pic']): ?><div class="ft-uyi">
                          <a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>">
                          	<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  class="ft_u_img" src='<?php if(!strpos($vo['user_pic'],'ttp')): ?>__ROOT__/<?php echo ($vo["user_pic"]); else: echo ($vo["user_pic"]); endif; ?>' />
                          	<div class="ft-uer"><?php echo ($vo["rname"]); ?></div>
                          </a>

                        </div><?php endif; endforeach; endif; ?>
           
                  </div>

                  </div>
                   
                   <div class="ft-liuer">
                      <p class="ft-ue ury"></p>
                      <p class="ft-ue"></p>
                      <p class="ft-ue"></p>
                   </div>
                   
              </div>
                      
              <!--隐藏学生结束-->  
        

        	<div class="fit-asan"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/03.gif" /><span class="tl">学吧动态</span></div>

                    

            <?php if(is_array($ddynimics)): foreach($ddynimics as $key=>$dynamic): ?><div class="fit-aqi">
                       <div class="fit-aqi-y">
                           <a href="__APP__/Space/Space/space?uid=<?php echo ($dynamic["uid"]); ?>"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($dynamic["user_pic"]); ?>" class="f-im"/></a>
                       <div class="fit-qi">
                         <a href="#" class="qi_title"><?php echo ($dynamic["rname"]); ?></a>
                         <p><?php echo (date('Y-m-d H时i分',$dynamic["publisttime"])); ?>    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xueba/014.png" /> 浏览（<?php echo ($dynamic["readnumber"]); ?>）</p>
                        </div>
                        </div>
                  <?php  ?>
                  <p class="fit-aqi-e"><?php echo (strip_tags($dynamic["content"],"<img>")); ?></p>
                 <!-- <div class="fit-aqi-s">
                      <p class="fit-pinl">
                      <a class="f_link" href="#" style="background-image:url(__ROOT__/public/images/home/xueba/09.gif)">评论</a><span class="gang">|</span>
                      <a class="f_link" href="#" style="background-image:url(__ROOT__/public/images/home/xueba/010.gif)">转发</a><span class="gang">|</span>
                      <a class="f_link" href="#" style="background-image:url(__ROOT__/public/images/home/xueba/011.png)">收藏</a><span class="gang">|</span>
                      <a class="f_link" href="#" style="background-image:url(__ROOT__/public/images/home/xueba/012.gif)">赞</a><span class="gang">|</span>
					  <span class="f_genduo">...</span>
                      </p>
                      
                      <p class="fit-ab">
                        <textarea placeholder="我也说一句"></textarea>
                      </p>
                  </div>-->

              </div><?php endforeach; endif; ?>  
            <div id="chakg" style="width:800px;padding:30px 0;"><input type="button" value="查看更多" class="chaokg" onclick="more(17)"></div>
      
</div>  
              </div></div></div>
<!--老师学吧-->      
<div class="forit-te">
     <p class="pt-re" >老师学吧</p>
     <p class="pt-rs"></p>

    <?php if(is_array($tbar)): foreach($tbar as $i=>$vo): ?><a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>"><div class="fot-teo">
              
              <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src='<?php if(!strpos($vo['user_pic'],'ttp')): ?>__ROOT__/<?php echo ($vo["user_pic"]); else: echo ($vo["user_pic"]); endif; ?>' class="fot-one" />
        <div class="fot-tw" >
          <p class="fo-ai"><?php echo ($vo["rname"]); ?><span class="fo-ae">语文老师</span></p>
          <p class="fo-ast">一个人拥有什么样的性格,就拥有什么样的世界.</p>
          <p class="fo-as">浏览：<span class="fo-aw">2528</span>人  粉丝：<span class="fo-aw">1121</span>人</p>
        </div>
      </div></a><?php endforeach; endif; ?>
     <p class="pt-re" >学生学吧</p>
     <p class="pt-rs" ></p>
     
     <?php if(is_array($sbar)): foreach($sbar as $i=>$vo): ?><a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>"><div class="fot-thsw">
          <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  class="fo-wy" src="<?php if(!strpos($vo['user_pic'],'ttp')): ?>__ROOT__/<?php echo ($vo["user_pic"]); else: echo ($vo["user_pic"]); endif; ?>" />
          <p class="fo-we"><?php echo ($vo["rname"]); ?></p>
          <p class="fo-ws"><?php echo ($vo["lab"]); ?></p>
          <p class="fo-ww">粉丝：<span>1023</span>人</p>
       </div></a><?php endforeach; endif; ?>



</div>
</div>
</div>




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




<script type="text/javascript">

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
	  var oDivSmall = getByClass(oDiv,'smalltitle')[0]
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

//切换或搜索热门老师
function change(name){
/*  if(!name){ name = $("#tch").val(); }
*/  if(name){
    $.post("__APP__/Ajax/AjaxStudyCenter/hotch",{'kwd':name},function(data){
      if(data){
        $("#kta").html("");
        for(var i=0;i<data.length;i+=2){
          var node = '<a class="a_dir"><h4><img src="__ROOT__'+data[i].c_img+'" width="105px" height="105px"/></h4><h5><img  src="__ROOT__'+data[i+1].c_img+'" width="105px" height="105px" /></h5></a><a class="pimg"></a><b><div class="d1"><span class="a_jj">介绍：</span>'+data[i].introduce+'</div><div class="d2"><div class="vtitley"><div class="vtitleyi"><p class="hay">好评</p><p class="hae">10分</p></div><div class="vtitleer"><p class="has">服务费</p><p class="haw">'+data[i].price+'/小时</p></div></div><a href="__APP__/Space/Space/space?uid='+data[i].uid+'"><p class="vtitlesa">查看详情</p></a></div></b><i><div class="d1"><span class="a_jj">介绍：</span>'+data[i+1].introduce+'</div><div class="d2"><div class="vtitley"><div class="vtitleyi"><p class="hay">好评</p><p class="hae">10分</p></div><div class="vtitleer"><p class="has">服务费</p><p class="haw">'+data[i+1].price+'/小时</p></div></div><a href="__APP__/Space/Space/space?uid='+data[i+1].uid+'"><p class="vtitlesa">查看详情</p></a></div></i>';
        if(i == 0){$('<div class="dir dir_a">'+node+'</div>').appendTo('#kta');}
        if(i == 2){$('<div class="dir dir_b">'+node+'</div>').appendTo('#kta');}
        if(i == 4){$('<div class="dir dir_c">'+node+'</div>').appendTo('#kta');}

        }
      }
      Ma('a', 'b', '.dir_c');Mh('b', 'i', '.d1');
    },'json');
  }
}

//热门学生
function student(lab){
    $.post("__APP__/Ajax/AjaxStudyCenter/student",{'lab':lab},function(data){
      $(".ft-liuy").html("");
      if(data){
          for(var i=0;i<data.length;i++){  
              var node = '<div class="ft-uyi"><img src="__ROOT__/'+data[i].user_pic+'" width="139px" height="140px"/><a href="__APP__/Space/Space/space?uid='+data[i].uid+'"><div class="ft-uer"><p>'+data[i].rname+'</p></div></a></div>';
              $(node).appendTo(".ft-liuy");
          }
      }else{
         $("<span>抱歉！暂无信息</span>").fadeIn(300).appendTo(".ft-liuy");
      }
    },'json')
}

function hit(id){
    $.get("__APP__/Ajax/AjaxTeach/hit?tid="+id,function(){
       window.location.href = "__APP__/Teach/Teach/agentdetail?id="+id;
    });
}



function Mli(t,th){
		if(t=='ue'){
			$('.ft-' + t).removeClass('ury')
			$(th).addClass('ury');			}
		else{
			$('.fit-' + t + ' .fi-ry').removeClass('fot')
			$(th).addClass('fot');
			}
	}
function Mh(b,i,th){
        $('.home-wkt .dir ' + b ).addClass('pblock').removeClass('pnone');  
        $('.home-wkt .dir ' + i ).addClass('pnone').removeClass('pblock');
        if(th=='.d1'){  $('.home-wkt .dir .pimg').css({  backgroundPosition:'0 -157px'  });   }
        if(th=='.d2'){  $('.home-wkt .dir .pimg').css({  backgroundPosition:'0 -16px'  })  }
        }
function Ma(b,i,th){
        $(th).animate({width:'434px'});
        $('.home-wkt .dir_' + b).animate({width:'200px'});
        $('.home-wkt .dir_' + i).animate({width:'200px'});
        }
$('.fit-awu li').click(function(){	Mli('awu',this)	})
$('.fit-ayi li').click(function(){	Mli('ayi',this)	})
$('.ft-liuer .ft-ue').click(function(){	Mli('ue',this)	})
$(".ft-ue").click(function(){var No=$(this).index(),width=-No*820;$(".cht").css('left',width+'px'); });
$('.home-wkt .dir_a').live('mouseenter',function(){   Ma('b', 'c', this) })
$('.home-wkt .dir_b').live('mouseenter',function(){   Ma('a', 'c', this) })
$('.home-wkt .dir_c').live('mouseenter',function(){   Ma('a', 'b', this) })
$('.home-wkt .dir h4').live('mouseenter',function(){  Mh('b', 'i', '.d1')       })
$('.home-wkt .dir h5').live('mouseenter',function(){  Mh('i', 'b', '.d2')       })
Ma('a', 'b', '.dir_c');Mh('b', 'i', '.d1')//默认哪个展开

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