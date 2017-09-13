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
     


   <link href="__ROOT__/public/css/home/Detailspage.css" type="text/css" rel="stylesheet" />
   
   
     <div class="detali-one"><p>当前位置 : <a href="javascript:">培训</a> > : <a href="javascript:">培训详情 </a>> <?php echo ($course["aname"]); ?></p></div>
       
       <div class="detali-twozs">

           <div class="det-one">
           <h1><?php echo ($course["aname"]); ?></h1>
           <p class="py"><?php if($course["introduce"] != ''): echo ($course["introduce"]); else: ?>抱歉，暂无相关简介！<?php endif; ?>
           </p>
           </div>
           
           <div class="det-two">
               <div class="det-ty"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src='__ROOT__ <?php if($course["img"] != ""): echo ($course["img"]); else: ?>/pulbic/images/home/n_pic.png<?php endif; ?>'  /> </div>
               <div class="det-te">
                   <p class="pq"><span class="qy">￥<?php if($course["d_price"] > 0): echo ($course["d_price"]); endif; ?></span>
                   <span class="qe">￥<?php if($course["price"] > 0): echo ($course["price"]); endif; ?></span>
                   <?php if($course['d_price']){ $discount=((float)$course['d_price'])/((float)$course['price']); $discount=number_format($discount, 2, '.', '')*10; }else{ $discount='该课程没有折扣!'; } ?>
                   <span class="qs"><?php echo ($discount); ?>折</span></p>
                   
                   <p class="pe">已售：<span class="qsi">196</span>  
                   <span class="qw">5人已评价</span>   
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <span class="ql">5.0</span>分
                   </p>
                   
                   <p>活动类型：优惠劵</p>
                   <p>机构名称：<a href="javascrip:" class="qq"><?php if($organ["real_name"] != ''): echo ($organ["real_name"]); else: ?>暂无机构信信息！<?php endif; ?></a></p>
                   <p>使用学生：小学生</p>
                   <p>开课日期：<?php echo (date('Y-m-d',$course["s_time"])); ?> 至 <?php echo (date('Y-m-d',$course["e_time"])); ?>  </p>
                   
                   <div class="ljq">
                     <?php if($isin < 1): ?><a href="inclass?id=<?php echo ($course["id"]); ?>">√立即抢购<?php else: ?><a href="javascript:;">已报名！<?php endif; ?></a>
                     <p class="qk"><span>剩余名额：<?php if($course["number"] > 0): if($course["ain"] > 0): echo $course['number']-$course['ain']; else: echo ($course["number"]); endif; else: ?>0<?php endif; ?></span></p>
                   </div>
               </div>
               
               <div class="det-ts">
                  <div class="dey">
                  <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/wxfh.gif" />
                  <div class="deon">
                    <p class="da">HI~</p>
                    <P>扫一扫有惊喜哦</P>
                    <P>最新教育质询发布平台</P>
                  </div>
                  </div>
                  
                  <div class="deer">
                     <div class="deyff">
                       <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xrt1.gif" /><br />
                       <p>在线咨询</p>
                     </div>
                     <div class="dee">
                       <img style="margin: 10px 0 0 20px;" onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xrt2.gif" />
                       <p><?php if($organ["telephone"] != ''): echo ($organ["telephone"]); else: ?>抱歉，暂无联系方式<?php endif; ?></p>
                     </div>
                  </div>
                  
                  <div class="desan">
                     <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/x1r.gif" /><a href="javascript:" name='collect' id='<?php echo ($course["id"]); ?>'>收藏本课程</a>
                    <div style="float:left;padding-top:10px;" class="bshare-custom icon-medium"  url="http://<?php echo ($_SERVER['HTTP_HOST']); ?>__SELF__" summary="<?php echo ($course["introduce"]); ?>" pic="http://<?php echo ($_SERVER['HTTP_HOST']); ?>__ROOT__<?php echo ($course["img"]); ?>>
                  </div> <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/x2r.gif" class="imq"/><a href="javascript:">分享到</a>
                  </div>
                  
               </div>
           </div>
               
       </div>

 <div class="detali-there">
     <div class="detre-yi">
             <div class="decet-one">
               <a class="decet-oyi dec" name="info" href="javascrpt:;">课程详情</a>
               <a class="decet-oyi" name="detail" href="javascript:;">课程评论(<?php if($sum): echo ($sum); else: ?>0<?php endif; ?>)</a>
             </div>
              <!--隐藏__课程详情-->
             <div class="decet-two" id="info" >
                   <?php echo (html_entity_decode($course["descript"])); ?>
             </div>
             
             <!--隐藏__课程评论-->
             <div class="decet-two" style="display:none" id="cmt">
                 <?php if(is_array($comments)): foreach($comments as $key=>$comment): if($comment["ctid"] != ''): ?><div class="dectw-kcyi">
                                     <div class="dectw-kcyceny">
                                     <div class="dectw-kcycenyi"></div>
                                     <p class="de-xmi">Better Man</p>
                                    </div>

                                   <div class="dectw-kcycene">
                                       <?php for($i=0;$i<$comment['star'];$i++){ echo '<img  src="__ROOT__/public/images/home/pxu/xxin.png" />'; } for($i=0;$i<5-$comment['star'];$i++){ echo '<img  src="__ROOT__/public/images/home/pxu/xxingx.png" />'; } ?>
                                    <p><?php echo ($comment["content"]); ?></p>
                                    <p class="shij"><?php echo (date("Y-m-d H:i",$comment["com_timestamp"])); ?></p>
                                   </div>
                               
                             </div>
                             <?php else: ?>
                             <div style='margin:20px;margin-left:180px;'>
                                <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/baoc.png" /><p>抱歉，暂无相关评论！</p>
                             </div><?php endif; endforeach; endif; ?>
                 
       </div></div>
          
          <div class="detre-er">
                <p class="pt-re" >更多优惠课程</p>
                <p class="pt-rs" ></p>
                <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><div class="deter-san">
                         <div class="deter-sny"><?php if($course["timg"] != ''): ?><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($course["timg"]); ?>" style="width:105px;height:52px;"/><?php endif; ?></div>
                         <div class="deter-sne"><p><a href="__ROOT__/index.php/Organ/Organ/odetail?type=1&id=<?php echo ($course["id"]); ?>"><?php echo ($course["aname"]); ?></a></p></div>
                     </div>
                     <div style="clear:both;"></div><?php endforeach; endif; ?>
              
          
 </div>
 
 <!--关注学校-->
