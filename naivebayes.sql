-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: naivebayes
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action1` enum('punch','kick','special') NOT NULL,
  `action2` enum('punch','kick','special') NOT NULL,
  `action3` enum('punch','kick','special') NOT NULL,
  `action4` enum('punch','kick','special') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action`
--

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
INSERT INTO `action` VALUES (1,'punch','punch','kick','punch'),(2,'punch','kick','punch','special'),(3,'kick','punch','special','punch'),(4,'punch','special','punch','kick'),(5,'special','punch','kick','special'),(6,'punch','kick','special','punch'),(7,'kick','special','punch','kick'),(8,'special','punch','kick','kick'),(9,'kick','kick','kick','punch'),(10,'kick','kick','punch','special'),(11,'special','punch','punch','punch'),(12,'special','kick','special','kick');
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action1`
--

DROP TABLE IF EXISTS `action1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action1` (
  `action1` enum('punch','kick','special') NOT NULL,
  `punch` int(50) NOT NULL,
  `kick` int(50) NOT NULL,
  `special` int(50) NOT NULL,
  `ppunch` double NOT NULL,
  `pkick` double NOT NULL,
  `pspecial` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action1`
--

LOCK TABLES `action1` WRITE;
/*!40000 ALTER TABLE `action1` DISABLE KEYS */;
INSERT INTO `action1` VALUES ('punch',2,1,1,0.4,0.25,0.3),('kick',2,1,2,0.4,0.5,0.3),('special',1,1,1,0.2,0.25,0.3);
/*!40000 ALTER TABLE `action1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action2`
--

DROP TABLE IF EXISTS `action2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action2` (
  `action2` enum('punch','kick','special') NOT NULL,
  `punch` int(50) NOT NULL,
  `kick` int(50) NOT NULL,
  `special` int(50) NOT NULL,
  `ppunch` double NOT NULL,
  `pkick` double NOT NULL,
  `pspecial` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action2`
--

LOCK TABLES `action2` WRITE;
/*!40000 ALTER TABLE `action2` DISABLE KEYS */;
INSERT INTO `action2` VALUES ('punch',3,1,1,0.6,0.25,0.3),('kick',2,1,2,0.4,0.25,0.6),('special',0,2,0,0,0.5,0);
/*!40000 ALTER TABLE `action2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action3`
--

DROP TABLE IF EXISTS `action3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action3` (
  `action3` enum('punch','kick','special') NOT NULL,
  `punch` int(50) NOT NULL,
  `kick` int(50) NOT NULL,
  `special` int(50) NOT NULL,
  `ppunch` double NOT NULL,
  `pkick` double NOT NULL,
  `pspecial` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action3`
--

LOCK TABLES `action3` WRITE;
/*!40000 ALTER TABLE `action3` DISABLE KEYS */;
INSERT INTO `action3` VALUES ('punch',1,2,2,0.2,0.5,0.6),('kick',2,1,1,0.4,0.25,0.3),('special',2,1,0,0.4,0.25,0);
/*!40000 ALTER TABLE `action3` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-09 16:23:52
