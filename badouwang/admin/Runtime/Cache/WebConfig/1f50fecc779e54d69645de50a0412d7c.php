<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title>八斗网-管理后台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="stylesheet" href="__ROOT__/public/css/admin/style.css" />
	<script src="__ROOT__/public/js/jquery-min.js"></script>
       
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" media="all" /><![endif]-->
	<!--[if lt IE 9]><link rel="stylesheet" href="css/lt-ie-9.css" media="all" /><![endif]-->
</head>
<body >


<link rel="stylesheet" href="__ROOT__/public/css/admin/classfiy.css" />
<link href="__ROOT__/public/css/admin/houtai.css"   type="text/css"  rel="stylesheet"  />
<script src="__ROOT__/public/js/validater.js"></script>
<div class="p_position"><span>当前位置></span><?php echo ($position); ?></div>
<section class="content" >
    <section class="widget">
        <div class="widget-container">
                <div class="houall">
                    <div class="houone">
                         <div class="hou-yi">
                             
                         </div>
                
                <div>
                <table id='ctable' style="margin-top:40px;">
                    <tr name="class" id="0">
                        <td class='left' style="text-align: center">分类名：</td>
                        <td style='width:400px;'>
                            <select name='cname'>
                                <option value='新分类' name="new">新分类</option>
                            </select>
                            <span class="button blue" name="mclass">修改</span> <span class="button blue" name="dclass">删除</span>
                        </td>
                    </tr> 

                </table>
            
            <form action="__ROOT__/admin.php/WebConfig/Classfiy/saveClassfiy" method="post" enctype="multipart/form-data" id="nclass" >
                <table class='new'>
                     <tr >
                        <td class='left'>新建分类名：</td>
                        <td>
                            <input type='text' name='name' id="name" value=''/>
                            <br/><span class="hint"></span>
                        </td>
                     </tr> 
                      <tr>
                        <td class='left'>分类广告图片：</td>
                        <td>
                            <div class="button blue" id="c_img" style="width:60px;margin-left:10px;"> 
                                选择图片：                            
                            </div>
                                <input id="cimg" name="cimg" type="file" multiple="true" style="display:none" self="file_upload">
                                <br/><span class="hint"></span>
                        </td>
                     </tr> 
                     <tr>
                        <td class='left'>分类广告文字：</td>
                        <td>
                            <textarea style="margin:10px;width:300px;height: 100px;" name="ctextbrand" id="ctextbrand">
                                
                            </textarea>
                            <br/><span class="hint"></span>
                        </td>
                     </tr> 
                      
                     <tr>
                         <td colspan="2">
                            <input type='submit'  value='保存' class='blue save' />
                        </td>
                     </tr>
                </table>
                <input type="hidden" name="pname" value=""/>
                <input type="hidden" name="token" value="<?php echo ($token); ?>"/>
                <input type="hidden" name="timestamp" value="<?php echo ($timestamp); ?>"/>
            </form>
                    

        </div>
        <div class="content cycle">
			<div id="flot-example-2" class=""></div>
			<div id="flot-example-1" class=""></div>
		</div>
        </div>
    </section>
    <div class="footinfo">
        <div style="height:80px">
		Copyright(c)2013 badoue.com 深圳百士兴科技有限公司版权所有 All Rights Reserved 粤ICP备13084511号-2
        </div>
                    
    </div>
    </div>
</section>




<script src="__ROOT__/public/js/layer/layer-min.js"></script>
<script src="__ROOT__/public/js/jquery.form.js"></script>
<script src="__ROOT__/public/js/admin/common.js"></script>
</body>
</html>

