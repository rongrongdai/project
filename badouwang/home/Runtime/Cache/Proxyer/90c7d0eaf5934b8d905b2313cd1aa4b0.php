<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——代理商报名管理</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<script src="__ROOT__/public/js/jquery-min.js"></script>
<style>
/*
    p {margin:0 0 10px;font-size:12px; font-family:"Myriad Pro"; color:#515151; line-height:27px;} 
    a {margin:15px;}
	*/
</style>
</head>

<body style="margin:8px;">
   
<div class="per">
      <div class="per-make">
           <div class="make ymk aclick" id="organ">培训报名</div>
           <div class="make nmk" id="teach">家教报名</div>
      </div>
     <div class="padd" name="organ" id="hiddyi" >
             <table width="100%"  name='entities'>
                <tr class="td-title">
                  <td width="10%">用户</td>
                  <td width="10%">手机号</td>
                  <td width="15%">报名时间</td>
                  <td width="15%">剩余名额</td>
                  <td width='10%'>确认报名</td>
                </tr>
             </table>
     </div>
     <div class="padd" name="teach" id="hiddyi" style="display:none" >
             <table width="100%"  name='entities'>
                <tr class="td-title">
                  <td width="10%">用户</td>
                  <td width="10%">手机号</td>
                  <td width="10%">是否支付</td>
                  <td width="15%">报名时间</td>
                  <td width="15%">课时数</td>
                  <td width='10%'>确认报名</td>
                </tr>
             </table>
     </div>
           
     <div class="padd">
         <div class="ts-tit">共<span name="sum">0</span>条记录，当前第<span name="cpage"></span>/<span name="pages">0</span>页,每页<span name='ppage'>10</span>条记录</div>
         <div class="ts-but"> 
             <input type="button" name="submit" id="submit1" value="第一页" />
             <input type="button" name="submit" id="submit2" value="上一页" />
             <input type="button" name="submit" id="submit3" value="下一页" />
             <input type="button" name="submit" id="submit4" value="最后一页" />  
         </div>
    </div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script>
                 var page=1;
                 var type=1;
                 var checked=false;
                 var url='__ROOT__/index.php/Ajax/AjaxCourse/getInclass';
                 function show(id,content){
                     var checked=$("#"+(id-1)).find("input[type=checkbox]").attr("checked");
                     if(checked){
                         $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: content}});
                     }else{
                         $.get('__ROOT__/index.php/Ajax/AjaxCourse/read?id='+id,function(data){
                            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: content}}); 
                            checked=true;
                            $("#"+(id-1)).find("input[type=checkbox]").attr("checked","true");
                         });
                         
                     }
                 }
                 function loadData(page,url,type){
                     $.get(url,function(data){
                        var res=eval('('+data+')');
                        if(res){
                            $("span[name=sum]").text(res.sum);
                            $("span[name=pages]").text(res.pages);
                            $("span[name=cpage]").text(page);
                            $("span[name=ppage]").text(res.ppage);
                            for(i in res.entities){
                                if(type===1){
                                     var item='<tr name="item" id="'+(i)+'">';
                                     var uname="<?php echo (session('uname')); ?>"; 
                                     item+='<td width="10%">'+uname+'</td>';
                                     item+='<td width="10%">'+res.entities[i].telephone+'</td>';
                                     item+='<td width="10%">'+res.entities[i].bm_timestamp+'</td>';
                                     item+='<td width="10%">'+res.entities[i].knumber+'</td>';
                                     var hand=res.entities[i].status==1?'确认报名':'已确认';
                                     item+='<td width="10%"> <a href="comfirm?id='+res.entities[i].id+'">'+hand+'</a></td></tr>';
                                     $("table[name=entities]").append($(item));
                                     
                                }else{
                                    var uname="<?php echo (session('uname')); ?>";
                                    var ispay=res.entities[i].ispay?'已支付':'未支付';
                                     var item='<tr name="item" id="'+(i)+'">'+
                                    '<td width="10%">'+uname+'</td>';
                                      item+='<td width="10%">'+res.entities[i].telephone+'</td>'+
                                             '<td width="10%" name="content">'+ispay+'</td>'+
                                             '<td width="10%">'+res.entities[i].bm_timestamp+'</td>';
                                     var hand=res.entities[i].status===1?'确认报名':'已确认';
                                     item+='<td width="10%">'+res.entities[i].number+'</td>';
                                     item+='<td width="10%"> <a href="comfirm?id='+res.entities[i].id+'">'+hand+'</a></td></tr>';
                                     $("table[name=entities]").append($(item));
                                }
                            }
                            $("td[name=content]").each(function(){
                                var text=$(this).find("p").text();
                                if(text.length>10){
                                    $(this).find("p").text(text.substr(0,10)+"...");
                                    $(this).attr('alt',text);
                                }
                            });
                        }
                     });
                 }
                 function reload(page,type){
                     $("tr[name=item]").remove();
                     loadData(page,url,type);
                 }
                 $(function(){
                     loadData(page,url+'?type=organ',1);
                     $("#submit1").click(function(){
                         reload(1,type);
                     })
                     $("#submit2").click(function(){
                         var cpage=parseInt($("span[name=cpage]").text());
                         if(cpage-1<=0){
                             page=1;
                         }else{
                             page=cpage-1;
                         }
                         
                         reload(page,type);
                     })
                     $("#submit3").click(function(){
                         var cpage=parseInt($("span[name=cpage]").text());
                         var sum=parseInt($("span[name=pages]").text());
                         if(cpage+1>=sum){
                             page=sum;
                         }else{
                             page=cpage+1;
                         }
                         reload(page,type);
                     })
                     $("#submit4").click(function(){
                         var sum=parseInt($("span[name=pages]").text());
                         reload(sum,type);
                     })
                 })
                 $(function(){
                     
                     $("a[name=spred]").click(function(){
                         $(this).attr("href",$(this).attr("href")+"?type="+type);
                     })
                     $("#organ").click(function(){
                         url="__ROOT__/index.php/Ajax/AjaxCourse/getInclass?type=organ";
                         $("#teach").removeClass("aclick");
                         $(this).addClass("aclick");
                         $("div[name=organ]").css("display","block");
                         $("div[name=teach]").css("display","none");
                         $("a[name=teach]").removeClass("active");
                         page=1;
                         type=1;
                         reload(1,1);
                     })
                     $("#teach").click(function(){
                         url="__ROOT__/index.php/Ajax/AjaxCourse/getInclass?type=teach";
                         $("#organ").removeClass("aclick");
                         $(this).addClass("aclick");
                         $("div[name=organ]").css("display","none");
                         $("div[name=teach]").css("display","block");
                         $("a[name=organ]").removeClass("active");
                         page=1;
                         type=2;
                         reload(1,2);
                     })
                 })

               

               
</script>
</body>
</html>