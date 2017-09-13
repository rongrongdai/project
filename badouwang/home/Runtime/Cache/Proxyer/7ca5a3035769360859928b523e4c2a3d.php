<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——个人设置</title>

<link href="__ROOT__/public/css/home/Individualcenter.css" type="text/css" rel="stylesheet" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
<script src="__ROOT__/public/js/validater.js"></script>

</head>
<body>
<div class="per">
    <div class="per-top">
        <img src="__ROOT__/public/images/home/xiaotu.gif" />
        <div class="set-up"><?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>消息</div>
    </div>

    <div class="per-form">
         <form action="" method="post" enctype="multipart/form-data" id="dataform">
         <?php if($type != '2'): ?><div class="pheig">
                    <div class="pflat1">课程名称：</div>
                    <div class="pflat2">
                              <select name="cname" id="cname">
                                <option value="">请选择课程</option>
                                <?php if(is_array($courses)): foreach($courses as $key=>$course): ?><option value="<?php echo ($course["id"]); ?>" id="<?php echo ($course["id"]); ?>"><?php echo ($course['cname']); ?></option><?php endforeach; endif; ?>
                             </select>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>
                <span class="prompt"></span>
		<div class="pheig">
                    <div class="pflat1">开始时间:</div>
                    <div class="pflat2">
                        <input type="text" class="inputcs" id="s_time"  name="s_time" onclick="WdatePicker({isShowWeek:true})" <?php if($data["s_time"] != ''): ?>value="<?php echo (date("Y-m-d",$data["s_time"])); endif; ?>"/>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>

		<div class="pheig">
                    <div class="pflat1">结束时间:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs"  id="e_time"  name="e_time"  onclick="WdatePicker({isShowWeek:true})" value="<?php if($data["s_time"] != ''): echo (date("Y-m-d",$data["e_time"])); endif; ?>"/>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>

                <div class="pheig">
                    <div class="pflat1">课程价格:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs" id="price"  name="price"  value="<?php echo ($data["price"]); ?>"/>
                          
                    </div>
                    <span class="prompt">收费标准：元</span>
          	</div>
                <div class="pheig">
                    <div class="pflat1">使用优惠券：</div>
                    <div class="pflat2">
                              <select name="bid" id="bond">
                                <option value="">请选择优惠券</option>
                                <?php if(is_array($bonds)): foreach($bonds as $key=>$course): ?><option value="<?php echo ($course["id"]); ?>" id="<?php echo ($course["id"]); ?>"><?php echo ($course['name']); ?></option><?php endforeach; endif; ?>
                             </select>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>
                <div class="pheig">
                    <div class="pflat1"> 优惠券张数:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs" id="bnumber"  name="bnumber"  value="<?php echo ($data["bnumber"]); ?>"/>
                          
                    </div>
                    <span class="prompt"> 剩余：<span id='bleft'>0</span>张</span>
          	</div>
                <div class="pheig">
                    <div class="pflat1">招生人数:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs" id="number"  name="number"  value="<?php echo ($data["number"]); ?>"/>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>

		<div class="pheig">
                    <div class="pflat1">优惠价格:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs" id="d_price"  name="d_price"  value='<?php echo ($data["d_price"]); ?>'/>
                          
                    </div>
                    <span class="prompt">收费标准：元/小时</span>
          	</div>


		<div class="pheig">
                    <div class="pflat1">推荐详情:</div>
                    <div class="pflat2">
                              <?php echo ($edit); ?>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>
            <?php else: ?>
		<div class="pheig">
                    <div class="pflat1">课程标题：</div>
                    <div class="pflat2">
                              <input type='text' class="inputcs" name='title' id='title' value='<?php echo ($data["title"]); ?>' /> 
                              
                    </div>
                    <span class="prompt"></span>
          	</div>
                <div class="pheig">
                    <div class="pflat1">老师：</div>
                    <div class="pflat2">
                              <select name="uid" id="uid">
                                <option value="">请选择老师</option>
                                <?php if(is_array($teachers)): foreach($teachers as $key=>$teacher): ?><option value="<?php echo ($teacher["id"]); ?>" id="<?php echo ($teacher["id"]); ?>"><?php echo ($teacher['tname']); ?></option><?php endforeach; endif; ?>
                          </select>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>
                <div class="pheig">
                    <div class="pflat1">家教分类：</div>
                    <div class="pflat2" id="cid"></div>
                    <span class="prompt"></span>
                </div>
                
 		<div class="pheig">
                    <div class="pflat1">上课时间:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs"  id="dtime"  name="dtime"  value="<?php echo ($data["dtime"]); ?>"/>
                    </div>
                    <span class="prompt">可上课时间：如周一，周六，早中晚均可。</span>
          	</div>           
            
 		<div class="pheig">
                    <div class="pflat1">课程图片:</div>
                    <div class="pflat2 pflat2tx">
                              <input type="file" id="timg"  name="c_img" />
                          <?php if($data["c_img"] != ''): ?><img src="__ROOT__<?php echo ($data["c_img"]); ?>"><?php endif; ?>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>  


 		<div class="pheig">
                    <div class="pflat1">课程价格:</div>
                    <div class="pflat2">
                              <input type="text" class="inputcs" id="price"  name="price"   value="<?php echo ($data["price"]); ?>"/>
                         
                    </div>
                     <span class="prompt">收费标准：元/小时</span>
          	</div>

 		<div class="pheig">
                    <div class="pflat1">课程简介:</div>
                    <div class="pflat2">
                              <?php echo ($edit); ?>
                          
                    </div>
                    <span class="prompt"></span>
          	</div>
