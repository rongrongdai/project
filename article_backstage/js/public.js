// JavaScript Document
function show(popupdiv)
{
var Idiv=document.getElementById(popupdiv);
Idiv.style.display="block";
//以下部分要将弹出层居中显示
Idiv.style.left=(document.documentElement.clientWidth-Idiv.clientWidth)/2+document.documentElement.scrollLeft+"px";
Idiv.style.top=(document.documentElement.clientHeight-Idiv.clientHeight)/2+document.documentElement.scrollTop-50+"px";
//以下部分使整个页面至灰不可点击
var procbg = document.createElement("div"); //首先创建一个div
procbg.setAttribute("id","mybg"); //定义该div的id
procbg.style.background = "#000000";
procbg.style.width = "100%";
procbg.style.height = "100%";
procbg.style.position = "fixed";
procbg.style.top = "0";
procbg.style.left = "0";
procbg.style.zIndex = "500";
procbg.style.opacity = "0.6";
procbg.style.filter = "Alpha(opacity=70)";
//背景层加入页面
document.body.appendChild(procbg);

//以下部分实现弹出层的拖拽效果
var posX;
var posY;
Idiv.onmousedown=function(e)
{
if(!e) e = window.event; //IE
posX = e.clientX - parseInt(Idiv.style.left);
posY = e.clientY - parseInt(Idiv.style.top);
document.onmousemove = mousemove;
}
document.onmouseup = function()
{
document.onmousemove = null;
}
function mousemove(ev)
{
if(ev==null) ev = window.event;//IE
Idiv.style.left = (ev.clientX - posX) + "px";
Idiv.style.top = (ev.clientY - posY) + "px";
}
}
function closeDiv(popupdiv) //关闭弹出层
{
var Idiv=document.getElementById(popupdiv);
Idiv.style.display="none";
document.body.style.overflow = "auto"; //恢复页面滚动条
var body = document.getElementsByTagName("body");
var mybg = document.getElementById("mybg");
body[0].removeChild(mybg);
}
//侧边栏点击展开
$(document).ready(function(){
    /* 滑动/展开 */
    $("ul.expmenu li > h2").click(function(){
        var arrow = $(this).find("span.arrow");
        if(arrow.hasClass("up")){
            arrow.removeClass("up");
            arrow.addClass("down");
        }else if(arrow.hasClass("down")){
            arrow.removeClass("down");
            arrow.addClass("up");
        }
        $(this).parent().find("ul.menu").slideToggle("slow").siblings("ul.menu:visible").slideUp("slow");

    });
    //顶部点击头像退出
//            退出登录
    $(".user_photo").click(function(){
        var Popup=$(".down_menu");
        if(Popup.hasClass("hide")){
            Popup.removeClass("hide");
        }else {
            Popup.addClass("hide");
        }
    });
    //点击展开添加的栏目
    $(".addLm").click(function(){
        $(".columnA").show();
    });

    $(".rigImy").click(function () {
        $(".popupSe").addClass("hide");
        var index=$(this).index();
        $(".popupSe").eq(index).removeClass("hide");
    });
    //个性签名
    var notice=$(".signature").siblings($(".notice"));
    $('.signature').keyup(function(event) {
        var val = $(this).val();

        if(val.length > 12){
            val = val.substr(0, 12);
            $(this).val(val);
        }
        // $(this).val(val);
        // $(this).focus();
        notice.text('还可以输入'+(12-val.length)+'个字符');
    });
});

//   兼容ie9的placeholder
function isPlaceholder(){
    var input = document.createElement('input');
    return 'placeholder' in input;
}
if (!isPlaceholder()) {//不支持placeholder 用jquery来完成
    $(document).ready(function() {
        if(!isPlaceholder()){
            $("input").not("input[type='password']").each(//把input绑定事件 排除password框
                function(){
                    if($(this).val()=="" && $(this).attr("placeholder")!=""){
                        $(this).val($(this).attr("placeholder"));
                        $(this).focus(function(){
                            if($(this).val()==$(this).attr("placeholder")) $(this).val("");
                        });
                        $(this).blur(function(){
                            if($(this).val()=="") $(this).val($(this).attr("placeholder"));
                        });
                    }
                });
            //对password框的特殊处理1.创建一个text框 2获取焦点和失去焦点的时候切换
            $("input[type='password']").each(
                function() {
                    var pwdField    = $(this);
                    var pwdVal      = pwdField.attr('placeholder');
                    pwdField.after('<input  class="login-input" type="text" value='+pwdVal+' autocomplete="off" />');
                    var pwdPlaceholder = $(this).siblings('.login-input');
                    pwdPlaceholder.show();
                    pwdField.hide();

                    pwdPlaceholder.focus(function(){
                        pwdPlaceholder.hide();
                        pwdField.show();
                        pwdField.focus();
                    });

                    pwdField.blur(function(){
                        if(pwdField.val() == '') {
                            pwdPlaceholder.show();
                            pwdField.hide();
                        }
                    });
                })
        }
    });
}

