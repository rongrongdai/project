<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——资料上传</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<script src="__ROOT__/public/js/validater.js"></script>
</head>
<body>
<div class="per">
     <div class="per-top">
           <img src="__ROOT__/public/images/home/xiaotu.gif" />
           <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>资料</div>
     </div>
 	 <div class="per-form">
         <form action="" method="post" enctype="multipart/form-data" id="dataform" onsubmit="javascript:return false;">
           <div class="pheig">
              <div class="pflat1">资料名称：</div>
              <div class="pflat2">
              		<input type="text"  name="rname" id='rname' value="<?php echo ($data["rname"]); ?>" />
              		<span class="prompt">资料名称，不超过20字符</span>
              </div>
           </div>  
           
           <div class="pheig">
              <div class="pflat1" >资料分类:</div>
              <div class="pflat2" id='cla'></div>
           </div> 
           <div class="pheig">
              <div class="pflat1">选择资料:</div>
              <div class="pflat2">
                     <input type="file" name="rcontent" id="rcontent"/>
                     <span class="prompt">内容不要超过10Mb,文件格式只能为.xls,.doc,.ppt</span>
              </div>
           </div> 


           <div class="pheig">
              <div class="pflat1">下载所需学豆:</div>
              <div class="pflat2">
                      <input type="text" class="ipnutcs" name="dmoney" id="dmoney"/>
                     <span class="prompt">免费请输入0,保留两位小数</span>
              </div>
           </div> 

           <div class="pheig psub">
              <input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
              <input type="hidden" name="id" value="<?php echo ($id); ?>">
              <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
              <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
              <input type="hidden" name="cid" value="" />
              <input type="hidden" name="fit" value="" />
           </div> 
         </form>   
     </div>
</div>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/jquery.form.js"></script>
<script src='__ROOT__/public/js/classfiy.js'></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('rname','rcontent','dmoney');
                var nullinfo=new Array('资料名称','资料','所需学豆');
                var res=null_check(nullcheck,nullinfo);
               
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                  }else{
                      
                      var options = {
                            type:'post',
                            url:'__ROOT__/index.php/Ajax/AjaxResource/upload',
                            success: function (data) {
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg:'上传资料成功！'}});
                            }
                        };
                       var cid= $("#cla").find("select:last").val();
                       var fid=$("#cstu").find("select:last").val();
                       var extend=$("#rcontent").val().substr($("#rcontent").val().lastIndexOf("."));
                       if(!(extend==='.xls' || extend==='.doc' ||extend ==='.ppt')){
                           $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 1,msg:'文件格式不支持!'}});
                           return;
                       }
                       if(cid!=='请选择分类' && fid !=='请选择分类'){
                           var loadi = layer.load('上传中…');
                           $("input[name=cid]").val(cid);
                           $("input[name=fit]").val(fid);
                           $("#dataform").ajaxSubmit(options);
                       }else{
                           $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 1,msg:'请选择分类'}});
                       }
                      
                  }
                  return false;
            });
            $(function(){
                var id="<?php echo ($data["oid"]); ?>";
                $("#"+id).attr("selected","selected");
                $("#type").change(function(){
                    if($(this).val()==1){
                        $("#eclass").show();
                    }else{
                        $("#eclass").hide();;
                    }
                })
                initClass('cla','资料分类');
            })
</script>
</body>
</html>