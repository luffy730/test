<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>列表页</title>
		<link rel="stylesheet" href="<?php echo __PUBLIC__?>/Home/css/list.css" />
	</head>
	<body>
		<div id="box-menu">
			<div class="menu">
				<ul>
					<li><a href="index.php">首页</a>
					</li>
					<?php foreach ($topCate as $v){?>
						<li>
							<a href="<?php echo U('List/index',array('cid'=>$v['cid']))?>" <?php if($_GET['cid']==$v['cid']){?>
                class="hover"
               <?php }?>><?php echo $v['cname']?></a>
						</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<div id="attr-box">
			<div class="attr">
				<ul>
          		<?php foreach ($attr as $k=>$v){?>
					<li class="attr-border">
						<h2><?php echo $v['name']?>：</h2>
						<ul class="attr-content">
							<li>
								<?php
									$temp = $param;
									$temp[$k] = 0;	
								?>
								<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))?>" <?php if($param[$k] == 0): ?>class="hover"<?php endif ?> >不限</a>
							</li>
              				<?php foreach ($v['value'] as $value){?>
              					<?php
              						$temp[$k] =  $value['gtid'];	
              					?>
	  							<li>
	  								<a href="<?php echo U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))?>" <?php if($param[$k] == $value['gtid']): ?>class="hover"<?php endif ?> ><?php echo $value['gtvalue']?></a>
	  							</li>
              				<?php }?>
						</ul>
					</li>
          		<?php }?>	
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
