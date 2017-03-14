SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `blog_edu` ;
CREATE SCHEMA IF NOT EXISTS `blog_edu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `blog_edu` ;

-- -----------------------------------------------------
-- Table `blog_edu`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`user` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`user` (
  `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` CHAR(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`uid`))
ENGINE = MyISAM
COMMENT = '用户表';


-- -----------------------------------------------------
-- Table `blog_edu`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`category` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`category` (
  `cid` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cname` CHAR(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `ctitle` VARCHAR(120) NOT NULL DEFAULT '' COMMENT '分类的title,作so',
  `cdes` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '分类的描述,做seo',
  `pid` SMALLINT NOT NULL DEFAULT 0 COMMENT '父级pid',
  `csort` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序字段',
  `ckeywords` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '分类的关键字',
  PRIMARY KEY (`cid`))
ENGINE = MyISAM
COMMENT = '分类表';


-- -----------------------------------------------------
-- Table `blog_edu`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`article` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`article` (
  `aid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` CHAR(150) NOT NULL DEFAULT '',
  `click` MEDIUMINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '点击次数',
  `sendtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '发布时间',
  `updatetime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '修改时间',
  `thumb` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `digest` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `author` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '作者',
  `is_recycle` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否在回收站1是代表在回收站',
  `user_uid` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属用户uid',
  `category_cid` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属分类cid',
  PRIMARY KEY (`aid`),
  INDEX `fk_article_user_idx` (`user_uid` ASC),
  INDEX `fk_article_category1_idx` (`category_cid` ASC))
ENGINE = MyISAM
COMMENT = '文章表';


-- -----------------------------------------------------
-- Table `blog_edu`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`tag` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`tag` (
  `tid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tname` CHAR(25) NOT NULL DEFAULT '' COMMENT '标签名称',
  PRIMARY KEY (`tid`))
ENGINE = MyISAM
COMMENT = '标签表';


-- -----------------------------------------------------
-- Table `blog_edu`.`article_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`article_tag` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`article_tag` (
  `article_aid` INT UNSIGNED NOT NULL DEFAULT 0,
  `tag_tid` INT UNSIGNED NOT NULL DEFAULT 0,
  INDEX `fk_article_tag_article1_idx` (`article_aid` ASC),
  INDEX `fk_article_tag_tag1_idx` (`tag_tid` ASC))
ENGINE = MyISAM
COMMENT = '文章标签中间表';


-- -----------------------------------------------------
-- Table `blog_edu`.`webset`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`webset` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`webset` (
  `wid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '配置的标题',
  `type_id` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型id',
  PRIMARY KEY (`wid`))
ENGINE = MyISAM
COMMENT = '网站配置表';


-- -----------------------------------------------------
-- Table `blog_edu`.`link`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`link` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`link` (
  `lid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lname` CHAR(40) NOT NULL DEFAULT '' COMMENT '链接名称',
  `addtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加时间',
  `logo` VARCHAR(120) NOT NULL DEFAULT '' COMMENT 'logo',
  `url` CHAR(150) NOT NULL DEFAULT '' COMMENT '地址',
  `sort` SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`lid`))
ENGINE = MyISAM
COMMENT = '友情链接表';


-- -----------------------------------------------------
-- Table `blog_edu`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`comment` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`comment` (
  `coid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `addtime` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论时间',
  `article_aid` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`coid`),
  INDEX `fk_comment_article1_idx` (`article_aid` ASC))
ENGINE = MyISAM
COMMENT = '文章评论表';


-- -----------------------------------------------------
-- Table `blog_edu`.`article_data`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog_edu`.`article_data` ;

CREATE TABLE IF NOT EXISTS `blog_edu`.`article_data` (
  `keywords` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `des` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '文章描述 seo',
  `content` TEXT NULL COMMENT '文章内容',
  `article_aid` INT UNSIGNED NOT NULL,
  INDEX `fk_article_data_article1_idx` (`article_aid` ASC))
ENGINE = MyISAM
COMMENT = '文章数据表';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
