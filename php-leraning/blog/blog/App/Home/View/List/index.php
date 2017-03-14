<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>hdphp教学博客-列表页</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
			{{include file="../Common/head"}}
			<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article>
							<div class="_head category_title">
								<h2>
										{{$name}}：
										{{$value}}
								</h2>
								<span>
									共 {{$count}} 篇文章 
								</span>
							</div>
						</article>
						{{foreach from="$data" value="$v"}}
						<article>
							<div class="_head">
								<h1>{{$v['title']}}</h1>
								<span>
								作者：
								{{$v['author']}}
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="">{{date('Y-m-d H:i:s',$v['sendtime'])}}</time>
								•
								分类：
								<a href="">{{$v['cname']}}</a>
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
					<aside class="col-md-4 hidden-sm hidden-xs">
						<div class="_widget">
							<h4>关于自己</h4>
							<div class="_info">
								<p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
								<p>
									<i class="glyphicon glyphicon-volume-down"></i>
									目前就职于
									<a href="http://www.houdunwang.com" target="_blank">北京后盾网</a>
								</p>
							</div>
						</div>
						<div class="_widget">
							<h4>分类列表</h4>
							<div>
								<a href="">娱乐 (2)</a>
							</div>
						</div>
						<div class="_widget">
							<h4>标签云</h4>
							<div class="_tag">
								<a href="">PHP</a>
								<a href="">PHP</a>
								<a href="">PHP</a>
							</div>
						</div>
						
					</aside>
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
						<a href="">网站名称</a>
						 | 
						<a href="">版权信息</a>
						 |
						<a href="">admin@163.com</a>
					</div>
				</div>
			</div>
		</div>
		<!--返回顶部自己写的插件-->
		<script src="./js/backTop.js" type="text/javascript" charset="utf-8"></script>
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