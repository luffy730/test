<?php
include '../function.php';
//作业1：写邮箱与网址的正则
//$email = '410004417@qq.com';
//$email = 'houdunwang-mzy@163.com';
//$email = 'houdunwang_mzy@163.com';
//$email = 'houdunwang888@163.com';
//$email = 'houdunwang@sina.com.cn';

//$preg = "/^[0-9a-z]+[a-z0-9_-][0-9a-z]+@[0-9a-z]{1,6}\.(com|cn|com\.cn)$/i";
//echo preg_match($preg, $email);







//$url = 'http://www.baidu.com';
//$url = 'https://www.baidu.com';
//$url = 'ftp://www.baidu.com';
//$url = 'www.baidu.com';
//$url = 'baidu.com';
//$url = 'bbs.baidu.com';
//$url = 'www.12306.com';
//$url = 'www.sina.com.cn';
//$url = 'www.baidu.net';
//$preg = '/^((http|https|ftp):\/\/)?([0-9a-z]{1,7}\.)?[0-9a-z_-]+\.(com|cn|net|com\.cn)$/i';
//echo preg_match($preg, $url);










//作业2：将html文档中的所有a链接替换为http://www.houdunwang.com

$str = <<<str
<ul class="site-nav site-navbar">
<li class="navto-home active"><a href="http://www.daqianduan.com">首页</a></li><li class="navto-wp"><a href="http://themebetter.com">Wordpress主题</a></li><li class="navto-front"><a href="http://www.daqianduan.com/front">前端开发 <i class="fa fa-angle-down"></i></a><ul class="sub-menu"><li class="navto-htmlcss"><a href="http://www.daqianduan.com/front/htmlcss">HTML/CSS</a></li><li class="navto-javascript"><a href="http://www.daqianduan.com/front/javascript">Javascript</a></li><li class="navto-news"><a href="http://www.daqianduan.com/front/news">前端资讯</a></li><li class="navto-resource"><a href="http://www.daqianduan.com/front/resource">技巧资源</a></li></ul></li><li class="navto-see"><a href="http://www.daqianduan.com/see">观点</a></li><li class="navto-job"><a href='http://www.daqianduan.com/job'>前端开发招聘</a></li><li class="navto-nav"><a href="http://www.daqianduan.com/nav">前端导航</a></li>				<li class="navto-search"><a href="javascript:;" class="search-show active"><i class="fa fa-search"></i></a></li>

str;

$preg = "/href=['\"].*?['\"]/is";
echo preg_replace($preg, 'href="http://www.houdunwang.com"', $str);




//作业3：递归删除函数






?>