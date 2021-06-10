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
-- Table structure for table `hero_slider`
--

DROP TABLE IF EXISTS `hero_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hero_slider` (
  `hero_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `slider_order` tinyint(4) DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`hero_slider_id`),
  KEY `fk_hero_slider_1_idx` (`user_id`),
  KEY `fk_hero_slider_2_idx` (`updated_by`),
  CONSTRAINT `fk_hero_slider_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hero_slider_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_slider`
--

LOCK TABLES `hero_slider` WRITE;
/*!40000 ALTER TABLE `hero_slider` DISABLE KEYS */;
INSERT INTO `hero_slider` VALUES (1,1,'One of the top 10 universities in design',NULL,2,'published','2021-06-05 15:03:10','2021-06-06 11:55:40',13),(2,1,'One of the top 10 universities in design',NULL,1,'published','2021-06-05 15:21:44','2021-06-06 11:55:08',13),(3,1,'slider text',NULL,1,'unpublished','2021-06-05 16:26:35','2021-06-05 16:26:35',1),(7,1,'One of the top 10 universities in design',NULL,2,'published','2021-06-05 18:36:19','2021-06-06 11:55:47',13),(8,1,'One of the top 10 universities in designOne of the top 10 universities in designOne of the top 10 universities in designOne of the top 10 universities in designOne of the top 10 universities in designOne of the top 10 universities in designOne of the',NULL,2,'published','2021-06-05 18:42:59','2021-06-06 13:32:12',13),(9,13,'dsfsdf',NULL,11,'unpublished','2021-06-06 11:04:45','2021-06-06 11:04:45',1),(10,13,'Slider image',NULL,2,'published','2021-06-06 13:33:42','2021-06-06 13:33:42',1);
/*!40000 ALTER TABLE `hero_slider` ENABLE KEYS */;
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
