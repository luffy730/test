<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/footer.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/show.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/function.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/show.js"></script>
	<script type="text/javascript">
		var url = "<?php echo U('Show/getGoodsList');?>";
		var add_cart_url = "<?php echo U('Show/addCart');?>";
		var more_url = "<?php echo U('Show/more');?>";
		var price = <?php echo ($goods['shopprice']); ?>;
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

	<!-- 主体区域 开始 -->
	<div class="main">
		<!-- 当前商品所属类目路径 开始 -->
		<ul id='location'>
			<li><a href="__ROOT__">首页</a>&gt;&gt;</li>
			<?php if(is_array($path)): foreach($path as $k=>$v): ?><li><a href="<?php echo U('/c/'.$k.'_0');?>"><?php echo ($v); ?></a>&gt;&gt;</li><?php endforeach; endif; ?>
			<li><span><?php echo ($goods['gname']); ?><span></li>
		</ul>
		<!-- 当前商品所属类目路径 结束 -->
		<!-- 商品图片展示、放大镜、商品信息 开始 -->
		<div id='goods-wrap'>
			<div class='mini-wrap'>
				<span id='up'></span>
				<div id='mini'>
					<ul>
						
						<li class='mini-cur'>
							<img src="__UPLOADS__/Photo/<?php echo ($small[0]); ?>" width='100' height='100' alt="" medium='__UPLOADS__/Photo/<?php echo ($medium[0]); ?>' max='__UPLOADS__/Photo/<?php echo ($big[0]); ?>'/>
						</li>
						
						<?php if(is_array($small)): $k = 0; $__LIST__ = array_slice($small,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li>
							<img src="__UPLOADS__/Photo/<?php echo ($v); ?>" width='100' height='100' alt="" medium='__UPLOADS__/Photo/<?php echo ($medium[$k]); ?>' max='__UPLOADS__/Photo/<?php echo ($big[$k]); ?>'/>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>
				<span id='down'></span>
			</div>
			<div class='zoom'>
				<div id='medium'>
					<img src="__UPLOADS__/Photo/<?php echo ($medium[0]); ?>" width='400' height='400' alt="" />
					<div id='block'></div>
					<div id='move'></div>
				</div>
				<div id='max'>
					<img src='__UPLOADS__/Photo/<?php echo ($big[0]); ?>' width='800' height='800'/>
				</div>
			</div>

			<div id='goods-info'>
				 <ul>
				 	<li class='name'><?php echo ($goods['gname']); ?></li>
				 	<li class='brand'>
				 		<span class='title'>品牌&nbsp;:</span>
				 		<a href="#"><img src="__UPLOADS__/Logo/<?php echo ($goods['logo']); ?>" width='70' height='30' alt="" /></a>
				 	</li>
				 	<li class='number'>
				 		<span class='title'>商品货号&nbsp;:</span><b>NO.000001</b>
				 	</li>
				 	<li class='market'>
				 		<span class='title'>市场价&nbsp;:</span><del>&yen;<?php echo ($goods['marketprice']); ?></del>
				 	</li>
				 	<li class='shop'>
				 		<span class='title'>商城价&nbsp;:</span><span class='price'>&yen;<?php echo ($goods['shopprice']); ?></span></li>
					<li class='attr'>
						<div>
							<dl class="color">
								<dt>颜色&nbsp;:</dt>
								<dd>
									<span class='cur' gtid="<?php echo ($goods['spec'][0]['option'][0]['gtid']); ?>"><?php echo ($goods['spec'][0]['option'][0]['gtvalue']); ?></span>
									<?php if(is_array($goods['spec'][0]['option'])): $k = 0; $__LIST__ = array_slice($goods['spec'][0]['option'],1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><span gtid="<?php echo ($v["gtid"]); ?>"><?php echo ($v["gtvalue"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
								</dd>
							</dl>
							<dl class="size">
								<dt>尺码&nbsp;:</dt>
								<dd>
									<span class='cur' gtid="<?php echo ($goods['spec'][1]['option'][0]['gtid']); ?>"><?php echo ($goods['spec'][1]['option'][0]['gtvalue']); ?></span>
									<?php if(is_array($goods['spec'][1]['option'])): $k = 0; $__LIST__ = array_slice($goods['spec'][1]['option'],1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><span gtid="<?php echo ($v["gtid"]); ?>"><?php echo ($v["gtvalue"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
								</dd>
							</dl>
							<dl class='hao-num'>
								<dt>购买数量&nbsp;:</dt>
								<dd>
									<input type="text" name='quantity' id="quantity" value='1'/>
									库存(<span id='inventory'><?php echo ($goods['inventory']); ?></span>)件
								</dd>
							</dl>
							<dl>
								<dt>提示&nbsp;:</dt>
								<dd>
									请选择&nbsp;"颜色"&nbsp;"尺码"，以便查看确切价格和库存
								</dd>
							</dl>
						</div>
					</li>
					<li class='buy-btn'>
						<a href="<?php echo U('Cart/index');?>" id='buy'></a>
						<a id='cart'></a>
					</li>
				 </ul>
			</div>
		</div>
		<!-- 商品图片展示、放大镜、商品信息 结束 -->
		<!-- 同品牌商品推荐 图片角进轮播器 开始 -->
		<div class="same_brand">
			<h3>同品牌商品推荐</h3>
			<div id="box">
			   	<div id="small">
			   		<a href="#"><img src="__PUBLIC__/Images/small1.jpg" list="__PUBLIC__/Images/list1.jpg" alt="" /></a>
			   		<a href="#"><img src="__PUBLIC__/Images/small2.jpg" list="__PUBLIC__/Images/list2.jpg" alt="" /></a>
			   		<a href="#"><img src="__PUBLIC__/Images/small3.jpg" list="__PUBLIC__/Images/list3.jpg" alt="" /></a>
			   		<a href="#"><img src="__PUBLIC__/Images/small4.jpg" list="__PUBLIC__/Images/list4.jpg" alt="" /></a>
			   	</div>
			   	<div id="big"><a href="#"><img src="" alt="" /></a></div>
			</div>
		</div>
		<!-- 同品牌商品推荐 图片角进轮播器 结束 -->

		<!-- 同类型商品推荐 区块 开始 -->
		<div class="recommend">
			<h2>同类型商品推荐</h2>
			<ul>
				<?php if(is_array($data1)): foreach($data1 as $key=>$v): ?><li>
					<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><img src="__UPLOADS__/Pic/<?php echo ($v["pic"]); ?>" alt="" /></a>
					<strong>&yen;<?php echo ($v["shopprice"]); ?></strong>
					<p><a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><?php echo ($v["gname"]); ?></a></p>
					<span>最近成交<?php echo ($v["click"]); ?>件</span>
				</li><?php endforeach; endif; ?>
				<!-- <li>
					<a href="#"><img src="__PUBLIC__/images/recommend1.jpg" alt="" /></a>
					<strong>&yen;118</strong>
					<p><a href="#">2013夏装新款韩版女装修身时尚雪纺裙连衣裙</a></p>
					<span>最近成交616件</span>
				</li>
				<li>
					<a href="#"><img src="__PUBLIC__/images/recommend1.jpg" alt="" /></a>
					<strong>&yen;118</strong>
					<p><a href="#">2013夏装新款韩版女装修身时尚雪纺裙连衣裙</a></p>
					<span>最近成交616件</span>
				</li>
				<li>
					<a href="#"><img src="__PUBLIC__/images/recommend1.jpg" alt="" /></a>
					<strong>&yen;118</strong>
					<p><a href="#">2013夏装新款韩版女装修身时尚雪纺裙连衣裙</a></p>
					<span>最近成交616件</span>
				</li> -->
			</ul>
		</div>
		<!-- 同类型商品推荐 区块 结束 -->

		<!-- 商品详情 等内容 区块 开始 -->
		<div class="con">
			<!-- 导航条 开始 -->
			<ul class="nav">
				<li><a href="#para">商品参数</a></li>
				<li><a href="#detail">商品详情</a></li>
				<li><a href="#service">售后服务</a></li>
				<li><a href="#remark">评价详情</a></li>
				<li><a href="#msg">留言板 / 发表评论</a></li>
				<a href="#" id="qq"><img src="__PUBLIC__/images/qq.jpg" alt="" /></a>
			</ul>
			<!-- 导航条 结束 -->
			<!-- 属性参数 开始 -->
			<div id="para">
				<h3>商品详细参数</h3>
				<ul>
					<?php if(is_array($goods['attr'])): foreach($goods['attr'] as $key=>$v): ?><li><span><?php echo ($v["name"]); ?>：</span><?php echo ($v["value"]); ?></li><?php endforeach; endif; ?>
				</ul>
				<p>属性信息仅供参考，详细情况请qq咨询！</p>
			</div>
			<!-- 属性参数 结束 -->
			<!-- 商品详情 开始 -->
			<div id="detail">
				<h3>商品详情</h3>
				<div><?php echo ($goods['intro']); ?></div>
			</div>
			<!-- 商品详情 结束 -->
			<!-- 售后服务 开始 -->
			<div id="service">
				<h3>售后服务</h3>
				<div><?php echo ($goods["service"]); ?></div>
			</div>
			<!-- 售后服务 结束 -->
			<!-- 评价详情 开始 -->
			<div id="remark">
				<h3>评价详情</h3>
				<p><span>评价</span><b>评价人</b><i>发表时间</i></p>
				<ul>
					<?php if(is_array($remark)): foreach($remark as $key=>$v): ?><li><span><?php echo ($v["content"]); ?></span><b>买家：<?php echo ($v["uname"]); ?></b><i><?php echo (date("Y-m-d H:s", $v["time"])); ?></i></li><?php endforeach; endif; ?>
				</ul>
				<div class="page"><?php echo ($page); ?></div>
			</div>
			<!-- 评价详情 结束 -->
			<!-- 留言板 开始 -->
			<div id="msg">
				<h3>留言板</h3>
				<p>咨询或评论：您还可以输入 <span>120</span> 个字</p>
				<form action="<?php echo U('remark');?>" method="post">
					<textarea name="content" id="content"></textarea>
					<input type="hidden" name="gid" value="<?php echo ($gid); ?>" />
					<div id="verify_box">
						<span>请输入验证码：</span>
						<input type="text" name="verify" id="verify" />
						<img src="<?php echo U('verify');?>" alt="" id="code" />
					</div>
					<div>
						<input type="submit" value="提交" id="sub" />
						<input type="reset" value="清空" id="reset" />
					</div>
				</form>
			</div>
			<!-- 留言板 结束 -->
		</div>
		<!-- 商品详情 等内容 区块 结束 -->


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


	<!-- 添加到购物车成功 的提示框 开始 -->
	<div class="success" id="ok">
		<h4>提示</h4><i></i>
		<b></b><p>已成功添加到购物车,购物车里已有 <span>1</span> 种商品</p>
		<input type="button" value="再逛逛" class="quit" />
		<a href="<?php echo U('Cart/index');?>"><input type="button" value="去购物车结算" /></a>
	</div>
	<!-- 添加到购物车成功 的提示框 结束 -->

	<!-- 购物车中已经有相同商品 的提示框 开始 -->
	<div class="success" id="already">
		<h4>提示</h4><i></i>
		<b></b><p>购物车中已经有相同商品。您希望：</p>
		<input type="button" value="不要添加" class="quit" />
		<input type="button" value="多买一件" id="more" />
		<a href="<?php echo U('Cart/index');?>"><input type="button" value="去购物车结算" /></a>
	</div>
	<!-- 购物车中已经有相同商品 的提示框 结束 -->

</body>
</html>