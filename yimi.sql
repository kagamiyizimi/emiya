/*
Navicat MySQL Data Transfer

Source Server         : database
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yimi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-21 14:23:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `addr_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `adderss` varchar(255) NOT NULL,
  `create_time` int(20) NOT NULL,
  `def_addr` tinyint(5) NOT NULL,
  PRIMARY KEY (`addr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for area
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '区域表     待导入',
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area
-- ----------------------------

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `goods_num` varchar(100) NOT NULL,
  `selected` tinyint(5) NOT NULL COMMENT '是否选中',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` int(10) NOT NULL,
  `path` int(20) NOT NULL,
  `level` tinyint(5) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cate
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品表',
  `goods_name` varchar(20) NOT NULL,
  `sell_price` decimal(20,2) NOT NULL COMMENT '销售价',
  `market_price` varchar(20) NOT NULL COMMENT '市场价',
  `maketable` tinyint(5) NOT NULL COMMENT '上下架',
  `store` varchar(255) NOT NULL COMMENT '库存',
  `freez` varchar(255) NOT NULL COMMENT '冻结库存',
  `create_time` int(20) NOT NULL COMMENT '添加时间',
  `last_modify` int(20) NOT NULL COMMENT '最近更新时间',
  `last_modify_id` varchar(20) NOT NULL COMMENT '最后一个更新人',
  `keywords` varchar(10) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `cate_id` varchar(20) NOT NULL COMMENT '分类id',
  `is_hot` varchar(255) NOT NULL,
  `is_new` varchar(255) NOT NULL,
  `recycle` tinyint(5) NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `image_b_url` varchar(100) NOT NULL,
  `image_m_url` varchar(100) NOT NULL,
  `image_s_url` varchar(100) NOT NULL,
  `is_face` tinyint(5) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(11) NOT NULL,
  `goods_id` bigint(11) NOT NULL,
  `goods_num` varchar(100) NOT NULL,
  `goods_price` decimal(20,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(11) NOT NULL,
  `content` tinyint(5) NOT NULL COMMENT '生成订单/取消订单',
  `status` tinyint(5) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` int(30) NOT NULL,
  `lock` tinyint(2) NOT NULL COMMENT '是否冻结',
  `ip` varchar(30) NOT NULL,
  `login_time` int(30) NOT NULL COMMENT '冻结的时间',
  PRIMARY KEY (`manager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `mobile` int(11) NOT NULL COMMENT '手机号',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `reg_time` int(11) NOT NULL COMMENT '注册时间',
  `ip` varchar(30) NOT NULL,
  `login_count` int(11) NOT NULL COMMENT '登录次数',
  `login_time` int(11) NOT NULL COMMENT '登录时间',
  `pic` varchar(100) NOT NULL COMMENT '头像',
  `lock` tinyint(2) NOT NULL COMMENT '是否冻结',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` int(20) NOT NULL COMMENT '订单总价',
  `member_id` int(11) NOT NULL COMMENT '下单人的id',
  `status` tinyint(5) NOT NULL COMMENT '订单状态   正常/已取消/已完成',
  `pay_status` tinyint(5) NOT NULL COMMENT '支付状态',
  `pay_method` tinyint(5) NOT NULL COMMENT '支付方式     货到付款/在线支付/微信支付/支付宝',
  `create_time` int(20) NOT NULL COMMENT '创建时间',
  `last_modify` int(20) NOT NULL COMMENT '最新更新时间',
  `ship_name` varchar(30) NOT NULL COMMENT '下单人名称',
  `ship_mobile` int(15) NOT NULL COMMENT '下单人电话号码',
  `ship_area` varchar(100) NOT NULL COMMENT '下单区域',
  `ship_addr` varchar(255) NOT NULL COMMENT '下单地址',
  `memo` varchar(255) NOT NULL COMMENT '订单附言',
  PRIMARY KEY (`orders_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
