<?php
//创建文件
touch index.html

// 把index.php复制到abc目录
cp index.php abc/

// 把index.php复制到abc目录并且改名为index.html
cp index.php abc/index.html

//移动文件
//把1.php移动到abc
mv 1.php abc/
//改名
mv 1.gif 2.gif


//压缩并且打包
tar -zcvf etc.tar.gz /etc

//查看etc目录大小
cd /etc
du -h 

//解包
tar -zxvf etc.tar.gz



//修改用户的附加组
usermod -G shop,category lisi


















