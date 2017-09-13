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
            var cityid="<?php echo (cookie('cid')); ?>";
            $(".left a").each(function(){
                if($(this).attr("cid")===cityid){
                    $(this).addClass("sel");
                    $(".cher").text($(this).text());
                }
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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/teach_list.css"/>

<div class="pwid">
	<div class="hotnav">当前位置： <a href="javascript:history.back()" >家教</a> >  <a href="javascript:" >列表页</a></div>
	<div class="tion">
		<!----------------------------------分类1-------------------------->
        <div class="ction jspy">
            <div class="content txt1"><b class="way">科目:</b>
                <i class="pui">
                    <a id="txt1" class="all" value="0" onclick='km(0,this.id)'>不限</a>
                    <?php if(is_array($course)): foreach($course as $key=>$vo): ?><a id='txt1' value='<?php echo ($vo["id"]); ?>' onclick='km(<?php echo ($vo["id"]); ?>,this.id)'><?php echo ($vo["name"]); ?></a><?php endforeach; endif; ?>
                </i>
            </div>
            <div class="content txt2"><b class="way">阶段:</b>
                <i class="pui" id='gid'>
                	<a id="txt2" class="all" value="0" onclick='km(0,this.id)'>不限</a>
					<a id='txt2'>小学</a>
					<a id='txt2'>初中</a>
					<a id='txt2'>高中</a>
                </i>
            </div>
            <div class="content txt3"><b class="way">区域:</b>
                <i class="pui">
                    <a id="txt3" class="all" value="0" onclick='km(0,this.id)'>不限</a>
                    <?php if(is_array($district)): foreach($district as $i=>$vo): ?><a id='txt3' value='<?php echo ($vo["id"]); ?>' onclick='km(<?php echo ($vo["id"]); ?>,this.id)'><?php echo ($vo["name"]); ?></a><?php endforeach; endif; ?>
                    
                </i>
            </div>
        </div>

		<!----------------------------------------分类1------------------------------------------->
    </div>
    <!------------------------------------>
    <a name="pos"></a>
    <div class="roll">
    	<div class="prev"></div>
        <div id='roll'>
        	<?php if(is_array($hot)): foreach($hot as $i=>$vo): ?><a href="__URL__/teachDetail?pid=<?php echo ($vo["id"]); ?>">
                	<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="100%" height="100%" />

                    <div class="ptli">
                    <div class="tils"><?php echo ($vo["real_name"]); ?></div>
                    <div class="tixq">查看详情</div>
                    </div>
                </a><?php endforeach; endif; ?>
        </div>
        <div class="next"></div>
    </div>
    <!------------------------------------>
    <div class="list">

    	<div class="sous">搜索到 <span class="sz"><?php echo ($sum); ?></span> 个相差家教<span class="jg">价格:<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  id="jgimg" src="__ROOT__/public/images/home/jiantou.png" width="20" height="20" onclick="km('pin',this.id)" alt="pin" /></span></div>

	  
        <div class="souswy"></div>
      
	  <div id="seek">
	    <?php if(is_array($data)): foreach($data as $i=>$vo): ?><div class="tent">
	        	<img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  class="tentimg" src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="80" height="80" />

	        	<div class="ent">
	            	<a class="contitle" href="javascript:hit(<?php echo ($vo["id"]); ?>)"><?php echo ($vo["title"]); ?></a>
	                <div class="content">简介：<?php echo ($vo["introduce"]); ?></div>
	                <div class="time"><?php echo ($vo["btime"]); ?> <span class="ydio"><?php echo ($vo["hit"]); ?>人阅读</span></div>
                    <!--<div class="rd">178人阅读</div>-->
	            </div>
	            <div class="right">
	            	<div class="xs"><?php echo ($vo["price"]); ?>/小时</div>
	            	<a href="javascript:hit(<?php echo ($vo["id"]); ?>)" class="xx">查看详情</a>
	            </div>
	        </div><?php endforeach; endif; ?> 
	    <div class="tent" style="text-align:center;"><?php echo ($link); ?></div>
	  </div>

    </div>


    <div class="tising">
    	<div class="tisle">推荐机构</div>
        <div class="tisgao tisbor">
            <img src="" width="245" height="140" />
            <div class="bot">12月一技术在手  天下有我</div>
            <div class="tom">没有你想不到。只有你想不想学。</div>
        </div>
        <div class="tisgao">
            <img src="" width="245" height="140" />
            <div class="bot">12月一技术在手  天下有我</div>
            <div class="tom">没有你想不到。只有你想不想学。</div>
        </div>
    </div>

</div>



<script>
function tetgy(t,s){	$(s + ' a').removeClass('all');	$(t).addClass('all');	}
$('.txt1 a').click(function(){tetgy(this,'.txt1')	})
$('.txt2 a').live('click',function(){tetgy(this,'.txt2')	})
$('.txt3 a').click(function(){tetgy(this,'.txt3')	})


function set(a){
	var vb = $('#roll').find('a');
	var Tvb = vb[a].innerHTML; 
	var Hvb = vb[a].href; 
	if(a==0){	$(vb[a]).remove();	document.getElementById('roll').innerHTML = document.getElementById('roll').innerHTML + '<a href="'+ Hvb + '">'+ Tvb +'</a>'	}
	if(a==9){	$(vb[a]).remove();	document.getElementById('roll').innerHTML = '<a href="'+ Hvb + '">'+ Tvb +'</a>' + document.getElementById('roll').innerHTML  	}
}
$('.next').click(function(){ set(0);	})
$('.prev').click(function(){ set(9);	})

function hit(id){
    $.get("__APP__/Ajax/AjaxTeach/hit",{'tid':id},function(){
        window.location.href="__URL__/agentdetail?id="+id;
    });
}

//begin--6-17---
function km(fid,id){
    var txt1 = $('.txt1').find('.all').attr('value'),txt2 = $('.txt2').find('.all').attr('value'),txt3 = $('.txt3').find('.all').attr('value'),page = 1,price = $("#jgimg").attr('alt');
    if(id === 'txt1'){ txt1 = fid; }
    if(id === 'txt2'){ txt2 = fid; }
    if(id === 'txt3'){ txt3 = fid; }
    if(id === 'page'){ page = fid; }

    if(id === 'jgimg'){
        if(price === 'up'){
            $("#jgimg").attr({src: "__ROOT__/public/images/home/jiantj.png",onclick: "km('down',this.id)",alt: "down"});
            price = 'down';
        }else{
            $("#jgimg").attr({src: "__ROOT__/public/images/home/jiantou.png",onclick: "km('up',this.id)",alt: "up"});
            price = 'up';
        }
    }

	$.post("__ROOT__/index.php/Ajax/AjaxTeach/teacher",{'action':id,'txt1':txt1,'txt2':txt2,'txt3':txt3,'pages':page,'price':price},function(data){

		$("#seek").html("");
		if(data.res){
			for(var i=0;i<data.res.length;i++){

				var node = '<div class="tent"><img class="tentimg" src="__ROOT__'+data.res[i].c_img+'" width="80" height="80" /><div class="ent"><a class="contitle">'+data.res[i].title+'</a><div class="content">简介：'+data.res[i].introduce+'</div><div class="time">'+data.res[i].btime+' <span class="ydio">'+data.res[i].hit+'人阅读</span></div></div><div class="right"><div class="xs">'+data.res[i].price+'/小时</div><a href="javascript:hit('+data.res[i].id+')"><div class="xx">查看详情</div></a></div></div>';
                                $(node).appendTo("#seek");
			}
            if(data.page){ $(data.page).appendTo("#seek"); }
		}else{
			$('<div class="tent"><span>抱歉！该分类暂无相关信息</span></div>').fadeIn(300).appendTo("#seek");
		}
        $(".sz").html(data.sum);
        
        if(id == 'txt1'){
            $("#gid").html('<a id="txt2" class="all" value="0" onclick="km(0,this.id)">不限</a>');
            for(var i=0;i<data.gid.length;i++){
                var node = "<a id='txt2' value="+data.gid[i].id+" onclick='km("+data.gid[i].id+",this.id)'>"+data.gid[i].name+"</a>";
                $(node).appendTo("#gid")
            } 
        }

	},'json');
}
//end---6-17---


//搜索
$("#indexte").attr('placeholder','家教搜索');
function search(){
  $("#indexte").wrap("<form id='search' action='__URL__/lists' method='get'></form>");
  var tt = $("#indexte").val();
  if(tt){ $("#search").submit(); }

}

$(window).keydown(function(e){
  if(e.keyCode == 13){search();}
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