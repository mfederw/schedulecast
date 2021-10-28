-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnueabihf (armv8l)
--
-- Host: localhost    Database: schedulecast
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Availability`
--

DROP TABLE IF EXISTS `Availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Availability` (
  `Performer` int(11) DEFAULT NULL,
  `ShowID` int(11) DEFAULT NULL,
  `Available` tinyint(1) DEFAULT NULL,
  `SubmitDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Availability`
--

LOCK TABLES `Availability` WRITE;
/*!40000 ALTER TABLE `Availability` DISABLE KEYS */;
INSERT INTO `Availability` VALUES (3,7,1,'2021-10-13 20:19:01'),(3,9,0,'2021-10-13 20:19:01'),(3,12,0,'2021-10-13 20:19:01'),(3,11,0,'2021-10-13 20:19:01'),(3,14,0,'2021-10-13 20:19:01'),(3,15,0,'2021-10-13 20:19:01'),(3,16,0,'2021-10-13 20:19:01'),(3,17,0,'2021-10-13 20:19:01'),(3,18,0,'2021-10-13 20:19:01'),(3,19,0,'2021-10-13 20:19:01'),(3,21,0,'2021-10-13 20:19:01'),(1,7,1,'2021-10-13 20:19:01'),(20,7,1,'2021-10-13 20:19:01'),(20,9,0,'2021-10-13 20:19:01'),(20,11,0,'2021-10-13 20:19:01'),(20,13,1,'2021-10-13 20:19:01'),(20,14,1,'2021-10-13 20:19:01'),(20,15,1,'2021-10-13 20:19:01'),(20,16,0,'2021-10-13 20:19:01'),(20,17,0,'2021-10-13 20:19:01'),(20,18,1,'2021-10-13 20:19:01'),(20,19,1,'2021-10-13 20:19:01'),(20,21,0,'2021-10-13 20:19:01'),(6,7,1,'2021-10-13 20:19:01'),(22,7,1,'2021-10-13 20:19:01'),(10,7,0,'2021-10-13 20:19:01'),(19,7,1,'2021-10-13 20:19:01'),(16,7,0,'2021-10-13 20:19:01'),(16,9,0,'2021-10-13 20:19:01'),(16,11,0,'2021-10-13 20:19:01'),(16,13,0,'2021-10-13 20:19:01'),(16,25,0,'2021-10-13 20:19:01'),(16,14,0,'2021-10-13 20:19:01'),(16,15,0,'2021-10-13 20:19:01'),(16,16,0,'2021-10-13 20:19:01'),(16,17,0,'2021-10-13 20:19:01'),(16,18,1,'2021-10-13 20:19:01'),(16,19,1,'2021-10-13 20:19:01'),(16,21,0,'2021-10-13 20:19:01'),(1,30,1,'2021-10-13 20:19:01'),(1,9,1,'2021-10-13 20:19:01'),(31,26,1,'2021-10-13 20:19:01'),(31,30,1,'2021-10-13 20:19:01'),(31,31,1,'2021-10-13 20:19:01'),(31,9,0,'2021-10-13 20:19:01'),(31,32,0,'2021-10-13 20:19:01'),(31,12,1,'2021-10-13 20:19:01'),(31,11,0,'2021-10-13 20:19:01'),(31,13,1,'2021-10-13 20:19:01'),(31,25,1,'2021-10-13 20:19:01'),(31,14,0,'2021-10-13 20:19:01'),(31,15,0,'2021-10-13 20:19:01'),(31,17,0,'2021-10-13 20:19:01'),(31,21,0,'2021-10-13 20:19:01'),(11,26,1,'2021-10-13 20:19:01'),(11,30,0,'2021-10-13 20:19:01'),(11,31,1,'2021-10-13 20:19:01'),(11,9,0,'2021-10-13 20:19:01'),(11,32,1,'2021-10-13 20:19:01'),(11,12,1,'2021-10-13 20:19:01'),(11,11,0,'2021-10-13 20:19:01'),(11,13,0,'2021-10-13 20:19:01'),(11,25,0,'2021-10-13 20:19:01'),(11,14,0,'2021-10-13 20:19:01'),(11,15,0,'2021-10-13 20:19:01'),(11,16,0,'2021-10-13 20:19:01'),(11,17,0,'2021-10-13 20:19:01'),(11,18,0,'2021-10-13 20:19:01'),(11,19,0,'2021-10-13 20:19:01'),(11,21,0,'2021-10-13 20:19:01'),(6,30,1,'2021-10-13 20:19:01'),(6,9,1,'2021-10-13 20:19:01'),(10,26,0,'2021-10-13 20:19:01'),(10,30,0,'2021-10-13 20:19:01'),(10,31,0,'2021-10-13 20:19:01'),(10,9,1,'2021-10-13 20:19:01'),(10,32,1,'2021-10-13 20:19:01'),(10,12,1,'2021-10-13 20:19:01'),(10,11,1,'2021-10-13 20:19:01'),(10,13,1,'2021-10-13 20:19:01'),(10,25,0,'2021-10-13 20:19:01'),(10,14,1,'2021-10-13 20:19:01'),(10,15,1,'2021-10-13 20:19:01'),(10,16,1,'2021-10-13 20:19:01'),(10,17,0,'2021-10-13 20:19:01'),(10,18,1,'2021-10-13 20:19:01'),(10,19,1,'2021-10-13 20:19:01'),(10,21,1,'2021-10-13 20:19:01'),(7,32,1,'2021-10-13 20:19:01'),(9,26,0,'2021-10-13 20:19:01'),(9,31,0,'2021-10-13 20:19:01'),(9,9,0,'2021-10-13 20:19:01'),(9,32,0,'2021-10-13 20:19:01'),(9,12,0,'2021-10-13 20:19:01'),(9,11,0,'2021-10-13 20:19:01'),(9,13,0,'2021-10-13 20:19:01'),(9,25,0,'2021-10-13 20:19:01'),(9,14,1,'2021-10-13 20:19:01'),(9,15,1,'2021-10-13 20:19:01'),(9,16,0,'2021-10-13 20:19:01'),(9,17,0,'2021-10-13 20:19:01'),(9,18,0,'2021-10-13 20:19:01'),(9,19,0,'2021-10-13 20:19:01'),(9,21,0,'2021-10-13 20:19:01'),(19,9,0,'2021-10-13 20:19:01'),(19,11,1,'2021-10-13 20:19:01'),(19,13,1,'2021-10-13 20:19:01'),(19,25,1,'2021-10-13 20:19:01'),(19,14,1,'2021-10-13 20:19:01'),(19,15,1,'2021-10-13 20:19:01'),(19,16,1,'2021-10-13 20:19:01'),(19,17,1,'2021-10-13 20:19:01'),(19,18,1,'2021-10-13 20:19:01'),(19,19,1,'2021-10-13 20:19:01'),(19,21,1,'2021-10-13 20:19:01'),(5,26,0,'2021-10-13 20:19:01'),(5,31,0,'2021-10-13 20:19:01'),(5,32,0,'2021-10-13 20:19:01'),(5,12,1,'2021-10-13 20:19:01'),(5,11,1,'2021-10-13 20:19:01'),(5,13,0,'2021-10-13 20:19:01'),(5,25,0,'2021-10-13 20:19:01'),(5,14,0,'2021-10-13 20:19:01'),(5,15,1,'2021-10-13 20:19:01'),(5,16,1,'2021-10-13 20:19:01'),(5,17,0,'2021-10-13 20:19:01'),(5,18,1,'2021-10-13 20:19:01'),(5,19,1,'2021-10-13 20:19:01'),(5,21,0,'2021-10-13 20:19:01'),(8,26,0,'2021-10-13 20:19:01'),(8,31,0,'2021-10-13 20:19:01'),(8,32,0,'2021-10-13 20:19:01'),(8,12,1,'2021-10-13 20:19:01'),(8,11,1,'2021-10-13 20:19:01'),(8,13,1,'2021-10-13 20:19:01'),(8,25,1,'2021-10-13 20:19:01'),(8,14,0,'2021-10-13 20:19:01'),(8,15,0,'2021-10-13 20:19:01'),(8,16,0,'2021-10-13 20:19:01'),(8,17,0,'2021-10-13 20:19:01'),(8,18,0,'2021-10-13 20:19:01'),(8,19,0,'2021-10-13 20:19:01'),(8,21,0,'2021-10-13 20:19:01'),(7,7,0,'2021-10-13 20:19:01'),(7,28,0,'2021-10-13 20:19:01'),(7,30,0,'2021-10-13 20:19:01'),(7,9,0,'2021-10-13 20:19:01'),(7,12,1,'2021-10-13 20:19:01'),(7,11,0,'2021-10-13 20:19:01'),(7,13,1,'2021-10-13 20:19:01'),(7,25,1,'2021-10-13 20:19:01'),(7,14,0,'2021-10-13 20:19:01'),(7,15,0,'2021-10-13 20:19:01'),(7,16,0,'2021-10-13 20:19:01'),(7,17,0,'2021-10-13 20:19:01'),(7,19,0,'2021-10-13 20:19:01'),(7,21,0,'2021-10-13 20:19:01'),(6,26,1,'2021-10-13 20:19:01'),(6,31,1,'2021-10-13 20:19:01'),(6,32,1,'2021-10-13 20:19:01'),(6,12,1,'2021-10-13 20:19:01'),(6,11,1,'2021-10-13 20:19:01'),(6,13,1,'2021-10-13 20:19:01'),(6,25,1,'2021-10-13 20:19:01'),(6,14,0,'2021-10-13 20:19:01'),(6,15,1,'2021-10-13 20:19:01'),(6,16,0,'2021-10-13 20:19:01'),(6,17,0,'2021-10-13 20:19:01'),(6,18,1,'2021-10-13 20:19:01'),(6,19,1,'2021-10-13 20:19:01'),(6,21,1,'2021-10-13 20:19:01'),(1,26,1,'2021-10-13 20:34:47'),(1,31,1,'2021-10-13 20:34:47'),(1,32,1,'2021-10-13 20:34:47'),(1,12,1,'2021-10-14 00:59:38'),(1,11,1,'2021-10-14 00:59:38'),(1,13,1,'2021-10-14 00:59:38'),(1,25,1,'2021-10-14 00:59:38'),(1,14,1,'2021-10-14 00:59:38'),(1,15,1,'2021-10-14 00:59:38'),(1,16,1,'2021-10-14 00:59:38'),(1,17,0,'2021-10-14 00:59:38'),(1,18,1,'2021-10-14 00:59:38'),(1,19,1,'2021-10-14 00:59:38'),(1,21,0,'2021-10-21 20:35:47'),(3,13,1,'2021-10-21 21:10:04'),(3,25,0,'2021-10-21 21:10:04'),(31,16,1,'2021-10-21 21:11:45'),(31,18,1,'2021-10-21 21:11:45'),(31,19,1,'2021-10-28 02:34:29'),(7,18,1,'2021-10-28 17:15:35');
/*!40000 ALTER TABLE `Availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Casts`
--

DROP TABLE IF EXISTS `Casts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Casts` (
  `ShowID` int(11) DEFAULT NULL,
  `Performer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Casts`
--

LOCK TABLES `Casts` WRITE;
/*!40000 ALTER TABLE `Casts` DISABLE KEYS */;
INSERT INTO `Casts` VALUES (3,1),(9,1),(10,1),(7,20),(7,1),(7,3),(7,19),(7,22),(7,6),(26,6),(26,1),(9,6),(9,10),(9,19),(13,20),(13,31),(13,7),(13,10),(13,1),(14,20),(14,1),(14,10),(14,9),(14,19),(12,31),(12,11),(12,6),(12,7),(12,5),(12,8),(12,1),(25,1),(25,31),(25,19),(25,7),(25,6),(13,3);
/*!40000 ALTER TABLE `Casts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Performers`
--

DROP TABLE IF EXISTS `Performers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Performers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NameFirst` varchar(30) DEFAULT NULL,
  `NameLast` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `UserName` varchar(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Admin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Performers`
