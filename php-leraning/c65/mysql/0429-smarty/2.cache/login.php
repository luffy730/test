<?php 
session_start();
$_SESSION['uname'] = 'admin';
header('Location:index.php');


 ?>