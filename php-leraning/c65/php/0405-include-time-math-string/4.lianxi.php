<?php 
getRunTime('start');//记录开始时间
for ($i=0; $i < 1000000; $i++) { 
	$b = 1;
}
echo getRunTime('end');//结束时间减去开始时间


//获得代码执行时间的函数
function getRunTime($pos){
	if($pos == 'start'){
		//为了不丢失，保存到静态变量里面
	}else if($pos == 'end'){
		//结束的时间减去静态变量存好的时间
	}
}


















 ?>