<script>
    function hinit(){
        $("span[name=mclass]").click(function(){
                   var cname=$(this).parent().find("select").val();
                   if(cname!='新分类'){
                       location.href="entity?cname="+cname;
                   }
                   
        })
        $("span[name=dclass]").click(function(){
                   var cname=$(this).parent().find("select").find("option:selected").attr("cid");
                   if(cname!='新分类'){
                       location.href="delClass?cname="+cname;
                   }
                   
        })
    };
    var options='';
    $(function(){
        $("#nclass").submit(function(){
            var pk=$("tr[name=class]:last").attr("id")-1;
            var pname=$("#"+pk).find("select").find("option:selected").attr("cid");
            if(pname){
                $("input[name=pname]").val(pname);
            }
            var nullarr=new Array("name");
            var nullinfo=new Array("分类名");
            var res=null_check(nullarr,nullinfo);
            if(!res){
               if($("#name").val().match("'")){
                   $("#cname").parent().find(".hint").text('分类名中不能有逗号！');
                   return false;
               }
               if($("#ctextbrand").val().match("'")){
                   $("#ctextbrand").parent().find(".hint").text('分类广告中不能有逗号！');
                   return false;
               }
               var options = {
                            type:'post',
                            url:'__ROOT__/admin.php/WebConfig/Classfiy/saveClassfiy',
                            success: function (data) {
                                data=eval('('+data+')');
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg:''+data.message}});
                            }
                        };
               $("#nclass").ajaxSubmit(options);
               
               return false;
            }else{
                $("#"+res[0]).parent().find(".hint").css("color","red").text(res[1]);
                return false;
            }
            
           
        })
    })
    function delc(number,cname){
        if(cname){
                     $("#ctable").find("tr[name=class]").each(function(){
                       if($(this).attr("id")>number){
                           $(this).remove();
                           append(cname,number);
                       }
                   })
               }else{
                    $("#ctable").find("tr[name=class]").each(function(){
                       if($(this).attr("id")>number){
                           $(this).remove();
                       }
                   })
               }
        
    }
    //显示分级
    function handleappend(content,i,cname){
         var id='';
         $("option").each(function(){
             if($(this).val()===cname){
                 id=$(this).attr('cid');
             }
         })
         var width=parseInt($("#ctable").find(".left:first").css("width").replace("px",""));
         $("#ctable").append(content);
         $("#ctable").find(".left").css("width",width+(i*2)+"px");
         ajaxGet("__ROOT__/admin.php/Ajax/AjaxClassfiy/getClassesByParent",{'cname':id},getOptions,true);
    }
    //获取子分类
    function getOptions(data){
      var res=eval("("+data+")");
      var options='';
      if(res){
          for(r in res){
              options+="<option value='"+res[r].name+"' cid="+res[r].id+">"+res[r].name+"</option>";
          }
      }
      $("tr[name=class]:last").find("select").append(options);
    }
    //扩增分类
   function append(content,i){
             i++;
             var cf="tr[id="+(i)+"]";
             var c=$("#ctable").find(cf).size();
             if(c<1){
                 if(content!="新分类"){
                     content=$("#"+(i-1)).find("select").val();
                    var contentv="<tr name='class' id='"+i+"'><td class='left' style='padding-left:"+(i*30)+"px'>"+content+"：</td><td>"+
                                   "<select name='nname '"+"onchange='append("+'"'+content+'","'+i+'"'+")'>"+"<option value='新分类'>新分类</option>"+"</select><span class='button blue' name='mclass'>修改</span> <span class='button blue' name='dclass'>删除</span></td></tr> ";
                   
                    handleappend(contentv,i,content);
                    hinit();
                 }
            }else{
                var sid="#"+(i-1);
                 content=$(sid).find("select").val();
                if(content!='新分类'){
                    delc(i-1,content);
                
                }else{
                     delc(i-1);
                }
            }
        }
   $(function(){
       var i=1;
       $("select[name=cname]").change(function(){
             var cname=$(this).val();
             var nc=parseInt($(this).parent().parent().attr('id'));
           if(cname!='新分类'){
                var cf="tr[id="+(nc+1)+"]";
                var c=$("#ctable").find(cf).size();
               if(c<1){
                   var content="<tr name='class' id='"+i+"'><td class='left' style='padding-left:"+(i*30)+"px'>"+cname+"：</td><td>"+"<select name='cname' "+"onchange='append("+'"'+cname+'","'+i+'"'+")'>"+
                            "<option value='新分类'>新分类</option>"+
                            "</select><span class='button blue' name='mclass'>修改</span> <span class='button blue' name='dclass'>删除</span></td></tr> ";
                
                    handleappend(content,i,cname);
                    i++;
                    hinit();
               }else{
                   delc(nc,cname);
               }
            }else{
                delc(nc);
            }
           
       })
       
   })
   function handle(data){
      var res=eval("("+data+")");
      if(res){
          for(r in res){
              var option="<option value='"+res[r].name+"'>"+res[r].name+"</option>";
              $("option[name=new]").before(option);
          }
      }
   }
   $(function(){
               $.get("__ROOT__/admin.php/Ajax/AjaxClassfiy/getClassesByParent",null,function(data){
                   data=eval("("+data+")");
                   for(i in data){
                       $("#0").find("select").append("<option value ="+data[i].name+" cid="+data[i].id+">"+data[i].name+"</option>");
                   }
               })
               hinit();
       })
</script>