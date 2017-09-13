<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>访问出错</title>
<link href="__ROOT__/public/css/home/promptbox.css" type="text/css" rel="stylesheet" />
</head>

<body style="background-color:#009170;">       
<div class="sall">
     <div class="sconone">
           <div class="syi">
              <img src="__ROOT__/public/images/home/404y.png" />
           </div>               
           <div class="ser">
                <div class="seryi">
                    <div class="seryi-y">
                           <a href="#"><img src="__ROOT__/public/images/home/fanhui.png" /></a>
                           <p class="pyi"><a href="<?php if($ref != ''): echo ($ref); else: ?>__ROOT__<?php endif; ?>">返回</a></p>
                    
                           <a href="#" class="wuz"><img src="__ROOT__/public/images/home/wuz.png" /></a>
                           <p class="per"><a href="__ROOT__/">返回首页</a></p>
                     
                           <a href="#" class="jingz"><img src="__ROOT__/public/images/home/jingz.png" /></a>
                           <p class="psan"><a href="#">返回首页搜索相关消息</a></p>
                    </div>                 
                </div>
                 <div class="seryi-er">
                     <p>提示，<?php echo ($error); ?></p>        
                  </div>        
           </div>        
     </div>
</div>

</body>
</html>