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
     


<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/index.css"/>
 <div class="indexthere">
     <div class="indegai">
        <div class="indexthere-y" >
           <ul class="lcs_wallone">
        <?php if(is_array($teacher)): foreach($teacher as $i=>$vo): ?><a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>" target="blank">
          <li class="lcs_walloneyi">
            <p><?php echo ($vo["dname"]); ?></p>
            <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["id_front"]); ?>" width="63px" height="63px" />   
            <span class="name"><?php echo ($vo["real_name"]); ?></span><br />
            <span class="names"><?php echo ($vo["cname"]); ?>老师</span><br />
            <span class="namee"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/liulanliang.png" class="iggd"/><?php echo ($vo["visitednumber"]); ?></span><br />
          </li>
          </a><?php endforeach; endif; ?>


        <?php if(is_array($teacher)): foreach($teacher as $i=>$vo): ?><a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>" target="blank">
          <li class="lcs_walloneyi">
            <p><?php echo ($vo["dname"]); ?></p>
            <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["id_front"]); ?>" width="63px" height="63px" />   
            <span class="name"><?php echo ($vo["real_name"]); ?></span><br />
            <span class="names"><?php echo ($vo["cname"]); ?>老师</span><br />
            <span class="namee"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/liulanliang.png" class="iggd"/><?php echo ($vo["visitednumber"]); ?></span><br />
          </li>
          </a><?php endforeach; endif; ?>
        <?php if(is_array($teacher)): foreach($teacher as $i=>$vo): ?><a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>" target="blank">
          <li class="lcs_walloneyi">
            <p><?php echo ($vo["dname"]); ?></p>
            <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["id_front"]); ?>" width="63px" height="63px" />   
            <span class="name"><?php echo ($vo["real_name"]); ?></span><br />
            <span class="names"><?php echo ($vo["cname"]); ?>老师</span><br />
            <span class="namee"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/liulanliang.png" class="iggd"/><?php echo ($vo["visitednumber"]); ?></span><br />
          </li>
          </a><?php endforeach; endif; ?>
        </ul>

        </div>
        <div class="indexthere-e" >
            <div class="indexthere-e-y" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/jjpxsbd.png" /></div>
            <a href="__APP__/User/User/register"><div class="indexthere-e-s">我要注册</div></a>
            <div class="indexthere-e-w">
             <p><a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/gou.png" /></a>已累计注册人数 <span class="wenyi"><?php echo ($num); ?></span> 名</p>
             <p><a><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/xiazai.png" /></a><a>下载手机八斗网 随时随地报名找家教</a></p>
             <p class="tishi"><a></a></p>
             <p class="erweima"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/erweima.jpg" /></p>
            </div>    
       </div> 
    
   
  </div>                     
</div>

<div class="indexfour">
    <div class="indexfour-y">
          <div class="fovwayi"><a href="__APP__/Teach/Teach/lists"> <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/tubiao1.png" /><span>海量名师</span></a></div>
          <div class="fovwayi"><a href="__APP__/Organ/Organ/organList"> <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/tubiao2.png" /><span>优质培训</span></a></div>
          <div class="fovwayi"><a href="__APP__/Space/Question"> <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/tubiao3.png" /><span>学习互动</span></a></div>
          <div class="fovwayi"><a href="__APP__/Exam/Exam/examlist"> <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/tubiao4.png" /><span>训练真题</span></a></div>
    </div> 


<!------------焦点新闻-------------->
	<div class="news">
		<div class="n_title">
        <div class="left">新闻热点</div>
        <a class="right" href="__APP__/Index/Index/newslist">更多</a>
    </div>
		<div class="n_con">
        <div class="left">
            <div class="ent_top">

            <?php if(is_array($news1)): foreach($news1 as $i=>$vo): if($i == 0): ?><div class="vtent the0" style="display:block">
                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["logo"]); ?>" class="img"/>
                    <div class="con">
                        <a class="title" href="javascript:hit(<?php echo ($vo["id"]); ?>)"><?php echo ($vo["title"]); ?></a>
                        <a class="inter">　　<?php echo ($vo["content"]); ?></a><a class="more" href="javascript:hit(<?php echo ($vo["id"]); ?>)">···详情</a>
                    </div>
                </div>
					    <?php else: ?> 
                <div class="vtent the<?php echo ($i); ?>">
                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["logo"]); ?>" class="img" width="200" height="170" />
                      <div class="con">
                        <a class="title" href="javascript:hit(<?php echo ($vo["id"]); ?>)"><?php echo ($vo["title"]); ?></a>
                        <a class="inter">　　<?php echo ($vo["content"]); ?></a><a class="more" href="javascript:hit(<?php echo ($vo["id"]); ?>)">···详情</a>
                      </div>
                </div><?php endif; endforeach; endif; ?>

            </div>
          <!--------> 
            <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  class="n_img" src="__ROOT__/public/images/home/index/pic_shanj.png" />  
                <div class="ent_bot">
                    <?php if(is_array($news1)): foreach($news1 as $i=>$vo): ?><a class="ent_shar ent_v<?php echo ($i); ?>" href="javascript:hib(<?php echo ($i); ?>);"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["logo"]); ?>" width="100px" height="60px" /></a><?php endforeach; endif; ?> 
                </div>
            </div>

            <div class="right">
            	<?php if(is_array($news2)): foreach($news2 as $key=>$vo): ?><a href="javascript:hit(<?php echo ($vo["id"]); ?>);"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["logo"]); ?>" class="tuse"/></a><?php endforeach; endif; ?>
            </div>
        </div>
	</div>
