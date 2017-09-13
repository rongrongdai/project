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
      <div class="make ymk aclick">发布管理</div>
   </div>
            
   <div class="padd">
        <table width="100%">
			<tr class="td-title">
			<td width="6%">序号</td>
			<td width="25%">标题</td>
			<td width="10%">科目</td>
      <td width="15%">图片</td>
			<td width="10%">上课时间</td>
			<td width="10%">价格</td>
			<td width="15%">发布时间</td>
			<td width="15%">操作</td>
			</tr>  
         <?php if(is_array($ress)): foreach($ress as $i=>$res): ?><tr>
	         <td><?php echo ($i+1+$limit); ?></td>
	         <td><?php echo ($res["title"]); ?></td>
	         <td><?php echo ($res["name"]); ?></td>
             <td><img src="__ROOT__<?php echo ($res["c_img"]); ?>" width="80px" height="30px"></td>
	         <td><?php echo ($res["dtime"]); ?></td>
	         <td><?php echo ($res["price"]); ?></td>
	         <td><?php echo (date("Y-m-d",$res["atime"])); ?></td>
	         <td><a href="javascript:mod(<?php echo ($res["id"]); ?>);">编辑</a>--<a href="javascript:del(<?php echo ($res["id"]); ?>)">删除</a></td>
             </tr><?php endforeach; endif; ?>	
      </table>
   </div>
   <div style="text-align:center;"><?php echo ($link); ?></div> 
</div>

<script src="__ROOT__/public/js/home/common.js"></script>
<script>
    function mod(id){
        if(confirm('您确认要重新编辑吗？')){
            window.location.href="__URL__/mod?id="+id;
        }
    }
    function del(id){
        if(confirm('您确认要删除吗？删除后不可恢复哦')){
            window.location.href="__URL__/del?id="+id;
        }
    } 
</script>
</body>
</html>