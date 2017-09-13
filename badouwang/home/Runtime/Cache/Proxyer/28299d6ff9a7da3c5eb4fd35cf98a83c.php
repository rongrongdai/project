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
           <div class="set-up">签约老师</div> <div class="set-up" style='margin:0 0 0 40px;'><a href="addTeacher">增加老师</a></div>
           <div class="set-up" style="margin-left:550px;">免费发布机会：<?php echo ($fcount); ?>次</div>
      </div>
      <div class="padd">
             <table width="100%" name='entities'>
                <tr class="td-title">
                  <td width="10%">序号</td>
                  <td width="10%">老师姓名</td>
                  <td width="10%">授课对象</td>
                  <td width="10%">授课范围</td>
                  <td width="10%">联系电话</td>
                  <td width="10%">老师简介</td>
                  <td width='10%'>操作</td>
                </tr>
                <?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr>
                  <td><?php echo ($i+1+$limit); ?></td>
                  <td><?php echo ($vo["real_name"]); ?></td>
                  <td><?php echo ($vo["gname"]); ?>-<?php echo ($vo["cname"]); ?></td>
                  <td><?php echo ($vo["address"]); ?></td>
                  <td><?php echo ($vo["telephone"]); ?></td>
                  <td><?php echo ($vo["info"]); ?></td>
                  <td><?php if($vo['tid']): ?><a href="__URL__/teachmod?id=<?php echo ($vo["id"]); ?>">编辑信息</a><?php else: ?><a href="__URL__/teachspd?id=<?php echo ($vo["id"]); ?>">发布信息</a><br/><a href="__URL__/delTeacher?id=<?php echo ($vo["id"]); ?>">删除</a><?php endif; ?></td>
                </tr><?php endforeach; endif; ?>
             </table>
             
     </div>
       <div style="text-align:center;"><?php echo ($link); ?></div>    
    </div>
</div>



</body>
</html>