$(function(){
	//全部搜索分类里点击背景变化
	$('.all dl dd ul li').click(function(){
		$('.all dl dd ul li').css({'background':'#fff'});
		$('.all dl dd ul li').find('a').find('i').css({'background-position':'0px -8px'});
		$('.all dl dd ul li').find('a').find('em').css({'color':'#666'});
		$('.all dl dd ul li').find('a').find('span').css({'color':'#A6A6A6'});

		$(this).css({'background':'#B09F9F'});
		$(this).find('a').find('i').css({'background-position':'-4px -8px'});
		$(this).find('a').find('em').css({'color':'#fff'});
		$(this).find('a').find('span').css({'color':'#fff'});
	});

	// 当前所在路径中 “在当前状态下搜索” 聚焦失焦
	var filter = $('#filter');
	filter.focus(function(){
		if( $(this).val() == '在当前状态下搜索' ){
			$(this).val('').css({'color':'#333'});
		}
	}).blur(function(){
		if( $.trim( $(this).val() ) == '' ){
			$(this).val('在当前状态下搜索').css({'color':'#ccc'});
		}
	});

	// 商品属性筛选 区块 点击不同的筛选属性
	$('.attr dl dd ul li').click(function(){
		$(this).siblings().find('a').css({'background':'#fff','color':'#666'});
		$(this).find('a').css({'background':'#B09F9F','color':'#fff'});
	});

	//列表 显示方式 '大图' '列表' 点击
	$('#bigpic').click(function(){
		$(this).css({'background':'#B09F9F','color':'#fff'}).find('i').css({'background-position':'-36px 0px'});
		$('#list').css({'background':'#fff','color':'#666'}).find('i').css({'background-position':'-48px 0px'});
		$('#goods').removeClass("list_row").addClass("goods_list");
	});
	$('#list').click(function(){
		$(this).css({'background':'#B09F9F','color':'#fff'}).find('i').css({'background-position':'-60px 0px'});
		$('#bigpic').css({'background':'#fff','color':'#666'}).find('i').css({'background-position':'-24px 0px'});
		$('#goods').removeClass("goods_list").addClass("list_row");
	});

	//商品 列表项 鼠标悬停
	$('.goods_list ul li').hover(function(){
		$(this).css({'z-index':100});
		$(this).find('strong').show();
		$(this).find('i').show();
		$('.buy_btn',this).show();
	},function(){
		$(this).css({'z-index':0});
		$(this).find('strong').hide();
		$(this).find('i').hide();
		$('.buy_btn',this).hide();
	});

	//商品 列表项 列表 行式 样式 鼠标悬停
	$('.list_row ul li').hover(function(){
		$(this).css({'background':'#FAF7F7'});
		$('.buy_btn',this).show();
	},function(){
		$(this).css({'background':'#fff'});
		$('.buy_btn',this).hide();
	});




});