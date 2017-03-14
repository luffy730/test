<?php
try {
  $pdo = new pdo('mysql:host=127.0.0.1;dbname=c65','root','');
  //设置下面的语句都为异常错误，这样才能被try catch接收
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $pdo->query("SET NAMES UTF8");
  //1.开启事务
  $pdo->query("BEGIN");
  //2.关闭自动提交
  $pdo->query("SET AUTOCOMMIT=0");
  //3.执行操作
  //bid为1的用户减去100
  $pdo->exec("UPDATE bank SET money=money-100 WHERE bid=1");
  //bid为2的用户加100
  $pdo->exec("UPDATE bank SET money=money+100 WHERE bid=2");
  //4.确认了
  $pdo->exec('COMMIT');

} catch (PDOException $e) {
  //回滚
  $pdo->exec('ROLLBACK');
  echo $e->getMessage();
}
