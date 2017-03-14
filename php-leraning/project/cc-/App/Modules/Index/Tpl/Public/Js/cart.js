$(function(){
	//点击删除 提示
	$('.delete').click(function(){
		return confirm('您确实要把该商品移出购物车吗？');
	});

	//全选 全不选
	$('#entire').toggle(function(){
		$('#list :checkbox').attr('checked','checked');
	},function(){
		$('#list :checkbox').removeAttr('checked');
	});

	//删除 多个鼠标悬停
	$('#del_some').hover(function(){
		$(this).css('text-decoration','underline');
	},function(){
		$(this).css('text-decoration','none');
	})


	//点击删除多个
	$('#del_some').click(function(){
		var some = $('.goods_list .select input:checked');
		var some_string = '';
		for(var i = 0; i < some.length; i++){
			some_string += some.eq(i).attr('sessionKey');
			some_string += ',';
		}
		some_string = some_string.substring(0,some_string.length-1);
		if(some_string.length == 0){
			alert('请选择要删除的商品');
			return;
		}
		if(confirm('您确实要把该商品移出购物车吗？')){
			$.ajax({
				url : del_some_url,
				type : 'post',
				data : 'keys='+some_string,
				dataType : 'json',
				success : function(data){
					if(data.stat == 0){
						alert(data.info);
					}else{
						window.location.href = cart_index_url;
					}
				}
			});
		}
	});



	//收货地址
	var validate = {
		consignee : false,
		address : false,
		phone : false
	}
	$('.info_text').blur(function(){
		if($.trim($(this).val()) == ''){
			$('#consignee_warn').css({'display':'block'});
			validate.consignee = false;
		}else{
			$('#consignee_warn').css({'display':'none'});
			validate.consignee = true;
		}
	});

	$('.info_address').blur(function(){
		if($.trim($(this).val()) == ''){
			$('#address_warn').css({'display':'block'});
			validate.address = false;
		}else{
			$('#address_warn').css({'display':'none'});
			validate.address = true;
		}
	});

	$('.info_numb').blur(function(){
		if($.trim($(this).val()) == ''){
			$('#phone_warn').css({'display':'block'});
			validate.phone = false;
		}else{
			$('#phone_warn').css({'display':'none'});
			validate.phone = true;
		}
	});

	$('.determine').click(function(){
		$('.info_text').trigger('blur');
		$('.info_address').trigger('blur');
		$('.info_numb').trigger('blur');
		var ok = validate.consignee && validate.address && validate.phone;
		if(ok){
			$('.form_info').slideUp();
		}
		return false;
	});



	//点击 “提交订单” 按钮 ， 发异步 提交订单
	$('.submit_btn').click(function(){
		var postData = {
			consignee : $('input[name="consignee"]').val(),
			address : $('input[name="address"]').val(),
			mobile : $('input[name="mobile"]').val(),
			remark : $('input[name="remark"]').val(),

		}
		$.ajax({
			url : add_order_url,
			type : 'post',
			data : postData,
			dataType : 'json',
			success : function(data){
				if(data.stat){
					window.location.href = success_order_url;
				}else{
					alert(data.info);
				}
			}
		});
		

	});







});