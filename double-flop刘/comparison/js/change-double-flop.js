'use strict';

var vm=(function (window, document) {
    var apiUrlBase = 'http://192.168.0.114:9090/double-flop2017/'; //测试:106.75.133.7:80   　正式：api.lingqianduobao.net           //开发:106.75.145.114:84
    var isInClient = !!(navigator.userAgent.match('UA/')); // 判断是否在客户端内

    var clientTsBase; //发请求之后，在回调里记录客户端发请求时间
    var serverTsBase; //服务器端当前时间

    var maskOnClick = undefined;  // 遮罩的点击回调
    var latestRecordsScrollTimer;  // 最新中奖榜单的滚动定时器
    var myRecordsIscroll;  // “我的记录” 里的 iscroll 控件

    var vm = new Vue({
        el: '#app',
        data: {
            token:'AZBWW6555K6GYJOC6',// lqlib.getRequestParam('token'),//AZBWW6555K6GYJOC6
            dialog: null, // 弹出层
            isShowMask: false, // 遮罩层
            activity: {
                status: '',
                startTs: null,
            },
            user: {
                hasAvailChance: false,//是否有翻倍机会
                availChanceNote: '0', //翻倍机会
                avail_chance:'0',//当前可用机会次数
                consumeMargin: null,
            },
            myRecords: {
                items: [],
                last: '',
                hasMore: true,
                status: 'init'  // init, loading, standby, gonnaLoad, noMore
            },
            flopData: {
                status: 'waiting', // waiting, flopping, flopped, claimingOrigin, claimingDouble, claimSucceeded, claimFailed
                flopped: {
                    recordId: null,
                    categoryId: null,
                    name: 0,
                    imgUrl: null
                },
                claimed: {
                    success: false,
                    name: 0,
                    tip: ''
                }
            },
            latestRecords: [], //最新翻倍成功记录
            categories: [], //红包列表 [{double_img_url:null,id:null,name:null,origin_img_url:null}]
            imgList:[],
            // doubleName:[],
            countdown: {hours: '--', min: '--', sec: '--'},
            claimQualificationTime: ''  // 领取资格的时间
        },
        computed: {
            chanceTip: chanceTip,
            flopButtonTip: flopButtonTip,
            myRecordsStatusText: myRecordsStatusText
        },
        components: { // 弹出层组件
            dialogs: {
                template: '#dialog'
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                reloadData();
                initMyRecordsIscroll();
            });
        },
        methods: {
            showMyRecords: showMyRecords,
            claimQualification: claimQualification,
            alertLogin: alertLogin,
            flop: flop,
            goToClientIndex: goToClientIndex,
            claimOrigin: claimOrigin,
            claimDouble: claimDouble,
            confirmResult: confirmResult,
            onMaskClick: onMaskClick,
            showRule: showRule,
        }
    });

    // >>>>>>>>>>>>>>>> computed properties >>>>>>>>>>>>>>>>

    function chanceTip() { //是否有翻倍机会提示语
        if (!vm.token) {
            return '';
        }
        var user = vm.user;
        if (user.hasAvailChance) {
            return '恭喜成功获得翻倍，祝你好运~';
        }
        if (user.consumeMargin > 50) {
            return '还差>50元，获得翻倍次数';
        }
        return '还差' + user.consumeMargin + '元，获得翻倍次数';
    }

    function flopButtonTip() { //按钮提示语
        var user = vm.user;
        if (!user.hasAvailChance) {
            return '我要去夺宝';
        } else {
            return '翻倍次数' + user.availChanceNote + '次';
        }
    }

    function myRecordsStatusText() {
        switch (vm.myRecords.status) {
            case 'loading':
                return '加载中';
            case 'noMore':
                return '没有更多了';
            case 'standby':
                return '上拉加载更多';
            case 'gonnaLoad':
                return '释放开始加载';
            default:
                return '';
        }
    }

    // <<<<<<<<<<<<<<<< computed properties <<<<<<<<<<<<<<<<

    function reloadData() {
        loadActivity();
        loadLatestRecords();
    }

    function loadActivity() { // 初始化页面
        lqlib.jsonp(apiUrlBase + 'index',
            {'token': vm.token},
            onSuccess,
            function () {
                alert('网络异常,请检查网络设置');
            });
        function onSuccess(result) {
            if (result.status < 0) {
                alert(result.msg);
                return;
            }
            var data = result.data;

            var activity_ = data.activity;
            vm.activity.status = activity_.status;

            serverTsBase = new Date(activity_.server_time.replace(/-/g, '/')).getTime();
            clientTsBase = new Date().getTime();
            vm.activity.startTs = new Date(activity_.start_time.replace(/-/g, '/')).getTime();

            var categories = data.category_list;
            vm.categories = categories;
            var imgList =vm.imgList;
            vm.claimQualificationTime = data.claim_qualification_time;

            var user = vm.user, user_ = data.user_data;
            user.hasAvailChance = user_.has_avail_chance;
            user.availChanceNote = user_.avail_chance_note;
            user.avail_chance = user_.avail_chance;
            user.consumeMargin = user_.consume_margin;

            if( user.avail_chance>5){
                $("div").removeClass("btn_normal_disable");
                $("#btn").attr("disable",false);
            }

            var flopData = vm.flopData;
            if (user_.has_unfinished) {
                flopData.status = 'flopped';
                flopData.flopped.id = user_.unfinished_records.id;
                var categoryId = user_.unfinished_records;
                flopData.flopped.categoryId = categoryId;

                for(var i = 0; i < categoryId.length; i++){
                    for(var j = 0; j< categories.length; j++){
                        if(categoryId[i].category_id==categories[j].id){
                            imgList.push(categories[j]);
                        }
                    }
                }
                if(imgList.length==1&&categoryId.length==1){
                    flopData.flopped.imgUrl = categories[j].origin_img_url;
                }else if(imgList.length>1&&categoryId.length>1){
                    vm.dialog = 'categoriesInfo';
                    showMask();
                }

                // if(categoryId.length==1){
                //     for(var i = 0; i < categoryId.length; i++){
                //         for(var j = 0; j< categories.length; j++){
                //             if(categoryId[i].category_id==categories[j].id){
                //                 flopData.flopped.imgUrl = categories[j].origin_img_url;
                //             }
                //         }
                //     }
                // }
                // if(categoryId.length>1){
                //
                //     for(var i = 0; i < categoryId.length; i++){
                //         for(var j = 0; j< categories.length; j++){
                //             if(categoryId[i].category_id==categories[j].id){
                //                  imgList.push(categories[j]);
                //             }
                //         }
                //     }
                //     vm.dialog = 'categoriesInfo';
                //     showMask();
                // }


            }

            if (activity_.status === 'not_start') { //如果活动未开始，则进入倒计时
                activityCountdown()
            }
        }
    }

    function activityCountdown() { //倒计时
        var timer;
        var startTs = vm.activity.startTs;
        var t = function () {
            var clientCurrentTs = new Date().getTime(); //客户端当前时间
            var serverCurrentTs = serverTsBase + (clientCurrentTs - clientTsBase); //服务器端当前时间
            var countdownTs = (startTs - serverCurrentTs) / 1000; //服务器端，活动开始时间与当前时间的时间差
            if (countdownTs <= 0) {
                clearTimeout(timer);
                vm.$nextTick(function () {
                    loadActivity();
                });
                return;
            }
            vm.countdown.hours = time_add_zero((Math.floor(countdownTs / 60 / 60))); //时
            vm.countdown.min = time_add_zero(Math.floor(countdownTs / 60 % 60)); //分
            vm.countdown.sec = time_add_zero(Math.floor(countdownTs % 60)); //秒
        };
        timer = setInterval(t, 500);
    }

    function loadLatestRecords() { //最新翻倍成功记录
        lqlib.jsonp(apiUrlBase + 'flop-latest', {},
            onSuccess,
            function () {
                alert('网络异常,请检查网络设置');
            });
        function onSuccess(result) {
            if (result.status < 0) {
                return;
            }
            vm.latestRecords = result.data.records;
            scrollRecords();
        }

        function scrollRecords() {
            if (!!latestRecordsScrollTimer) {
                clearTimeout(latestRecordsScrollTimer);
            }
            if (vm.latestRecords.length < 5) {
                latestRecordsScrollTimer = null;
                return;
            }

            function scroll() {
                var ul = $('.winners ul');
                var scrollHeight = ul.find('li:first').height();

                function t() {
                    ul.stop(true, true).animate(
                        {marginTop: -scrollHeight}, 500,
                        function () {
                            ul.find('li:first').appendTo(ul);
                            ul.css({marginTop: 0});
                        });
                }

                latestRecordsScrollTimer = setInterval(t, 3000);
            }

            vm.$nextTick(scroll);
        }
    }

    function initMyRecordsIscroll() { // 我的中奖记录，上拉更新数据
        // 阻止冒泡
        document.querySelector('.myRecordsCon').addEventListener(
            'touchmove', function (e) {
                e.preventDefault();
            }, false);

        // 实例化iScroll
        myRecordsIscroll = new iScroll('wrapper', {
            useTransition: false,
            hScrollbar: false,
            vScrollbar: false,
            onScrollMove: function () { // 拉动时
                var myRecords = vm.myRecords;
                if (!myRecords.hasMore) {
                    return;
                }
                if (this.y < 0 && this.y <= this.maxScrollY - 20) {
                    if (myRecords.status === 'gonnaLoad') {
                        return;
                    }
                    myRecords.status = 'gonnaLoad';
                }
            },
            onScrollEnd: function () { // 拉动结束时
                if (vm.myRecords.status !== 'gonnaLoad') {
                    return;
                }
                loadMoreMyRecords();
            }
        });
    }

    function showMyRecords() { //打开-我的记录-弹出层
        if (!isInClient) {
            goToDownload();
            return;
        }
        if (!vm.token) { //已登录
            alert('请先登录');
            return;
        }

        vm.dialog = 'myRecords';
        showMask(function () {
            vm.dialog = '';
            hideMask()
        });

        // 设置默认数据
        var myRecords = vm.myRecords;
        myRecords.items = [];
        myRecords.last = '';
        myRecords.hasMore = true;
        myRecords.status = 'init';

        var activityStatus = vm.activity.status;
        if (activityStatus === 'running' || activityStatus === 'ended') {
            loadMoreMyRecords();
        }
    }

    function loadMoreMyRecords() {
        if (!vm.token) {
            return;
        }
        var myRecords = vm.myRecords;
        if (!myRecords.hasMore) {
            return;
        }
        myRecords.status = 'loading';

        lqlib.jsonp(apiUrlBase + 'user-flop-record',
            {
                'token': vm.token,
                'last': vm.myRecords.last,
                'limit': 10
            },
            onSuccess,
            function () {
                alert('网络异常,请检查网络设置');
            });

        function onSuccess(result) {
            if (result.status < 0) {
                alert(result.msg);
                return;
            }
            var data = result.data;
            myRecords.items = myRecords.items.concat(data.records);
            myRecords.hasMore = data.has_more;
            myRecords.last = data.last;

            myRecords.status = myRecords.hasMore ? 'standby' : 'noMore';

            vm.$nextTick(function () {
                myRecordsIscroll.refresh();
            });
        }
    }

    function claimQualification() { // 领取资格
        if (!isInClient) {
            goToDownload();
            return;
        }
        if (vm.activity.status === 'ended') { //活动已结束
            return;
        }
        if (!vm.token) { //已登录
            alert('请先登录');
            return;
        }
        lqlib.jsonp(apiUrlBase + 'claim-qualification',
            {'token': vm.token},
            onSuccess,
            function () {
                alert('网络异常,请检查网络设置');
            });
        function onSuccess(result) {
            if (result.status < 0) {
                alert(result.msg);
                return
            }
            loadActivity();
        }
    }

    function showRule() { //打开-活动规则-弹出层
        vm.dialog = 'rule';
        showMask(function () {
            vm.dialog = '';
            hideMask();
        });
    }

    function flop(flop_times) { // 抽红包
        var flopData = vm.flopData;

        if (flopData.status !== 'waiting') {
            return;
        }
        var user = vm.user;
        if (!user.hasAvailChance) {
            vm.goToClientIndex();
            return;
        }
        flopData.status = 'flopping';

        var flopResult;
        lqlib.jsonp(apiUrlBase + 'flop',
            {'token': vm.token,'flop_times':flop_times},//添加flop_times参数，只接受1或者5  如不是 status返回-7
            function (result) {
                flopResult = result;
            },
            function () {
                alert('网络异常,请检查网络设置');
                window.location.reload();
            });

        // 金额跳动动画
        var startTime = new Date().getTime();
        scrollCategoryImgs(25,
            function () {
                return !!flopResult && (new Date().getTime() - startTime >= 1000);
            },
            onScrollEnd);

        function onScrollEnd() {
            if (flopResult.status < 0) {
                // 没有机会 / 有正在进行中的记录，直接刷新数据
                alert(flopResult.msg);
                reloadData();
                return;
            }
            var data = flopResult.data;

            user.hasAvailChance = data.has_avail_chance;
            user.availChanceNote = data.avail_chance_note;
            user.consumeMargin = data.consume_margin;

            flopData.flopped.recordId = data.records.id;
            var categoryId = data.records;
            var imgList =[];

            var categories = vm.categories;

            for(var i = 0; i < categoryId.length; i++){
                for(var j = 0; j < categories.length; j++){
                    if(categoryId[i].category_id==categories[j].id){
                        imgList.push(categories[j]);
                        break;
                    }
                }
            }
            vm.imgList= imgList;
            if(imgList.length==1&&flop_times==1){
                flopData.flopped.imgUrl = categories[j].origin_img_url;
            }else if(imgList.length>1&&flop_times==5){
                vm.dialog = 'categoriesInfo';
                showMask();
            }
            // if(flop_times==1){
            //     for(var i = 0; i < categoryId.length; i++){
            //         for(var j = 0; j < categories.length; j++){
            //             if(categoryId[i].category_id==categories[j].id){
            //                 flopData.flopped.imgUrl = categories[j].origin_img_url;
            //                 // imgList.push(categories[j]);
            //                 break;
            //             }
            //         }
            //
            //     }
            // }
            //
            // if(flop_times==5){
            //     // imgList=[];
            //     for(var i = 0; i < categoryId.length; i++){
            //         for(var j = 0; j < categories.length; j++){
            //             if(categoryId[i].category_id==categories[j].id){
            //                 imgList.push(categories[j]);
            //                 break;
            //             }
            //         }
            //
            //     }
            //
            //     vm.dialog = 'categoriesInfo';
            //     showMask();
            // }

            flopData.status = 'flopped';
        }
    }

    // 金额跳动动画
    function scrollCategoryImgs(interval, shouldStop, onStopped) {
        var timer;
        var ul = lqlib.$('.imgSroll ul');

        function scrollOnce() {
            ul.appendChild(ul.children[0]);

            if (!shouldStop()) {
                return;
            }
            clearTimeout(timer);
            if (!!onStopped) {
                onStopped();
            }
        }

        timer = setInterval(scrollOnce, interval);
    }

    function claimOrigin() { // 原额领取
        var flopData = vm.flopData;
        if (flopData.status !== 'flopped') {
            return;
        }
        flopData.status = 'claimingOrigin';

        lqlib.jsonp(apiUrlBase + 'claim-origin',
            {
                'token': vm.token,
                // 'record_id': flopData.flopped.recordId  //去掉这个参数
            },
            onSuccess,
            function () {
                flopData.status = 'flopped';
                alert('网络异常,请检查网络设置');
            });
        function onSuccess(result) {
            if (result.status < 0) {
                alert(result.msg);
                reloadData();
                return;
            }
            var arry=[];
            var result=result.data.result;
            if(result.length==1){
                for(var i=0;i<result.length;i++){
                    flopData.claimed.name = result[i].name;
                    // arry.push(result[i].name);

                }
            }

            if(result.length>1){
                arry=[];
                flopData.claimed.name =0;
                for(var i=0;i<result.length;i++){
                    // flopData.claimed.name = result[i].name;
                    arry.push(result[i].name);

                }
            }
            for(var j=0;j<arry.length;j++){

                flopData.claimed.name+=parseInt(arry[j]);
            }
            flopData.claimed.success = true;
            flopData.claimed.tip = '原额领取';
            flopData.status = 'claimSucceeded';

            vm.dialog = 'result';
            showMask();
        }
    }

    function claimDouble() { // 我要翻倍
        var flopData = vm.flopData;
        if (flopData.status !== 'flopped') {
            return;
        }
        flopData.status = 'claimingDouble';

        var claimResult;
        lqlib.jsonp(apiUrlBase + 'claim-double',
            {
                'token': vm.token,
                // 'record_id': flopData.flopped.recordId  //去掉这个参数
            },
            function (result) {
                claimResult = result;
            },
            function () {
                alert('网络异常,请检查网络设置');
                window.location.reload();
            });

        // 金额跳动动画
        var startTime = new Date().getTime();
        scrollCategoryImgs(25,
            function () {
                return !!claimResult && (new Date().getTime() - startTime >= 1000);
            },
            onScrollEnd);

        function onScrollEnd() {
            if (claimResult.status < 0) {
                alert(claimResult.msg);
                reloadData();
                return;
            }
            var data = claimResult.data;
            if(data.result.length>1){

                vm.dialog = 'fiveCategories';
                showMask();
            }else{
                flopData.claimed.success = data.result[0].double_success;//success改为double_success  返回true或false
                var result= flopData.claimed.success;
                if (result) {
                    flopData.claimed.tip = '普天同庆！翻倍成功';
                    flopData.claimed.name = data.result[0].name;
                    flopData.status = 'claimSucceeded';
                } else {
                    flopData.claimed.tip = '下次加油！就差一点点了~';
                    flopData.claimed.name = 0;
                    flopData.status = 'claimFailed';
                }

                vm.dialog = 'result';
                showMask();
            }

        }
    }

    function confirmResult() {  // 确认结果
        vm.dialog = '';
        hideMask();

        vm.flopData = {
            status: 'waiting',
            flopped: {
                recordId: null,
                categoryId: null,
                name: '',
                imgUrl: null
            },
            claimed: {
                success: false,
                name: '',
                tip: ''
            }
        };

        loadLatestRecords();
    }

    // >>>>>>>>>>>>>>>> mask >>>>>>>>>>>>>>>>

    function onMaskClick() { // 关闭弹出层
        if (!!maskOnClick) {
            maskOnClick();
        }
    }

    function showMask(onclick) {
        maskOnClick = onclick;
        vm.isShowMask = true;
    }

    function hideMask() {
        maskOnClick = undefined;
        vm.isShowMask = false;
    }

    // <<<<<<<<<<<<<<<< mask <<<<<<<<<<<<<<<<

    // >>>>>>>>>>>>>>>> 跳转 >>>>>>>>>>>>>>>>

    function alertLogin() { //未登录时点击“翻倍次数”按钮，提示登录
        if (!isInClient) {
            goToDownload();
            return;
        }
        if (!vm.token) {
            alert('请先登录');
        }
    }

    function goToClientIndex() { //没有机会时，点击“我要去夺宝”跳转到客户端首页
        if (!isInClient) {
            goToDownload();
        }
        if (!vm.token) { //已登录
            alert('请先登录');
        }
        window.location.href = 'duobao://native/index';
    }

    function goToDownload() { //下载
        alert('亲，请在零钱夺宝内打开哦');
        window.location.href = 'https://transfer.lingqianduobao.net/transfer1/index.html';
    }

    // <<<<<<<<<<<<<<<< 跳转 <<<<<<<<<<<<<<<<

    function time_add_zero(n) { //倒计时的　时/分/秒，如果小于10则在数字前面补0
        if (n < 10) {
            return '0' + n;
        } else {
            return n;
        }
    }
    return vm;
})(window, document);