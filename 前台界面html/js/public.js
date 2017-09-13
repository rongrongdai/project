new function (){
	var _self = this;
	_self.width = 640;//设置默认最大宽度
	_self.fontSize = 100;//默认字体大小
	_self.widthProportion = function(){var p = (document.body&&document.body.clientWidth||document.getElementsByTagName("html")[0].offsetWidth)/_self.width;return p<0.5?0.5:p;};
	
	var lastProportion = _self.widthProportion()>0.75?0.75:_self.widthProportion();
	_self.changePage = function(){
		document.getElementsByTagName("html")[0].setAttribute("style","font-size:"+lastProportion*_self.fontSize+"px !important");
	}
	_self.changePage();
	window.addEventListener("resize",function(){_self.changePage();},false);
};

/*
 *	===jw===
 *	对话框（用法$(element).JWdialog({ state: "open", success: function() { //执行内容 } })）
 *	state 打开或关闭
 *  success 点击确定执行
 */
if (window.$ && window.jQuery) {
	(function ($){
		$.fn.extend({
			Jdialog: function (param) {
				var element = this;
				var opt = $.extend({}, defaults, param);

				if (!opt.state || opt.state == "open") {
					element.open();
					element.setContent(opt);
					element.bindClick(opt);
				}else if (opt.state == "close") {
					element.close();
				}
			},
			setContent: function(param){
				var scrop = this;
				if (param.title) {
					scrop.find(".Jdialog_content").children("h3").html(param.title);
				}
			},
			bindClick: function(param){
				var scrop = this;

				if (scrop.find("input").length > 0) {
					scrop.find("input").siblings("span.remove").click(function(){
						$(this).siblings("input").val("");
					});
				}

				var attr = param.submit.split(",");
				var submita = scrop.find(".Jdialog_submit").children("a");
				if (submita.length == 1) {
					submita.eq(0).addClass("big");
				}
				submita.eq(0).off("click").click(function(){
					param.cancel();
				});
				if (attr[0]) {
					submita.eq(0).html(attr[0]);
				}
				submita.eq(1).off("click").click(function(){
					param.success();
				});
				if (attr[1]) {
					submita.eq(1).html(attr[1]);
				}
			},
			open: function(){
				var scorp = this;
				scorp.addClass("animDialog");
				scorp.find("input").off("focus").focus(function(){
					$(this).parents(".dialog_main").css("vertical-align","top");
				});
				scorp.find("input").off("focusout").focusout(function(){
					$(this).parents(".dialog_main").css("vertical-align","middle");
				});
				scorp.find(".dialog_foot").children("a.cancel").off("click").click(function(){
					scorp.close();
				});
			},
			close: function(){
				this.children(".dialog_main").css("vertical-align","middle");
				this.removeClass("animDialog");
			},
			//提示框
			Jtip: function(title, times){
				var element = this;

				var titleTemp = title;
				var timeTemp = times || 1500;

				if (titleTemp) {
					element.find(".Jtip").children("p").html(titleTemp);
				}
				element.addClass("animDialog");
				setTimeout(function(){
					element.removeClass("animDialog");
				},timeTemp);
			}
		});

		//默认参数
		var defaults = {
			state: 'open',
			title: '',
			submit: '',
			cancel: function(){},
			success: function(){}
		}

	})(jQuery);
}

/*获取验证码*/
function getCodefun(){
	var me = {};
	var wait=60;
	me.time = function(obj) { 
		if (wait == 0) { 
			obj.text("获取验证码"); 
			wait = 60; 
		}else { 
			obj.text(wait + "s"); 
			wait--;
			setTimeout(function(){ 
				me.time(obj);
			},1000);
		} 
	} 
	me.getCodeBindEvent = function(obj,phone,type){
        obj.on('tap',{phone:phone,type:type},function(e){
        	var p = e.data.phone;
        	var type = e.data.type;
        	var num = (typeof(p) == 'object')?p.val():p;
        	if(Number(num)&&(num+'').length==11){
	            me.time(obj);
	            $(this).off('tap');
	            if(type=='0'){
	            	console.log(type);
	            }
        	}else{
        		console.log('号码为空或格式不对');
        	}
        });
        setTimeout(function(){ 
            me.getCodeBindEvent(obj);
        },wait*1000);
    }
	return me;
}

