<?php if (!defined('THINK_PATH')) exit();?>
<link rel="stylesheet" href="__ROOT__/public/css/home/Individualcenter.css">


<div class="Coner">
  <div class="Cow-left">
    <div class="Conten-tone">我的会员信息</div>    
    <div class="Con-tit Ct-grzx">
      <div class="ma mar">用户中心</div>
    </div>

    <div class="Coner-con" id="Ct-grzx" style="display:block">
        <a href="index" target="ifrm" <?php if(!$page): ?>class="aclick"<?php endif; ?> >基本信息</a>
        <a href="uset" target="ifrm" >个人设置</a>
        <a href="changepwd" target="ifrm">安全中心</a>
        <a href="appointment" target="ifrm">我的预约</a>
        <a href="tsmgement"  target="ifrm" <?php if($page == 'tsmgement'): ?>class="aclick"<?php endif; ?> >我的信息</a>



        <a href="invite" target="ifrm">我的推广</a>
        <a href="__APP__/User/Teach/apply" target="ifrm">申请认证</a>
    </div>

    <?php if($type == 2): ?><div class="Con-tit Ct-jjgl"><div class="ma">家教管理</div></div>
        <div class="Coner-con" id="Ct-jjgl">
            <!--<a href="__APP__/User/Teach/setting" target="ifrm">家教信息设置</a>-->
            <a href="__APP__/User/Teach/message" target="ifrm">发布消息</a>
            <a href="__APP__/User/Teach/student" target="ifrm">预约学生</a>
            <a href="__APP__/User/Teach/manage" target="ifrm">发布管理</a>
        </div>

    <?php elseif($type == 3): ?> 
        <div class="Con-tit Ct-pxgl"><div class="ma">培训管理</div></div>
        <div class="Coner-con" id="Ct-pxgl">
            <!--<a href="__APP__/Organization/Organization/iorganization" target="ifrm">培训信息设置</a>-->
            <a href="__APP__/Organization/Organization/registration" target='ifrm'>报名管理</a>
            <a href="__APP__/Organization/Organization/course" target="ifrm">课程管理</a>
	          <a href="__APP__/Organization/Organization/organspread" target="ifrm">发布管理</a>           
        </div>

    <?php elseif($type == 4): ?>
        <div class="Con-tit Ct-dlzx"><div class="ma">代理商中心</div></div>
        <div class="Coner-con" id="Ct-dlzx">
            <a href="__APP__/Proxyer/Proxyer/inviteTeacher" target="ifrm">邀请老师</a>
            <a href="__APP__/Proxyer/Proxyer/myTeacher" target="ifrm">我的平台老师</a>
            <a href="__APP__/Proxyer/Proxyer/course" target="ifrm">课程管理</a>
            <a href="__APP__/Proxyer/Proxyer/spread" target="ifrm">信息发布</a>
            <a href="__APP__/Proxyer/Proxyer/organ" target="ifrm">培训机构管理</a>
            <a href="__APP__/Proxyer/Proxyer/inClass" target="ifrm">预约报名管理</a>
        </div>

    <?php elseif($type == 5): ?>
        <div class="Con-tit Ct-jjgl"><div class="ma">平台教师</div></div>
        <div class="Coner-con" id="Ct-jjgl">
            <a href="__APP__/User/Teach/applyTeacher" target="ifrm">授课设置</a>
            <a href="__APP__/User/Teach/schedule" target="ifrm">我的学生</a>
            <a href="__APP__/User/User/kebiao?from=teacher" target="ifrm">我的排课</a>
        </div><?php endif; ?>

    <div class="Con-tit Ct-xfjl"><div class="ma">消费中心</div></div>
    <div class="Coner-con" id="Ct-xfjl">
       <a href="__APP__/User/User/orderList" target="ifrm">我的订单</a>
       <a href="__APP__/User/User/kebiao" target="ifrm">我的课表</a>
         <a href="__APP__/Consume/Consume/echarge" target="ifrm">我的消费</a>
        <a href="__APP__/Consume/Consume/deposit" target="ifrm">我的钱包</a>
    </div> 

    
          
    <div class="Con-tit Ct-ddtl"><div class="ma">收藏中心</div></div>
    <div class="Coner-con" id="Ct-ddtl">
        <a href="__APP__/User/Teach/collect" target="ifrm">我的家教</a>
        <a href="__APP__/User/Teach/collect?type=course" target="ifrm">我的培训</a>
        <!--<a href="__APP__/Exam/Exam/collectlist" target="ifrm">我的试卷</a>-->
    </div> 


  </div>
</div>



<script src="__ROOT__/public/js/jquery-min.js"></script>

<script>
$(function(){
		$('.Con-tit').click(function(){
				var Css = '#' + $(this).attr('class').replace(/Con-tit /,'');	
				$('.Coner-con').slideUp();   //所有都收起来
				if($(Css).css('display')=='block'){	$(Css).slideUp()	 }
								  				 else{	$(Css).slideDown()  };
				})
			
		$('.Con-tit .ma').click(function(){
				$('.Con-tit .ma').removeClass('mar');
				$(this).addClass('mar');
		})

    var fpg = "<?php echo ($page); ?>";
    if(fpg==='orderList'){
        $('.Coner-con').hide();$('.Con-tit .ma').removeClass('mar');$('.Ct-xfjl').find('.ma').addClass('mar');$('#Ct-xfjl').show();$('#Ct-xfjl').children().first().addClass('aclick');
    }
        
//--------2015-6-24-----
//$('.Con-tit .ma').addClass('mar');
//$('.Coner-con').css('display','block');
//--------2015-6-24-----	

		$('.Coner-con a').click(function(){
				$('.Coner-con a').removeClass('aclick')
				    $(this).addClass('aclick')
				})
		})

$(function(){
    var uname=$("#uname").text();
    if(uname.length>6){
        $("#uname").text(uname.substr(0,6)+"...");
        $("#uname").attr('title',uname);
      }
})

$('.mgseny').click(function(){  
    $('#idy-diply').css({display:'block'});
});

$(function(){
    $(".indextwo-e-y,.indextwo-e-yi").mouseover(function(){
        $(".indextwo-e-yi").removeClass("indextwo-e-yi").addClass("indextwo-e-y");
        $(this).removeClass("indextwo-e-y").addClass("indextwo-e-yi")
        $(this).find("a").addClass("select");
    })
})

function invite(){//生成邀请
    $.get("__APP__/Ajax/AjaxUser/invite",function(data){
        window.location.href="__APP__/User/User/register?code="+data;
    },'json');
}

</script>