<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>列表页</title>
		<link rel="stylesheet" href="{{__PUBLIC__}}/Home/css/list.css" />
	</head>
	<body>
		<div id="box-menu">
			<div class="menu">
				<ul>
					<li><a href="index.php">首页</a>
					</li>
					{{foreach from="$topCate" value="$v"}}
						<li>
							<a href="{{U('List/index',array('cid'=>$v['cid']))}}" {{if value="$_GET['cid'] eq $v['cid']"}}class="hover"{{endif}}>{{$v['cname']}}</a>
						</li>
					{{endforeach}}
				</ul>
			</div>
		</div>
		<div id="attr-box">
			<div class="attr">
				<ul>
          		{{foreach from="$attr" key="$k" value="$v"}}
					<li class="attr-border">
						<h2>{{$v['name']}}：</h2>
						<ul class="attr-content">
							<li>
								<?php
									$temp = $param;
									$temp[$k] = 0;	
								?>
								<a href="{{U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] == 0): ?>class="hover"<?php endif ?> >不限</a>
							</li>
              				{{foreach from="$v['value']" value="$value"}}
              					<?php
              						$temp[$k] =  $value['gtid'];	
              					?>
	  							<li>
	  								<a href="{{U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] == $value['gtid']): ?>class="hover"<?php endif ?> >{{$value['gtvalue']}}</a>
	  							</li>
              				{{endforeach}}
						</ul>
					</li>
          		{{endforeach}}	
				</ul>
			</div>
		</div>
		<div id="content">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

	</body>

</html>
