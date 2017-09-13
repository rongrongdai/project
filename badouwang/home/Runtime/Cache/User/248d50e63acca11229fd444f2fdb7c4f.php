<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——站内消息</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body style="margin:8px;">

<div class="per">
            <div class="per-make">
               <div class="make ymk <?php if(!$type): ?>aclick<?php endif; ?>" style="border-right:none">系统消息</div>
               <div class="make nmk <?php if($type): ?>aclick<?php endif; ?>" style="border-right:none;">家教咨询</div>
               <div class="make mmk <?php if($type): ?>aclick<?php endif; ?>">培训咨询</div>
            </div>

     <div class="padd">
             <table name="messages" width="100%">
                <tr class="td-title">
                  
                  <td width="10%">消息类型</td>
                  <td width="15%">发送时间时间</td>
                  <td width="15%">发送人</td>
                  <td width="15%">标题</td>
                  <td width="15%">已读</td>
                  <td width="10%">操作</td>
                </tr>
                <tr name='item' style='display:none;'>
                  <td name="type" content=""></td>
                  <td name="time" content=""></td>
                  <td name="sender" content=""></td>
                  <td name="title" content=""></td>
                  <td name="isread" content=""><a href="#"><input type="checkbox" /></a></td>
                  <td name="show"><a href="#"> [查看]</a></td>
                </tr>
             </table>
             
      </div>
           
     <div class="padd">
         <div class="ts-tit"> 共<span name="sum"></span>条记录，当前第<span name="cpage"></span>/<span name="ppage">10</span>页,每页<span name='ppage'>10</span>条记录</div>
             <div class="ts-but"> 
             <input type="button" name="submit" id="submit1" value="第一页" />
             <input type="button" name="submit" id="submit2" value="上一页" />
             <input type="button" name="submit" id="submit3" value="下一页" />
             <input type="button" name="submit" id="submit4" value="最后一页" />  
             </div>
         </div>
    </div>
</div>
    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
                 var page=1;
                 var checked=false;
                 function show(id,content){
                     var checked=$("#"+(id-1)).find("input[type=checkbox]").attr("checked");
                     if(checked){
                         $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: content}});
                     }else{
                         $.get('__ROOT__/index.php/Ajax/AjaxMessage/read?id='+id,function(data){
                            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: content}}); 
                            checked=true;
                            $("#"+(id-1)).find("input[type=checkbox]").attr("checked","true");
                         });
                         
                     }
                 }
                 function loadData(page,type){
                     var url="__ROOT__/index.php/Ajax/AjaxMessage/getMessages?page="+page;
                     if(type){
                        url+='&type='+type; 
                     }
                     $.get(url,function(data){
                        var res=eval('('+data+')');
                        if(res){
                            $("span[name=sum]").text(res.sum);
                            $("span[name=cpage]").text(res.pages);
                            var npage=res.pages>0?res.pages:1;
                            $("span[name=ppage]").text(npage);
                            for(i in res.messages){
                                var item='<tr name="item" id="'+(res.messages[i].id)+'"><td name="type">'+res.messages[i].type+'</td><td name="time" >'+res.messages[i].ctime+'</td>';
                                item+='<td name="sender" content="">'+res.messages[i].uname+'</td>';
                                item+='<td name="title" content="">'+res.messages[i].title+'</td>';
                                checked=res.messages[i].is_read?'checked':'';
                                item+='<td name="isread" content=""><input type="checkbox" '+checked+'/></a></td>';
                                item+='<td name="show"><a href="javacript:;" onclick=show('+res.messages[i].id+',"'+res.messages[i].body+'")> [查看]</a>';
                                if(type){
                                    item+='<a href="javacript:;" name="resp"> [回复]</a>';
                                }
                                item+='</td></tr>';
                                $("table[name=messages]").append($(item));
                            }
                            $("a[name=resp]").click(function(){
                                var id=$(this).parent().parent().attr("id");
                            });
                        }
                     });
                 }
                 function reload(page,type){
                     $("tr[name=item]").remove();
                     loadData(page,type);
                 }
                 $(function(){
                     var tag="<?php echo ($tag); ?>";
                     $(".nmk").click(function(){
                         $(".make").removeClass("aclick");
                         $(this).addClass("aclick");
                         reload(1,'3');
                     });
                      $(".ymk").click(function(){
                         $(".make").removeClass("aclick");
                         $(this).addClass("aclick");
                         reload(1);
                     });
                     $(".mmk").click(function(){
                         $(".make").removeClass("aclick");
                         $(this).addClass("aclick");
                         reload(1,'2');
                     })
                     switch(tag){
                         case 'tmess':
                             $(".nmk").click();
                             break;
                             case 'smess':
                                 $(".ymk").click();
                             break;
                             case 'cmess':
                               $(".mmk").click();
                             break;
                     }
                     loadData(page);
                     $("#submit1").click(function(){
                         reload(1);
                     })
                     $("#submit2").click(function(){
                         var cpage=parseInt($("span[name=cpage]").text());
                         if(cpage-1<=0){
                             page=1;
                         }else{
                             page=cpage-1;
                         }
                         reload(page);
                     })
                     $("#submit3").click(function(){
                         var cpage=parseInt($("span[name=cpage]").text());
                         var sum=parseInt($("span[name=ppage]").text().substr(0,($("span[name=ppage]").text().length/2)));
                         if(cpage+1>=sum){
                             page=sum;
                         }else{
                             page=cpage+1;
                         }
                         reload(page);
                     })
                     $("#submit4").click(function(){
                         var sum=parseInt($("span[name=ppage]").text().substr(0,($("span[name=ppage]").text().length/2)));
                         reload(sum);
                     })
                     
                 })
                

</script>
</body>
</html>