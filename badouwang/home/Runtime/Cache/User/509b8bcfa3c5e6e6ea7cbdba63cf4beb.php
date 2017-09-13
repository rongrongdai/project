<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——我的订单</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<link href="__ROOT__/public/css/home/bootstrap.min.css"  type="text/css" rel="stylesheet"/>
<style type="text/css">
a{ text-decoration:none;}
.z-cenog{ width:900px;}
.z-cenog .zc-one{ margin:15px; border-bottom:1px #9DE1BD solid; height:40px;}
.z-cenog .zc-one .ddan{ width:470px; float:left; color:#42bab1; font-size:14px;}
.z-cenog .zc-one .ddae{ width:390px; float:right; color:#2d2a35; font-size:14px;}
.z-cenog .zc-one .ddae span{ cursor:pointer;}
.z-cenog .zc-one .ddae .aclick{ color:#42bab1;}
.z-cenog  .ddaho{ color:#727274; margin:30px 0px 10px 15px;font-size: 16px;}
.z-cenog  .ddaho span{ color:#fc7718; margin-left:20px;}

.z-cenog  .zc-two{  margin:15px; border:1px #9DE1BD solid; height:135px;}

.z-cenog  .zc-two .zc-tyi{ width:290px; border-right:1px #9DE1BD solid; height:135px; float:left;}
.z-cenog  .zc-two .zc-tyi img{ width:100px; height:100px; margin:15px; float:left;}
.z-cenog  .zc-two .zc-tyi .zc-tlef{ float:left;margin-top:10px;}
.z-cenog  .zc-two .zc-tyi .zc-tlef p{color:#727274; font-size:12px; line-height:20px;}
.z-cenog  .zc-two .zc-tyi .zc-tlef .cq{  line-height:25px; font-weight:bolder;}
.z-cenog  .zc-two .zc-tyi .zc-tlef .cz{ margin-top:30px;}
.z-cenog  .zc-two .zc-tyi .zc-tlef .cs{color:#42bab1;}
.z-cenog  .zc-two .zc-ter{ width:180px; height:135px; float:left;  border-right:1px #9DE1BD solid;}
.z-cenog  .zc-two .zc-ter p{ color:#727274; font-size:12px; line-height:27px; text-align:center;}
.z-cenog  .zc-two .zc-ter .yuad{ color:#fc7718;margin-top:10px;}
.z-cenog  .zc-two .zc-tsan{ width:210px; height:135px; float:left;  border-right:1px #9DE1BD solid;}
.z-cenog  .zc-two .zc-tsan p{color:#727274; font-size:12px; line-height:27px; text-align:center;margin-top:10px;}
.z-cenog  .zc-two .zc-tsan span{ color:#fc7718;}
.z-cenog  .zc-two .zc-tsi{ float:left; width:130px;padding-top:10px;}
.z-cenog  .zc-two .zc-tsi p{ color:#727274; font-size:12px; line-height:27px; text-align:center;}
.z-cenog  .zc-two .zc-tsi a{ color:#fc7718;}
.z-cenog  .zc-two .zc-tsi a:hover{ color:#42bab1;}

</style>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>

<body style="margin:8px;">
<div class="per">
   <div class="per-make">
      <div class="make ymk aclick">我的订单</div>
   </div>
      

    <div class="z-cenog">
        <div class="zc-one" id="od">
            <!--<p class="ddan">我的订单</p>-->
            <p class="ddae"><span class="aclick" name="all">全部(<?php echo ($all); ?>) </span>| <span name="pay">待支付(<?php echo ($ispay); ?>)</span> | <span name="do">执行中(<?php echo ($do); ?>)</span> | <span name="end">已结束(<?php echo ($end); ?>)</span> </p>
        </div>
    <?php if($data): if(is_array($data)): foreach($data as $i=>$vo): ?><p class="ddaho">订单号：<?php echo ($vo["order_num"]); ?>  | <?php echo (date(("Y年m月d日 H:i"),$vo["bm_time"])); ?>  <span><?php if($vo['ispay'] == 0): ?>待付款<?php else: ?>已支付<?php endif; ?></span></p>
        <div class="zc-two" <?php if($i%2==1): ?>style="background:#F7FAF7;"<?php endif; ?>>
      
            <div class="zc-tyi">
                <img src="<?php if($vo["type"] == 1): ?>__ROOT__<?php echo ($vo["self_img"]); else: ?>__ROOT__/<?php echo ($vo["timg"]); endif; ?>" />
                <div class="zc-tlef">
                  <p class="cq"><?php echo ($vo["real_name"]); ?></p><p class="cz"><?php echo ($vo["course"]); ?></p><p class="cs"><?php echo ($vo["place"]); ?></p>
                </div>
            </div>
         
            <div class="zc-ter">
                <?php $danjiao = $vo['money']/$vo['hour'];$vo['classhour']=$vo['classhour']?$vo['classhour']:0; ?>
                <?php if($vo["type"] == 1): ?><p class="yuad"><?php echo ($danjiao); ?>.00/小时</p><?php else: ?><p class="yuad">课程价格:<?php echo ($danjiao); ?></p><?php endif; if($vo["type"] == 1): ?><p>已购买：<?php echo ($vo["hour"]); ?>小时</p><p><?php if($vo['status'] == 0): ?>已完成：<?php echo ($vo["classhour"]); ?>/<?php echo ($vo["hour"]); ?>小时<?php else: ?>已结束<?php endif; else: ?><p>开始时间：<?php echo (date("Y-m-d",$vo["s_time"])); ?></p><p>结束时间：<?php echo (date("Y-m-d",$vo["e_time"])); ?></p><?php endif; ?></p>
            </div>
         
            <div class="zc-tsan">
                <p>订单金额：<span>￥<?php echo ($vo["money"]); ?></span>元</p><p>支付金额：<span>￥<?php echo ($vo["money"]); ?></span>元</p>
            </div>

            <div  class="zc-tsi">
                <p><a href="<?php if($vo["type"] == 1): ?>__APP__/Teach/Teach/teachDetail?pid=<?php echo ($vo["course_id"]); else: ?>__APP__/Organ/Organ/odetail?id=<?php echo ($vo["course_id"]); endif; ?>" target="_new">查看详情</a></p>
                <?php if($vo['ispay'] == 0): if($vo["status"] != 1): ?><p><a href="__APP__/User/User/orderList?cancel=<?php echo ($vo["id"]); ?>">取消订单</a></p><?php endif; ?>
                    <?php if($vo["status"] != 1): ?><p><a href="__APP__/Teach/Teach/orderDetail?id=<?php echo ($vo["order_num"]); ?>" target="_new">支付订单</a></p><?php endif; endif; ?>
                <?php if($vo["status"] == 1): ?><p><a href="javascript:;" type='<?php echo ($vo["type"]); ?>' id='<?php echo ($vo["id"]); ?>' <?php if($vo["sum"] < 1): ?>name='comment'<?php endif; ?>><?php if($vo["sum"] > 0): ?>已<?php endif; ?>评价</a></p><?php endif; ?>
                <?php if($vo["yueke"] == 0 && $vo["ispay"] == 1 && $vo["type"] == 1): ?><p><a style="color:#0C941E;" href="__URL__/yueke?id=<?php echo ($vo["id"]); ?>" target="_new">我要约课</a></p><?php endif; ?>

            </div>
        </div><?php endforeach; endif; ?>
    <?php else: ?>
        <div class="zc-two"><div style="text-align:center;margin-top:50px;">暂无相关内容</div></div><?php endif; ?>
        <div style="text-align:center;margin:20px;"><?php echo ($link); ?></div> 
    </div>

   
</div>


    <script src="__ROOT__/public/js/home/jquery.mousewheel.js"></script>
    <script src="__ROOT__/public/js/home/nicescroll.js"></script>
    <script src="__ROOT__/public/js/home/noscroll.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script type="text/javascript">
$(".ddae").find("span").click(function(){
    var type = $(this).attr('name');
    window.location.href = "__APP__/User/User/orderList?name="+type;
});
var type = "<?php echo ($type); ?>";
$(".ddae").find("span").removeClass('aclick');
var node = $(".ddae").find("span[name="+type+"]").addClass('aclick');
switch(type){case 'all':node;break;case 'pay':node;break;case 'do':node;break;case 'end':node;break;
}


</script>
<script>
     $(function(){
        
       $("a[name=comment]").click(function(){
            var id=$(this).attr("id");
            var type=$(this).attr("type");
            $.layer({
            type: 2,
            shadeClose: true,
            title: false,
            closeBtn: [0, true],
            shade: [0.8, '#000'],
            border: [0],
            offset: ['20px',''],
            area: ['468px', '400px'],
            iframe: {src: '__ROOT__/index.php/User/User/commment?type='+type+'&id='+id}
           }); 
        })
    })           
</script>
</body>
</html>