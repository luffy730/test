<?php 
//1.把sphinx文件夹传到/root

//2.安装环境
yum -y install make gcc g++ gcc-c++ libtool autoconf automake imake mysql-devel libxml2-devel libtool.i686 expat-devel php-devel

//3.备份好已经安装好环境的虚拟机

//安装中文分词包含（libmmeseg和csft）

//4.编译安装mmeseg,如果安装失败，那么先make clean，然后再 make & make install

//5.编译安装csft(编译会久一些)，如果安装失败，那么先make clean，然后再 make & make install

//6.通过sql.php文件创建数据库

//7.更改mysql密码 mysql_secure_installation
//设置为admin888

//8. /usr/local/coreseek/bin/indexer --all
//创建索引

//9.搜索 /usr/local/coreseek/bin/search 后盾


//10.安装php扩展

//11.把php的文件夹放入到/var/www/html目录做测试，如果搜索“后盾”能搜到结果证明前面全部安装成功









 ?>