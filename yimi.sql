/*
Navicat MySQL Data Transfer

Source Server         : ooo
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yimi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-27 10:05:27
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
  `path` varchar(20) NOT NULL,
  `level` tinyint(5) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES ('1', '四时蔬菜', '0', '1', '0');
INSERT INTO `cate` VALUES ('2', '安全水果', '0', '2', '0');
INSERT INTO `cate` VALUES ('3', '肉禽蛋类', '0', '3', '0');
INSERT INTO `cate` VALUES ('4', '乳制品类', '0', '4', '0');
INSERT INTO `cate` VALUES ('5', '水中鲜物', '0', '5', '0');
INSERT INTO `cate` VALUES ('6', '早餐&面点', '0', '6', '0');
INSERT INTO `cate` VALUES ('7', '吃吃零嘴', '0', '7', '0');
INSERT INTO `cate` VALUES ('8', '饮料酒水', '0', '8', '0');
INSERT INTO `cate` VALUES ('9', '油盐酱醋', '0', '9', '0');
INSERT INTO `cate` VALUES ('10', '环保生活', '0', '10', '0');
INSERT INTO `cate` VALUES ('12', '根茎类', '1', '1,12', '1');
INSERT INTO `cate` VALUES ('13', '豆制品', '1', '1,13', '1');
INSERT INTO `cate` VALUES ('14', '叶菜类', '1', '1,14', '1');
INSERT INTO `cate` VALUES ('15', '菌菇类', '1', '1,15', '1');
INSERT INTO `cate` VALUES ('16', '豆类', '1', '1,16', '1');
INSERT INTO `cate` VALUES ('17', '茄果瓜花类', '1', '1,17', '1');
INSERT INTO `cate` VALUES ('18', '葱姜蒜和香料', '1', '1,18', '1');
INSERT INTO `cate` VALUES ('19', '冷藏冷冻菜蔬', '1', '1,19', '1');
INSERT INTO `cate` VALUES ('20', '热带水果', '2', '2,20', '1');
INSERT INTO `cate` VALUES ('21', '苹果和梨', '2', '2,21', '1');
INSERT INTO `cate` VALUES ('22', '奇异果', '2', '2,22', '1');
INSERT INTO `cate` VALUES ('23', '柑橘柚类', '2', '2,23', '1');
INSERT INTO `cate` VALUES ('24', '瓜类', '2', '2,24', '1');
INSERT INTO `cate` VALUES ('25', '核果类', '2', '2,25', '1');
INSERT INTO `cate` VALUES ('26', '其他水果', '2', '2,26', '1');
INSERT INTO `cate` VALUES ('27', '蛋类', '3', '3,27', '1');
INSERT INTO `cate` VALUES ('28', '禽类', '3', '3,28', '1');
INSERT INTO `cate` VALUES ('29', '牛肉类', '3', '3,29', '1');
INSERT INTO `cate` VALUES ('30', '猪肉类', '3', '3,30', '1');
INSERT INTO `cate` VALUES ('31', '肉制品', '3', '3,31', '1');
INSERT INTO `cate` VALUES ('32', '火腿', '3', '3,32', '1');
INSERT INTO `cate` VALUES ('33', '鲜奶', '4', '4,33', '1');
INSERT INTO `cate` VALUES ('34', '豆浆牛奶', '4', '4,34', '1');
INSERT INTO `cate` VALUES ('35', '酸奶', '4', '4,35', '1');
INSERT INTO `cate` VALUES ('36', '奶油黄油', '4', '4,36', '1');
INSERT INTO `cate` VALUES ('37', '芝士乳酪', '4', '4,37', '1');
INSERT INTO `cate` VALUES ('38', '冰淇淋和布丁', '4', '4,38', '1');
INSERT INTO `cate` VALUES ('39', '鱼类', '5', '5,39', '1');
INSERT INTO `cate` VALUES ('40', '蟹贝软体类', '5', '5,40', '1');
INSERT INTO `cate` VALUES ('41', '虾类', '5', '5,41', '1');
INSERT INTO `cate` VALUES ('42', '水产制品', '5', '5,42', '1');
INSERT INTO `cate` VALUES ('43', '海胆', '5', '5,43', '1');
INSERT INTO `cate` VALUES ('44', '中式早餐', '6', '6,44', '1');
INSERT INTO `cate` VALUES ('45', '西式早餐', '6', '6,45', '1');
INSERT INTO `cate` VALUES ('46', '特色面点', '6', '6,46', '1');
INSERT INTO `cate` VALUES ('47', '蛋糕', '6', '6.47', '1');
INSERT INTO `cate` VALUES ('48', '坚果和干果', '7', '7,48', '1');
INSERT INTO `cate` VALUES ('49', '糕点饼干', '7', '7,49', '1');
INSERT INTO `cate` VALUES ('50', '糖果和巧克力', '7', '7,50', '1');
INSERT INTO `cate` VALUES ('51', '肉干海苔', '7', '7,51', '1');
INSERT INTO `cate` VALUES ('52', '蔬果干类', '7', '7,52', '1');
INSERT INTO `cate` VALUES ('53', '蜜饯类', '7', '7,53', '1');
INSERT INTO `cate` VALUES ('54', '零嘴小吃', '7', '7,54', '1');
INSERT INTO `cate` VALUES ('55', '豆干', '7', '7,55', '1');
INSERT INTO `cate` VALUES ('56', '果汁和软饮', '8', '8,56', '1');
INSERT INTO `cate` VALUES ('57', '风味饮品', '8', '8,57', '1');
INSERT INTO `cate` VALUES ('58', '葡萄酒', '8', '8,58', '1');
INSERT INTO `cate` VALUES ('59', '健康醋饮', '8', '8,59', '1');
INSERT INTO `cate` VALUES ('60', '精酿啤酒', '8', '8,60', '1');
INSERT INTO `cate` VALUES ('61', '清酒和果酒', '8', '8,61', '1');
INSERT INTO `cate` VALUES ('62', '咖啡和茶', '8', '8,62', '1');
INSERT INTO `cate` VALUES ('63', '冲调类', '8', '8,63', '1');
INSERT INTO `cate` VALUES ('64', '水', '8', '8,64', '1');
INSERT INTO `cate` VALUES ('65', '米面杂粮', '9', '9,65', '1');
INSERT INTO `cate` VALUES ('66', '南北干货', '9', '9,66', '1');
INSERT INTO `cate` VALUES ('67', '欣和酱醋', '9', '9,67', '1');
INSERT INTO `cate` VALUES ('68', '食用油', '9', '9,68', '1');
INSERT INTO `cate` VALUES ('69', '调味品', '9', '9,69', '1');
INSERT INTO `cate` VALUES ('70', '个人洗护', '10', '10.70', '1');
INSERT INTO `cate` VALUES ('71', '家居清洁', '10', '10,71', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '生态种植黄豆芽', '10.00', '8', '0', '20', '10', '1506341194', '1506341194', '', '豆芽', '', '', '1', '', '', '0');
INSERT INTO `goods` VALUES ('2', '泰国椰青', '32.00', '12', '0', '23', '', '1506341207', '1506341207', '', '32', '', '', '2', '', '', '0');
INSERT INTO `goods` VALUES ('8', '33', '66.00', '77', '1', '77', '77', '1506341128', '1506341128', '', '33', '', '', '3', '', '', '0');
INSERT INTO `goods` VALUES ('4', '65', '56.00', '56', '1', '65', '65', '1506063802', '0', '', '56', '65', '', '4', '', '', '0');
INSERT INTO `goods` VALUES ('5', '444', '44.00', '44', '1', '33', '11', '1506080700', '0', '', '44', '', '', '3', '', '', '0');
INSERT INTO `goods` VALUES ('6', '99', '99.00', '99', '1', '99', '99', '1506080837', '0', '', '999', '99', '', '5', '', '', '0');
INSERT INTO `goods` VALUES ('7', 'ooo', '0.00', '087', '1', '77', '78', '1506081182', '0', '', 'oo', '77', '<p>77</p>', '4', '', '', '0');
INSERT INTO `goods` VALUES ('9', '4444', '22.00', '22', '1', '22', '22', '1506333954', '0', '', '44', '22', '', '6', '', '', '0');
INSERT INTO `goods` VALUES ('10', 'sdfdsf', '0.00', 'fsf', '0', 'fsfds', 'fsfs', '1506334017', '0', '', 'fsfs', 'fsfd', '', '6', '', '', '0');
INSERT INTO `goods` VALUES ('11', '3423', '3232.00', '323', '1', '323', '323', '1506336321', '0', '', '3232', '3232', '', '7', '', '', '0');
INSERT INTO `goods` VALUES ('12', '343423423', '323.00', '34', '1', '343', '434', '1506336786', '0', '', '432423', '434', '', '8', '', '', '0');
INSERT INTO `goods` VALUES ('13', '900', '9.00', '09', '0', '090', '09', '1506337817', '0', '', '09', '09', '', '6', '', '', '0');
INSERT INTO `goods` VALUES ('15', '11', '33.00', '33', '0', '33', '33', '1506395229', '1506395229', '', '22', '', '', '9', '', '', '0');
INSERT INTO `goods` VALUES ('14', 'sldja', '1.00', '1', '1', '1', '1', '1506340070', '1506340070', '', '007', '1', '', '9', '', '', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('2', '111', '310dcbbf4cce62f762a2aaa148d556bd', '1506079781', '1', '', '0');
INSERT INTO `manager` VALUES ('3', '33', '33', '0', '0', '', '0');
INSERT INTO `manager` VALUES ('4', 'qqqq', '81dc9bdb52d04dc20036dbd8313ed055', '1506397621', '0', '', '1506397621');

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
