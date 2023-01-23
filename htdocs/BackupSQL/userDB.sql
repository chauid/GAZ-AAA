-- MySQL dump 10.19  Distrib 10.3.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: user
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
-- Table structure for table `userlist`
--

DROP TABLE IF EXISTS `userlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlist` (
  `ID` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PW` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NickName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `RegistryDate` date NOT NULL,
  `Asset` int(11) NOT NULL,
  `UserTag` char(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '태그 없음',
  `Phone` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Birth` date DEFAULT NULL,
  `HomeTown` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=euckr COLLATE=euckr_korean_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlist`
--

LOCK TABLES `userlist` WRITE;
/*!40000 ALTER TABLE `userlist` DISABLE KEYS */;
INSERT INTO `userlist` VALUES ('91dlwnsgh','a63837717d5141e83ccd98800fe7184370f6be388f99fda117e6d4440520feee',' 이준호','skul9679','2022-12-14',200000,'태그 없음','01023139679',NULL,NULL),('admin','1cf23a9673422d3d890752dbe9aa7971f665c9c4a896da098c87abc9104bf582','관리자','관리자','2022-12-07',81587,'프로코인러','00000000000','2000-12-28','광명'),('asd','a77f84d2f559ac669318cf4a1f7db8db26842441b5a6f9e8b698124cb684692a','김김김','김김김','2022-12-12',200000,'태그 없음','01000001111',NULL,NULL),('auser','fd14a0af9611923b38614a7bb1e34fac768a73f72c06bdf966f42faa46d5f993','강명진','똥먹고밥싸기','2022-12-11',50152,'태그 없음','01062868162',NULL,NULL),('baby','47a2e2defd239fc779e521175682f708e01d6279261b1cec1931c17f8a8a3866','응애','응애 나 애기','2022-12-12',158988,'태그 없음','11111111111',NULL,NULL),('dearyunz','272c5ef17c2d0ef3a55d949e98b5ec42d98f784d159929cbfd06d261b3ee1cd4','지혀니','지혀니','2022-12-14',160658,'고점매수전문가','01023781726',NULL,NULL),('helloolleh','7a57d482d4e5c2c319cb2a085d535d83a1acb3892e294e054911646ead923528','이중혁','탈모조직','2022-12-14',8945,'파맛사업소','01075332837',NULL,NULL),('지눅스','4fe98a175c5cf70b9849e1e1a3ce2a015f8104db45f3ffcbc499927bcd07f51e','강명진','지눅스','2022-12-13',33408,'태그 없음','11111111111',NULL,NULL);
/*!40000 ALTER TABLE `userlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-16 17:44:16
