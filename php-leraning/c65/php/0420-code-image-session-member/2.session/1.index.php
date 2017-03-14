<?php 
//设置session的值*************

//设置sessionName
session_name('A');
//更改session保存的路径
//session_save_path('./');
//使用session必须先开启session
session_start();

//给session赋值
$_SESSION['a'] = 'A';

//输出sessionID
//echo session_id();
//输出sessionName
//echo session_name();



//（1）先打开 D:/wamp/tmp 看一下
//（2）执行以上代码
//（3）打开 D:/wamp/tmp 看一下


 ?>