var wait = 120;
function timeput(type,_this,_url) {
	var time;
	var param=_this;
    if (wait == 0) {  
    	$(_this).text("获取验证码");  
        clearTimeout(time);
        wait=120;
        $('.get-code').on('tap', function() {
			getCode(type,_this,_url);
		})
    } else {  
    	$(_this).off('tap');
    	$(_this).text(wait+"s");  
        wait--;  
        time=setTimeout(function() {  
        	timeput(type,param,_url);
        }, 1000);
    }  
}  

function getCode(type,_this,_url) {
	var phone = $("input[name='phone']").val();
	var param = "phone=" + phone + "&type=" + type;
	$.ajax({
		url : _url,
		data : param,
		success : function(data) {
			if (!data.success) {
			} else {
				timeput(type,_this,_url);
			}
			$('.social').addClass('active');
			$('.top').text(data.msg);
            setTimeout(function(){
                $('.social').removeClass('active');
            },1000);
		}
	})
}
/* 格式化金额 */
function formatAmount(s, n) {  
    n = n > 0 && n <= 20 ? n : 2;  
    s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";  
    var l = s.split(".")[0].split("").reverse(), r = s.split(".")[1];  
    t = "";  
    for (i = 0; i < l.length; i++) {  
       // t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");  
    	 t += l[i] ;  
    }  
    return t.split("").reverse().join("") + "." + r;  
} 

/*将时间戳转换为日期格式*/
function parseDate(obj){
	var test = new Date(parseInt(obj) * 1000);  
	    var $_year = test.getFullYear();  
	    var $_month = parseInt(test.getMonth())+1;  
	    var $_day = test.getDate();  
	    var $_f_date =  $_year +"-"+$_month+"-"+$_day;  
	    return $_f_date;
}
//页面跳转
function toUrl(url){
	window.location.href=url;
}

//iscroll 调整内容高度，并刷新
function setContentHeight($wrapperId,scrollerObj){
	var scroller = $wrapperId.children('div').eq(0),
		contWrapper = scroller.children('div').eq(1),
		contRealHeight = contWrapper.children('div').eq(0).height()*contWrapper.children('div').size();
    if($wrapperId.height()>=contRealHeight){
    	contWrapper.css('height',$wrapperId.height());
    }else{
    	contWrapper.css('height','auto');
    }
    scrollerObj.refresh();
}

//通用提示
function commonTips(className,msg,time){
    var _obj = $('.'+className);
    _obj.text(msg);
    _obj.addClass(className+'-show');
    setTimeout(function(){
        _obj.addClass(className+'-fadeout');
    },time);
    setTimeout(function(){
        _obj.addClass(className+'-fadein');
        _obj.removeClass(className+'-show');
    },time*2);
}

/*数字键盘*/
function enterPsw($wrapper,parms){

    var me = {};
    var parms = parms?parms:{
        title:'支付',
        amount:'0',
        faliedUrl:'',
        pay:function(){
            return;
        }
    }
    
    var $bg = $('<div class="bg-layer"></div>');
    
    var $panel = $('<div class="alert"><div class="a-header"><span class="a-close"></span><span>请输入支付密码</span><span class="a-pw">忘记密码</span></div><div class="a-body"><p class="a-type">'+parms.title+'</p><p class="a-num">￥'+parms.amount+'</p><div class="a-pw-wrap"><span contenteditable="false"><i></i></span><span contenteditable="false"><i></i></span><span contenteditable="false"><i></i></span><span contenteditable="false"><i></i></span><span contenteditable="false"><i></i></span><span contenteditable="false"><i></i></span></div><input type="text" class="psw"></div></div>');
     
    var $keyboard = $('<div class="num-keyboard"><table><tr><td class="num-td">1</td><td class="num-td">2</td><td class="num-td">3</td></tr><tr><td class="num-td">4</td><td class="num-td">5</td><td class="num-td">6</td></tr><tr><td class="num-td">7</td><td class="num-td">8</td><td class="num-td">9</td></tr><tr><td class="grey-bg"></td><td class="num-td">0</td><td class="grey-bg del-td"><img src="../images/del-btn.png" alt=""></td></tr></table></div>');
    //支付失败
    var $payFailed = $('<div class="alert pay-fail-popup"><div class="a-info">支付失败</div><div class="a-btn"><div class="cancel">重试</div><div class="change-card">取消</div></div></div>');

    $wrapper.append($bg).append($panel).append($keyboard).append($payFailed);
    //数字按钮
    $keyboard.find('.num-td').on('tap',function(){
        $(this).addClass('active');
        var _that = this;
        setTimeout(function(){
            $(_that).removeClass('active');
        },100);
        var currNum = $(this).text();
        var psw = $panel.find('.psw').val();
        
        if(psw.length<6){
            $panel.find('.a-pw-wrap>span').eq(psw.length).addClass('active');
            $panel.find('.psw').val(psw+currNum);
        }
        if($panel.find('.psw').val().length==6){
            parms.pay();
            $panel.find('.a-pw-wrap>span').removeClass('active');
            $panel.find('.psw').val('');
        }
    });
    //删除按钮
    $keyboard.find('.del-td').on('tap',function(){
        $(this).addClass('active');
        var _that = this;
        setTimeout(function(){
            $(_that).removeClass('active');
        },100);
        var psw = $panel.find('.psw').val();
        if(psw.length>0){
            $panel.find('.a-pw-wrap>span').eq(psw.length-1).removeClass('active');
            $panel.find('.psw').val(psw.substring(0,psw.length-1));
        }
    });
    //关闭按钮
    $panel.find(".a-close").on("tap",function(e){
        me.close();
    });
    //重试
    $payFailed.find('.cancel').on("tap",function(e){
        me.payFailedclose();
        me.show();
    });
    //取消
    $payFailed.find('.change-card').on("tap",function(e){
        me.payFailedclose();
        //跳转到首页
        window.location = parms.faliedUrl;
    });
    me.close = function(){
        $panel.removeClass('alert-show');
        $keyboard.removeClass('num-keyboard-show');
        //setTimeout(function(){
            $bg.css("display","none");
        //},200);
    }
    me.show = function(){
        $bg.css('display','block');
        $panel.addClass('alert-show');
        $keyboard.addClass('num-keyboard-show');
    }
    me.payFailedshow = function(msg){
        if(msg){
            $payFailed.find('.a-info').text(msg);
        }
        $bg.css('display','block');
        $payFailed.addClass('alert-show');
    }
    me.payFailedclose = function(){
        $bg.css('display','none');
        $payFailed.removeClass('alert-show');
    }
    return me;
}

