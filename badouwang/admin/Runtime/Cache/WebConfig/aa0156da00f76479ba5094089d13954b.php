<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<link href="__ROOT__/public/css/home/promptbox.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body>
<div class="system-message">
<?php if(isset($message)): ?><p class="success"></p>
<div class="smlieal">
    <div class="smlie-yi"><img src="__ROOT__/public/images/home/smeil.png" /></div>
    <div class="smlie-er">
    <p class="sm-y"><?php echo($message); ?></p>
     <p class="sm-e">页面自动 跳转 等待时间: <span><b id="wait" des="<?php echo($jumpUrl); ?>"><?php echo($waitSecond); ?></b></span></p>
    </div>
</div>
<?php else: ?>
<div class="smlieal" >
     <div class="smlie-yi"><img src="__ROOT__/public/images/home/smeil2.png"/></div>
     <div class="smlie-er">
     <p class="sm-y"><?php echo($error); ?></p>
     <p class="sm-e"><a href="__ROOT__/" class="pyi">返回首页</a></p>
     <p class="sm-e">页面自动 跳转 等待时间: <span><b id="wait" des="<?php echo($jumpUrl); ?>"><?php echo($waitSecond); ?></b></span></p>
     </div>
</div><?php endif; ?>
<div style="clear:both;"></div>
</div>
<script type="text/javascript">
(function(){
var interval = setInterval(function(){
	var time = $("#wait").html();
        time--;
        $("#wait").html(time);
	if(time == 0) {
                var href=$("#wait").attr("des");
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>