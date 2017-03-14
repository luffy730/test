<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/footer.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/list.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/list.js"></script>
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
		<!-- 主体 左侧 开始 -->
		<div class="left">
			<!-- 全部搜索结果分类 部分 开始 -->
			<h2>全部搜索结果分类</h2>
			<h4><i></i><em><?php echo ($cname); ?></em><span>(<?php echo ($count); ?>)</span></h4>
			<div class="all">
				<dl>
					<dt><a href="<?php echo U('/c/4_0');?>"><i></i><em>上衣</em><!-- <span>(156528)</span> --></a></dt>
					<dd>
						<ul>
							<?php if(is_array($clos)): foreach($clos as $key=>$v): ?><li><a href="<?php echo U('/c/'.$v['cid'].'_0');?>"><i></i><em><?php echo ($v["cname"]); ?></em><span></span></a></li><?php endforeach; endif; ?>
						</ul>
					</dd>
				</dl>
				<dl>
					<dt><a href="<?php echo U('/c/5_0');?>"><i></i><em>裤子</em><!-- <span>(11236)</span> --></a></dt>
					<dd>
						<ul>
							<!-- <li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li>
							<li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li>
							<li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li>
							<li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li>
							<li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li>
							<li><a href="#"><i></i><em>女士牛仔裤</em><span>(5986)</span></a></li> -->
						</ul>
					</dd>
				</dl>
				<dl>
					<dt><a href="<?php echo U('/c/6_0');?>"><i></i><em>裙子</em><!-- <span>(156528)</span> --></a></dt>
					<dd>
						<ul>
							<!-- <li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li>
							<li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li>
							<li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li>
							<li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li>
							<li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li>
							<li><a href="#"><i></i><em>半身裙</em><span>(3668)</span></a></li> -->
						</ul>
					</dd>
				</dl>
				<dl>
					<dt><a href="<?php echo U('/c/2_0');?>"><i></i><em>特殊服饰</em><!-- <span>(56528)</span> --></a></dt>
					<dd>
						<ul>
							<li><a href="<?php echo U('/c/7_0');?>"><i></i><em>套装</em><!-- <span>(168)</span> --></a></li>
							<li><a href="<?php echo U('/c/8_0');?>"><i></i><em>婚纱/礼服</em><!-- <span>(686)</span> --></a></li>
							<li><a href="<?php echo U('/c/9_0');?>"><i></i><em>旗袍</em><!-- <span>(572)</span> --></a></li>
							<!-- <li><a href="#"><i></i><em>婚纱/旗袍/礼服</em><span>(2668)</span></a></li>
							<li><a href="#"><i></i><em>婚纱/旗袍/礼服</em><span>(2668)</span></a></li>
							<li><a href="#"><i></i><em>婚纱/旗袍/礼服</em><span>(2668)</span></a></li> -->
						</ul>
					</dd>
				</dl>
				<dl>
					<dt><a href="<?php echo U('/c/3_0');?>"><i></i><em>配件</em><!-- <span>(6528)</span> --></a></dt>
					<dd>
						<ul>
							<li><a href="<?php echo U('/c/10_0');?>"><i></i><em>帽子</em><!-- <span>(68)</span> --></a></li>
							<li><a href="<?php echo U('/c/11_0');?>"><i></i><em>围巾/丝巾/披肩</em><!-- <span>(163)</span> --></a></li>
							<li><a href="<?php echo U('/c/12_0');?>"><i></i><em>眼镜框架</em><!-- <span>(92)</span> --></a></li>
							<!-- <li><a href="#"><i></i><em>遮阳丝巾</em><span>(668)</span></a></li>
							<li><a href="#"><i></i><em>遮阳丝巾</em><span>(668)</span></a></li>
							<li><a href="#"><i></i><em>遮阳丝巾</em><span>(668)</span></a></li> -->
						</ul>
					</dd>
				</dl>
			</div>
			<!-- 全部搜索结果分类 部分 结束 -->
			<!-- 卖家推荐 区块 开始 -->
			<div class="recommend">
				<h2>卖家推荐</h2>
				<ul>
					<?php if(is_array($data1)): foreach($data1 as $key=>$v): ?><li>
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><img src="__UPLOADS__/Pic/<?php echo ($v["pic"]); ?>" alt="" /></a>
						<strong>&yen;<?php echo ($v["shopprice"]); ?>.00</strong>
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
			<!-- 卖家推荐 区块 结束 -->

		</div>
		<!-- 主体 左侧 结束 -->
		<!-- 主体 右侧 开始 -->
		<div class="right">
			<!-- 当前所在位置路径 开始 -->
			<div class="path">
				<p>
					全部
					<span>></span>
					<?php if(is_array($path)): foreach($path as $k=>$v): ?><a href="<?php echo U('/c/'.$k.'_0');?>"> <?php echo ($v); ?></a>
					<span>></span><?php endforeach; endif; ?>
				</p>
				<form action="" method="post">
					<input type="text" value="在当前状态下搜索" name="filter" id="filter" />
					<input type="submit" value="" id="filter_sub" />
				</form>
				<!-- <div>相关产品<strong>23666</strong>件</div> -->
			</div>
			<!-- 当前所在位置路径 结束 -->
			<!-- 属性筛选 区块 开始 -->
			<div class="attr">
				<dl class="dl_first">
					<dt>品牌</dt>
					<dd>
						<ul>
							<li><a href="#" class="cur">不限</a></li>
							<li><a href="#">HSTYLE/韩都衣舍</a></li>
							<li><a href="#">PeaceBird太平鸟</a></li>
							<li><a href="#">100f1/百分之一</a></li>
							<li><a href="#">淑女屋</a></li>
							<li><a href="#">秋水伊人</a></li>
							<li><a href="#">andostore/安都</a></li>
							<li><a href="#">INMAN/茵曼</a></li>
							<li><a href="#">Meiligushi/美丽故事</a></li>
							<li><a href="#">衣香丽影</a></li>
							<li><a href="#">Season Wind/季候风</a></li>
						</ul>
					</dd>
				</dl>

				<?php if(is_array($attr)): foreach($attr as $k=>$v): ?><dl>
					<dt><?php echo ($v["name"]); ?></dt>
					<dd>
						<ul>
							<?php  $tmp = $filter; $tmp[$k] = 0; ?>
							<li><a href="<?php echo U('/c/' . $_GET['cid'] . '_' . implode('_', $tmp));?>" <?php if($filter[$k] == 0): ?>class='cur'<?php endif; ?>>不限</a></li>

							<?php if(is_array($v["option"])): foreach($v["option"] as $key=>$s): $tmp[$k] = $s['id']; ?>
								<li><a href="<?php echo U('/c/' . $_GET['cid'] . '_' . implode('_', $tmp));?>" <?php if($filter[$k] == $s["id"]): ?>class='cur'<?php endif; ?>><?php echo ($s["value"]); ?></a></li><?php endforeach; endif; ?>
							
						</ul>
					</dd>
				</dl><?php endforeach; endif; ?>

			</div>
			<!-- 属性筛选 区块 结束 -->
			<!-- 排序 区块 开始 -->
			<div class="sort">
				<p class="sort_by">排序：
					<a href="#" class="selected" id="default">默认</a>
					<a href="#" id="sales">销量<i></i></a>
					<a href="#" id="price">价格<s id="asc"></s><s id="desc"></s></a>
					<a href="#" id="time">上架时间</a>
				</p>
				<p class="show_by">显示方式：
					<a href="#nolink" class="selected" id="bigpic"><i></i>大图</a>
					<a href="#nolink" id="list"><i></i>列表</a>
				</p>
				<p style="float:right;">总计<strong><?php echo ($count); ?></strong>条记录</p>
			</div>
			<!-- 排序 区块 结束 -->
			<!-- 商品列表 开始 -->
			<div class="goods_list" id="goods">
				<?php if($count == 0): ?><p style="font-size:14px;color:#666;padding-left:100px;padding-top:60px;">对不起，没有符合条件的商品！</p><?php endif; ?>
				<ul>

					<?php if(is_array($goods)): foreach($goods as $key=>$v): ?><li>
						<div class="detail">
							<a href="<?php echo U('/'.$v['gid']);?>" class="list_pic"><img src="__UPLOADS__/Pic/<?php echo ($v["pic"]); ?>" alt="<?php echo ($v["gname"]); ?>" /></a>
							<p class="price"><span>&yen;<?php echo ($v["shopprice"]); ?>.00</span><del>&yen;<?php echo ($v["marketprice"]); ?>.00</del></p>
							<h3><a href="__ROOT__/<?php echo ($v["gid"]); ?>"><?php echo ($v["gname"]); ?></a></h3>
							<p class="offer">销量：102件 | <span class="ship_free">运费：免运费</span></p>
							<a href="__ROOT__/<?php echo ($v["gid"]); ?>" class="buy_btn">
								<b class="buy_btn_left"></b>
								<span>点击查看详情</span>
								<b class="buy_btn_right"></b>
							</a>
						</div>
						<strong></strong>
						<i></i>
					</li><?php endforeach; endif; ?>
					
				</ul>
			</div>
			<!-- 商品列表 结束 -->
			<!-- 分页 开始 -->
			<div class="page"><?php echo ($page); ?></div>
			<!-- 分页 结束 -->
			<!-- 您可能感兴趣的商品 区块 开始 -->
			<div class="interest">
				<h3>您可能感兴趣的商品</h3>
				<ul>
					<?php if(is_array($data2)): foreach($data2 as $key=>$v): ?><li>
						<a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>" class="interest_pic"><img src="__UPLOADS__/Pic/<?php echo ($v["pic"]); ?>" alt="" /></a>
						<span>&yen;<?php echo ($v["shopprice"]); ?>.00</span>
						<p><a href="<?php echo U('Show/index', array('gid' => $v['gid']));?>"><?php echo ($v["gname"]); ?></a></p>
					</li><?php endforeach; endif; ?>
					<!-- <li>
						<a href="#" class="interest_pic"><img src="__PUBLIC__/Images/interest1.jpg" alt="" /></a>
						<span>&yen;165</span>
						<p><a href="#">2013夏装新品 休闲二件套无袖T恤 修身开衫 </a></p>
					</li>
					<li>
						<a href="#" class="interest_pic"><img src="__PUBLIC__/Images/interest1.jpg" alt="" /></a>
						<span>&yen;165</span>
						<p><a href="#">2013夏装新品 休闲二件套无袖T恤 修身开衫 </a></p>
					</li>
					<li>
						<a href="#" class="interest_pic"><img src="__PUBLIC__/Images/interest1.jpg" alt="" /></a>
						<span>&yen;165</span>
						<p><a href="#">2013夏装新品 休闲二件套无袖T恤 修身开衫 </a></p>
					</li>
					<li>
						<a href="#" class="interest_pic"><img src="__PUBLIC__/Images/interest1.jpg" alt="" /></a>
						<span>&yen;165</span>
						<p><a href="#">2013夏装新品 休闲二件套无袖T恤 修身开衫 </a></p>
					</li> -->
				</ul>
			</div>
			<!-- 您可能感兴趣的商品 区块 结束 -->
		</div>
		<!-- 主体 右侧 结束 -->
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