window.onload = function () {
	/**
	 * 放大镜
	 */
	var mini = $('#mini');
	var miniNum = $('li', mini).length;
	var medium = $('#medium');
	var max = $('#max');
	var block = $('#block');
	var ratio = $('img', max).width() / $('img', medium).width();

	//小图
	$('img', mini).click(function () {
		$('img', medium).attr('src', $(this).attr('medium'));
		$('img', max).attr('src', $(this).attr('max'));
		$(this).parent().addClass('mini-cur').siblings().removeClass('mini-cur');
	});

	$('#up').click(function () {
		var ul = $('ul', mini);
		var _top = ul.position().top;
		if (miniNum > 3 && _top > - ul.height() + 464)
		{
			ul.stop().animate({				//将stop()去掉可以将点击过快时的bug去掉
				'top' :  _top - 116
			}, 400);
		}
	});
	$('#down').click(function () {
		var ul = $('ul', mini);
		var _top = ul.position().top;
		if (_top < 0)
		{
			ul.stop().animate({				//将stop()去掉可以将点击过快时的bug去掉
				'top' :  _top + 116
			}, 400);
		}
	});

	$('#move').hover(function (e) {
		// 大图显示
		var layerX = e.originalEvent.layerX || e.offsetX || 0;
		var layerY = e.originalEvent.layerY || e.offsetY || 0;
		max.css({
			'left' : layerX,
			'top' : layerY
		}).stop().animate({
			'width' : '442px',
			'height' : '392px',
			'left' : 420,
			'top' : 0,
			'opacity' : 1
		}, 400);

		block.css({
			'width' : 450 / ratio + 'px',
			'height' : 400 / ratio +'px'
		}).show();

		// 随小图移动		在这写的话，鼠标移动的多的话放大镜大图会卡，这是因为 内存溢出 内存泄露 了，
		// 解决办法是将这个mousemove事件提出去，放到外层
		// 
		// $(this).mousemove(function (e) {
		// 	$(this).css('cursor', 'move');

		// 	var layerX = e.originalEvent.layerX || e.offsetX || 0;
		// 	var layerY = e.originalEvent.layerY || e.offsetY || 0;
		// 	var ox = $(this).width() - block.width();
		// 	var oy = $(this).height()- block.height();
		// 	var _x = layerX - block.width() / 2;
		// 	var _y = layerY - block.height() / 2;
			
		// 	_x = _x < 0 ? 0 : _x;
		// 	_y = _y < 0 ? 0 : _y;
		// 	_x = _x > ox ? ox : _x;
		// 	_y = _y > oy ? oy : _y;

		// 	block.css({
		// 		'left' : _x,
		// 		'top' : _y
		// 	});

		// 	$('img', max).css({
		// 		'left' : - block.position().left * ratio,
		// 		'top' : - block.position().top * ratio
		// 	});
		// });

	}, function (e) {
		$(this).css('cursor', 'default');
		block.stop().hide();

		var layerX = e.originalEvent.layerX || e.offsetX || 0;
		var layerY = e.originalEvent.layerY || e.offsetY || 0;

		max.stop().animate({
			'width' : 0,
			'height' : 0,
			'left' : layerX,
			'top' : layerY,
			'opacity' : 0
		}, 400);
	});

	// 随小图移动，提出来到这里，解决大图卡的bug
	$('#move').mousemove(function (e) {
		$(this).css('cursor', 'move');

		var layerX = e.originalEvent.layerX || e.offsetX || 0;
		var layerY = e.originalEvent.layerY || e.offsetY || 0;
		var ox = $(this).width() - block.width();
		var oy = $(this).height()- block.height();
		var _x = layerX - block.width() / 2;
		var _y = layerY - block.height() / 2;
		
		_x = _x < 0 ? 0 : _x;
		_y = _y < 0 ? 0 : _y;
		_x = _x > ox ? ox : _x;
		_y = _y > oy ? oy : _y;

		block.css({
			'left' : _x,
			'top' : _y
		});

		$('img', max).css({
			'left' : - block.position().left * ratio,
			'top' : - block.position().top * ratio
		});
	});

	

	//同品牌推荐 图片角进轮播器
	var href = [];
	var list = [];
	var as = $('#small a');
	for(var i = 0; i < as.length; i++){
		href.push(as.eq(i).attr('href'));
		list.push(as.eq(i).find('img').attr('list'));
	}

	var info = [];
	info.push([href[0],list[0], '0px', '0px']);
	info.push([href[1],list[1], '204px', '0px']);
	info.push([href[2],list[2], '0px', '204px']);
	info.push([href[3],list[3], '204px', '204px']);

	var i = 0;
	var dt = null;
	function play(){
		if(!dt){
			dt = setInterval(function(){
				$('#big a').attr('href', info[i][0]);
				$('#big a img').attr('src', info[i][1]).css({'left':info[i][2],'top':info[i][3],'width':'0px','z-index':2}).animate({'left':'0px','top':'0px','width':'204px'},1000);
				i++;
				if(i>3)
					i=0;
			},2500);
		}
	}
	play();

	$('#big a img').hover(function(){
		if(dt){
			clearInterval(dt);
			dt = null;
		}
	},function(){
		$(this).css({'width':'0px'});
		setTimeout(function(){
			if(!dt){
				play();
			}
		},1000);
	});
	$('#small a').hover(function(){
		i = $(this).index();
		$('#big a').attr('href', info[i][0]);
		$('#big a img').attr('src', info[i][1]).css({'left':info[i][2],'top':info[i][3],'width':'0px','z-index':2}).animate({'left':'0px','top':'0px','width':'204px'},1000);
	},function(){
		i++;
		if(i>3)
			i = 0;
		if(!dt)
			play();
	});


	//商品详情等 导航条固定定位
	var conT = $('.con').offset().top;
	$(window).scroll(function(){
		wT = $(window).scrollTop()
		if( wT> conT){
			$('.nav').css({'top' : (wT - conT) + 'px'});
		}else{
			$('.nav').css({'top' : '0px'});
		}
	});
	

	//发表评论字数控制
	$('#msg form textarea').keyup(function(){
		var str = $(this).val();
		if($.trim(str) !=''){
			var result = strLenControl(str, 120);
			$(this).val(result[0]);
			$('#msg p span').html(result[1]);
		}
	});



	//点击规格
	$('#goods-info .attr dl dd span').click(function(){
		$(this).addClass('cur').siblings().removeClass('cur');

		//异步查询具体货品信息
		var postData = $('.color').find('.cur').attr('gtid') + ',' + $('.size').find('.cur').attr('gtid');
		$.ajax({
			url : url,
			type : 'post',
			data : 'combine=' + postData,
			dataType : 'json',
			success : function(data){
				if(!data.stat){
					alert(data.info);
					return false;
				}else{
					$('.number b').html(data.info['number']);
					var price_text = '¥' + (price + data.info['extra']);
					$('.price').text(price_text);
					$('#inventory').text(data.info['inventory']);
				}
			} 
		});

	});


	// 加入购物车,异步添加
	$('#cart').click(function(){
		var combine = $('.color').find('.cur').attr('gtid') + ',' + $('.size').find('.cur').attr('gtid');
		var quantity = $('#quantity').val();
		$.ajax({
			url : add_cart_url,
			type : 'post',
			data : 'combine=' + combine + '&quantity=' + quantity,
			dataType : 'json',
			success : function(data){
				if(data.stat == 0){
					alert(data.info);
				}
				if(data.stat == 1){
					$('#ok span').text(data.info);
					$('#ok').show().animate({'top':'500px'});
					$('#shopcart').text(data.info).css({'background-position':'-1px -101px'});
				}
				if(data.stat == 2){
					$('#already').show().animate({'top':'500px'});
				}
			} 
		});
	});

	//成功添加到购物车 提示框关闭
	$('.success i,.quit').click(function(){
		$(this).parent().animate({'top':'200px'},function(){
			$(this).hide();
		});
	});

	//多买一件，异步添加
	$('#more').click(function(){
		$.ajax({
			url : more_url,
			type : 'post',
			data : 'more=1',
			dataType : 'json',
			success : function(data){
				if(data.stat){
					$('#already').hide().animate({'top':'200px'});
					$('#ok').show().animate({'top':'500px'});
				}
			} 
		});
	});


	// 点击换验证码图片
	$('#code').click(function(){
		var url = $(this).attr('src');
		$(this).attr('src',url+'?'+Math.random());
	});






}