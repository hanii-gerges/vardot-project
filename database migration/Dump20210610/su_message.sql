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
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'hani gerges','abualhen@gmail.com','0791865451','dsfsdf','unread','2021-06-05 11:44:02'),(2,'hani gerges','abualhen@gmail.com','0791865451','sdfsdf','unread','2021-06-05 11:47:09'),(3,'hani gerges','abualhen@gmail.com','0791865451','sdfsdf','read','2021-06-05 11:55:01'),(4,'hani gerges','abualhen@gmail.com','0791865451','sadfasf','read','2021-06-05 11:56:53'),(5,'hani gerges','abualhen@gmail.com','0791865451','sdfdsf','unread','2021-06-05 11:57:08'),(6,'hani gerges','abualhen@gmail.com','0791865451','dsfsdfsdf','read','2021-06-05 12:06:06'),(7,'hani gerges','abualhen@gmail.com','0791865451','dsf','read','2021-06-05 12:06:53'),(8,'hani gerges','abualhen@gmail.com','0791865451','sdfsdf','unread','2021-06-05 12:09:53'),(9,'hani gerges','abualhen@gmail.com','0791865451','dfsdf','read','2021-06-05 12:10:36'),(10,'hani gerges','abualhen@gmail.com','0791865451','sdfsdf','unread','2021-06-05 12:11:01'),(11,'hani gerges','abualhen@gmail.com','0791865451','sdfsdfsdfsd','unread','2021-06-05 12:12:07'),(13,'hani gerges','abualhen@gmail.com','0791865451','adasdasd','unread','2021-06-05 23:00:38');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
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
