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
      <div class="make ymk aclick">收藏的试卷</div>
   </div>
            
   <div class="padd">

                   <table width="100%">
				        <tr class="td-title">
				        <td width="5%">序号</td>
					    <td width="28%">试卷名称</td>
					    <td width="12%">需要学豆</td>
					    <td width="8%">操作</td>
					   </tr>
                       
 					<?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr> 
					    <td><?php echo ($i+1+$limit); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["ispay"]); ?></td>
						<td><a href="./detail?id=<?php echo ($vo["aid"]); ?>" target="blank">查看</a></td>
					  </tr><?php endforeach; endif; ?>  
                   </table> 

    </div>
    <div style="text-align:center;"><?php echo ($link); ?></div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
</body>
</html>