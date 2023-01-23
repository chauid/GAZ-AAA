-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.27-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- coins 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `coins` /*!40100 DEFAULT CHARACTER SET euckr COLLATE euckr_korean_ci */;
USE `coins`;

-- 테이블 coins.coinlist 구조 내보내기
CREATE TABLE IF NOT EXISTS `coinlist` (
  `CoinName` varchar(25) NOT NULL,
  `InitialName` char(5) NOT NULL,
  `Price` int(11) NOT NULL,
  `Delisting` tinyint(1) NOT NULL DEFAULT 0,
  `DelistingCount` int(11) NOT NULL DEFAULT -1,
  `News` text DEFAULT NULL,
  `NewsContinuous` int(11) DEFAULT -1,
  `NewsEffect` int(11) DEFAULT 0,
  `DayVolume` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`CoinName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 테이블 데이터 coins.coinlist:~31 rows (대략적) 내보내기
/*!40000 ALTER TABLE `coinlist` DISABLE KEYS */;
INSERT INTO `coinlist` (`CoinName`, `InitialName`, `Price`, `Delisting`, `DelistingCount`, `News`, `NewsContinuous`, `NewsEffect`, `DayVolume`) VALUES
	('가자코인', 'GAZA', 0, 0, 1, '', 1, 0, 0),
	('까스', 'GAS', 0, 0, 1, '', 1, 0, 0),
	('디카르코', 'DKA', 0, 1, 1, '', 1, 0, 0),
	('람다토큰', 'LAMDA', 0, 0, 1, '', 1, 0, 0),
	('리퍼리음', 'RFR', 0, 1, 1, '', 1, 0, 0),
	('리풀', 'XRP', 0, 1, 1, '', 1, 0, 0),
	('비투코인', 'BTC', 0, 0, 1, '', 1, 0, 0),
	('새럼', 'SRM', 0, 0, 1, '', 1, 0, 0),
	('서브프레임', 'SFT', 0, 0, 1, '', 1, 0, 0),
	('센드박스', 'SAND', 0, 0, 1, '', 1, 0, 0),
	('솔리나', 'SOL', 0, 0, 1, '', 1, 0, 0),
	('스틤', 'STEEM', 0, 0, 1, '', 1, 0, 0),
	('스틤달러', 'SBD', 0, 0, 1, '', 1, 0, 0),
	('승환토큰', 'SHW', 0, 0, 1, '', 1, 0, 0),
	('시바코인', 'SIBA', 0, 1, 1, '', 1, 0, 0),
	('썸띵', 'SST', 0, 0, 1, '', 1, 0, 0),
	('아르곳', 'AERGO', 0, 0, 1, '', 1, 0, 0),
	('아이쿠', 'IQ', 0, 0, 1, '', 1, 0, 0),
	('아화토큰', 'AHT', 0, 0, 1, '', 1, 0, 0),
	('앱토수', 'APT', 0, 1, 1, '', 1, 0, 0),
	('에이더', 'ADA', 0, 0, 1, '', 1, 0, 0),
	('엑스인피니티', 'AXS', 0, 0, 1, '', 1, 0, 0),
	('웨이부', 'WAVOO', 0, 0, 1, '', 1, 0, 0),
	('위밋스', 'WEMIS', 0, 0, 1, '', 1, 0, 0),
	('이더리음', 'ETH', 0, 0, 1, '', 1, 0, 0),
	('체인링쿠', 'LINK', 0, 0, 1, '', 1, 0, 0),
	('칠리츠', 'CHZ', 0, 0, 1, '', 1, 0, 0),
	('코스모수', 'ATOM', 0, 0, 1, '', 1, 0, 0),
	('폴리콘', 'MATIC', 0, 0, 1, '', 1, 0, 0),
	('풀로우', 'FULOW', 0, 0, 1, '', 1, 0, 0),
	('헌투', 'HUNTO', 0, 0, 1, '', 1, 0, 0);
/*!40000 ALTER TABLE `coinlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