<!------------焦点新闻------------>

<!--indexfour-s--begin-->
        <div id="indexfour-s">
            <!-- <div class="indexfour-s-yi" >
                <div class="foursyi"><p>八斗家教</p></div>
                <a href="__APP__/Teach/Teach/agentlist"><div class="indwen-er">更多</div></a>
            </div>

            <div class="indexfour-s-er">
              <?php if(is_array($bd_teach)): foreach($bd_teach as $key=>$vo): ?><div class="s-eryi"> 
                  <div class="s-eryi-y">
                    <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["lincence"]); ?>" width="50px" height="50px" /></a>
                    <p><a href="__APP__/Teach/Teach/agentlist"><?php echo ($vo["real_name"]); ?></a></p>
                    <span>服务区域：<?php echo ($vo["address"]); ?></span>
                  </div>
                  <div class="s-eryi-e">
                    <div class="s-eryi-ey"><p>教师人数</p><span class="haopy"><?php echo ($vo["count"]); ?></span></div>
                    <div class="s-eryi-ey"><p>服务好评</p><span class="haop"> 50%</span></div>
                    <div class="s-eryi-ey  sw"><p>预约次数</p><span class="haope"><?php echo ($vo["yuyue"]); ?></span></div>
                  </div>
                </div><?php endforeach; endif; ?>
            </div> -->
              
               
            <div class="indexwen">
                 <div class="indexwen-y">培训招生</div>
                 <div class="indexwen-yi">
                     <?php if(is_array($hotpclass)): foreach($hotpclass as $key=>$class): ?><span><a href="javascript:;" id="<?php echo ($class["id"]); ?>"><?php echo ($class["name"]); ?></a></span><?php endforeach; endif; ?>
                    
                 </div>
                 <div class="i_gd"><a href="__APP__/Organ/Organ/organList" style="color:#808080;">更多</a></div>
            </div>
            <div class="yingchangy">
            
            <div class="indexwenyi">
                <div class="indexwenyi-y">
                  <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>
                    
                  <div class="indexwenyi-y">
                   <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>
                
                
                <div class="indexwenyi-y">
                  <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>  
            </div>
          <div class="indexwener">
                   <div class="indexwenyi-y">
                  <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>
                    
                  <div class="indexwenyi-y">
                   <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>
                
                
                <div class="indexwenyi-y">
                  <div class="s-eryiwen-y">
                   <a href="#"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/laoshier.gif" /></a>
                   <p><a href="#">游戏开发</a><a href="#" class="pieo">￥9999</a></p>
                    <span>培训机构：火星时代</span>
                    <span>地址：深圳</span>
                    </div>
                    <div class="s-eryi-e">
                         <div class="s-eryi-ey"><p>招生人数</p><span class="haopy">50</span></div>
                         <div class="s-eryi-ey"><p>时间</p><span class="haop"> 50%</span></div>
                         <div class="s-eryi-ey  sw"><p>好评</p><span class="haope">1354</span></div>
                    </div>
                </div>  
           </div>
           
           </div>



<!--热门考题---begin-->
    <div class="indexwensan">
        <div class="indexwensan-y">热门考题</div>
        <a href="__APP__/Exam/Exam/examlist"><div class="indwen-er">更多</div></a>
    </div>

