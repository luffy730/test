<?php
//载入函数
include "../../function.php";
//载入控制器
include "./IndexController.class.php";
$obj = new IndexController;
//执行方法
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
$obj->$action();

 ?>