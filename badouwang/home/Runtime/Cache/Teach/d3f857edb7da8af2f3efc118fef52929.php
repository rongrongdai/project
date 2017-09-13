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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/teach.css"/>
<div class="tutor-all">
<!--导航条-->

<!--家教内容-->
<div id="playBox">
 <div class="pre"></div>
    <div class="next"></div>
    <div class="smalltitle hcenter">
      <ul class="hecnter">
        <li class="thistitle"></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <ul class="oUlplay">
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner1-jj.jpg" /></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner2-jj.jpg" /></a></li>
       <li><a href="javascript:;" target="_blank"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/banner3-jj.jpg" /></a></li>
    </ul>
  </div>


        <div class="con_a">
            <div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_jj_01.jpg" /></div>
            <div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_jj_02.jpg" /></div>
            <div class="con"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/pic_jj_03.jpg" /></div>
            <div class="con" style="margin:0;border:none;">
                <div class="title"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/gong.png" /><div>最新需求信息</div></div>
                <div class="link">
                     <?php if(is_array($notices)): foreach($notices as $i=>$vo): ?><a href="<?php echo ($vo["link"]); ?>"><div name="left"><li><?php echo ($vo["ntext"]); ?></li></div><span name="right"><?php echo (date("Y/m/d",$vo["atime"])); ?></span></a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>