--

LOCK TABLES `Performers` WRITE;
/*!40000 ALTER TABLE `Performers` DISABLE KEYS */;
INSERT INTO `Performers` VALUES (1,'Mike','Federwisch','mike@federwisch.us','mikef','$2y$10$Fa78ck5Y1dyYR/qcVZB7feEq4BPbAtWN6E7aJirV4rhsh6gtDHXBi','2021-09-24 01:40:33',1),(3,'Jeff','Ringgold','americanimprovtheatre@gmail.com','jeffr','$2y$10$QkaXM2ZZgb.R/jA162a0De9GDudjthx6bkeXbIebRV8LYxv2UQM.e','2021-09-26 21:36:07',1),(5,'Brenda','McNabb','Brendam@clarityconsultants.com','brendam','$2y$10$ujS/6J.9bc3BfXU2pKK.UufndYEsVHJGTy9TbmecKSojUbufOKFMa','2021-09-23 00:49:17',0),(6,'Anne','Federwisch','annefederwisch@gmail.com','annef','$2y$10$d1Uk5KV2W5mJoZMvEX3kb.YicYkZ7tiM/BSkVe71GXSrYmQcLMCDa','2021-09-23 00:49:22',0),(7,'A.G','Chalmers','Annac628@gmail.com','annac','$2y$10$YVgSzYHd7Y49oRblJeLY.eOr2VkDN/bPjXrKwDDD6/6XhieS/vtge','2021-09-23 00:50:20',0),(8,'Chinmayi','Chandrashekar','Chinmayi25@gmail.com','chinmayic','$2y$10$qlSeJXhpBNidWxqfaBk0COtSq2XL9Ws4MFxgHtfCh6rqZdQIOdYEu','2021-09-23 01:00:56',0),(9,'Patricia','Sullivan','Patricia@psullivan.org','patricias','$2y$10$TDmovyrLbasQFk0FmwHiBOE5yUb4ZLnTy7NQRwi6n3LDY3NfDwISG','2021-09-23 00:50:30',0),(10,'Adrienne','Tegreeny','Amtegreeny@gmail.com','adriennet','$2y$10$CMdMQjinMhpX2HC7oGjiUeEFS0RQRHoaRpDWw24n/akUezjgx2GlW','2021-09-23 00:50:35',0),(11,'Shay','Fernandez','shayfernandez14@gmail.com','shayf','$2y$10$eiDkkdHrn3ALZK82cLHI0eX0Q6RpGM8uB17CoEXmrUoNm.Anb3uZa','2021-09-23 00:50:41',0),(12,'Lexi','Nuttbrown','anuttbrown@gmail.com','lexin','$2y$10$LC4OvIneOCHZ5Vds4lReVOKCtJ7b0m8n4tFsfFbET8e3vf4w6rc7a','2021-09-23 00:50:46',0),(13,'Alexander','Cain','Alex.c.cain@gmail.com','alexanderc','$2y$10$FM1eoSsfHFnqpeRBX8Lw9O8yX6cAQ1mr21fde1GzMRN8HMFJByoYS','2021-09-23 01:02:04',0),(14,'Kevin','Satre','kvnsatre@gmail.com','kevins','$2y$10$xMN0btmvd6LYUFj2BoYcu.gwrqVSZHUgQfzh/r4WtJnLOEbbh57Ta','2021-09-23 00:51:12',0),(15,'Alex','Prompt','axel_d6@hotmail.com','axelp','$2y$10$D1iK3ay/Pb0p6ThSTo8HJuj1JqXlzDZNHungniFeYYQfmmB7fY17S','2021-09-23 18:24:48',0),(16,'Will','Johnson','will@willjamesjohnson.com','willj','$2y$10$fzKjnIEMV2dG8MeuWigH2ekcTNBGXuKLVXJT7vEYrT4tuXKOruKj6','2021-09-23 00:51:22',0),(17,'Isaac','Kruger','Isaac.kruger@gmail.com','isaack','$2y$10$LkY4v/TVVp1peuOtLXUvuODU3FkdvfsmA6p9nomATKVvIDbH3eJ66','2021-09-23 00:51:27',0),(18,'Marc','Williams','Marc.t.williams@gmail.com','marcw','$2y$10$SWb7ZXk2ABkqvZEg5oxvBuyWZqp.UyVINl8xRqp6mlGhtr.Oeyuhu','2021-09-23 00:51:33',0),(19,'Ted','McClellan','Tedamac@comcast.net','tedm','$2y$10$/VLJPUVotmN.W4i9vwPcZOnCqHkVz0f3nbhk2ganGLwbk0elV6ZWW','2021-09-23 00:51:38',0),(20,'Matt','Rascher','matt.rascher@gmail.com','mattr','$2y$10$VTuNy75mmhpHtOddmx04W.UMNTU7d/XYNao6EnC/PipETQH8ZP/We','2021-09-23 00:51:44',0),(21,'Christopher','Shurland','shurlandlaw@gmail.com','chriss','$2y$10$UvClezAOjSKOx22i3WnBx.1CX05sF7urSq9gNUFH.DSY.Mh7QVqQW','2021-09-23 00:51:49',0),(22,'John','Abbott','john@johnabbott.net','johna','$2y$10$ZjKwEuZkbrOVVBmxcG14yO.ZQfmgks22p5BRzIfkClqlCeQ7BtX8.','2021-09-24 00:07:25',0),(23,'Kyle','Hovland','ranik81@hotmail.com','kyleh','$2y$10$nDDvnXhkX1j39EZMlJMEKOtnd/QFtHRnu2vs3n.4WNDbm0HWnPl8a','2021-09-23 00:51:59',0),(24,'Jeanette','Browne','Jeanettebrowne@sbcglobal.net','jeanetteb','$2y$10$B8oQ0iwSnGnH0Cd7vdNVrO23ZVk/LSD3D8XQrG85qPyagu8H8eRNy','2021-09-23 22:10:07',1),(25,'Katherine','Ringgold','Ringgold.katherine@gmail.com','katheriner','$2y$10$DC8qU3o.EYkfGDlLcAnj6.9ZLuq3YXfJtW3ERsV.X.aP2MiunXKjq','2021-09-23 00:52:12',0),(26,'Samuel','Payes','Samuelpayes75@gmail.com','samp','$2y$10$lfVn1WWcL.wkcgStkGwoP.F9rOFhTKuMLc1MuHAxWHXm4yU5bL7zm','2021-09-23 00:52:18',0),(27,'Sean','Bui','sbui99@yahoo.com','seanb','$2y$10$iB2ZfdkXlfV.i3blIn.6S.T2/UHQs0IeihA/XKbtVKke7N8Zj8iIK','2021-09-23 01:00:06',0),(28,'Jeff','Smith','smithj003232@gmail.com','jeffs','$2y$10$exNerIHUR9bB75GmdTp5oOpZDnhPB6Nu0XlscOHbIo0fKmvHZQK0S','2021-09-23 00:52:33',0),(31,'Magda','Rymkowska','m.rymkowska@gmail.com','magdar','$2y$10$2eSJZy2P5So.pUoGGEueBOxuX9idBwzURBsUOo8xIGp/6.akfrq9m','2021-09-27 22:26:42',0),(32,'Bogus','McGorfy','bogus@federwisch.us','bogus','$2y$10$J1HJew7zDC8AwLwPVAqQieuBTYS1O0tt03PKfrZ2qIFBZ/OG7E1tq','2021-10-04 22:21:25',0);
/*!40000 ALTER TABLE `Performers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shows`
--

DROP TABLE IF EXISTS `Shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Shows` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `PracticeZoomLink` varchar(128) DEFAULT NULL,
  `ShowZoomLink` varchar(128) DEFAULT NULL,
  `Team` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shows`
--

LOCK TABLES `Shows` WRITE;
/*!40000 ALTER TABLE `Shows` DISABLE KEYS */;
INSERT INTO `Shows` VALUES (7,'2021-09-25 20:00:00','Saturday Radio Show','https://us02web.zoom.us/j/87870960337?pwd=RDJRdVNrTUltMGE2Zkh3M0MvWkxPZz09','https://us02web.zoom.us/j/83221521841?pwd=Z0lkMXJmb3lRMkh3S3R6clR5TmFxdz09',2),(9,'2021-10-09 20:00:00','Saturday Radio Show','None','None',2),(11,'2021-10-16 20:00:00','Saturday Radio Show','None','None',2),(12,'2021-10-15 20:00:00','Brick House Show','None','https://us02web.zoom.us/j/84246079668?pwd=d25kUjYzZ09LMjJuTGdpcjI4aitEUT09',3),(13,'2021-10-23 20:00:00','Saturday Radio Show','https://us02web.zoom.us/j/85077505272?pwd=eHJJVWc4YVg3THAzbzIwM0F1M0d3Zz09','https://us02web.zoom.us/j/86293770688?pwd=Mno4T05WY0E3djNGMVdGUkoxUEdHQT09',2),(14,'2021-11-06 20:00:00','Saturday Radio Show','None','None',2),(15,'2021-11-13 20:00:00','Saturday Radio Show','None','None',2),(16,'2021-11-20 20:00:00','Saturday Radio Show','None','None',2),(17,'2021-11-27 20:00:00','Saturday Radio Show','None','None',2),(18,'2021-12-04 20:00:00','Saturday Radio Show','None','None',2),(19,'2021-12-11 20:00:00','Saturday Radio Show','None','None',2),(21,'2021-12-18 20:00:00','Saturday Radio Show','None','None',2),(25,'2021-10-30 20:00:00','Saturday Radio Show','https://us02web.zoom.us/j/86721708563?pwd=N0lSY2VENmFFR3JZT0JrSVdFcHphQT09','https://us02web.zoom.us/j/89890755302?pwd=U2RlbnNWL1NYN3VHRkZINkx4MkRGdz09',2),(26,'2021-09-27 20:00:00','Brick House Practice','https://us02web.zoom.us/j/86824387838?pwd=Ynk1LzZFL0tSeUxuYnlQNUZWanJnZz09','https://us02web.zoom.us/j/86824387838?pwd=Ynk1LzZFL0tSeUxuYnlQNUZWanJnZz09',3),(28,'2021-09-25 20:00:00','Radio Show','None','None',2),(30,'2021-10-02 20:00:00','Saturday Radio Show','None','None',2),(31,'2021-10-04 20:00:00','Brick House Practice','https://us02web.zoom.us/j/86824387838?pwd=Ynk1LzZFL0tSeUxuYnlQNUZWanJnZz09','https://us02web.zoom.us/j/86824387838?pwd=Ynk1LzZFL0tSeUxuYnlQNUZWanJnZz09',3),(32,'2021-10-11 20:00:00','Brick House Practice','None','None',3);
/*!40000 ALTER TABLE `Shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TeamMembership`
--

DROP TABLE IF EXISTS `TeamMembership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TeamMembership` (
  `Performer` int(11) DEFAULT NULL,
  `Team` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TeamMembership`
--

LOCK TABLES `TeamMembership` WRITE;
/*!40000 ALTER TABLE `TeamMembership` DISABLE KEYS */;
INSERT INTO `TeamMembership` VALUES (1,2),(3,2),(3,3),(1,3),(5,2),(5,3),(6,2),(6,3),(7,3),(7,2),(8,2),(8,3),(9,2),(9,3),(10,2),(11,2),(11,3),(15,2),(16,2),(17,2),(19,2),(20,2),(21,2),(22,2),(10,3),(24,6),(1,6),(3,6),(31,2),(31,3);
/*!40000 ALTER TABLE `TeamMembership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Teams`
--

DROP TABLE IF EXISTS `Teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Teams`
--

LOCK TABLES `Teams` WRITE;
/*!40000 ALTER TABLE `Teams` DISABLE KEYS */;
INSERT INTO `Teams` VALUES (2,'Radio Show'),(3,'Brick House'),(6,'Staff');
/*!40000 ALTER TABLE `Teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-28 14:12:23
