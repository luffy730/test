<?php 
//删除所有的sesion**************

session_name('A');
session_start();
//删除session变量
session_unset();
//删除session的文件
session_destroy();
//删除cookie
setcookie(session_name(),0,1,'/');


 ?>