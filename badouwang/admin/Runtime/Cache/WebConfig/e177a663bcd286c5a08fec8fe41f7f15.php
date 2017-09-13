<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<title>基本设置</title>
<style type="text/css">
     .hall-cenver{ width:685px;  border:1px #999 solid; border-radius:10px;margin-left:240px;margin-top:10px;}
	 .hall-cenver .cren-y{ margin:20px 10px 10px 10px; border-bottom:1px #CCC solid; padding-bottom:10px; font-size:20px; font-weight:800; }
     .hall-cenver .cren-r{ margin:0px 10px 10px 10px; border-bottom:1px #CCC solid; padding-bottom:10px; height:45px; }
	 .hall-cenver .cren-r .cren-wze ,.hall-cenver .cren-rr .cren-wze{ font-size:14px; color:#302f2e; float:left; width:80px; }
	 .hall-cenver .cren-r .cren-wz{ width:200px; float:left; margin-top:10px; margin-right:20px; padding-left:5px; height:30px;}
	 .hall-cenver .cren-rr{ margin:20px 10px 10px 10px; border-bottom:1px #CCC solid; padding-bottom:10px; height:60px; }
	 .hall-cenver .cren-rr .cren-wzy{ float:left; margin-top:10px; margin-right:20px; width:400px;}
	 .hall-cenver .cren-re { margin:20px 10px 20px 10px;  height:40px;}
	 .hall-cenver .cren-re .butb{ float:left; background:#208ed3; cursor:pointer; width:70px; color:#FFF;  margin-right:30px; font-size:16px; padding: 10px 15px; border: 1px solid rgba(0, 0, 0, .3); text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2); border: 1px solid #0f70ad; 
	 -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);}
	  
	 .hall-cenver .cren-r .butb{ background:#208ed3; cursor:pointer; width:120px; color:#FFF;  margin-left:30px; font-size:16px; border: 1px solid rgba(0, 0, 0, .3); padding: 10px 15px; position:relative; top:-10px; text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2); border: 1px solid #0f70ad; -webkit-border-radius: 3px;
     -moz-border-radius: 3px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);}
	 
	 
	 
	 .hall-cenver .cren-r .butb:hover ,.hall-cenver .cren-re .butb:hover{ background:#000;}
	 
         .p_position{font-size:12px;font-weight: bold;width:100%; background:#e9e9e9;margin-bottom: 0px;line-height: 50px;}
         .p_position span{margin-left:20px;}
</style>
</head>

<body>
    <div class="p_position"><span>当前位置> </span><?php echo ($position); ?></div>
   <div class="hall-cenver">
         <p class="cren-y">基本设置</p>
         <form method="post" action="saveConfig" enctype="multipart/form-data" id="webconfig">
         <div class="cren-r">
            <p class="cren-wze">网站名字:</p><input type="text"   placeholder="网站名称" class="cren-wz" name="web_name" id="web_name" value="<?php echo ($web_name); ?>"/>
            <p class="cren-wze">网站地址:</p><input type="text"   placeholder="网站地址" class="cren-wz" name="web_siteurl" value="<?php echo ($web_siteurl); ?>" id="web_siteurl"/>
         </div>
         <div class="cren-r">
             <p class="cren-wze">网站log:</p>
             <span style="margin-left:10px;" id="img"><?php if($web_img != ''): ?><img src="__ROOT__/public<?php echo ($web_img); ?>" width="100px" style="margin-left:10px;"></span><?php endif; ?><button class="butb" id="c_img">  
                                选择图片                          
                            </button>
                            <input id="web_img" name="web_img"  type="file"  style="display:none;" value="<?php echo ($web_img); ?>" /><span class="hint"></span>
         </div> 
         <div class="cren-r">
            <p class="cren-wze">首页关键字:</p><input type="text"   placeholder="qcms" class="cren-wz" name="web_keyword" value="<?php echo ($web_keyword); ?>" id="web_keyword"/>
         </div>
          
          <div class="cren-rr">
            <p class="cren-wze">网站版权信息:</p><textarea  rows="3" class="cren-wzy" name="web_cop"  id="web_cop"><?php echo ($web_cop); ?></textarea>  
         </div>
         <div class="cren-rr">
            <p class="cren-wze">首页描述:</p><textarea  rows="3" class="cren-wzy" name="web_desp"  id="web_desp"><?php echo ($web_desp); ?></textarea>  
         </div>
          <div class="cren-re">
           <input type="hidden" name="token" value="<?php echo ($token); ?>" />
           <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>" />
           <input type="submit" value="保存" class="butb" id="s_config"/></p> 
         </form>
<!--           <input type="button" value="取消" class="butb"/></p>-->
         </div>
          
   </div>
    <script src="__ROOT__/public/js/validater.js"></script>
    <script>
    $(function(){
       $("#s_config").click(function(){
           var ck;
           if($("#img")){
             ck= Array("web_name","web_siteurl","web_cop","web_keyword","web_desp");
           }else{
             ck= Array("web_name","web_siteurl","web_cop","web_keyword","web_desp","web_img");
           }
           var ci=Array("网站名称","网址","网站log","版权信息","网站关键字","网站描述");
           var res=null_check(ck,ci);
           if(res){
             var fk="#"+res[0];
             $(fk).parent().find(".hint").text(res[1]).css("color","red");
             return false;
           }else{
              return true;
           }
       })
       $(function(){
           $("#c_img").click(function(){
               $("#web_img").click();
               return false;
           })
       })
    })
</script>
</body>
</html>