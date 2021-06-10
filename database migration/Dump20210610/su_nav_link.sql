-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: su
-- ------------------------------------------------------
-- Server version	5.7.34-0ubuntu0.18.04.1

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
-- Table structure for table `nav_link`
--

DROP TABLE IF EXISTS `nav_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nav_link` (
  `nav_link_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `type` enum('header','footer') NOT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`nav_link_id`),
  KEY `fk_nav_links_1_idx` (`user_id`),
  KEY `fk_nav_links_2_idx` (`updated_by`),
  CONSTRAINT `fk_nav_links_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nav_links_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nav_link`
--

LOCK TABLES `nav_link` WRITE;
/*!40000 ALTER TABLE `nav_link` DISABLE KEYS */;
INSERT INTO `nav_link` VALUES (2,1,'Admissions','&lt;p&gt;asdasd&lt;/p&gt;','header','explore','published','2021-06-06 08:41:09','2021-06-06 11:57:30',13),(3,13,'Academics','&lt;p&gt;sdfsdfsdf&lt;/p&gt;','header','explore','published','2021-06-06 11:01:28','2021-06-06 11:57:10',13),(4,13,'ABOUT','&lt;p&gt;asdasd&lt;/p&gt;','header','explore','published','2021-06-06 11:09:31','2021-06-06 11:56:56',13),(5,13,'International','&lt;p&gt;sdfsdf&lt;/p&gt;','header','explore','published','2021-06-06 11:57:58','2021-06-06 11:57:58',1),(6,13,'Events','&lt;p&gt;afasdf&lt;/p&gt;','header','explore','published','2021-06-06 11:58:16','2021-06-06 11:58:16',1),(7,13,'Contact us','&lt;p&gt;erfsef&lt;/p&gt;','header','explore','published','2021-06-06 11:58:28','2021-06-06 11:58:28',1);
/*!40000 ALTER TABLE `nav_link` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-10 12:16:00
