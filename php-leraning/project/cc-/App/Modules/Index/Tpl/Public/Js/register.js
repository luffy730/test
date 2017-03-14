$(function(){

	//图片翻牌
	var imgarray = new Array(pub+"/Images/reg3.jpg", pub+"/Images/reg4.jpg");	//翻转展示图片路径       
	var linkarray = new Array("",""); //翻转展示图片连接地址
	function fanzhan(){
		$("#picshowfz div").each(function(d){	//查找所有展示图片并翻转新图片    
		    $(this).find("img").animate({ width: "0px",left: "122px"}, 300,function(){})		//实现翻转动画 从有到无    
			var oldimg = $(this).find("img").attr("src");	//存放原来图片路径    
			var oldlink = $(this).find("img").attr("href");	//存放原来图片链接地址    
			$(this).find("img").attr("src", imgarray[d])	//设置新图片路径    
			$(this).find("img").attr("width", "0");		//设置新图片宽度    
			$(this).find("img").attr("href", linkarray[d])	//设置新图片连接地址    
			imgarray[d]=oldimg;
	    	linkarray[d]=oldlink;
	    	$(this).find("img").animate({ width: "245px",left: "0px"}, 300); //翻转动画 从无到有   
		})
	}
	var anima=setInterval(function(){
		fanzhan();
	},4000) 	//定时执行翻牌效果 
	$("#picshowfz").hover(			//鼠标放到图片上停止翻转效果 移除图片翻转效果继续
              function () {
                clearInterval(anima);
              },
              function () {
                anima=setInterval(function(){
                	fanzhan();
                },4000) 
              }
    );  


    // 点击换验证码图片
	$('#code').click(function(){
		var url = $(this).attr('src');
		$(this).attr('src',url+'?'+Math.random());
	});

	



});




// 注册验证
var validate = {
	username : false,
	pwd : false,
	pwded : false,
	code : false,
};

$(function(){
	$('form[name=register]').submit(function (){
		if(validate.username && validate.pwd && validate.pwded && validate.code){
			return true;
		}
		$('input[name=username]').trigger('blur');
		$('input[name=pwd]').trigger('blur');
		$('input[name=pwded]').trigger('blur');
		$('input[name=code]').trigger('blur');

		return false;
	});

	// $('input[name=mail]').blur(function (){
	// 	var mail = $(this).val();
	// 	var span = $(this).next();

	// 	if(mail == ''){
	// 		span.html('请输入邮箱').addClass('error');
	// 		validate.mail = false;
	// 		return;
	// 	}

	// 	if(!/^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel|cn)$/.test(mail)){
	// 		span.html('格式不正确').addClass('error');
	// 		validate.mail = false;
	// 		return;
	// 	}

	// 	$.post(checkUrl + 'mail', {'mail' : mail}, function (data){
	// 		if(data == 1){
	// 			span.html('邮箱可用').removeClass('error');
	// 			validate.mail = true;
	// 		}else{
	// 			span.html('邮箱已存在.请重新输入').addClass('error');
	// 			validate.mail = false;
	// 		}
	// 	},'json');
	// });

	// 用户名
	$('input[name=username]').blur(function () {
		var username = $(this).val();
		var span = $(this).next();

		if (username == '')
		{
			span.html('请输入账户').addClass('error');
			validate.username = false;
			return;
		}

		if (!/^[a-zA-Z]\w{4,20}$/.test(username))
		{
			span.html('格式不正确').addClass('error');
			validate.usrename = false;
			return;
		}

		$.post(checkUrl + 'username', {'uname' : username}, function (data) {
			if (data == 1)
			{
				span.html('账户可用').removeClass('error');
				validate.username = true;
			}
			else 
			{
				span.html('账户已存在').addClass('error');
				validate.username = false;
			}
		}, 'json');

	});

	// 用户密码
	$('input[name=pwd]').blur(function () {
		var pwd = $(this).val();
		var span = $(this).next();

		if (pwd == '')
		{
			span.html('密码不能为空').addClass('error');
			validate.pwd = false;
			return;
		}

		if (!/^\w{6,20}$/.test(pwd))
		{
			span.html('密码格式不正确').addClass('error');
			validate.pwd = false;
			return;
		}
		span.html('').removeClass('error');
		validate.pwd = true;

	});

	$('input[name=pwded]').blur(function () {
		var pwded = $(this).val();
		var span = $(this).next();

		if (pwded != $('input[name=pwd]').val())
		{
			span.html('两次密码不一致').addClass('error');
			validate.pwded = false;
			return;
		}
		span.html('').removeClass('error');
		validate.pwded = true;
	});

	// 验证码
	$('input[name=code]').blur(function () {
		var code = $(this).val();
		var span = $(this).next().next();

		if (code == '')
		{
			span.html('请输入验证码').addClass('error');
			validate.code = false;
			return;
		}

		if(code.length != 4){
			span.html('验证码位数错误').addClass('error');
			validate.code = false;
			return;
		}

		$.post(checkUrl + 'code', {'code' : code}, function (data) {
			if (data == 1)
			{
				span.html('验证码正确').removeClass('error');
				validate.code = true;
			}
			else
			{
				span.html('验证码错误').addClass("error");
				validate.code = false;
			}
		}, 'json');
	});
});



