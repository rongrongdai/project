<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——首页</title>
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/common.css"/>
<link href="__ROOT__/public/images/home/2.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" href="__ROOT__/public/css/home/Individualcenter.css" />

<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body>
<div class="indexone">

    <div class="indexone-y"> 
        <?php if($_SESSION['uname']!= ''): ?><a href='__APP__/Space/Space/space'> <img src='__ROOT__/public/images/home/kj.png' class="kjming"/>空间</a>
            <span class="wensi"><span></span><a href="__APP__/User/User/ucenter"><?php echo (session('uname')); ?></a></span>

	    <a href="__APP__/User/User/logout">退出</a>
         <?php else: ?>	
	    <span class="wensi"><a href="__APP__/User/User/login">亲，请先登录</a></span>
	    <a href="__APP__/User/User/register">注册</a><?php endif; ?>
      <p class="in-banzx"> <a href="#">代理招商</a>
       <a href="__APP__/Index/Index/helpcenter">帮助中心</a></p>
    </div>  
</div>

<div class="indextwo">
       <div class="indextwo-y"> 
            <img src="__ROOT__/public/images/home/logoin.png" class="mgimg"/>
     
       <div class="indextwo-e">
           <p> <span id='city'>深圳市</span> <a href="#" class="mgseny"><img src="__ROOT__/public/images/home/xiaosanjiao.png" /></a></p>
       </div>
           
       <div class="indextwo-s">
            <input type="text" id="indexte" name="keyword" value="" placeholder="英语一对一"/>
            <div class="indextwo-syi" onclick="search()">
            <a href="javascript:;"> <img src="__ROOT__/public/images/home/sousuo.png" /></a>
            </div>
       </div>
       
       
       <div class="indextwo-si">
            <ul>
             <a href="__APP__/Index/Index/index" class="select"><li>首页</li></a>
             <a href="__APP__/Teach/Teach/index"><li>家教</li></a>
             <a href="__APP__/Organ/Organ/"><li>培训</li></a>
             <a  href="__APP__/Exam/Exam/index"><li>在线考试</li></a>
             <a href="#"><li class="idebud"><img src="__ROOT__/public/images/home/xinxy.png" /><img class="mgyi" src="__ROOT__/public/images/home/yuan.png" /><span>1</span></li></a>
            </ul> 
       </div>  
