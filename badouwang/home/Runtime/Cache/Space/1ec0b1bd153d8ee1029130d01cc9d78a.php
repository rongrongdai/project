<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<link rel="stylesheet" href="__ROOT__/public/css/home/Space.css" />
<link type="text/css"  rel="stylesheet" href="__ROOT__/public/css/home/index.css"/>

 <div class="sp-er">

            
            <div class="sp-er-center">
                    <span class="cone">有什么新的学习窍门，来跟大家一起分享</span>
                    <form method="post" id="dataform" action="">
                    <div class="scenter-yi" id="#spred">
                        <div class="form-control" rows="5" name="content"><script type="text/javascript" charset="utf-8" src="/badouwang/thirdapi/uediter/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="/badouwang/thirdapi/uediter/ueditor.all.min.js"> </script><script type="text/javascript" charset="utf-8" src="/badouwang/thirdapi/uediter/lang/zh-cn/zh-cn.js"></script><textarea id="content" name="content"></textarea>			<script>
				var tool; 
                                tool = [['emotion']];
				var ue = UE.getEditor('content',{
					//修改编辑器的配置
					toolbars:tool,
					initialFrameWidth:$(".scenter-yi").width(),//编辑器宽度
					initialFrameHeight:58,//编辑器高度
					initialContent:"请填写分享内容...",
					elementPathEnabled : false,//是否启用元素路径
					maximumWords:150,//最大输入字数
					enableAutoSave: false,//取消自动保存
					saveInterval: 60000,
					autoHeightEnabled:false,//是否自动长高		
					autoClearinitialContent:true,//清除初始内容
					focus:false, //初始化时获取焦点
                                        wordCount:false
				});
			</script></div>  
                    </div>
                    <div class="scenter-er">
                            <div class="scenter-ery">
                                <a href="javascript:;"> <img src="__ROOT__/public/images/home/space/tup.png" /><span id="simg">图片</span><input type="file" name="simg" style="display:none"/></a>
                              
                             </div> 
                             <a href="javascript:;"><div class="scenter-erer"><span name="spred"> 发表</span> </div></a>
                             <table id="faces" style="width:400px;height:300px;border:1px solid red;z-index:100;display:none"></table>
                    </div>
                        </form>
                    <div class="scenter-san">
                        <div class="center-yi cw" > 所有动态(3)</div>
                        <div class="center-yi">我的动态(<span id="mdy"><?php echo ($ssum); ?></span>)</div>
                    
                    </div>
                    <?php if(is_array($dymics)): foreach($dymics as $key=>$dymic): ?><div class="cent-yincy">
                        <?php if($dymic["contentpic"] != '' ): ?><div class="centw-ery"><img src="__ROOT__<?php echo ($dymic["contentpic"]); ?>" /></div><?php endif; ?>
                                <div class="centw-ere">
                                   <?php echo ($dymic["content"]); ?>
                                </div>
                         
                         <div class="centw-san">
                                   <div class="centw-sy">
                                     <a href="javascript:;"><span>折叠</span><div class="sy-yi"></div></a>
                                    </div>
                                    <div class="centw-se">
                                    <span>发表于：<?php echo ($dymic["publisttime"]); ?></span>  
                                    <span><a href="#">来自:<?php if($nickname): echo ($nickname); else: echo (session('uname')); endif; ?></a></span>     
                                    <span><a href="#">转发</a></span>     
                                    <span><?php echo ($dymic["readnumber"]); ?> 人阅读</span>        
                                    <span><a href="javascript:;" name="gcomment" number="<?php echo ($key); ?>"><img src="__ROOT__/public/images/home/space/shuo.gif" /> <span name="goodnumber"><?php echo ($dymic["goodnumber"]); ?></span></a></span>        
                                    
                                    </div>                           
                         </div> 
                         
                         <?php if(true): ?><div class="centw-si" style="display:block;">
                                 <?php if(true): ?><div class="sp-er-center" style="margin-left:-10px;display:none" name="cment">
                                <div class="scenter-yi" id="#spred">
                                    <div class="form-control" rows="5" name="content"><textarea id="content<?php echo ($key); ?>" name="content<?php echo ($key); ?>"></textarea>
                                            
                                    </div>  
                                    </div>
                            </div><?php endif; ?>
                                <a href="javascript:;" name='comment' number='<?php echo ($key); ?>'><div class="centw-s-y"><p>评论</p></div></a> 
                            </div><?php endif; ?>
                    </div>
                    
                      <div class="pingren" >
                      
                           <?php if(is_array($dymic["comment"])): foreach($dymic["comment"] as $key=>$comment): ?><div class="pinnnnn">
                            <div class="pren-yi">
                            <div class="pinimg"><img src="__ROOT__/public/images/home/uimg.png"  /> :</div>
                            <?php echo ($comment[1]); ?>
                            </div> 
                            <div style="clear:both;"></div> 
                            </div><?php endforeach; endif; ?>
                           
                          
                      </div><?php endforeach; endif; ?>
            </div>
            
            
            
            
            <div class="sp-er-right">
                 <div class="righty"></div>
                 <div class="righte">
                      <div class="righte-y">
                        <span>周<?php echo ($week); ?></span>
                        <p><?php echo ($time); ?></p>
                      </div>
                      <div class="righte-y">
                       <a href="#"><p class="qdao">签到</p></a>
                      </div>
                      <div class="righte-y">
                      <span>0</span>
                      <p>Days</p>
                      </div>
                 </div>
                 
                 <div class="rightsa">
                     <p>主人很懒什么的都没写</p>
                 </div>
                 
                  <div class="rightsi">
                       <span>粉丝</span>
                       <span class="yingy"><?php echo ($user["visitednumber"]); ?></span>
                 </div>
            
                   <div class="rightsi">
                        <span>关注</span>
                        <span class="yingy"><?php echo ($user["visitnumber"]); ?></span>
                 </div>
                  
                   <div class="rightsi">
                       <span>访客</span>
                       <span class="yingy"><?php echo ($user["comstomer"]); ?></span>
                 </div>
                  
                 
                 <div class="rightwu">
                 <p>Ta关注的人（6）</p>
                 </div>
                 
                 <div class="rightliu">
                     <div class="riliu"></div>
                     <div class="riliu"></div>
                      <div class="riliu"></div>
                     <div class="riliu"></div>
                       <div class="riliu"></div>
                     <div class="riliu"></div>
                 </div>
            
            
            </div>
 
 </div>

 
 </div>

