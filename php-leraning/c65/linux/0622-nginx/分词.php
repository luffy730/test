<?php 
//重新建立所有的索引
/usr/local/coreseek/bin/indexer -c /usr/local/coreseek/etc/csft.conf --all --rotate

//重新建立增量索引
/usr/local/coreseek/bin/indexer -c /usr/local/coreseek/etc/csft.conf delta  --rotate




 ?>