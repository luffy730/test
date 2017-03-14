<?php 
include "./Model.class.php";
$model = new Model;
//接收get参数并且强制转整
$id = intval($_GET['id']);
$sql = "DELETE FROM student WHERE sid={$id}";
$model->e($sql);

//清除缓存


//跳转到index.php
header('Location:index.php');

 ?>