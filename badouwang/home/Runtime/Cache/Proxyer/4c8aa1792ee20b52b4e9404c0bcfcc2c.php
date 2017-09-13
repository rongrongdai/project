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
           <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/jjxxgl1.jpg" />
           <div class="set-up">邀请列表</div> <div class="set-up" style='margin:0 0 0 40px;'><a href="javascript:addCode()">添加邀请码</a></div>
      </div>
      <div class="padd">
             <table width="100%" name='entities'>
                <tr class="td-title">
                  <td width="8%">序号</td>
                  <td>邀请码</td>
                  <td>状态</td>
                  <td>老师姓名</td>
                  <td>认证时间</td>
                </tr>
                <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
                  <td><?php echo ($i+1+$limit); ?></td>
                  <td><?php echo ($vo["code"]); ?></td>
                <?php if($vo['status'] == 1): ?><td><font color="#A8492D">未使用</font></td>
                  <td><?php echo ($vo["tuid"]); ?></td>
                  <td><?php echo ($vo["ctime"]); ?></td>
                <?php else: ?>
                  <td>成功</td>
                  <td><?php echo ($vo["real_name"]); ?></td>
                  <td><?php echo (date("Y-m-d H:i",$vo["ctime"])); ?></td><?php endif; ?>
                </tr><?php endforeach; endif; ?>
             </table>
             
     </div>
       <div style="text-align:center;"><?php echo ($link); ?></div>    
    </div>
</div>

<script type="text/javascript">
function addCode(){
	$.post("__APP__/Ajax/AjaxTeach/addCode",function(data){
		if(data !== 'success'){
			alert(data);
		}else{
			location.reload();
		}
	},'json');
}
</script>

</body>
</html>