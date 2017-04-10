/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tripcalc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-11 01:12:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `trip_site_settings`
-- ----------------------------
DROP TABLE IF EXISTS `trip_site_settings`;
CREATE TABLE `trip_site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `itemvalue` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip_site_settings
-- ----------------------------
INSERT INTO `trip_site_settings` VALUES ('1', 'site_title', 'Trip Calculator');
INSERT INTO `trip_site_settings` VALUES ('2', 'brandname', 'Trip Expense Calculator');

-- ----------------------------
-- Table structure for `trip_user`
-- ----------------------------
DROP TABLE IF EXISTS `trip_user`;
CREATE TABLE `trip_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `salt` varchar(30) CHARACTER SET latin1 NOT NULL,
  `emailaddress` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `idx_username` (`username`) USING BTREE,
  KEY `idx_active` (`active`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip_user
-- ----------------------------
INSERT INTO `trip_user` VALUES ('1', 'subroto49', '$2y$15$cnFmcF4lZWl6e0tMVVl9S.QBcAW6cIdlGOCAdbkq.6kkabSYVanfW', 'rqfp^%eiz{KLUY}H0rcQ&{R5RtGm93', 'subroto.mahindar@gmail.com', '1', '2017-03-25 21:07:50');
INSERT INTO `trip_user` VALUES ('2', 'subroto50', '$2y$15$ZnlyVEljYkBmQVBkXTRSNuKtexGU2O492BohIUU6C2Te2dOi2Qq5S', 'fyrTIcb@fAPd]4R7w&xxBRHHNBsn$%', 'subroto.mahindar@gmail.com', '1', '2017-03-25 21:09:06');
INSERT INTO `trip_user` VALUES ('3', 'subroto48', '$2y$15$M1ZANGdxWHBXd1RFb1UyYuvHc8A/igDQjmti4pzUiOh41XQZt//Ba', '3V@4gqXpWwTEoU2c*EAbgAz[iYZKKj', 'subroto.mahindar@gmail.com', '1', '2017-03-25 21:13:36');

-- ----------------------------
-- Table structure for `trip_user_login`
-- ----------------------------
DROP TABLE IF EXISTS `trip_user_login`;
CREATE TABLE `trip_user_login` (
  `userid` int(11) NOT NULL,
  `login_token` varchar(50) NOT NULL,
  `login_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_user` (`userid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of trip_user_login
-- ----------------------------
INSERT INTO `trip_user_login` VALUES ('1', 'MV9YcW1zY1BuTUFHMkJKKjJMJGt1bGFGVWRU', '2017-04-11 00:22:35');
