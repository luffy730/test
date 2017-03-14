<?php namespace A;
include './IndexController.class.php';
//给命名空间起一个别名
use \Hdphp\Controller as c;
$c = new c\IndexController;
$c->index();


 ?>