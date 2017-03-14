<?php

function smarty_function_js($params, &$smarty)
{
   $js = $params['file'];
   $str = "<script src='{$js}' type='text/javascript' charset='utf-8'></script>";
   return $str;
}


?>
