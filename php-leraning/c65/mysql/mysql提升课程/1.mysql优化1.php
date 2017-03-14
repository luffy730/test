<?php
//给用户名字段加上非重索引
alter table user add unique username_key(username);
//删除非重索引
alter table user drop index username_key;