</div>

<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/jquery.form.js"></script>
<script>

$('.sleft-y').click(function(){
        $(".sleft-y").each(function(){
            var img=$(this).find("img").attr('src').replace(/(\w+)(1)\.(jpg|png)/,"$1.$3");
            $(this).find("img").attr('src',img);
        })
	$('.sleft-yi').removeClass('wod');
	$('.sleft-y').removeClass('onw');
	$(this).addClass('onw');
        var img=$(this).find("img").attr('src').replace(/(\w+)\.(jpg|png)/,"$11.$2");
	$(this).find('.sleft-yi').addClass('wod')
           $(this).find("img").attr('src',img);
	})	
	
$('.center-yi').click(function(){
		 $('.center-yi').removeClass('cw');
		   $(this).addClass('cw')
})
$(function(){
    var uid="<?php echo (session('uid')); ?>";
    $("a[name=concern]").click(function(){
       $.get("__ROOT__/index.php/Space/Space/concern",{"uid":uid},function(data){
           data=eval("("+data+")");
           if(data){
               $(".yingy").text(parseInt( $(".yingy").text())+1);
           }
           $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
       });
    })
       
    
    var ued='';
    $("a[name=comment]").click(function(){
        var tool; 
        tool = [['emotion']];
        var k=parseInt($(this).attr('number'));
        ued=UE.getEditor('content'+k,{
        //修改编辑器的配置
                                                    toolbars:tool,
                                                    initialFrameWidth:$(".scenter-yi").width(),//编辑器宽度
                                                    initialFrameHeight:58,//编辑器高度
                                                    initialContent:"请填写评论内容...",
                                                    elementPathEnabled : false,//是否启用元素路径
                                                    maximumWords:150,//最大输入字数
                                                    enableAutoSave: false,//取消自动保存
                                                    saveInterval: 60000,
                                                    autoHeightEnabled:false,//是否自动长高		
                                                    autoClearinitialContent:true,//清除初始内容
                                                    focus:false, //初始化时获取焦点
                                                    wordCount:false
        });
        $("div[name=cment]").css("display","none");
        $(this).parent().find("div[name=cment]").css("display","block");
        var content=ued.getContent();
        if(content && content!='<p>请填写评论内容...</p>'){
            $.get('__ROOT__/index.php/Space/Space/comment',{'id':k,'content':content},function(data){
                data=eval("("+data+")");
                if(data.code=='1'){
                    location.reload();
                }
                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
            });
        }
    })
    $("a[name=gcomment]").click(function(){
        var obj=$(this);
        $.get('__ROOT__/index.php/Space/Space/gcomment',{'id':$(this).attr('number')},function(data){
            data=eval('('+data+')');
            if(data.code==1){
                var gn="span[name=goodnumber"+$(obj).attr('number')+"]";
                $(obj).find("span[name=goodnumber]").text(parseInt($(obj).find("span[name=goodnumber]").text())+1);
            }
            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
        });
    })
    $("#tabHeads").find("span").hide();
    $("#simg").click(function(){
        $("input[name=simg]").click();
    });
    $("span[name=spred]").click(function(){
        if(ue.getContent() && ue.getContent()!='<p id="initContent">请填写内容...</p>'){
             var options = {
                            type:'post',
                            url:'__ROOT__/index.php/Space/Space/space',
                            success: function (data) {
                                data=eval('('+data+')');
                                
                                if(data.code==1){
                                    var comment='<div class="cent-yincy">';
                                    if(data.type==1){
                                        comment=comment+
                                        '<div class="centw-ery"><img src="__ROOT__/'+data.contentpic+'" /></div>';
                                        }
                                        comment+='<div class="centw-ere">'+
                                        data.content+
                                        '</div>'+'<div class="centw-san">'+
                                                  '<div class="centw-sy">'+
                                                   ' <a href="javascript:;"><span>展开</span><div class="sy-yi"></div></a>'+
                                                   '</div>'+
                                                  ' <div class="centw-se">'+
                                                   '<span>刚刚</span>'+
                                                   '<span><a href="#">来自:fanbo</a></span>'+    
                                                   '<span><a href="#">转发</a></span>'+     
                                                   '<span>0 人阅读</span>'+        
                                                   '<span><a href="#"><img src="__ROOT__/public/images/home/space/shuo.gif" /> 23</a></span>'+        
                                                   '<span><a href="#">评论</a></span>'+
                                                   '</div>'+                           
                                                   '</div>'+ 
                                                        '<div class="centw-si" style="display:block;">'+
                                                            '<textarea class="fcontrol"  rows="3"></textarea>'+
                                                             '<a href="#"><div class="centw-s-y"><p>评论</p></div></a> '+
                                                       '</div>'+
                                                    '</div>';
                                    
                                    $(".cent-yincy:first").before(comment);
                                    $("#mdy").text(parseInt($("#mdy").text())+1);
                                    
                                }
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: data.message}});
                            }
                        };
           $("#dataform").ajaxSubmit(options);
        }else{
            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '请输入分享内容！'}});
        }
    })
  
})	

$('.centw-sy').click(function(){
		 $('.pingren').css({display:'block'});
})
			













//父页面获取框架高度自动调整
ifram()   //运行
var he = $(document).height();
function ifram(){	$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	}) 		}
$(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高
</script>

<div style="clear:both;"><?php echo ($pages); ?></div>
</div>


</body>
</html>