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
                <a href="#">切换城市</a>
                <?php if(is_array($cities)): foreach($cities as $key=>$city): ?><a href="#"><?php echo ($city["name"]); ?></a><?php endforeach; endif; ?>
                <span>]</span>
                <div class="switch">
                	<a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
                    <a href="#">珠海</a>
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



<!-----------中间的部分----------->
<div class="teac-oy">
       <div class="teac-left">
            <p><strong class="zl">张老师</strong><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/yp1.gif" class="img1"/> 银牌老师   <span class="cz">初中教学</span></p>
            <p class="pi">教龄：32年 | 性别：女 | 年龄：56岁 |  常用授课地点：宝安区，福田区，南山区都可以 </p>
            <div class="left-oy">
                <div class="oy-left">
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/gjq.gif" class="img2" />
                </div>
                <div class="oy-right">
                   <p><strong class="jq">200.00</strong>元/小时</p>
                   <p>机构价：<span class="sqx"><span>300元</span>/小时</span></p>
                   <p>已售 <span class="ysu">196</span> | 5人已评价
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/pxu/sjxpx.png" />
                   5.0分
                   </p>
                   <div class="xkel">
                      <p>试听成功率：<span>100% </span></p><p> 续课率：<span>20%</span></p>
                   </div>
                   <div class="xkel">
                      <p>累计课程时：<span>200</span> </p><p>学生人数：<span>200</span></p>
                   </div>
                   
                   
                   
                  <select id="s1_text1_kr" class="xlk">
                                <option selected="" value="0">请选择授课方式</option>
                                <option value="1">Red</option>
                                <option value="2">Blue</option>
                                <option value="3">Green</option>
                                <option value="4">Yellow</option>
                                <option value="5">Magenta</option>
                                <option value="6">Cyan</option>
                                <option value="7">White</option>
                   </select>
                   <p class="yke">向他约课</p>
                   
                </div>    
            </div>
          
       </div>
       
       
     <div class="teac-right">
            <div class="teac-riy">
              <p class="rp"><a href="javascript:"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xqy1.gif" />身份认证</a>   
              <a href="javascript:"><img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xqy2.gif" />教师资格证</a></p>
             <div class="teac-re">
               <p class="duig">√</p>
               <p class="js">教师质料认证</p>
             </div>
           </div>
           
           <div class="rsa">
             <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/wxfh.gif" />
                    <div class="deon">
                    <p class="da">HI~</p>
                    <P>扫一扫有惊喜哦</P>
                    <P>最新教育质询发布平台</P>
                    </div>
           </div>
              
          <div class="deer">
             <div class="dey">
               <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xrt1.gif" />
               <p>在线咨询</p>
             </div>
             <div class="dee">
                <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xrt2.gif" />
                <p>400-611-911</p>
             </div>
          </div>
                  
          <div class="desan">
             <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/x1r.gif" /><a href="javascript:">收藏本单</a>
             <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/x2r.gif" class="imq"/><a href="javascript:">分享到</a>
          </div>

     </div>
 

</div>
<!-----------中间的部分结束----------->

<div class="teac-cner">
    <div class="tcen-left">
         <div class="lf-y">
            <div class="lf-a oe"><a href="javascript:">基本资料</a></div>
            <div class="lf-a"><a href="javascript:">约课记录</a></div>
            <div class="lf-a"><a href="javascript:">家长评论</a></div>
         </div>
         
         <div class="lf-er"></div>
    </div>
    
    
    
    
    
    <div class="tcen-right">
         <div class="right-y">
            <table>
               <tr class="ske">
                <td colspan="7">可授课时间</td>
               </tr>
               <tr class="zr">
                 <td>周一</td>
                 <td>周二</td>
                 <td>周三</td>
                 <td>周四</td>
                 <td>周五</td>
                 <td>周六</td>
                 <td>周天</td>
               </tr>
              <tr>
                 <td>上</td>
                 <td>上</td>
                 <td>上</td>
                 <td>上</td>
                 <td>上</td>
                 <td>上</td>
                 <td>上</td>
               </tr>
               <tr>
                 <td>下</td>
                 <td>下</td>
                 <td>下</td>
                 <td>下</td>
                 <td>下</td>
                 <td><span class="gou">√</span></td>
                 <td><span class="gou">√</span></td>
               </tr>
               <tr>
                 <td>晚</td>
                 <td><span class="gou">√</span></td>
                 <td><span class="gou">√</span></td>
                 <td>晚</td>
                 <td>晚</td>
                 <td><span class="gou">√</span></td>
                 <td><span class="gou">√</span></td>
               </tr>
            </table>
         </div>
         
         <div class="right-e">
           <p class="right-ep">授课地点</p>
           <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/dtu.gif" class="imt" />
         </div>
         
         <div class="right-s">
           <p class="right-ep">四大保障</p>
           <div class="ri-di">
             <div class="rie-di">
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jjy1.gif" />
                 <p>真实</p>
             </div>
             
             <div class="rie-di">
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jjy2.gif" />
                 <p>安全</p>
             </div>
             
              <div class="rie-di">
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jjy3.gif" />
                 <p>保密</p>
             </div>
             
              <div class="rie-di">
                 <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jjy4.gif" />
                 <p>专业</p>
             </div>
             
           </div> 
            
         </div>
         
    </div>
</div>

<script>
   $('.lf-a').click(function(){	
    $('.lf-a').removeClass('oe');
	$(this).addClass('oe');
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