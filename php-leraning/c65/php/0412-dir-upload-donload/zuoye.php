<?php 
//1.上传练习5遍以上和下载



//2.开发移动函数(扩展，可以不写)
function move($source,$dest){
	//1.复制源目录到目标目录(递归)
	cp($source,$dest)
	//2.再删除源目录(已经写好)
	del($source);
}
//把a目录移动到b目录
move('./a','./b/a');

function cp($source,$dest){
	
}
function del($source){
	
}


 ?>