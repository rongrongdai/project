<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>八斗网——代理商报名管理</title>
	<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
	<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
	<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>



<body style="margin:8px;">
<div class="per">
      <div class="per-make">
           <div class="make ymk" id="organ">培训报名</div>
           <div class="make nmk aclick" id="cht">家教报名</div>
      </div>

     <div class="padd" name="teach" id="hiddyi">
             <table width="100%"  name='entities'>
             	<tr class="td-title">
                  <td width="10%">序号</td>
                  <td width="10%">学生姓名</td>
                  <td width="12%">联系电话</td>
                  <td>报名课程</td>
                  <td width="10%">授课老师</td>
                  <td width="10%">报名时间</td>
                  <td width='10%'>确认报名</td>
                </tr>

            <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
                  <td><?php echo ($i+1+$limit); ?></td>
                  <td><?php echo ($vo["stu_name"]); ?></td>
                  <td><?php echo ($vo["telephone"]); ?></td>
                  <td ><?php echo ($vo["title"]); ?></td>
                  <td ><?php echo ($vo["real_name"]); ?></td>
                  <td><?php echo (date("Y-m-d",$vo["bm_timestamp"])); ?></td>
                  <td><?php if($vo['status'] == 0): ?><a href="javascript:sure(<?php echo ($vo["id"]); ?>,<?php echo ($vo["suid"]); ?>);">确认报名</a><?php else: ?>已确认<?php endif; ?></td>
                </tr><?php endforeach; endif; ?>

             </table>
     </div>
       <div style="text-align:center;"><?php echo ($link); ?></div>

</div>



<script src="__ROOT__/public/js/home/common.js"></script>
<script>
                 
$("#organ").click(function(){
    $("#cht").removeClass("aclick");
    $(this).addClass("aclick");
    $("a[name=cht]").removeClass("active");
    window.location.href = "__APP__/Proxyer/Proxyer/inClass";
})
                     
$("#cht").click(function(){
    $("#organ").removeClass("aclick");
    $(this).addClass("aclick");
    $("a[name=organ]").removeClass("active");
    window.location.href = "__APP__/Proxyer/Proxyer/inClassTch";
});

function sure(id,suid){
	if(confirm('确定接受此次家教吗？')){
        window.location.href="__URL__/accept?id="+id+"&suid="+suid;
    }
}               

               
</script>
</body>
</html>