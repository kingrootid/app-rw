-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: fullstack
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` VALUES (2,1,'7c8e29-0ea361-33a812-0ff52f-7c879f',1,0,0,NULL,1614415356);
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poin`
--

DROP TABLE IF EXISTS `poin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poin`
--

LOCK TABLES `poin` WRITE;
/*!40000 ALTER TABLE `poin` DISABLE KEYS */;
INSERT INTO `poin` VALUES (2,1,16);
/*!40000 ALTER TABLE `poin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Polarised incremental orchestration',1),(2,'Fully-configurable scalable time-frame',0),(3,'Re-engineered upward-trending firmware',1),(4,'Reduced non-volatile protocol',1),(5,'Operative full-range policy',1),(6,'Digitized client-server leverage',1),(7,'Up-sized stable forecast',1),(8,'Phased disintermediate policy',1),(9,'Diverse uniform frame',1),(10,'Decentralized encompassing GraphicInterface',1),(11,'Optional system-worthy instructionset',1),(12,'Synergized even-keeled task-force',1),(13,'Integrated systemic policy',1),(14,'Open-source secondary functionalities',1),(15,'Optimized eco-centric neural-net',1),(16,'Fundamental 4thgeneration pricingstructure',1),(17,'Assimilated optimal monitoring',1),(18,'Object-based actuating archive',1),(19,'Phased 5thgeneration leverage',1),(20,'Self-enabling optimal service-desk',1),(21,'Versatile didactic securedline',1),(22,'Team-oriented empowering ability',1),(23,'Enhanced heuristic portal',1),(24,'Cross-group holistic matrices',1),(25,'Expanded fresh-thinking portal',1),(26,'Advanced responsive complexity',0),(27,'Persevering didactic customerloyalty',1),(28,'Adaptive leadingedge monitoring',1),(29,'Advanced national neural-net',1),(30,'Profound intermediate analyzer',1),(31,'Customizable asynchronous success',1),(32,'Balanced zerodefect GraphicInterface',1),(33,'Decentralized executive moratorium',1),(34,'Profit-focused 5thgeneration flexibility',1),(35,'Progressive stable core',1),(36,'Total demand-driven internetsolution',1),(37,'Up-sized exuding orchestration',1),(38,'Centralized tertiary structure',1),(39,'Customer-focused regional model',1),(40,'Mandatory stable array',1),(41,'Exclusive directional definition',1),(42,'Profound dedicated software',1),(43,'Configurable systemic budgetarymanagement',1),(44,'Monitored methodical array',1),(45,'Diverse transitional framework',1),(46,'Extended tertiary alliance',1),(47,'Distributed content-based encryption',0),(48,'Quality-focused bandwidth-monitored securedline',1),(49,'Customizable even-keeled complexity',1),(50,'Intuitive radical leverage',0),(51,'Phased 5thgeneration leverage',0),(52,'Universal didactic analyzer',1),(53,'Customer-focused non-volatile time-frame',1),(54,'Robust intermediate focusgroup',1),(55,'User-friendly value-added capability',1),(56,'Phased content-based info-mediaries',1),(57,'Self-enabling even-keeled openarchitecture',1),(58,'Visionary attitude-oriented access',1),(59,'Front-line secondary securedline',1),(60,'Innovative didactic openarchitecture',1),(61,'Seamless asynchronous collaboration',1),(62,'Re-engineered maximized info-mediaries',1),(63,'Open-architected eco-centric help-desk',1),(64,'Visionary multi-state benchmark',1),(65,'Innovative cohesive product',1),(66,'Digitized maximized opensystem',0),(67,'Multi-tiered maximized emulation',1),(68,'Diverse methodical firmware',1),(69,'Fundamental bifurcated flexibility',1),(70,'Configurable leadingedge openarchitecture',1),(71,'Persevering high-level orchestration',1),(72,'Reactive fresh-thinking info-mediaries',1),(73,'Synchronised human-resource software',1),(74,'Decentralized solution-oriented middleware',1),(75,'Polarised impactful capability',1),(76,'Universal multimedia implementation',1),(77,'De-engineered leadingedge framework',1),(78,'Open-architected real-time processimprovement',1),(79,'Polarised fault-tolerant intranet',1),(80,'Pre-emptive 24/7 hub',1),(81,'Switchable foreground firmware',1),(82,'Operative context-sensitive knowledgebase',0),(83,'User-friendly secondary model',0),(84,'Multi-layered leadingedge moderator',1),(85,'Extended analyzing policy',1),(86,'Focused assymetric model',1),(87,'Realigned incremental groupware',1),(88,'Right-sized modular synergy',1),(89,'Multi-channelled fault-tolerant support',1),(90,'Fully-configurable holistic intranet',1),(91,'Upgradable mobile paradigm',1),(92,'Cross-group object-oriented project',1),(93,'Vision-oriented high-level array',1),(94,'Cross-group multimedia migration',1),(95,'Ergonomic disintermediate approach',1),(96,'Customizable actuating monitoring',1),(97,'Fully-configurable methodical core',1),(98,'Business-focused executive solution',1),(99,'Innovative maximized structure',1),(100,'Grass-roots fault-tolerant firmware',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rewards`
--

DROP TABLE IF EXISTS `rewards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rewards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `min` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rewards`
--

LOCK TABLES `rewards` WRITE;
/*!40000 ALTER TABLE `rewards` DISABLE KEYS */;
INSERT INTO `rewards` VALUES (1,'Ipad','200px-IPadminiWhite.png',20,1),(3,'Printer','5572.jpg',2,1);
/*!40000 ALTER TABLE `rewards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,1,100,'27-02-2021'),(2,1,99,'27-02-2021'),(3,1,99,'27-02-2021'),(4,1,97,'27-02-2021'),(5,1,97,'27-02-2021');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(68) NOT NULL,
  `api_key` varchar(68) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `admin` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','$2y$10$aC0bEbzcBrYLLHf1Vgvw1eTSkR5rreYeHdFS/f2cd2zHE9PetDLEW','',0,1);
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

-- Dump completed on 2021-02-27 15:44:55
