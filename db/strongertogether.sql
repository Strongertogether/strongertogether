-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: strongertogether
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospitals` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `specialty` varchar(45) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospitals`
--

LOCK TABLES `hospitals` WRITE;
/*!40000 ALTER TABLE `hospitals` DISABLE KEYS */;
INSERT INTO `hospitals` VALUES (1,'Hospital General de Ontinyent','ninguna','Ontinyent','Spain','Hospital de ontinyent','38.8202367','-0.6041065');
/*!40000 ALTER TABLE `hospitals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialists`
--

DROP TABLE IF EXISTS `specialists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialists` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `specialty` varchar(45) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialists`
--

LOCK TABLES `specialists` WRITE;
/*!40000 ALTER TABLE `specialists` DISABLE KEYS */;
INSERT INTO `specialists` VALUES (1,'Javier','Gonzalez','Cardiology','BADALONA','08','ES','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(2,'James','Adams','Neurology','default','default','US','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(3,'Paula','Vaño Calabuig ','Cardiology','BADALONA','08','ES','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(4,'Jaume','Cabanes Miro','Cardiology','BADALONA','08','ES','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(5,'Pepe','Belda Sempere','Neurology','Valencia','cv','ES','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(6,'Lara','Croft ','Neurology','New York','default','US','/proyecto_v3/media/1279412902-1025640568-flowers.png'),(7,'Francisco','Domenech','Microbiology','BADALONA','08','ES','/proyecto_v3/media/1279412902-1025640568-flowers.png');
/*!40000 ALTER TABLE `specialists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `id_document` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `repeat_password` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `activado` varchar(45) DEFAULT NULL,
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
  `avatar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Carles','Catalan','70234426Q','664190144','carles@gmail.com','$2y$10$gBy1h7M0XEHe3akIulxLeey6rWprs0gi/YLGnE','$2y$10$BnIxvePjOvm3jYSOPX9i8OuMi1fttt34HBo4XP','','','',1,0,0,0,0,0,1,0,0,'01/12/1980','AO','','','media/default-avatar.png'),('','','','','mataix.lluis@gmail.com','$2y$10$9RXMuVihbfj345cMeBb9f.3dgASNPtKCBjKoMoowuauBPHt1lgEGe','$2y$10$QQ860qXqiNuBw.Ar2XIdV.6vsQ70GFMSqhNW64VjncXJxPuZe9U02','Verb4f9209ea305326b60d6c10060794c14','0','client',0,0,0,0,0,0,0,0,0,'','','','','https://www.gravatar.com/avatar/7d8cb938023947574f6fdd50e117aba77d8cb938023947574f6fdd50e117aba7?s=400&d=identicon&r=g');
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

-- Dump completed on 2016-12-15 12:39:35
