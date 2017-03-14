<?php 
$frameConfig = array(
	'CODE_LEN' => 4,
	'DB_NAME' => 'c65'
);
$userConfig = array(
	'CODE_LEN' => 1
);
//数组合并,后面的优先级更高
$config = array_merge($frameConfig,$userConfig);
echo '<pre>';
print_r($config);
exit;


 ?>