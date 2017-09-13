<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——预约报名</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<script src="__ROOT__/public/css/js/jquery-min.js"></script>
</head>

<body style="margin:8px;">
<div class="per">
   <div class="per-make">
      <div class="make ymk aclick">预约学生</div>
   </div>
   
   <div  class="padd">
      <table width="100%">
			<tr class="td-title">
			<td width="5%">序号</td>
			<td width="12%">学生姓名</td>
			<td width="12%">联系电话</td>
			<td width="12%">QQ号码</td>
			<td width="30%">报名课程</td>
			<td width="25%">报名时间</td>
			</tr>
        <?php if(is_array($student)): foreach($student as $i=>$vo): ?><tr>
        		<td><?php echo ($i+1+$limit); ?></td> 
				<td><?php echo ($vo["stu_name"]); ?></td>
				<td><?php echo ($vo["telephone"]); ?></td>
				<td><?php echo ($vo["qq"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo (date('Y-m-d H:i:s',$vo["bm_timestamp"])); ?></td>
			</tr><?php endforeach; endif; ?>               
        </table>  
    </div>
    <div style="text-align:center;"><?php echo ($link); ?></div> 
</div>


</body>
</html>