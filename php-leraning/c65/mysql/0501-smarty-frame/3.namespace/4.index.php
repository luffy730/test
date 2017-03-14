<?php namespace myProject; 
class A{
	public static function index(){
		//返回当前的空间的名称
		echo __NAMESPACE__;
	}
}
//A::index();
//\myProject\A::index();
//作为了解
//namespace\A::index();


 ?>