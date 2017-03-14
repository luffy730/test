<?php 
//删除数据库**************
include "./Model.class.php";
$id = intval($_GET['id']);
$sql = "DELETE FROM student WHERE sid={$id}";
$model = new Model;
$model->e($sql);
//清除缓存*****************
//载入Smarty类库
include "./smarty/Smarty.class.php"; 
 //实例化Smarty对象
$smarty = new Smarty();
//缓存目录
$smarty->cache_dir = "temp/cache";
//清除缓存
$smarty->clear_cache();

header('Location:index.php');


 ?>