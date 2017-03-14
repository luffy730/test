<?php

function smarty_function_css($params, &$smarty)
{
   $css = $params['file'];
   $str =<<<str
<link rel="stylesheet" type="text/css" href="{$css}"/>
str;
   return $str;
}


?>
