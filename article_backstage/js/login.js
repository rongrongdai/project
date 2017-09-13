(function () {

    $(document).ready(function () {
        // 用户名获得焦点
        $('#login_username').focus(function(event) {
            $("#username").addClass("selected");
        });

        // 用户密码框获得焦点
        $('#login_userpwd').focus(function(event) {
            $("#password").addClass("selected");
        });
        // 用户名失去焦点
        $('#login_username').blur(function(event) {
            checkUserName();
            $("#username").removeClass("selected");
        });

        // 用户密码框失去焦点
        $('#login_userpwd').blur(function(event) {
            checkUserPwd();
            $("#password").removeClass("selected");
        });
        // 检测用户名输入是否为空
        var checkUserName = function() {
            var val = $('#login_username').val();
            var $notice = $('#username').siblings('.notice');

            $notice.html('');
            $notice.addClass('hide');
            if(val.length == 0){
                $notice.html('请输入用户名！');
                $notice.removeClass('hide');
                return false;
            }
        }

        // 检测用户密码是否为空
        var checkUserPwd = function(){
            var val = $('#login_userpwd').val();
            var $notice = $('#password').siblings('.notice');

            $notice.html('');
            $notice.addClass('hide');

            if(val.length == 0){
                $notice.html('请输入密码！');
                $notice.removeClass('hide');
                return false;
            }
        }

        // 点击登陆按钮提交表单
        $("#login_submit_btn").click(function(event) {
            var ok_name = checkUserName();
            var ok_pwd = checkUserPwd();

            if(ok_name && ok_pwd){
                $(this).parents('form').submit();
            }
        });
        // 登陆键盘事件
        $(document).keyup(function(event){
            if(event.keyCode ==13){
                $("#login_submit_btn").trigger("click");
            }
        });
    });

})()

