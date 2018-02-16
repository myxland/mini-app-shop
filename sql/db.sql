# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.33.21 (MySQL 5.7.17-0ubuntu0.16.04.1-log)
# Database: mini-app-shop
# Generation Time: 2018-02-16 13:31:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL DEFAULT '' COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT 'Banner描述',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态-1表示删除，1表示显示,0表示隐藏',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `position_key` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;

INSERT INTO `banner` (`id`, `position`, `description`, `status`, `create_time`, `update_time`)
VALUES
	(1,'index_top','首页轮播图',1,NULL,NULL);

/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table banner_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banner_item`;

CREATE TABLE `banner_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL COMMENT '外键，关联banner表',
  `img_id` int(11) NOT NULL COMMENT '外键，关联image表',
  `keyword` varchar(100) NOT NULL DEFAULT '' COMMENT '执行关键字，根据不同的type含义不同(商品id号、专题号等）',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `status` tinyint(4) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';

LOCK TABLES `banner_item` WRITE;
/*!40000 ALTER TABLE `banner_item` DISABLE KEYS */;

INSERT INTO `banner_item` (`id`, `banner_id`, `img_id`, `keyword`, `type`, `status`, `create_time`, `update_time`)
VALUES
	(1,1,65,'6',1,NULL,NULL,NULL),
	(2,1,2,'25',1,NULL,NULL,NULL),
	(3,1,3,'11',1,NULL,NULL,NULL),
	(5,1,1,'10',1,NULL,NULL,NULL);

