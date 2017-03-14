/*

*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ccshop_rbac_access`
-- ----------------------------
DROP TABLE IF EXISTS `ccshop_rbac_access`;
CREATE TABLE IF NOT EXISTS `ccshop_rbac_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ccshop_rbac_access
-- ----------------------------
INSERT INTO `ccshop_rbac_access` VALUES ('1', '4');
INSERT INTO `ccshop_rbac_access` VALUES ('1', '5');
INSERT INTO `ccshop_rbac_access` VALUES ('1', '1');
INSERT INTO `ccshop_rbac_access` VALUES ('2', '1');
INSERT INTO `ccshop_rbac_access` VALUES ('2', '2');
INSERT INTO `ccshop_rbac_access` VALUES ('2', '3');
INSERT INTO `ccshop_rbac_access` VALUES ('2', '6');

-- ----------------------------
-- Table structure for `ccshop_rbac_node`
-- ----------------------------
DROP TABLE IF EXISTS `ccshop_rbac_node`;
CREATE TABLE IF NOT EXISTS `ccshop_rbac_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `show` tinyint(1) unsigned NOT NULL default 1,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ccshop_rbac_node
-- ----------------------------
INSERT INTO `ccshop_rbac_node` VALUES ('1', 'admin', null, '1', null, '100', '0', '1',1);
INSERT INTO `ccshop_rbac_node` VALUES ('2', 'cate', null, '1', null, '100', '1', '2',1);
INSERT INTO `ccshop_rbac_node` VALUES ('3', 'add', null, '1', null, '100', '2', '3',1);
INSERT INTO `ccshop_rbac_node` VALUES ('4', 'goods', null, '1', null, '100', '1', '2',1);
INSERT INTO `ccshop_rbac_node` VALUES ('5', 'add', null, '1', null, '100', '4', '3',1);
INSERT INTO `ccshop_rbac_node` VALUES ('6', 'index', null, '1', null, '100', '2', '3',1);

-- ----------------------------
-- Table structure for `ccshop_rbac_role`
-- ----------------------------
DROP TABLE IF EXISTS `ccshop_rbac_role`;
CREATE TABLE IF NOT EXISTS `ccshop_rbac_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- ----------------------------
-- Records of ccshop_rbac_role
-- ----------------------------
INSERT INTO `ccshop_rbac_role` VALUES ('1', 'goods', null, '1', null);
INSERT INTO `ccshop_rbac_role` VALUES ('2', 'cate', null, '1', null);

-- ----------------------------
-- Table structure for `ccshop_rbac_adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `ccshop_rbac_adminuser`;
CREATE TABLE `ccshop_rbac_adminuser` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ccshop_rbac_user
-- ----------------------------
INSERT INTO `ccshop_rbac_adminuser` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `ccshop_rbac_adminuser` VALUES ('2', 'cate', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `ccshop_rbac_adminuser` VALUES ('3', 'goods', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `ccshop_rbac_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `ccshop_rbac_user_role`;
CREATE TABLE IF NOT EXISTS `ccshop_rbac_user_role` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ccshop_rbac_user_role
-- ----------------------------
INSERT INTO `ccshop_rbac_user_role` VALUES ('1', '3');
INSERT INTO `ccshop_rbac_user_role` VALUES ('2', '2');
