/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : hospital

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2022-12-31 15:04:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(21) NOT NULL,
  `doc_phone` varchar(11) NOT NULL,
  `pat_name` varchar(21) NOT NULL,
  `pat_phone` varchar(11) NOT NULL,
  `symptom` varchar(50) NOT NULL,
  `booking_time` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('24', '测试医生1', '13777777777', '患者1', '13888888888', '感冒', '2022-12-31 08:35:27', '0');
INSERT INTO `booking` VALUES ('29', '测试医生1', '13777777777', '测试', '13888888888', '<script>alert(1)</script>', '2022-12-31 14:33:16', '0');
INSERT INTO `booking` VALUES ('15', '测试医生1', '13777777777', 'xxxxx', '13888888888', '新馆', '2022-12-28 12:57:17', '3');
INSERT INTO `booking` VALUES ('28', '测试医生1', '13777777777', '测试', '13999999999', '肚子疼', '2022-12-31 11:41:02', '0');
INSERT INTO `booking` VALUES ('27', '测试医生1', '13777777777', '患者1', '13000000000', '难受', '2022-12-31 11:40:45', '0');

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(21) NOT NULL,
  `idcard` varchar(18) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `department` varchar(21) NOT NULL,
  `expenses` int(2) NOT NULL,
  `introduce` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `headimage` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES ('5', '测试医生1', '123123200303033335', '1', '13777777777', 'xxgnk', '25', '研究生毕业，99篇SCI', '123456', 'doctor/image/1672195171.jpg');
INSERT INTO `doctor` VALUES ('9', '测试', '622827197401172915', '1', '13666666666', 'myk', '10', '本科生毕业，20SCI', 'woshiyisheng', 'doctor/image/default.jpg');

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(21) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `idcard` varchar(18) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `headimage` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of patient
-- ----------------------------
INSERT INTO `patient` VALUES ('1', '测试病人1', '1', '13888888888', '123123200303033336', '陕西省西安市长安区兴隆街道', '123456', 'patient/image/1672446622.jpg');
