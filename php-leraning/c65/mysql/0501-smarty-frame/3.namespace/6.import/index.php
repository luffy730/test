<?php namespace A;
include './IndexController.class.php';
//给命名空间导入
//把\Hdphp\Controller\命名空间下面的IndexController导入，以便以后直接就可以使用了
use \Hdphp\Controller\IndexController;
$c = new IndexController;
$c->index();


 ?>