-- MySQL dump 10.19  Distrib 10.3.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: user_exchangedb
-- ------------------------------------------------------
-- Server version	10.3.37-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `91dlwnsgh`
--

DROP TABLE IF EXISTS `91dlwnsgh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `91dlwnsgh` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `91dlwnsgh`
--

LOCK TABLES `91dlwnsgh` WRITE;
/*!40000 ALTER TABLE `91dlwnsgh` DISABLE KEYS */;
/*!40000 ALTER TABLE `91dlwnsgh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('2022-12-12 02:34:07','에이더',10,23297,NULL),('2022-12-12 02:47:58','아이쿠',2,41120,NULL),('2022-12-12 02:48:00','코스모수',1,65516,NULL),('2022-12-12 02:48:03','폴리콘',2,41770,NULL),('2022-12-12 02:48:18','아화토큰',6,41616,NULL),('2022-12-12 02:48:21','아화토큰',3,41763,NULL),('2022-12-12 02:48:22','아화토큰',2,NULL,41762),('2022-12-12 02:48:32','스틤',1,32483,NULL),('2022-12-12 02:48:40','에이더',2,NULL,23842),('2022-12-12 23:45:08','스틤',1,38812,NULL),('2022-12-12 23:45:21','스틤',1,39150,NULL),('2022-12-12 23:46:14','웨이부',10,7874,NULL),('2022-12-12 23:53:35','웨이부',10,NULL,8040),('2022-12-16 01:38:59','스틤달러',5,20317,NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asd`
--

DROP TABLE IF EXISTS `asd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asd` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asd`
--

LOCK TABLES `asd` WRITE;
/*!40000 ALTER TABLE `asd` DISABLE KEYS */;
/*!40000 ALTER TABLE `asd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auser`
--

DROP TABLE IF EXISTS `auser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auser` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auser`
--

LOCK TABLES `auser` WRITE;
/*!40000 ALTER TABLE `auser` DISABLE KEYS */;
INSERT INTO `auser` VALUES ('2022-12-11 13:20:25','디카르코',1,149848,NULL);
/*!40000 ALTER TABLE `auser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baby`
--

DROP TABLE IF EXISTS `baby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baby` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baby`
--

LOCK TABLES `baby` WRITE;
/*!40000 ALTER TABLE `baby` DISABLE KEYS */;
INSERT INTO `baby` VALUES ('2022-12-12 23:43:13','웨이부',27,7106,NULL),('2022-12-12 23:44:12','엑스인피니티',1,6398,NULL),('2022-12-13 17:06:06','웨이부',27,NULL,5824);
/*!40000 ALTER TABLE `baby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dearyunz`
--

DROP TABLE IF EXISTS `dearyunz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dearyunz` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dearyunz`
--

LOCK TABLES `dearyunz` WRITE;
/*!40000 ALTER TABLE `dearyunz` DISABLE KEYS */;
INSERT INTO `dearyunz` VALUES ('2022-12-14 11:34:07','스틤',9,20538,NULL),('2022-12-14 11:39:27','스틤',9,NULL,20898),('2022-12-14 11:40:12','아화토큰',2,78357,NULL),('2022-12-14 12:48:25','비투코인',2,2419671,NULL);
/*!40000 ALTER TABLE `dearyunz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `helloolleh`
--

DROP TABLE IF EXISTS `helloolleh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `helloolleh` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helloolleh`
--

LOCK TABLES `helloolleh` WRITE;
/*!40000 ALTER TABLE `helloolleh` DISABLE KEYS */;
INSERT INTO `helloolleh` VALUES ('2022-12-14 19:03:55','웨이부',5,19041,NULL),('2022-12-14 19:04:20','스틤',5,20548,NULL),('2022-12-14 19:08:21','스틤',5,NULL,20625),('2022-12-14 19:09:32','스틤달러',19,5164,NULL),('2022-12-16 01:39:11','스틤달러',19,NULL,20730),('2022-12-16 01:40:26','새럼',20,16418,NULL),('2022-12-16 01:42:06','헌투',5,12071,NULL),('2022-12-16 02:00:49','헌투',5,NULL,12832),('2022-12-16 02:02:14','에이더',6,11239,NULL);
/*!40000 ALTER TABLE `helloolleh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `지눅스`
--

DROP TABLE IF EXISTS `지눅스`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `지눅스` (
  `ExchangeTime` datetime NOT NULL,
  `CoinName` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Buying` int(11) unsigned DEFAULT NULL,
  `Sell` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ExchangeTime`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `지눅스`
--

LOCK TABLES `지눅스` WRITE;
/*!40000 ALTER TABLE `지눅스` DISABLE KEYS */;
INSERT INTO `지눅스` VALUES ('2022-12-13 00:13:09','새럼',4,41648,NULL);
/*!40000 ALTER TABLE `지눅스` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-16 17:44:27
