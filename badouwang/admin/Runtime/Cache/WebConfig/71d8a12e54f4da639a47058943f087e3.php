<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>八斗网-管理后台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="__ROOT__/public/css/admin/style.css" />
	<script src="__ROOT__/public/js/jquery-min.js"></script>
       
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
	<!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->
</head>
<body >

<link href="__ROOT__/public/css/admin/houtai.css"   type="text/css"  rel="stylesheet"  />
<link rel="stylesheet" href="__ROOT__/public/css/admin/table.css" />
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
            <div class="houall">
                    <div class="houone">
                         <div class="hou-yi">
                             <ul style="margin-left:100px;">
                                 <a href="javascript:;"><li name="kt">开通管理</li></a>
                                 <a href="javascript:;"><li name="od">排序管理</li></a>
                             </ul>
                         </div>
                
                <div>
                <table style="margin-top:30px;" name="kt">
                    <tr>
                        <td width="25%">区(县)</td><td width="25%">城市</td><td width="25%">省份</td><td>开通新城市<a href="./addCity" title="添加分类"><span class="icon" style="color:gray;" >&oplus;</span></a></td>
                    </tr>
                    <?php if(is_array($citys)): foreach($citys as $key=>$city): ?><tr>
                            <td width="25%"><?php if($city.dname): echo ($city["dname"]); endif; ?></td><td width="25%"><?php echo ($city["cname"]); ?></td><td width="25%"><?php echo ($city["pname"]); ?></td> <td><span class="s_info"><a href="close?cid=<?php echo ($city["id"]); ?>" name='ccity'>关闭城市</a></span><span class="s_info"></td>
                        </tr><?php endforeach; endif; ?>

                </table>
                    <table style="margin-top:30px;display: none;width:800px;" name="order">
                    <tr>
                        <td width="100">区(县)</td><td width="100">城市</td><td width="100">省份</td><td width="150">排序值</td>
                    </tr>
                    <?php if(is_array($citys)): foreach($citys as $key=>$city): ?><tr>
                            <td id="<?php echo ($city["id"]); ?>"><?php if($city.dname): echo ($city["dname"]); endif; ?></td><td ><?php echo ($city["cname"]); ?></td><td><?php echo ($city["pname"]); ?></td> <td ><input type="text" value="<?php echo ($city["rank"]); ?>" style="width:80px;height:20px;"></td>
                        </tr><?php endforeach; endif; ?>
                     
                </table>
                    <button class="blue" style="margin-left:350px;margin-top:10px;display:none">保存排序</button>
                <?php echo ($page); ?>
            </div>
            <div class="content cycle">
                            <div id="flot-example-2" class=""></div>
                            <div id="flot-example-1" class=""></div>
                    </div>
            </div>
        </div>        
    </section>
    <div class="footinfo">
        <div style="height:80px">
		Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2
        </div>     
    </div>
    
</section>
  <script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script>
    $("a[name=ccity]").click(function(){
        if(!$(this).parent().parent().parent().find("td:first").text()){
            $(this).attr('href', $(this).attr('href')+'&type=dis');
        }
    })
    $(function(){
        $(".hou-yi").find("li:first").addClass("active").css("color","#FFF");
        $(".hou-yi").find("li").hover(function(){
            $(".hou-yi").find("li").removeClass("active").css("color","#CCC");
            $(this).addClass("active").css("color","white");
        })
        $("li[name=kt]").click(function(){
            $("table[name=kt]").css("display","block");
            $("table[name=order]").css("display","none");
        });
        $("li[name=od]").click(function(){
            $("table[name=kt]").css("display","none");
            $("table[name=order]").css("display","block");
            $("button").css("display","block");
        });
        var rank=[];
        $("table[name=order]").find("tr:not(:first)").each(function(){
            rank[$(this).find("td:first").attr('id')]=$(this).find("input").val();
        })
        $("button").click(function(){
           var nrank=[];
           $("table[name=order]").find("tr:not(:first)").each(function(){
                nrank[$(this).find("td:first").attr('id')]=$(this).find("input").val();
           }) 
           var condition='{';
           for(i in nrank){
               if(!rank[i]!==nrank[i]){
                  condition+='"'+i+'"'+":"+'"'+nrank[i]+'",';
               }
           }
           condition=condition.substr(0,condition.length-1)+"}";
           condition=eval("("+condition+")");
           $.post('',condition,function(data){
               data=eval("("+data+")");
               var type=data.code?1:2;
               $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: type,msg: data.message}});
           });
        })
       
    })
</script>
<script src="__ROOT__/public/js/js_lib/upload/jquery-uploadify.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>