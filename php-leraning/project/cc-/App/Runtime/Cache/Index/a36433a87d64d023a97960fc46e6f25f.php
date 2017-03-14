<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/footer.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/cart.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/cart.js"></script>
	<script type="text/javascript">
		var del_some_url = "<?php echo U('Cart/delSome');?>";
		var cart_index_url = "<?php echo U('Cart/index');?>";
		var add_order_url = "<?php echo U('Cart/addOrder');?>";
		var success_order_url = "<?php echo U('Cart/successOrder');?>";
	</script>
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

	<!-- 主体 区域 开始 -->
	<div class="main">
		<h1 id="mycart">我的购物车</h1>
		<!-- 购物车 进度条 开始 -->
		<div id='shop_menu'>
			<ul>
				<li <?php if(ACTION_NAME == 'index'): ?>class='shop_car'<?php endif; ?>>购物车<b>></b></li>
				<li <?php if(ACTION_NAME == 'confirmOrder'): ?>class='shop_car'<?php endif; ?>>确认订单信息<b>></b></li>
				<li <?php if(ACTION_NAME == 'successOrder'): ?>class='shop_car'<?php endif; ?>>提交订单成功<b>></b></li>
				<li <?php if(ACTION_NAME == 'buyOk'): ?>class='shop_car'<?php endif; ?>>确认收货</li>
			</ul>
		</div>
		<!-- 购物车 进度条 结束 -->
	<?php if(ACTION_NAME == 'index'): ?>
		<!-- 购物车没商品 开始 -->
		<?php if(!isset($_SESSION['cart'])): ?>
		<div id='cart_bg'>
			<p>购物车内暂时没有商品，您可以
				<a href="__ROOT__">去首页</a>
				挑选喜欢的商品</p>
		</div>
		<!-- 购物车没有商品结束 -->
		<?php else: ?>
		<!-- 购物车有商品 开始 -->
		<div class='count_goods'>
			<form action="" id='list'>
				<ul>
					<li class='select'>
						<label id='entire'><input type="checkbox" class='box'/>全选</label>
					</li>
					<li class='goods_name'>商品名称</li>
					<li class='number'>售价</li>
					<li class='number'>数量</li>
					<li class='number'>小计</li>
					<li class='number'>操作</li>			
				</ul>
				<?php if(is_array($info)): foreach($info as $key=>$v): ?><ul class='goods_list'>
					<li class='select'>
						<label><input type="checkbox" class='box' sessionKey=<?php echo ($v["session_key"]); ?> /></label>
					</li>
					<li class='goods_name'>
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>" title=''><img src="__UPLOADS__/Photo/<?php echo ($v["pic"]); ?>" alt="" /></a>
					</li>
					<li class='detail'>
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><?php echo ($v["gname"]); ?></a>
						<p>颜色: <span><?php echo ($v["color"]); ?></span>&nbsp;&nbsp;&nbsp;尺码: <span><?php echo ($v["size"]); ?></span></p>
					</li>
					<li class='number'>¥<?php echo ($v["price"]); ?>.00</li>
					<li class='number'><?php echo ($v["quantity"]); ?></li>
					<li class='number'>¥<?php echo ($v["sum"]); ?>.00</li>
					<li class='number'><a href="<?php echo U('Cart/delOne', array('session_key' => $v['session_key']));?>" class='delete'>删除</a></li>	
				</ul><?php endforeach; endif; ?>
				<ul class='del'>
					<li> 
						<span id="del_some">删除选中的商品</span>
						<p>购物金额总计:<span style='color:#BF0000;font-size:20px;font-weight: bold;'>¥<?php echo ($totalPrice); ?>.00</span></p>
					</li>
				</ul>
				<ul class='jxgw'>
					<li>
						<a href="__ROOT__" class='jx'><img src="__PUBLIC__/Images/jxgw.png" alt="" /></a>
						<a href="<?php echo U('Cart/confirmOrder');?>" class='js'><img src="__PUBLIC__/Images/jszx.png" alt="" /></a>
					</li>
				</ul>
			</form>
		</div>
		<!-- 购物车有商品结束 -->
		<?php endif; ?>
	<?php endif; ?>

	<?php if(ACTION_NAME == 'confirmOrder'): ?>
		<!-- 确认订单信息页 开始 -->
		<div class='count_goods'>
			<form action="">
				<ul>
					<li class='write'>
						请填写并核对订单信息
					</li>
				</ul>
				
				<ul class='form_info'>
					<div>
						<p class='info_name'><b>*</b>&nbsp;收货人:</p>
						<input type="text" name='consignee' class='info_text'/>
						<span id="consignee_warn">收货人不能为空</span>

						<p class='info_date'><b>*</b>&nbsp;收货地址:</p>
						<input type="text" name='address' class='info_address'/>
						<span id="address_warn">收货地址不能为空</span>

						<p class='info_phone'><b>*</b>&nbsp;联系电话:</p>
						<input type="text" name='mobile' class='info_numb'/>
						<span id="phone_warn">联系电话不能为空</span>

						<a href="" class='determine'>确定收货地址</a>
					</div>
				</ul>
				<ul>
					<li class='number' id="pic_text">商品图片</li>
					<li class='goods_name'>商品名称</li>
					<li class='number'>颜色尺码</li>
					<li class='number'>单价</li>
					<li class='number'>数量</li>
					<li class='number'>小计</li>			
				</ul>

				<?php if(is_array($info)): foreach($info as $key=>$v): ?><ul class='goods_list'>
					<li class='number' id="pic_img">
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>" title=''><img src="__UPLOADS__/Photo/<?php echo ($v["pic"]); ?>" alt="" /></a>
					</li>
					<li class='goods_name_info'>
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><?php echo ($v["gname"]); ?></a>
					</li>
					<li class='number'><p>颜色:<span><?php echo ($v["color"]); ?></span>&nbsp;尺码:<span><?php echo ($v["size"]); ?></span></p></li>
					<li class='number'>¥<?php echo ($v["price"]); ?>.00</li>
					<li class='number'><?php echo ($v["quantity"]); ?></li>
					<li class='number'>¥<?php echo ($v["sum"]); ?>.00</li>	
				</ul><?php endforeach; endif; ?>

				<ul class='goods_list'>
					<div class='addition'>
						<p class='messg'>附加留言</p><input type="text" name="remark" class='messg_info'/>
						<p class='pay'>支付方式:</p><img src="__PUBLIC__/Images/third.png" alt="" class='third'/>
						<p class='total'>商品总价: ¥<?php echo ($totalPrice); ?>.00</p>
						<p class='amount'>您共需要为订单支付</p><strong class='whole'>¥<?php echo ($totalPrice); ?>.00</strong>
						<input type="button" class='submit_btn' value=''/>
					</div>
				</ul>
			</form>
		</div>
		<!-- 确认订单信息页 结束 -->
	<?php endif; ?>

	<?php if(ACTION_NAME == 'successOrder'): ?>
		<!-- 提交订单成功页 开始 -->
		<div id='success'>
			<h3>恭喜您,订单提交成功,请您尽快付款！</h3>
			<a href="<?php echo U('Cart/alipay');?>" class='lkzf'>立即去支付</a>
		</div>
		<!-- 提交订单成功页 结束 -->
	<?php endif; ?>


	</div>
	<!-- 主体 区域 结束 -->



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