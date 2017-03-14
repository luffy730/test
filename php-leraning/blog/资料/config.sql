

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `webset`
-- ----------------------------
DROP TABLE IF EXISTS `webset`;
CREATE TABLE `webset` (
  `wid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(15) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `value` varchar(70) NOT NULL DEFAULT '' COMMENT '配置值',
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '配置项标题',
  `type_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '配置项类型id，相同类型id相同',
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='站点配置';

-- ----------------------------
-- Records of webset
-- ----------------------------
INSERT INTO `webset` (wid,name,title,value,type_id)VALUES ('1', 'webname', '网站名称', '后盾blog教学', '1');
INSERT INTO `webset` (wid,name,title,value,type_id)VALUES ('2', 'adminemail', '站长邮箱', 'admin@admin.com', '1');
INSERT INTO `webset` (wid,name,title,value,type_id)VALUES ('3', 'copy', '版权信息', '教学demo', '1');
