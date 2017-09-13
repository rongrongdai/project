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
                
               <div class="make ymk <?php if(!$type): ?>aclick<?php endif; ?>" style="border-right:none">家教预约</div>
               <div class="make nmk <?php if($type): ?>aclick<?php endif; ?>">培训报名</div>
            </div>
            
            <div class="padd" id="hiddyi" <?php if($type): ?>style="display:none;"<?php else: ?>style="display:block"<?php endif; ?>>
                   <table width="100%">
				        <tr class="td-title">
				        <td width="5%">序号</td>
					    <td width="25%">报名课程</td>
					    <td width="14%">上课时间</td>
					    <td width="8%">联系老师</td>
					    <td width="12%">联系电话</td>
						<td width="28%">地址</td>
					    <td width="8%"><div class="del_more"><input type="submit" name="submit" id="submit1" value="删除"></div></td>
					   </tr>
                    <?php if(is_array($mybm)): foreach($mybm as $i=>$vo): ?><tr>
                    		<td><?php echo ($i+1+$limit); ?></td> 
						    <td><a href="__APP__/Teach/Teach/agentdetail?id=<?php echo ($vo["course"]); ?>" target="block"><?php echo (mb_substr(strip_tags($vo["title"]),"0","10","utf-8")); ?></a></td>
							<td><?php echo ($vo["dtime"]); ?></td>
							<td><?php echo ($vo["real_name"]); ?></td>
						    <td><?php echo ($vo["telephone"]); ?></td>
							<td><?php echo ($vo["address"]); ?></td>
						    <td><input type="checkbox" name="" value="<?php echo ($vso["bid"]); ?>"></td>
					    </tr><?php endforeach; endif; ?>   
                   </table>
            </div>
                             
  
             <div class="padd"  id="hidder"  <?php if($type): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
                   <table width="100%">
				       <tr  class="td-title">
					    <td width="20%">报名课程</td>
					    <td width="18%">上课时间</td>
					    <td width="14%">培训机构</td>
					    <td width="12%">联系电话</td>
					   <td width="28%">地址</td>
					    <td width="8%"><div class="del_more"><input type="submit" name="submit" id="submit1" value="删除"></div></td>
					</tr>
                                         <?php if(is_array($courses)): foreach($courses as $i=>$vo): ?><tr>  
                                                <td><a href="__APP__/Teach/Teach/agentdetail?id=<?php echo ($vo["id"]); ?>" target="block"><?php if($vo["cname"] != ''): echo (mb_substr($vo["cname"],"0","10","utf-8")); if(mb_strlen($vo.cname) > 9): ?>...<?php endif; else: echo (mb_substr(strip_tags($vo["aname"]),"0","10","utf-8")); if(strlen($vo.aname) > 10): ?>...<?php endif; endif; ?></a></td>
						    <td><?php if($vo["s_time"] != ''): echo (date("Y-m-d",$vo["s_time"])); else: echo (date("Y-m-d",$vo["as_time"])); endif; ?></td>
                                                    <td><?php if($vo["real_name"] != ''): echo ($vo["real_name"]); else: echo ($vo["oname"]); endif; ?></td>
						    <td><?php echo ($vo["telephone"]); ?></td>
					            <td><?php if($vo["address"] != ''): echo ($vo["address"]); else: echo ($vo["aaddress"]); endif; ?></td>
						    <td><input type="checkbox" name="" value="<?php echo ($vo["bid"]); ?>"></td>
					    </tr><?php endforeach; endif; ?> 
					
                   </table>  
 
       </div>
     <div style="text-align:center;"><?php echo ($link); ?></div>  
</div>

    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
<script src='__ROOT__/js/home/common.js'></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script>
    ifram()   //运行
    var he = $(document).height()+200;
    var tf='?';
    if(location.href.indexOf('?')!==-1){
        tf='&';
    }
    function ifram(){$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	})}
    $(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高度
    $('.per-make .make').click(function(){
            $('.make').removeClass("aclick");
            $(this).addClass('aclick');
    });
    $('.per-make .ymk').click(function(){
         if(tf==='&'){
             var url=location.href.substr(0,location.href.indexOf('?'));
             location.href=url;
         }else{
             location.reload();
         }
    })
    $('.per-make .nmk').click(function(){
        if(location.href.indexOf('course')===-1){
            location.href+=tf+"type=course";
        }
    })
    $(".del_more").click(function(){
        var dids='';
        $("input:checked").each(function(){
            dids+=$(this).val()+",";
        })
        dids=dids.substr(0,dids.length-1);
        if(dids.length){
            location.href="__ROOT__/index.php/User/User/delJjbm?ids="+dids;
        }else{
           if($(this).parent().parent().parent().find("tr").size()>1){
              $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '请选择要删除课程！'}}); 
           }else{
               $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 3,msg: '暂无家教和培训预约消息！'}}); 
           }
        }
    })
    </script>
</body>
</html>