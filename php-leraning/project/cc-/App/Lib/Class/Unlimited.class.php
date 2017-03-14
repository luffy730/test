<?php
/**
 * 无限级分类数组处理类
 *
 * @author Carmen <e.carmen.hyc@gmail.com>
 *
 * Explain : 一次性把数据读取出来再调来本类相应方法组合数组
 *
 */
Class Unlimited {

	/**
	 * 按层级排序的一维数组，含有LV级与用于显视的填充字符
	 * @param  [Array]  $cate  [分类数组]
	 * @param  [String]  $html  [填充字符]
	 * @param  [Integer] $pid   [父级ID]
	 * @param  [Integer] $level [级别]
	 * @return [Array]
	 */
	Static Public function level ($cate, $html = '─', $pid = 0, $level = 0) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v['html'] = str_repeat($html, $level);
				$v['level'] = $level + 1;
				$arr[] = $v;
				$arr = array_merge($arr, self::level($cate, $html, $v['id'], $level + 1));
			}
		}
		return $arr;
	}

	/**
	 * 按层级关系组合的多维数组
	 * @param  [Array]  $cate [分类数组]
	 * @param  [String]  $name [保存子分类的键名]
	 * @param  [Integer] $pid  [父级ID]
	 * @return [Array]
	 */
	Static Public function layer ($cate, $name = 'child', $pid = 0) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v[$name] = self::layer($cate, $name, $v['id']);
				$arr[] = $v;
			}
		}
		return $arr;
	}

	/**
	 * 传递一个分类ID返回所有父级分类
	 * @param  [Array] $cate [分类数组]
	 * @param  [Integer] $id   [分类ID]
	 * @return [Array]
	 */
	Static Public function getParents($cate, $id) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr[] = $v;
				$arr = array_merge(self::getParents($cate, $v['pid']), $arr);
			}
		}
		return $arr;
	}

	/**
	 * 传递一个分类ID返回所有父级分类ID
	 * @param  [Array] $cate [分类数组]
	 * @param  [Integer] $id   [分类ID]
	 * @return [Array]
	 */
	Static Public function getParentsId($cate, $id) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr[] = $v['id'];
				$arr = array_merge($arr, self::getParentsId($cate, $v['pid']));
			}
		}
		return $arr;
	}

	/**
	 * 传递一个分类ID返回所有子级分类
	 * @param  [Array] $cate [分类数组]
	 * @param  [Integer] $pid   [分类ID]
	 * @return [Array]
	 */
	Static Public function getChilds ($cate, $pid) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v;
				$arr = array_merge($arr, self::getChilds($cate, $v['id']));
			}
		}
		return $arr;
	}

	/**
	 * 传递一个分类ID返回所有子级分类ID
	 * @param  [Array] $cate [分类数组]
	 * @param  [Integer] $pid   [分类ID]
	 * @return [Array]
	 */
	Static Public function getChildsId ($cate, $pid) {
		if (!is_array($cate)) return false;

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v['cid'];
				$arr = array_merge($arr, self::getChildsId($cate, $v['id']));
			}
		}
		return $arr;
	}
}