/*!40000 ALTER TABLE `banner_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `topic_img_id` int(11) DEFAULT NULL COMMENT '外键，关联image表',
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `status` tinyint(11) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品类目';

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `topic_img_id`, `description`, `status`, `create_time`, `update_time`)
VALUES
	(2,'果味',6,NULL,NULL,NULL,NULL),
	(3,'蔬菜',5,NULL,NULL,NULL,NULL),
	(4,'炒货',7,NULL,NULL,NULL,NULL),
	(5,'点心',4,NULL,NULL,NULL,NULL),
	(6,'粗茶',8,NULL,NULL,NULL,NULL),
	(7,'淡饭',9,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '图片路径',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 来自本地，2 来自公网',
  `status` tinyint(11) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='图片总表';

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;

INSERT INTO `image` (`id`, `url`, `from`, `status`, `create_time`, `update_time`)
VALUES
	(1,'/banner-1a.png',1,NULL,NULL,NULL),
	(2,'/banner-2a.png',1,NULL,NULL,NULL),
	(3,'/banner-3a.png',1,NULL,NULL,NULL),
	(4,'/category-cake.png',1,NULL,NULL,NULL),
	(5,'/category-vg.png',1,NULL,NULL,NULL),
	(6,'/category-dryfruit.png',1,NULL,NULL,NULL),
	(7,'/category-fry-a.png',1,NULL,NULL,NULL),
	(8,'/category-tea.png',1,NULL,NULL,NULL),
	(9,'/category-rice.png',1,NULL,NULL,NULL),
	(10,'/product-dryfruit@1.png',1,NULL,NULL,NULL),
	(13,'/product-vg@1.png',1,NULL,NULL,NULL),
	(14,'/product-rice@6.png',1,NULL,NULL,NULL),
	(16,'/1@theme.png',1,NULL,NULL,NULL),
	(17,'/2@theme.png',1,NULL,NULL,NULL),
	(18,'/3@theme.png',1,NULL,NULL,NULL),
	(19,'/detail-1@1-dryfruit.png',1,NULL,NULL,NULL),
	(20,'/detail-2@1-dryfruit.png',1,NULL,NULL,NULL),
	(21,'/detail-3@1-dryfruit.png',1,NULL,NULL,NULL),
	(22,'/detail-4@1-dryfruit.png',1,NULL,NULL,NULL),
	(23,'/detail-5@1-dryfruit.png',1,NULL,NULL,NULL),
	(24,'/detail-6@1-dryfruit.png',1,NULL,NULL,NULL),
	(25,'/detail-7@1-dryfruit.png',1,NULL,NULL,NULL),
	(26,'/detail-8@1-dryfruit.png',1,NULL,NULL,NULL),
	(27,'/detail-9@1-dryfruit.png',1,NULL,NULL,NULL),
	(28,'/detail-11@1-dryfruit.png',1,NULL,NULL,NULL),
	(29,'/detail-10@1-dryfruit.png',1,NULL,NULL,NULL),
	(31,'/product-rice@1.png',1,NULL,NULL,NULL),
	(32,'/product-tea@1.png',1,NULL,NULL,NULL),
	(33,'/product-dryfruit@2.png',1,NULL,NULL,NULL),
	(36,'/product-dryfruit@3.png',1,NULL,NULL,NULL),
	(37,'/product-dryfruit@4.png',1,NULL,NULL,NULL),
	(38,'/product-dryfruit@5.png',1,NULL,NULL,NULL),
	(39,'/product-dryfruit-a@6.png',1,NULL,NULL,NULL),
	(40,'/product-dryfruit@7.png',1,NULL,NULL,NULL),
	(41,'/product-rice@2.png',1,NULL,NULL,NULL),
	(42,'/product-rice@3.png',1,NULL,NULL,NULL),
	(43,'/product-rice@4.png',1,NULL,NULL,NULL),
	(44,'/product-fry@1.png',1,NULL,NULL,NULL),
	(45,'/product-fry@2.png',1,NULL,NULL,NULL),
	(46,'/product-fry@3.png',1,NULL,NULL,NULL),
	(47,'/product-tea@2.png',1,NULL,NULL,NULL),
	(48,'/product-tea@3.png',1,NULL,NULL,NULL),
	(49,'/1@theme-head.png',1,NULL,NULL,NULL),
	(50,'/2@theme-head.png',1,NULL,NULL,NULL),
	(51,'/3@theme-head.png',1,NULL,NULL,NULL),
	(52,'/product-cake@1.png',1,NULL,NULL,NULL),
	(53,'/product-cake@2.png',1,NULL,NULL,NULL),
	(54,'/product-cake-a@3.png',1,NULL,NULL,NULL),
	(55,'/product-cake-a@4.png',1,NULL,NULL,NULL),
	(56,'/product-dryfruit@8.png',1,NULL,NULL,NULL),
	(57,'/product-fry@4.png',1,NULL,NULL,NULL),
	(58,'/product-fry@5.png',1,NULL,NULL,NULL),
	(59,'/product-rice@5.png',1,NULL,NULL,NULL),
	(60,'/product-rice@7.png',1,NULL,NULL,NULL),
	(62,'/detail-12@1-dryfruit.png',1,NULL,NULL,NULL),
	(63,'/detail-13@1-dryfruit.png',1,NULL,NULL,NULL),
	(65,'/banner-4a.png',1,NULL,NULL,NULL),
	(66,'/product-vg@4.png',1,NULL,NULL,NULL),
	(67,'/product-vg@5.png',1,NULL,NULL,NULL),
	(68,'/product-vg@2.png',1,NULL,NULL,NULL),
	(69,'/product-vg@3.png',1,NULL,NULL,NULL);

/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '外键，用户id，注意并不是openid',
  `delete_time` int(11) DEFAULT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:未支付， 2：已支付，3：已发货 , 4: 已支付，但库存不足',
  `snap_img` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL COMMENT '订单快照名称',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `snap_items` text COMMENT '订单其他信息快照（json)',
  `snap_address` varchar(500) DEFAULT NULL COMMENT '地址快照',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table order_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_product`;

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL COMMENT '联合主键，订单id',
  `product_id` int(11) NOT NULL COMMENT '联合主键，商品id',
  `count` int(11) NOT NULL COMMENT '商品数量',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '商品名称',
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL COMMENT '价格,单位：分',
  `stock` int(11) NOT NULL DEFAULT '0' COMMENT '库存量',
  `status` tinyint(11) DEFAULT NULL,
  `main_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `img_id` int(11) DEFAULT NULL COMMENT '图片外键',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '图片来自 1 本地 ，2公网',
  `summary` varchar(50) DEFAULT NULL COMMENT '摘要',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `stock`, `status`, `main_img_url`, `img_id`, `from`, `summary`, `create_time`, `update_time`)
VALUES
	(1,'芹菜 半斤',3,0.01,998,NULL,'/product-vg@1.png',13,1,NULL,NULL,NULL),
	(2,'梨花带雨 3个',2,0.01,984,NULL,'/product-dryfruit@1.png',10,1,NULL,NULL,NULL),
	(3,'素米 327克',7,0.01,996,NULL,'/product-rice@1.png',31,1,NULL,NULL,NULL),
	(4,'红袖枸杞 6克*3袋',6,0.01,998,NULL,'/product-tea@1.png',32,1,NULL,NULL,NULL),
	(5,'春生龙眼 500克',2,0.01,995,NULL,'/product-dryfruit@2.png',33,1,NULL,NULL,NULL),
	(6,'小红的猪耳朵 120克',5,0.01,997,NULL,'/product-cake@2.png',53,1,NULL,NULL,NULL),
	(7,'泥蒿 半斤',3,0.01,998,NULL,'/product-vg@2.png',68,1,NULL,NULL,NULL),
	(8,'夏日芒果 3个',2,0.01,995,NULL,'/product-dryfruit@3.png',36,1,NULL,NULL,NULL),
	(9,'冬木红枣 500克',2,0.01,996,NULL,'/product-dryfruit@4.png',37,1,NULL,NULL,NULL),
	(10,'万紫千凤梨 300克',2,0.01,996,NULL,'/product-dryfruit@5.png',38,1,NULL,NULL,NULL),
	(11,'贵妃笑 100克',2,0.01,994,NULL,'/product-dryfruit-a@6.png',39,1,NULL,NULL,NULL),
	(12,'珍奇异果 3个',2,0.01,999,NULL,'/product-dryfruit@7.png',40,1,NULL,NULL,NULL),
	(13,'绿豆 125克',7,0.01,999,NULL,'/product-rice@2.png',41,1,NULL,NULL,NULL),
	(14,'芝麻 50克',7,0.01,999,NULL,'/product-rice@3.png',42,1,NULL,NULL,NULL),
	(15,'猴头菇 370克',7,0.01,999,NULL,'/product-rice@4.png',43,1,NULL,NULL,NULL),
	(16,'西红柿 1斤',3,0.01,999,NULL,'/product-vg@3.png',69,1,NULL,NULL,NULL),
	(17,'油炸花生 300克',4,0.01,999,NULL,'/product-fry@1.png',44,1,NULL,NULL,NULL),
	(18,'春泥西瓜子 128克',4,0.01,997,NULL,'/product-fry@2.png',45,1,NULL,NULL,NULL),
	(19,'碧水葵花籽 128克',4,0.01,999,NULL,'/product-fry@3.png',46,1,NULL,NULL,NULL),
	(20,'碧螺春 12克*3袋',6,0.01,999,NULL,'/product-tea@2.png',47,1,NULL,NULL,NULL),
	(21,'西湖龙井 8克*3袋',6,0.01,998,NULL,'/product-tea@3.png',48,1,NULL,NULL,NULL),
	(22,'梅兰清花糕 1个',5,0.01,997,NULL,'/product-cake-a@3.png',54,1,NULL,NULL,NULL),
	(23,'清凉薄荷糕 1个',5,0.01,998,NULL,'/product-cake-a@4.png',55,1,NULL,NULL,NULL),
	(25,'小明的妙脆角 120克',5,0.01,999,NULL,'/product-cake@1.png',52,1,NULL,NULL,NULL),
	(26,'红衣青瓜 混搭160克',2,0.01,999,NULL,'/product-dryfruit@8.png',56,1,NULL,NULL,NULL),
	(27,'锈色瓜子 100克',4,0.01,998,NULL,'/product-fry@4.png',57,1,NULL,NULL,NULL),
	(28,'春泥花生 200克',4,0.01,999,NULL,'/product-fry@5.png',58,1,NULL,NULL,NULL),
	(29,'冰心鸡蛋 2个',7,0.01,999,NULL,'/product-rice@5.png',59,1,NULL,NULL,NULL),
	(30,'八宝莲子 200克',7,0.01,999,NULL,'/product-rice@6.png',14,1,NULL,NULL,NULL),
	(31,'深涧木耳 78克',7,0.01,999,NULL,'/product-rice@7.png',60,1,NULL,NULL,NULL),
	(32,'土豆 半斤',3,0.01,999,NULL,'/product-vg@4.png',66,1,NULL,NULL,NULL),
	(33,'青椒 半斤',3,0.01,999,NULL,'/product-vg@5.png',67,1,NULL,NULL,NULL);

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_image`;

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联图片表',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '图片排序序号',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  `create_time` int(11) DEFAULT NULL COMMENT '状态，主要表示是否删除，也可以扩展其他状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;

INSERT INTO `product_image` (`id`, `img_id`, `order`, `product_id`, `create_time`)
VALUES
	(4,19,1,7,NULL),
	(5,20,2,11,NULL),
	(6,21,3,11,NULL),
	(7,22,4,11,NULL),
	(8,23,5,11,NULL),
	(9,24,6,11,NULL),
	(10,25,7,11,NULL),
	(11,26,8,11,NULL),
	(12,27,9,11,NULL),
	(13,28,11,11,NULL),
	(14,29,10,11,NULL),
	(18,62,12,11,NULL),
	(19,63,13,11,NULL);

/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_property
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_property`;

CREATE TABLE `product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT '' COMMENT '详情属性名称',
  `detail` varchar(255) NOT NULL COMMENT '详情属性',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `product_property` WRITE;
/*!40000 ALTER TABLE `product_property` DISABLE KEYS */;

