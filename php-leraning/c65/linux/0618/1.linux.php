<?php
//1.配置LAMP
安装Apache 
yum –y install httpd
安装mysql 
yum –y install mysql mysql-server
安装php  
yum -y install php php-mysql php-gd php-mbstring 

开启服务 service httpd start

//2.上传的工具是（filezilla）上传代码到 /var/www/html

//3.更改所有者  chown -R apache:apache /var/www/html

//4.启动mysql service mysqld restart

//5.创建数据库，导入数据库





//更改默认访问目录
vi /etc/httpd/conf/httpd.conf
找到 DocumentRoot
然后把目录改成 /www
service httpd restart




//虚拟主机
//1. vi /etc/httpd/conf/httpd.conf 找到NameVirtual去掉前面的#,然后重启服务器
//2.创建 /etc/httpd/conf.d/virtual.conf
#<VirtualHost *:80>
#    ServerAdmin webmaster@dummy-host.example.com
#    DocumentRoot /www/docs/dummy-host.example.com
#    ServerName dummy-host.example.com
#    ErrorLog logs/dummy-host.example.com-error_log
#    CustomLog logs/dummy-host.example.com-access_log common
#</VirtualHost>


//3.在/www目录分别创建qq和hd目录，在这两个目录里面创建index.html,分别输入不同的内容


//4.修改c:/windows/system32/drivers/etc/hosts
// 192.168.31.193 hd.com
// 192.168.31.193 qq.com

//5.再次重启httpd service httpd restart，浏览器访问测试
//输入qq.com和hd.com就会出来不同内容




//时间服务器
yum install -y ntp
service ntpd restart

//查看服务的运行状态
service ntpd status

//设置自动启动
chkconfig --level 35 ntpd on
//关闭自动启动
chkconfig --level 35 ntpd off
















