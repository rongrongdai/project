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
     


<style>
    .tent_con{width:620px;padding:10px 20px;margin:0 auto;margin-top:10px;border:1px solid #ccc;overflow:hidden;font-family:"微软雅黑";}
    .tent_con .top{height:28px;}
    .tent_con .top div{float:left;line-height:28px;margin-left:5px; color:#636363;}
    .tent_con .top img{float:left;width:20px; height:20px;margin-top:5px }
    .tent_con .con{height:60px;padding:10px 0;}
    .tent_con .con textarea{width:610px;height:52px;border:1px solid #CCC;outline:none;padding:4px 5px;color:#555; resize:none;}
    .tent_con .bot{height:35px;}
    .tent_con .bot .beft{float:left;margin-right:15px;height:25px;padding:5px 0;cursor:pointer;}
    .tent_con .bot .beft .tet{float:left;line-height:28px;font-size:14px; color:#636363; }
    .tent_con .bot .beft div.img{float:left;background-image:url(__ROOT__/public/images/home/space/icon2.png);width:28px;height:28px;}
    .tent_con .bot .beft div.img.v1{ background-position:-25px 6px;}
    .tent_con .bot .beft div.img.v2{ background-position:-25px -27px;}
    .tent_con .bot .beft:hover div.img.v1{ background-position:6px 6px;}
    .tent_con .bot .beft:hover div.img.v2{ background-position:6px -27px;}
    .tent_con .bot .beft:hover .tet{color:#F93;}
    .tent_con .bot .release{float:right;width:85px;height:35px;background:#00b38a;line-height:35px;text-align:center;border-radius:4px;color:#FFF;cursor:pointer;}
    .tent_con .bot .release:hover{background:#009500;}

    .addons .layer-content{
            background:#fff;
            padding:10px;
            -moz-border-radius-bottomleft:4px;
            -moz-border-radius-bottomright:4px;
            -webkit-border-bottom-left-radius:4px;
            -webkit-border-bottom-right-radius:4px;
            border-bottom-left-radius:4px;
            border-bottom-right-radius:4px
    }
    .addons .layer-content .emotions li{
            border:1px solid #e8e8e8;
            cursor:pointer;
            float:left;
            width:26px;
            overflow:hidden;
            padding:4px 2px;
            text-align:center;
            margin:0
    }
    .addons .layer-content .emotions li:hover{
            border:1px solid #0095cd;
            background:#fff9ec
    }
    .tent_reply{width:615px;padding:10px 20px;margin:30px auto;border:1px solid #ccc;overflow:hidden;font-family:"微软雅黑";}
    .tent_reply .con{height:60px;padding:10px 0;}
    .tent_reply .con textarea{width:600px;height:52px;border:1px solid #CCC;outline:none;padding:4px 5px;color:#555; resize: none;}
    .tent_reply .bot{height:35px;}
    .tent_reply .bot .beft{float:left;margin-right:15px;height:25px;padding:5px 0;cursor:pointer;}
    .tent_reply .bot .beft div.tet{float:left;line-height:28px;font-size:14px; color:#636363;}
    .tent_reply .bot .beft div.img{float:left;background-image:url(__ROOT__/public/images/home/space/icon2.png);width:28px;height:28px;}
    .tent_reply .bot .beft div.img.v1{ background-position:-25px 6px;}
    .tent_reply .bot .beft:hover div.img.v1{ background-position:6px 6px;}
    .tent_reply .bot .beft:hover div.tet{color:#F93;}
    .tent_reply .bot .release{float:right;width:85px;height:35px;background:#00b38a;line-height:35px;text-align:center;border-radius:4px;color:#FFF;cursor:pointer;}
    .tent_reply .bot .release:hover{background:#00b38a;}
    .tent_reply .bot .rig_con{float:right;font-size:14px;line-height:35px;margin-right:20px; color:#636363;}
</style>
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
                    <span class="cone">有什么新的学习窍门，来跟大家一起分享</span>
                   
                    <?php if(!$other): ?><form method="post" id="dataform" action="" enctype="multipart/form-data">
                            <div class="tent_con">
                            <div class="top"><img  src="__ROOT__/public/images/home/space/icon1.png" /><div>发布分享</div></div>
                            <div class="con"><textarea  placeholder="分享内容..." id='content' name='content' ></textarea></div>
                            <div class="bot">
                                <div class="beft"><div class="img v1"></div><div class="tet" name='face'>表情</div></div>
                                <div class="beft"><div class="img v2"></div><a href="javascript:;"> <span class="tet" id="simg">图片</span><input type="file" name="simg" style="display:none"/></a></div>
                                <div class="release" name='spred'>发布</div>
                                <div id="show"></div>
                            </div>
                            </div>
                              <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                              <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
                         </form><?php endif; ?>
                        
                    <div class="scenter-san" style='margin-top:20px;'>
                        <?php if(!$other): ?><div class="center-yi <?php if($type == 'all'): ?>cw<?php endif; ?>" name="all" > 所有动态(<?php echo ($sum); ?>)</div><?php endif; ?>
                        <div class="center-yi <?php if(($type == 'self') OR ($other)): ?>cw<?php endif; ?>" name="self">我的动态(<span id="mdy"><?php echo ($ssum); ?></span>)</div>
                    
                    </div>
                    <div style="clear:both;"></div>
                    <?php if(is_array($dymics)): foreach($dymics as $key=>$dymic): ?><div class="cent-yincy">
                       
                               <div class="centw-ere" style="font-size:14px;">
                                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png'"  src="<?php if($user["user_pic"] != '' ): if(strpos($user['user_pic'],'ttp')): echo ($user["user_pic"]); else: ?>__ROOT__/<?php echo ($user["user_pic"]); endif; else: ?>__ROOT__/public/images/home/uimg.png<?php endif; ?>"' width="60px" height="60px" align="center" style="margin-right:5px;"><?php echo (strip_tags($dymic["content"])); ?>
                                </div>
                          <?php if($dymic["contentpic"] != '' ): ?><div class="centw-ery"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($dymic["contentpic"]); ?>"  /></div><?php endif; ?>
                         <div class="centw-san">
                                   <div class="centw-sy">
                                     <a href="javascript:;"><span>折叠<?php echo ($dymic["id"]); ?></span><div class="sy-yi"></div></a>
                                    </div>
                                    <div class="centw-se">
                                    <span>发表于：<?php echo ($dymic["publisttime"]); ?></span>  
                                    <span><a href="javascript:;">来自:<?php if($nickname): echo ($nickname); else: echo (session('uname')); endif; ?></a></span>     
                                    <span><a href="#">转发</a></span>
                                    <span><?php echo ($dymic["readnumber"]); ?> 人阅读</span>        
                                    <span><a href="javascript:;" name="gcomment" number="<?php echo ($key); ?>">
                                    	<img onerror="javascript:this.src=__'ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space/shuo.gif" /> 
                                    	<span name="goodnumber"><?php echo ($dymic["goodnumber"]); ?></span></a>
                                    </span>        
                                    <a class="centw-s-y" name="comment" href="javascript:;">我要评论</a>
                                    </div>                           
                         </div> 
                         <div class="centw-si">
                                 <?php if(true): ?><a href="javascript:;" name='comment' number='<?php echo ($key); ?>'></a> 
                                    
                                    <div class="tent_reply" style="display:none">
                                        <div class="con"><textarea name="content<?php echo ($key); ?>" placeholder="您的评论！" id='content<?php echo ($key); ?>' value=""></textarea></div>
                                        <div class="bot">
                                            <div class="beft"><div class="img v1"></div><div class="tet" name="face">表情</div></div>
                                            <div class="release" name="reply">回复</div>
                                            <div class="rig_con">还可以输入140个字符</div>
                                        </div>
                                    </div><?php endif; ?>
                                
                        </div> 
                    </div>
                    
                      <div class="pingren" >
                      
                           <?php if(is_array($dymic["comment"])): foreach($dymic["comment"] as $key=>$comment): ?><div class="pinnnnn">
                                <div class="pren-yi">
                                    <div class="pinimg"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="<?php if($comment["3"] != ''): if(strpos($comment[3],'ttp')): echo ($comment["3"]); else: ?>__ROOT__/<?php echo ($comment["3"]); endif; else: ?>__ROOT__/public/images/home/nimg.png<?php endif; ?>"  width="40px" height="40px"/> </div>
                                    <div style='float:left;margin-left: 12px;'>
                                        <span><?php echo ($comment["2"]); ?> 回复:</span><span name="comment" style="margin-left:6px;"><?php echo ($comment[1]); ?></span><br/><span style='line-height: 30px;'><?php echo ($comment["0"]); ?></span>
                                    </div>
                                </div> 
                                <div style="clear:both;"></div> 
                            </div><?php endforeach; endif; ?>
                           
                          
                      </div><?php endforeach; endif; ?>
            </div>
    <div class="sp-er-right">

    <div class="righte">
        <div class="righte-y">
                        <span>周<?php echo ($week); ?></span>
                        <p><?php echo ($time); ?></p>
        </div>
        <div class="righte-y">
                       <a href="javascript:;"><p class="qdao">签到</p></a>
        </div>
        <div class="righte-y">
            <span>0</span>
            <p>Days</p>
        </div>
    </div>

    <div class="righty">
                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/space_adv.png" style="margin-top:2px;width:249px;"/>
    </div>
                 
                 
               <!--  <div class="rightsa">

                 </div>
                 
                  <div class="rightsi">
                       <span>粉丝</span>
                       <span class="yingy"><?php echo ($user["visitednumber"]); ?></span>
                 </div>
            
                   <div class="rightsi">
                        <span>关注</span>
                        <span class="yingy"><?php echo ($user["visitnumber"]); ?></span>
                 </div>
                  
                   <div class="rightsi">
                       <span>访客</span>
                       <span class="yingy"><?php echo ($user["comstomer"]); ?></span>
                 </div>
                  -->
                 
                 <div class="rightwu" style='margin-top:20px;'>
                 <p style="float:left;">Wo关注的人（<?php echo ($user["visitnumber"]); ?>）</p><p style="float:right;background:#00b38a;line-height: 20px;color:white;padding:0 10px;cursor: pointer;margin-top:-3px;" onclick="javascript:$('.riliu').show();">更多</p>
                 </div>
                  <div style="clear:both;"></div>
                  <?php if($user["visitnumber"] > 0): ?><div class="rightliu">
                           <?php if(is_array($visitors)): foreach($visitors as $key=>$vistor): ?><div class="riliu" style="border:1px solid lightgrey;margin-bottom: 10px;<?php if($key > 8): ?>display:none;<?php endif; ?>" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php if(vistor.user_pic): echo ($vistor["user_pic"]); else: ?>public/images/home/nimg.png<?php endif; ?>" width="60px" height="60px"><span style="text-align: center;margin-left:8px;color:#6b6b6b;font-size:12px;line-height: 18px;"><?php echo (mb_substr($vistor["rname"],"0","9")); if((mb_strlen($vistor[rname]) > 9) OR (mb_strlen($vistor[rname]) == 0)): ?>..<?php endif; ?></span></div><?php endforeach; endif; ?>
                       </div><?php endif; ?>

</div>
            
 
 
 
<script>
    $(function(){
        $(".qdao").click(function(){
            $.getJSON("__ROOT__/index.php/Ajax/AjaxUser/sign",function(data){
                var type=data.code==='1'?1:2;
                 $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: type,msg: data.message}});
            });
        })
    })
</script>

</div>
<script id="comment" type="text/html">
     <div class="pinnnnn">
        <div class="pren-yi">
            <div class="pinimg"><img align="center" onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/{{# if(!d.img){d.img="public/images/home/nimg.png"}}}{{d.img}}"  width="40px" height="40px"/> </div>
            <div style='float:left;margin-left: 12px;'>
                <span>{{d.rname}} 回复:</span><span name="cc">{{d.content}}</span><br/><span style='line-height: 30px;'>{{d.time}}</span>
            </div>
            </div> 
        <div style="clear:both;"></div> 
    </div>
</script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/laytpl.js"></script>
<script src="__ROOT__/public/js/layer/extend/layer.ext.js"></script>
<script src="__ROOT__/public/js/home/manhuaHtmlArea.1.0.js"></script>
<script src='__ROOT__/public/js/jquery.form.js'></script>
<script>
$('.center-yi').click(function(){
		 $('.center-yi').removeClass('cw');
		   $(this).addClass('cw')
})
 function initpic(){
        $(".centw-ery").find("img").each(function(){
            if($(this).width()>300){
                $(this).css('width',"300");
            }
            
        })
    }

$(function(){
    initpic();
    $(".centw-ery").find("img").error(function(){
        $(this).css('width',"300");
    })
    var upic="__ROOT__<?php echo ($user["user_pic"]); ?>";
   
    $("a[name=comment]").click(function(){
       // $(this).parent().siblings('div.tent_reply').toggle();//有多个tent_reply   CSS名时
       //$('.tent_reply').toggle();//没有多个tent_reply   CSS名时
        if($(this).parent().parent().next(".tent_reply").css("display")==='block'){
            $(this).parent().parent().next(".tent_reply").hide();
        }else{
            $(this).parent().parent().next(".tent_reply").show();
        }
    })
    $("span[name=comment]").find("img").attr("align","center");
    $("div[name=face]").click(function(){
       var did=$(this).parent().parent().parent().find("textarea").attr("id");
        $(this).manhuaHtmlArea({
		Event : "click",
		Left : -22,
		Top : 23,			
		id : did
	});
    })
    
    $(".centw-ere").find("p").each(function(){
        if($(this).find("img").size()){
           $(this).css("float","left").css("margin-top","-10px").css("margin-left","35px");  
        }else{
           $(this).css("float","left").css("margin-top","20px").css("margin-left","35px");
        }
        
    })
    $(".pinimg").each(function(){
            $(this).next("div:first").each(function(){
                $(this).find("span").find("p").each(function(){
                    var obj=$(this);
                    if($(this).find("img").size()){
                        $(obj).css("margin-top","-12px");
                    }
                });
            })
    })
    var uid="<?php echo (session('uid')); ?>";
    $("a[name=concern]").click(function(){
       $.get("__ROOT__/index.php/Space/Space/concern",{"uid":uid},function(data){
           data=eval("("+data+")");
           if(data){
               $(".yingy").text(parseInt( $(".yingy").text())+1);
           }
           $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
       });
    })
       
    
    
    $("div[name=reply]").click(function(){
        var cval= $(this).parent().parent().find("textarea").val();
        var id=$(this).parent().parent().find("textarea").attr("id").substr($(this).parent().parent().find("textarea").attr("id").lastIndexOf('t')+1);
        $(this).parent().parent().find("textarea").replaceContent(cval);
        var content=$(this).parent().parent().find("textarea").val();
        var pobj=$(this).parent().parent();
        if(content && content!=='您的评论！'){
            $.get('__ROOT__/index.php/Space/Space/comment',{'id':id,'content':content},function(data){
                data=eval("("+data+")");
                if(data.code===1){
                   var gettpl = document.getElementById('comment').innerHTML;
                   laytpl(gettpl).render(data.res, function(html){
                        $(".pingren").append(html);
                   });
                   $("span[name=cc] img").attr('align','center');
                    $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 1,msg:'评论成功！'}});
                    pobj.find("textarea").val('');
                    pobj.hidden();
                }else{
                    $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 3,msg:data.message}});
                }
            })
        }else{
             $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 3,msg: '请输入评论内容！'}});
         }
    })
    $("a[name=gcomment]").click(function(){
        var obj=$(this);
        $.get('__ROOT__/index.php/Space/Space/gcomment',{'id':$(this).attr('number')},function(data){
            data=eval('('+data+')');
            if(data.code==1){
                var gn="span[name=goodnumber"+$(obj).attr('number')+"]";
                $(obj).find("span[name=goodnumber]").text(parseInt($(obj).find("span[name=goodnumber]").text())+1);
            }
            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
        });
    })
    $("#tabHeads").find("span").hide();
    $("#simg").click(function(){
        $("input[name=simg]").click();
    });
    function initc(type){
        var url=location.href;
         url=url.substr(0,url.indexOf("?"));
         location.href=url+"?type="+type;
    }
    $("div[name=all]").click(function(){
         initc('all');
    })
    $("div[name=self]").click(function(){
         initc('self');
    })
    
    $("div[name=spred]").click(function(){
        $("#content").replaceContent($("#content").val());
        if($("#content").val()!==''){
             var options = {
                            type:'post',
                            url:'__ROOT__/index.php/Space/Space/space',
                            success: function (data) {
                                data=eval('('+data+')');
                                if(data.code==1){
                                    var comment='<div class="cent-yincy">';
                                    comment+='<div class="centw-ere">'+'<img onerror="javascript:this.src='+"'"+"__ROOT__/public/images/home/n_pic.png';"+'"  src="'+upic+'"'+' width="60px" height="60px" style="float:left;">'+
                                    data.content+'</div>';
                                    if(data.type===1){
                                            comment=comment+
                                            "<div class='centw-ery'><img align='center' src='__ROOT__/"+data.img+'" /></div>';
                                    }
                                    comment+='<div class="centw-san">'+
                                                  '<div class="centw-sy">'+
                                                   ' <a href="javascript:;"><span>展开</span><div class="sy-yi"></div></a>'+
                                                   '</div>'+
                                                  ' <div class="centw-se">'+
                                                    '<span>刚刚</span>'+
                                                    '<span><a href="javascript:;">来自:<?php echo (session('uname')); ?></a></span>'+    
                                                    '<span><a href="javascript:;">转发</a></span>'+     
                                                    '<span>0 人阅读</span>'+        
                                                    "<span><a href='#'><img onerror='javascript:this.src="+'"'+'__ROOT__/public/images/home/n_pic.png'+'"'+"'"+'src="__ROOT__/public/images/home/space/shuo.gif" />0</a></span>'+        
                                                    ' <a class="centw-s-y" name="comment" href="javascript:;">我要评论</a>'+
                                                   '</div>'; 
                                          
                                    $(".cent-yincy:first").before(comment);
                                    initpic();
                                    $("#mdy").text(parseInt($("#mdy").text())+1);
                                    
                                }
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
                            }
                        };
                        
           $("#dataform").ajaxSubmit(options);
           $("#content").val('');
        }else{
            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '请输入分享内容！'}});
        }
    })
  
})	

$('.centw-sy').click(function(){
     $(this).find("span").size();
	 var Cssname = $(this).find("div").attr('class');
	 if( Cssname == 'sy-yi'){
             $(this).find("div").addClass('sy-now').removeClass(Cssname);
         }else{	
             $(this).find("div").addClass('sy-yi').removeClass(Cssname);
         }
     $(this).parent().parent().next('.pingren').toggle();
})
$("span[name=pmessage]").click(function(){
    var id=$(this).attr("mid");
     layer.prompt({title: '请输入私信内容？'}, function(name){
                $.getJSON('__ROOT__/index.php/Ajax/AjaxMessage/sendMessage',{'to':id,'content':name},function(data){
                    var type=data.code==='1'?1:2;
                    $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: type,msg: data.message}});
                });
          });
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