INSERT INTO `product_property` (`id`, `name`, `detail`, `product_id`, `create_time`, `update_time`)
VALUES
	(1,'品名','杨梅',11,NULL,NULL),
	(2,'口味','青梅味 雪梨味 黄桃味 菠萝味',11,NULL,NULL),
	(3,'产地','火星',11,NULL,NULL),
	(4,'保质期','180天',11,NULL,NULL),
	(5,'品名','梨子',7,NULL,NULL),
	(6,'产地','金星',2,NULL,NULL),
	(7,'净含量','100g',2,NULL,NULL),
	(8,'保质期','10天',2,NULL,NULL);

/*!40000 ALTER TABLE `product_property` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table theme
# ------------------------------------------------------------

DROP TABLE IF EXISTS `theme`;

CREATE TABLE `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '专题名称',
  `description` varchar(255) DEFAULT NULL COMMENT '专题描述',
  `topic_img_id` int(11) NOT NULL COMMENT '主题图，外键',
  `head_img_id` int(11) NOT NULL COMMENT '专题列表页，头图',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主题信息表';

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;

INSERT INTO `theme` (`id`, `name`, `description`, `topic_img_id`, `head_img_id`, `create_time`, `update_time`)
VALUES
	(1,'专题栏位一','美味水果世界',16,49,NULL,NULL),
	(2,'专题栏位二','新品推荐',17,50,NULL,NULL),
	(3,'专题栏位三','做个干物女',18,18,NULL,NULL);

/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table theme_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `theme_product`;

CREATE TABLE `theme_product` (
  `theme_id` int(11) NOT NULL COMMENT '主题外键',
  `product_id` int(11) NOT NULL COMMENT '商品外键',
  PRIMARY KEY (`theme_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主题所包含的商品';

LOCK TABLES `theme_product` WRITE;
/*!40000 ALTER TABLE `theme_product` DISABLE KEYS */;

