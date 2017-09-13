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
     


<link rel="stylesheet" href="__ROOT__/public/css/home/tListpage.css" />

<!--培训列表页内容-->
<div class="Lpage-one">
       <!--<div class="Lpone-yi">-->
           <div class="Lpyi-one">
              <div class="Lpyi-yi"><p>当前位置 :<a href="#"> 培训 </a>> <a href="#">列表页</a></p></div>
              <div class="Lpyi-er">
              <table>
                <tr name='km'>
                  <td><a href="javascript:;"><img src="__ROOT__/public/images/home/pxu/jtou.gif" class="tup" /><p class="kmu">科目</p></a></td>
                  <td><a href="javascript:;"><p class="buxin">不限</p></a></td>
                <?php if(is_array($hotclasses)): foreach($hotclasses as $key=>$class): if($key < 6): ?><td><a href="javascript:;"><p><?php echo ($class["name"]); ?></p></a></td><?php endif; endforeach; endif; ?>
                  <td><a href="javascript:;" name='kopen'><p>展开<img src="__ROOT__/public/images/home/pxu/sd.gif" /></p></a></td>
                </tr>
                 
               <tr name='zone' >
                  <td><a href="javascript:;"><img src="__ROOT__/public/images/home/pxu/jtou.gif" class="tup" /><p class="kmu">地区</p></a></td>
                  <td><a href="javascript:;"><p class="buxin">不限</p></a></td>
                  <?php if(is_array($hot)): foreach($hot as $key=>$city): ?><td><a href="javascript:;"><p><?php if($city["dname"] != ''): echo ($city["dname"]); else: echo ($city["cname"]); endif; ?></p></a></td><?php endforeach; endif; ?>
                  <td><a href="javascript:;" name='zopen'><p>展开<img src="__ROOT__/public/images/home/pxu/sd.gif" /></p></a></td>
                </tr>
                <tr name='price' style='display:none'>
                  <td><a href="javascript:;"><img src="__ROOT__/public/images/home/pxu/jtou.gif" class="tup" /><p class="kmu">价格</p></a></td>
                  <td><a href="javascript:;"><p class="buxin">不限</p></a></td>
                  <td><a href="javascript:;"><p>1000 已下<p></a></td>
                  <td><a href="javascript:;"><p>1000 ~ 3000<p></a></td>
                  <td><a href="javascript:;"><p>3000 ~ 5000<p></a></td>
                  <td><a href="javascript:;"><p>5000 ~ 10000<p></a></td>
                  <td><a href="javascript:;"><p>10000 以上<p></a></td>
                </tr>
              
              </table>
              </div>            
           </div>
           
         <div class="Lpyi-two">
             <div class="Lpyi-tsan"><p>搜索条件 > 科目：<span name="kemu"></span> 地区：<span name="zone"></span > <span id="price" style="display:none">价格：<span name="price"></span></span></p></div>
             <div class="Lpyi-tsi"><p>搜索</p></div>
             <div class="Lpyi-tyi"><p style='cursor:pointer;' name='adv'>高级选项</p></div>
             <div class="Lpyi-ter"><p style='cursor: pointer;' name="reset">重新筛选</p></div>
       </div>
         
         
          <!--展开-->
         <div class="zhankaiyi"  style="display:none;">
            <?php if(is_array($classes)): foreach($classes as $key=>$class): ?><div class="z-al">
               <div class="z-yi"><p><?php echo ($key); ?></p></div>
               <div class="z-er">
                  <ul>
                      <?php if(is_array($class)): foreach($class as $key=>$cla): $len=count($cla[classes]); ?>
                          <li><?php echo ($cla["name"]); if($len > 1): ?><img src="__ROOT__/public/images/home/pxu/sd.gif" name='morec'/><?php endif; ?></li><?php endforeach; endif; ?>
                </ul>
               </div>
             </div>
                <div style="clear:both;"></div><?php endforeach; endif; ?>
             
             
            <div class="tiaoy" style='display:none'>
               <div class="z-alu">
                  <ul>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                </ul>
             </div>
            <div class="z-alu">
                  <ul>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                  <li>九江</li>
                   <li>九江</li>
                  <li>九江</li>
                </ul> 
             </div>
             
             
            </div>

         </div>
          
         
          <div class="zhankai" style="display:none;">
              <?php if(is_array($citys)): foreach($citys as $key=>$city): ?><div class="z-al">
               <div class="z-yi"><p><?php echo ($key); ?>省</p></div>
               <div class="z-er">
                  <ul>
                      <?php if(is_array($city)): foreach($city as $k=>$cit): ?><li><?php echo ($k); if($len > 1): ?><img src="__ROOT__/public/images/home/pxu/sd.gif" /><?php endif; ?></li><?php endforeach; endif; ?>
                </ul>
               </div>
               <div style="clear:both"></div>
             </div><?php endforeach; endif; ?>
        </div>
        
         <!--结束-->
         <div class="Lpyi-there">
     
                   <div class="Lpyi-hqr"><p>搜索到<span>16</span>个相关课程</p></div>
 

            
            <!--隐藏-->
            <div class="Lpyi-ther" name="spreds">
              <?php if(is_array($datas)): foreach($datas as $key=>$data): ?><div class="Lp-xqy" name="kc">
                  <div class="Lp-xqyi"><img src="__ROOT__/public/images/home/pxu/laos.gif" /></div>
                  <div class="Lp-xqer">
                  <p><?php echo ($data["aname"]); ?></p>
                  <p>发布者：<span>旗舰文化</span>    评价<img src="__ROOT__/public/images/home/pxu/sjxpx.png" /><img src="__ROOT__/public/images/home/pxu/sjxpx.png" /><img src="__ROOT__/public/images/home/pxu/sjxpx.png" /><img src="__ROOT__/public/images/home/pxu/sjxpx.png" /><img src="__ROOT__/public/images/home/pxu/sjxpx.png" /></p>
                    

                     <span>
                    课程简介：司法考试复习时间的总体安排间的总体安排间的总体安排间的总体安排体安
                    排间的总体安排间的总体安排排间的总体安排间的总体安排
                    </span>
                   <p><span>地址：深圳龙华富士康  时间：周末  招生人数：50<span></p>
                    </div>
                   <div class="Lp-xqsan">
                   <p>立即预约</p>
                   </div>
                   
                   <div class="jgnew">
                     <p>价格：9163</p>
                   </div>
                   
                   <img src="__ROOT__/public/images/home/pxu/lbyjp.png" class="yrzhe" />
                    

                 
               </div><?php endforeach; endif; ?>
              
            
              
             <div class="baocts" style="display:none;">
                    <img src="__ROOT__/public/images/home/pxu/baoc.png" /><p>抱歉！没有找到符合条件的培训课程</p>
             </div>
              
              
             <div class="Lpyi-thsan"><p name="more" style="cursor:pointer;">加载更多</p></div>
             </div>
         </div>
     </div>
       
       

  <!--推荐机构-->
       <div class="Lpone-er">
           <div class="Lpreyi"><p>&nbsp;推荐机构</p></div>
           <div class="Lpreer">
               <?php if(is_array($adv_organs)): foreach($adv_organs as $key=>$organ): ?><div class="jg-yi">
              <img src="__ROOT__/public/images/home/pxu/gg1.gif" />
              <p><?php echo ($organ["real_name"]); ?></p>
              <p class="yishe"><?php echo ($organ["info"]); ?></p>
              </div><?php endforeach; endif; ?>
             
             
           
           </div>
       </div>
       
       
