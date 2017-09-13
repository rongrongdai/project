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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/teach_detail.css"/>


<!-----------中间的部分---------->
<div class="pwidsw ">
	<div class="hotnav">当前位置：<a href="javascript:history.go(-2)">  家教</a> > <a href="javascript:history.go(-1)">  列表页</a> > <a href="javascript:"> 详情页</a></div> 
    
    <div class="cen-ne">
      <p class="ce-py"><?php echo ($data["title"]); ?></p>
      <p class="ce-pe"><?php echo ($data["introduce"]); ?></p>
      <div class="cen-nelf">
         <div class="cenlf-y">
          <img src="__ROOT__<?php echo ($data["c_img"]); ?>" />
          <div class="foc_name"><span class="span">+</span><span>关注</span></div>
         </div>
        
        <div class="cenlf-e">
           <p>联系人：<?php echo ($data["real_name"]); ?></p>
           <p class="qs">浏览次数：<?php echo ($data["hit"]); ?>  发布时间：<?php echo (date("Y.m.d",$data["atime"])); ?></p>
           <p>QQ:32432524</p>
           <p>邮箱：<?php echo ($data["uname"]); ?></p>
           <p>联系地址：<?php echo ($data["address"]); ?></p>
        </div>

        <div class="cenlf-s">
          <img src="__ROOT__/public/images/home/icon3.png"  /> <span><?php echo ($data["telephones"]); ?></span> <a href="javascript:looking()"><<查看</a>  
        </div>
        
        <div class="cenlf-w">
          <p class="pe"><span><?php echo ($data["price"]); ?></span> 元/小时</p>
          <p class="pn" <?php if($bm): ?>style="background:#393;">已经预约<?php else: ?>id="enter">我要预约<?php endif; ?></p>         
        </div>
      </div>
    </div>
    
</div>
<!-----------中间的部分结束---------->

<div class="content">


<div class="drop">
    <div class="hotnoe">进来是客，点击关注，有神密礼物送给你哦！<a href="">查看</a></div>

	<div class="drop-top">
    	<div class="drop-lr xq activ">   详情       </div>
    	<div class="drop-lr pl">        评论动态     </div>
	</div>
    <div class="drop-con">
	<div class="jscs xq">
    	<h1><?php echo ($data["title"]); ?></h1>
        <p><?php echo ($data["content"]); ?></p>
    </div>
	<div class="jscs pl" style="display:none">
    <?php if($comment): if(is_array($comment)): foreach($comment as $i=>$vo): ?><div class="con_yes">
                <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  class="yimg" src="__ROOT__<?php echo ($vo["user_pic"]); ?>" width="90" height="90" />
                <div class="ytet">
                    <div class="tet_con"><?php echo ($vo["content"]); ?></div>
                    <div class="tim_tit"><?php echo ($vo["uname"]); ?><span>评论时间：<?php echo (date("Y-m-d H:i:s",$vo["ctime"])); ?></span></div>
                 </div>
            </div><?php endforeach; endif; ?>
    <?php else: ?>
        <div class="con_no">暂无评论</div><?php endif; ?>    
    </div>
</div>
</div>



<div class="drop-right">
	<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="#" width="100%" height="65" />
</div>


</div>


<!----报名弹框及背景遮罩---->
<div id="faqdiv2" class="faqdiv3" style="display:none;position:absolute;left:450px;top:160px;z-index: 100;">
    <h2 id="pb">网上报名<span style="float:right;padding-right:10px;"><a href="#" id="close">关闭</a></span></h2>         
    <div class="form">
    <form method="post" name="form2" action="__URL__/jjbm">
        <div class="fmp"><div>姓名：<input type="text" name="stu_name" id="username" value="" placeholder="(必填)"></div><div id="lmsg1"></div></div>
        <div class="fmp"><div>手机：<input type="text" name="telephone" id="mobphone" placeholder="(必填)"></div><div id="lmsg2"></div></div>
        <div class="fmp"><div>Q　Q：<input type="text" name="qq" id="qq" placeholder="(必填)"></div><div id="lmsg3"></div></div>
        <div class="fmp"><div>邮箱：<input type="text" name="email" id="email" placeholder="(必填)"></div><div id="lmsg4"></div></div>                    
        <div>地址：<input type="text" name="address" id="address" style="width:410px;" placeholder="(选填)"></div>  
        <div style="clear:both; margin:20px auto 20px auto; width:100px"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/submit.png" name="define2" id="define2"></div>
        <div align="center">如需了解课程更多信息，请直接电话联系</div>

        <input type="hidden" name="tuid" value="<?php echo ($data["uid"]); ?>" />
        <input type="hidden" name="course" value="<?php echo ($data["id"]); ?>" />                  
    </form>
  </div> 
