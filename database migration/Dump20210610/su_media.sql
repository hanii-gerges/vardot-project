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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  `record_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (12,'user',2,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(13,'user',2,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(14,'user',2,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(15,'user',2,'Screenshot_2021-04-07_15-08-16.png'),(16,'user',5,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(17,'user',5,'share-image.png'),(18,'user',1,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(19,'user',1,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(20,'user',2,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(21,'user',5,'Screenshot_2021-04-07_15-08-16.png'),(22,'user',5,'Screenshot_2021-04-07_15-08-16.png'),(23,'user',5,'share-image.png'),(24,'event',5,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(25,'event',5,'share-image.png'),(26,'event',6,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(27,'hero_slider',2,'Site owners building carousel slider in Bootstrap CSS.jpg'),(28,'hero_slider',1,'unnamed.jpg'),(29,'hero_slider',1,'nb_ist_cover.jpg'),(30,'event',15,'Site owners building carousel slider in Bootstrap CSS.jpg'),(31,'event',15,'Site owners building carousel slider in Bootstrap CSS.jpg'),(32,'event',17,'unnamed.jpg'),(33,'event',18,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(34,'event',19,'Site owners building carousel slider in Bootstrap CSS.jpg'),(35,'hero_slider',7,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(36,'hero_slider',7,'share-image.png'),(37,'hero_slider',8,'Site owners building carousel slider in Bootstrap CSS.jpg'),(38,'user',12,'share-image.png'),(39,'user',13,'share-image.png'),(40,'event',21,'Site owners building carousel slider in Bootstrap CSS.jpg'),(41,'hero_slider',9,'Site owners building carousel slider in Bootstrap CSS.jpg'),(42,'event',22,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(43,'event',22,'share-image.png'),(44,'event',23,'Site owners building carousel slider in Bootstrap CSS.jpg'),(45,'event',18,'NClimate_Hero_MAY-21-6c5764f2b141511b4f3a7f71f670376a.jpg'),(46,'event',24,'Site owners building carousel slider in Bootstrap CSS.jpg'),(47,'hero_slider',10,'chart.jpg'),(48,'event',15,'unnamed.jpg'),(49,'event',15,'Site owners building carousel slider in Bootstrap CSS.jpg'),(50,'event',25,'Site owners building carousel slider in Bootstrap CSS.jpg');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
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
