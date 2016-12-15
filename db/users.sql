CREATE DATABASE  IF NOT EXISTS `strongertogether` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `strongertogether`;
-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: 92.222.94.202    Database: strongertogether
-- ------------------------------------------------------
-- Server version	5.5.52-0+deb8u1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `id_document` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `repeat_password` varchar(45) DEFAULT NULL,
  `internet` tinyint(10) DEFAULT NULL,
  `art` tinyint(10) DEFAULT NULL,
  `technology` tinyint(10) DEFAULT NULL,
  `literature` tinyint(10) DEFAULT NULL,
  `music` tinyint(10) DEFAULT NULL,
  `other` tinyint(10) DEFAULT NULL,
  `male` tinyint(10) DEFAULT NULL,
  `female` tinyint(10) DEFAULT NULL,
  `undefined` tinyint(10) DEFAULT NULL,
  `date_birthday` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `poblacion` varchar(45) DEFAULT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Carles','Catalan','70234426Q','664190144','carles@gmail.com','$2y$10$gBy1h7M0XEHe3akIulxLeey6rWprs0gi/YLGnE','$2y$10$BnIxvePjOvm3jYSOPX9i8OuMi1fttt34HBo4XP',1,0,0,0,0,0,1,0,0,'01/12/1980','AO','','','media/default-avatar.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-14 20:30:42
