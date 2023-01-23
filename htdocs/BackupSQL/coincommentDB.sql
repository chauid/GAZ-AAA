-- MySQL dump 10.19  Distrib 10.3.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: coinscomment
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
-- Table structure for table `까스`
--

DROP TABLE IF EXISTS `까스`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `까스` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `까스`
--

LOCK TABLES `까스` WRITE;
/*!40000 ALTER TABLE `까스` DISABLE KEYS */;
INSERT INTO `까스` VALUES (49,'2022-12-09 16:33:26','오늘 입성했습니다.','똥먹고밥싸기','태그 없음'),(50,'2022-12-13 00:10:57','이제 까스비 오른답니다. 모두 탑승~','똥먹고밥싸기','태그 없음');
/*!40000 ALTER TABLE `까스` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `디카르코`
--

DROP TABLE IF EXISTS `디카르코`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `디카르코` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `디카르코`
--

LOCK TABLES `디카르코` WRITE;
/*!40000 ALTER TABLE `디카르코` DISABLE KEYS */;
INSERT INTO `디카르코` VALUES (1,'2022-12-11 13:20:00','가즈아!','똥먹고밥싸기','태그 없음');
/*!40000 ALTER TABLE `디카르코` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `람다토큰`
--

DROP TABLE IF EXISTS `람다토큰`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `람다토큰` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `람다토큰`
--

LOCK TABLES `람다토큰` WRITE;
/*!40000 ALTER TABLE `람다토큰` DISABLE KEYS */;
/*!40000 ALTER TABLE `람다토큰` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `리퍼리음`
--

DROP TABLE IF EXISTS `리퍼리음`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `리퍼리음` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `리퍼리음`
--

LOCK TABLES `리퍼리음` WRITE;
/*!40000 ALTER TABLE `리퍼리음` DISABLE KEYS */;
/*!40000 ALTER TABLE `리퍼리음` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `리풀`
--

DROP TABLE IF EXISTS `리풀`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `리풀` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `리풀`
--

LOCK TABLES `리풀` WRITE;
/*!40000 ALTER TABLE `리풀` DISABLE KEYS */;
/*!40000 ALTER TABLE `리풀` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `비투코인`
--

DROP TABLE IF EXISTS `비투코인`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `비투코인` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `비투코인`
--

LOCK TABLES `비투코인` WRITE;
/*!40000 ALTER TABLE `비투코인` DISABLE KEYS */;
INSERT INTO `비투코인` VALUES (7,'2022-12-08 00:47:09','오늘 입성했습니다.','한강으로 가자','태그 없음'),(12,'2022-12-09 16:29:38','언제 오를까?','똥먹고밥싸기','태그 없음'),(14,'2022-12-12 23:46:19','영','김김김','태그 없음'),(15,'2022-12-12 23:46:22','차','김김김','태그 없음'),(16,'2022-12-12 23:47:55','꿀꺽~','관리자','프로코인러'),(17,'2022-12-13 00:10:40','비트코인은 스캠입니다','지눅스','태그 없음'),(18,'2022-12-13 00:11:30','GAZA코인 출시일 좀 알려주세요','지눅스','태그 없음'),(19,'2022-12-13 00:12:46','비투코인 백만 돌파하면 기념으로 추가하겠습니다.','관리자','프로코인러'),(20,'2022-12-13 00:14:34','따상가즈아','지눅스','태그 없음'),(21,'2022-12-14 13:13:13','따따상가즈아','지혀니','고점매수전문가'),(22,'2022-12-16 02:04:10','하나 주실분~~~ㅠㅠ\r\nㅋㅋㅋㅋ','탈모조직','파맛사업소');
/*!40000 ALTER TABLE `비투코인` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `새럼`
--

DROP TABLE IF EXISTS `새럼`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `새럼` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `새럼`
--

LOCK TABLES `새럼` WRITE;
/*!40000 ALTER TABLE `새럼` DISABLE KEYS */;
INSERT INTO `새럼` VALUES (1,'2022-12-16 02:05:21','믿습니까~','탈모조직','파맛사업소');
/*!40000 ALTER TABLE `새럼` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `서브프레임`
--

DROP TABLE IF EXISTS `서브프레임`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `서브프레임` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `서브프레임`
--

LOCK TABLES `서브프레임` WRITE;
/*!40000 ALTER TABLE `서브프레임` DISABLE KEYS */;
/*!40000 ALTER TABLE `서브프레임` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `센드박스`
--

DROP TABLE IF EXISTS `센드박스`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `센드박스` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `센드박스`
--

LOCK TABLES `센드박스` WRITE;
/*!40000 ALTER TABLE `센드박스` DISABLE KEYS */;
/*!40000 ALTER TABLE `센드박스` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `솔리나`
--

DROP TABLE IF EXISTS `솔리나`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `솔리나` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `솔리나`
--

LOCK TABLES `솔리나` WRITE;
/*!40000 ALTER TABLE `솔리나` DISABLE KEYS */;
/*!40000 ALTER TABLE `솔리나` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `스틤`
--

DROP TABLE IF EXISTS `스틤`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `스틤` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `스틤`
--

LOCK TABLES `스틤` WRITE;
/*!40000 ALTER TABLE `스틤` DISABLE KEYS */;
/*!40000 ALTER TABLE `스틤` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `스틤달러`
--

DROP TABLE IF EXISTS `스틤달러`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `스틤달러` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `스틤달러`
--

LOCK TABLES `스틤달러` WRITE;
/*!40000 ALTER TABLE `스틤달러` DISABLE KEYS */;
INSERT INTO `스틤달러` VALUES (1,'2022-12-16 01:38:21','모두 입성하세요.','관리자','프로코인러'),(2,'2022-12-16 01:38:29','모조건 오릅니다.','관리자','프로코인러'),(3,'2022-12-16 01:39:32','달달합니다 ','탈모조직','파맛사업소'),(4,'2022-12-16 02:03:24','할인 언제해요?','탈모조직','파맛사업소');
/*!40000 ALTER TABLE `스틤달러` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `시바코인`
--

DROP TABLE IF EXISTS `시바코인`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `시바코인` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `시바코인`
--

LOCK TABLES `시바코인` WRITE;
/*!40000 ALTER TABLE `시바코인` DISABLE KEYS */;
INSERT INTO `시바코인` VALUES (1,'2022-12-12 02:23:42','가격 언제 내려오냐;','명진쿤','태그 없음'),(2,'2022-12-12 02:32:40','존버하세요.','관리자','프로코인러'),(3,'2022-12-14 13:44:55','시바가 달에 올라갔다','skul9679','태그 없음');
/*!40000 ALTER TABLE `시바코인` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `썸띵`
--

DROP TABLE IF EXISTS `썸띵`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `썸띵` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `썸띵`
--

LOCK TABLES `썸띵` WRITE;
/*!40000 ALTER TABLE `썸띵` DISABLE KEYS */;
/*!40000 ALTER TABLE `썸띵` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `아르곳`
--

DROP TABLE IF EXISTS `아르곳`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `아르곳` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `아르곳`
--

LOCK TABLES `아르곳` WRITE;
/*!40000 ALTER TABLE `아르곳` DISABLE KEYS */;
/*!40000 ALTER TABLE `아르곳` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `아이쿠`
--

DROP TABLE IF EXISTS `아이쿠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `아이쿠` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `아이쿠`
--

LOCK TABLES `아이쿠` WRITE;
/*!40000 ALTER TABLE `아이쿠` DISABLE KEYS */;
/*!40000 ALTER TABLE `아이쿠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `아화토큰`
--

DROP TABLE IF EXISTS `아화토큰`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `아화토큰` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `아화토큰`
--

LOCK TABLES `아화토큰` WRITE;
/*!40000 ALTER TABLE `아화토큰` DISABLE KEYS */;
INSERT INTO `아화토큰` VALUES (1,'2022-12-14 13:02:37','아놔 왜 제가 사면 떨어지나요?','지혀니','태그 없음');
/*!40000 ALTER TABLE `아화토큰` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `앱토수`
--

DROP TABLE IF EXISTS `앱토수`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `앱토수` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `앱토수`
--

LOCK TABLES `앱토수` WRITE;
/*!40000 ALTER TABLE `앱토수` DISABLE KEYS */;
/*!40000 ALTER TABLE `앱토수` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `에이더`
--

DROP TABLE IF EXISTS `에이더`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `에이더` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `에이더`
--

LOCK TABLES `에이더` WRITE;
/*!40000 ALTER TABLE `에이더` DISABLE KEYS */;
INSERT INTO `에이더` VALUES (1,'2022-12-12 02:34:27','10만까지 가자!','관리자','프로코인러');
/*!40000 ALTER TABLE `에이더` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `엑스인피니티`
--

DROP TABLE IF EXISTS `엑스인피니티`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `엑스인피니티` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `엑스인피니티`
--

LOCK TABLES `엑스인피니티` WRITE;
/*!40000 ALTER TABLE `엑스인피니티` DISABLE KEYS */;
/*!40000 ALTER TABLE `엑스인피니티` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `웨이부`
--

DROP TABLE IF EXISTS `웨이부`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `웨이부` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `웨이부`
--

LOCK TABLES `웨이부` WRITE;
/*!40000 ALTER TABLE `웨이부` DISABLE KEYS */;
INSERT INTO `웨이부` VALUES (1,'2022-12-12 23:45:27','가즈ㅏㅏㅏㅏ\r\n','응애 나 애기','태그 없음'),(2,'2022-12-12 23:46:08','존버해 봅시다.','관리자','프로코인러'),(3,'2022-12-12 23:47:14','캬 ㅋㅋ 71에 샀는데 80 돌파했노 ㅋㅋ 안산 흑우게이 없제?','응애 나 애기','태그 없음');
/*!40000 ALTER TABLE `웨이부` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `위밋스`
--

DROP TABLE IF EXISTS `위밋스`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `위밋스` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `위밋스`
--

LOCK TABLES `위밋스` WRITE;
/*!40000 ALTER TABLE `위밋스` DISABLE KEYS */;
/*!40000 ALTER TABLE `위밋스` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `이더리음`
--

DROP TABLE IF EXISTS `이더리음`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `이더리음` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `이더리음`
--

LOCK TABLES `이더리음` WRITE;
/*!40000 ALTER TABLE `이더리음` DISABLE KEYS */;
/*!40000 ALTER TABLE `이더리음` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `이더리음클래식`
--

DROP TABLE IF EXISTS `이더리음클래식`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `이더리음클래식` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `이더리음클래식`
--

LOCK TABLES `이더리음클래식` WRITE;
/*!40000 ALTER TABLE `이더리음클래식` DISABLE KEYS */;
/*!40000 ALTER TABLE `이더리음클래식` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `체인링쿠`
--

DROP TABLE IF EXISTS `체인링쿠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `체인링쿠` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `체인링쿠`
--

LOCK TABLES `체인링쿠` WRITE;
/*!40000 ALTER TABLE `체인링쿠` DISABLE KEYS */;
/*!40000 ALTER TABLE `체인링쿠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `칠리츠`
--

DROP TABLE IF EXISTS `칠리츠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `칠리츠` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `칠리츠`
--

LOCK TABLES `칠리츠` WRITE;
/*!40000 ALTER TABLE `칠리츠` DISABLE KEYS */;
/*!40000 ALTER TABLE `칠리츠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `코스모수`
--

DROP TABLE IF EXISTS `코스모수`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `코스모수` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `코스모수`
--

LOCK TABLES `코스모수` WRITE;
/*!40000 ALTER TABLE `코스모수` DISABLE KEYS */;
/*!40000 ALTER TABLE `코스모수` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `폴리콘`
--

DROP TABLE IF EXISTS `폴리콘`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `폴리콘` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `폴리콘`
--

LOCK TABLES `폴리콘` WRITE;
/*!40000 ALTER TABLE `폴리콘` DISABLE KEYS */;
/*!40000 ALTER TABLE `폴리콘` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `풀로우`
--

DROP TABLE IF EXISTS `풀로우`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `풀로우` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `풀로우`
--

LOCK TABLES `풀로우` WRITE;
/*!40000 ALTER TABLE `풀로우` DISABLE KEYS */;
/*!40000 ALTER TABLE `풀로우` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `헌투`
--

DROP TABLE IF EXISTS `헌투`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `헌투` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `CommentTime` datetime NOT NULL,
  `Comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserTag` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Number`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `헌투`
--

LOCK TABLES `헌투` WRITE;
/*!40000 ALTER TABLE `헌투` DISABLE KEYS */;
/*!40000 ALTER TABLE `헌투` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-16 17:45:03
