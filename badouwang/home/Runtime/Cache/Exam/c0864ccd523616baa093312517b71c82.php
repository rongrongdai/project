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
            <div class="make ymk aclick">考试记录</div>
        </div>
            
        <div  class="padd">
            <table width="100%">
              <tr class="td-title">
                <td width="10%">序号</td>
                <td width="30%">试卷名称</td>
                <td width="10%">得分</td>
                <td width="10%">用时</td>
                <td width="20%">考试时间</td>
                <td width="20%">操作</td>
              </tr>
            <?php if(is_array($datas)): foreach($datas as $i=>$data): ?><tr>
                <td><?php echo ($i+1); ?></td>
                <td><?php echo ($data["sid"]); ?></td>
                <td><?php echo ($data["score"]); ?></td>
                <td><?php echo ceil(($data['end_time']-$data['begin_time'])/60); ?>分钟</td>
                <td><?php echo (date("Y-m-d H:i:s",$data["begin_time"])); ?></td>
                <td><a href="javascript:detail(<?php echo ($data["id"]); ?>)">查看</a> | <a href="javascript:del(<?php echo ($data["id"]); ?>);">删除</a></td>
              </tr><?php endforeach; endif; ?>  

            </table> 
       </div>
   </div>
</body>
</html>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
function detail(id){window.location.href = "__URL__/record?id="+id;}
function del(id){
    layer.confirm('您确认要删除该记录吗？', function(){
         window.location.href = "__URL__/del?id="+id;
        },function(){
          layer.msg('成功取消',1,-1);
        });
  }
</script>