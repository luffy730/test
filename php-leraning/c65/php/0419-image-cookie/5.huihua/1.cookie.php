<?php 
//name 是cookie的名称
//value 是cookie的值
//expire 是cookie的过期时间，如果是0的话关掉浏览器就失效了
//setcookie('a','www.baidu.com',time() + 3600,'/');


//cookie不能直接存对象和数组
$data = array('a','b','c');
//把数组或者是对象可以变成字符串(序列化)
$data = serialize($data);;
setcookie('hd',$data,0,'/');









 ?>