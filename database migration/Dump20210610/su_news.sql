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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `highlight` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `status` enum('published','unpublished') NOT NULL DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  KEY `fk_news_1_idx` (`user_id`),
  KEY `fk_news_2_idx` (`updated_by`),
  KEY `index4` (`status`),
  CONSTRAINT `fk_news_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (27,1,'Niews Title','Highlight','<p>&lt;h1&gt; hi &lt;/h1&gt;</p>\r\n','published','2021-05-31 19:48:21','2021-06-02 07:15:18',1),(28,1,'1','1','<p>1</p>\r\n','published','2021-05-31 19:49:16','2021-05-31 19:49:16',1),(29,1,'1','1','<p>1</p>\r\n','published','2021-05-31 19:49:23','2021-05-31 19:49:23',1),(30,1,'1','1','<p>1</p>\r\n','published','2021-05-31 19:49:32','2021-05-31 19:49:32',1),(31,1,'1','1','<p>1</p>\r\n','unpublished','2021-05-31 20:17:50','2021-05-31 20:17:50',1),(32,1,'1111dgdfg','1sdfsdf','&lt;p&gt;1&lt;/p&gt;','unpublished','2021-05-31 20:20:46','2021-06-06 06:34:44',1),(34,1,'12','12','<p>12</p>\r\n','unpublished','2021-06-01 08:18:59','2021-06-01 08:18:59',1),(35,1,'df','sdf','<p>sdf</p>\r\n','published','2021-06-01 08:19:06','2021-06-01 08:19:06',1),(36,1,'sdf','sdf','<p>sdf</p>\r\n','published','2021-06-01 08:19:16','2021-06-01 08:19:16',1),(37,1,'1','1','<p>1</p>\r\n','unpublished','2021-06-01 10:02:22','2021-06-01 10:02:22',1),(38,1,'1','1','<p>1</p>\r\n','published','2021-06-01 10:02:37','2021-06-01 10:02:37',1),(39,1,'1','1','<p>1</p>\r\n','published','2021-06-01 10:02:48','2021-06-01 10:02:48',1),(40,1,'New Method Uses Heat Flow To Levitate Variety Of Objects','Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancientâ€¦','<p>1</p>\r\n','published','2021-06-01 10:03:01','2021-06-02 19:52:57',1),(41,1,'Sciences University To Offer Now Undergraduate Major In Creative Writing','The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginningâ€¦','<p>1</p>\r\n','published','2021-06-02 14:41:37','2021-06-02 19:51:44',1),(42,1,'sdfsdfsdfsd','Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancientâ€¦Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancientâ€¦','&lt;p&gt;ssdfsdfsdfsdf&lt;/p&gt;','unpublished','2021-06-02 19:45:30','2021-06-06 11:10:58',13),(43,1,'sdf','sdf','&lt;p&gt;sdf&lt;/p&gt;','unpublished','2021-06-04 19:39:41','2021-06-06 11:10:53',13),(44,13,'Smart Exhibition Upends Classical Style','Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancientâ€¦','&lt;p&gt;sdfsdfsdf&lt;/p&gt;','published','2021-06-06 11:03:49','2021-06-06 11:50:13',13);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-10 12:16:01
