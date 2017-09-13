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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/Space.css" />
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/index.css"/>
<div class="sp-yi">
      <div class="sp-yiapp"> 
         <div class="sp-yiayi"> 
             <div class="ayi-s">
                 <div class="ayi-syi"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  width="158" height="144" src="<?php if($user["user_pic"] != '' ): if(strpos($user['user_pic'],'ttp')): echo ($user["user_pic"]); else: ?>__ROOT__/<?php echo ($user["user_pic"]); endif; else: ?>__ROOT__/public/images/home/uimg.png<?php endif; ?>"></div>

                
             </div>
             
                <div class="ayi-y" <?php if($other != ''): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/guanz.png" />
                   <?php if($concerend == '1'): ?><span>已关注</span><?php else: ?><a href='javascrpt:;' name='concern'><span>关注该<?php if($user["type"] == 1): ?>用户<?php elseif($user["type"] == 2): ?>教师<?php elseif($user["type"] == 3): ?>培训机构<?php elseif($user["type"] == 4): ?>代理商<?php endif; ?></span></a><?php endif; ?>
                </div>  
             
         </div>
         
         <div class="sp-yiaer">

             <p ><span class="spwyi"><?php if($user["rname"] != ''): echo ($user["rname"]); endif; ?></span>   <span class="spwer">等级：<?php echo ($user["u_lev"]); ?>星</span> <span class="spwer">积分：<?php echo ($user["u_credit"]); ?></span> </p>

            
             <p><span class="spwsan"><!--<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/diz.png" />-->所在地：<span><?php echo ($user["address"]); ?></span></span><span style="font-family: 宋体;font-size:14px;margin-left:99px;">性别:<span><?php if($user["sex"] == 1): ?>男<?php elseif($user["sex"] == 2): ?>女<?php else: ?>暂未设置<?php endif; ?></span>&nbsp; </span>  </p>
             <p class="sp-ly" ><span style="font-family: 宋体;font-size:14px;">身份:<span>学生</span>&nbsp;</span>  <span style="margin-left:235px;font-family: 宋体;font-size:14px;">生日:<span><?php if($user["birth"] != ''): echo ($user["birth"]); else: ?>暂无<?php endif; ?></span></span></p>    
             <div style="clear:both;"></div>
             <p><span class="spwsi">个性说明</span>：<span class="spwwu"><?php if($user["content"] != ''): echo ($user["content"]); else: ?>暂未设置<?php endif; ?></span></p>
<!--             <p class="spwwuy"><a href="__ROOT__/index.php/User/User/ucenter?page=uset" target="_blank">设置</a></p>-->

         </div>
         <div class="sp-yiasan">
                   <div class="san-y">
                          <div class="san-yi">
                              <p class="sp-hui">关注</p>
                              <p class="sp-dai"><?php if($user["visitnumber"] > 0): echo ($user["visitnumber"]); else: ?>0<?php endif; ?></p>
                          </div>
                          <div class="san-yi">
                              <p class="sp-hui">粉丝</p>
                              <p class="sp-dai"><?php if($user["visitednumber"] > 0): echo ($user["visitednumber"]); else: ?>0<?php endif; ?></p>
                          </div>
                          <div class="san-yi qxu">
                              <p class="sp-hui">学问</p>
                              <p class="sp-dai"><?php if($user["sq"] > 0): echo ($user["sq"]); else: ?>0<?php endif; ?></p>
                          </div>
                   </div>
             <?php if($other != ''): ?><div class="san-e">
                       <a href="javascript:;"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/huihua.png" /><span name="pmessage" mid="<?php echo ($user["uid"]); ?>">给TA私信</span></a>
                  </div><?php endif; ?>
                   <div class="san-s" style='margin-top:10px;'>
                       <p>标签：<?php echo ($user["lab"]); ?></p>
                   </div>
         </div>
              
      </div>
    
 
 </div>

