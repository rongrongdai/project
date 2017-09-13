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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/exam_re.css"/>

<div class="pwid">
	<div class="hotnav">当前位置：<a href="javascript:history.go(-6)">  题库</a> >  <a href="javascript:history.go(-5)"> 列表页</a> > <a href="javascript:history.go(-3)"> 详情页</a> > <a href="javascript:"> 结果页</a></div>
</div>
<div class="pwidth">
   	<div class="top">
       	<div class="title"><?php echo ($data["name"]); ?></div>
        <div class="padd">
        	<div class="jgtim">交卷时间：<?php echo (date("Y年m月d日",$data["end_time"])); ?></div>
        	<div class="scor">
            	<div class="sc">试卷得分</div>
                <div class="sf" style="color:#EF6000"><?php echo ($data["score"]); ?></div>
                <div class="sp">总分<?php echo ($data["total"]); ?> 排名<?php echo ($pmi+1); ?></div>
            </div>
        	<div class="scor">
            	<div class="sc">作答时间</div>
                <div class="sf"><?php echo ($data["min"]); ?><span>分</span><?php echo ($data["s"]); ?><span>秒</span></div>
                <div class="sp">总时长：<?php echo ($data["time"]); ?>分钟</div>
            </div>            
        	<div class="scor">
            	<div class="sc">你答对了</div>
                <div class="sf"><?php echo ($data["r_total"]); ?><span>道题</span></div>
                <div class="sp">错误率：<?php echo ($data["rate"]); ?>%</div>
            </div>            
            <div class="lxt">本次练习<?php echo ($zshu); ?>道题</div>
            <div class="dant">单项选择题</div>
            <div class="dana">
            	<?php if(is_array($data1)): foreach($data1 as $dd=>$dx): if($dx["type"] == 1): ?><a href="#<?php echo ($dd); ?>"><?php echo ($dd+1); ?></a><?php endif; endforeach; endif; ?>
            </div>
            <div class="dant">多项选择题</div>
            <div class="dana">
            	<?php if(is_array($data1)): foreach($data1 as $du=>$duo): if($duo["type"] == 2): ?><a href="#<?php echo ($du); ?>"><?php echo ($du+1); ?></a><?php endif; endforeach; endif; ?>            	
            </div>
        </div>

        <div class="padd">
        	<div class="coner">
            	<div class="thele">
                	<div class="tm">试卷题目</div>
                	<div class="nd">您的答案</div>
                	<div class="zd">正确答案</div>
                </div>

            <?php if(is_array($data1)): foreach($data1 as $i=>$vo): $k=$vo['id']; ?>
            	<a name="<?php echo ($i); ?>"></a>
                <div class="theline vid<?php echo ($i); ?>">
                	<div class="tm-top">
                		<div class="tm"><?php echo ($i+1); ?>.<?php echo ($vo["question"]); ?></div>
                	<?php if($answer[$k]): if($answer[$k] == $vo['right']): ?><div class="zd" style="color:#009170"><?php echo ($answer["$k"]); ?></div>
                		<?php else: ?>
                			<div class="zd" style="color:#F00"><?php echo ($answer["$k"]); ?></div><?php endif; ?>	
                	<?php else: ?>
                		<div class="zd" style="color:#F00">空</div><?php endif; ?>	
                		<div class="zd" style="color:#009170"><?php echo ($vo["right"]); ?></div>
                    </div>
                    <div class="daan vid<?php echo ($i); ?>">
                    	<a><span><?php echo ($vo["aanswer"]); ?></span></a>
                    	<a><span><?php echo ($vo["banswer"]); ?></span></a>
                    	<a><span><?php echo ($vo["canswer"]); ?></span></a>
                    	<a><span><?php echo ($vo["danswer"]); ?></span></a>
                    </div>
                </div><?php endforeach; endif; ?>

            </div>	
        </div>
    </div>
  
    <div class="leave">
    	<div class="tet-wyfs">我有话说</div>
    	<div class="confom">
            <textarea id="pub" name="content" rows="4"></textarea>
       	    <div class="tetlr" style="background-image:url()">欢迎您！( <?php echo (session('uname')); ?> )</div>
            <a class="submit" onclick="pub(<?php echo ($data["sid"]); ?>)">发表</a>
        </div>
    	<div class="latest">
        	<div class="pl">最新评论</div>
            <div class="resh" style="background-image:url()">刷新</div>
        </div>
    </div>

        <!------------------------------------>
    <?php if($msg): ?><div id="more">
        <?php if(is_array($msg)): foreach($msg as $i=>$vo): ?><div class="coners">
        		<div class="titimg">
            		<a><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["user_pic"]); ?>" width="40" height="40" /></a>
                	<div >求助</div>
            	</div>
            	<div class="con">
                	<div class="titname"><?php echo ($vo["rname"]); ?></div>
            		<div class="contet"><?php echo ($vo["content"]); ?></div>
                	<div class="rname"><?php echo (date("Y-m-d H:i",$vo["ctime"])); ?> [ 来自<?php echo ($vo["address"]); ?>]</div>
            	</div>
            	<div class="right">
                	<div id="praise" onclick="praise(<?php echo ($vo["id"]); ?>)" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/exam/dj03.jpg" width="24" height="19"><div id="shu<?php echo ($vo["id"]); ?>">(<?php echo ($vo["praise"]); ?>)</div></div>
                </div>
		    </div><?php endforeach; endif; ?>
        </div>
            <div id="move"><div class="andmoer"><span onclick="more(<?php echo ($vo["sid"]); ?>,1)">点击加载更多评论</span></div></div>
    <?php else: ?>    
            <div class="coners" style="text-align:center;margin-bottom:30px;">暂无评论</div><?php endif; ?>