<!------><?php endif; ?>
<!------>                      
  			<div class="pheig psub">
               <input type="submit"  class="subinput" value="确认<?php if($hand): ?>修改<?php else: ?>添加<?php endif; ?>"  id="perqreng"/>
               <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
               <input type="hidden" name="cid" value=""/>
               <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
               <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
               <input type="hidden" name="type" name="type" value="<?php echo ($type); ?>"/>              
          	</div>                      
        </form>   
   </div>
</div>
<script src="__ROOT__/public/js/home/common.js"></script>
<script src="__ROOT__/public/js/classfiy.js"></script>
<script src="__ROOT__/public/js/datapicker/WdatePicker.js"></script>
<script>
            $("#dataform").submit(function(){
                var type="<?php echo ($type); ?>";
                if(type=='1'){
                    var nullcheck=new Array('cname','s_time','e_time','number','price');
                    var nullinfo=new Array('课程名','开始时间','结束时间','招生人数','课程价格');
                    var res=null_check(nullcheck,nullinfo);
                    if(res){
                          $("#"+res[0]).parent().find(".prompt").text(res[1]).css("color","red");
                          return false;
                    }else{
                          return true;
                    }
                }else{
                     var nullcheck=new Array('title','dtime','price');
                     var nullinfo=new Array('课程标题','开课时间','课程价格');
                     var res=null_check(nullcheck,nullinfo);
                     if(res){
                          $("#"+res[0]).parent().parent().find(".prompt").text(res[1]).css("color","red");
                          return false;
                     }else{
                          var type='';
                          if(!$("#uid").val()){
                              $("#uid").parent().parent().find(".prompt").css("color","red").text("请选择教师！");
                              return false;
                          }
                          $("select[name=class]").each(function(){
                              if($(this).val()){
                                  type=$(this).val();
                              }
                          })
                          if(!/(\d+)(\.?)(\d+)/.test($("input[name=price]").val())){
                              $("input[name=price]").parent().parent().find(".prompt").text("价格格式不正确！").css("color","red");
                          }
                          if(type==='请选择分类'){
                              $("#cid").parent().find(".prompt").css("color","red").text("请选择分类！");
                              return false;
                          }
                          $("input[name=cid]").val(type);
                          
                          return true;
                     }
                }
        })
          $(function(){
                        var s="<?php echo ($course["id"]); ?>";
                        var content="<?php echo ($data["descript"]); ?>"===''?'请输入内容':'<?php echo ($data["descript"]); ?>';
                        var cid="<?php echo ($cid); ?>";
                        var type='';
                        if($("input[name=title]").size()){
                            type='家教分类';
                            initclass('cid',type,'','',cid);
                        }
                        if(content==='请输入内容'){
                            content="<?php echo ($data["introduce"]); ?>"===''?'请输入内容':'<?php echo ($data["introduce"]); ?>';
                        }
                        var csid="<?php echo ($data["cid"]); ?>";
                        $("select[name=cname]").find("option").each(function(){
                            if($(this).val()===csid){
                                $(this).attr("selected","selected");
                            }
                        });
                        $("#"+s).attr("selected","selected");
                        ue.options.autoClearinitialContent=false;
                        ue.options.initialContent=content;
                        $("#bond").change(function(){
                           if(!$(this).val()){
                               return;
                           }
                           $.getJSON('__ROOT__/index.php/Ajax/AjaxConsume/getBnumber',{'bid':$(this).val()},function(data){
                               if(data.code===1){
                                   $("#bleft").text(data.bond.curnumber);
                               }
                           });
                        })
                         $("#bond").change();
                }) 	

</script>
</body>
</html>