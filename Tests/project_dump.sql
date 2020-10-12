-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: d1965919
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `CART`
--
USE d1965919;
DROP TABLE IF EXISTS `CART`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CART` (
  `STUDENT_NO` varchar(20) NOT NULL,
  `MARKET_ID` int(11) unsigned NOT NULL,
  `IMAGE_URL` text,
  `NAME` varchar(30) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  KEY `MARKET_ID` (`MARKET_ID`),
  KEY `STUDENT_NO` (`STUDENT_NO`),
  CONSTRAINT `CART_ibfk_1` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CART`
--

LOCK TABLES `CART` WRITE;
/*!40000 ALTER TABLE `CART` DISABLE KEYS */;
INSERT INTO `CART` VALUES ('1973',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1234',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1173',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1173',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1173',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1173',11,'https://lamp.ms.wits.ac.za/~s1965919/uploads/11.png','Asus Laptop 15',8999.99,'Electronics','Whether for work or play, ASUS M509 is the entry-level laptop that delivers powerful performance and immersive visuals. Its NanoEdge display boasts wide 178? viewing angles and a matte anti-glare coating for a truly engaging experience. Inside, it?s powered by up to AMD Ryzen? processor with 8GB RAM andf a fast 512GB SSD gives you the perfect combination of large storage capacity and fast data read/write speeds.'),('1173',11,'https://lamp.ms.wits.ac.za/~s1965919/uploads/11.png','Asus Laptop 15',8999.99,'Electronics','Whether for work or play, ASUS M509 is the entry-level laptop that delivers powerful performance and immersive visuals. Its NanoEdge display boasts wide 178? viewing angles and a matte anti-glare coating for a truly engaging experience. Inside, it?s powered by up to AMD Ryzen? processor with 8GB RAM andf a fast 512GB SSD gives you the perfect combination of large storage capacity and fast data read/write speeds.'),('1234',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1234',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1234',11,'https://lamp.ms.wits.ac.za/~s1965919/uploads/11.png','Asus Laptop 15',8999.99,'Electronics','Whether for work or play, ASUS M509 is the entry-level laptop that delivers powerful performance and immersive visuals. Its NanoEdge display boasts wide 178? viewing angles and a matte anti-glare coating for a truly engaging experience. Inside, it?s powered by up to AMD Ryzen? processor with 8GB RAM andf a fast 512GB SSD gives you the perfect combination of large storage capacity and fast data read/write speeds.'),('1234',18,'https://lamp.ms.wits.ac.za/~s1965919/uploads/18.jpeg','Sour babies',30.00,'food','OUTBURST of FLAVOUR'),('1234',20,'https://lamp.ms.wits.ac.za/~s1965919/uploads/20.jpeg','Wits Burger',90.00,'food','Best burger in the South'),('1234',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1234',10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes'),('1234',22,'https://lamp.ms.wits.ac.za/~s1965919/uploads/22.jpg','Neko Station',0.00,'Electronics','The PlayStation 5 (PS5) is an upcoming home video game console developed by Sony Interactive Entertainment. Announced in 2019 as the successor to the PlayStation 4, it is scheduled to launch in late 2020.\n\nBackward compatibility:?Most PlayStation 4 and PlayStation VR games\n\nCPU:?8-core AMD Zen 2, variable frequency, up to 3.5 GHz\n\nRemovable storage:?Internal (user upgradeable) NVMe M.2 SSD, or external USB-b...\n\nGraphics:?Custom AMD RDNA 2, variable frequency, up to 2.23 GHz\n\nAll this and it looks like a neko'),('1234',20,'https://lamp.ms.wits.ac.za/~s1965919/uploads/20.jpeg','Wits Burger',90.00,'food','Best burger in the South');
/*!40000 ALTER TABLE `CART` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLOTHES`
--

DROP TABLE IF EXISTS `CLOTHES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CLOTHES` (
  `CLOTHES_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MARKET_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  PRIMARY KEY (`CLOTHES_ID`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `CLOTHES_ibfk_1` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET` (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLOTHES`
--

LOCK TABLES `CLOTHES` WRITE;
/*!40000 ALTER TABLE `CLOTHES` DISABLE KEYS */;
INSERT INTO `CLOTHES` VALUES (1,2,'T-shirt',100.20),(2,2,'Sweater',149.99);
/*!40000 ALTER TABLE `CLOTHES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLOTHES_RATINGS`
--

DROP TABLE IF EXISTS `CLOTHES_RATINGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CLOTHES_RATINGS` (
  `CLOTHES_ID` int(11) NOT NULL,
  `STUDENT_NO` varchar(20) NOT NULL,
  `RATING` double DEFAULT NULL,
  PRIMARY KEY (`CLOTHES_ID`,`STUDENT_NO`),
  KEY `STUDENT_NO` (`STUDENT_NO`),
  CONSTRAINT `CLOTHES_RATINGS_ibfk_1` FOREIGN KEY (`CLOTHES_ID`) REFERENCES `CLOTHES` (`CLOTHES_ID`),
  CONSTRAINT `CLOTHES_RATINGS_ibfk_2` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLOTHES_RATINGS`
--

LOCK TABLES `CLOTHES_RATINGS` WRITE;
/*!40000 ALTER TABLE `CLOTHES_RATINGS` DISABLE KEYS */;
INSERT INTO `CLOTHES_RATINGS` VALUES (1,'1234',3.5),(2,'1234',4);
/*!40000 ALTER TABLE `CLOTHES_RATINGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENTS`
--

DROP TABLE IF EXISTS `EVENTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENTS` (
  `EVENTS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MARKET_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  PRIMARY KEY (`EVENTS_ID`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `EVENTS_ibfk_1` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET` (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENTS`
--

LOCK TABLES `EVENTS` WRITE;
/*!40000 ALTER TABLE `EVENTS` DISABLE KEYS */;
INSERT INTO `EVENTS` VALUES (1,3,'Freshers party',180.00);
/*!40000 ALTER TABLE `EVENTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENT_RATINGS`
--

DROP TABLE IF EXISTS `EVENT_RATINGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENT_RATINGS` (
  `EVENTS_ID` int(11) NOT NULL,
  `STUDENT_NO` varchar(20) NOT NULL,
  `RATING` double DEFAULT NULL,
  PRIMARY KEY (`EVENTS_ID`,`STUDENT_NO`),
  KEY `STUDENT_NO` (`STUDENT_NO`),
  CONSTRAINT `EVENT_RATINGS_ibfk_1` FOREIGN KEY (`EVENTS_ID`) REFERENCES `EVENTS` (`EVENTS_ID`),
  CONSTRAINT `EVENT_RATINGS_ibfk_2` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENT_RATINGS`
--

LOCK TABLES `EVENT_RATINGS` WRITE;
/*!40000 ALTER TABLE `EVENT_RATINGS` DISABLE KEYS */;
INSERT INTO `EVENT_RATINGS` VALUES (1,'1234',3.5);
/*!40000 ALTER TABLE `EVENT_RATINGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOOD`
--

DROP TABLE IF EXISTS `FOOD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FOOD` (
  `FOOD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MARKET_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  `EXPIRY_DATE` date NOT NULL,
  PRIMARY KEY (`FOOD_ID`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `FOOD_ibfk_1` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET` (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOOD`
--

LOCK TABLES `FOOD` WRITE;
/*!40000 ALTER TABLE `FOOD` DISABLE KEYS */;
INSERT INTO `FOOD` VALUES (1,1,'Apple',5.20,'0000-00-00');
/*!40000 ALTER TABLE `FOOD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOOD_RATINGS`
--

DROP TABLE IF EXISTS `FOOD_RATINGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FOOD_RATINGS` (
  `FOOD_ID` int(11) NOT NULL,
  `STUDENT_NO` varchar(20) NOT NULL,
  `RATING` double DEFAULT NULL,
  PRIMARY KEY (`FOOD_ID`,`STUDENT_NO`),
  KEY `STUDENT_NO` (`STUDENT_NO`),
  CONSTRAINT `FOOD_RATINGS_ibfk_1` FOREIGN KEY (`FOOD_ID`) REFERENCES `FOOD` (`FOOD_ID`),
  CONSTRAINT `FOOD_RATINGS_ibfk_2` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOOD_RATINGS`
--

LOCK TABLES `FOOD_RATINGS` WRITE;
/*!40000 ALTER TABLE `FOOD_RATINGS` DISABLE KEYS */;
INSERT INTO `FOOD_RATINGS` VALUES (1,'1234',5);
/*!40000 ALTER TABLE `FOOD_RATINGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(6) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES (4,'https://lamp.ms.wits.ac.za/~s1965919/uploads/1.jpeg','King Burger',80,'food','Best burger around');
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOUNGE_CONNECT`
--

DROP TABLE IF EXISTS `LOUNGE_CONNECT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOUNGE_CONNECT` (
  `C_ID` int(255) NOT NULL AUTO_INCREMENT,
  `USER1` int(10) NOT NULL,
  `USER2` int(10) DEFAULT NULL,
  `GP_ID` int(40) DEFAULT NULL,
  PRIMARY KEY (`C_ID`),
  KEY `USER1` (`USER1`),
  KEY `USER2` (`USER2`),
  KEY `GP_ID` (`GP_ID`),
  CONSTRAINT `LOUNGE_CONNECT_ibfk_1` FOREIGN KEY (`USER1`) REFERENCES `LOUNGE_USERS` (`L_ID`),
  CONSTRAINT `LOUNGE_CONNECT_ibfk_2` FOREIGN KEY (`USER2`) REFERENCES `LOUNGE_USERS` (`L_ID`),
  CONSTRAINT `LOUNGE_CONNECT_ibfk_3` FOREIGN KEY (`GP_ID`) REFERENCES `LOUNGE_GROUPS` (`GP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOUNGE_CONNECT`
--

LOCK TABLES `LOUNGE_CONNECT` WRITE;
/*!40000 ALTER TABLE `LOUNGE_CONNECT` DISABLE KEYS */;
INSERT INTO `LOUNGE_CONNECT` VALUES (1,19,23,NULL),(2,19,22,NULL),(3,19,24,NULL),(4,19,21,NULL),(5,21,NULL,1),(6,21,24,NULL),(7,24,20,NULL),(8,24,23,NULL),(9,21,23,NULL),(10,21,21,NULL),(11,25,20,NULL),(12,26,22,NULL);
/*!40000 ALTER TABLE `LOUNGE_CONNECT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOUNGE_GROUPS`
--

DROP TABLE IF EXISTS `LOUNGE_GROUPS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOUNGE_GROUPS` (
  `GP_ID` int(40) NOT NULL AUTO_INCREMENT,
  `GP_NAME` varchar(256) NOT NULL,
  `GP_MEMBERS` int(40) NOT NULL,
  PRIMARY KEY (`GP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOUNGE_GROUPS`
--

LOCK TABLES `LOUNGE_GROUPS` WRITE;
/*!40000 ALTER TABLE `LOUNGE_GROUPS` DISABLE KEYS */;
INSERT INTO `LOUNGE_GROUPS` VALUES (1,'Twelve',3);
/*!40000 ALTER TABLE `LOUNGE_GROUPS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOUNGE_GROUP_MEMBERS`
--

DROP TABLE IF EXISTS `LOUNGE_GROUP_MEMBERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOUNGE_GROUP_MEMBERS` (
  `GP_ID` int(40) NOT NULL,
  `L_ID` int(10) NOT NULL,
  KEY `GP_ID` (`GP_ID`),
  KEY `L_ID` (`L_ID`),
  CONSTRAINT `LOUNGE_GROUP_MEMBERS_ibfk_1` FOREIGN KEY (`GP_ID`) REFERENCES `LOUNGE_GROUPS` (`GP_ID`),
  CONSTRAINT `LOUNGE_GROUP_MEMBERS_ibfk_2` FOREIGN KEY (`L_ID`) REFERENCES `LOUNGE_USERS` (`L_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOUNGE_GROUP_MEMBERS`
--

LOCK TABLES `LOUNGE_GROUP_MEMBERS` WRITE;
/*!40000 ALTER TABLE `LOUNGE_GROUP_MEMBERS` DISABLE KEYS */;
INSERT INTO `LOUNGE_GROUP_MEMBERS` VALUES (1,23),(1,24);
/*!40000 ALTER TABLE `LOUNGE_GROUP_MEMBERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOUNGE_LOG`
--

DROP TABLE IF EXISTS `LOUNGE_LOG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOUNGE_LOG` (
  `M_ID` int(255) NOT NULL AUTO_INCREMENT,
  `MESSAGE` varchar(2000) NOT NULL,
  `C_ID` int(255) NOT NULL,
  PRIMARY KEY (`M_ID`),
  KEY `C_ID` (`C_ID`),
  CONSTRAINT `LOUNGE_LOG_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `LOUNGE_CONNECT` (`C_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOUNGE_LOG`
--

LOCK TABLES `LOUNGE_LOG` WRITE;
/*!40000 ALTER TABLE `LOUNGE_LOG` DISABLE KEYS */;
INSERT INTO `LOUNGE_LOG` VALUES (7,'chester:`m`:hello user',1),(8,'chester:`m`:hello',6),(10,'user:`m`:yho',4),(11,'banana:`m`:hello god',8),(12,'user:`m`:hey chesta',1),(13,'chester:`m`:hello god',9),(14,'user:`m`:yho banana',3),(15,'pravesh:`m`:hi god',1),(16,'pravesh:`m`:stuff',3),(17,'pravesh:`m`:hello',11),(18,'b:`m`:We are virgin',12),(21,'user:`m`:hey',1),(22,'user:`m`:whats up',1);
/*!40000 ALTER TABLE `LOUNGE_LOG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOUNGE_USERS`
--

DROP TABLE IF EXISTS `LOUNGE_USERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LOUNGE_USERS` (
  `L_ID` int(10) NOT NULL AUTO_INCREMENT,
  `L_USERNAME` varchar(256) NOT NULL,
  `L_PWD` varchar(256) NOT NULL,
  `L_ONLINE` int(1) NOT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOUNGE_USERS`
--

LOCK TABLES `LOUNGE_USERS` WRITE;
/*!40000 ALTER TABLE `LOUNGE_USERS` DISABLE KEYS */;
INSERT INTO `LOUNGE_USERS` VALUES (19,'user','$2y$10$fM8PH5Q4Pc1A5qPB77MC..0HadhWvszycSllOK5VbQByYF9Jm2emu',1),(20,'cage007','$2y$10$U1VTQxxz6YruhjMCCP/DN.7wCJvWZL4Do4hRwOg9PyZcAR7JJGSWK',0),(21,'chester','$2y$10$4HztatmkV8Amy21RYmu4GOygxY7Zd43WtHfjOJ1w0LEHts2EyxxyS',1),(22,'jesus','$2y$10$tiLMketnYgdES6lrMsPNvulAOU.yuReAaPV6pUObRi4Wx6VrXfNvu',1),(23,'god','$2y$10$3MmMRXfbh5fKOhv8c/SMp.V9vSxgBRj8/AKnnM1VDdxd0xWgTYvRW',0),(24,'banana','$2y$10$Ix3SjanyR5rLhFSYiW.btebNuQ8YrNIWKpFnjM3csOQni7TatNKve',1),(25,'pravesh','$2y$10$fEmbvqXcY6SoqoZiEOOhjezprZ2j5P0u9ad2k.Fg5kjrJld2IgDpi',1),(26,'b','$2y$10$4uMrFwfMcc3zN3g0aOrvv.GiTnkL91919fuBq9wXVgaIf/8R0/FaC',1);
/*!40000 ALTER TABLE `LOUNGE_USERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `L_VIEW_COUNT`
--

DROP TABLE IF EXISTS `L_VIEW_COUNT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `L_VIEW_COUNT` (
  `M_ID` int(255) NOT NULL,
  `VIEW_COUNT` int(255) NOT NULL,
  `MAX_VIEW` int(255) NOT NULL,
  KEY `M_ID` (`M_ID`),
  CONSTRAINT `L_VIEW_COUNT_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `LOUNGE_LOG` (`M_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `L_VIEW_COUNT`
--

LOCK TABLES `L_VIEW_COUNT` WRITE;
/*!40000 ALTER TABLE `L_VIEW_COUNT` DISABLE KEYS */;
INSERT INTO `L_VIEW_COUNT` VALUES (7,1,2);
/*!40000 ALTER TABLE `L_VIEW_COUNT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MARKET`
--

DROP TABLE IF EXISTS `MARKET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MARKET` (
  `MARKET_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORY` varchar(20) NOT NULL,
  PRIMARY KEY (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MARKET`
--

LOCK TABLES `MARKET` WRITE;
/*!40000 ALTER TABLE `MARKET` DISABLE KEYS */;
INSERT INTO `MARKET` VALUES (1,'FOOD'),(2,'CLOTHES'),(3,'EVENTS'),(4,'STATIONARY');
/*!40000 ALTER TABLE `MARKET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MARKET_NEW`
--

DROP TABLE IF EXISTS `MARKET_NEW`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MARKET_NEW` (
  `MARKET_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `IMAGE_URL` text,
  `NAME` varchar(30) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `QTY` int(11) DEFAULT '1',
  PRIMARY KEY (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MARKET_NEW`
--

LOCK TABLES `MARKET_NEW` WRITE;
/*!40000 ALTER TABLE `MARKET_NEW` DISABLE KEYS */;
INSERT INTO `MARKET_NEW` VALUES (10,'https://lamp.ms.wits.ac.za/~s1965919/uploads/0.jpeg','Acer Asphire 1',3999.99,'Electronics','Operating SystemWindows 10 HomeProcessorCeleronProcessor TypeN4000Memory Type4 GB DDR4 SDRAMDisplay Size14\"Storage64 GB eMMCGraphicsIntel? UHD Graphics 600WiFiIEEE 802.11acWarranty Period12 MonthsWeight1.65ColorBlueBluetoothYesRear CameraNoFront CameraYes',5),(11,'https://lamp.ms.wits.ac.za/~s1965919/uploads/11.png','Asus Laptop 15',8999.99,'Electronics','Whether for work or play, ASUS M509 is the entry-level laptop that delivers powerful performance and immersive visuals. Its NanoEdge display boasts wide 178? viewing angles and a matte anti-glare coating for a truly engaging experience. Inside, it?s powered by up to AMD Ryzen? processor with 8GB RAM andf a fast 512GB SSD gives you the perfect combination of large storage capacity and fast data read/write speeds.',6),(12,'https://lamp.ms.wits.ac.za/~s1965919/uploads/12.jpeg','Lenovo ThinkPad UltraSlim Supe',1193.62,'Electronics','PRODUCT DETAILS\n\nBrand:Lenovo\n\nFormat:DVD\n\nType:External\n\nConnection:USB\n\nLenovo ThinkPad UltraSlim USB DVD Burner - Disk drive - DVD?RW (?R DL) / DVD-RAM - SuperSpeed USB 3.0 - external - CRU - for ThinkCentre M83; ThinkPad E440; E540; X1 Carbon',9),(13,'https://lamp.ms.wits.ac.za/~s1965919/uploads/13.jpeg','Acer Nitro 5',9999.99,'Electronics','PRODUCT DETAILS\n\nOperating system:Windows OS\n\nScreen size:15.6 in\n\nInstalled memory:3 GB RAM\n\nGraphics processor:NVIDIA GPU\n\nExplore and enjoy a new and more immersive level of gaming with the Nitro 5?s full HD display and powerful gaming tech.',10),(14,'https://lamp.ms.wits.ac.za/~s1965919/uploads/14.jpeg','LeTHINK 14.1',2961.00,'Electronics','PRODUCT DETAILS\n\nScreen size:14.1 in\n\nDrive type:Solid State Drive\n\nFeatures:Gaming\n\nLeTHINK 14.1\" Ultra-thin Laptop Intel E8000 Quad Core 4G+64G SSD M.2 Computer WiFi Bluetooth HDMI Movie/Sport/Gaming Notebook For Learning office',9),(15,'https://lamp.ms.wits.ac.za/~s1965919/uploads/15.jpeg','Software Engineering',685.00,'Stationary','PRODUCT DETAILS\n\nSoftware Engineering describes the conceptual bases as well as the main methods and rules on computer programming. This book presents software engineering as a coherent',10),(16,'https://lamp.ms.wits.ac.za/~s1965919/uploads/16.jpeg','Programming.Architecture',3278.99,'Stationary','PRODUCT DETAILS\n\nProgramming.Architecture is a simple and concise introduction to the history of computing and computational design, explaining the basics of algorithmic thinking and the use of ...',10),(17,'https://lamp.ms.wits.ac.za/~s1965919/uploads/17.jpeg','SDD',100.00,'Stationary','Before you break',6),(18,'https://lamp.ms.wits.ac.za/~s1965919/uploads/18.jpeg','Sour babies',30.00,'food','OUTBURST of FLAVOUR',-1),(19,'https://lamp.ms.wits.ac.za/~s1965919/uploads/19.jpeg','fountain pen',100.00,'Stationary','pen for writing',10),(20,'https://lamp.ms.wits.ac.za/~s1965919/uploads/20.jpeg','Wits Burger',90.00,'food','Best burger in the South',7),(22,'https://lamp.ms.wits.ac.za/~s1965919/uploads/22.jpg','Neko Station',0.00,'Electronics','The PlayStation 5 (PS5) is an upcoming home video game console developed by Sony Interactive Entertainment. Announced in 2019 as the successor to the PlayStation 4, it is scheduled to launch in late 2020.\n\nBackward compatibility:?Most PlayStation 4 and PlayStation VR games\n\nCPU:?8-core AMD Zen 2, variable frequency, up to 3.5 GHz\n\nRemovable storage:?Internal (user upgradeable) NVMe M.2 SSD, or external USB-b...\n\nGraphics:?Custom AMD RDNA 2, variable frequency, up to 2.23 GHz\n\nAll this and it looks like a neko',9),(23,'https://lamp.ms.wits.ac.za/~s1965919/uploads/23.jpg','hazard',90.00,'clothes','Best Brand around',10);
/*!40000 ALTER TABLE `MARKET_NEW` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PURCHASES`
--

DROP TABLE IF EXISTS `PURCHASES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PURCHASES` (
  `STUDENT_NO` varchar(20) NOT NULL,
  `MARKET_ID` int(11) unsigned NOT NULL,
  `IMAGE_URL` text,
  `NAME` varchar(30) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PURCHASE_DATE` date NOT NULL,
  KEY `STUDENT_NO` (`STUDENT_NO`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `PURCHASES_ibfk_1` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PURCHASES`
--

LOCK TABLES `PURCHASES` WRITE;
/*!40000 ALTER TABLE `PURCHASES` DISABLE KEYS */;
INSERT INTO `PURCHASES` VALUES ('1234',17,'https://lamp.ms.wits.ac.za/~s1965919/uploads/17.jpeg','SDD',100.00,'Stationary','Before you break','2020-09-18'),('1234',17,'https://lamp.ms.wits.ac.za/~s1965919/uploads/17.jpeg','SDD',100.00,'Stationary','Before you break','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',24,'https://lamp.ms.wits.ac.za/~s1965919/uploads/24.jpg','Perfect Cell Station 5',1.00,'Electronics','5','2020-09-18'),('1234',17,'https://lamp.ms.wits.ac.za/~s1965919/uploads/17.jpeg','SDD',100.00,'Stationary','Before you break','2020-09-20'),('1234',17,'https://lamp.ms.wits.ac.za/~s1965919/uploads/17.jpeg','SDD',100.00,'Stationary','Before you break','2020-09-20'),('1173',12,'https://lamp.ms.wits.ac.za/~s1965919/uploads/12.jpeg','Lenovo ThinkPad UltraSlim Supe',1193.62,'Electronics','PRODUCT DETAILS\n\nBrand:Lenovo\n\nFormat:DVD\n\nType:External\n\nConnection:USB\n\nLenovo ThinkPad UltraSlim USB DVD Burner - Disk drive - DVD?RW (?R DL) / DVD-RAM - SuperSpeed USB 3.0 - external - CRU - for ThinkCentre M83; ThinkPad E440; E540; X1 Carbon','2020-09-21');
/*!40000 ALTER TABLE `PURCHASES` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for CART
--





--
-- Table structure for table `RATINGS`
--

DROP TABLE IF EXISTS `RATINGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RATINGS` (
  `STUDENT_NO` varchar(20) NOT NULL,
  `MARKET_ID` int(11) unsigned NOT NULL,
  `RATING` float NOT NULL,
  `REVIEW` text,
  PRIMARY KEY (`STUDENT_NO`,`MARKET_ID`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `RATINGS_ibfk_1` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`),
  CONSTRAINT `RATINGS_ibfk_2` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET_NEW` (`MARKET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RATINGS`
--

LOCK TABLES `RATINGS` WRITE;
/*!40000 ALTER TABLE `RATINGS` DISABLE KEYS */;
INSERT INTO `RATINGS` VALUES ('1173',15,4,'bkjhjk'),('1234',10,5,'good'),('1234',12,3,'this is so good'),('1234',17,5,''),('1234',18,5,'so yummy'),('1234',20,5,'not bad'),('1234',22,5,'awesome!!!!'),('694569',10,2,''),('694569',12,5,'');
/*!40000 ALTER TABLE `RATINGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATIONARY`
--

DROP TABLE IF EXISTS `STATIONARY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STATIONARY` (
  `STATIONARY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MARKET_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` decimal(6,2) NOT NULL,
  PRIMARY KEY (`STATIONARY_ID`),
  KEY `MARKET_ID` (`MARKET_ID`),
  CONSTRAINT `STATIONARY_ibfk_1` FOREIGN KEY (`MARKET_ID`) REFERENCES `MARKET` (`MARKET_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STATIONARY`
--

LOCK TABLES `STATIONARY` WRITE;
/*!40000 ALTER TABLE `STATIONARY` DISABLE KEYS */;
INSERT INTO `STATIONARY` VALUES (1,4,'pen',6.00),(2,4,'pencil',6.00);
/*!40000 ALTER TABLE `STATIONARY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATIONARY_RATINGS`
--

DROP TABLE IF EXISTS `STATIONARY_RATINGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STATIONARY_RATINGS` (
  `STATIONARY_ID` int(11) NOT NULL,
  `STUDENT_NO` varchar(20) NOT NULL,
  `RATING` double DEFAULT NULL,
  PRIMARY KEY (`STATIONARY_ID`,`STUDENT_NO`),
  KEY `STUDENT_NO` (`STUDENT_NO`),
  CONSTRAINT `STATIONARY_RATINGS_ibfk_1` FOREIGN KEY (`STATIONARY_ID`) REFERENCES `STATIONARY` (`STATIONARY_ID`),
  CONSTRAINT `STATIONARY_RATINGS_ibfk_2` FOREIGN KEY (`STUDENT_NO`) REFERENCES `STUDENTS` (`STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STATIONARY_RATINGS`
--

LOCK TABLES `STATIONARY_RATINGS` WRITE;
/*!40000 ALTER TABLE `STATIONARY_RATINGS` DISABLE KEYS */;
INSERT INTO `STATIONARY_RATINGS` VALUES (1,'1234',2),(2,'1234',4);
/*!40000 ALTER TABLE `STATIONARY_RATINGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STUDENTS`
--

DROP TABLE IF EXISTS `STUDENTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `STUDENTS` (
  `STUDENT_NO` varchar(20) NOT NULL,
  `FNAME` varchar(20) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `PASSWORD` text NOT NULL,
  `EMAIL_ADDRESS` varchar(100) NOT NULL,
  `CONTACT_NO` varchar(15) NOT NULL,
  `KUDU_BUCKS` decimal(7,2) DEFAULT '10000.00',
  `PP_URL` text,
  PRIMARY KEY (`STUDENT_NO`),
  UNIQUE KEY `EMAIL_ADDRESS` (`EMAIL_ADDRESS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STUDENTS`
--

LOCK TABLES `STUDENTS` WRITE;
/*!40000 ALTER TABLE `STUDENTS` DISABLE KEYS */;
INSERT INTO `STUDENTS` VALUES ('','','','$2y$10$uA3clFh/g4Qv9zO63Id6.ehCCZzPypnzcbIDvu9c.56lj04QS5M9G','','',9999.99,NULL),('0000000','Test','Test','$2y$10$qfdk7GtJox.vmlDuAeYRLOgrFhbqtq9s/hbktE0DcQSDnxBenLrQy','test@testmail.com','0000000000',9999.99,NULL),('1000','ss','aa','123','sjs@jaj.com','12222',9999.99,NULL),('1173','xnx','xbx','$2y$10$sOHWRu.KM1kpUo5qcEuBH.9qFR7ZOX4chQArW7f1G02QDFD9UIpdu','w@b.com','28383',806.39,'photo'),('1200','Da','AA','123','Aqs@gmail.com','0199',9999.99,NULL),('122','da','sa','$2y$10$R/c8ZLDR8UPUydCNlJpULueEbqqYyQQWFPrgRQdMaQUhfoYqWjbr.','12@gmail.com','062111',9999.99,NULL),('1234','dave','moswedi','$2y$10$cyH0zq2FW9PHvDftf0PhEuFjJ./I9RC/j5iyrA25Nedk6GBf5v6AO','dave@gmail.com','0834561234',6611.99,'https://lamp.ms.wits.ac.za/~s1965919/ProfilePics/1234.png'),('12345','test','yoshi ','$2y$10$OFOOirLZVpKGrJAcjqGChuQ62cTlStnHFCpmnpvMXbyYnZ05xk/Tu','chris@gmail.com','0852523693',9999.99,'https://lamp.ms.wits.ac.za/~s1965919/ProfilePics/12345.jpg'),('123456','Jesus','Christ','password','jesus@christ.com','0712311324',9999.99,'photo'),('123456789','PasswordIs','Student','$2y$10$503YgJtEuw.oPL65d1FT9uKubrNYAgdfnJKdEPT561eqN7IRJUHu.','student@gmail.com','0812345456',9999.99,NULL),('1234677','yfh','hk','$2y$10$Y9BZkb3WwPnb4td6JyCX5eOZJh9qyrUj8SO/NMHU2ipd08tHjJktO','saas@gmail.com','0244298',9999.99,NULL),('12355','qwq','2`','$2y$10$Dex/oeOGqfHbgmoMhcR5ZOzU2K4r0ip.PlgJM2W7uvdtouJlhLv2q','aada@gmail.com','dad',9999.99,NULL),('1299','Da','DD','$2y$10$CjhqgJKzDJlJTRf9W8VLmOMVajjs2ISRWNLIuGUv8auquU2.gD.wG','ddda@gmail.com','062412541',9999.99,NULL),('200','aa','aa','$2y$10$OGtukmLbEV6uoESFDFWYNOsYmaN3VbfMIijwUAu2KcEVnZRoiRvVu','ssala@gmail.com','01818',9999.99,NULL),('69420','Karma','Sutra','$2y$10$ibEmIvL7VLNz.KMBIhwOaecRw8OihEnTr1sdjoIdwAX0iyy5Lxx7S','sultra@gmail.com','0116969420',9999.99,NULL),('694569','Quentin ','Papadoupolous','$2y$10$9JZOJBfj3eHm9aX69sTG5OijzbCb1GtmZNIRfvPyv3RhVV2zG348S','p@g.com','00000000',9999.99,NULL),('7777777','Cage','Siya','$2y$10$W8KgmJrNGPs8tvmzF/xpt.KMWOhg.4Adyls93Qiud11yCQ0orrCui','Siya@cage.com','555354120',9999.99,NULL);
/*!40000 ALTER TABLE `STUDENTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USERS`
--

DROP TABLE IF EXISTS `USERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USERS` (
  `USERS_STUDENT_NO` varchar(20) NOT NULL,
  `USERS_PASSWORD` longtext NOT NULL,
  `USERS_FNAME` varchar(100) NOT NULL,
  `USERS_LNAME` varchar(100) NOT NULL,
  `USERS_CONTACT_NO` char(10) NOT NULL,
  `USERS_EMAIL_ADDRESS` varchar(100) NOT NULL,
  PRIMARY KEY (`USERS_STUDENT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USERS`
--

LOCK TABLES `USERS` WRITE;
/*!40000 ALTER TABLE `USERS` DISABLE KEYS */;
INSERT INTO `USERS` VALUES ('','$2y$10$c51Oa0lDc/xcKX2TRfc.RuGYRbOHONpBbOtXmVwF30xjd3ekmupAO','','','',''),('01234567','$2y$10$B2ANktC9PIeTayp.EdfOqObu/70KhoVfbDyyqkbOhNwsVGbNGkeB.','Siya','Siya','078','afhkk'),('111','111','Siya','Siya','555','Siya'),('1111','$2y$10$8rN/FK5QhnzbmN/xO8qV4ept2w.dBY9xkj55bSRjg8Sn87W7HJV5K','S','S','123','S'),('112','111','Siya','Siya','555','Siya'),('113','113','Siya','Siya','555','Siya'),('114','113','Siya','Siya','555','Siya'),('115','q15','siya','siya','555','siya'),('121212','93279e3308bdbbeed946fc965017f67a','qwerty','wet','083','a@b.com'),('123','$2y$10$H.gZtRBTQ/c313UIasOcm.AvbA/fMhVKVdtfqLFS/En4Lfbb3H1Wy','Siya','Siya','0123','Siya'),('1234','$2y$10$cyH0zq2FW9PHvDftf0PhEuFjJ./I9RC/j5iyrA25Nedk6GBf5v6AO','dave','moswedi','0834561234','dave@gmail.com'),('12345','$2y$10$rM.sr13h6/hQntwB55gpAuMNsX4nYammQjrfy85qX2q5JG9eSC8xi','Siya','Siya','0123','Aaaafh'),('1234567','$2y$10$SZ82.Yf2yJ66TTvzpDsKUuWqhkUn.pBsXmLBsPE5Zja88Ws2imexK','S','S','078','S'),('123456789','$2y$10$M41p8QXqnumdEQXCpaTBTu.lp76JrjJaqTMa.UefQqnpYEZDtf3aC','Yoshi ','Yoshi ','','blessingdlamini@.com'),('1965911','$2y$10$IrP8zsovpa1sQ8t6sWG1ZOo0FSWtfE4zFCJkE9Ox3/v720bjJxeRK','Chester','Yoshi ','0632699301','blessingdlamini@rocketmail.com'),('1965912','$2y$10$4rVWbKoA.CHJF1To4ScBgu.ivzNY1R5ryPDjFoC05B2DKnbPo3WOW','Jesus','Chester','0632699301','blessingdlamini@rocketmail.com'),('1965917','$2y$10$wA6oiNfsn95eh2W2nW6z8.gtQ2V2Slg4Dfpj2Duj8LxXDPwAf6nEi','Chester','Brown','0632699301','blessingdlamini24747@gmail.com'),('1965918','$2y$10$PcyQbcRIqSYDrrTDMlBV9ewD8iWb7yxGJBQE.yf8ZvsWHtuLzjryy','God','Chester','0632699301','blessingdlamini24747@gmail.com'),('1965919','Casts','Chester','DLamini','0632699301','chester@email.com'),('1973','$2y$10$nRqVemJshKevQO7uhGt.wec.p6dJoLuIlTW2968F.wK18ehLayLMu','peter','peters','000000000','a@b.com'),('4000','$2y$10$cU6X4PuFAQ5MY0NvLDAt6.nCO/Q5/lmFSJHrpcsqPMyMTSn8p2oJi','four','four','4444','4@four.com'),('900000','900000','Peter','Retep','0616665555','peter@gmail.com'),('Siya','Siya','Siya','Siya','555','Siya');
/*!40000 ALTER TABLE `USERS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-24 12:26:44
