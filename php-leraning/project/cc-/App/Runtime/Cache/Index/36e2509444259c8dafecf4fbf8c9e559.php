<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/common.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>

	<style type="text/css">
		body{
			background: #E8E8E8;
		}
		#box{
			width: 500px;
			height: 300px;
			border: 1px solid #9670BA;
			border-top: 2px solid #6805AF;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -250px;
			margin-top: -150px;
			background: #DFE5EC;
			box-shadow: 5px 5px 5px #805AA9;
		}
		h1{
			background: #CCCCCC;
			height: 45px;
			line-height: 45px;
			font-size: 25px;
			color: #805AA9;
			text-align: center;
		}
		p{
			font-size: 20px;
			font-family:'微软雅黑';
			color: #333;
			padding: 20px 0px;
			line-height: 50px;
			text-align: center;
		}
		input{
			border: none;
			background: #7308BA;
			color: #fff;
			width: 100px;
			height: 40px;
			position: absolute;
			left: 50%;
			margin-left: -50px;
			bottom: 40px;
			font-size: 20px;
			cursor: pointer;
		}
		.info{
			color: #7308BA;
			font-size: 40px;
			font-weight: 900;
			position: absolute;
			left: 50%;
			top: 50%;
			/*margin-left: -90px;*/
			margin-top: -30px;
			z-index: 100;
			width: 200px;
			height: 60px;
			display: none;
		}
	</style>
	<script type="text/javascript">
		$(function(){
			$('input').click(function(){
				$.ajax({
					url : "<?php echo U('Cart/pay');?>",
					type : 'post',
					data : 'pay = 1',
					dataType : 'json',
					success : function(data){
						if(data.stat){
							$('.info').fadeIn(1000,function(){
								$(this).fadeOut(500,function(){
									location.href = "__ROOT__";
								});
							});
						}else{
							alert(data.info);
						}
					}
				});
				
			})
		});
	</script>
</head>
<body>
	<div id="box">
		<h1>在线支付模拟页面</h1>
		<p>你需要向&nbsp;&nbsp;CC 女装城&nbsp;&nbsp;账号支付&nbsp;&nbsp;<?php echo ($total["total"]); ?>.00&nbsp;&nbsp;元<br />确定吗？</p>
		<input type="button" value="确定" />
	</div>
	<div class="info">支付成功 √</div>
</body>
</html>