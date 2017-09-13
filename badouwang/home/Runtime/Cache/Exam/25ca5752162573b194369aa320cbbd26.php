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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/exam.css"/>


<div class="pwid">
	<div class="hotnav">当前位置：<a href="javascript:history.go(-4)">  题库</a> >  <a href="javascript:history.go(-3)"> 列表页</a> > <a href="javascript:history.back()"> 详情页</a> > <a href="javascript:"> 考试页</a></div>
</div>

<div class="ptop">
	<div class="title">
    	<?php echo ($res["name"]); ?>
    </div>
    

    
<div class="titname">
<!--    	<a class="aclick">单项选择题</a>
    	<a>多项选择题</a>-->
    	
        	<span>本卷为1大题 <?php echo ($res["count"]); ?>小题</span>
            <span>试卷来源：<?php echo ($res["real_name"]); ?></span>
       
    </div>
</div>

<div class="pcon">

	<form action="./subPaper" name="" method="post">
		<div class="left">
        <?php if(is_array($data)): foreach($data as $i=>$vo): if($vo["type"] == 1): ?><a name="<?php echo ($i); ?>"></a>
        <div class="fomcon">
    		<div class="title">
        		<div class="dig"><?php echo ($i+1); ?></div>
            	<div class="con"><?php echo ($vo["question"]); ?>(单选题)</div>
        	</div>
    		<div class="contet">
        		<div class="tet"><span><?php echo ($vo["aanswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["banswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["canswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["danswer"]); ?></span></div>

           		<div class="lab">
                	<label class="lbel Rad<?php echo ($i); ?>"><input type="radio" name="answer[<?php echo ($vo["id"]); ?>]" value="A" id="Rad1_0"><span>A</span></label>
           			<label class="lbel Rad<?php echo ($i); ?>"><input type="radio" name="answer[<?php echo ($vo["id"]); ?>]" value="B" id="Rad1_1"><span>B</span></label>
           			<label class="lbel Rad<?php echo ($i); ?>"><input type="radio" name="answer[<?php echo ($vo["id"]); ?>]" value="C" id="Rad1_2"><span>C</span></label>
           			<label class="lbel Rad<?php echo ($i); ?>"><input type="radio" name="answer[<?php echo ($vo["id"]); ?>]" value="D" id="Rad1_3"><span>D</span></label>
            	</div>
        	</div>
        </div>
    <?php elseif($vo["type"] == 2): ?>
    	<a name="<?php echo ($i); ?>"></a>
    	<div class="fomcon">
    		<div class="title">
        		<div class="dig"><?php echo ($i+1); ?></div>
            	<div class="con"><?php echo ($vo["question"]); ?>(多选题)</div>
        	</div>
    		<div class="contet">
        		<div class="tet"><span><?php echo ($vo["aanswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["banswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["canswer"]); ?></span></div>
        		<div class="tet"><span><?php echo ($vo["danswer"]); ?></span></div>

           		<div class="lab">
  					<label class="lbel Chec<?php echo ($i); ?>"><input type="checkbox" name="answer[<?php echo ($vo["id"]); ?>][a]" value="A" id="Chec1_0"><span>A</span></label>
           			<label class="lbel Chec<?php echo ($i); ?>"><input type="checkbox" name="answer[<?php echo ($vo["id"]); ?>][b]" value="B" id="Chec1_1"><span>B</span></label>
           			<label class="lbel Chec<?php echo ($i); ?>"><input type="checkbox" name="answer[<?php echo ($vo["id"]); ?>][c]" value="C" id="Chec1_2"><span>C</span></label>
           			<label class="lbel Chec<?php echo ($i); ?>"><input type="checkbox" name="answer[<?php echo ($vo["id"]); ?>][d]" value="D" id="Chec1_3"><span>D</span></label>
           	  </div>
        	</div>
        </div><?php endif; endforeach; endif; ?>
        <input type="hidden" name="sid" value="<?php echo ($res["id"]); ?>">
        <input type="hidden" name="z_total" value="<?php echo ($res["total"]); ?>">
        <input type="hidden" name="begin_time" value="<?php echo ($begin_time); ?>">
        <input type="submit" class="tjpdgs" value="我要交卷" />
    </div>

    </form>
<!---------------------------------------------------------------------------->




    <div class="right" id="rightname">
    	<div class="topn">
    		<div class="top">
        	<div class="r-left" style="background-image:url()">剩余时间：<span id="min"><?php echo ($res["time"]); ?></span><span>分</span><span id="sec">00</span><span>秒</span></div>
            	<div class="r-right" id="r-right">暂停</div>
        	</div>
        	<div class="tent">
        		<a style="background-image:url()">返回列表</a>
            	<a style="background-image:url();margin-left:10px">计算器</a>
        	</div>
        </div>
        <div class="tom">
        	<div class="top">答题卡 <span>0/<?php echo ($res["count"]); ?></span></div>
            <div class="tit"><?php echo ($res["name"]); ?>考试 每题5分 共<?php echo ($res["count"]); ?>题</div>
        	<div class="dig">
                <?php $__FOR_START_7287__=0;$__FOR_END_7287__=$res["count"];for($i=$__FOR_START_7287__;$i < $__FOR_END_7287__;$i+=1){ ?><a href="#<?php echo ($i); ?>"><?php echo ($i+1); ?></a><?php } ?>
        	</div>        
        </div>  
    </div>
</div>

<div id="continue" style="z-index: 3000;">继续答题</div>
<div id="backghidd" style="position:absolute; z-index:99; background:#999; top:0px; bottom:0px;"></div>

<script>
$('.left .lab label').click(function(){
    $('.lbel.' + $(this).attr('class').replace(/lbel /,'')).removeClass('aclick')
    $(this).addClass('aclick')
    })
$('.left-more .lab .lbel').click(function(){
    $(this).toggleClass('aclick')
    })

$('.titname a').click(function(){
    $('.titname a').removeClass('aclick');
    $(this).addClass('aclick');
    })



/*
window.onscroll = function(){ 
    var t = document.documentElement.scrollTop || document.body.scrollTop;  
    var the = document.getElementById( "rightname" ).style; 
    if( t >= 420 ) { 
        the.position = "fixed"; 
        the.marginLeft="880px"
        the.top="50px"
    } else { 
        the.position = "relative"; 
        the.marginLeft="0px"
        the.top="0px"
    } 
}
*/

var sec = document.getElementById("sec");
var min = document.getElementById("min");
var stopBtn = document.getElementById("r-right");
    t = setInterval(function(){
        var s = parseInt(sec.innerHTML);
        if(s<1){
            sec.innerHTML = 59;
            min.innerHTML = parseInt(min.innerHTML)-1;
        }else{
            sec.innerHTML = s-1;
        }           
    },1000);

    stopBtn.onclick = function(){
        clearInterval(t);
		
		/* 2015-06-23 16:35* /
		var vtext = $(this).text();
		if(vtext=='暂停'){stopBtn.innerHTML = '计时';clearInterval(t);}
		if(vtext=='计时'){stopBtn.innerHTML = '暂停';
			t = setInterval(function(){
				var s = parseInt(sec.innerHTML);
				if(s<1){
					sec.innerHTML = 59;
					min.innerHTML = parseInt(min.innerHTML)-1;
				}else{
					sec.innerHTML = s-1;
				}           
			},1000);
		}
		/*-2015-06-23 16:35 end*/
       
		var pageW = $(window).width(), pageH = $(window).height(), boxW = $("#continue").outerWidth(),boxH = $("#continue").outerHeight(),scrollH = $(window).scrollTop();
        $("#continue").css({'display':"block",'top':(pageH/2-boxH/2+scrollH)+'px','left':(pageW/2-boxW/2)+"px"});
        $('#backghidd').css({"opacity" : "0.6","filter" : 'Alpha(Opacity = 60)',height : $(document).height(),width : $(window).width()
        }).fadeIn();

        document.body.style.overflow='hidden'; 
    }
    $("#continue").click(function(){
        t = setInterval(function(){
            var s = parseInt(sec.innerHTML);
            if(s<1){
                sec.innerHTML = 59;
                min.innerHTML = parseInt(min.innerHTML)-1;
            }else{
                sec.innerHTML = s-1;
            }           
        },1000);

        $("#continue").css({display:"none"});
        $("#backghidd").fadeOut()
        document.body.style.overflow='';
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