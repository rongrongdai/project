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
    <div class="per-top">
        <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/xfjl.jpg" />
        <div class="set-up" >消费记录</div> 
    </div>
    <div class="per-make">
        <div class="make m-xj aclick" onclick="kms('现金',this)">现金</div>
        <div class="make m-jf" onclick="kms('经验',this)">积分</div>
        <div class="make m-xd" onclick="kms('学豆',this)">学豆</div>
        <div class="make m-xd">提现记录</div>
        <!--<div class="make m-jy" name='expirence'>经验</div>-->
    </div> 
    
   
    <div class="x-make m-xj" >
        <div class="padd" style="display:block">
            <table width="100%" name='entities'>
                <tr class="td-title">
                    <td width="5%">序号</td>
                    <td width="10%">消费类型</td>
                    <td width="15%">数量</td>
                    <td width="10%">消费详情</td>
                    <td width="10%">时间</td>
                </tr>
            </table>
        </div>
        <div name='tx' style='display:none' >
            <div class="padd1" >
                 <table width="100%"  name='entities'>
                    <tr class="td-title">
                      <td width="10%">提现人</td>
                      <td width="10%">提现数量</td>
                      <td width="15%">交易时间</td>
                      <td width="15%">提现说明</td>
                      <td width="10%">剩余数量</td>
                    </tr>
                 </table>
          </div>

          <div class="padd1">
                 <div class="ts-tit">共<span name="sum"></span>条记录，当前第<span name="cpage"></span>/<span name="pages"></span>页,每页<span name='ppage'></span>条记录</div>
                 <div class="ts-but"> 
                 <input type="button" name="submit" id="submit1" value="首页" />
                 <input type="button" name="submit" id="submit2" value="上一页" />
                 <input type="button" name="submit" id="submit3" value="下一页" />
                 <input type="button" name="submit" id="submit4" value="尾页" />  
                 </div>
          </div>
      </div>
    </div>
    

</div>

    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
    function kms(kwd,cls){
        $(".aclick").removeClass("aclick");
        $(cls).addClass("aclick");
        ajaxGetData(kwd);
        $("div[name=tx]").hide();
        $(".padd").show();
    }
    function km(page){
        var kwd = $(".aclick").text();
        ajaxGetData(kwd,page);
    }

    function ajaxGetData(kwd,page){
        $.post("__APP__/Ajax/AjaxConsume/ajaxGetData",{'kwd':kwd,'pages':page},function(data){
            var node = '<tr class="td-title"><td width="5%">序号</td><td width="10%">消费类型</td><td width="15%">数量</td><td width="10%">消费详情</td><td width="10%">时间</td></tr>';
            $("table:first").html(node);
            $(".pos").html("");
            if(data.res){
                for(var i=0;i<data.res.length;i++){
                    var num = data.limit+i+1;
                    var node = '<tr><td>'+num+'</td><td>'+data.res[i].type+'</td><td>'+data.res[i].val+'</td><td>'+data.res[i].name+'</td><td>'+data.res[i].ctime+'</td></tr>';
                    $(node).insertAfter("table:first tr:last");
                }
                $(data.page).insertAfter(".padd");
            }
        },'json');
    }
    $(function(){
         function loadData(page){
                     $.get("__ROOT__/index.php/Ajax/AjaxConsume/getClog?type=2&c=posit",function(data){
                        var res=eval('('+data+')');
                        if(res){
                            $("span[name=sum]").text(res.sum);
                            $("span[name=pages]").text(res.pages);
                            $("span[name=cpage]").text(page);
                            $("span[name=ppage]").text(res.ppage);
                            for(i in res.entities){
                                var item='<tr name="item" id="'+(i)+'">'+
                               '<td width="10%">'+"<?php echo (session('uname')); ?>"+'</td>'+
                               '<td width="10%">'+res.entities[i].count+'</td>';
                                item+='<td width="10%">'+res.entities[i].timestamp+'</td>';
                                item+='<td width="10%">'+res.entities[i].info+'</td>';
                                item+='<td width="10%">'+res.entities[i].current+'</td>';
                                $("table[name=entities]").append($(item));
                            }
                        }
                     });
                 }
                 function reload(page){
                     $("tr[name=item]").remove();
                     loadData(page);
                 }
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
                 $(".make").click(function(){
                    if($(this).text()==='提现记录'){
                        $(".padd1 tr:not(:first)").remove();
                        $('.make').removeClass("aclick");
                        $(this).addClass("aclick");
                        $("div[name=tx]").show();
                        $(".padd").hide();
                        var page=1;
                        loadData(page);
                    }
                })
    })      
</script>
</body>
</html>