<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>

<body>
<div class="per">
        <div class="per-make">
            <div class="make ymk aclick">错题本</div>
        </div>
            
    <div class="per-form">
    <li class="cw active">错题本共有<font color="red"><?php echo ($totals); ?></font> 道题</li>
        <?php if(is_array($datas)): foreach($datas as $i=>$data): ?><div class="pheig"><div class="pflat1">第<font color="red"><?php echo ($i+1); ?></font>题:</div>
              <div class="pflat2 pflat2tx">
                <?php echo ($data["question"]); ?>
          </div></div>

          <div class="pheig"><div class="pflat1">答案</div>
              <div class="pflat2 pflat2tx">
                <?php echo ($data["answer"]); ?>
          </div></div>

          <div class="pheig"><div class="pflat1">正确答案</div>
              <div class="pflat2 pflat2tx">
                <?php echo ($data["right"]); ?>
          </div></div><?php endforeach; endif; ?>

    </div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>

</body>
</html>