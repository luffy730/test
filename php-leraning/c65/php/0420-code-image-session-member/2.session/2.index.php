<?php 
//读取session的值*************

//读取的时候也要设置sessionName
session_name('A');
//使用session必须先开启session
session_start();
//删除指定的变量
//unset($_SESSION['a']);

//获取session的值
echo $_SESSION['a'];


 ?>