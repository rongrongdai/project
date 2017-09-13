<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>
<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/public/css/home/imgareaselect-animated.css" />
<script src="__ROOT__/public/js/validater.js"></script>
</head>
<body>
<div class="per">
     <div class="per-top">
          <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';" src="__ROOT__/public/images/home/zjkc1.jpg" />
          <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>课程</div>
     </div>

     <div class="per-form">
          <form action="" method="post" enctype="multipart/form-data" id="dataform">
                    <div class="pheig">
              		<div class="pflat1">课程名称：</div>
              		<div class="pflat2">
                            <input type="text" class="inputcs"  name="cname" id='cname' value="<?php echo ($data["cname"]); ?>" />
              		</div>
                        <span class="prompt">课程名称，中英文均可， 不超过20字符</span>
                    </div> 

		    <div class="pheig">
              		<div class="pflat1">课程log:</div>
              		<div class="pflat2">
                            <div><input type="file" id="timg"  name="timg" onchange="change(this)" /><span class="prompt"> 课程简介，中英文均可，不超过100字符</span></div>
                            <?php if($id): if($data["timg"] != ''): ?><img id="cimg" onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/<?php echo ($data["timg"]); ?>" style="margin-right: 10px;margin-top:10px;width:271px;float:left;border:1px solid lightgray;"/><div id="preview" style="display:none;margin-top:10px;margin-left:10px;width: 277px; height: 191px; overflow: hidden;border:1px solid lightgrey"><img id="view_photo" src="__ROOT__/<?php echo ($data["timg"]); ?>"   style="width: 277px;height:191px;float:left; " onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"></div><?php endif; else: ?><img id="cimg" onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__<?php echo ($data["timg"]); ?>" style="margin-right: 10px;margin-top:10px;width:271px;float:left;border:1px solid lightgray;"/><div id="preview" style="margin-top:10px;margin-left:10px;width: 277px; height: 191px; overflow: hidden;border:1px solid lightgrey"><img id="view_photo" src="__ROOT__/<?php echo ($data["timg"]); ?>"   style="width: 277px;height:191px;float:left; " onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"></div><?php endif; ?>
                	 </div>
                        
                    </div>
                    <div style="clear:both;"></div>
                    <div class="pheig">
              		<div class="pflat1">课程分类:</div>
              		<div class="pflat2" id="cid">
              		</div>
                        <span class="prompt"></span>
                    </div> 
                    <div class="pheig">
              		<div class="pflat1">培训机构：</div>
              		<div class="pflat2">
                            <select name="oid" id="oid">
                                <option value="0">请选择</option>
                                <?php if(is_array($organs)): foreach($organs as $key=>$org): ?><option value="<?php echo ($org["id"]); ?>" id="<?php echo ($org["id"]); ?>"><?php echo ($org["oname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            
              		</div>
                        <span class="prompt"> 课程简介，中英文均可，不超过100字符</span>
                    </div> 
                
		    <div class="pheigtet">
              		<div class="pflat1">课程简介:</div>
              		<div class="pflat2">
                            <textarea name="tintroduce" id="tintroduce" class="pregrjj"/><?php echo ($data["tintroduce"]); ?></textarea>
                         </div>
                        <span class="prompt"> 课程简介，不超过100字符</span>
                    </div> 
                
                    <div class="pheigtet">
              		<div class="pflat1">课程详情:</div>
              		<div class="pflat2">
 				<textarea name="c_descript" id="c_descript" class="pregrjj"/><?php echo ($data["c_descript"]); ?></textarea>
                		<span class="prompt"> 课程详情，不超过400字符</span>
              		</div>
                    </div> 

			<div class="pheig psub">
					<input type="submit" class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
                                        <input type="hidden" name="id" value="<?php echo ($id); ?>">
                                        <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                                        <input type="hidden" name="cid" value="" /> 
                                        <input  type="hidden" id="startX" name="x" />
                                        <input type="hidden" id="startY" name="y" /><br/>
                                        <input type="hidden" id="width" name="w" />
                                        <input type="hidden" id="height" name="h" />
                                        <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>                    
                        </div> 
          </form>   
     </div>
</div>


<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script src="__ROOT__/public/js/pic.js"></script>
<script type="text/javascript" src="__ROOT__/public/js/home/jquery.imgareaselect.min.js"></script>

<script>
            $("#dataform").submit(function(){
                var nullcheck=new Array('cname','tintroduce','oid','c_descript');
                var nullinfo=new Array('课程名称','课程简介','培训机构','课程详情');
                var res=null_check(nullcheck,nullinfo);
                  if(res){
                      $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                      return false;
                  }else{
                     var cid='';
                     $("#cid").find("select").each(function(){
                           cid=$(this).val();
                     })
                     if(cid!=='请选择分类' && cid){
                       $("input[name=cid]").val(cid);
                       return true;  
                     }
                     $("#cid").parent().find(".prompt").text('请选择分类').css("color","red");
                     return false;
                  }
                  return false;
            });
            function change(file){
                     // Get a reference to the fileList
                     var files = !!file.files ? file.files : [];
                     $("#preview").show();
                     // If no files were selected, or no FileReader support, return
                     if (!files.length || !window.FileReader) return;
                         // Create a new instance of the FileReader
                         var reader = new FileReader();
                         // Read the local file as a DataURL
                         reader.readAsDataURL(files[0]);
                   
                         // When loaded, set image data as background of div
                         reader.onloadend = function(){
                         var img=$('#cimg');
                         
                         img.attr("src",this.result);
                         $("#view_photo").attr("src",this.result);
                         img.load(function(){
                           // 加载完成 
                           var img=$('#cimg');
                           img.width('100%');
                           img.height('100%');
                           var rect = clacImgZoomParam(300, 300, img.width(), img.height());
                           img.width(rect.width);
                           img.height(rect.height); 
                           //$("#preview").width(img.width()/3);
                           //$("#preview").height(img.width()/3*selectrate);
                           init(277,191,'cimg');
                           //$("#div_img").height($("#div_img").height()+$("#div_img").find("#cimg").height()-height+10);
                         });
                       }
                 }
            $(function(){
                var id="<?php echo ($data["oid"]); ?>";
                $("#"+id).attr("selected","selected");
            })	
            $(function(){
                var cid="<?php echo ($data["cid"]); ?>";
                initclass('cid','培训分类','','',cid);
                init(277,191,'cimg');
            })
           
</script>
</body>
</html>