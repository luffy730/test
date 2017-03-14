$(function (){
	//登录验证
	var validate = {
		loginname : false,
		loginpwd : false
	};

	$('form[name=login]').submit(function (){
		if(validate.loginname && validate.loginpwd){
			return true;
		}

		$('input[name=loginname]').trigger('blur');
		$('input[name=loginpwd]').trigger('blur');

		return false;
	});

	$('input[name=loginname]').blur(function (){
		var loginname = $(this).val();
		var span = $(this).next();

		if(loginname == ''){
			span.html('请输入账户名').addClass('error');
			validate.loginname = false;
			return;
		}

		span.html('').removeClass('error');
		validate.loginname = true;
	});

	$('input[name=loginpwd]').blur(function () {
		var loginpwd = $(this).val();
		var span = $(this).next();

		if (loginpwd == '')
		{
			span.html('密码不能为空').addClass('error');
			validate.loginpwd = false;
			return;
		}
		span.html('').removeClass('error');
		validate.loginpwd = true;

	});


	//图片角进轮换
	var href = [];
	var list = [];
	var as = $('#small a');
	for(var i = 0; i < as.length; i++){
		href.push(as.eq(i).attr('href'));
		list.push(as.eq(i).find('img').attr('list'));
	}

	var info = [];
	info.push([href[0],list[0], '0px', '0px']);
	info.push([href[1],list[1], '404px', '0px']);
	info.push([href[2],list[2], '0px', '404px']);
	info.push([href[3],list[3], '404px', '404px']);

	var i = 0;
	var dt = null;
	function play(){
		if(!dt){
			dt = setInterval(function(){
				$('#big a').attr('href', info[i][0]);
				$('#big a img').attr('src', info[i][1]).css({'left':info[i][2],'top':info[i][3],'width':'0px','z-index':2}).animate({'left':'0px','top':'0px','width':'404px'},1000);
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
		$('#big a img').attr('src', info[i][1]).css({'left':info[i][2],'top':info[i][3],'width':'0px','z-index':2}).animate({'left':'0px','top':'0px','width':'404px'},1000);
	},function(){
		i++;
		if(i>3)
			i = 0;
		if(!dt)
			play();
	});




});