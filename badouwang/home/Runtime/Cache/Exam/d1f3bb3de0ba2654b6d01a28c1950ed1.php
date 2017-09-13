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
<div class="bnner">
	<!--<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/banner.jpg"  height="350" />-->
</div>

<div class="con_a">
	<div class="con">
    	<h2>在线考试</h2>
        <div class="tet">
        	报道，第一次来，但看好老师。新手一个，请师老师和师兄帮提几点注意事项，谢谢。
        </div>
        <div class="inp">
        	<a href="#" class="test">免费考试</a>
            <span><a></a></span>
        </div>
    </div>
    <!------------------------------------>
	<div class="con">
    	<h2>在线考试</h2>
        <div class="tet">
        	报道，第一次来，但看好老师。新手一个，请师老师和师兄帮提几点注意事项，谢谢。
        </div>
        <div class="inp">
        	<a href="#" class="test">免费考试</a>
            <span><a></a></span>
        </div>
    </div>
    <!------------------------------------>
	<div class="con">
    	<h2>在线考试</h2>
        <div class="tet">
        	报道，第一次来，但看好老师。新手一个，请师老师和师兄帮提几点注意事项，谢谢。
        </div>
        <div class="inp">
        	<a href="#" class="test">免费考试</a>
            <span><a></a></span>
        </div>
    </div>
    <!------------------------------------>
	<div class="con" style="margin:0;border:none;">
		<div class="title"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/gong.png" /><div>最新需求信息</div></div>
        <div class="link">
            <?php if(is_array($notices)): foreach($notices as $key=>$notice): ?><a href="<?php echo ($notice["link"]); ?>"><div><?php echo ($notice["ntext"]); ?></div><span><?php echo (date("Y-m-d",$notice["atime"])); ?></span></a><?php endforeach; endif; ?>
        	
        </div>
    </div>
</div>


<div class="back">
<div class="con_b">
	<div class="conent">
		<?php if(is_array($classfiy)): foreach($classfiy as $i=>$vo): if($i === 0): ?><div class="tent"><div class="cus img1 vimg1" onclick="getFen(<?php echo ($vo["id"]); ?>,1)"></div><div class="tet"><?php echo ($vo["name"]); ?></div></div>
			<?php else: ?>
				<div class="tent"><div class="cus img<?php echo ($i+1); ?>" onclick="getFen(<?php echo ($vo["id"]); ?>,<?php echo ($i+1); ?>)"></div><div class="tet"><?php echo ($vo["name"]); ?></div></div><?php endif; endforeach; endif; ?>
    	<!--<div class="tent" style="margin:0;"><div class="cus img10"></div><div class="tet">已选</div></div>-->
    </div>
    <div class="tran"><span></span></div>

	<div id="img1" class="coner img1" style="display:block">
		<?php if($data2): if(is_array($data2)): foreach($data2 as $i=>$vo): ?><div class="imgaes">
	        	<a class="imga" href="#" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"   src="__ROOT__/public/images/home/exam/zg1.png" width="50" height="50" /></a>
	            <a class="imgb" href="__URL__/examlist?fid=<?php echo ($vo["id"]); ?>"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"   src="__ROOT__/public/images/home/exam/zg2.png" width="50" height="50" /></a>
	            <div><?php echo ($vo["name"]); ?></div>
	        </div><?php endforeach; endif; ?>
		<?php else: ?>
			<div style="text-align:center;height:100px;line-height:100px;">
	    		抱歉！暂时没有相关试题
	    	</div><?php endif; ?>
	</div>

<!--	<div id="img2" class="coner img2"></div>
	<div id="img3" class="coner img3"></div>
	<div id="img4" class="coner img4"></div>
	<div id="img5" class="coner img5"></div>
	<div id="img6" class="coner img6"></div>
	<div id="img7" class="coner img7"></div>
	<div id="img8" class="coner img8"></div>
	<div id="img9" class="coner img9"></div>
	<div id="img10" class="coner img10"><div class="load"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jiazai.gif" /></div></div>-->

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
<script>

function vs(){	for(i=1;i<12;i++){		$('.cus').removeClass('vimg'+i)		}	}
$('.conent .cus').click(function(){
	var css = $(this).attr('class').replace(/cus /,'');
	if(css=='img1'){		$('.tran span').css({left:'40px'});vs();$('.cus.'+css).addClass('vimg1')	;}
	else if(css=='img2'){   $('.tran span').css({left:'160px'});vs();$('.cus.'+css).addClass('vimg2') }
	else if(css=='img3'){   $('.tran span').css({left:'285px'});vs();$('.cus.'+css).addClass('vimg3') }
	else if(css=='img4'){   $('.tran span').css({left:'400px'});vs();$('.cus.'+css).addClass('vimg4') }
	else if(css=='img5'){   $('.tran span').css({left:'525px'});vs();$('.cus.'+css).addClass('vimg5') }
	else if(css=='img6'){   $('.tran span').css({left:'650px'});vs();$('.cus.'+css).addClass('vimg6') }
	else if(css=='img7'){   $('.tran span').css({left:'770px'});vs();$('.cus.'+css).addClass('vimg7') }
	else if(css=='img8'){   $('.tran span').css({left:'890px'});vs();$('.cus.'+css).addClass('vimg8') }
	else if(css=='img9'){   $('.tran span').css({left:'1015px'});vs();$('.cus.'+css).addClass('vimg9') }
	//else if(css=='img10'){   $('.tran span').css({left:'1140px'});vs();$('.cus.'+css).addClass('vimg10') }
	else{}
	//$('.coner').hide();
	//$('.coner.' + css).show();
	})

	//获取二级分类
	function getFen(fid,id){
			var load = '<div class="load"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/public/images/home/jiazai.gif" width="30px" /></div>';
			$("#img1").css('height','195px').html(load);
		$.post("__ROOT__/index.php/Ajax/AjaxExam/getFen",{'fid':fid},function(data){
			

			if(data != ''){
				$("#img1").html("");
				for(var i=0;i<data.length;i++){
					var node = '<div class="imgaes"><a class="imga" href="#" ><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"   src="__ROOT__/public/images/home/exam/zg1.png" width="50" height="50" /></a><a class="imgb" href="__URL__/examlist?fid='+data[i].id+'"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"   src="__ROOT__/public/images/home/exam/zg2.png" width="50" height="50" /></a><div>'+data[i].name+'</div></div>';
					$(node).appendTo("#img1");
				}
			}else{
				var node = '<div class="sorry">抱歉！暂时没有相关试题</div>';
        		$("#img1").fadeIn(300).html(node);
			}
		},'json');
	}

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