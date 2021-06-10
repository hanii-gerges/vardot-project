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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` char(255) NOT NULL,
  `role` enum('admin','editor') NOT NULL DEFAULT 'editor',
  `status` enum('active','banned') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `index3` (`firstname`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'adminn','adminn','admin@admin.com','123123','admin','banned','2021-05-26 14:49:12','2021-06-03 10:13:10'),(2,'hanii','gerges','email@email.com','123123','editor','active','2021-05-27 12:26:17','2021-06-09 15:45:40'),(3,'Albrechtt','Straub','albrecht.straub@gmail.com','','admin','active','2021-06-02 17:11:21','2021-06-03 10:20:12'),(5,'Albrecht','Straub','albrecht.straub@gmil.com','1','admin','active','2021-06-02 19:18:01','2021-06-02 19:18:01'),(7,'Albrecht','Straub','albrecht.straub@gmail.coms','$2y$10$ZQtV.WZdhCL63PBWYhOf3Op8GatvNAtiTlqEl5IY0vsex8l/MCGv6','admin','active','2021-06-02 19:21:22','2021-06-02 19:21:22'),(12,'hani','gerges','abualhen@gmail.com','$2y$10$WniwZ835wyTpMalLMUi0derrkpVtaTreEG1MPo0q3arf/gLN4Y2C.','admin','active','2021-06-05 19:43:53','2021-06-05 19:43:53'),(13,'hanii','gerges','admin@gmail.com','$2y$10$IfDns6R51wY5.SuPjrl7jeEgiVtbgCZrNBYCsT5pz1hQa/QXdIGFe','admin','active','2021-06-05 21:19:55','2021-06-09 15:56:59'),(14,'hani','gerges','editor@gmail.com','$2y$10$ehazeTUIDeK.hTkCwjnTkeznj31cZGH.6eLJZG97Wtc9FfIRyhV7S','editor','banned','2021-06-05 21:21:36','2021-06-09 17:46:02'),(15,'hani','gerges','a@gmail.com','$2y$10$wXIhhNDHVSHXGFz9brfWXuWBHHxFeqNsTypGCspkDa5HmnZ5otATm','admin','active','2021-06-06 10:51:33','2021-06-06 10:51:33');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