<div class="sp-er">
<div class="sp-er-left">
                 <div class="sleft-y <?php if($page == 'index'): ?>onw<?php endif; ?>">
                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/dymic.png"/>
                        <span><?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的动态</span>
                       <div class="sleft-yi  <?php if($page == 'index'): ?>wod<?php endif; ?>"></div> 
                 </div>
                <div class="sleft-y <?php if($page == 'qcenter'): ?>onw<?php endif; ?>">
                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/xiewen.png" />
                        <span><?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的学问</span>
                        <div class="sleft-yi <?php if($page == 'qcenter'): ?>wod<?php endif; ?>"></div>
                 </div>
                 
                 <div class="sleft-y <?php if($page == 'teach'): ?>onw<?php endif; ?>">
                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/jiajiao.png" />
                        <span><?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的家教</span>
                        <div class="sleft-yi <?php if($page == 'teach'): ?>wod<?php endif; ?>"></div>
                 </div>
                 
                 <div class="sleft-y <?php if($page == 'course'): ?>onw<?php endif; ?>">
                       <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/bx.png"/>
                        <span><?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的课程</span>
                        <div class="sleft-yi <?php if($page == 'course'): ?>wod<?php endif; ?>"></div>
                 </div>
                 <?php if(!$other): ?><div class="sleft-y <?php if($page == 'exam'): ?>onw<?php endif; ?>" >
                       <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/kaoshi.png"/>
                        <span><?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的考试</span>
                        <div class="sleft-yi"></div>
                 </div><?php endif; ?>
            <?php if(!$other): ?><div class="sleft-y <?php if($page == 'find'): ?>onw<?php endif; ?>" >
                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/friend.png"/>
                    <span>找人</span>
                    <div class="sleft-yi"></div>
                </div>

                <!-- invite-friend-2015-6-26 -->
<!--                <div class="sleft-y <?php if($page == 'invite'): ?>onw<?php endif; ?>" onclick="invite()" >
                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/friend.png"/>
                    <span>邀请注册</span>
                    <div class="sleft-yi"></div>
                </div>--><?php endif; ?>
                  <?php if(!$other): ?><div class="sleft-y <?php if($page == 'setting'): ?>onw<?php endif; ?>" >

                              <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/setting.png"/>
                               <span>个性设置</span>
                               <div class="sleft-yi"></div>
                        </div><?php endif; ?>
            </div>


<script>
     $(function(){
         $(".sp-er-left").find(".sleft-y").click(function(){
             var ustr="";
         if(location.href.indexOf('?')!==-1){
              ustr=location.href.substr(location.href.indexOf('?'));
         }
       
         switch($(this).find("span").text()){
             case '<?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的动态':
                 location.href="space"+ustr;
                 break;
            case '<?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的学问':
                 location.href="qcenter"+ustr;
                 break;
            case '<?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的家教':
                 location.href="teach"+ustr;
                 break;
            case '<?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的课程':
                 location.href="course"+ustr;
                 break;
            case '<?php if($other != ''): ?>他<?php else: ?>我<?php endif; ?>的考试':
                 location.href="exam"+ustr;
                 break;     
            case '找人':
                 location.href="find"+ustr;
                 break;
            case '个性设置':
                 location.href="setting"+ustr;
                 break;
         };
         
     }); 
     var src=$(".onw").find("img").attr('src');
        $(".onw").find("img").attr('src',src.replace(/(\w+)\.(jpg|png)/,"$11.$2"));
        $(".onw span").css("color","#FFF");
     })

