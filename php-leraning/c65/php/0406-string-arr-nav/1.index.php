<?php
include './function.php';
//MD5加密，是不可逆的 32位字符串
//$str = md5('admin888ABC_+()*123O(∩_∩)O~');
//echo $str;
//echo strlen($str);

//将字符串变为数组
//$pic = '1.jpg,2.jpg,3.jpg';
//$arr = explode(',', $pic);
//p($arr);

//将数组变为字符串
//$arr = array(1,2,3);
//echo implode('|', $arr);


//截取字符串
//$url = 'abcdefg';
////echo substr($url, 1);//bcdefg
////echo substr($url, 1,2);//bc
////echo substr($url, 1,-2);//bcde
////echo substr($url, -3);//efg


////截取汉字 通吃！英文也可以
//$chinese = 'abc中国人';
//echo mb_substr($chinese, 0,4,'utf-8');




//$url = 'www.houdunwang.com';
////从左边开始找到第一个.的位置开始截取到末尾，包含.
////所以结果是.houdunwang.com
////echo strchr($url, '.');
////结果是.com
//echo strrchr($url,'.');


//$url = 'www.houdunwang.com';
////从左边开始找到.第一次出现的位置
////echo strpos($url, '.');
////从右边开始找到.第一次出现的位置
////echo strrpos($url, '.');



$str = 'abcedAbasdf';
//搜索a替换成-
//echo str_replace('a', '-', $str);
//搜索a和s替换成-
//echo str_replace(array('a','s'), '-', $str);
//搜索a和s替换成-和|
//echo str_replace(array('a','s'), array('-','|'), $str);



//$str = 'abcAbcdafg';
////i 不区分大小写，a和A都可以被搜索到
//echo str_ireplace('a', '-', $str);


//$url = 'http://www.baidu.com/index.php?wd=后盾网';
////为了防止在传输过程中有编码问题，url地址转码（相当于快递打包）
//$enUrl = urlencode($url);
////解码，（相当于拆包）
//echo urldecode($enUrl);




//$str = <<<aaa
//<script>alert('我是好样的！')</script>
//aaa;
////实体化（js就不可以直接运行了）
//$str = htmlspecialchars($str);
//echo $str;


//$str = "a\b'c";
////自动转义 把 \ 和 ’ 加上 转义符号 \
//$str = addslashes($str);
////反转义
//$str = stripslashes($str);
//echo $str;











































 ?>