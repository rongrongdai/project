<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>八斗网——个人设置</title>
	<script src="__ROOT__/public/js/jquery-min.js"></script>

</head>
    
    <frameset rows="20%,*" frameborder="0">
        <frame src="uhead.html" name="topFrame" id="topFrame" scrolling="no"/>
        <frameset cols="11%,16%,*">
            <frame></frame>
            <frame src='ucenter.html<?php if($target != ''): ?>?page=<?php echo ($page); ?>&tag=<?php echo ($target); endif; ?>' name="leftFrame" id="leftFrame"/>
            <frame src='<?php if($target != ''): echo ($page); ?>?tag=<?php echo ($target); else: ?>index.html<?php endif; ?>' name="ifrm" id="mainFrame"/>
        </frameset>
        <noframes>
        	<body>
        		您的浏览器版本太低了，快去升级吧！
        	</body>
        </noframes>
    </frameset>

</html>