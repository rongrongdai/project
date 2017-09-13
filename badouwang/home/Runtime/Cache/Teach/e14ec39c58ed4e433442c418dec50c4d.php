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


<div class="pwid">
	<div class="hotnav">当前位置：<a href="javascript:"> 订单详情</a></div>
</div>
<style>
    .order_detail{width:800px;margin:20px auto;border:1px solid #00b38a;border-radius:6px;font-family:"微软雅黑";}
    .order_detail .nav{border-bottom: 1px solid #00b38a;font-size: 18px;padding: 8px 0;text-align: center; }
	.order_detail .navfs{font-size: 18px;padding:0 100px;}
    .order_detail ul{margin: 20px 100px; list-style-type:none;}
    .order_detail ul li{margin:5px auto;color:#666;font-size:14px;padding-bottom:5px;}
    .order_detail .num{font-size:16px;color:#f93;}
    .order_detail .pay li span{position:relative;font-size:14px;}
	.order_detail .pay li #yuo{color:#F93;}
    .order_detail .pay li img {position:relative;top:6px;}
    .order_detail .pay .msg{color:red; font-size:14px;margin-left:100px;}

    .order_detail .btn{}

    .order_detail .btn span{font-size:20px;color:#f90;}
    .order_detail .btn .sub{background-color:#F80;color:white;border:none;cursor:pointer;border-radius:4px;width:150px;height:45px;}
    .order_detail .btn .sub:hover{background-color:#363;}


    #info{display:none;width:300px;height:150px;background:white;text-align:center;line-height:60px;font-weight:200;border:3px solid #ccc;position:absolute;top:0;left:0;z-index:9999;}
    #info p{margin-bottom:10px;}
    #info .error{font-size:12px;color:red;height:20px;line-height:20px;float:left;padding-left:100px;}
    #info .colse{color:#666;font-size:10px;width:30px;height:20px;line-height:20px;float:right;cursor:pointer;}
    #info .colse:hover{background-color:gray;color:white;}
    #info input{margin-top:10px;height:30px;}
    #info button{width:100px;height:30px;margin:20px 0;background:#00b38a;color:white;}

    #background {display:none;position:absolute;top:0; left:0; z-index:9998;  background:gray;}

</style>

<div class="content">
    <div class="order_detail">
        <div class="nav">订单信息</div>
        	<ul>
        		<li><span>订单编号：<?php echo ($data["order_num"]); ?></span></li>
        		<li><span>老师姓名：<?php echo ($data["real_name"]); ?></span></li>
        		<li><span>购买课程：<?php echo ($data["course"]); ?></span></li>
        		<li><span>课时费：<?php echo ($data["place"]); ?> <span class="num">￥<?php echo ($data["price"]); ?></span>/小时</span></li>
        		<li><span>课时数：<?php echo ($data["hour"]); ?>小时</span></li>
        		<li><span>支付金额：<span class="num">￥<?php echo ($data["money"]); ?></span>元</span></li>
        	</ul>
            
        <div class="navfs">支付方式</div>
        
        	<ul class="pay">
        		<li><label>
                	<input type="radio" id="rz1" name="type" value="1" />
        			<span class="meny">使用余额付款：可用余额 <span id="yuo"><?php echo ($money); ?></span> 元<span class="yebz">(余额不足)</span></span>
                    </label>
                </li>
        		<li><label>
                	<input type="radio" id="rz2" name="type" value="2" />
        			<img src="__ROOT__/public/images/home/index/alipay.png" width="70px"><span class="msg"></span>
                    </label>
                </li>

                <input type="hidden" name="order_num" value="<?php echo ($data["order_num"]); ?>" />
                <input type="hidden" name="oid" value="<?php echo ($data["id"]); ?>" />
                <input type="hidden" name="money" value="<?php echo ($data["money"]); ?>" />
                <input type="hidden" name="ordsubject" value="八斗家教" />
        	</ul>
        	<ul class="btn"><button class="sub">支付订单</button></ul>

    		<div id="info">
                <p>
                    <span class="error"></span>
                    <span class="colse">关闭</span>
                </p>
            	<p style="clear:both;">
                    <input id="password" type="password" placeholder="请输入支付密码" />
                </p>
                <button id="vpd">确认</button>
            </div>
    		<div id="background"></div>
    </div>
</div>



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


<script type="text/javascript">
/*---------余额是否足够判断---------*/
var Fmoney = parseInt('<?php echo ($money); ?>');
var Fdadtmoney = parseInt('<?php echo ($data["money"]); ?>');
if(Fmoney<Fdadtmoney){
    $('#rz1').attr('disabled','disabled');
    $('#rz2').attr('checked','checked');
    $(".pay").wrap("<form name='pay' action='__APP__/Pay/Pay/doalipay' method='post'></form");
}else{
    $('#rz1').attr('checked','checked');
    $(".pay").wrap("<form name='pay' action='' method='post'></form");
    $(".yebz").html("");
}
/*-------------------------*/

    $(".sub").click(function(){
        var chk = ($("input:checked").val());
        if(chk === '1'){
            //二次验证
            verifyPass();
            //$("form[name='pay']").submit();
        }else if(chk === '2'){
            $("form[name='pay']").submit();
        }else{
            $(".msg").html("请选择支付方式");
        }
    });
    $(".pay").find("input").click(function(){
        $(".msg").html("");
        var chkn = $(this).val();
        if(chkn==='1'){
            var zhif = parseInt($("#zhif").text()),yuo = parseInt($("#yuo").text());
            if(zhif>yuo){
                $("#rz1").attr('checked',false);
                $(".msg").html("您的余额不足！"); 
            }else{
                $("form[name='pay']").attr('action','');
            }
        }else{
            $("form[name='pay']").attr('action','__APP__/Pay/Pay/doalipay');
        }
    });

    function verifyPass(){
        $(".colse").click(function(){
            $("#info").fadeOut();$("#background").fadeOut();
        });
        $("#vpd").click(function(){
            var pswd = $("#password").val(),uname = "<?php echo ($uname); ?>";
            var isPswd = (/\S/).test(pswd);
            if(isPswd){
                $.post("__APP__/Ajax/AjaxUser/vpass",{uname:uname,password:pswd},function(data){
                    if(data == 'pass'){
                        $("form[name='pay']").submit();
                      }else if(data.limit == 'limit'){
                        $(".error").text(data.msg);
                      }
                },'json');
            }else{
                $(".error").html("支付密码不能空");
            }        
        });


      var pageW = $(window).width(), pageH = $(window).height(), boxW = $("#info").outerWidth(),boxH = $("#info").outerHeight(),scrollH = $(window).scrollTop();

      $("#info").css({'top':(pageH/2-boxH/2+scrollH)+'px','left':(pageW/2-boxW/2)+"px"}).fadeIn();
      $("#background").css({"opacity":"0.6","filter":'Alpha(Opacity=60)',height:$(document).height(),width:$(document).width() }).fadeIn();;
    }


</script>