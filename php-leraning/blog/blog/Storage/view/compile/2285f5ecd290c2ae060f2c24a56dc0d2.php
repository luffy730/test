<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>hdphp教学博客-内容页</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
			<!--载入公共模板-->
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/org/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
		<script src="./Public/Home/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/Home/org/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/backTop.css"/>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>欢迎来到后盾BLOG教学系统</h1>
					</div>
				</div>
			</div>
		</header>
		<nav role="navigation" class="navbar navbar-default">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" >
					
						<div class="navbar-header">
							
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
							
								<span class="sr-only">切换导航</span>
								
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
												<div class="collapse navbar-collapse" id="example-navbar-collapse">
							<ul class="_menu" >
								<li ><a href="index.html">首页</a></li>
																	<li  ><a href="l_20.html">新闻</a></li>
																	<li  ><a href="l_27.html">军事</a></li>
																	<li  ><a href="l_23.html">娱乐</a></li>
															</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	
		<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article>
							<div class="_head">
								<h1><?php echo $data['title']?></h1>
								<span>
								作者：
								<a href=""><?php echo $data['author']?></a>
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="<?php echo date('Y-m-d H:i:s',$data['sendtime'])?>"><?php echo date('Y-m-d H:i:s',$data['sendtime'])?></time>
							</div>
							<div class="_digest">
								<?php echo $data['content']?>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								<?php foreach ($data['tag'] as $v){?>
									<a href="<?php echo U('List/index',array('tid'=>$v['tid']))?>"><?php echo $v['tname']?></a>、
								<?php }?>
							</div>

						</article>
						<!-- 多说评论框 start -->
						<div class="ds-thread" data-thread-key="<?php echo $data['aid']?>" data-title="<?php echo $data['title']?>" data-url="<?php echo U('Content/index',array('aid'=>$data['aid']))?>"></div>
						<!-- 多说评论框 end -->
						<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
						<script type="text/javascript">
						var duoshuoQuery = {short_name:"blogmzy"};
							(function() {
								var ds = document.createElement('script');
								ds.type = 'text/javascript';ds.async = true;
								ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
								ds.charset = 'UTF-8';
								(document.getElementsByTagName('head')[0] 
								 || document.getElementsByTagName('body')[0]).appendChild(ds);
							})();
							</script>
						<!-- 多说公共JS代码 end -->
					</main>
					<aside class="col-md-4 hidden-sm hidden-xs">
						<div class="_widget">
							<h4>关于自己</h4>
							<div class="_info">
								<p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
								<p>
									<i class="glyphicon glyphicon-volume-down"></i>
									目前就职于
									<a href="">北京后盾网</a>
								</p>
							</div>
						</div>
						
						<div class="_widget">
							<h4>关于自己</h4>
							<div class="_info">
								<p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
								<p>
									<i class="glyphicon glyphicon-volume-down"></i>
									目前就职于
									<a href="">北京后盾网</a>
								</p>
							</div>
						</div>
						
					</aside>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<h4 class="_title">最新文章</h4>
						<div id="" class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
					</div>
					<div class="col-sm-4">
						<h4 class="_title">标签云</h4>
						<div id="" class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
					</div>
					<div class="col-sm-4">
						<h4 class="_title">友情链接</h4>
						<div id="" class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
						<div class="_single">
							<p><a href="">解决垃圾图片处理方式</a></p>
							<time>2015-09-09</time>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="footer_bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<a href="">Copyright © BLOG_EDU博客 中文网</a>
						 | 
						<a href="">京ICP备xxxxxxxxxx号 </a>
						 |
						<a href="">京公网安备xxxxxxxxxxxxxx</a>
					</div>
				</div>
			</div>
		</div>
		<!--返回顶部自己写的插件-->
		<script src="js/backTop.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				//插件使用
				$('.back_top').backTop({right:30});
			})
		</script>
		<div class="back_top hidden-xs hidden-md">
			<i class="glyphicon glyphicon-menu-up"></i>
		</div>
	</body>
</html>