<div style="width:1200px;margin:0 auto">
     <div  class="trw-er">
        <div class="tot-on">
                  <div class="tut-y">
                     <div class="tut-yi"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/jt2.png" style=" position:relative; top:8px; right:2px;" />最新老师</div>
                     <div class="tut-er tou"><a class="xiaox-yi">小学</a></div>
                     <div class="tut-er"><a class="xiaox-er">初中</a></div>
                     <div class="tut-er"><a class="xiaox-san">高中</a></div>
                     <div class="tut-er"><a class="xiaox-si">文艺</a></div>
                     <div class="tut-er"><a href="__URL__/lists">更多</a></div>
                  </div>
                                                  
                  
                  <!--小学老师div-->
                  <div class="tut-e" id="laoshiyi">

                        <?php if(is_array($arr1)): foreach($arr1 as $i=>$vo): ?><div class="tut-laoy">
                                <a href="__URL__/agentdetail?id=<?php echo ($vo["id"]); ?>">
                                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="126px" height="89px" />
                                    <div class="tut-laoyi">
                                        <p class="ladw"><?php echo ($vo["real_name"]); ?>老师</p>
                                        <p class="ladyy"><?php echo ($vo["self_info"]); ?>....</p>
                                        <p class="ladey">立即查看>></p>
                                    </div>
                                </a>
                              <div class="tut-laoer"><?php echo ($vo["name"]); ?>老师</div>
                            </div><?php endforeach; endif; ?>

                  </div>
                  <!--老师div结束-->
                 
                 
                  <!--初中老师div-->
                  <div class="tut-e" style="display:none;" id="laoshier">

                    <?php if(is_array($arr2)): foreach($arr2 as $i=>$vo): ?><div class="tut-laoy">
                                <a href="__URL__/agentdetail?id=<?php echo ($vo["id"]); ?>">
                                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="126px" height="89px" />
                                    <div class="tut-laoyi">
                                        <p class="ladw"><?php echo ($vo["real_name"]); ?>老师</p>
                                        <p class="ladyy"><?php echo ($vo["self_info"]); ?>....</p>
                                        <p class="ladey">立即查看>></p>
                                    </div>
                                </a>
                              <div class="tut-laoer"><?php echo ($vo["name"]); ?>老师</div>
                            </div><?php endforeach; endif; ?>

                  </div>
                  <!--老师div结束-->
                      
                 <!--高中老师div-->
                  <div class="tut-e" style="display:none;" id="laoshisan">

                    <?php if(is_array($arr3)): foreach($arr3 as $i=>$vo): ?><div class="tut-laoy">
                                <a href="__URL__/agentdetail?id=<?php echo ($vo["id"]); ?>">
                                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="126px" height="89px" />
                                    <div class="tut-laoyi">
                                        <p class="ladw"><?php echo ($vo["real_name"]); ?>老师</p>
                                        <p class="ladyy"><?php echo ($vo["self_info"]); ?>....</p>
                                        <p class="ladey">立即查看>></p>
                                    </div>
                                </a>
                              <div class="tut-laoer"><?php echo ($vo["name"]); ?>老师</div>
                            </div><?php endforeach; endif; ?>

                </div>
                <!--老师div结束-->
                 
                 
                 <!--文艺老师div-->
                  <div class="tut-e" style="display:none;" id="laoshisi">
                  
                    <?php if(is_array($arr4)): foreach($arr4 as $i=>$vo): ?><div class="tut-laoy">
                                <a href="__URL__/agentdetail?id=<?php echo ($vo["id"]); ?>">
                                    <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["c_img"]); ?>" width="126px" height="89px" />
                                    <div class="tut-laoyi">
                                        <p class="ladw"><?php echo ($vo["real_name"]); ?>老师</p>
                                        <p class="ladyy"><?php echo ($vo["self_info"]); ?>....</p>
                                        <p class="ladey">立即查看>></p>
                                    </div>
                                </a>
                              <div class="tut-laoer"><?php echo ($vo["name"]); ?>老师</div>
                            </div><?php endforeach; endif; ?>

                  </div>
                  <!--老师div结束-->
                 
        
     </div>
          <div class="tot-tw">
               <div class="indexfour-w-e">
                 <div class="indexfouryi"><p>我要找老师</p></div>
              </div>
               
               <div class="tot-we">
                 <textarea rows="12" class="zhal" cols="33" placeholder="需要什么老师?" maxlength="200"></textarea>
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/any.gif" class="xyas" onclick="hunt()" />
               </div>
          </div>
          
     </div>




        <div class="trw-san">
            <div class="trw-sany">
               <p class="tcjie">推荐老师</p>
               <p class="tcjiy">本地区域已有<span class="zkq"><?php echo ($sum); ?></span>名老师加盟八斗家教 > ><a href="__URL__/teachList"><span class="zkq">查看全部</span></a></p>
        <div class="trw-yw aoshu"><p onclick="hot('英语')">英语</p></div>
        <div class="trw-yw"><p onclick="hot('奥数')">奥数</p></div>
        <div class="trw-yw"><p onclick="hot('中考')">中考</p></div>
        <div class="trw-yw"><p onclick="hot('高考')">高考</p></div>
        <div class="trw-yw"><p onclick="hot('音乐')">音乐</p></div>
  
            </div>
             
             
         <!--奥数div-->
            <div class="trw-sane">
            <?php if(is_array($data1)): foreach($data1 as $i=>$vo): ?><div class="trw-saye">
                    <div class="tu-zy">
                      <div class="tu-zyi">
                        <div><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($vo["id_front"]); ?>" class="t-yua" /></div>
                          <p class="t-yuy"><?php echo ($vo["real_name"]); ?></p><!-- <p class="t-yue">长江家政</p> --><p class="t-yus v<?php echo ($i); ?>" id="yin1yi"><?php echo ($vo["t_prof"]); ?></p>
                      </div>
                             
                      <div class="tu-zer">
                        <a class="tu-zery" href="__URL__/teachDetail?pid=<?php echo ($vo["id"]); ?>"><?php echo ($vo["cname"]); echo ($vo["bname"]); ?></a>
                        <p class="tu-zere">授课对象:</p>
                        <p>刚刚接触英语的小学生，</p>
                        <p>口语成绩不好，写作能力不行的。</p>
                        <p class="tu-zere">授课范围:</p>
                        <p><?php echo ($vo["address"]); ?></p>
                      </div>
                      
                      <div class="tu-zsan">
                        <div class="tu-zsany"><p class="t-hp">好评</p><p>10分</p></div>
                        <div class="tu-zsanyi">
                           <p class="t-hp">服务费</p><p><?php echo ($vo["price2"]); ?>/小时</p>
                        </div>
                        <a href="__URL__/teachDetail?pid=<?php echo ($vo["id"]); ?>"><p class="t-yiy">查看详情</p></a>
                        <!-- <p class="t-yie">剩余时间：6天 10:10</p> -->
                      </div>
                  </div>
                  <div class="tu-wan v<?php echo ($i); ?>" style="display:none;" id="jsyi">
                      <div class="tu-watup" ><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pic_shanj.png" /></div>
                     <p>介绍：<?php echo ($vo["info"]); ?></p>
                  </div>
               </div><?php endforeach; endif; ?>   
    
        </div>
        <!--奥数div结束-->
             
      </div>


        <div  class="trw-si"><a name="news"></a>
             <div class="trw-sy">
              <div class="indexfour-w-e">
                 <div class="indexfouryi"><p>最新信息</p></div>
              </div>

    
            <div id="message">  
              <?php if(is_array($message)): foreach($message as $i=>$vo): ?><div class="trw-sie">
                    <div class="trw-siey"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["user_pic"]); ?>" width="68px" height="72px" /></div>
                    <div class="trw-sieer">
                      <p><b style="font-size:14px;"><?php echo ($vo["rname"]); ?> 说：</b>“<?php echo ($vo["content"]); if($vo["txtmore"] != ''): ?><span id="more1">···详情</span><span id="more2"><?php echo ($vo["txtmore"]); ?></span><?php endif; ?>”<div class="to-fz"><?php echo ($vo["btime"]); ?></div><p></p>
                    </div>                  
                </div><?php endforeach; endif; ?>
            </div>  
               <div id="chakg" style="width:800px;padding:30px 0;"><input type="button" value="查看更多" class="chaokg" onclick="more(<?php echo ($vo["id"]); ?>)"/></div>
             </div>
             
             
             
             
             <!--合作机构-->
             <div class="trw-se">
                <div class="indexfour-w-e">
                 <div class="indexfouryi"><p>合作机构</p>
                 </div>
                 
              </div>
                 <?php if(is_array($hezuo)): foreach($hezuo as $i=>$vo): ?><div class="trz-syi">
                      <a href="http://<?php echo ($vo["url"]); ?>"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($vo["logo"]); ?>" class="tiyrdf" /></a>
                   </div><?php endforeach; endif; ?>
             </div>
             
             
        </div>