</script>
 <div class="sp-er-center">
        <div class="lookre-one">
          <ul>
            <li class="lookr-yi look" name="find">找人</li>
            <li class="lookr-yi" name="lab">标签</li>
           
          </ul>
        </div>
         <div class="lookre-two" name="search">
              <div class="loot-yi"><input type="text" id="indelook" placeholder="按地区，昵称，个性简介，性别查找。" style="padding-left:10px;"/></div>
              <a href="javascript:;"><div class="loot-er" id="seabut"><p>搜索</p></div></a>
         </div>
         <div class="lookre-there" style="display:none;margin-top:40px;" id="tag">
             <div class="look-ty"><p class="rmen"><a href="javascript:;">标签列表</a><span class="huan-y"><a href="javascrpipt:;" name="change">换一换</a></span></p></div>
             
             <div class="look-te">
                <div class="look-teyi tag"> <span></span> </div>
                <div class="look-teer tag"> <span></span> </div>
                <div class="look-tesan tag"> <span></span> </div>
                <div class="look-tesi tag"> <span></span> </div>
                <div class="look-tewu tag"> <span></span> </div>
                <div class="look-teliu tag"> <span></span> </div>
                <div class="look-teqi tag"> <span></span> </div>
                <div class="look-teba tag"> <span></span> </div>
                
             </div>
         </div>
 
        
        <div class="lookre-there" style="display:block;" id="find">
            <div class="looere-yi res" name="res">
            </div>
              <div style="clear:both;"></div>
            
        <!--分页-->
            <div class="look-fover">
             <p class="rmen"><a href="#" class="hurm">达人榜</a><span class="huan-y"><a href="javascript:;" name="change" style="display:none;">换一换</a></span></p>
            </div>
        
            <div class="looere-yi">
              <div class="looere-yyi">
                   <div class="lomkimy"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/yjn.gif" /></div>
                   <div class="lomkime">
                   <p class="houd">华文达<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/txing.gif" /></p>
                   <p>粉丝：1101</p>
                   <p>简介：小学，中学..</p>
                   <p class="guanzh">关注</p>
                   </div>
                </div>
              
                <div class="looere-yyi">
                   <div class="lomkimy"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/yjn.gif" /></div>
                   <div class="lomkime">
                   <p class="houd">华文达<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/txing.gif" /></p>
                   <p>粉丝：1101</p>
                   <p>简介：小学，中学..</p>
                   <p class="guanzh">关注</p>
                   </div>
                </div>
              
                <div class="looere-yyi">
                  <div class="lomkimy"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/yjn.gif" /></div>
                   <div class="lomkime">
                   <p class="houd">华文达<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/txing.gif" /></p>
                   <p>粉丝：1101</p>
                   <p>简介：小学，中学..</p>
                   <p class="guanzh">关注</p>
                   </div>
                </div>
                
            </div>
        
        </div>
      </div>
 </div>
