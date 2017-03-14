/**
 * 控制字符串的长度不超过指定数值，其中一个中文字符占长度为1，两个英文字符占长度1
 * @param  {[字符串]} string [要控制的字符串]
 * @param  {[整型]} length [长度上限]
 * @return {[数组]} 返回一个包含两个元素的数组 [数组的第一个元素是操作之后长度在指定长度之内的字符串，第二个元素是字符串长度与限定长度还差几个]
 */
function strLenControl(string, length){
	var result = [];		//最后要返回的结果数组
	var num = 0;			//计算出的字符串长度值
	var maxnum = length;	//字符串长度限定值

	for(var i = 0; i < string.length; i++){		//用length属性得到的值是一个中文和英文字符都占1
		//如果统计字数超过了限定字数，就退出循环，这句代码必须有，否则限定字数会随字符串的长度增加而增加
		if(num >= length)
			break;

		//字符串不是中文时， Unicode编码在0~255之间的是英文，大于255的是中文
		if(string.charCodeAt(i) >= 0 && string.charCodeAt(i) <= 255){
			num += 0.5;			//有一个英文字符，字符串统计长度就加0.5
			maxnum += 0.5		//有一个英文字符，限定字数长度就加0.5个  浮点数是近似数
		}else{				//字符是中文时
			num++;			//当前统计字数加1，最大限定字数不变
		}
	}

	//字符串的统计长度如果小于限定字数就不加处理，如果超过限定字数就截取到限定长度
	var str = num < length ? string : string.substring(0, Math.floor(maxnum));
	//字符串字数与限定字数还差几个，即还可以输入几个字
	var gap = length - Math.ceil(num);
	gap = gap < 0 ? 0 : gap;

	//将处理后的字符串和字数差存入数组并返回
	result[0] = str;
	result[1] = gap;
	return result;
}