</div>

<div id="info"></div>
<script>
$('.theline').click(function(){
    var Css = $(this).attr('class').replace(/theline /,'.daan.');
    var Tm  = $(this).attr('class').replace(/theline /,'.theline.') + ' .tm';
    $('.daan').slideUp();  
    $('.tm').css({height:'20px'});
    if($(Css).css('display')=='block'){ 
            $(Css).slideUp();
            $(Tm).css({height:'20px'}); 
       }else{
            $(Css).slideDown();
            $(Tm).css({height:'inherit'})  
            };  
    })

    function pub(id){
        var content = $("#pub").val();
        var pattern = (/\S/).exec(content);
        if(!pattern){
            show('内容不能为空');
            return false;
        }
        $.post("__ROOT__/index.php/Ajax/AjaxExam/publish",{'sid':id,'content':content},function(json){
            if(json.code == 'success'){
                var node = '<div class="coners"><div class="titimg"><a><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/'+json.data.img+'" width="40" height="40" /></a><div >求助</div></div><div class="con"><div class="titname">'+json.data.uname+'</div><div class="contet">'+json.data.content+'</div><div class="rname">'+json.data.ctime+'[ 来自'+json.data.address+']</div></div><div class="right"><div id="praise" onclick="praise('+json.data.id+')" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/exam/dj03.jpg" width="24" height="19"><div id="shu'+json.data.id+'">('+json.data.praise+')</div></div></div></div>';

                $(node).insertAfter(".leave");    
                show('发表成功');
                $("#pub").val("");
            }else if(json.code == 'quick'){
                show('亲！你先休息一会儿吧');
            }
        },'json');
    }

    var cht = 1;
    function more(sid,id){
        $("#move").html("");
        $.post("__APP__/Ajax/AjaxExam/more",{'sid':id,'id':id},function(data){
            if(data){
                for(var i=0;i<data.length;i++){
                    var node = '<div class="coners"><div class="titimg"><a><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/'+data[i].user_pic+'" width="40" height="40" /></a><div >求助</div></div><div class="con"><div class="titname">'+data[i].rname+'</div><div class="contet">'+data[i].content+'</div><div class="rname">'+data[i].ctime+'[ 来自'+data[i].address+']</div></div><div class="right"><div id="praise" onclick="praise('+data[i].id+')" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/exam/dj03.jpg" width="24" height="19"><div id="shu'+data[i].id+'">('+data[i].praise+')</div></div></div></div>';
                    $(node).appendTo("#more");
                }
                cht++;
                $('<div id="move"><div class="andmoer"><span onclick="more(<?php echo ($vo["sid"]); ?>,'+cht+')">点击加载更多评论</span></div></div>').appendTo("#more");
            }else{
                $('<div id="move"><div class="andmoer">暂无更多评论</div></div>').appendTo("#more");
            }
        },'json');
    }
    
    function praise(id){
        $.post("__ROOT__/index.php/Ajax/AjaxExam/praise",{'id':id},function(data){
            if(data){
                $("#shu"+id).html("");
                $("<span>("+data+")</span>").appendTo("#shu"+id);
            }else{
                show('您已点赞啦');
            }   
        },'json');
    }
    function show(text){
        var pageW = $(window).width(), pageH = $(window).height(), boxW = $("#info").outerWidth(),boxH = $("#info").outerHeight(),scrollH = $(window).scrollTop();
        $("#info").html(text).css({'top':(pageH/2-boxH/2+scrollH)+'px','left':(pageW/2-boxW/2)+"px"}).fadeIn(1000).delay(500).fadeOut(1000);
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