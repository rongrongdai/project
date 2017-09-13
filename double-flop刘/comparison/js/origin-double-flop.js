'use strict';
(function(window, document) {
	var apiUrlBase = 'https://api.lingqianduobao.net/double-flop2017/'; //测试:106.75.133.7:80   　正式：api.lingqianduobao.net           //开发:106.75.145.114:84
	var isDuoBao = (navigator.userAgent.match('UA/')) ? true : false; // 判断是否在客户端内
	var scrollup_timer; //最新翻倍成功记录的动画
	var flop_timer; //抽红包和翻倍时的动画
	var imgTimes = 0; //滚动的红包图片张数
	var last = ''; //最后一条翻倍记录的标识
	var isLottery = false; //判断是否在抽奖中。如果正在抽奖中，禁止点击按钮；如果不是在抽奖中，解除禁止
	var clickBtn; //1为抽红包按钮　2为翻倍按钮	
	var has_avail_chance; //是否有翻倍机会
	var consume_margin = null; //还需要消费多少才能获得一次机会
	var record_id; //请求翻倍或者领取的id
	var has_unfinished; //是否有未选择翻倍还是原额领取的操作未完成
	var coundownTime; //当前时间与活动开始时间的时间差
	var client_request_time; //发请求之后，在回调里记录客户端发请求时间
	var server_time = ''; //服务器端当前时间
	var start_time = ''; //活动开始时间
	var vm = new Vue({
		el: '#app',
		data: {
			token: lqlib.getRequestParam('token'),
			dialog: null, //弹出层
			showMask: false, //蒙层
			activity_status: '', //活动状态
			avail_chance_note: 0, //翻倍机会,机会为0=>avail_chance_note='0',机会为1=>avail_chance_note='1',机会为2=>avail_chance_note='2',机会为3=>avail_chance_note='3',机会大于3=>avail_chance_note='>3'
			myRecords: [], //	我的记录
			isFlop: false, //是否已经抽红包
			isClaim: false, //是否显示“原额领取”和“我要翻倍”两个按钮
			records: [], //最新翻倍成功记录
			pullInfo: '上拉加载更多', //上拉提示语
			firstLoad: 0, //第一页
			imgSroll: false, //是否显示红包滚动图片
			claim_name: null, //抽红包-红包名称
			category_list: [], //红包列表
			limit: 10, //每页Ｎ条数据
			dialogTxt: '', //弹出层文本内容
			waiting: true, //是否是等待开奖
			isShowRule: false, //是否显示活动规则
			claim_imgUrl: null, //中奖红包的url
			claimDouble_status: false, //翻倍是否成功
			chance_msg: '', //有抽红包机会和没有抽红包机会的提示语
			flopBtn: '', //抽红包按钮
			countdown_hours: null, //倒计时-时
			countdown_min: null, //倒计时-分
			countdown_sec: null, //倒计时-秒	
			claim_qualification_time: '', //领取时间
		},
		components: { //弹出层组件
			dialogs: {
				template: '#dialog'
			}
		},
		mounted: function() {
			this.indexDom();
			this.flopLatest();
			this.iscrollPull();
		},
		methods: {
			indexDom: function() { //初始化页面
				var that = this;
				lqlib.jsonp(apiUrlBase + 'index', {
						'token': that.token
					}, function(res) {
						if(res['status'] != 0) {
							if(res['status'] === -1) {
								alert(res.msg);
							}
							return;
						}
						that.isFlop = false;
						that.isClaim = false;
						that.waiting = true;
						that.activity_status = res.data.activity.status;
						server_time = res.data.activity.server_time.replace(/-/g, "/");
						start_time = res.data.activity.start_time.replace(/-/g, "/");
						that.category_list = res.data.category_list;
						that.avail_chance_note = res.data.user_data.avail_chance_note;
						that.claim_qualification_time = res.data.claim_qualification_time;
						has_avail_chance = res.data.user_data.has_avail_chance;
						has_unfinished = res.data.user_data.has_unfinished;
						consume_margin = res.data.user_data.consume_margin;
						record_id = res.data.user_data.unfinished_record_id;
						client_request_time = new Date();
						var unfinished_category_id = res.data.user_data.unfinished_category_id;
						if(unfinished_category_id > 0) { //如果上一次已经抽取红包，再次进入页面时，根据Id查找上一次抽中的红包
							for(var i = 0; i < that.category_list.length; i++) {
								if(unfinished_category_id === that.category_list[i].id) {
									that.claim_name = that.category_list[i].name;
									that.claim_imgUrl = that.category_list[i].img_url;
								}
							}
						}
						if(has_unfinished) {
							that.isFlop = true;
							that.isClaim = true;
							that.waiting = false;
						} else {
							that.isFlop = false;
							that.isClaim = false;
							that.waiting = true;
						}
						if(that.activity_status === 'not_start') { //如果活动未开始，则进入倒计时
							that.countdown();
						}
						that.haveChance_infor();
						that.flopBtn_infor();
					},
					function() {
						alert('网络异常,请检查网络设置');
					})
			},
			countdown: function() { //倒计时
				var countdown_timer;
				var client_current_time = new Date(); //客户端当前时间
				var start_time_date = new Date(start_time); //活动开始时间
				var server_time_date = new Date(server_time); //发请求时服务器端的时间
				var server_current_time = server_time_date.getTime() + (client_current_time.getTime() - client_request_time.getTime()); //服务器端当前时间
				coundownTime = (start_time_date.getTime() - server_current_time) / 1000; //服务器端，活动开始时间与当前时间的时间差
				if(coundownTime <= 0) {
					clearTimeout(countdown_timer);
					this.$nextTick(function() {
						this.indexDom();
					})
					return;
				}
				this.countdown_hours = time_add_zero((Math.floor(coundownTime / 60 / 60))); //时
				this.countdown_min = time_add_zero(Math.floor(coundownTime / 60 % 60)); //分
				this.countdown_sec = time_add_zero(Math.floor(coundownTime % 60)); //秒
				countdown_timer = setTimeout(this.countdown, 500);
			},
			showMyRecords: function() { //打开-我的记录-弹出层
				if(isDuoBao) {
					if(!!this.token) { //已登录
						this.dialog = 'myRecords';
						this.showMask = true;
						this.myRecords = [];
						this.firstLoad = 0;
						last = '';
						if(this.activity_status === 'running' || this.activity_status === 'ended') {
							this.loadAction();
						}
					} else { //未登录
						alert('请先登录');
					}
				} else {
					download();
				}
			},
			flopBtn_infor: function() { //按钮提示语
				if(this.avail_chance_note == 0) {
					this.flopBtn = '我要去夺宝';
				} else if(this.avail_chance_note == '>3') {
					this.flopBtn = '翻倍次数' + this.avail_chance_note;
				} else if(this.avail_chance_note > 0) {
					this.flopBtn = '翻倍次数' + this.avail_chance_note + '次';
				} else {
					this.flopBtn = '我要去夺宝';
				}
			},
			claimed_qualification: function() { //领取
				var that = this;
				if(!isDuoBao) {
					download();
					return;
				}
				if(that.activity_status === 'ended') { //活动已结束
					return;
				}
				if(!that.token) { //已登录
					alert('请先登录');
					return;
				}
				lqlib.jsonp(apiUrlBase + 'claim-qualification', { //未领取
						'token': that.token
					}, function(res) {
						if(res['status'] != 0) {
							alert(res.msg);
						}
						that.$nextTick(function() {
							that.indexDom();
						})
					},
					function() {
						alert('网络异常,请检查网络设置');
					})
			},
			goIndexPage: function() {
				location.href = 'duobao://native/index';
			},
			haveChance_infor: function() { //是否有翻倍机会提示语
				if(this.token) {
					if(has_avail_chance) {
						this.chance_msg = '恭喜成功获得翻倍，祝你好运~';
					} else if(consume_margin > 50) {
						this.chance_msg = '还差>50元，获得翻倍次数';
					} else {
						this.chance_msg = '还差' + consume_margin + '元，获得翻倍次数';
					}
				}
			},
			flopLatest: function() { //最新翻倍成功记录
				var that = this;
				lqlib.jsonp(apiUrlBase + 'flop-latest', {}, function(res) {
						if(res['status'] != 0) {
							if(res['status'] === -1) {
								alert(res.msg);
							}
							return;
						}
						that.records = res.data.records;
						if(that.records.length > 5) {
							scrollup_timer = setInterval(that.scrollup, 3000);
						}
					},
					function() {
						alert('网络异常,请检查网络设置');
					})
			},
			scrollup: function() { //所有用户获奖记录，向上滚动轮播
				var ul = $('.winners ul');
				var lineH = ul.find("li:first").height();
				ul.stop(true, true).animate({
					marginTop: -lineH
				}, 500, function() {
					ul.find("li:first").appendTo(ul);
					ul.css({
						marginTop: 0
					})
				})
			},
			login: function() { //未登录时点击“翻倍次数”按钮，提示登录
				if(isDuoBao) {
					if(!this.token) {
						alert('请先登录')
					}
				} else {
					download();
				}
			},
			flop: function() { //抽红包
				if(isLottery) {
					return;
				}
				if(this.avail_chance_note == 0) {
					this.goClientIndex();
					return;
				}
				isLottery = true;
				clickBtn = 1;
				this.imgScrollTimer()
			},
			imgScrollTimer: function() { //判断是抽红包还是翻倍，显示不同界面，然后执行红包滚动动画
				this.imgSroll = true;
				this.waiting = false;
				if(clickBtn === 1) {
					this.isFlop = false;
				} else if(clickBtn === 2) {
					this.isFlop = false;
					this.isClaim = true;
				}
				clearInterval(flop_timer);
				imgTimes = 0;
				flop_timer = setInterval(this.imgScrollup, 300);
			},
			goClientIndex: function() { //没有机会时，点击“我要去夺宝”跳转到客户端首页
				if(isDuoBao) {
					if(!!this.token) { //已登录
						window.location.href = 'duobao://native/index';
					} else { //未登录
						alert('请先登录');
					}
				} else {
					download();
				}
			},
			imgScrollup: function() { //红包图片滚动播放
				var that = this;
				var ul = $('.imgSroll ul');
				var lineH = ul.find("li:first").height();
				imgTimes++;
				ul.stop(true, true).animate({
					marginTop: -lineH
				}, 10, function() {
					ul.find("li:first").appendTo(ul);
					ul.css({
						marginTop: 0
					});
					if(imgTimes > that.category_list.length - 1) { //图片滚动结束后
						clearInterval(flop_timer);
						that.imgSroll = false;
						isLottery = false;
						if(clickBtn === 1) { //抽红包返回结果
							that.waiting = true;
							setTimeout(that.requestFlop, 300);
						} else if(clickBtn === 2) { //翻倍结果
							that.waiting = false;
							that.isFlop = true;
							setTimeout(that.requestClaimDouble, 300);
						}
					}
				})
			},
			requestFlop: function(res) { //抽红包返回结果
				var that = this;
				lqlib.jsonp(apiUrlBase + 'flop', {
						'token': that.token
					}, function(res) {
						if(res['status'] === 0) {
							that.avail_chance_note = res.data.avail_chance_note;
							has_avail_chance = res.data.has_avail_chance;
							consume_margin = res.data.consume_margin;
							record_id = res.data.record_id;
							that.claim_name = res.data.name;
							var category_id = res.data.category_id;
							if(category_id > 0) { //如果上一次已经抽取红包，再次进入页面时，根据Id查找上一次抽中的红包
								for(var i = 0; i < that.category_list.length; i++) {
									if(category_id === that.category_list[i].id) {
										that.claim_imgUrl = that.category_list[i].img_url;
									}
								}
							}
							that.isFlop = true; //显示抽中的红包
							that.isClaim = true; //显示“原额领取”和“我要翻倍”按钮
							that.waiting = false; //隐藏“等待开奖”
							that.haveChance_infor();
						} else {
							alert(res.msg);
							that.indexDom();
							//更新所有用户获奖记录
							that.records = [];
							clearTimeout(scrollup_timer);
							that.flopLatest();
							return;
						}
					},
					function() {
						isLottery = false;
						alert('网络异常,请检查网络设置');
					})

			},
			requestClaimDouble: function() { //翻倍结果
				var that = this;
				lqlib.jsonp(apiUrlBase + 'claim-double', {
						'token': that.token,
						'record_id': record_id
					}, function(res) {
						if(res['status'] != 0) {
							alert(res.msg);
							that.indexDom();
							//更新所有用户获奖记录
							that.records = [];
							clearTimeout(scrollup_timer);
							that.flopLatest();
							return;
						}
						that.dialog = 'double';
						that.showMask = true;
						that.waiting = false;
						that.isFlop = true; //显示抽中的红包
						that.claimDouble_status = res.data.success;
						if(that.claimDouble_status) { //翻倍成功
							that.dialogTxt = '普天同庆！翻倍成功';
							that.claim_name = res.data.name;
						} else { //翻倍失败
							that.dialogTxt = '下次加油！就差一点点了~';
							that.claim_name = 0;
						}
					},
					function() {
						isLottery = false;
						alert('网络异常,请检查网络设置');
					})
			},
			claimOrigin: function() { //原额领取
				var that = this;
				lqlib.jsonp(apiUrlBase + 'claim-origin', {
						'token': that.token,
						'record_id': record_id
					}, function(res) {
						if(res['status'] != 0) {
							alert(res.msg);
							that.isFlop = false;
							that.isClaim = false;
							that.waiting = true;
							that.indexDom();
							//更新所有用户获奖记录
							that.records = [];
							clearTimeout(scrollup_timer);
							that.flopLatest();
							return;
						}
						that.dialog = 'receive';
						that.showMask = true;
						that.dialogTxt = '原额领取';
					},
					function() {
						alert('网络异常,请检查网络设置');
					})
			},
			claimDouble: function() { //我要翻倍
				if(isLottery) {
					return;
				}
				isLottery = true;
				clickBtn = 2;
				this.imgScrollTimer();
			},
			sureBtn: function() { //点击-确认-按钮
				this.showMask = false;
				this.dialog = '';
				this.isFlop = false;
				this.isClaim = false;
				this.waiting = true;
				this.haveChance_infor();
				this.flopBtn_infor();
				//更新所有用户获奖记录
				this.records = [];
				clearTimeout(scrollup_timer);
				this.flopLatest();
			},
			closeDialog: function() { //关闭弹出层
				if(this.dialog === 'receive' || this.dialog === 'double') {
					return;
				}
				this.showMask = false;
				this.dialog = '';
				this.isShowRule = false;
			},
			showRule: function() { //打开-活动规则-弹出层
				this.isShowRule = !this.isShowRule;
				this.showMask = !this.showMask;
			},

			pullUpAction: function() { //上拉加载更多数据
				this.firstLoad = 1;
				if(vm.has_more === true) { //如果has_more为true才发请求
					setTimeout(function() {
						vm.allRoundCodes();
						vm.myScroll.refresh();
						vm.pullInfo = '上拉加载更多';
					}, 300)
				} else if(vm.has_more === false) {
					vm.pullInfo = '没有更多内容了';
					document.querySelector('#pullUp').removeAttribute('class', 'loading');
					vm.myScroll.refresh();
				}

			},
			loaded: function() { //iscroll实例化
				var pullUpEl, pullUpOffset;
				//动画部分
				pullUpEl = document.querySelector('#pullUp');
				var pullUpLabel = document.querySelector('.pullUpLabel');
				pullUpOffset = pullUpEl.offsetHeight;
				this.myScroll = new iScroll('wrapper', { //实例化iScroll
					useTransition: false,
					hScrollbar: false,
					vScrollbar: false,
					onRefresh: function() {
						if(pullUpEl.classList.contains('loading')) {
							pullUpEl.setAttribute('class', '');
							vm.pullInfo = '上拉加载更多';
						}
					},
					onScrollMove: function() { //上拉进行时
						if(this.y < (this.maxScrollY - 5) && !pullUpEl.classList.contains('flip')) {
							pullUpEl.setAttribute('class', 'flip');
							vm.pullInfo = '释放刷新';
							this.maxScrollY = this.maxScrollY;
						} else if(this.y > (this.maxScrollY + 5) && pullUpEl.classList.contains('flip')) {
							pullUpEl.setAttribute('class', '');
							vm.pullInfo = '上拉加载更多';
							this.maxScrollY = pullUpOffset;
						}
					},
					onScrollEnd: function() { //上拉结束时
						if(pullUpEl.classList.contains('flip')) {
							pullUpEl.setAttribute('class', 'loading');
							vm.pullInfo = '加载中';
							vm.pullUpAction();
						}
					}
				});
				this.loadAction(); //初始状态，加载数据
			},

			iscrollPull: function() { //我的中奖记录，上拉更新数据
				document.querySelector('.myRecordsCon').addEventListener('touchmove', function(e) { //阻止冒泡
					e.preventDefault();
				}, false);
				this.loaded();
			},
			loadAction: function() { //初始状态，加载数据
				this.allRoundCodes();
				this.myScroll.refresh();
			},

			allRoundCodes: function() { //分页
				var that = this;
				if(!that.token) {
					return;
				}
				lqlib.jsonp(apiUrlBase + 'user-flop-record', {
						'token': that.token,
						'last': last,
						'limit': that.limit
					}, function(res) {
						if(res['status'] != 0) {
							if(res['status'] === -1) {
								alert(res.msg);
							}
							return;
						}
						var records = res['data']['records'];
						that.myRecords = that.myRecords.concat(records);
						that.has_more = res['data']['has_more'];
						last = res['data']['last'];
						if(that.has_more === false) {
							that.pullInfo = '没有更多内容了';
						} else {
							that.pullInfo = '上拉加载更多';
						}
					},
					function() {
						alert('网络异常,请检查网络设置');
					})
			},
		}
	})

	function download() { //下载
		alert('亲，请在零钱夺宝内打开哦');
		window.location.href = 'https://transfer.lingqianduobao.net/transfer1/index.html';
	}

	function time_add_zero(n) { //倒计时的　时/分/秒，如果小于10则在数字前面补0
		if(n < 10) {
			return '0' + n;
		} else {
			return n;
		}
	}
})(window, document)