<script src="__ROOT__/public/js/home/easing.js"></script>
<script src="__ROOT__/public/js/home/circulate.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/laytpl.js"></script>
<script id="tuser" type="text/html">
    <div class="looere-yyi">
        <div class="lomkimy"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/{{# if(!d.img){d.img="public/imgages/nimg.png";}}}{{d.img}}" style="width:82px;height:85px"/></div>
         <div class="lomkime">
            <p class="houd">{{d.rname}}<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/txing.gif" /></p>
            <p>粉丝:<span name="fs">{{d.visitednumber}}</span></p><p>{{#  if(d.content){d.content=d.content.substr(0,5)+"..."}}}
                {{d.content}}</p>
            <p class="guanzh"><a href="javascript:;" id="{{d.uid}}" style="width:60px;color:#FFF;text-decoraguanzhtion:none;margin-left:3px;">{{# if(d.sum>0){d.foid="查看空间"}else{d.foid="关注"}}}{{d.foid}}</a></p>
            </div>
        </div>
</script>
<script>
    $(function(){
                var page=1;
                var lpage=1;
                var labs=[];
                var sum=0;
                var url="__ROOT__/index.php/Ajax/AjaxFind/getpPerson";
                var res=[];
                var sval='';
                $(".lookre-one").find(".lookr-yi").click(function(){
                    $(".lookre-one").find(".lookr-yi").removeClass("look");
                    $(this).addClass("look");
                })
                function initg(){
                    $(".guanzh").click(function(){
                        var sobj=$(this);
                        if(sobj.find("a").text()==='关注'){
                            $.getJSON("__ROOT__/index.php/Space/Space/concern",{'uid':$(this).find("a").attr("id")},function(data){
                                   var type=data.code==='1'?1:2;
                                   sobj.text("进入空间");
                                   var te=parseInt(sobj.parent().find("span[name=fs]").text());
                                   sobj.parent().find("span[name=fs]").text(te+1);
                                   $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: type,msg: data.message}});
                                });
                            
                        }else{
                            location.href="__ROOT__/index.php/Space/Space/space?uid="+$(this).find("a").attr("id");
                        }
                        
                    })
                }
                $("#seabut").click(function(){
                    if($("#indelook").val() && $("#indelook").val()!==sval){
                        sval=$(this).val();
                        $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/getUsers',{'keyword':$("#indelook").val()},function(data){
                            if(data.sum>0){
                                $("div[name=res]").find(".looere-yyi").remove();
                                for(var i in data.entities){
                                     var gettpl = document.getElementById('tuser').innerHTML;
                                     laytpl(gettpl).render(data.entities[i], function(html){
                                     $("div[name=res]").append(html);
                                    });
                                    
                                }
                                initg();
                            }else{
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 3,msg:'找不到相关会员！'}});
                            }
                        });
                    }
                })
                function move(){
                     $(".tag").circulate({
                                    speed: 400,                  // Speed of each quarter segment of animation, 1000 = 1 second
                                    height: 200,                 // Distance vertically to travel
                                    width: 200,                  // Distance horizontally to travel
                                    sizeAdjustment: 100,         // Percentage to grow or shrink
                                    loop: false,                 // Circulate continuously
                                    zIndexValues: [1, 1, 1, 1]   // Sets z-index value at each stop of animation
                      });
                }
                function adata(arr,sum){
                    for(var i in arr){
                            var uimg=arr[i].img?"__ROOT__"+arr[i].img:"__ROOT__/public/images/home/uimg.png";
                            var vit=arr[i].visitednumber?arr[i].visitednumber:0;
                            var intr=arr[i].self_info?'<p>简介：'+arr[i].self_info+'</p>':''.substr(0.6)+"...";
                            var hand=arr[i].isF?'查看空间':'关注';
                            arr[i].uname=arr[i].uname.substr(0,6)+"...";
                            var pagesize=9;
                            sum=sum;
                            var item='<div class="looere-yyi">'+
                                    '<div class="lomkimy"><img onerror="javascript:this.src='+"'"+"__ROOT__/public/images/home/n_pic.png';"+'"'+'  src="'+uimg+'" style="width:82px;height:85px"/></div>'+
                                    '<div class="lomkime">'+
                                    '<p class="houd">'+arr[i].uname+'<img onerror="javascript:this.src='+"'"+"__ROOT__/public/images/home/n_pic.png';"+'"'+'  src="__ROOT__/public/images/home/space/txing.gif" /></p>'+
                                    '<p>粉丝:'+vit+'</p>'+intr+
                                    '<p class="guanzh"><a href="javascript:;" id="'+arr[i].uid+'" style="width:60px;color:#FFF;text-decoration:none;margin-left:3px;">'+hand+'</a></p>'+
                                    '</div>'+
                                 '</div>';
                           $("div[name=res]").append(item);
                           if(sum>pagesize){
                               $("a[name=change]").show();
                           }
                    }
                }
                function loadData(obj){
                     $.getJSON(url,obj,function(data){
                         if(!res.length){
                            res=data.datas;
                           
                         }
                        adata(data.datas,data.sum);
                        initg();
                    })
                }
                loadData({'page':page});
                $("li[name=find]").click(function(){
                        $("#find").show();
                        $("#tag").hide();
                        $("div[name=search]").show();
                        $("div[name=res]").find(".looere-yyi").remove();
                        adata(res,res.length);
                    })
                    $("li[name=lab]").click(function(){
                        $("#find").hide();
                        $("#tag").show();
                        $("div[name=search]").hide();
                        if(labs.length>0){
                           move();
                        }else{
                            $.getJSON('__ROOT__/index.php/Ajax/AjaxConfig/getConfig',{'type':'用户配置','key':'u_label'},function(data){
                                labs=data.labs.c_value.split('，');
                                $(".tag").each(function(k){
                                    $(this).find("span").text(labs[k]);
                                })
                                $(".tag").show();
                                move();
                            });
                        }
                    })
                    $(".tag").click(function(){
                        $("#tag").hide();
                        $("div[name=res]").find(".looere-yyi").remove();
                        loadData({'lab':$(this).find("span").text(),'page':page});
                        $("#find").show();
                    })
                    $("li[name=zone]").click(function(){
                        
                    })
                    
                    $("a[name=change]").click(function(){
                        lpage++;
                        var star=(lpage-1)*8-1;
                        if(star<0){
                            star=0;
                        }
                        if(lpage*8<labs.length){
                            $(".tag").each(function(k){
                                star=star+k;
                                $(this).find("span").text(labs[star]);
                            })
                        }else{
                            $(".tag").each(function(k){
                                star=star+k;
                                if(star===labs.length){
                                    star=0;
                                }
                                $(this).find("span").text(labs[star]);
                                lpage=0;
                            })
                        }
                        
                        move();
                    })
    })
  
    
</script>
<div style="clear:both;"><?php echo ($pages); ?></div>
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