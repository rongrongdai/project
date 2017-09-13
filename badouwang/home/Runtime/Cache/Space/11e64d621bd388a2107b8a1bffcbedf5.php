<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
<style>
body{margin:0;}
/**/
.look{width:1000px; }
.look .label{background:#009170;height:50px;}
.look .label a{width:140px;border-right:1px solid #FFF;background:#009170; text-decoration:none;position:relative; text-align:center;color:#FFF;display:block;float:left;/* CSS3 HTML5*/transition:background ease .6s;}
.look .label a:hover {background:#3ad53d;}
.look .label .hover{background:#3ad53d;}
.look .label a span{width: 0;height: 0; position:absolute;top:38px;left:46%;}
.look .label a .bel{border-color:transparent transparent #FFF transparent ;border-style: solid;border-width: 6px 6px 6px 6px;}

/**/
.look .content{}
.look .fom{width:500px;margin:10px auto;}
.look .fom .inputcs{width:240px;height:36px;padding:0 5px;border:1px solid #009170;border-right:none;outline:none;border-radius:4px 0 0 4px;transition: box-shadow ease .6s;}
.look .fom .inputcs:focus{box-shadow:inset 0 0 8px #00b38a;transition: box-shadow ease .6s;}
.look .fom .subcs{width:60px;height:38px;background:#009170;border:none;color:#FFF;cursor:pointer;border-radius:0 4px 4px 0;transition:background ease .6s;}
.look .fom .subcs:hover{background:#3ad53d;}
.look .fom .hyh{float:right;padding:20px 100px 0 0;font-size:14px;color:#555; cursor:pointer;background:none;border:none; outline:none;}
/**/
.look .css3bel{border:1px solid #eee;overflow:hidden;height:300px; position:relative;}
.look .css3bel a{display:block;border-radius:50%;text-align:center; position:absolute;color:#FFF;transition: background ease .3s;}
.look .css3bel a:hover{background-color:#3ad53d;}

</style>
</head>

<body>

<div class="look">
    <div class="label">
    	<a href="#"><p>官方推荐</p><span></span></a>
    	<a href="#"><p>认证用户</p><span></span></a>
    	<a href="#" class="hover"><p>按标签</p><span class="bel"></span></a>
    	<a href="#"><p>按地区</p><span></span></a>
    </div>
    <div class="content">
       	<div class="fom">
           	<form action="" name="" method="post">
               	<input type="text" name="" class="inputcs" /><input type="submit" name="" class="subcs" value="查找" />
                <input type="submit" class="hyh" name="" value="换一换">
            </form>
        </div>
      	<div class="css3bel">
           	<a href="#" id="css1">美女</a>
           	<a href="#" id="css2">校花</a>
           	<a href="#" id="css3">男神</a>
           	<a href="#" id="css4">宅男</a>
           	<a href="#" id="css5">优秀教师</a>
           	<a href="#" id="css6">游戏</a>
        </div>
    </div>
</div>




<script src="jq.js"></script>
<script>
$('.label a').click(function(){
	$('.label a').removeClass('hover')
	$(this).addClass('hover');
	$('.label a span').removeClass('bel')
	$(this).find('span').addClass('bel');
	})

for(i=0;i<7;i++){
	var Top = Math.floor(Math.random()*190);//parseInt(Math.random()*上限+1); 
	var Left = Math.floor(Math.random()*900);
	var hei = Math.floor(Math.random()*4);
	var rgb1 = Math.floor(Math.random()*255);
	var rgb2 = Math.floor(Math.random()*255);
	var rgb3 = Math.floor(Math.random()*255);
	var Hei = Array('110','100','90','80');
	var bac = Array('#F93','#F03','#C93','#D66')
	$('#css' + i).css({top:Top,left:Left,height:Hei[hei],width:Hei[hei],lineHeight:Hei[hei]+'px',backgroundColor:'rgb('+rgb1+','+rgb2+','+rgb3+')'});
	}	
function runt(){
for(i=0;i<7;i++){
	var Top = Math.floor(Math.random()*190);//parseInt(Math.random()*上限+1); 
	var Left = Math.floor(Math.random()*900);
	var hei = Math.floor(Math.random()*4);
	var rgb1 = Math.floor(Math.random()*255);
	var rgb2 = Math.floor(Math.random()*255);
	var rgb3 = Math.floor(Math.random()*255);
	var Hei = Array('110','100','90','80');
	var bac = Array('#F93','#F03','#C93','#D66')
	$('#css' + i).css({top:Top,left:Left,height:Hei[hei],width:Hei[hei],lineHeight:Hei[hei]+'px',backgroundColor:'rgb('+rgb1+','+rgb2+','+rgb3+')'});
	}	
}

function Random(){
for(i=1;i<7;i++){
	var csstop = document.getElementById('css'+ i).style.top.replace(/px/,'');
	var Top = Math.floor(Math.random()*190);
	var Left = Math.floor(Math.random()*900);
	var hei = Math.floor(Math.random()*4);
	$('#css' + i).animate({
		top:Top,
		left:Left
	},18000);
	}
	setTimeout('Random()',22000)	
}
Random();
$('.hyh').click(function(){
	Random();
	runt();
	})



//父页面获取框架高度自动调整
ifram()   //运行
var he = $(document).height();
function ifram(){	$(window.parent.document).find("#irm").load(function(){	$(this).height(he);	}) 		}
$(window).resize(function () { ifram()  })// 改变浏览器可视窗口宽度与高度
</script>
</body>
</html>