<div class="con_b">
	<div class="conent">
		<?php if(is_array($classfiy)): foreach($classfiy as $i=>$vo): if($i === 0): ?><div class="tent"><div class="cus img1 vimg1" onclick="getExam(<?php echo ($vo["id"]); ?>,1)"></div><div class="tet"><?php echo ($vo["name"]); ?></div></div>
			<?php else: ?>
				<div class="tent"><div class="cus img<?php echo ($i+1); ?>" onclick="getExam(<?php echo ($vo["id"]); ?>,<?php echo ($i+1); ?>)"></div><div class="tet"><?php echo ($vo["name"]); ?></div></div><?php endif; endforeach; endif; ?>
  </div>
  <div class="tran"><span></span></div>
	<div id="img1" class="coner img1" style="display:block">
		<?php if($data2): if(is_array($data2)): foreach($data2 as $i=>$vo): ?><div class="imgaes">
	        <a href="__APP__/Exam/Exam/detail?id=<?php echo ($vo["id"]); ?>"><div class="dsyesa"><?php echo ($vo["name"]); ?></div></a>  
	      </div><?php endforeach; endif; ?>
		<?php else: ?>
			<div style="text-align:center;height:100px;line-height:100px;">
	    		抱歉！暂时没有相关试题
	    	</div><?php endif; ?>
	</div>



</div>
<!--热门考题---end-->           

</div> 
<!--indexfour-s--end-->


 
          <div class="indexfour-w">
              <div class="indexfour-w-y"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/guangay.gif" class="mgyfoim"/></div>
              <div class="indexfour-w-e">
                 <div class="indexfouryi"><p>热门学吧</p></div>
              </div>
              
            <?php if(is_array($sbar)): foreach($sbar as $i=>$vo): ?><div class="ind-foyw">
                <a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["user_pic"]); ?>" class="foying" /></a>
                <div class="foyiner">
                  <a href="__APP__/Space/Space/space?uid=<?php echo ($vo["uid"]); ?>"><p class="foywie"><?php echo ($vo["rname"]); ?></p></a>
                  <p class="biaoqh">美女 学霸</p>
                  <p>6级  1010粉丝</p>
                </div>
              </div><?php endforeach; endif; ?>  
              
              <div class="indexfour-w-e">
                 <div class="indexfouryi"><p>热门学问</p></div>
              </div>

              
              <div class="indexfour-w-w">
<!--                  <div class="four-w-wy"><a href="#"><p>一年级</p></a></div>
                  <div class="four-w-wy"><a href="#"><p>一年级</p></a></div>
                  <div class="four-w-wy"><a href="#"><p>一年级</p></a></div>
                  <div class="four-w-wy"><a href="#"><p>一年级</p></a></div>-->
              </div>
              
              <div class="indexfour-w-lu" >
                   <ul>
                       <?php if(is_array($questions)): foreach($questions as $key=>$question): ?><li><a href="javascript:"><?php echo (mb_substr(strip_tags($question["content"]),"0","10","utf-8")); ?> <span class="uyjai"><?php echo ($question["lnumber"]); ?></span></a></li><?php endforeach; endif; ?>
                    
                  </ul>
              </div>
          </div>
         
         
          
          <div class="indexfver">
               <div class="indexfver-y">
               <div class="indexfver-yi"><p>优惠课程</p></div>
               <div class="indwen-er"><p>更多</p></div>   
               </div>
              
               <div class="indexfver-e">
                   <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><div class="indpxyit"> 
                            <div class="inft-jge"><a href="__APP__/Organ/Organ/odetail?id=<?php echo ($course["id"]); ?>"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($course["timg"]); ?>" /></a></div>
                            <div class="inft-pge"><a href="__APP__/Organ/Organ/odetail?id=<?php echo ($course["id"]); ?>"><?php echo (mb_substr($course["aname"],"1","20","utf-8")); ?>...</a></div>
                            <div class="inft-pgy">
                                <?php if($course['d_price']){ $discount=((float)$course['d_price'])/((float)$course['price']); $discount=number_format($discount, 2, '.', '')*10; }else{ $discount='该课程没有折扣!'; } ?>
                             <p><span class="dzxh">¥<?php echo ($course["d_price"]); ?></span> <span class="dzxhe">¥<?php echo ($course["price"]); ?></span> <span><?php echo ($discount); ?>折</span></p>
                            </div>
                        </div><?php endforeach; endif; ?>
                    
                     
               </div>
          </div>
         
         <div class="indexsix">
             <div class="indexsix-y">
                <div class="indexsix-yi"><p>最受关注的学校</p></div>
             </div>
             <div class="indexsix-e">
                  <div class="schooly"><a href="http://www.gedu.org" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s1.jpg" /></a></div>
                  <div class="schooly"><a href="http://www.xdf.cn" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s2.png" /></a></div>
                  <div class="schooly"><a href="http://www.bdqn.cn" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s3.jpg" /></a></div>
                  <div class="schooly"><a href="http://www.bond520.com" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s4.jpg" /></a></div>
                  <div class="schooly"><a href="http://www.tedu.cn" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s5.jpg" /></a></div>
                  <div class="schooly"><a href="http://www.21edu.com" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s6.jpg" /></a></div>
                  <div class="schooly"><a href="http://www.ef.com.cn" target="new"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/s7.jpg" /></a></div>
             </div>
         </div>
            
      </div>
    <div class="indexsever">
               <div class="indexsever-og">
                  <div class="indexsever-y"></div>
                      <div class="indexsever-e">
                           <div class="ind-sy">
                             <p class="zhuti"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/dianh.png" />客服电话（9:00-18:00）</p>
                             <p class="zhutiy">0755-29494667（咨询电话）</p>
                             <p class="zhutiy">652575798（咨询QQ）</p>
                             <p class="zhutiy">1031133564（咨询QQ）</p>
                           </div>
                           <div class="ind-se">
                             <p class="zhuti"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/xinliao.png" />微博:</p>
                             <p class="zhutiyt">@八斗</p>
                             <p class="zhuti"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/youjian.png" />联系邮箱:</p>
                             <p class="zhutiyty">kefu@bsxkj.com</p>
                           </div>
                           <div class="ind-sh">
                             <p class="zhuti"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/index/weixin.png" />微信:</p>
                             <p class="zhutiyter">关注新浪八斗</p>
                           </div>  
                   </div>
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