<div id="infos">发表</div><div id="info">成功</div>
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
<script src="__ROOT__/public/js/jquery.vticker-min.js"></script>


<script type="text/javascript">
    $('.tut-er').mouseover(function(){
          $('.tut-er').removeClass('tou');
         $(this).addClass('tou');
    });
        
         $('.xiaox-yi').mouseover(function(){
              $('#laoshiyi').css({display:'block'});
              $('#laoshier').css({display:'none'});
              $('#laoshisan').css({display:'none'});
              $('#laoshisi').css({display:'none'});           
         });
         
        $('.xiaox-er').mouseover(function(){
              $('#laoshiyi').css({display:'none'});
              $('#laoshier').css({display:'block'});
              $('#laoshisan').css({display:'none'});
              $('#laoshisi').css({display:'none'});           
         });
         
         $('.xiaox-san').mouseover(function(){
              $('#laoshiyi').css({display:'none'});
              $('#laoshier').css({display:'none'});
              $('#laoshisan').css({display:'block'});
              $('#laoshisi').css({display:'none'});           
         });
         
         $('.xiaox-si').mouseover(function(){
              $('#laoshiyi').css({display:'none'});
              $('#laoshier').css({display:'none'});
              $('#laoshisan').css({display:'none'});
              $('#laoshisi').css({display:'block'});              
         });
/*             $('.tut-laoy').mouseover(function(){
                
                 $(this).find('.tut-laoyi').css({display:'block'});
                 $(this).find('.tut-laoer').css({display:'none'});
             
             });
                
            $('.tut-laoy').mouseout(function(){
                 $(this).find('.tut-laoyi').css({display:'none'});
                 $(this).find('.tut-laoer').css({display:'block'});
            
             });    */    
                    
                    
$(".tu-zy #yin1yi").live('mouseover',function(){
   vfid = '.tu-wan.' + $(this).attr('class').replace(/t-yus /,''); 
    $(vfid).css({display:'block'});
})
$(".tu-zy #yin1yi").live('mouseout',function(){
   vfid = '.tu-wan.' + $(this).attr('class').replace(/t-yus /,''); 
    $(vfid).css({display:'none'});
})
    

 $('.trw-yw').click(function(){ 
          $('.trw-yw').removeClass('aoshu');
         $(this).addClass('aoshu');
    });

//最新信息
$(".trw-sieer").find("#more1").live('click',function(){
  $(this).hide();
  $(this).next("#more2").show();
  var h = $(this).parent().height(),hh = parseInt($(this).parent().parent().parent().css('height'));
  $(this).parent().parent().parent().css('height',h+65);
  $(this).parent().parent().css('backgroundColor','pink');

  $(this).parent().parent().parent().mouseleave(function(){
    $(this).find("#more1").show();
    $(this).find("#more2").hide();
    $(this).css('height',hh);
    $(this).find(".trw-sieer").css('backgroundColor','white');
  });

});




