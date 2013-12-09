/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : pcsale

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-12-09 15:39:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES ('1', 'toeurng', 'chanthai', '012900800', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('2', 'ka', 'dara', '089456900', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('3', 'keov', 'sopeaktra', '012549744', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('4', 'sin', 'sophy', '015810367', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('5', 'mey', 'chanthy', '077953739', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('6', 'sern', 'visoth', '015810367', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('7', 'muth', 'chakriya', '077953739', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('8', 'noun', 'ny', '0178422907', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('9', 'vung', 'chan', '012752243', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('10', 'heng', 'lykhena', '092725472', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('11', 'sim', 'sokleap', '092725473', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('12', 'bu', 'satthya', '0977892456', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('13', 'phan', 'nary', '089461575', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('14', 'prom', 'saren', '092497273', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('15', 'leng', 'bunchoeun', '0977757985', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('16', 'hean', 'rothanak', '012315318', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('17', 'som', 'kheda', '092587418', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('18', 'phan', 'ryna', '0889831787', 'siem reap');
INSERT INTO `tbl_customer` VALUES ('19', 'si', 'kunthea', '12731195', 'siem reap');

-- ----------------------------
-- Table structure for tbl_model
-- ----------------------------
DROP TABLE IF EXISTS `tbl_model`;
CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_model
-- ----------------------------
INSERT INTO `tbl_model` VALUES ('1', 'dell');
INSERT INTO `tbl_model` VALUES ('2', 'acer');
INSERT INTO `tbl_model` VALUES ('3', 'hp');
INSERT INTO `tbl_model` VALUES ('4', 'apple');
INSERT INTO `tbl_model` VALUES ('5', 'asus');
INSERT INTO `tbl_model` VALUES ('6', 'compag');
INSERT INTO `tbl_model` VALUES ('7', 'lenovo');

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `model_id` FOREIGN KEY (`model_id`) REFERENCES `tbl_model` (`model_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('1', '1', 'dell inspiron 4030', '5', '400');
INSERT INTO `tbl_product` VALUES ('2', '1', 'dell inspiron 4010', '5', '505');
INSERT INTO `tbl_product` VALUES ('3', '1', 'dell inspiron 4050', '5', '600');
INSERT INTO `tbl_product` VALUES ('4', '1', 'dell inspiron 3420', '5', '545');
INSERT INTO `tbl_product` VALUES ('5', '1', 'dell inspiron 3421', '5', '580');
INSERT INTO `tbl_product` VALUES ('6', '1', 'dell inspiron 3521', '5', '509');
INSERT INTO `tbl_product` VALUES ('7', '1', 'dell inspiron 5420', '5', '550');
INSERT INTO `tbl_product` VALUES ('8', '1', 'dell inspiron 5421', '5', '555');
INSERT INTO `tbl_product` VALUES ('9', '2', 'acer aOD257', '5', '279');
INSERT INTO `tbl_product` VALUES ('10', '2', 'acer aspire e1 531', '5', '345');
INSERT INTO `tbl_product` VALUES ('11', '2', 'acer aspire e1-471', '5', '385');
INSERT INTO `tbl_product` VALUES ('12', '2', 'acer timeline 4830', '5', '450');
INSERT INTO `tbl_product` VALUES ('13', '2', 'acer v3 471', '5', '440');
INSERT INTO `tbl_product` VALUES ('14', '4', 'macBook pro 13.3', '5', '1148');
INSERT INTO `tbl_product` VALUES ('15', '3', 'HP 450', '5', '520');
INSERT INTO `tbl_product` VALUES ('16', '5', 'asus A43E', '5', '495');
INSERT INTO `tbl_product` VALUES ('17', '5', 'asus eee PC 1225B', '5', '315');
INSERT INTO `tbl_product` VALUES ('18', '5', 'asus k43e', '5', '495');
INSERT INTO `tbl_product` VALUES ('19', '5', 'asus k45A', '5', '475');

-- ----------------------------
-- Table structure for tbl_sale
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sale`;
CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_price` double NOT NULL,
  `sale_quantity` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `product_id` (`product_id`) USING BTREE,
  KEY `customer_id` (`customer_id`) USING BTREE,
  KEY `checked_by` (`checked_by`) USING BTREE,
  CONSTRAINT `checked_by` FOREIGN KEY (`checked_by`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON UPDATE CASCADE,
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sale
-- ----------------------------
INSERT INTO `tbl_sale` VALUES ('1', '1', '1', '2013-12-08', '400', '1', '2013-12-09', '2');
INSERT INTO `tbl_sale` VALUES ('2', '3', '5', '2013-12-08', '600', '1', '2013-12-10', '2');
INSERT INTO `tbl_sale` VALUES ('3', '9', '1', '2013-12-09', '279', '1', '2013-12-09', '1');
INSERT INTO `tbl_sale` VALUES ('4', '7', '9', '2013-12-09', '550', '1', null, null);
INSERT INTO `tbl_sale` VALUES ('5', '14', '2', '2013-12-09', '1148', '1', null, null);
INSERT INTO `tbl_sale` VALUES ('6', '19', '9', '2013-12-12', '475', '1', null, null);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'admin', 'admin', 'admin');
INSERT INTO `tbl_user` VALUES ('2', 'dara', '123', 'user');
INSERT INTO `tbl_user` VALUES ('3', 'sokha', '12345', 'user');
INSERT INTO `tbl_user` VALUES ('4', 'dany', '12', 'user');
INSERT INTO `tbl_user` VALUES ('5', 'seyhana', '1234', 'user');
INSERT INTO `tbl_user` VALUES ('6', 'pheakdey', '123', 'admin');
