<?php
/**
 * [smarty_block_stu stu的块级标签，作为了解]
 * @param  [type] $params  [description]
 * @param  [type] $content [description]
 * @param  [type] &$smarty [description]
 * @return [type]          [description]
 */
function smarty_block_stu($params, $content, &$smarty){
    //获取要查询哪个班级的学生
   $cid = isset($params['cid']) ? $params['cid'] : 0;
   //得到多少个学生
   $row = isset($params['row']) ? $params['row'] : 0;


   //如果有cid的时候就有where
    $where = $cid ? "WHERE cid={$cid}" : '';
    $limit = $row ? "LIMIT $row" : '';
    //组合sql
    $sql = "SELECT * FROM student {$where} {$limit}";
    //查询数据库
    $model = new Model;
    $data = $model->q($sql);

    $str = '';
    foreach ($data as $v) {
        //$v的数据
        // Array
        // (
        //     [sid] => 31
        //     [sname] => 小红
        //     [sex] => 男
        //     [birthday] => 
        //     [cid] => 3
        // )
        $temp = $content;
        foreach ($v as $field => $value) {
           $temp = str_replace("[\$f.{$field}]", $value, $temp);
        }
        $str .= $temp;

    }
    return $str;


}

/* vim: set expandtab: */
//原始的$content是
// <tr>
//     <td>[$f.sname]</td>
//     <td>[$f.sex]</td>
// </tr>
// 外层循环第一次的时候 $content是以下的值
// <tr>
// <td>小红</td>
// <td>男</td>
// </tr>
// 外层循环第二次的时候，就无法进行搜索替换了,所以用临时变量保存原有状态
// <tr>
// <td>小红</td>
// <td>男</td>
// </tr>