function hunt(){
  var content = $(".zhal").val();
  var pattern = (/\S/).exec(content);
  
  if(content == '' || !pattern){
      shows('亲！请填写需求信息');
  }else if(content.length<20){
      shows('亲！您输入的内容太少');
  }else{
    $.post("__ROOT__/index.php/Ajax/AjaxTeach/hunt",{'content':content},function(data){
      if(data){
        $(".zhal").val('');
        if(data.txtmore){
          var node = '<div class="trw-sie"><div class="trw-siey"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/'+data.img+'" width="68px" height="72px" /></div><div class="trw-sieer"><p><b style="font-size:14px;">'+data.rname+' 说：</b>“'+data.content+'<span id="more1">···详情</span><span id="more2">'+data.txtmore+'</span>”<div class="to-fz">'+data.btime+'</div></p></div></div>';
        }else{
          var node = '<div class="trw-sie"><div class="trw-siey"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/'+data.img+'" width="68px" height="72px" /></div><div class="trw-sieer"><p><b style="font-size:14px;">'+data.rname+' 说：</b>“'+data.content+'”<div class="to-fz">'+data.btime+'</div></p></div></div>';
        }
        
        $(node).fadeIn(300).prependTo("#message");
        window.location.href = "#news";
        show('发布成功');
      }
    },'json')

  }
}

function more(id){
    $("#chakg").html("");
    $('<div style="margin-left:50%"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"   src="__ROOT__/public/images/home/jiazai.gif" width="30" height="30" /></div>').appendTo("#chakg");
    $.post("__ROOT__/index.php/Ajax/AjaxTeach/more",{'id':id},function(data){
        if(data){
          for(var i=0;i<data.length;i++){
            if(data[i].txtmore){
              var node = '<div class="trw-sie"><div class="trw-siey"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/'+data[i].user_pic+'" width="68px" height="72px" /></div><div class="trw-sieer"><p><b style="font-size:14px;">'+data[i].rname+' 说：</b>“'+data[i].content+'<span id="more1">···详情</span><span id="more2">'+data[i].txtmore+'</span>”<div class="to-fz">'+data[i].btime+'</div></p></div></div>';
            }else{
              var node = '<div class="trw-sie"><div class="trw-siey"><img onerror="javascript:this.src=__ROOT__/public/images/home/n_pic.png"  src="__ROOT__/'+data[i].user_pic+'" width="68px" height="72px" /></div><div class="trw-sieer"><p><b style="font-size:14px;">'+data[i].rname+' 说：</b>“'+data[i].content+'”<div class="to-fz">'+data[i].btime+'</div></p></div></div>';
            }
            $(node).appendTo("#message");
            var mid = data[i].id;
          }
          $("#chakg").html("");
          var nodd = '<input type="button" value="查看更多" class="chaokg" onclick="more('+mid+')"/>';
          $(nodd).appendTo("#chakg");
        }else{
          $("#chakg").html("");
          $("<span class='chaokg'>没有更多信息啦</span>").appendTo("#chakg");
        }
    },'json')
}

function shows(text){
  $("#infos").html(text).css({'top':'900px','left':"1040px"}).fadeIn(1000).delay(500).fadeOut(1000);
}
function show(text){
  var pageW = $(window).width(), pageH = $(window).height(), boxW = $("#info").outerWidth(),boxH = $("#info").outerHeight(),scrollH = $(window).scrollTop();
  $("#info").html(text).css({'top':(pageH/2-boxH/2+scrollH)+'px','left':(pageW/2-boxW/2)+"px"}).fadeIn(1000).delay(500).fadeOut(1000);
}

//切换推荐老师
function hot(id){
    $(".trw-sane").html("");
    $.post("__ROOT__/index.php/Ajax/AjaxTeach/getHot",{'id':id},function(data){
        if(data){
          for(var i=0;i<data.length;i++){
              var node = '<div class="trw-saye"><div class="tu-zy"><div class="tu-zyi"><div><img src="__ROOT__'+data[i].id_front+'" class="t-yua" /></div><p class="t-yuy">'+data[i].real_name+'</p><p class="t-yus v'+i+'" id="yin1yi">'+data[i].t_prof+'</p></div><div class="tu-zer"><a class="tu-zery" href="__URL__/teachDetail?pid='+data[i].id+'">'+data[i].cname+data[i].bname+'</a><p class="tu-zere">授课对象:</p><p>刚刚接触英语的小学生，</p><p>口语成绩不好，写作能力不行的。</p><p class="tu-zere">授课范围:</p><p>'+data[i].address+'</p></div><div class="tu-zsan"><div class="tu-zsany"><p class="t-hp">好评</p><p>10分</p></div><div class="tu-zsanyi"><p class="t-hp">服务费</p><p>'+data[i].price2+'/小时</p></div><a href="__URL__/teachDetail?pid='+data[i].id+'"><p class="t-yiy">查看详情</p></a></div></div><div class="tu-wan v'+i+'" style="display:none;" id="jsyi"><div class="tu-watup" ><img src="__ROOT__/public/images/home/pic_shanj.png" /></div><p>介绍：'+data[i].info+'</p></div></div>';

              $(node).appendTo(".trw-sane");
          }
        }

    },'json');

}

