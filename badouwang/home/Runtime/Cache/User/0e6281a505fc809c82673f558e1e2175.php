<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>八斗网——找回密码</title>

<link rel="stylesheet" href="__ROOT__/public/css/home/style.css" />
<script src="__ROOT__/public/js/jquery-min.js"></script>
</head>
<body>
<div id="allba">
     <div id="thehead">
        <div class="theheadone">
             <img onerror="javascript:this.src='__ROOT__/public/images/home/n_pic.png';"  src="__ROOT__/public/images/home/fheader.gif" />
        </div>
       <div class="theheadtwo" >
            <div class="retrievpasdwd" name="efind">
                 <div class="retrievpasdwdyuan"></div>
                 <p class="yuanwen">1</p>
                 <div class="retrievpasdwdzhengfx"></div>
                 <div class="retrievpasdwdyuanyi"></div>
                 <p class="yuanwenyi">2</p>
                 <div class="retrizhengfxer"></div>
                 <div class="retrievpasdwdyuaner"></div>
                 <p class="yuanwener">3</p>
                <div class="repaemill">输入邮箱地址</div>
                <div class="repaemillone">邮箱验证</div>
                <div class="repaemilltwo">重置密码</div>
                
                <div style="clear:both;"></div>
                    <div class="retemailinput">
                    <input type="email" id="email" name="email" value="" placeholder="请输入注册时使用的邮箱地址" />
                    </div>
                 <?php if($p_question != ''): ?><span style="position: relative;top:-80px;left:160px;cursor: pointer;" name="pname">使用密保找回</span><?php endif; ?>
                <div class="retrzhaomim">
                    <input type="submit"  value="找回密码" name="find"> 
                        
                </div>
                 
                
            </div>
          <div class="retrievpasdwd" style="display:none" name="pfind">
                 <div class="retrievpasdwdyuan"></div>
                 <div>
                 <p class="yuanwen">1</p>
                 <div class="retrievpasdwdzhengfx"></div>
                 <div class="retrievpasdwdyuanyi"></div>
                 <p class="yuanwenyi">2</p>
                 <p class="yuanwener">3</p>
                <div class="repaemill" style="top:-120px;">输入密保</div>
                <div class="repaemillone" style="top:-140px;">修改密码</div>
                </div>
                
                <div style="clear:both;margin-top:50px;"></div>
                <div style="position:relative;top:-160px;"><span>问题：</span><span id="p_find"></span></div>
                <span style="position: relative;top:-40px;left:160px;cursor: pointer;" name="ename">使用邮箱找回</span>
                    <div class="retemailinput">
                    <input type="email" id="answer" name="answer" value=""   />
                    </div>
                
                <div class="retrzhaomim">
                    <input type="submit"  value="确认" name="comfirm"> 
                </div>
            </div>
           <script src="__ROOT__/public/js/validater.js"></script>
           <script src="__ROOT__/public/js/layer/layer-min.js"></script>
          
           <script>
               $(function(){
                   var pname="";
                   $("input[name=find]").click(function(){
                       var loadi = layer.load('邮件发送中…');
                       if($("#email").val()){
                           $.get('__ROOT__/index.php/Ajax/AjaxAuthcate/sendFPwdMail',{'email':$("#email").val()},function(data){
                                    layer.close(loadi);
                                     var res=eval("("+data+")");
                                     if(res.code==1){
                                         location.href="__ROOT__/index.php/User/User/fpassword?email="+$("#email").val();
                                     }
                                })
                            }else{
                                          $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '邮箱格式不正确！'}});
                            }
                   })
                   //密保找回
                    $("input[name=comfirm]").click(function(){
                        if(!$("#answer").val()){
                            $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: 2,msg: '请输入密保答案！'}});
                        }else{
                            var email="<?php echo ($email); ?>";
                            $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/valiP',{'answer':$("#answer").val(),'uname':email},function(data){
                                
                                if(data.code==='1'){
                                    location.href='__ROOT__/index.php/User/User/fpassword?email='+email;
                                    return;
                                }
                                var type=data.code==='1'?1:2;
                                $.layer({type: 0,title: '操作提示',maxmin: true,shadeClose: true,area : ['300px' , '200px'],offset : ['200px', ''],dialog: {type: type,msg: data.message}});
                            });
                        }
                    })
                   $("span[name=pname]").click(function(){
                       $("div[name=pfind]").show();
                       $("div[name=efind]").hide();
                       var email="<?php echo ($email); ?>";
                            if(!pname){
                                 $.getJSON('__ROOT__/index.php/Ajax/AjaxUser/getP',{'uname':email},function(data){
                                 pname=data.data.p_question;
                                 $("#p_find").text(pname);
                            })
                       }
                      
                   });
                   $("span[name=ename]").click(function(){
                       $("div[name=efind]").show();
                       $("div[name=pfind]").hide();
                   });
               })
              
           </script>
         </div>
     </div>
</div>
</body>
</html>