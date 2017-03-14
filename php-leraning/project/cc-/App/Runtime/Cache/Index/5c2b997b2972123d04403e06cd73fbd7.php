<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/footer.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/login.js"></script>
</head>
<body>
	<!-- 头部区域 开始 -->
	<!-- ie6提示升级浏览器 -->
<script type="text/javascript">
	if(<?php echo ($ie6); ?>){
		alert('您好，你正在使用的浏览器是IE6，本网站的页面在IE6里可能会龙飞凤舞、面目全非，所以请您升级您的浏览器或改用火狐浏览器访问。微软已经将IE浏览器升级到了IE10，您却还在使用IE6，再不升级就OUT了...')
	}
</script>

	<!-- 顶部 登录 注册 工具条 开始 -->
	<div class="toolbar">
		<div class="toolbar_cont">
			<ul class="toolbar_quick">
				<li><a href="#">帮助</a></li>
				<li><a href="#">网站公告</a></li>
				<li><a href="<?php echo U('Cart/index');?>">购物车</a></li>
				<li><a href="#">我的账户</a></li>
				<?php if(isset($_SESSION['userid'])) : ?>
				<li><a href="<?php echo U('Login/logout');?>">退出</a></li>
				<li><a href=""><?php echo $_SESSION['username'] ?></a></li>
				<?php else: ?>
				<li><a href="<?php echo U('Register/index');?>">注册</a></li>
				<li><a href="<?php echo U('Login/index');?>">登录</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<!-- 顶部 登录 注册 工具条 结束 -->
	<!-- 顶部 广告 开始 -->
	<div class="header_ad_box">
		<div class="header_ad">
			<a href="#"><img src="__PUBLIC__/Images/header_ad.gif" alt="" /></a>
			<i></i>
		</div>
	</div>
	<!-- 顶部 广告 结束  -->
	<!-- 头部 logo 搜索框 区块 开始 -->
	<div class="header">
		<div class="header_cont">
			<a href="__ROOT__" class="logo"></a>
			<a href="__ROOT__" class="sublogo"></a>
			<form action="" method="get" id="searchForm">
				<input type="text" id="keyword" name="keyword" value="请输入品牌或商品名称搜索" />
				<input type="submit" class="search_btn" value="" />
			</form>
			<a href="<?php echo U('Cart/index');?>" id="shopcart"><?php echo ($cart_goods_num); ?></a>
		</div>
	</div>
	<!-- 头部 logo 搜索框 区块 结束 -->
    
	<!-- 导航条菜单 开始 -->
	<div class="home_nav_wrap">
		<div class="home_nav">
			<div class="home_nav_left"><a href="__ROOT__">首页</a></div>
			<ul class="nav_items">
				<li><a href="<?php echo U('/c/4_0');?>">上衣</a></li>
				<li><a href="<?php echo U('/c/5_0');?>">裤子</a></li>
				<li><a href="<?php echo U('/c/6_0');?>">裙子</a></li>
				<li><a href="<?php echo U('/c/2_0');?>">特殊服饰</a></li>
				<li><a href="<?php echo U('/c/3_0');?>">配件</a></li>
			</ul>
		</div>
	</div>
	<!-- 导航条菜单 结束 -->
	<!-- 头部区域 结束 -->

	<!-- 主体区域 开始 -->
	<div class="main">
		<!-- 中间登录区域 开始 -->
		<div id='login_form'>
			<p class='have'>尚未注册？<a href="<?php echo U('Register/index');?>">立即注册</a></p>
			<div id='login'>
				<h1>用户登录</h1>
				<form action="javascript:alert('本演示项目已关闭登录功能！')" method='post' name='login'>
					<ul class='login_form'>
						<li><span class='user'>账户名 :</span><input type="text" name='loginname' class='username' placeholder="用户名/邮箱"/><span class='loginname'></span></li>
						<li><span class='pw'>密码 :</span><input type="password" name='loginpwd' class='pwd'/><span class='loginpwd'></span></li>
						<li>
							<input type="submit" name="sub" value='' class='log'/>
							<input type="checkbox" class='box'/><span class='save'>保存登录信息</span>
						</li>
					</ul>
				</form>
			</div>
			<div id="pic_box">
			   	<div id="small">
			   		<a href="__ROOT__"><img src="__PUBLIC__/Images/log1.jpg" list="__PUBLIC__/Images/log1_1.jpg" alt="" /></a>
			   		<a href="__ROOT__"><img src="__PUBLIC__/Images/log2.jpg" list="__PUBLIC__/Images/log2_2.jpg" alt="" /></a>
			   		<a href="__ROOT__"><img src="__PUBLIC__/Images/log3.jpg" list="__PUBLIC__/Images/log3_3.jpg" alt="" /></a>
			   		<a href="__ROOT__"><img src="__PUBLIC__/Images/log4.jpg" list="__PUBLIC__/Images/log4_4.jpg" alt="" /></a>
			   	</div>
			   	<div id="big"><a href="#"><img src="" alt="" /></a></div>
			</div>
		</div>
		<!-- 中间登录区域 结束 -->
	</div>
	<!-- 主体区域 结束 -->

	<!-- 页脚 部分 开始 -->
		<!-- 页脚 开始 -->
	<!-- 承诺 图标 开始 -->
	<div class="promise">
		<p class="promise_left"><a href="#"></a></p>
		<p class="promise_middle"><a href="#"></a></p>
		<p class="promise_right"><a href="#"></a></p>
	</div>
	<!-- 承诺 图标 结束 -->
	<!-- 新手指南、购物保障、支付方式、服务中心 区块 开始 -->
	<div class="service">
		<div class="newer_guide">
			<dl>
				<dt>新手指南</dt>
				<dd>
					<p><a href="#">新人购物指南</a></p>
					<p><a href="#">消费者维权中心</a></p>
				</dd>
			</dl>
		</div>
		<div class="shop_secure">
			<dl>
				<dt>购物保障</dt>
				<dd>
					<p><a href="#">全场正品</a></p>
					<p><a href="#">先行赔付</a></p>
					<p><a href="#">快速发货</a></p>
					<p><a href="#">7天免邮包退</a></p>
				</dd>
			</dl>
		</div>
		<div class="pay_method">
			<dl>
				<dt>支付方式</dt>
				<dd>
					<p><a href="#">支付宝余额支付</a></p>
				</dd>
			</dl>
		</div>
		<div class="service_center">
			<dl>
				<dt>服务中心</dt>
				<dd>
					<p><a href="#">网购规则</a></p>
					<p><a href="#">客服</a></p>
				</dd>
			</dl>
		</div>
	</div>
	<!-- 新手指南、购物保障、支付方式、服务中心 区块 结束 -->
	<!-- 页脚公司信息 区块 开始 -->
	<div class="footer">
		<div class="footer_con">
			<p class="introduce">
				<a href="#">CC女装城简介</a> |
				<a href="#">客服中心</a> |
				<a href="#">支付宝支付</a> |
				<a href="#">网站地图</a> |
				<a href="#">友链申请</a> |
				<a href="#">用户协议</a> |
				<a href="#">版权说明</a> 
			</p>
			<p class="copy">Copyright &copy; 2013 - 2014 CCSHOP. All Rights Reserved CC女装城 版权所有</p>
			<p class="trust"><a href="#"><img src="__PUBLIC__/Images/trust.png" alt="" /></a></p>
		</div>
	</div>
	<!-- 页脚公司信息 区块 结束 -->
	<!-- 页脚 结束 -->

	<!-- 回顶部 按钮 开始 -->
	<div class="back"></div>
	<!-- 回顶部 按钮 结束 -->
	<!-- 页脚 部分 结束 -->
</body>
</html>