</div>
<div id="info"></div>
<div id="backghidd" style="position:absolute; z-index:99; background:#999; top:0px; bottom:0px;"></div>


<script>
$('.drop-lr').click(function(){
	$('.jscs').hide();
	$('.jscs.' + $(this).attr('class').replace(/drop-lr /,'').replace(/ activ/,'')).show();
	$('.drop-lr').removeClass('activ');
	$(this).addClass('activ');

	})



//报名
$('#define2').click(function(){
    var use = (/[^u4e00-u9fa5]{2,5}$/).exec($("#username").val());
    var mob = (/^[0-9]{11}$/).exec($('#mobphone').val());
    var qq = (/^[1-9][0-9]{4,12}$/).exec($("#qq").val());
    var emai = (/^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$/).exec($("#email").val());
    if(!use){document.getElementById("lmsg1").innerHTML="中文姓名字数必须在2-5个之间"; }
    if(!mob){document.getElementById("lmsg2").innerHTML="请输入正确的手机号码!";}
    if(!qq){document.getElementById("lmsg3").innerHTML="请输入正确的QQ号码!";}
    if(!emai){document.getElementById("lmsg4").innerHTML="请输入正确的邮箱地址!"  }
    if(use && mob && qq && emai){$('form[name="form2"]').submit(); }//这里设置提交
});

var posX,posY;
document.onmouseup = function(){document.onmousemove = null}  
document.getElementById("pb").onmousedown=function(){
    po = document.getElementById("faqdiv2").style; parsein();
}

function parsein(e){
    if(!e) e = window.event;  //IE
    posX = e.clientX - parseInt(po.left);
    posY = e.clientY - parseInt(po.top);
    document.onmousemove = mousemove; 
}
function mousemove(ev){
    if(ev==null) ev = window.event;//IE
    po.left = (ev.clientX - posX) + "px";
    po.top = (ev.clientY - posY) + "px";
} 

$(function(){ 
    $("#enter").click(function(){
        var uid='<?php echo session('uid')?>';
        if(uid){
            $("#faqdiv2").css({display:"block"}); 
            $('#backghidd').css({
                "opacity" : "0.3",
                "filter" : 'Alpha(Opacity = 30)',
                height : $(document).height(),
                width : $(window).width()
            }).fadeIn();
        }else{
            show('亲！您还没有登录呢');
        }
        
    })

})
$("#close").click(function(){$("#faqdiv2").css({display:"none"});  $("#backghidd").fadeOut()});

function show(text){
  var pageW = $(window).width(), pageH = $(window).height(), boxW = $("#info").outerWidth(),boxH = $("#info").outerHeight(),scrollH = $(window).scrollTop();
  $("#info").html(text).css({'top':(pageH/2-boxH/2+scrollH)+'px','left':(pageW/2-boxW/2)+"px"}).fadeIn(1000).delay(500).fadeOut(1000);
}



//搜索
$("#indexte").attr('placeholder','家教搜索');
function search(){
  $("#indexte").wrap("<form id='search' action='__URL__/lists' method='get'></form>");
  var tt = $("#indexte").val();
  if(tt){ $("#search").submit(); }

}

$(window).keydown(function(e){if(e.keyCode == 13) search(); });
function looking(){if(!"<?php echo (session('uid')); ?>"){show('请先登录');}else{$(".cenlf-s").find("span").html("<?php echo ($data["telephone"]); ?>");$(".cenlf-s").find("a").hide();}}

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