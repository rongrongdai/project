<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——预约报名</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>

<body style="margin:8px;">
<div class="per">
   <div class="per-make">
      <a class="make ymk aclick" href="javasrcipt:;">邀请列表</a>
      <a class="make ymk" href="javasrcipt:;">我要邀请</a>
   </div>
   
   <div id="sinvite">
		<div  class="padd">
	      	<table width="100%">
				<tr class="td-title">
					<td width="8%">序号</td>
					<td>用户昵称</td>
					<td>邀请码</td>
					<td>使用时间</td>
				</tr>
	        <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
	        		<td><?php echo ($i+1+$limit); ?></td>
					<td><?php echo ($vo["rname"]); ?></td>
					<td><?php echo ($vo["code"]); ?></td>
					<td><?php echo (date('Y-m-d',$vo["ctime"])); ?></td>
				</tr><?php endforeach; endif; ?>               
	        </table>  
	    </div>
	    <div style="text-align:center;"><?php echo ($link); ?></div> 
   </div>

   <!-- <div id="winvite" style="display:none;">
   		<div class="padd">
   			<p>
   				<span id="invite" style="cursor:pointer;">获取邀请码：</span>
   				<input type="text" id="code" name="code" readOnly="readyOnly" style="height:25px;" />
   			</p>
			<p>
				<span>选择邀请方式：</span>
			</p>
   		</div>
   		
   </div> -->
   
</div>

<script type="text/javascript">
	$(".per-make").find("a").click(function(){
		$.post("__APP__/Ajax/AjaxUser/invite",function(data){
	 		window.top.location.href = "__APP__/User/User/register?code="+data;
	 	},'json');
	});

</script>

</body>
</html>