<script>
window.onload = function(){		$('.ent_v0').addClass('hover')	}
  function hit(id){
    $.get("__APP__/Ajax/AjaxIndex/hit",{'id':id},function(data){
      window.location.href="__APP__/Index/Index/news?id="+id;
    });
  }
 // hib(id);
  function hib(id){
    $.get("__APP__/Ajax/AjaxIndex/hit",{'id':id},function(data){
		$('.ent_shar').removeClass('hover');
		$('.ent_shar.ent_v' + id).addClass('hover')
		$('.vtent').hide();
		$('.vtent.the' + id).show();
		if(id=='0'){$('.n_img').css({top:'185px',left:'43px'})} 
		else if(id=='1'){$('.n_img').css({top:'185px',left:'165px'})}
		else if(id=='2'){$('.n_img').css({top:'185px',left:'280px'})}
		else if(id=='3'){$('.n_img').css({top:'185px',left:'395px'})}
		else if(id=='4'){$('.n_img').css({top:'185px',left:'510px'})}
		
    });
  }

  $(".tishi").find("a").click(function(){
      $(".tishi").css({'display':'none'});
      $(".erweima").toggle();
  });
  $(".erweima").click(function(){
      $(".erweima").css({'display':'none'});
      $(".tishi").toggle();
  });

  
function vs(){	for(i=1;i<12;i++){		$('.cus').removeClass('vimg'+i)		}	}
$('.conent .cus').click(function(){
	var css = $(this).attr('class').replace(/cus /,'');
	if(css=='img1'){		$('.tran span').css({left:'35px'});vs();$('.cus.'+css).addClass('vimg1');}
	else if(css=='img2'){   $('.tran span').css({left:'155px'});vs();$('.cus.'+css).addClass('vimg2') }
	else if(css=='img3'){   $('.tran span').css({left:'280px'});vs();$('.cus.'+css).addClass('vimg3') }
	else if(css=='img4'){   $('.tran span').css({left:'400px'});vs();$('.cus.'+css).addClass('vimg4') }
	else if(css=='img5'){   $('.tran span').css({left:'525px'});vs();$('.cus.'+css).addClass('vimg5') }
	else if(css=='img6'){   $('.tran span').css({left:'650px'});vs();$('.cus.'+css).addClass('vimg6') }
	else if(css=='img7'){   $('.tran span').css({left:'770px'});vs();$('.cus.'+css).addClass('vimg7') }
	else{}

	//$('.coner').hide();
	//$('.coner.' + css).show();
	})

	//获取二级分类
	function getExam(fid,id){
    $("#img1").html("");  
    var load = '<div class="load"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/public/images/home/jiazai.gif" width="30px" /></div>';
    $("#img1").html(load);
    
		$.post("__ROOT__/index.php/Ajax/AjaxIndex/getExam",{'fid':fid},function(data){
			if(data != null){
        $("#img1").html("");  
				for(var i=0;i<data.length;i++){
					var node = '<div class="imgaes"><a href="__APP__/Exam/Exam/detail?id='+data[i].id+'"><div class="dsyesa">'+data[i].name+'</div></a></div>';
					$(node).appendTo("#img1");
				}
			}else{
				var node = '<div class="sorry">抱歉！暂时没有相关试题</div>';
        $("#img1").fadeIn(300).html(node);
			}
		},'json');
	}


  function hesoh(){
	     var str="{$vo.name}".length;
		 var s = str;
		   if(str.length>10){
			   s=str.substring(0,10)+"...";
			   }
	     alert(s);
	  }
  
  		

</script>