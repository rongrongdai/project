<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/teach_detail.css"/>


<div class="pwidth">
    <div class="hotnav">当前位置：<a href="javascript:history.back()"> 家教</a> > <a href="javascript:">列表页</a></div>
</div>
<div class="pwidth">

    <!------------------------------------>
    <div class="left">
    	<div class="area">
            <div class="are">区域：</div>
            <div class="region click"><a href="?id">全部</a></div>
            <?php if(is_array($area)): foreach($area as $i=>$vo): ?><div class="region"><a href="?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></div><?php endforeach; endif; ?>    
    	</div>

    	
        <div class="listcs" id="listid">

        <?php if(is_array($agent)): foreach($agent as $i=>$vo): ?><div class='list'>

                        <div class="mtop">
                            <div class='list-left'>
                                <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src='__ROOT__<?php echo ($vo["lincence"]); ?>'  class="l_img" />
                            </div>
                            <div class='list-cent'>
                                <h1><?php echo ($vo["real_name"]); ?></h1>
                                <div class='listtet'>所在地：<?php echo ($vo["address"]); ?></div>
                                <div class='listtet'>评级：</div>
                            </div>
                            <div class='list-right'>
                                <div class="tet3">
                                    <div class="pname">
                                        <div class="">老师数量</div>
                                        <div class="rom"><?php echo ($vo["count_t"]); ?></div>
                                    </div>
                                    <div class="pname">
                                        <div class="">学生评价</div>
                                        <div class="rom">9分</div>
                                    </div>
                                    <div class="pname" style="border:none;">
                                        <div class="">报务学生</div>
                                        <div class="rom">100名</div>
                                    </div>
                                </div>
                                <a class='tails pbor v<?php echo ($i); ?>'>查看详情</a>
                            </div>            
                        </div>

                        <div class='drop v<?php echo ($i); ?>'>
                            <div class='drop-top'>
                                <div class='drop-lr yw activ'>   语文 <span class='d-sp'>  </span>         </div>
                                <div class='drop-lr sx '>        数学 <span class='d-sp'>  </span>         </div>
                                <div class='drop-lr yy '>        英语 <span class='d-sp'>  </span>         </div>
                                <div class='drop-lr wy '>        文艺 <span class='d-sp'>  </span>         </div>
                                <div class='drop-kong '></div>
                            </div>
                            <div class='drop-bottom'>
                                <!-------------------------------->
                                <div class='bottom-yw botdis' style="display:block;">

                                <?php $yuwen = $vo['yuwen'];?>
                                <?php if($yuwen): if(is_array($yuwen)): foreach($yuwen as $i=>$yw): ?><a href="__URL__/teachDetail?pid=<?php echo ($yw["id"]); ?>"><div class="d_content">
                                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($yw["self_img"]); ?>" class='bot_img' />
                                        <div class="cher"><?php echo ($yw["real_name"]); ?></div>
                                        <div class="totor">语文家教	<span><?php echo ($yw["price"]); ?>/小时</span></div>
                                    </div></a><?php endforeach; endif; ?>
                                <?php else: ?><div class="d_no">抱歉！暂无信息</div><?php endif; ?>

                                </div>
                                <!-------------------------->
                                <div class='bottom-sx botdis'>

                                <?php $shuxue = $vo['shuxue'];?>
                                <?php if($shuxue): if(is_array($shuxue)): foreach($shuxue as $i=>$sx): ?><a href="__URL__/teachDetail?pid=<?php echo ($sx["id"]); ?>"><div class="d_content">
                                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($sx["self_img"]); ?>" class='bot_img' />
                                        <div class="cher"><?php echo ($sx["real_name"]); ?></div>
                                        <div class="totor">数学家教	<span><?php echo ($sx["price"]); ?>/小时</span></div>
                                    </div></a><?php endforeach; endif; ?>
                                <?php else: ?><div class="d_no">抱歉！暂无信息</div><?php endif; ?>    
                                </div>
                                <!------------------------>
                                <div class='bottom-yy botdis'>

                                <?php $yinyu = $vo['yinyu'];?>
                                <?php if($yinyu): if(is_array($yinyu)): foreach($yinyu as $i=>$yy): ?><a href="__URL__/teachDetail?pid=<?php echo ($yy["id"]); ?>"><div class="d_content">
                                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($yy["self_img"]); ?>" class='bot_img' />
                                        <div class="cher"><?php echo ($yy["real_name"]); ?></div>
                                        <div class="totor">英语家教 <span><?php echo ($yy["price"]); ?>/小时</span></div>
                                    </div></a><?php endforeach; endif; ?>
                                <?php else: ?><div class="d_no">抱歉！暂无信息</div><?php endif; ?>    
                                </div>
                                <!------------------------------>
                                <div class='bottom-wy botdis'>

                                <?php $wenyi = $vo['wenyi'];?>
                                <?php if($wenyi): if(is_array($wenyi)): foreach($wenyi as $i=>$wy): ?><a href="__URL__/teachDetail?pid=<?php echo ($wy["id"]); ?>"><div class="d_content">
                                        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($wy["self_img"]); ?>" class='bot_img' />
                                        <div class="cher"><?php echo ($wy["real_name"]); ?></div>
                                        <div class="totor">文艺家教 <span><?php echo ($wy["price"]); ?>/小时</span></div>
                                    </div></a><?php endforeach; endif; ?>
                                <?php else: ?><div class="d_no">抱歉！暂无信息</div><?php endif; ?>   
                                </div>
                                <!-------------------------->
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>


        </div>
       
        
        
    </div>	
    <!------------------------------------>
	<div class="right">
    	<div class="rtitle">八斗网代理</div>
        <div class="rcon">
        	<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="#" width="100%" height="130" />
        </div>
    </div>
</div>



<script>
$('.list .tails').click(function(){	//获取点击的  全局 FID -CSS名。
	vfid = '.drop.' + $(this).attr('class').replace(/tails pbor /,'');	
	$('.drop').slideUp();   //所有drop都收起来
	if($(vfid).css('display')=='block'){
    	$(vfid).slideUp();
    }else{
    	$(vfid).slideDown();
    };//(当前)点击的drop下拉
});
$('.region').click(function(){
	$('.region').removeClass('click');
	$(this).addClass('click');
	})
$('.drop .drop-top .drop-lr').click(function(){	
	var Cname = $(this).parents('.drop').attr('class').replace(/drop /,'');
	var vname = $(this).attr('class').replace(/drop-lr /,'').replace(/ activ/,'');   //获取当前点击的CSS名在过滤;
	$('.botdis').hide();
	$('.bottom-' + vname).show();  //获取 全局 FID下列表的css名显示出来
	$('.drop.'+ Cname + ' .drop-lr').removeClass("activ");	$(this).addClass('activ')	;	//删除css:drop-lr同级CSS名activ;给当前点击的CSS附加CSS
});


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