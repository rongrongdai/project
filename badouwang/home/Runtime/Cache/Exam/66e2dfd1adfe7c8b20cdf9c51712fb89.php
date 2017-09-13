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
    <div class="per-top">
         <img src="__ROOT__/public/images/home/xiaotu.gif" />
         <p class="set-up">试卷</p>
    </div>
            
    <div class="per-form">
      <form action="__URL__/dopaper" method="post">
        <?php if(is_array($datas)): foreach($datas as $i=>$data): ?><div class="pheig"><div class="pflat1">第<font color="red"><?php echo ($i+1); ?></font>题:</div>
              <div class="pflat2 pflat2tx">
                <?php echo ($data["question"]); ?>
          </div></div>

          <div class="pheig"><div class="pflat1">答案</div>
              <div>
                <?php echo ($data["answer"]); ?>
          </div></div>

          <div class="pheig"><div class="pflat1">您的答案</div>
              <div class="pflat2 pflat2tx">
                <input type="hidden" name="record[<?php echo ($data["id"]); ?>]" value="" />
                <input type="radio" name="record[<?php echo ($data["id"]); ?>]" value="A" />A
                <input type="radio" name="record[<?php echo ($data["id"]); ?>]" value="B" />B
          </div></div>
                <input type="hidden" name="right[<?php echo ($data["id"]); ?>]" value="<?php echo ($data["right"]); ?>" />
                <span id="collect" onclick="collect(<?php echo ($data["id"]); ?>)" style="cursor:pointer;">加入收藏</span><?php endforeach; endif; ?>
              <input type="hidden" name="begin_time" value="<?php echo ($begin_time); ?>" />

          <div class="pheig"><div class="pflat1">提交</div>
              <div class="pflat2 pflat2tx">
                <input type="submit" value="确认" />
          </div></div>

      </form>
    </div>
</div>

<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
function collect(id){
    $.get("__ROOT__/index.php/Ajax/AjaxExam/collect",{'id':id},function(data){
      if(data == 'success'){
        layer.msg('收藏成功',1,-1);
      }else if(data == 'has'){
        layer.msg('您已经收藏了',1,-1);
      }
    });
}

</script>
</body>
</html>