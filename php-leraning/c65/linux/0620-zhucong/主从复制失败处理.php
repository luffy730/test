<?php 
//关闭防火墙，关闭selinux，确保能上网
//重启两台机器mysql




//1.在主服务器里面的mysql 执行 show master status\G，查看master_log_file和master_log_pos

//2.在从服务器mysql执行 stop slave;

//3.在从服务器mysql执行，change master to master_host=‘192.168.1.21',master_user='slave',master_password='admin888',master_log_file='mysql-bin.000004',master_log_pos=120;

//4.在从服务器mysql执行，start slave;

//5.主服务器mysql插入数据测试









 ?>