<div class="Lpage-twossas">
        <div class="Lpage-two">
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
</div> </div>
     <script src="__ROOT__/public/js/layer/layer-min.js"></script>
     <script type="text/javascript" ckharset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh"></script>  
     <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script> 
     <script>
         $(function(){
             $("a[name=collect]").click(function(){
             $.getJSON('__ROOT__/index.php/Ajax/AjaxCourse/collect',{'id':$(this).attr("id")},function(data){
             var type=data.code==='1'?1:2;
             $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type:type,msg:data.message}});
            });
             })
			 
			 
             $(".decet-oyi").click(function(){
               $(".decet-oyi").removeClass("dec");
               $(this).addClass("dec");
               if($(this).attr('name')==='info'){
                   $("#info").show();
                   $("#cmt").hide();
               }else{
                   $("#info").hide();
                   $("#cmt").show();
               }
			   
			   
          });
           //bShare分享  
            var iBShare = {  
                //初始化  
                init: function() {  
                    var $shareBox = $(".bshare-custom");  
                    //加载分享工具  
                    var tools = '<a title="分享到QQ空间" class="bshare-qzone"></a>';  
                    tools += '<a title="分享到新浪微博" class="bshare-sinaminiblog"></a>';  
                    tools += '<a title="分享到人人网" class="bshare-renren"></a>';  
                    tools += '<a title="分享到腾讯微博" class="bshare-qqmb"></a>';  
                    tools += '<a title="分享到网易微博" class="bshare-neteasemb"></a>';  
                    tools += '<a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>';  
                    $shareBox.append(tools);  
                    //绑定分享事件  
                    $shareBox.children("a").click(function() {  
                        var parents = $(this).parent(); 
                        bShare.addEntry({  
                            title: parents.attr("title"),  
                            url: parents.attr("url"),  
                            summary: parents.attr("summary"),  
                            pic: parents.attr("pic")  
                        });  
                    });  
                }  
            }  
            iBShare.init();

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

</body>
</html>