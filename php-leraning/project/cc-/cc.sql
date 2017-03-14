-- MySQL dump 10.13  Distrib 5.1.69, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: c16_chenchao
-- ------------------------------------------------------
-- Server version	5.1.69

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP SCHEMA IF EXISTS `project` ;
CREATE SCHEMA IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `project` ;
--
-- Table structure for table `ccshop_admin`
--

DROP TABLE IF EXISTS `ccshop_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminaccount` char(30) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `adminname` char(20) NOT NULL DEFAULT '' COMMENT '管理员用户名',
  `adminpwd` char(60) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `loginip` char(15) NOT NULL DEFAULT '' COMMENT '上次登录IP',
  `islock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否锁定，1是锁定，0是未锁定',
  PRIMARY KEY (`aid`),
  KEY `adminaccount` (`adminaccount`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_admin`
--

LOCK TABLES `ccshop_admin` WRITE;
/*!40000 ALTER TABLE `ccshop_admin` DISABLE KEYS */;
INSERT INTO `ccshop_admin` VALUES (1,'xiaodou666','admin','$2a$08$FQKHpQccafkQMgFJW6P.Z.Klv9GC8Cuzq0JcwrVpFqX7ofsOG2MrG',1375021584,'127.0.0.1',0);
/*!40000 ALTER TABLE `ccshop_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_brand`
--

DROP TABLE IF EXISTS `ccshop_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bname` varchar(20) NOT NULL DEFAULT '' COMMENT '品牌名称',
  `logo` varchar(60) NOT NULL DEFAULT '' COMMENT 'logo图地址',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热门，0是不热门，1是热门',
  PRIMARY KEY (`bid`),
  KEY `bname` (`bname`),
  KEY `ishot` (`ishot`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_brand`
--

LOCK TABLES `ccshop_brand` WRITE;
/*!40000 ALTER TABLE `ccshop_brand` DISABLE KEYS */;
INSERT INTO `ccshop_brand` VALUES (1,' 茵佳妮','51eb064e2bec2.jpg',0,1),(2,' H F','51eb0686ac878.jpg',0,0),(3,' 眼袋自制','51eb06be6dc99.jpg',5,0),(4,' 百分之一','51eb06e11051e.jpg',0,1),(5,' 恋上鱼','51eb070652c38.jpg',3,1),(6,' 安都','51eb07346c2d1.jpg',3,1),(7,' 韩都衣舍','51eb08788aa45.jpg',1,1),(8,' PSIQUE女装','51eb091d2687c.jpg',0,0),(9,' 卓欧','51eb0953a9350.jpg',0,0),(10,' 仙丫','51eb0978c8a04.jpg',0,0),(11,' 芷恋','51eb09b2e1f34.jpg',0,1),(12,' 七格格','51eb09cd04022.jpg',0,1),(13,' luxlead洛诗琳','51eb09f1a4311.jpg',0,1),(14,' 美丽故事','51eb0a0eb2402.jpg',0,1),(15,'百分之一','51f07bea5127e.jpg',0,0);
/*!40000 ALTER TABLE `ccshop_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_category`
--

DROP TABLE IF EXISTS `ccshop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '分类排序',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属类型ID',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cname` (`cname`),
  KEY `pid` (`pid`),
  KEY `fk_ccshop_category_ccshop_type_idx` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_category`
--

LOCK TABLES `ccshop_category` WRITE;
/*!40000 ALTER TABLE `ccshop_category` DISABLE KEYS */;
INSERT INTO `ccshop_category` VALUES (1,'普通女装',0,0,0),(2,'特殊服饰',0,0,0),(3,'配件',0,0,0),(4,'上衣',1,1,1),(5,'裤子',1,3,2),(6,'裙子',1,2,3),(7,'套装',2,0,4),(8,'婚纱礼服',2,0,5),(9,'旗袍',2,0,6),(10,'帽子',3,0,7),(11,'围巾/丝巾/披肩',3,0,8),(12,'眼镜框架',3,0,9),(13,'T恤',4,0,1),(14,'雪纺衫',4,0,1),(15,'衬衫',4,0,1),(16,'蕾丝衫',4,0,1),(17,'吊带背心',4,0,1),(18,'防晒衫',4,0,1),(19,'空调衫',4,0,1),(20,'针织毛衣',4,0,1),(21,'卫衣',4,0,1),(22,'小西装',4,0,1),(23,'马甲',4,0,1),(24,'风衣大衣',4,0,1),(25,'皮衣',4,0,1),(26,'羽绒服',4,0,1),(27,'棉衣',4,0,1),(28,'皮草',4,0,1);
/*!40000 ALTER TABLE `ccshop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_detail`
--

DROP TABLE IF EXISTS `ccshop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_detail` (
  `small` varchar(255) NOT NULL DEFAULT '' COMMENT '小图图册地址',
  `medium` varchar(255) NOT NULL DEFAULT '' COMMENT '中图图册地址',
  `big` varchar(255) NOT NULL DEFAULT '' COMMENT '大图图册地址',
  `intro` text COMMENT '商品详情',
  `service` text COMMENT '售后服务',
  `gid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属商品ID',
  KEY `fk_ccshop_detail_ccshop_goods1_idx` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品详细信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_detail`
--

LOCK TABLES `ccshop_detail` WRITE;
/*!40000 ALTER TABLE `ccshop_detail` DISABLE KEYS */;
INSERT INTO `ccshop_detail` VALUES ('201307/mini_51eba7da99c2c.jpg,201307/mini_51eba7db5f20c.jpg,201307/mini_51eba7dcce633.jpg,201307/mini_51eba7ddaff0b.jpg,201307/mini_51eba7de5a31f.jpg','201307/medium_51eba7da99c2c.jpg,201307/medium_51eba7db5f20c.jpg,201307/medium_51eba7dcce633.jpg,201307/medium_51eba7ddaff0b.jpg,201307/medium_51eba7de5a31f.jpg','201307/51eba7da99c2c.jpg,201307/51eba7db5f20c.jpg,201307/51eba7dcce633.jpg,201307/51eba7ddaff0b.jpg,201307/51eba7de5a31f.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7fd0698f.jpg\" style=\"float:none;\" title=\"20001.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7fd45e93.jpg\" style=\"float:none;\" title=\"20002.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7fdee971.jpg\" style=\"float:none;\" title=\"20003.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7feacc8f.jpg\" style=\"float:none;\" title=\"20004.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7feec5fb.jpg\" style=\"float:none;\" title=\"20005.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51eba7ffa1bf2.jpg\" style=\"float:none;\" title=\"20006.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',1),('201307/mini_51ebab0074a3f.jpg,201307/mini_51ebab012b036.jpg,201307/mini_51ebab01d8381.jpg,201307/mini_51ebab02f2e21.jpg,201307/mini_51ebab039cc52.jpg','201307/medium_51ebab0074a3f.jpg,201307/medium_51ebab012b036.jpg,201307/medium_51ebab01d8381.jpg,201307/medium_51ebab02f2e21.jpg,201307/medium_51ebab039cc52.jpg','201307/51ebab0074a3f.jpg,201307/51ebab012b036.jpg,201307/51ebab01d8381.jpg,201307/51ebab02f2e21.jpg,201307/51ebab039cc52.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1ce1bb1.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1d39a5e.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1d81e4a.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1dbbac4.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1f3e332.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebab1fdcf6c.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',2),('201307/mini_51ebad9250f45.jpg,201307/mini_51ebad93088e4.jpg,201307/mini_51ebad939d708.jpg,201307/mini_51ebad944c396.jpg,201307/mini_51ebad94eface.jpg','201307/medium_51ebad9250f45.jpg,201307/medium_51ebad93088e4.jpg,201307/medium_51ebad939d708.jpg,201307/medium_51ebad944c396.jpg,201307/medium_51ebad94eface.jpg','201307/51ebad9250f45.jpg,201307/51ebad93088e4.jpg,201307/51ebad939d708.jpg,201307/51ebad944c396.jpg,201307/51ebad94eface.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada6713f3.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada6b8c8d.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada87a594.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada920f86.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada95e60f.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebada9a071a.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',3),('201307/mini_51ebc6ce74b07.jpg,201307/mini_51ebc6d9e5833.jpg,201307/mini_51ebc6da8426f.jpg,201307/mini_51ebc6e445617.jpg,201307/mini_51ebc6e4e7ae5.jpg','201307/medium_51ebc6ce74b07.jpg,201307/medium_51ebc6d9e5833.jpg,201307/medium_51ebc6da8426f.jpg,201307/medium_51ebc6e445617.jpg,201307/medium_51ebc6e4e7ae5.jpg','201307/51ebc6ce74b07.jpg,201307/51ebc6d9e5833.jpg,201307/51ebc6da8426f.jpg,201307/51ebc6e445617.jpg,201307/51ebc6e4e7ae5.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc700be0d5.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc70110ac3.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc7014e052.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc70206382.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc70255f2f.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebc70294018.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',4),('201307/mini_51ebcc0deb1ed.jpg,201307/mini_51ebcc1733486.jpg,201307/mini_51ebcc1854a1e.jpg,201307/mini_51ebcc19326b5.jpg,201307/mini_51ebcc1a2f089.jpg','201307/medium_51ebcc0deb1ed.jpg,201307/medium_51ebcc1733486.jpg,201307/medium_51ebcc1854a1e.jpg,201307/medium_51ebcc19326b5.jpg,201307/medium_51ebcc1a2f089.jpg','201307/51ebcc0deb1ed.jpg,201307/51ebcc1733486.jpg,201307/51ebcc1854a1e.jpg,201307/51ebcc19326b5.jpg,201307/51ebcc1a2f089.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc3202b16.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc3250c89.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc328e163.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc3407351.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc3574b36.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc370fdc5.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc381df9f.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc385efe7.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc38cb9c1.jpg\" style=\"float:none;\" title=\"9.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcc391f422.jpg\" style=\"float:none;\" title=\"10.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',5),('201307/mini_51ebceaaf09ca.jpg,201307/mini_51ebceafc516d.jpg,201307/mini_51ebceb6a14e2.jpg,201307/mini_51ebceb74b45e.jpg,201307/mini_51ebceb827c4c.jpg','201307/medium_51ebceaaf09ca.jpg,201307/medium_51ebceafc516d.jpg,201307/medium_51ebceb6a14e2.jpg,201307/medium_51ebceb74b45e.jpg,201307/medium_51ebceb827c4c.jpg','201307/51ebceaaf09ca.jpg,201307/51ebceafc516d.jpg,201307/51ebceb6a14e2.jpg,201307/51ebceb74b45e.jpg,201307/51ebceb827c4c.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcec8a4f50.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcec8e16e7.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebceca661ba.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcecaa36ea.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcecc50608.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcecd95ad9.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebcecf440d3.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebced0e06c6.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',6),('201307/mini_51ebd1bc89baf.jpg,201307/mini_51ebd1c1d5048.jpg,201307/mini_51ebd1c75218a.jpg,201307/mini_51ebd1c808279.jpg,201307/mini_51ebd1c8b0dbe.jpg','201307/medium_51ebd1bc89baf.jpg,201307/medium_51ebd1c1d5048.jpg,201307/medium_51ebd1c75218a.jpg,201307/medium_51ebd1c808279.jpg,201307/medium_51ebd1c8b0dbe.jpg','201307/51ebd1bc89baf.jpg,201307/51ebd1c1d5048.jpg,201307/51ebd1c75218a.jpg,201307/51ebd1c808279.jpg,201307/51ebd1c8b0dbe.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1de27624.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1de6103a.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1dfb95d7.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e012660.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e18b1d8.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e31e6cd.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e34d49b.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e4b02ed.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e4ec0ba.jpg\" style=\"float:none;\" title=\"9.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd1e671e9e.jpg\" style=\"float:none;\" title=\"10.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',7),('201307/mini_51ebd4a2b32c1.jpg,201307/mini_51ebd4a3763e7.jpg,201307/mini_51ebd4a49ad22.jpg,201307/mini_51ebd4a545333.jpg,201307/mini_51ebd4a63de31.jpg','201307/medium_51ebd4a2b32c1.jpg,201307/medium_51ebd4a3763e7.jpg,201307/medium_51ebd4a49ad22.jpg,201307/medium_51ebd4a545333.jpg,201307/medium_51ebd4a63de31.jpg','201307/51ebd4a2b32c1.jpg,201307/51ebd4a3763e7.jpg,201307/51ebd4a49ad22.jpg,201307/51ebd4a545333.jpg,201307/51ebd4a63de31.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b33d08b.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b3a3ece.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b41ec07.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b4568f0.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b4d9ee3.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd4b519b1a.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',8),('201307/mini_51ebd8aa70bcf.jpg,201307/mini_51ebd8ae375f1.jpg,201307/mini_51ebd8b398661.jpg,201307/mini_51ebd8b4513e6.jpg,201307/mini_51ebd8b50c501.jpg','201307/medium_51ebd8aa70bcf.jpg,201307/medium_51ebd8ae375f1.jpg,201307/medium_51ebd8b398661.jpg,201307/medium_51ebd8b4513e6.jpg,201307/medium_51ebd8b50c501.jpg','201307/51ebd8aa70bcf.jpg,201307/51ebd8ae375f1.jpg,201307/51ebd8b398661.jpg,201307/51ebd8b4513e6.jpg,201307/51ebd8b50c501.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c5bfc42.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c6182e5.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c64df7e.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c691963.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c6cc4d1.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebd8c71436c.gif\" style=\"float:none;\" title=\"2000.gif\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',9),('201307/mini_51ebda8cca53c.jpg,201307/mini_51ebda8daa49b.jpg,201307/mini_51ebda8e98056.jpg,201307/mini_51ebda8f55e96.jpg,201307/mini_51ebda903f54d.jpg','201307/medium_51ebda8cca53c.jpg,201307/medium_51ebda8daa49b.jpg,201307/medium_51ebda8e98056.jpg,201307/medium_51ebda8f55e96.jpg,201307/medium_51ebda903f54d.jpg','201307/51ebda8cca53c.jpg,201307/51ebda8daa49b.jpg,201307/51ebda8e98056.jpg,201307/51ebda8f55e96.jpg,201307/51ebda903f54d.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebda9c72f46.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebda9e133d6.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebda9fb77f2.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdaa14f3fe.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdaa2c8fdc.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdaa45014f.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdaa5d78d9.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdaa7912f9.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',10),('201307/mini_51ebdc6331dde.jpg,201307/mini_51ebdc6406e36.jpg,201307/mini_51ebdc64b5565.jpg,201307/mini_51ebdc656a88c.jpg,201307/mini_51ebdc668b883.jpg','201307/medium_51ebdc6331dde.jpg,201307/medium_51ebdc6406e36.jpg,201307/medium_51ebdc64b5565.jpg,201307/medium_51ebdc656a88c.jpg,201307/medium_51ebdc668b883.jpg','201307/51ebdc6331dde.jpg,201307/51ebdc6406e36.jpg,201307/51ebdc64b5565.jpg,201307/51ebdc656a88c.jpg,201307/51ebdc668b883.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc6fae815.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc70013d8.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc703d49f.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc706f0e7.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc70a523b.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc70d2ac8.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc71148af.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51ebdc717d596.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',11),('201307/mini_51f07cc3b624d.jpg,201307/mini_51f07cc487515.jpg,201307/mini_51f07cc59646f.jpg,201307/mini_51f07cc6422d9.jpg','201307/medium_51f07cc3b624d.jpg,201307/medium_51f07cc487515.jpg,201307/medium_51f07cc59646f.jpg,201307/medium_51f07cc6422d9.jpg','201307/51f07cc3b624d.jpg,201307/51f07cc487515.jpg,201307/51f07cc59646f.jpg,201307/51f07cc6422d9.jpg','<p><br/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07ce8e1c53.jpg\" style=\"float:none;\" title=\"1.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07ce9401c0.jpg\" style=\"float:none;\" title=\"2.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07ce987f10.jpg\" style=\"float:none;\" title=\"3.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07ce9c6d1d.jpg\" style=\"float:none;\" title=\"4.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07cea1ac91.jpg\" style=\"float:none;\" title=\"5.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07cea61280.jpg\" style=\"float:none;\" title=\"6.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07ceac90ce.jpg\" style=\"float:none;\" title=\"7.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07cec4accd.jpg\" style=\"float:none;\" title=\"8.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07cedecac2.jpg\" style=\"float:none;\" title=\"9.jpg\"/></p><p><img src=\"/ccshop/svn_ccshop/Uploads/Editor/51f07cef4e335.jpg\" style=\"float:none;\" title=\"10.jpg\"/></p><p><br/></p>','<p>退换货承诺<br/><br/>自商品签收之日起7日内，CC女装城为您提供退换货服务。售后QQ: 1123417042<br/>退换货政策<br/><br/>1、一张订单CC女装城只提供一次退换货服务，为了确保您的权益，请考虑周全后与我们联系。<br/>2、请确保商品吊牌及各种包装完整。<br/>3、如果想要退换货请登录“用户中心”-“我要退换货” 自助申请即可。<br/><br/>4、退换货申请必须的要求：<br/><br/>1）CC女装城为您提供7天无条件退换货，如需办理退换货，请于签收之日7日内提交退换货申请，逾期不予退换；<br/><br/>2）因您个人原因造成的商品损坏（如自行修改尺寸、洗涤、皮具打油、刺绣、长时间穿着等）将不予退换。<br/><br/>3）退货时请确保商品的外包装完好无损（包括包裹填充物及外包装箱或外包装袋），商品附件、吊牌、标签等齐全，商品保持官方商城出售时的原质原样，不影响二次销售。<br/><br/>4）退换货单齐全，如果已开发票的要求发票齐全。<br/><br/>5）如您进行礼包或套装中的商品部分退换，将无法享受礼包或套装购买时的优惠。商品销售页面明确标注不支持部分退换的，依据标注内容处理。<br/><br/>5、以下情况不提供退换货服务：<br/><br/>1）超过退换货规定时限的商品。<br/>2）已经穿着过或洗涤过的商品。<br/>3）已经修改或加工过的商品。<br/>4 ）商品吊牌、商标、票据等有缺失的商品。<br/>5 ）少量色差问题商品（发错颜色商品除外）。<br/>6 ） 对于商品本身的附件（如连衣裙搭配的腰带）损坏、弄丢原因造成的问题不予退换。<br/><br/>6、退换货费用问题<br/><br/>a、退换货： 由于质量问题导致的退换货，CC女装城承担来回的运费，买家寄回时垫付运费稍后给您退款。 非质量问题的退换货需由买家承担来回的费用。<br/><br/>b、退换货邮费差价：若客户在退换过程中产生邮费差价或货品差价，可直接通过“邮费补拍”自行选购，付款后联系客服进行退换货处理事宜。<br/><br/>7、礼包或套装中的商品不可以部分退货，因退货后，原礼包或套装中商品将无法享受购买时优惠。<br/>8、图片及信息仅供参照，因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有一定色差，一切以实物为准。<br/><br/>温馨提示<br/><br/>为保障您的权益，请在签收商品前与配送员当面核对商品种类、数量、规格、赠品、金额是否与订单一致，产品包装是否完好无损，准确 无误再进行签收。</p>',12);
/*!40000 ALTER TABLE `ccshop_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_goods`
--

DROP TABLE IF EXISTS `ccshop_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `gnumber` varchar(45) NOT NULL DEFAULT '' COMMENT '商品货号',
  `unit` char(5) NOT NULL DEFAULT '' COMMENT '计件单位',
  `marketprice` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '市场价',
  `shopprice` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '商城价',
  `pic` varchar(60) NOT NULL DEFAULT '' COMMENT '列表图地址',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上架时间',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属管理员ID',
  `bid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属品牌ID',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类ID',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属类型ID',
  PRIMARY KEY (`gid`),
  KEY `shopprice` (`shopprice`),
  KEY `click` (`click`),
  KEY `time` (`time`),
  KEY `fk_ccshop_goods_ccshop_admin1_idx` (`aid`),
  KEY `fk_ccshop_goods_ccshop_brand1_idx` (`bid`),
  KEY `fk_ccshop_goods_ccshop_category1_idx` (`cid`),
  KEY `fk_ccshop_goods_ccshop_type1_idx` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='商品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_goods`
--

LOCK TABLES `ccshop_goods` WRITE;
/*!40000 ALTER TABLE `ccshop_goods` DISABLE KEYS */;
INSERT INTO `ccshop_goods` VALUES (1,'包邮 2013时尚新款夏装卡通女士t恤圆领修身韩版短袖女T恤衫学院 ','','件','168','68','51eba7cdaf24a.jpg',1356,1374398495,1,1,13,1),(2,'韩版中长款宽松不规则下摆蝙蝠袖T恤 短袖T恤女 ','','件','298','78','51ebaaf7bdd34.jpg',368,1374399279,1,12,13,1),(3,'2013夏 新品超大码女装 胖MM 韩版修身女士短袖T恤显瘦 ','','件','78','39','51ebad885c1b8.jpg',1321,1374399928,1,12,13,1),(4,'2013夏新款大码女装雪纺衫莫代尔纯棉短袖T女胖mm显瘦t恤清仓包邮 ','','件','198','59','51ebc6b732547.jpg',1936,1374406434,1,7,13,1),(5,'HodooAge 夏装新款 韩版女装短袖T恤 简单爱 TS1099 ','','件','139','39','51ebcc008e431.jpg',638,1374407758,1,10,13,1),(6,'2013夏装新款韩版刺绣印花泡泡袖 短袖 T恤女 1097','','件','118','59','51ebcea329ad4.jpg',2983,1374408416,1,14,13,1),(7,'2013春夏款纯色V领女士韩版短袖T恤 性感修身打底衫 ','','件','198','35','51ebd1b42d12a.jpg',6582,1374409209,1,1,13,1),(8,'2013春装新款韩版大码女装蝙蝠袖条纹宽松休闲T恤 ','','件','146','56','51ebd497a9c8c.jpg',1251,1374409925,1,13,13,1),(9,'2013夏新款 立体印花圆领T恤短袖女装 休闲简约打底衫夏装女','','件','236','118','51ebd8a1d7672.jpg',2913,1374410967,1,12,13,1),(10,'女装2013新款夏装圆领宽松短袖韩版格子女T恤女士上衣t恤衫 ','','件','379','79','51ebda83c0ce7.jpg',2317,1374411446,1,13,13,1),(11,' 2013新款夏装韩版宽松露肩一字领字母白色短袖T恤 ','','件','98','48','51ebdc54479a8.jpg',583,1374411903,1,9,13,1),(12,'2013新款致青春白色短袖T恤','','件','139','56','51f07cb0d9613.jpg',1231,1374715142,1,14,13,1);
/*!40000 ALTER TABLE `ccshop_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_goods_attr`
--

DROP TABLE IF EXISTS `ccshop_goods_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_goods_attr` (
  `gtid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性ID',
  `gtvalue` char(15) NOT NULL DEFAULT '' COMMENT '商品属性的值',
  `added` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '附加价格',
  `taid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属属性ID',
  `gid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属商品ID',
  PRIMARY KEY (`gtid`),
  KEY `gtvalue` (`gtvalue`),
  KEY `fk_ccshop_goods_attr_ccshop_type_attr1_idx` (`taid`),
  KEY `fk_ccshop_goods_attr_ccshop_goods1_idx` (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=utf8 COMMENT='商品属性表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_goods_attr`
--

LOCK TABLES `ccshop_goods_attr` WRITE;
/*!40000 ALTER TABLE `ccshop_goods_attr` DISABLE KEYS */;
INSERT INTO `ccshop_goods_attr` VALUES (1,'短袖','0',1,1),(2,'修身型','0',2,1),(3,'短款','0',3,1),(4,'常规袖','0',4,1),(5,'圆领','0',5,1),(6,'可爱','0',6,1),(7,'做旧','0',7,1),(8,'纯色','0',8,1),(9,'韩版','0',9,1),(10,'棉混纺','0',10,1),(11,'青年','0',11,1),(12,'白色','5',12,1),(13,'粉红','6',12,1),(14,'黑色','0',12,1),(15,'黄色','0',12,1),(16,'绿色','0',12,1),(17,'S','0',13,1),(18,'M','0',13,1),(19,'L','0',13,1),(20,'XL','0',13,1),(21,'短袖','0',1,2),(22,'宽松型','0',2,2),(23,'中长','0',3,2),(24,'常规袖','0',4,2),(25,'圆领','0',5,2),(26,'淑女','0',6,2),(27,'不对称','0',7,2),(28,'人物','0',8,2),(29,'韩版','0',9,2),(30,'棉加莱卡','0',10,2),(31,'青年','0',11,2),(32,'白色','6',12,2),(33,'黄色','0',12,2),(34,'红色','0',12,2),(35,'棕色','10',12,2),(36,'M','0',13,2),(37,'L','0',13,2),(38,'短袖','0',1,3),(39,'修身型','0',2,3),(40,'短款','0',3,3),(41,'常规袖','0',4,3),(42,'圆领','0',5,3),(43,'甜美','0',6,3),(44,'荷叶边','0',7,3),(45,'纯色','0',8,3),(46,'韩版','0',9,3),(47,'聚酯/涤纶','0',10,3),(48,'青年','0',11,3),(49,'蓝色','0',12,3),(50,'红色','0',12,3),(51,'紫色','12',12,3),(52,'S','0',13,3),(53,'M','0',13,3),(54,'L','0',13,3),(55,'XL','0',13,3),(56,'短袖','0',1,4),(57,'修身型','0',2,4),(58,'短款','0',3,4),(59,'常规袖','0',4,4),(60,'圆领','0',5,4),(61,'优雅','0',6,4),(62,'荷叶边','0',7,4),(63,'纯色','0',8,4),(64,'韩版','0',9,4),(65,'莫代尔','0',10,4),(66,'青年','0',11,4),(67,'黑色','0',12,4),(68,'紫色','20',12,4),(69,'S','0',13,4),(70,'M','0',13,4),(71,'L','0',13,4),(72,'XL','0',13,4),(73,'XXL','0',13,4),(74,'XXL','0',13,4),(75,'短袖','0',1,5),(76,'修身型','0',2,5),(77,'短款','0',3,5),(78,'常规袖','0',4,5),(79,'圆领','0',5,5),(80,'可爱','0',6,5),(81,'印花/印染','0',7,5),(82,'卡通图案','0',8,5),(83,'韩版','0',9,5),(84,'棉混纺','0',10,5),(85,'青年','0',11,5),(86,'柠檬黄','0',12,5),(87,'M','0',13,5),(88,'L','0',13,5),(89,'XL','0',13,5),(90,'短袖','0',1,6),(91,'修身型','0',2,6),(92,'中长','0',3,6),(93,'常规袖','0',4,6),(94,'圆领','0',5,6),(95,'淑女','0',6,6),(96,'印花/印染','0',7,6),(97,'花朵','0',8,6),(98,'韩版','0',9,6),(99,'纯棉','0',10,6),(100,'青年','0',11,6),(101,'白色','0',12,6),(102,'黄色','0',12,6),(103,'S','0',13,6),(104,'M','0',13,6),(105,'L','0',13,6),(106,'XL','0',13,6),(107,'七分袖','0',1,7),(108,'修身型','0',2,7),(109,'短款','0',3,7),(110,'常规袖','0',4,7),(111,'V领','0',5,7),(112,'性感','0',6,7),(113,'冰淇淋色','0',7,7),(114,'纯色','0',8,7),(115,'韩版','0',9,7),(116,'棉混纺','0',10,7),(117,'青年','0',11,7),(118,'白色','0',12,7),(119,'米色','0',12,7),(120,'粉红','18',12,7),(121,'红色','0',12,7),(122,'M','0',13,7),(123,'短袖','0',1,8),(124,'宽松型','0',2,8),(125,'短款','0',3,8),(126,'露肩袖','0',4,8),(127,'圆领','0',5,8),(128,'休闲','0',6,8),(129,'蝴蝶结','0',7,8),(130,'条纹','0',8,8),(131,'杭派','0',9,8),(132,'棉混纺','0',10,8),(133,'青年','0',11,8),(134,'蓝白条纹','0',12,8),(135,'M','0',13,8),(136,'短袖','0',1,9),(137,'修身型','0',2,9),(138,'中长','0',3,9),(139,'常规袖','0',4,9),(140,'V领','0',5,9),(141,'休闲','0',6,9),(142,'印花/印染','0',7,9),(143,'花朵','0',8,9),(144,'杭派','0',9,9),(145,'棉加莱卡','0',10,9),(146,'青年','0',11,9),(147,'白色','20',12,9),(148,'黄色','0',12,9),(149,'黑色','0',12,9),(150,'黑白','0',12,9),(151,'S','0',13,9),(152,'M','0',13,9),(153,'L','0',13,9),(154,'短袖','0',1,10),(155,'修身型','0',2,10),(156,'中长','0',3,10),(157,'常规袖','0',4,10),(158,'圆领','0',5,10),(159,'田园','0',6,10),(160,'扎染','0',7,10),(161,'碎花','0',8,10),(162,'韩版','0',9,10),(163,'棉混纺','0',10,10),(164,'青年','0',11,10),(165,'2896图片色','0',12,10),(166,'M','0',13,10),(167,'L','0',13,10),(168,'XL','0',13,10),(169,'短袖','0',1,11),(170,'宽松型','0',2,11),(171,'中长','0',3,11),(172,'露肩袖','0',4,11),(173,'不规则领','0',5,11),(174,'休闲','0',6,11),(175,'印花/印染','0',7,11),(176,'字母','0',8,11),(177,'韩版','0',9,11),(178,'棉混纺','0',10,11),(179,'青年','0',11,11),(180,'白色','0',12,11),(181,'粉红','0',12,11),(182,'黑色','0',12,11),(183,'M','0',13,11),(184,'无袖','0',1,12),(185,'宽松型','0',2,12),(186,'短款','0',3,12),(187,'常规袖','0',4,12),(188,'圆领','0',5,12),(189,'可爱','0',6,12),(190,'蝴蝶结','0',7,12),(191,'几何图案','0',8,12),(192,'韩版','0',9,12),(193,'棉混纺','0',10,12),(194,'青年','0',11,12),(195,'白色','6',12,12),(196,'红色','0',12,12),(197,'S','0',13,12),(198,'M','0',13,12);
/*!40000 ALTER TABLE `ccshop_goods_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_goods_list`
--

DROP TABLE IF EXISTS `ccshop_goods_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_goods_list` (
  `glid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `combine` char(50) NOT NULL DEFAULT '' COMMENT '组合属性ID',
  `number` char(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  `inventory` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '库存量',
  `gid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属商品ID',
  PRIMARY KEY (`glid`),
  KEY `fk_ccshop_goods_list_ccshop_goods1_idx` (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='货品列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_goods_list`
--

LOCK TABLES `ccshop_goods_list` WRITE;
/*!40000 ALTER TABLE `ccshop_goods_list` DISABLE KEYS */;
INSERT INTO `ccshop_goods_list` VALUES (1,'12,17','13072111217',120,1),(2,'12,18','13072111218',26,1),(3,'13,18','13072111318',36,1),(4,'15,19','13072111519',121,1),(5,'16,18','13072111618',19,1),(6,'32,36','13072123236',133,2),(7,'32,37','13072123237',55,2),(8,'35,36','13072123536',653,2),(9,'33,36','13072123336',132,2),(10,'49,53','13072134953',121,3),(11,'51,53','13072135153',169,3),(12,'67,70','13072146770',12,4),(13,'67,71','13072146771',129,4),(14,'68,70','13072146870',165,4),(15,'86,87','13072158687',256,5),(16,'120,122','1307217120122',326,7),(17,'101,104','1307216101104',12,6),(18,'102,105','1307216102105',32,6),(19,'134,135','1307218134135',31,8),(20,'147,152','1307219147152',69,9),(21,'149,151','1307219149151',35,9),(22,'165,166','13072110165166',116,10),(23,'165,167','13072110165167',97,10),(24,'180,183','13072111180183',83,11),(25,'181,183','13072111181183',56,11),(26,'12,19','13072511219',195,1),(27,'16,19','13072511619',75,1),(28,'195,197','13072512195197',23,12),(29,'195,198','13072512195198',22,12),(30,'196,197','13072512196197',45,12),(31,'196,198','13072512196198',36,12);
/*!40000 ALTER TABLE `ccshop_goods_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_order`
--

DROP TABLE IF EXISTS `ccshop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_order` (
  `oid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL DEFAULT '' COMMENT '订单号',
  `consignee` varchar(20) NOT NULL DEFAULT '' COMMENT '收货人',
  `address` varchar(60) NOT NULL DEFAULT '' COMMENT '收货地址',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `total` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '价格总计',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '生成时间',
  `remark` varchar(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `status` enum('未付款','待发货','已发货','已完成') NOT NULL COMMENT '订单状态',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户ID',
  PRIMARY KEY (`oid`),
  KEY `status` (`status`),
  KEY `fk_ccshop_order_ccshop_user1_idx` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='订单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_order`
--

LOCK TABLES `ccshop_order` WRITE;
/*!40000 ALTER TABLE `ccshop_order` DISABLE KEYS */;
INSERT INTO `ccshop_order` VALUES (1,'20130731141644_1_127.0.0.1_475','后盾网','北京市朝阳区小营路5号四方大厦1809室','11111111111','242',1375251404,'请尽快发货','待发货',1),(2,'20130731142442_1_127.0.0.1_268','后盾网','北京市朝阳区小营路5号','11111111111','237',1375251882,'请发货','待发货',1);
/*!40000 ALTER TABLE `ccshop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_order_list`
--

DROP TABLE IF EXISTS `ccshop_order_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_order_list` (
  `olid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `subtotal` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '价格小计',
  `explain` varchar(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `gid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所订购的商品ID',
  `oid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属订单ID',
  `glid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '货品ID',
  `glnumber` char(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  PRIMARY KEY (`olid`),
  KEY `fk_ccshop_order_list_ccshop_goods1_idx` (`gid`),
  KEY `fk_ccshop_order_list_ccshop_order1_idx` (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='订单列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_order_list`
--

LOCK TABLES `ccshop_order_list` WRITE;
/*!40000 ALTER TABLE `ccshop_order_list` DISABLE KEYS */;
INSERT INTO `ccshop_order_list` VALUES (1,2,'124','',12,1,28,'13072512195197'),(2,1,'62','',12,1,29,'13072512195198'),(3,1,'56','',12,1,31,'13072512196198'),(4,2,'158','',10,2,22,'13072110165166'),(5,1,'79','',10,2,23,'13072110165167');
/*!40000 ALTER TABLE `ccshop_order_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_remark`
--

DROP TABLE IF EXISTS `ccshop_remark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_remark` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '评论标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `star` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '星级，1/2/3/4/5分别是1/2/3/4/5星级',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论发表时间',
  `state` enum('未审核','审核未通过','审核已通过') NOT NULL COMMENT '审核状态',
  `gid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属商品ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户ID',
  `uname` char(30) NOT NULL DEFAULT '' COMMENT '所属用户名称',
  PRIMARY KEY (`rid`),
  KEY `state` (`state`),
  KEY `fk_ccshop_remark_ccshop_goods1_idx` (`gid`),
  KEY `fk_ccshop_remark_ccshop_user1_idx` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_remark`
--

LOCK TABLES `ccshop_remark` WRITE;
/*!40000 ALTER TABLE `ccshop_remark` DISABLE KEYS */;
INSERT INTO `ccshop_remark` VALUES (1,'','这件衣服真的很不错哦',0,1375127125,'未审核',12,1,'houdunwang'),(2,'','我推荐大家买这件衣服',0,1375127175,'未审核',12,1,'houdunwang'),(3,'','大家赶紧抢购吧，我买了三件',0,1375127207,'未审核',12,1,'houdunwang'),(4,'','感觉还不错',0,1375127225,'未审核',12,1,'houdunwang'),(5,'','衣服不错，穿上显瘦',0,1375127708,'未审核',12,1,'houdunwang'),(6,'','很漂亮的衣服',0,1375127737,'未审核',12,1,'houdunwang');
/*!40000 ALTER TABLE `ccshop_remark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_session`
--

DROP TABLE IF EXISTS `ccshop_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_session`
--

LOCK TABLES `ccshop_session` WRITE;
/*!40000 ALTER TABLE `ccshop_session` DISABLE KEYS */;
INSERT INTO `ccshop_session` VALUES ('91i56rdc6kfpslhbo10kt3pfp6',1375858551,'code|s:4:\"RFMH\";');
/*!40000 ALTER TABLE `ccshop_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_type`
--

DROP TABLE IF EXISTS `ccshop_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` char(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `tname` (`tname`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_type`
--

LOCK TABLES `ccshop_type` WRITE;
/*!40000 ALTER TABLE `ccshop_type` DISABLE KEYS */;
INSERT INTO `ccshop_type` VALUES (1,'上衣'),(2,'裤子'),(3,'裙子'),(4,'套装'),(5,'婚纱礼服'),(6,'旗袍'),(7,'帽子'),(8,'围巾/丝巾/披肩'),(9,'眼镜框架');
/*!40000 ALTER TABLE `ccshop_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_type_attr`
--

DROP TABLE IF EXISTS `ccshop_type_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_type_attr` (
  `taid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taname` varchar(20) NOT NULL DEFAULT '' COMMENT '类型属性的名称',
  `tavalue` varchar(255) NOT NULL DEFAULT '' COMMENT '类型属性的值',
  `class` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '类型属性的类别，0表示属性，1表示规格',
  `tid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属类型ID',
  PRIMARY KEY (`taid`),
  KEY `taname` (`taname`),
  KEY `fk_ccshop_type_attr_ccshop_type1_idx` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='类型属性表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_type_attr`
--

LOCK TABLES `ccshop_type_attr` WRITE;
/*!40000 ALTER TABLE `ccshop_type_attr` DISABLE KEYS */;
INSERT INTO `ccshop_type_attr` VALUES (1,'袖长','无袖,短袖,长袖,五分袖/中袖,七分袖,九分袖',0,1),(2,'款式','直筒型,修身型,宽松型,蝙蝠型,斗篷型,高腰型,裙摆型,不规则型',0,1),(3,'衣长','超短,短款,中长,长款,加长款',0,1),(4,'袖型','常规袖,泡泡袖,蝙蝠袖,露肩袖,荷叶袖,灯笼袖,喇叭袖,耸肩,堆堆袖,衬衫袖,花瓣袖',0,1),(5,'领型','圆领,V领,一字领,翻领,立领,高领,方领,堆堆领,海军领,斜领,娃娃领,围巾领,半高领,西装领,荷叶领,双层领,连帽/帽领,不规则领',0,1),(6,'风格','可爱,淑女,甜美,性感,优雅,嘻哈,朋克,复古,学院,田园,简约,休闲,民族风,街头,海军,中性,军装,森女,波西米亚,小清新,摇滚,波普,宫廷,哥特',0,1),(7,'流行元素','蝴蝶结,荷叶边,铆钉,流苏,破洞,镂空,肩章,镶钻,露背,贴布,链条,褶皱,钩花,口袋,系带/腰带,拼接,立体装饰,不对称,扎染,钉珠,做旧,亮片,纱网,拉链,纽扣,卷边,印花/印染,背带,Bling Bling,木耳边,风琴褶,渐变,手工,花边,珍珠,羽毛,刺绣,水洗,磨白,磨破,糖果色,冰淇淋色',0,1),(8,'图案','条纹,格子,纯色,手绘,碎花,几何图案,花朵,水果图案,动物图案,字母,人物,波点,大花,菱格,风景图案,植物图案,卡通图案,动物纹,斑马纹,豹纹,千鸟格,骷髅头,脸谱,蝴蝶结,爱心,米字旗/国旗,渐变,涂鸦,数字,文字',0,1),(9,'流派','韩版,日系,欧美,英伦,中式,杭派',0,1),(10,'面料主材','雪纺,真丝,灯芯绒,蕾丝,化纤,亚麻,聚酯/涤纶,尼龙,锦纶,羊绒/开司米,羊毛,棉混纺,精梳棉,丝光棉,棉加莱卡,棉麻,色丁/五枚缎,毛呢,厚锻,亮锻,水晶砂,欧根纱,网格纱,丝绸,锦缎,绢纺,天鹅绒,纯棉,蚕丝,莫代尔,竹纤维,腈纶,奥纶,开司米纶,兔毛',0,1),(11,'适合人群','青年,中年,老年,情侣',0,1),(12,'颜色','',1,1),(13,'尺码','S,M,L,XL,XXL,XXXL,XXXXL',1,1);
/*!40000 ALTER TABLE `ccshop_type_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ccshop_user`
--

DROP TABLE IF EXISTS `ccshop_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ccshop_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL DEFAULT '' COMMENT '账号',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名/昵称',
  `password` char(60) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `address` varchar(60) NOT NULL DEFAULT '' COMMENT '地址',
  `telphone` varchar(20) NOT NULL DEFAULT '' COMMENT '固定电话',
  `cellphone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  PRIMARY KEY (`uid`),
  KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='前台用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ccshop_user`
--

LOCK TABLES `ccshop_user` WRITE;
/*!40000 ALTER TABLE `ccshop_user` DISABLE KEYS */;
INSERT INTO `ccshop_user` VALUES (1,'houdunwang','','$2a$08$DwlgMW3xH5jXWWNxDvV4M.ADflXArpZqs.KVUasH3SgcsP2GirqZm','','','',''),(2,'sunqizheng','','$2a$08$sxySOHz4Cv3m5PqZ8lEV.OAJGatZ85G31.hv5oKNnHnDi7O2y/ofS','','','','');
/*!40000 ALTER TABLE `ccshop_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-08 12:09:43
