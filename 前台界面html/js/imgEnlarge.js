/*图片放大 轮播*/
    var enlargeCarousel = {
        createEnlargeCarousel:function(str,delFlag){
            $(str).each(function(){
                var currImg = this;
                var currImgParent = $(currImg).parent();
                $(currImg).on('tap',function(e){
                    var enlargeCarouselContainer = $('#enlarge-Carousel'),
                        picBigBg = $('<div class="pic-big-bg"></div>'),
                        picSwiper = $('<div class="pic-swipe"></div>'),
                        swiperContainer = $('<div class="swiper-container"></div>'),
                        swiperWrapper = $("<div class='swiper-wrapper'></div>");
                    picSwiper.prepend(swiperContainer.append(swiperWrapper));
                    picSwiper.append('<div class="swipe-footer"><div class="swipe-footer-num"><span class="slide-curr-num">'+(Number($(this).index())+1)+'</span>/<span class="slide-sum">'+$(this).parent().find('img').size()+'</span></div></div>');    
                    enlargeCarouselContainer.append(picBigBg);
                    enlargeCarouselContainer.append(picSwiper);

                    currImgParent.find('img').each(function(){
                        var swiperSlide = $('<div class="swiper-slide"></div>'),
                            imgWrap = $('<div class="img-wrap"><img src="'+$(this).attr('src')+'"></div>');
                        swiperWrapper.append(swiperSlide.append(imgWrap));

                        //删除按钮
                        if(delFlag){
                            /*//右上角删除
                            var delBtn = $('<div class="del-btn">删除</div>');
                            delBtn.on('tap',{currSlide:swiperSlide,currPic:this},function(e){
                                var slideCurrNum = picSwiper.find('.slide-curr-num'),
                                    slideSum = picSwiper.find('.slide-sum'),
                                    img = e.data.currPic,
                                    slide = e.data.currSlide;
                                if(Number(slideSum.text())>1){
                                    if(Number(slide.index())+1<slideSum.text()){
                                        slideCurrNum.text(Number(slide.index())+1);
                                    }else{
                                        slideCurrNum.text(Number(slideSum.text())-1);
                                    }
                                    slideSum.text(Number(slideSum.text())-1);
                                    swiper.removeSlide(slide.index());
                                }else{
                                    picSwiper.find('.swiper-slide img').removeClass('pic-big-img');
                                    picBigBg.addClass('pic-big-bg-fadeOut');
                                    //setTimeout(function(){
                                        picSwiper.css("display","none");
                                        picBigBg.removeClass('pic-big-bg-show').removeClass('pic-big-bg-fadeOut');
                                        enlargeCarouselContainer.empty();
                                    //},300);
                                }
                                img.remove();
                            });
                            swiperSlide.append(delBtn);*/

                            //底部删除
                            var delBtn = $('<div class="swipe-footer-del-btn">删除</div>');
                            picSwiper.find('.swipe-footer').prepend(delBtn);
                            picSwiper.find('.swipe-footer-num').css("position",'absolute');
                            picSwiper.find('.swipe-footer-del-btn').on('tap',function(){
                                var slideCurrNum = picSwiper.find('.slide-curr-num'),
                                    slideSum = picSwiper.find('.slide-sum'),
                                    slide = swiperWrapper.find(".swiper-slide-active"),
                                    img = currImgParent.find('img').eq(slide.index());
                                if(Number(slideSum.text())>1){
                                    if(Number(slide.index())+1<slideSum.text()){
                                        slideCurrNum.text(Number(slide.index())+1);
                                    }else{
                                        slideCurrNum.text(Number(slideSum.text())-1);
                                    }
                                    slideSum.text(Number(slideSum.text())-1);
                                    swiper.removeSlide(slide.index());
                                }else{
                                    picSwiper.find('.swiper-slide img').removeClass('pic-big-img');
                                    picBigBg.addClass('pic-big-bg-fadeOut');
                                    //setTimeout(function(){
                                        picSwiper.css("display","none");
                                        picBigBg.removeClass('pic-big-bg-show').removeClass('pic-big-bg-fadeOut');
                                        enlargeCarouselContainer.empty();
                                    //},300);
                                }
                                img.remove();
                            });
                        }
                    });
                    

                    picBigBg.addClass('pic-big-bg-show');
                    picSwiper.css("display","block");

                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 1,
                        spaceBetween: 0,
                        centeredSlides: true,
                        loop: false,
                        onSlideNextStart: function(swiper){
                            var i = swiperWrapper.find(".swiper-slide-active").index();
                            var index = Number(i)?(Number(i)+1):1;
                            picSwiper.find(".slide-curr-num").html(index);
                        },
                        onSlidePrevStart: function(swiper){
                            var i = swiperWrapper.find(".swiper-slide-active").index();
                            var index = Number(i)?(Number(i)+1):1;
                            picSwiper.find(".slide-curr-num").html(index);
                        },
                        onInit:function(swiper){
                            //add wii-change
                            /*var slideImg = picSwiper.find('.swiper-slide').find('img');
                            slideImg.each(function(){
                                this.addEventListener('touchstart', function(){
                                    this.style.willChange = 'top,left,bottom,transform';
                                });
                            });*/
                        },
                        onTouchEnd:function(swiper){
                            var deviceWidth = document.body&&document.body.clientWidth||document.getElementsByTagName("html")[0].offsetWidth;
                            
                            //限制点击事件触发区域
                            nuActiveAreaX = deviceWidth*0.78125;
                            nuActiveAreaY = deviceWidth*0.21875;
                            if(swiper.touches.startX==swiper.touches.currentX&&swiper.touches.startY==swiper.touches.currentY){
                                if(swiper.touches.currentX<=nuActiveAreaX||(swiper.touches.currentX>nuActiveAreaX&&swiper.touches.currentY>nuActiveAreaY)){
                                    picSwiper.css("display","none");
                                    picBigBg.addClass('pic-big-bg-fadeOut');
                                    picBigBg.removeClass('pic-big-bg-show').removeClass('pic-big-bg-fadeOut');
                                    enlargeCarouselContainer.empty();
                                    /*$('.swiper-slide img').removeClass('pic-big-img');
                                    picBigBg.addClass('pic-big-bg-fadeOut');
                                    picBigBg.removeClass('pic-big-bg-show').removeClass('pic-big-bg-fadeOut');
                                    picSwiperswipe-footpicSwiperdel-btn").css("display","none");
                                    picSwiperiv").css("overflow","visible");
                                    //获取原图片的位置
                                    var sourceImg = currImgParent.find('img').eq(swiper.activeIndex);
                                    var picSwipeHeight = picSwiper.height();
                                    var top = sourceImg.offset().top-picSwiper.offset().top;
                                    var bottom =picSwipeHeight-top-sourceImg.height();
                                    var width = sourceImg.width();
                                    var left1 = (swiper.activeIndex)*deviceWidth;//改变宽度前定位，当前slide左侧
                                    var left2 = left1+sourceImg.offset().left;//最终位置*/
                                    
                                    //定位slide中的图片
                                    /*var slideImg = picSwiper.find('.swiper-slide').eq(swiper.activeIndex).find('img');
                                    if(top<(picSwipeHeight*1/3)){
                                        slideImg.css({'position':'fixed','left':left1+'px'}).animate({
                                            'left':left2+'px',
                                            'width':width+'px',
                                            'top':top+'px'
                                        }, 500, 'ease-out',function(){
                                            //remove wii-change
                                            this.style.willChange = '';
                                            //$(this).css('will-change','');
                                            enlargeCarouselContainer.empty();
                                        });
                                    }else{
                                        slideImg.css({'position':'fixed','left':left1+'px'}).animate({
                                            'left':left2+'px',
                                            'width':width+'px',
                                            'bottom':bottom+'px'
                                        }, 500, 'ease-out',function(e){
                                            //remove wii-change
                                            this.style.willChange = '';
                                            //$(this).css('will-change','');
                                            enlargeCarouselContainer.empty();
                                        });
                                    }*/
                                    
                                    //var translatePositionName = top<(picSwipeHeight*1/3)?'top':'bottom';
                                    //var translatePositionVal = top<(picSwipeHeight*1/3)?top:bottom;
                                    /*slideImg.css({'position':'fixed','left':left+'px'}).animate({
                                        'left':(left+sourceImg.offset().left)+'px',
                                        'width':width+'px',
                                        //'-webkit-transform': 'scale('+(width/slideImg.width())+')',
                                        [translatePositionName]:translatePositionVal+'px'
                                    }, 500, 'ease-out',function(){
                                        enlargeCarouselContainer.empty();
                                    });*/
                                }
                            }
                        }
                    });
                    swiper.slideTo($(this).index(), false);
                    picSwiper.find('.swiper-slide img').addClass('pic-big-img');
                });
            });
        }
    }