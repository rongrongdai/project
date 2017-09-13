<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——报名管理</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>

<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>

<body style="margin:8px;">
<div class="per">
      <div class="per-top">
         <img src="__ROOT__/public/images/home/bmgl1.jpg" />
         <div class="set-up">报名列表</div> 
      </div>

      <div class="padd">
             <table width="100%"  name='entities'>
                <tr class="td-title">
                  <td width="12%">学生名</td>
                  <td width="20%">课程名称</td>
                  <td width="13%">课程分类</td>
                  <td width="13%">报名时间</td>
                  <td width="13%">报名截止时间</td>
                  <td width='13%'>手机</td>
                  <td width='10%'>操作</td>
                </tr>
             </table>
      </div>
      <div class="padd">
         <div class="ts-tit">共<span name="sum"></span>条记录，当前第<span name="cpage"></span>/<span name="pages">10</span>页,每页<span name='ppage'>10</span>条记录</div>
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
                 var checked=false;
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
                 function loadData(page){
                     $.get("__ROOT__/index.php/Ajax/AjaxCourse/getRegistration?page="+page,function(data){
                        var res=eval('('+data+')');
                        if(res){
                            $("span[name=sum]").text(res.sum);
                            $("span[name=pages]").text(res.pages);
                            $("span[name=cpage]").text(page);
                            $("span[name=ppage]").text(res.ppage);
                            for(i in res.entities){
                                var item='<tr name="item" id="'+(i)+'">'+
                               '<td width="10%">'+res.entities[i].uname+'</td>'+
                               '<td width="10%">'+res.entities[i].aname+'</td>';
                                item+='<td width="10%">'+res.entities[i].cid+'</td>';
                                item+='<td width="15%">'+res.entities[i].s_time+'</td>';
                                item+='<td width="15%">'+res.entities[i].e_time+'</td>';
                                 item+='<td width="10%">'+res.entities[i].telephone+'</td>';
                                 var hand=res.entities[i].status==1?"已确认":'<a href="confirm?id='+res.entities[i].id+'">确认报名</a>';
                                 item+='<td width="10%">'+hand+'</td></tr>';
                               
                                $("table[name=entities]").append($(item));
                            }
                            
                        }
                     });
                 }
                 function reload(page){
                     $("tr[name=item]").remove();
                     loadData(page);
                 }
                 $(function(){
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
                         var sum=parseInt($("span[name=pages]").text());
                         if(cpage+1>=sum){
                             page=sum;
                         }else{
                             page=cpage+1;
                         }
                         
                         reload(page);
                     })
                     $("#submit4").click(function(){
                         var sum=parseInt($("span[name=pages]").text());
                         reload(sum);
                     })
                     
                 })
</script>
</body>
</html>