</div>
</div>
<!--关注学校-->
        <div class="Lpage-two">
            <div class="Lp-twg"><p class="yesheng"></p><p class="guanzhu">最受关注的学校</p></div>
           <div class="Lp-twer">
                  <div class="schooly"><img src="__ROOT__/public/images/home/index/s1.png" /></div>
                  <div class="schoolyi"><img src="__ROOT__/public/images/home/index/s2.png" /></div>
                  <div class="schoolyi"><img src="__ROOT__/public/images/home/index/s3.png" /></div>
                  <div class="schoolyi"><img src="__ROOT__/public/images/home/index/s4.png" /></div>
                  <div class="schoolyi"><img src="__ROOT__/public/images/home/index/s5.png" /></div>
                  <div class="schoolyi"><img src="__ROOT__/public/images/home/index/s3.png" /></div>
          </div>
        </div>
        
        
<script>
    $(function(){
        var page=1;
        var type='<?php echo ($type); ?>';
        $("p[name=more]").click(function(){
             page++;
            var loadi = layer.load('数据加载中…');
            $.getJSON('__ROOT__/index.php/Ajax/AjaxCourse/getMoreCourse',{'type':type,'page':page},function(data){
                layer.close(loadi)
                if(data.datas.length){
                  for(i in data.datas){
                        var res='<div class="Lp-xqy">'+
                        '<div class="Lp-xqyi"><img src="__ROOT__/public/images/home/pxu/laos.gif" /></div>'+
                         '<div class="Lp-xqer">'+
                           '<p>'+data.datas[i].aname+'</p>'+
                           '<span>'+
                           data.datas[i].desp+
                          ' </span>'+
                           '</div>'+
                          '<div class="Lp-xqsan"><p>立即预约</p></div>'+
                          '<div class="Lp-xqsi" style="display:block;"><div class="ckan"><p>查看详情</p></div></div>'+
                      '</div>';
                      $("div[name=spreds]").append($(res));
                    }  
                }else{
                    $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '数据已加载完毕！'}});
                }
            });
        })
      $("div[name=price]","div[name=price]","div[name=price]","div[name=price]").click(function(){
          
      })
      $("p[name=adv]").click(function(){
          if($("tr[name=price]").css("display")==='none'){
              $("tr[name=price]").show();
          }else{
              $("tr[name=price]").hide();
              $("#price").hide();
          }
      }) 
      $("p[name=reset]").click(function(){
          $("span[name=kemu]").text("");
          $("span[name=price]").text("");
          $("span[name=zone]").text("");
          
          $("tr[name=km],tr[name=zone],tr[name=price]").find("p").removeClass("buxin");
          $("tr[name=km],tr[name=zone],tr[name=price]").find("td:first").next("td").find("p").addClass('buxin');
      })
      $("tr[name=km],tr[name=zone],tr[name=price]").find("a").click(function(){
          console.log("gg");
          if($(this).find("p").text()!=='科目'&& $(this).find("p").text()!=='地区'&& $(this).find("p").text()!=='价格' && $(this).find("p").text()!=='展开'){
                $(this).parent().parent().find("p").removeClass("buxin");
                $(this).find("p").addClass("buxin");
                if($(this).parent().parent().attr("name")==='km'){
                    $("span[name=kemu]").text($(this).parent().find("p").text());
                }else if($(this).parent().parent().attr("name")==='zone'){
                    $("span[name=zone]").text($(this).parent().find("p").text());
                }else if($(this).parent().parent().attr("name")==='price'){
                    $("#price").css("display","inline");
                    $("span[name=price]").text($(this).parent().find("p").text());
                }
          }
      });
     
      $("a[name=zopen]").click(function(){
           $(".zhankaiyi").css("display","none");
          if($(".zhankai").css("display")==="block"){
              $(".zhankai").css("display","none");
          }else{
              $(".zhankai").css("display","block");
          }
      })
      $("a[name=kopen]").click(function(){
           $(".zhankai").css("display","none");
          if($(".zhankaiyi").css("display")==="block"){
              $(".zhankaiyi").css("display","none");
          }else{
             $(".zhankaiyi").css("display","block"); 
          }
      })
     if(!$("div[name=kc]").size()){
         $(".baocts").show();
         $("p[name=more]").parent().hide();
         $(".Lpyi-ther").height('500px');
     }
     $(".Lpyi-thyi").find("div").click(function(){
         var url=location.href;
         if(url.indexOf('&')>0){
             url=location.href.substr(0,location.href.indexOf("&")); 
             location.href=url+"&ctype="+$(this).find("p").attr('name');
         }else{
             if(url.indexOf('?')){
                 location.href=url+"&ctype="+$(this).find("p").attr('name');
             }else{
                 location.href=url+"?ctype="+$(this).find("p").attr('name');
             }
             
         }
     });
     //更多下拉框
     $("img[name=morec]").click(function(){
         
     });
     //搜索
     $(".Lpyi-tsi").find("p").click(function(){
         var km=$("span[name=kemu]").text();
         var ct=$("span[name=zone]").text();
         var price=$("span[name=price]").text();
         var url=location.href;
         if(url.indexOf('&')>0){
             url=url.substr(0,url.indexOf('&'));
         }
         if(km && km!=='不限'){
             url=url.substr(0,url.indexOf("=")+1)+km;
         }
         if(ct){
             url+='&ct='+ct;
         }
         if(price){
             url+='&price='+price;
         }
         location.href=url;
     });
    })
</script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>

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