</div>



       <div class="indxdisy" style="display:none;">
            <p class="intjine" id="teach">家教  <a href="javascript:" class="in-ged">更多</a></p>
            <p class="intjine" id="course">培训  <a href="javascript:" class="in-ged">更多</a></p>
            <p class="intjine" id="user">用户  <a href="javascript:" class="in-ged">更多</a></p>
            <p class="intjine" id="question">学问  <a href="javascript:" class="in-ged">更多</a></p>

         </div>   


  </div>
    <script>
        $(function(){
        var leftv=$("input[name=keyword]").position().left;
        $(".indxdisy").css("left",leftv);
        $("input[name=keyword]").keydown(function(){
            $(".indxdisy").hide();
        });
        $("input[name=keyword]").blur(function(){
            $(".indxdisy").hide();
        })
        $("input[name=keyword]").keyup(function(){
            var ctl='<div class="intjin-e">'+
                '<div class="e-yi">'+
                '<img src="__ROOT__/#img"/>'+
                '</div>'+
                '<div class="e-er">'+
                '<p>#title</p>'+
                '<sapn>#detail</sapn>'+
                '</div>'+
              '</div>';
            var ct2=' <p class="intjin-s">#qes  <span>#number回答</span></p>';
            var ct3='<div class="intjin-e">#nores</div>';
            var ct5='<div class="intjin-s">#nores</div>';
            var ct4=' <p class="intjin-s">#contnt<span>#number 回答</span></p>';
            function appendc(com,res){
                for(var i in com){
                            var img=com[i]['img']?com[i]['img']:"/public/images/home/n_pic.png";
                            ctl=ctl.replace("#img",img);
                            ctl=ctl.replace("#title",com[i].title);
                            ctl=ctl.replace("#detail",com[i].detail);
                            $("#"+res).after($(ctl));
                }
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
                        ct2=ct2.replace("#qes",content);
                        var sum=res[2][0]['sum']>0?res[2][0]['sum']:0;
                        ct2=ct2.replace("#number",sum);
                        $("#question").after(ct2);
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
     


    <style>
.body{margin:0;}
.pwid{width:1200px;margin:0 auto;}
.pwid .hotnav{height:30px;line-height:30px;border-bottom:2px solid #009170;color:#333;font-size:14px;}
.hotnav a{
    color:#333;
}
.p---------------------p{}
.pwid .tion{}
.pwid .tion .content{overflow:hidden;}
.pwid .tion .content .tcona{margin:15px 0 0 0;overflow:hidden;}
.pwid .tion .content .tcona .conteta{float:left;width:500px;}
.pwid .tion .content .way{float:left;color:#111;font-weight:normal;line-height:27px;}
.pwid .tion .content .pui{float:left; font-style:normal;}
.pwid .tion .content a{float:left;padding:6px 10px;font-size:13px;color:#111; text-decoration:none;}
.pwid .tion .content .all{background:#009170;color:#FFF;}
.pwid .tion .content .non{display:none;margin-left:80px;}


.pwid .cent {padding:15px 0;overflow:hidden;}
.pwid .cent .con{float:left;width:205px;height:180px;padding:10px;border:1px solid #999;border-radius:6px;margin:0 6px; background:#F9F9F9;}
.pwid .cent .con .wtitle {width:205px;height:16px;overflow:hidden;margin-bottom:8px;color:#333;font-size:14px;}
.pwid .cent .con .wimg   {width:205px;height:110px;overflow:hidden;}
.pwid .cent .con .wlin   {overflow:hidden;padding-top:15px;}
.pwid .cent .con .wlin span{color:#999;font-size:13px;}
.pwid .cent .con .wlin a{float:right;background:#DAF4FE;border:1px solid #aaa;border-radius:3px;padding:4px 8px;color:#009170;text-decoration:none;}
.pwid .cent .con .wlin a:hover{color:#093;background:#AAF4FE;}

.p---------------------p{}
.pwid .list{}
.pwid .list .sous{padding:15px 10px 15px 0; font-family:"微软雅黑";border-bottom:1px solid #ddd;}
.pwid .list .sous .sz{color:#F03;}
.pwid .list .sous .jg{float:right;}
.pwid .list .sous .jg img{float:right;}
.pwid .list .tent {padding:15px 0;border-bottom:1px dashed #ddd;overflow:hidden;}
.pwid .list .tent .tentimg{float:left;padding-right:10px;}
.pwid .list .tent .ent{float:left;width:640px;}
.pwid .list .tent .ent .contitle{font-size:20px;font-weight:bold;}
.pwid .list .tent .ent .content{color:#555;font-size:12px;line-height:20px;}
.pwid .list .tent .ent .time{color:#555;font-size:12px;}
.pwid .list .tent .right{float:right;}
.pwid .list .tent .right .xs{color:#F03;font-size:20px; text-align:center;padding:5px 0;}
.pwid .list .tent .right .xx{padding:6px 10px;background:#009170;color:#FFF;}
.pwid .list .tent .right .rd{color:#555;font-size:14px; text-align:center;padding:5px 0;}

</style>
<div class="pwid">
    <div class="hotnav">当前位置： <a href="__ROOT__"/>首页</a> > 优惠劵列表页</div>
	<div class="tion">
		<!----------------------------------------分类1------------------------------------------->
            <div class="content">
            	<div class="tcona">
                	<b class="way">所有分类:<a style="float:none" href="#" class="all">不限</a></b>
                    <div class="conteta">
                        <?php if(is_array($classes)): foreach($classes as $key=>$class): ?><a href="?id=<?php echo ($class["id"]); ?>"><?php echo ($class["name"]); ?></a><?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
		<!----------------------------------------分类1------------------------------------------->
    </div>
    <!------------------------------------>
    <div class="list" style="margin-top:80px;">
    	<!--<div class="sous">搜索到<span class="sz">216</span>个相差家教<span class="jg">价格:<img id="jgimg" src="#" width="20" height="20"></span></div>-->
        <!------------------------------>
        <div class="cent">
            <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><div class="con">
                    <div class="wtitle"><?php echo ($course["cname"]); ?></div>
                    <div class="wimg"><img src="__ROOT__<?php echo ($course["timg"]); ?>" width="205" height="110" /></div>
                    <div class="wlin"><span>还剩<?php if($course["blnumber"] > 0): echo ($course["blnumber"]); else: ?>0<?php endif; ?>张</span><a href="__ROOT__/index.php/Organ/Organ/odetail?id=<?php echo ($course["id"]); ?>">立即领取</a></div>
                </div><?php endforeach; endif; ?>
        </div>
       <!------------------------------>
    </div>
</div>



<script src="__ROOT__/public/js/home/jq.js"></script>
<script>
$('.content a').click(function(){
	$('.' + $(this).parents('div.content').attr('class').replace(/content /,'') + ' a').removeClass('all');	
	$(this).addClass('all');
	})
//$('.moer').click(function(){ $('.non.' + $(this).attr('class').replace(/moer /,'').replace(/ all/,'')).slideToggle();		})
</script>

 <!--尾部-->    
 <!--   <div class="weibu">
        <p class="Ceigt-yi">关于八斗|用户协议|人才招聘|商务合作|招商加盟|帮助中心</p>
        <p class="Ceigt-er">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2</p>
        <p class="Ceigt-sa">服务热线：0755-29494667 QQ:397595720 邮箱：kefu@bsxkj.com</p>
    </div>
</div>-->

<div class="tailall">
        <div class="taily">
           <ul>
             <li><a href="__ROOT__/index.php/Index/Index/about">关于八斗</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/renc">人才招聘</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/busition">商务合作</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/cmer">招商加盟</a></li>
             <li><a href="__ROOT__/index.php/User/User/">用户中心</a></li>
             <li><a href="__ROOT__/index.php/Index/Index/help">帮助中心</a></li>
           </ul>
        </div>
       
       <div  class="tailer">
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">学生</a></p>
              <p><a href="javascript:" class="tai-w">教找培训</a></p>
              <p><a href="javascript:" class="tai-w">模拟考试</a></p>
              <p><a href="javascript:" class="tai-w">学问答疑</a></p>   
            </div>
           
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">教师</a></p>
              <p><a href="javascript:" class="tai-w">在线信息</a></p>
              <p><a href="javascript:" class="tai-w">人气排行</a></p>
              <p><a href="javascript:" class="tai-w">学吧互动</a></p>
            </div>
           
           <div class="tailery">
              <div class="taileryua"></div>
              <p><a href="javascript:">学校机构</a></p>
              <p><a href="javascript:" class="tai-w">合作招生</a></p>
              <p><a href="javascript:" class="tai-w">活动策划</a></p>
              <p><a href="javascript:" class="tai-w">广告推广</a></p>
            </div>
           
          
       </div>
       
       
       
        <div class="tailsan">
            
             <p>服务热线：0755-29494667     <span class="hezs">QQ:397595720</span>     <span class="hezs2"> 邮箱：kefu@bsxkj.com</span></p>
             <p class="baixx">Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 </p>
             <p class="baixs">All Rights Reserved 粤ICP备13084511号-2</p>
        </div>
     
      
       
   </div>
 <script>
     //js设置cookie
    function setCookie(c_name,value,expiredays)
    {
        var exdate=new Date()
        exdate.setDate(exdate.getDate()+expiredays)
        document.cookie=c_name+ "=" +escape(value)+
        ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
    }
    //js获取cookies
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=");
            if (c_start!=-1)
              { 
                c_start=c_start + c_name.length+1;
                c_end=document.cookie.indexOf(";",c_start);
                if (c_end==-1) c_end=document.cookie.length;
                   return unescape(document.cookie.substring(c_start,c_end));
                } 
        }
        return "";
    }
    if(!getCookie("city")){
        $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/getl','',function(data){
        if(data.code===1 && data.city.city){
                setCookie('city',data.city.city);
                $("#city").text(data.city.city);
            }
        })
    }else{
        $("#city").text(getCookie("city"));
    }
    
    
 </script>
</body>

</html>