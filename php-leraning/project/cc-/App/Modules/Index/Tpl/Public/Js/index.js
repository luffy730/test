/*********************************************************************/
/*********************** 首页的js文件 **********************************/
/*********************************************************************/
$(function(){
////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//左侧导航 鼠标悬停出现隐藏菜单，鼠标离开隐藏
	//隐藏菜单的定位
	var dls = $('.hover');
	dls.mouseover(function(){
		var sub = $(this).find('.hide_nav');
		var curTop = $(this).position().top + $(this).outerHeight() - sub.outerHeight();
		curTop = curTop < 0 ? 0 :curTop;
		sub.css({'top':curTop+'px'}).show();
		$(this).css({'background':'#EFEAE9','color':'#666','padding':'9px 15px 9px 14px','border':'1px solid #d1d1d1','border-right':'none'}).find('a').css({'color':'#666'});
		var i = dls.index(this) + 1;
		$(this).find('i').css({'background-position':i*-20+'px -20px'});
	}).mouseout(function(){
		$(this).find('.hide_nav').hide();
		$(this).css({'background':'#9670BA','color':'#fff','padding':'10px 15px','border':'none'}).find('a').css({'color':'#fff'});
		var i = dls.index(this) + 1;
		$(this).find('i').css({'background-position':i*-20+'px 0px'});
	});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//左侧分类导航随滚动条固定定位
	var cate = $('.sub_nav_left');
	var cateX = cate.offset().left;
	var navH = $('.left_nav').height();
	var mainH = $('.main').height();
	$(window).scroll(function(){
		var headerY = $('.sub_nav_items').offset().top;
		if($(window).scrollTop() >= headerY){
			cate.css({'position':'fixed','left':cateX+'px','top':'0px'});
			$('.left_nav').css({'position':'fixed','left':cateX+'px','top':'35px'});
		}
		if($(window).scrollTop() < headerY){
			cate.css({'position':'absolute','left':'0px','top':'0px'});
			$('.left_nav').css({'position':'absolute','left':'0px','top':'0px'});
		}
		var mainY = $('.main').offset().top;
		var endY = mainH + mainY -navH -100;
		if($(window).scrollTop() >= endY){
			cate.css({'position':'absolute','left':'0px','top':endY-headerY+'px'});
			$('.left_nav').css({'position':'absolute','left':'0px','top':endY-headerY+'px'});
		}
	});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//轮换板
	var i = 0;
	var dt = null;
	// 轮换 函数
	function play(){
		if(!dt){
			dt = setInterval(function(){
				i++;
				if(i > 5)
					i = 0;
				$('.slide_img li').eq(i).fadeIn(500).siblings().fadeOut(500);
				$('.slide_ctrl li').eq(i).addClass('slide_ctrl_cur').siblings().removeClass('slide_ctrl_cur');
			},3000);
		}
	}
	// 进入页面即播放
	play();
	//鼠标悬停 停止播放， 鼠标离开 开始播放
	$('.slide_ctrl li,.slide_img li,.slide_prev,.slide_next').hover(function(){
		i = $(this).index();
		$(this).addClass('slide_ctrl_cur').siblings().removeClass('slide_ctrl_cur');
		$('.slide_img li').eq(i).fadeIn(500).siblings().fadeOut(500);
		if(dt){
			clearInterval(dt);
			dt = null;
		}
	},function(){
		play();
	});
	// 鼠标悬停，向左向右图标出现，鼠标离开，隐藏
	$('.slide_banner').hover(function(){
		$('.slide_prev').show();
		$('.slide_next').show();
	},function(){
		$('.slide_prev').hide();
		$('.slide_next').hide();
	});
	// 点击向左图标，向左轮换
	$('.slide_prev').click(function(){
		i--;
		if(i < 0)
			i = 5;
		$('.slide_img li').eq(i).fadeIn(500).siblings().fadeOut(500);
		$('.slide_ctrl li').eq(i).addClass('slide_ctrl_cur').siblings().removeClass('slide_ctrl_cur');
	});
	// 点击向右图标，向右轮换
	$('.slide_next').click(function(){
		i++;
		if(i > 5)
			i = 0;
		$('.slide_img li').eq(i).fadeIn(500).siblings().fadeOut(500);
		$('.slide_ctrl li').eq(i).addClass('slide_ctrl_cur').siblings().removeClass('slide_ctrl_cur');
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//品牌推荐 鼠标效果
	$('.brand ul li').hover(function(){
		$(this).find('img').animate({'margin-top':'-280px'},200);
	},function(){
		$(this).find('img').animate({'margin-top':'0px'},200);
	});

	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//潮流新品秀 轮播效果
	var stat = [];
	var op = [0.4,0.2,0,0.2,0.4];
	// 将 动画终状态 存入数组
	stat.push(["160px","240px","0px","30px",10]);
	stat.push(["187px","280px","100px","10px",20]);
	stat.push(["200px","300px","234px","0px",30]);
	stat.push(["187px","280px","400px","10px",20]);
	stat.push(["160px","240px","533px","30px",10]);
	var m = 0;
	var n = 1;
	var x = 2;
	var y = 3;
	var z = 4;
	// 向右运动的函数
	function right(){
		m++;
		if(m > 4)
			m = 0;
		n++;
		if(n > 4)
			n = 0;
		x++;
		if(x > 4)
			x = 0;
		y++;
		if(y > 4)
			y = 0;
		z++;
		if(z > 4)
			z = 0;
		$('.stat1').css('z-index',stat[m][4]).animate({'width':stat[m][0],'height':stat[m][1],'left':stat[m][2],'top':stat[m][3]},150);
		$('.stat2').css('z-index',stat[n][4]).animate({'width':stat[n][0],'height':stat[n][1],'left':stat[n][2],'top':stat[n][3]},150);
		$('.stat3').css('z-index',stat[x][4]).animate({'width':stat[x][0],'height':stat[x][1],'left':stat[x][2],'top':stat[x][3]},150);
		$('.stat4').css('z-index',stat[y][4]).animate({'width':stat[y][0],'height':stat[y][1],'left':stat[y][2],'top':stat[y][3]},150);
		$('.stat5').css('z-index',stat[z][4]).animate({'width':stat[z][0],'height':stat[z][1],'left':stat[z][2],'top':stat[z][3]},150);
		$('.stat1 b').css('opacity',op[m]);
		$('.stat2 b').css('opacity',op[n]);
		$('.stat3 b').css('opacity',op[x]);
		$('.stat4 b').css('opacity',op[y]);
		$('.stat5 b').css('opacity',op[z]);
	}
	// 向左运动的函数
	function left(){
		m--;
		if(m < 0)
			m = 4;
		n--;
		if(n < 0)
			n = 4;
		x--;
		if(x < 0)
			x = 4;
		y--;
		if(y < 0)
			y = 4;
		z--;
		if(z < 0)
			z = 4;
		$('.stat1').css('z-index',stat[m][4]).animate({'width':stat[m][0],'height':stat[m][1],'left':stat[m][2],'top':stat[m][3]},150);
		$('.stat2').css('z-index',stat[n][4]).animate({'width':stat[n][0],'height':stat[n][1],'left':stat[n][2],'top':stat[n][3]},150);
		$('.stat3').css('z-index',stat[x][4]).animate({'width':stat[x][0],'height':stat[x][1],'left':stat[x][2],'top':stat[x][3]},150);
		$('.stat4').css('z-index',stat[y][4]).animate({'width':stat[y][0],'height':stat[y][1],'left':stat[y][2],'top':stat[y][3]},150);
		$('.stat5').css('z-index',stat[z][4]).animate({'width':stat[z][0],'height':stat[z][1],'left':stat[z][2],'top':stat[z][3]},150);
		$('.stat1 b').css('opacity',op[m]);
		$('.stat2 b').css('opacity',op[n]);
		$('.stat3 b').css('opacity',op[x]);
		$('.stat4 b').css('opacity',op[y]);
		$('.stat5 b').css('opacity',op[z]);
	}
	var timer = null;
	//轮播 函数
	function move(){
		if(!timer){
			timer = setInterval(function(){
				right();
			},2000);
		}
	}
	//进入页面即播放
	move();
	//鼠标悬停 停止播放， 鼠标离开 开始播放
	$('.movie').hover(function(){
		if(timer){
			clearInterval(timer);
			timer = null;
		}
	},function(){
			if(!timer){
				move();
			}
	});
	// 点击轮播图片，如果不是最前的那一张，就运动到最前，如果是最前的那一张，就跳转
	$('.movie_box a').click(function(){
		var cur = $(this).index();
		switch(cur){
			case 0 : m = 2; n = 3; x = 4; y = 0; z = 1; break;
			case 1 : n = 2; x = 3; y = 4; z = 0; m = 1; break;
			case 2 : x = 2; y = 3; z = 4; m = 0; n = 1; break;
			case 3 : y = 2; z = 3; m = 4; n = 0; x = 1; break;
			case 4 : z = 2; m = 3; n = 4; x = 0; y = 1; break;
		}
		if( $(this).css('z-index') == 30 ){
			return true;
		}else{
			$('.stat1').css('z-index',stat[m][4]).animate({'width':stat[m][0],'height':stat[m][1],'left':stat[m][2],'top':stat[m][3]},150);
			$('.stat2').css('z-index',stat[n][4]).animate({'width':stat[n][0],'height':stat[n][1],'left':stat[n][2],'top':stat[n][3]},150);
			$('.stat3').css('z-index',stat[x][4]).animate({'width':stat[x][0],'height':stat[x][1],'left':stat[x][2],'top':stat[x][3]},150);
			$('.stat4').css('z-index',stat[y][4]).animate({'width':stat[y][0],'height':stat[y][1],'left':stat[y][2],'top':stat[y][3]},150);
			$('.stat5').css('z-index',stat[z][4]).animate({'width':stat[z][0],'height':stat[z][1],'left':stat[z][2],'top':stat[z][3]},150);
			$('.stat1 b').css('opacity',op[m]);
			$('.stat2 b').css('opacity',op[n]);
			$('.stat3 b').css('opacity',op[x]);
			$('.stat4 b').css('opacity',op[y]);
			$('.stat5 b').css('opacity',op[z]);
			return false;
		}
	});
	// 点击向左图标，向左轮换
	$('#arrow_left').click(function(){
		left();
	});
	// 点击向右图标，向左轮换
	$('#arrow_right').click(function(){
		right();
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	//乐活少女 和 魅力女人 区块的 tab切换 效果
	$('.tabs_title li').mouseover(function(){
		var cur = $(this).index();
		//标签切换
		$(this).find('a').css({'background':'#9670BA','color':'#fff'});
		$(this).siblings().find('a').find('i').show();
		$(this).prev().find('a').find('i').hide();
		$(this).siblings().find('a').css({'background':'none','color':'#A69FA5'});
		//如果鼠标选的不是第一个标签页，就改变第一个标签页的背景
		if(cur != 0){
			if( $(this).parent().find('li').eq(0).find('a').attr('class') == 'girls_title' ){
				$('.girls_title').find('b').css({'background-position':'0px -140px'});
				$('.girls_title').parent().css({'background':'none'});
			}else{
				$('.ladies_title').find('b').css({'background-position':'0px -180px'});
				$('.ladies_title').parent().css({'background':'none'});
			}
			//载入图片，事先载入的是一张极小的图片，当鼠标悬停时再载入真正的图片图片，代替异步
			$(this).parent().parent().find('.tabs_con').find('.switch').eq(cur).find('img').each(function(){
				var src = $(this).attr('_src');
				$(this).attr('src',src);
			});
		}
		//内容切换
		$(this).parent().parent().find('.tabs_con').find('.switch').eq(cur).show().siblings().hide();
	});
	// 如果鼠标选的是‘乐活少女’标签页
	$('.girls_title').mouseover(function(){
		$(this).css({'background':'#9670BA'}).find('b').css({'background-position':'0px -120px'});
	});
	// 如果鼠标选的是‘魅力女人’标签页
	$('.ladies_title').mouseover(function(){
		$(this).css({'background':'#9670BA'}).find('b').css({'background-position':'0px -160px'});
	});


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//乐活少女 和 魅力女人 区块中 图片遮罩和字体移动效果
	$('.tabs_con ul li a').hover(function(){
		var span = $(this).find('span');
		var l = ($(this).width() - span.width()) / 2;
		var t = ($(this).height() - span.height()) / 2;
		$(this).find('b').animate({'opacity':0.4},200);
		span.find('strong').css({'color':'#fff','border-color':'#ccc','font-size':'16px'});
		span.find('em').css({'color':'#fff'});
		span.animate({'left':l+'px','top':t+'px'},200);
	},function(){
		var span = $(this).find('span');
		$(this).find('b').animate({'opacity':0});
		span.find('strong').css({'color':'#333','border-color':'transparent','font-size':'14px'});
		span.find('em').css({'color':'transparent'},200);
		span.animate({'left':'10px','top':'10px'},200);
	});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//乐活少女块中最右侧小轮换板
	var girls_index = 0;
	var girls_timer = null;
	var girls = $('#girls_play p b');
	function girls_run(){
		if(!girls_timer){
			girls_timer = setInterval(function(){
				girls_index++;
				if(girls_index > 1)
					girls_index = 0;
				girls.eq(girls_index).css({'color':'#9670BA'}).siblings().css({'color':'#d0d0d0'});
				$('#girls_play div ul').eq(girls_index).show().siblings().hide();
			},3000);
		}
	}
	girls_run();
	girls.hover(function(){
		if(girls_timer){
			clearInterval(girls_timer);
			girls_timer = null;
		}
		girls_index = $(this).index();
		$(this).css({'color':'#9670BA'}).siblings().css({'color':'#d0d0d0'});
		$('#girls_play div ul').eq(girls_index).show().siblings().hide();
	},function(){
		girls_run();
	});

	// 魅力女人块中最右侧小轮换板
	var ladies_index = 0;
	var ladies_timer = null;
	var ladies = $('#ladies_play p b');
	function ladies_run(){
		if(!ladies_timer){
			ladies_timer = setInterval(function(){
				ladies_index++;
				if(ladies_index > 1)
					ladies_index = 0;
				ladies.eq(ladies_index).css({'color':'#9670BA'}).siblings().css({'color':'#d0d0d0'});
				$('#ladies_play div ul').eq(ladies_index).show().siblings().hide();
			},3000);
		}
	}
	ladies_run();
	ladies.hover(function(){
		if(ladies_timer){
			clearInterval(ladies_timer);
			ladies_timer = null;
		}
		ladies_index = $(this).index();
		$(this).css({'color':'#9670BA'}).siblings().css({'color':'#d0d0d0'});
		$('#ladies_play div ul').eq(ladies_index).show().siblings().hide();
	},function(){
		ladies_run();
	});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//糖果色短裤/个性卡通T恤/印花雪纺衫、背心连衣裙/美白防晒衫/优雅OL衬衣 tab标签页 中鼠标悬停于图片时，小遮罩变色
	$('.tabs_con_extra li').hover(function(){
		$(this).find('b').css('background','rgb(150,112,186)');
	},function(){
		$(this).find('b').css('background','#000');
	});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//乐活少女 和 魅力女人 品牌图标 区块 鼠标悬停图片效果
	$('.tabs_brand ul li').hover(function(){
		$(this).find('div').hide(100);
		$(this).find('a').show(100);
	},function(){
		$(this).find('div').show(100);
		$(this).find('a').hide(100);
	});
	$('.tabs_brand p').hover(function(){
		$(this).find('span').css('background-position','0px -163px');
	},function(){
		$(this).find('span').css('background-position','0px -143px');
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//畅销人气榜 tab切换 效果
	$('.hot_title ul li').mouseover(function(){
		var hot_cur = $(this).index();
		$(this).find('a').css({'background':'#CAB7DC','color':'#fff'})
		$(this).siblings().find('a').css({'background':'none','color':'#A69FA5'});
		$('.hot_visible .visible_box').eq(hot_cur).show().siblings().hide();
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//畅销人气榜 热搜商品 图片鼠标悬停 小遮罩变色
	$('.hot_toptenz li a img').hover(function(){
		$(this).parent().parent().find('b').css({'background':'#9670BA'});
	},function(){
		$(this).parent().parent().find('b').css({'background':'#000'});
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//畅销人气榜 热搜商品 点击可视区域上的向左向右图标，图片轮换
	$('.hot_left,.hot_right').click(function(){
		var goal = $(this).parent().find('.hot_toptenz');
		if(goal.css('left') == '0px')
			goal.css({'left':'-925px'});
		else
			goal.css({'left':'0px'});
	});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//'更多包邮商品'小箭头 鼠标悬停变色
	$('.freepost_title a').hover(function(){
		$(this).find('i').css('background-position','0px -164px');
	},function(){
		$(this).find('i').css('background-position','0px -144px');
	});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//包邮疯狂购 区块的 点击向左向右图标 效果
	$('.freepost_con').hover(function(){
		$(this).find('strong').show();
	},function(){
		$(this).find('strong').hide();
	});
	$('.freepost_con').find('strong').click(function(){
		$('.freepost_con ul:visible').hide().siblings('ul').show();
	});









});