//搜索
$("#indexte").attr('placeholder','家教搜索');
function search(){
  $("#indexte").wrap("<form id='search' action='__URL__/lists' method='get'></form>");
  var tt = $("#indexte").val();
  if(tt){ $("#search").submit(); }

}

$(window).keydown(function(e){
  //if(e.keyCode == 13){search();}
});


		function getStyle(obj,name)
{
	if(obj.currentStyle)
	{
		return obj.currentStyle[name]
	}
	else
	{
		return getComputedStyle(obj,false)[name]
	}
}

function getByClass(oParent,nClass)
{
	var eLe = oParent.getElementsByTagName('*');
	var aRrent  = [];
	for(var i=0; i<eLe.length; i++)
	{
		if(eLe[i].className == nClass)
		{
			aRrent.push(eLe[i]);
		}
	}
	return aRrent;
}

function startMove(obj,att,add)
{
	clearInterval(obj.timer)
	obj.timer = setInterval(function(){
	   var cutt = 0 ;
	   if(att=='opacity')
	   {
		   cutt = Math.round(parseFloat(getStyle(obj,att)));
	   }
	   else
	   {
		   cutt = Math.round(parseInt(getStyle(obj,att)));
	   }
	   var speed = (add-cutt)/4;
	   speed = speed>0?Math.ceil(speed):Math.floor(speed);
	   if(cutt==add)
	   {
		   clearInterval(obj.timer)
	   }
	   else
	   {
		   if(att=='opacity')
		   {
			   obj.style.opacity = (cutt+speed)/100;
			   obj.style.filter = 'alpha(opacity:'+(cutt+speed)+')';
		   }
		   else
		   {
			   obj.style[att] = cutt+speed+'px';
		   }
	   }
	   
	},30)
}

  window.onload = function()
  {
          $(".trw-y").css("position",'relative').css("left","25px");
          $(".trw-y").find("li").each(function(){
            var lt=$(this).find("a").find("span[name=left]").text();
           if(lt.length>4){
               $(this).find("a").find("span[name=left]").text(lt.substr(0,4)+"..");
           };
         })
         $(".trw-biali").vTicker({
                speed: 500,
                pause: 3000,
                showItems: 4,
                animation: 'fade',
                mousePause: false,
                height: 180,
                direction: 'up'
          });
	  var oDiv = document.getElementById('playBox');
	  var oPre = getByClass(oDiv,'pre')[0];
	  var oNext = getByClass(oDiv,'next')[0];
	  var oUlBig = getByClass(oDiv,'oUlplay')[0];
	  var aBigLi = oUlBig.getElementsByTagName('li');
	  var oDivSmall = getByClass(oDiv,'smalltitle')[0];
          var aLiSmall=$(".smalltitle").find("li");
	  var width=$("#playBox").innerWidth();
          var rate=width/1440;
          $("#playBox").height($("#playBox").height()*rate);
          $(".oUlplay").find("img").width(width);
	  function tab()
	  {
	     for(var i=0; i<aLiSmall.length; i++)
	     {
		    aLiSmall[i].className = '';
	     }
	     aLiSmall[now].className = 'thistitle'
	     startMove(oUlBig,'left',-(now*aBigLi[0].offsetWidth))
	  }
	  var now = 0;
	  for(var i=0; i<aLiSmall.length; i++)
	  {
		  aLiSmall[i].index = i;
		  aLiSmall[i].onclick = function()
		  {
			  now = this.index;
			  tab();
		  }
	 }
	  oPre.onclick = function()
	  {
		  now--
		  if(now ==-1)
		  {
			  now = aBigLi.length;
		  }
		   tab();
	  }
	   oNext.onclick = function()
	  {
		   now++
		  if(now ==aBigLi.length)
		  {
			  now = 0;
		  }
		  tab();
	  }
	  var timer = setInterval(oNext.onclick,5000) //滚动间隔时间设置
	  oDiv.onmouseover = function()
	  {
		  clearInterval(timer)
	  }
	   oDiv.onmouseout = function()
	  {
		  timer = setInterval(oNext.onclick,5000) //滚动间隔时间设置
	  }
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