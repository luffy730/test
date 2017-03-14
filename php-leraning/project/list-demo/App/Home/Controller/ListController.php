<?php namespace Home\Controller;
use Hdphp\Controller\Controller;

//列表控制器
class ListController extends Controller{

	//构造函数
	public function __init()
	{
	}

	public function index(){
		//获得顶级分类
		$topCate = Db::table('category')->where("pid=0")->get();
		View::with('topCate',$topCate);
		//一、显示筛选的属性*****************
		//1.获取当前分类的子分类的cid
		$cid = Q('get.cid',0,'intval');
		$cids = $this->getSon(Db::table('category')->get(),$cid);
		$cids[] = $cid;
		//2.通过cid找到gid
		$gids = Db::table('goods')->where("cid in(" . implode(',', $cids) . ")")->lists('gid');
		//3.通过查询到的gid找到商品属性
		$goodsAttr = Db::table('goods_attr')->where("gid in(" . implode(',', $gids) . ")")->groupBy('gtvalue')->get();
		$sameTemp = array();
		foreach ($goodsAttr as $v) {
				$sameTemp[$v['taid']][] = $v;
		}
		$attr = array();
		//重组数组为array('name'=>'名称',value=>名称对应的值)
		foreach ($sameTemp as $taid => $v) {
			$attr[] = array(
				'name'=> Db::table('type_attr')->where("taid={$taid}")->pluck('taname'),
				'value'=>$v
			);
		}
		// p($attr);
		View::with('attr',$attr);
		//二、根据属性筛选商品*************
		//1.处理param参数
		$num = count($attr);
		//0_0_0_0_0_0_0_0_0_0_0_0_0
		$param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, $num, 0);
		View::with('param',$param);
		//2.根据param参数进行筛选
		$finalGids = $this->filter($param,$gids);
		
		
		View::make();
	}
	
	private function filter($param,$cidGids){
		$gids = array();
		//循环param参数
		foreach ($param as $gtid) {
			//如果不为0，也就是不是“不限”的时候
			if($gtid){
				//拿到属性的值
				$gtvalue = Db::table('goods_attr')->where("gtid={$gtid}")->pluck('gtvalue');
				//通过属性的值获得到gid
				$gids[] = Db::table('goods_attr')->where("gtvalue='{$gtvalue}'")->lists('gid');
			}
		}
		if($gids){
			//取交集
			$temp = $gids[0];
			foreach ($gids as $v) {
				$temp = array_intersect($temp, $v);
			}
			//确保是当前分类的gid
			$finalGids = array_intersect($temp, $cidGids);
		}else{//全部是“不限”的时候
			$finalGids = $cidGids;
		}
		return $finalGids;
		
	}




	/**
	 * [getSon 递归获得子分类cid]
	 * @param  [type] $data [description]
	 * @param  [type] $cid  [description]
	 * @return [type]       [description]
	 */
	private function getSon($data,$cid){
		$temp = array();
		foreach ($data as $v) {
			if($v['pid'] == $cid){
				$temp[] = $v['cid'];
				$temp = array_merge($temp,$this->getSon($data,$v['cid']));
			}
		}
		return $temp;
	}





























}
