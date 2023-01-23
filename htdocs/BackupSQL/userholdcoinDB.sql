-- MySQL dump 10.19  Distrib 10.3.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: user_holdcoins
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
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `91dlwnsgh`
--

LOCK TABLES `91dlwnsgh` WRITE;
/*!40000 ALTER TABLE `91dlwnsgh` DISABLE KEYS */;
INSERT INTO `91dlwnsgh` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',0,0),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `91dlwnsgh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `CoinName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',3,36815),('스틤달러',5,20317),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아이쿠',2,41120),('아화토큰',7,41665),('앱토수',0,0),('에이더',8,23297),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('이더리음클래식',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',1,65516),('폴리콘',2,41770),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asd`
--

DROP TABLE IF EXISTS `asd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asd` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asd`
--

LOCK TABLES `asd` WRITE;
/*!40000 ALTER TABLE `asd` DISABLE KEYS */;
INSERT INTO `asd` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',0,0),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `asd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auser`
--

DROP TABLE IF EXISTS `auser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auser` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auser`
--

LOCK TABLES `auser` WRITE;
/*!40000 ALTER TABLE `auser` DISABLE KEYS */;
INSERT INTO `auser` VALUES ('까스',0,0),('디카르코',1,149848),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',0,0),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('이더리음클래식',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `auser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baby`
--

DROP TABLE IF EXISTS `baby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baby` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baby`
--

LOCK TABLES `baby` WRITE;
/*!40000 ALTER TABLE `baby` DISABLE KEYS */;
INSERT INTO `baby` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',0,0),('엑스인피니티',1,6398),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `baby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dearyunz`
--

DROP TABLE IF EXISTS `dearyunz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dearyunz` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dearyunz`
--

LOCK TABLES `dearyunz` WRITE;
/*!40000 ALTER TABLE `dearyunz` DISABLE KEYS */;
INSERT INTO `dearyunz` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',2,2419671),('새럼',0,0),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',2,78357),('앱토수',0,0),('에이더',0,0),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `dearyunz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `helloolleh`
--

DROP TABLE IF EXISTS `helloolleh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `helloolleh` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helloolleh`
--

LOCK TABLES `helloolleh` WRITE;
/*!40000 ALTER TABLE `helloolleh` DISABLE KEYS */;
INSERT INTO `helloolleh` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',20,16418),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',6,11239),('엑스인피니티',0,0),('웨이부',5,19041),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
/*!40000 ALTER TABLE `helloolleh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `지눅스`
--

DROP TABLE IF EXISTS `지눅스`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `지눅스` (
  `CoinName` varchar(20) NOT NULL,
  `HoldCount` int(11) NOT NULL,
  `AveragePrice` int(11) NOT NULL,
  PRIMARY KEY (`CoinName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `지눅스`
--

LOCK TABLES `지눅스` WRITE;
/*!40000 ALTER TABLE `지눅스` DISABLE KEYS */;
INSERT INTO `지눅스` VALUES ('까스',0,0),('디카르코',0,0),('람다토큰',0,0),('리퍼리음',0,0),('리풀',0,0),('비투코인',0,0),('새럼',4,41648),('서브프레임',0,0),('센드박스',0,0),('솔리나',0,0),('스틤',0,0),('스틤달러',0,0),('시바코인',0,0),('썸띵',0,0),('아르곳',0,0),('아스터',0,0),('아이쿠',0,0),('아화토큰',0,0),('앱토수',0,0),('에이더',0,0),('엑스인피니티',0,0),('웨이부',0,0),('위밋스',0,0),('이더리음',0,0),('체인링쿠',0,0),('칠리츠',0,0),('코스모수',0,0),('폴리콘',0,0),('풀로우',0,0),('헌투',0,0);
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

-- Dump completed on 2022-12-16 17:44:43
