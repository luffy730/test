<?php namespace A;
function p(){
	echo 'A';
}
//p();

namespace B;
function p(){
	echo 'B';
}
//如果名称没有写完整就是调用当前空间（非限定名称）
//p();
//可以指定完整空间（完全限定名称）
//\A\p();
//如果写了空间没有写\，那么就相当于相对目录（限定名称）
//A\p();














 ?>