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
      <div class="make ymk aclick">我的收藏</div>
   </div>
            
   <div class="padd">
                   <table width="100%">
				        <tr class="td-title">
					    <td width="28%">课程名称</td>
					    <td width="12%">上课时间</td>
					    <td width="10%">联系人</td>
					    <td width="12%">联系电话</td>
						<td width="28%">地址</td>
					    <td width="8%"><div class="del_more"><input type="submit" name="submit" id="submit1" value="删除"></div></td>
					   </tr>
                       
 					<?php if(is_array($data)): foreach($data as $i=>$vo): ?><tr> 
                     <td><a href="__APP__/<?php if($type != ''): ?>Organ/Organ/odetail?id=<?php echo ($vo["aid"]); else: ?>Teach/Teach/agentdetail?id=<?php echo ($vo["aid"]); endif; ?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
						<td><?php echo ($vo["dtime"]); ?></td>
						<td><?php echo ($vo["real_name"]); ?></td>
					         <td><?php echo ($vo["telephone"]); ?></td>
						<td><?php echo ($vo["address"]); ?></td>
                                                <td><input type="checkbox" name="vid" value="<?php echo ($vo["id"]); ?>"></td>
                
					  </tr><?php endforeach; endif; ?>  
                   </table>  
    </div>
    <div style="text-align:center;"><?php echo ($link); ?></div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
    $(function(){
        $("input[name=submit]").click(function(){
            var ids='';
            $("input[name=vid]:checked").each(function(){
                ids+=$(this).val()+',';
            })
           ids=ids.substr(0,ids.length-1);
           location.href="__APP__/User/Teach/delc?ids="+ids;
        });
    })
</script>
</body>
</html>