-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: tripcalc
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

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

--
-- Table structure for table `trip_menu`
--

DROP TABLE IF EXISTS `trip_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(50) NOT NULL,
  `menuurl` varchar(100) NOT NULL,
  `menustatus` tinyint(4) NOT NULL DEFAULT '1',
  `menuadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `menuaccess` enum('login','register','user') NOT NULL,
  `menuposition` int(11) NOT NULL,
  `menuparent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`),
  KEY `menustatus` (`menustatus`,`menuaccess`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_menu`
--

LOCK TABLES `trip_menu` WRITE;
/*!40000 ALTER TABLE `trip_menu` DISABLE KEYS */;
INSERT INTO `trip_menu` VALUES (1,'Login','/',1,'2017-04-17 12:07:59','register',1,0),(2,'Register','/register-yourself',1,'2017-04-17 12:08:11','login',1,0),(3,'Trip','#',1,'2017-04-17 13:15:44','user',1,0),(4,'New Trip','/create-a-new-trip',1,'2017-04-17 13:16:26','user',1,3),(5,'Current Trip','/go-to-current-trip',1,'2017-04-17 13:16:44','user',2,3),(6,'Old Trips','/get-a-view-of-old-trips',1,'2017-04-17 13:17:00','user',3,3),(7,'Members List','/add-members',1,'2017-04-17 13:18:16','user',2,0),(8,'Logout','/logout',1,'2017-04-18 10:24:13','user',100,0);
/*!40000 ALTER TABLE `trip_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_site_settings`
--

DROP TABLE IF EXISTS `trip_site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `itemvalue` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_site_settings`
--

LOCK TABLES `trip_site_settings` WRITE;
/*!40000 ALTER TABLE `trip_site_settings` DISABLE KEYS */;
INSERT INTO `trip_site_settings` VALUES (1,'site_title','Trip Calculator'),(2,'brandname','Test');
/*!40000 ALTER TABLE `trip_site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_user`
--

DROP TABLE IF EXISTS `trip_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_user`
--

LOCK TABLES `trip_user` WRITE;
/*!40000 ALTER TABLE `trip_user` DISABLE KEYS */;
INSERT INTO `trip_user` VALUES (1,'subroto49','$2y$15$cnFmcF4lZWl6e0tMVVl9S.QBcAW6cIdlGOCAdbkq.6kkabSYVanfW','rqfp^%eiz{KLUY}H0rcQ&{R5RtGm93','subroto.mahindar@gmail.com',1,'2017-03-25 21:07:50'),(2,'subroto50','$2y$15$ZnlyVEljYkBmQVBkXTRSNuKtexGU2O492BohIUU6C2Te2dOi2Qq5S','fyrTIcb@fAPd]4R7w&xxBRHHNBsn$%','subroto.mahindar@gmail.com',1,'2017-03-25 21:09:06'),(3,'subroto48','$2y$15$M1ZANGdxWHBXd1RFb1UyYuvHc8A/igDQjmti4pzUiOh41XQZt//Ba','3V@4gqXpWwTEoU2c*EAbgAz[iYZKKj','subroto.mahindar@gmail.com',1,'2017-03-25 21:13:36');
/*!40000 ALTER TABLE `trip_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_user_login`
--

DROP TABLE IF EXISTS `trip_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_user_login` (
  `userid` int(11) NOT NULL,
  `login_token` varchar(50) NOT NULL,
  `login_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_user` (`userid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_user_login`
--

LOCK TABLES `trip_user_login` WRITE;
/*!40000 ALTER TABLE `trip_user_login` DISABLE KEYS */;
INSERT INTO `trip_user_login` VALUES (1,'MV9kJXgxcUgxaDVBbkBuW2xMalo0OGImJTVx','2017-04-17 12:54:46'),(1,'MV9FbUU3SXFMengqTmVPcmN1NSpQbXg4IW9s','2017-04-18 10:46:47'),(1,'MV9jVWVIWzJ5VWdAc0FXU25XS3FQd31uUVsq','2017-04-19 11:13:11'),(1,'MV8zUG9oIzh1WTM4U0RxM3JQU0JUck5uc0hu','2017-04-19 12:26:11'),(1,'MV9hNVNxIWwlbltLSWJLWUZhIWRsUVhxdlta','2017-04-20 09:06:01'),(1,'MV9FQEJTVzRkNDJUTmVUQUAxbFdtJntXJk1w','2017-04-20 11:36:00');
/*!40000 ALTER TABLE `trip_user_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-20 18:50:11
