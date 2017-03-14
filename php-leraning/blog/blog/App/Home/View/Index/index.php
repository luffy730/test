<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>hdphp教学博客-首页</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		{{include file="../Common/head"}}
		<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article class="_carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
							  </ol>
							
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							    <div class="item active">
							      <img src="./Public/Home/images/1.jpg">
							    </div>
							    <div class="item">
							       <img src="./Public/Home/images/2.jpg">
							    </div>
							  </div>
							
							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							  </a>
							</div>
						</article>
						{{foreach from="$arcData" value="$v"}}
						<article>
							<div class="_head">
								<h1>{{$v['title']}}</h1>
								<span>
								作者：
								{{$v['author']}}
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="{{date('Y-m-d',$v['sendtime'])}}">{{date('Y-m-d',$v['sendtime'])}}</time>
								•
								分类：
								<a href="list.html">{{$v['cname']}}</a>
							</div>
							<div class="_digest">
							<img src="{{$v['thumb']}}"  class="img-responsive"/>
								<p>
									{{$v['digest']}}
								</p>
							</div>
							<div class="_more">
								<a href="{{U('Content/index',array('aid'=>$v['aid']))}}" class="btn btn-default">阅读全文</a>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								{{foreach from="$v['tag']" value="$value"}}
									<a href="{{U('List/index',array('tid'=>$value['tid']))}}">{{$value['tname']}}</a>、
								{{endforeach}}
							</div>
						</article>
						{{endforeach}}
					</main>
					{{include file="../Common/right"}}
				</div>
			</div>
		</section>
			<footer class="hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<h4 class="_title">最新文章</h4>
						<div id="" class="_single">
							<p><a href="">标题</a></p>
							<time>2010年11月06日11:24:16</time>
						</div>
							<div id="" class="_single">
							<p><a href="">标题</a></p>
							<time>2010年11月06日11:24:16</time>
						</div>
					</div>
					<div class="col-sm-4 footer_tag">
						<div id="">
							<h4 class="_title">标签云</h4>
							<a href="">PHP</a>
							<a href="">PHP</a>
							<a href="">PHP</a>
						</div>
					</div>
					<div class="col-sm-4">
						<h4 class="_title">友情链接</h4>
						<div id="" class="_single">
							<p><a href="" target="_blank">百度</a></p>
							<p><a href="" target="_blank">百度</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="footer_bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<a href=""><?php echo Config::get('self.webname') ?></a>
						 | 
						<a href=""><?php echo Config::get('self.copy') ?></a>
						 |
						<a href=""><?php echo Config::get('self.adminemail') ?></a>
					</div>
				</div>
			</div>
		</div>
		<!--返回顶部自己写的插件-->
		<script src="./Public/Home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
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