/*confirm,弹窗*/
function confirmWin($wrapper,parms){
    var me = {};
    var parms = parms?parms:{
        title:'支付',
        leftBtnText:'cancel',
        rightBtnText:'confirm',
        cancel:function(){
            return;
        },
        confirm:function(){
            return;
        }
    }
    var $bg = $('<div class="bg-layer"></div>');
    var $confirmPanel = $('<div class="alert confirm-popup"><div class="a-info"></div><div class="a-btn"><div class="a-btn-left"></div><div class="a-btn-right"></div></div></div>');
    $wrapper.append($bg).append($confirmPanel);
    //left btn
    $confirmPanel.find('.a-btn-left').on("tap",function(e){
        parms.cancel();
    });
    //right btn
    $confirmPanel.find('.a-btn-right').on("tap",function(e){
        parms.confirm();
    });
    me.close = function(){
        $confirmPanel.removeClass('alert-show');
        //setTimeout(function(){
            $bg.css("display","none");
        //},200);
    }
    me.show = function(){
        $bg.css('display','block');
        $confirmPanel.addClass('alert-show');
    }
    me.init = function(){
        $confirmPanel.find('.a-info').text(parms.title);
        $confirmPanel.find('.a-btn-left').text(parms.leftBtnText);
        $confirmPanel.find('.a-btn-right').text(parms.rightBtnText);
    }
    me.init();
    return me;
}

    /*方块加载动画*/
    function blockLoading($obj,parms){
        var me = {}
        var parms =parms?parms:{
            num:'4',
            time:400
        }
        me.index = 0;
        me.autoChange = new Object();
        me.loading = function(){
            $obj.children('div').each(function(){
                if($(this).index() != me.index%parms.num){
                    $(this).removeClass('active');
                }else{
                    $(this).addClass('active');
                }
            });
            me.index++;
        }
        me.init = function(){
            for(var i = 0;i<parms.num;i++){
                $obj.append('<div></div>');
            }
            $obj.children('div').eq(0).addClass('active');
        }
        me.show = function(){
            me.autoChange = window.setInterval(me.loading,parms.time);
        }
        me.close = function(){
            window.clearInterval(me.autoChange);
            $obj.css('display','none');
        }
        me.init();

        return me;
    }
    /*旋转加载动画*/
    function revolveLoading($obj){
        var me = {}
        me.init = function(){
            $obj.append('<div></div>');
            console.log($obj);
        }
        me.show = function(){
            $obj.addClass('revolve-loading');
        }
        me.close = function(){
            $obj.removeClass('revolve-loading');
        }
        me.init();

        return me;
    }