INSERT INTO `theme_product` (`theme_id`, `product_id`)
VALUES
	(1,5),
	(1,8),
	(1,10),
	(1,12),
	(2,1),
	(2,2),
	(2,3),
	(2,5),
	(2,6),
	(2,16),
	(2,33),
	(3,15),
	(3,18),
	(3,19),
	(3,27),
	(3,30),
	(3,31);

/*!40000 ALTER TABLE `theme_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table third_app
# ------------------------------------------------------------

DROP TABLE IF EXISTS `third_app`;

CREATE TABLE `third_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(64) NOT NULL COMMENT '应用app_id',
  `app_secret` varchar(64) NOT NULL COMMENT '应用secret',
  `app_description` varchar(100) DEFAULT NULL COMMENT '应用程序描述',
  `scope` varchar(20) NOT NULL COMMENT '应用权限',
  `scope_description` varchar(100) DEFAULT NULL COMMENT '权限描述',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='访问API的各应用账号密码表';

LOCK TABLES `third_app` WRITE;
/*!40000 ALTER TABLE `third_app` DISABLE KEYS */;

INSERT INTO `third_app` (`id`, `app_id`, `app_secret`, `app_description`, `scope`, `scope_description`, `create_time`, `update_time`)
VALUES
	(1,'starcraft','777*777','CMS','32','Super',NULL,NULL);

/*!40000 ALTER TABLE `third_app` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `extend` varchar(255) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table user_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_address`;

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `user_id` int(11) NOT NULL COMMENT '外键',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;