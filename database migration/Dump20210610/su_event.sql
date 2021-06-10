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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `highlight` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` enum('published','unpublished') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `fk_events_1_idx` (`user_id`),
  KEY `fk_events_2_idx` (`updated_by`),
  KEY `index4` (`status`),
  CONSTRAINT `fk_events_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_events_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (3,1,'sdf','sdf','&lt;p&gt;sdf&lt;/p&gt;',NULL,'2021-06-16','00:02:00','03:58:00','sdf','published','2021-06-04 21:58:32','2021-06-04 21:58:32',1),(4,1,'sdf','sdf','&lt;p&gt;sdf&lt;/p&gt;',NULL,'2021-06-16','00:02:00','03:58:00','sdf','published','2021-06-04 22:00:58','2021-06-04 22:00:58',1),(5,1,'sdfsfgvdsgsdg','sdf','&lt;p&gt;sdf&lt;/p&gt;',NULL,'2021-06-16','00:02:00','03:58:00','sdf','published','2021-06-04 22:01:19','2021-06-04 22:17:15',1),(6,1,'Postgraduate Drop-in Evening','Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current studentsâ€¦','&lt;p&gt;dsfsdf&lt;/p&gt;',NULL,'2021-06-05','14:00:00','16:00:00','Ajloun Campus','published','2021-06-04 23:14:14','2021-06-04 23:18:12',1),(7,1,'wwww','wwww','&lt;p&gt;wwww&lt;/p&gt;',NULL,'2021-06-30','19:30:00','22:30:00','www','published','2021-06-05 16:30:27','2021-06-05 16:30:27',1),(8,1,'qweqwe','qweqwe','&lt;p&gt;qweqwe&lt;/p&gt;',NULL,'2021-06-05','20:04:00','22:59:00','qweqwe','published','2021-06-05 17:59:36','2021-06-05 17:59:36',1),(9,1,'qqqq','qqqqq','&lt;p&gt;qqqqqqq&lt;/p&gt;',NULL,'2021-06-08','21:04:00','21:08:00','qqqqqqqq','published','2021-06-05 18:03:08','2021-06-05 18:03:08',1),(10,1,'qqqqqqqqqqq','qqqqqqqqqqqqqqqq','&lt;p&gt;qqqq&lt;/p&gt;',NULL,'2021-06-22','21:08:00','21:04:00','qqqqqqqqqq','published','2021-06-05 18:04:14','2021-06-05 18:04:14',1),(11,1,'Making Natureâ€™ Exhibition At Wellcome Collection','The question of how humans relate to other animals has captivated, scientists, ethicists and artists for centuries...','&lt;p&gt;qqqq&lt;/p&gt;',NULL,'2021-06-22','21:08:00','21:04:00','qqqqqqqqqq','published','2021-06-05 18:07:47','2021-06-06 11:54:26',13),(12,1,'sdfsdf','sdfsf','&lt;p&gt;sdfsdf&lt;/p&gt;',NULL,'2021-06-25','21:11:00','13:08:00','sdfsd','unpublished','2021-06-05 18:08:35','2021-06-05 18:08:35',1),(13,1,'sdfds','dsfsdf','&lt;p&gt;sdfsdf&lt;/p&gt;',NULL,'2021-06-09','21:11:00','21:12:00','sdf','unpublished','2021-06-05 18:09:43','2021-06-05 18:09:43',1),(14,1,'dfgdsg','dfgdfg','&lt;p&gt;fdgdfg&lt;/p&gt;',NULL,'2021-06-03','12:11:00','21:11:00','sdfsdf','unpublished','2021-06-05 18:11:32','2021-06-05 18:11:32',1),(15,1,'a','a','&lt;p&gt;a&lt;/p&gt;',NULL,'2021-06-16','21:15:00','21:15:00','a','unpublished','2021-06-05 18:12:51','2021-06-09 17:20:31',13),(16,1,'asf','sdf','&lt;p&gt;sdf&lt;/p&gt;',NULL,'2021-06-16','21:17:00','12:14:00','sdf','unpublished','2021-06-05 18:14:19','2021-06-05 18:14:19',1),(17,1,'q','q','&lt;p&gt;q&lt;/p&gt;',NULL,'2021-06-15','21:20:00','12:17:00','q','unpublished','2021-06-05 18:17:50','2021-06-05 18:17:50',1),(18,1,'Undergraduate Music Open Day','Music open days are aimed at candidates who have made Kingston University one of their university choicesâ€¦','&lt;p&gt;aaaw&lt;/p&gt;',NULL,'2021-06-11','21:23:00','21:23:00','aa','published','2021-06-05 18:21:11','2021-06-06 11:52:02',13),(19,1,'r','r','&lt;p&gt;r&lt;/p&gt;',NULL,'2021-06-13','21:29:00','13:27:00','r','unpublished','2021-06-05 18:27:22','2021-06-05 18:27:22',1),(20,1,'aa','sdfsdf','&lt;p&gt;sdfsdf&lt;/p&gt;',NULL,'2021-06-25','12:52:00','14:52:00','sdfsdf','unpublished','2021-06-06 09:53:02','2021-06-06 11:07:25',13),(21,1,'sdfsdf','sdfsdf','&lt;p&gt;sdfsdf&lt;/p&gt;',NULL,'2021-06-02','16:53:00','12:57:00','sdfsdf','unpublished','2021-06-06 09:53:37','2021-06-06 09:53:37',1),(22,13,'Postgraduate Drop-in Evening','1Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current studentsâ€¦','&lt;p&gt;1&lt;/p&gt;',NULL,'2021-06-19','13:01:00','13:00:00','1','published','2021-06-06 10:58:48','2021-06-06 11:51:15',13),(23,13,'qq','qq','&lt;p&gt;qq&lt;/p&gt;',NULL,'2021-06-10','14:22:00','16:20:00','qq','unpublished','2021-06-06 11:20:32','2021-06-06 11:20:32',1),(24,13,'Event Title','Highlight','&lt;p&gt;Body&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;text&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;',NULL,'2021-06-04','16:29:00','04:30:00','Ajloun Campus','published','2021-06-06 13:29:38','2021-06-06 13:30:55',13),(25,13,'dsf','sdf','&lt;p&gt;dsf&lt;/p&gt;',NULL,'2021-06-11','20:36:00','20:35:00','sdfsd','unpublished','2021-06-09 17:33:59','2021-06-09 17:33:59',1);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
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
