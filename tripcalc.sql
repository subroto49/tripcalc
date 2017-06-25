-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: tripcalc
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `trip_contacts`
--

DROP TABLE IF EXISTS `trip_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_contacts` (
  `contactid` bigint(20) NOT NULL AUTO_INCREMENT,
  `contactname` varchar(100) DEFAULT NULL,
  `contactemail` varchar(150) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `dateadded` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alias` enum('friend','me') NOT NULL,
  PRIMARY KEY (`contactid`),
  KEY `idx_user` (`userid`) USING BTREE,
  KEY `idx_contact` (`contactid`) USING BTREE,
  KEY `idx_name` (`contactname`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_contacts`
--

LOCK TABLES `trip_contacts` WRITE;
/*!40000 ALTER TABLE `trip_contacts` DISABLE KEYS */;
INSERT INTO `trip_contacts` VALUES (1,'Subroto\r\n','subroto.mahindar@gmail.com',1,'2017-06-25 18:55:12','me'),(2,'Gayatri','gvartak@gmail.com',1,'2017-06-17 15:44:05','friend'),(3,'Pratik','',1,'2017-06-17 15:44:08','friend');
/*!40000 ALTER TABLE `trip_contacts` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `trip_menu` VALUES (1,'Login','/',1,'2017-04-17 06:37:59','register',1,0),(2,'Register','/register-yourself',1,'2017-04-17 06:38:11','login',1,0),(3,'Trip','#',1,'2017-04-17 07:45:44','user',1,0),(4,'New Trip','/create-a-new-trip',1,'2017-04-17 07:46:26','user',1,3),(5,'Current Trip','/go-to-current-trip',1,'2017-04-17 07:46:44','user',2,3),(6,'Old Trips','/get-a-view-of-old-trips',1,'2017-04-17 07:47:00','user',3,3),(7,'Friends List','/add-members',1,'2017-04-17 07:48:16','user',2,0),(8,'Logout','/logout',1,'2017-04-18 04:54:13','user',100,0);
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
INSERT INTO `trip_site_settings` VALUES (1,'site_title','Trip Calculator'),(2,'brandname','Trip Expense Calculator');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_user`
--

LOCK TABLES `trip_user` WRITE;
/*!40000 ALTER TABLE `trip_user` DISABLE KEYS */;
INSERT INTO `trip_user` VALUES (1,'subroto49','$2y$15$cnFmcF4lZWl6e0tMVVl9S.QBcAW6cIdlGOCAdbkq.6kkabSYVanfW','rqfp^%eiz{KLUY}H0rcQ&{R5RtGm93','subroto.mahindar@gmail.com',1,'2017-03-25 21:07:50'),(2,'subroto50','$2y$15$ZnlyVEljYkBmQVBkXTRSNuKtexGU2O492BohIUU6C2Te2dOi2Qq5S','fyrTIcb@fAPd]4R7w&xxBRHHNBsn$%','subroto.mahindar@gmail.com',1,'2017-03-25 21:09:06'),(3,'subroto48','$2y$15$M1ZANGdxWHBXd1RFb1UyYuvHc8A/igDQjmti4pzUiOh41XQZt//Ba','3V@4gqXpWwTEoU2c*EAbgAz[iYZKKj','subroto.mahindar@gmail.com',1,'2017-03-25 21:13:36'),(4,'Subroto30','$2y$15$Y317TzRoajNaTmh3KnA3U.0GR.4G4pbh28GZ/NJTCXYJ.LR5rg3VG','c}{O4hj3ZNhw*p7Pq$GbFq#NBrQHO1','Subroto.mahindar@gmail.com',1,'2017-06-01 22:14:08');
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
INSERT INTO `trip_user_login` VALUES (1,'MV9YcW1zY1BuTUFHMkJKKjJMJGt1bGFGVWRU','2017-04-10 18:52:35'),(1,'MV9uJGZ6a102MipESEIyQGVdVFVANVpNMkBB','2017-06-04 14:09:09'),(1,'MV8kWU9UXU1SSGtRaTFnNnojV3I5QXdOdVJj','2017-06-04 14:19:10'),(1,'MV9VblFKbVhPVWVpZElOQWNSdiU5Z1FrMlFn','2017-06-10 18:17:41'),(1,'MV9ac104YWRjaWRYantkOGdZQHdDKnRLOV5G','2017-06-10 20:01:39'),(1,'MV9ZTHdUIWwydGpTfWJzeXFoNHhWcUtib1Qq','2017-06-13 18:55:46'),(1,'MV9qS3Z7Y2Z9b1tMWkVzbHlRSl0hdXQ3eFQq','2017-06-13 19:51:20'),(1,'MV9FMHVkZTN6ZEVEYzduVnsxU0xXREF5Y1RA','2017-06-15 19:07:30'),(1,'MV9DTjQqQ3NeR1pYZlo0TGpjbDgqRzgqR0NM','2017-06-15 19:32:07'),(1,'MV82Mml6ISM5TEpNWzFRWiUhW3NBI1ZWWmoq','2017-06-16 19:05:18'),(1,'MV9wMHt4M0hwTGpjT1lRNXYzSmJEKk9VQUlh','2017-06-16 19:12:43'),(1,'MV9AaiZVJm5YNSFOQ1swWGRRZlBzXVlYZzJN','2017-06-17 10:40:35'),(1,'MV82a0Y1Mk1XJkkqd0VpaFJXWzlyW2dRSFt9','2017-06-17 10:48:57'),(1,'MV9YZW5CJiRPUVVHYTR1eENEempkSDRlKmdT','2017-06-17 15:02:05'),(1,'MV9INzlPWjlqbzRzU3NxN3NYbltFNTJpNmI3','2017-06-17 15:51:26'),(1,'MV9Lb0JKbzk4YjZZd1o3aXhoNlVJeGxmJTZ0','2017-06-18 14:10:48'),(1,'MV81XiRdam5jVEVTNTckVHB2VXlkRTl5b1p5','2017-06-25 18:30:22'),(1,'MV9JI1gkNCVITW1kR0wwM2V7dm94ZGpzWHVT','2017-06-25 19:37:35');
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

-- Dump completed on 2017-06-26  1:17:09
