/*********************************************************************/
/*********************** 公共的js文件，多个页面中都有的效果 **********************************/
/*********************************************************************/
$(function(){
	//搜索框聚焦失焦
	var keyword = $('#keyword');
	keyword.focus(function(){
		if( $(this).val() == '请输入品牌或商品名称搜索' ){
			$(this).val('').css({'color':'#333'});
		}
	}).blur(function(){
		if( $.trim( $(this).val() ) == '' ){
			$(this).val('请输入品牌或商品名称搜索').css({'color':'#999'});
		}
	});

	//页面顶部广告点击关闭
	$('.header_ad i').click(function(){
		$('.header_ad_box').slideUp();
	});


////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//返回顶部 按钮 效果
	$('.back').hover(function(){
		$(this).css('background-position','-250px -150px');
	},function(){
		$(this).css('background-position','-210px -150px');
	}).click(function(){
		// $(window).scrollTop(0);
		var st = $(window).scrollTop();
		var nowTop=st;
		var step=10;
		var dt = setInterval(function(){
			step+=10;
			nowTop-=step;
			$(window).scrollTop(nowTop);
			if(nowTop<=0){
				nowTop = 0;
				clearInterval(dt);
			}
		},5);
	});
	$(window).scroll(function(){
		var st = $(window).scrollTop();
		if(st > 350){
			$('.back').fadeIn();
		}else{
			$('.back').fadeOut();
		}
	});


	//根据购物车内商品数量是否 >0 改变购物车图标的颜色
	if(parseInt($('#shopcart').text()) > 0){
		$('#shopcart').css({'background-position':'-1px -101px'});
	}else{
		$('#shopcart').css({'background-position':'-150px -100px'});
	}















});