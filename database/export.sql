-- MySQL dump 10.14  Distrib 5.5.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: WEB
-- ------------------------------------------------------
-- Server version	5.5.37-MariaDB-log

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
-- Table structure for table `Items`
--

DROP DATABASE IF EXISTS n8975698;
CREATE DATABASE n8975698;

USE n8975698;

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `ID` varchar(255) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `SUBURB` varchar(255) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES ('537cd0d5f2c74','7th Brigade Park, Chermside','Delaware St','Chermside',-27.37893,153.04461),('537cd0d5f4122','Annerley Library Wifi','450 Ipswich Road','Annerley, 4103',-27.50942285,153.0333218),('537cd0d600e73','Ashgrove Library Wifi','87 Amarina Avenue','Ashgrove, 4060',-27.44394629,152.9870981),('537cd0d601e8e','Banyo Library Wifi','284 St. Vincents Road','Banyo, 4014',-27.37396641,153.0783234),('537cd0d602f46','Booker Place Park','Birkin Rd & Sugarwood St','Bellbowrie',-27.56353,152.89372),('537cd0d603fc1','Bracken Ridge Library Wifi','Corner Bracken and Barrett Street','Bracken Ridge, 4017',-27.31797261,153.0378735),('537cd0d6063bf','Brisbane Botanic Gardens','Mt Coot-tha Rd','Toowong',-27.47724,152.97599),('537cd0d60746a','Brisbane Square Library Wifi','Brisbane Square, 266 George Street','Brisbane, 4000',-27.47091173,153.0224598),('537cd0d6084f9','Bulimba Library Wifi','Corner Riding Road & Oxford Street','Bulimba, 4171',-27.45203086,153.0628242),('537cd0d6096ab','Carina Library Wifi','Corner Mayfield Road & Nyrang Street','Carina, 4152',-27.49169314,153.0912127),('537cd0d60a6c9','Carindale Library Wifi','The Home and Leisure Centre, Corner Carindale Street  & Banchory Court, Westfield Carindale Shopping Centre','Carindale, 4152',-27.50475928,153.1003965),('537cd0d60b761','Carindale Recreation Reserve','Cadogan and Bedivere Sts','Carindale',-27.497,153.11105),('537cd0d60c805','Chermside Library Wifi','375 Hamilton  Road','Chermside, 4032',-27.3856032,153.0349028),('537cd0d60d83c','City Botanic Gardens Wifi','Alice Street','Brisbane City',-27.47561,153.03005),('537cd0d60e933','Coopers Plains Library Wifi','107 Orange Grove Road','Coopers Plains, 4108',-27.56510509,153.0403183),('537cd0d60f9e1','Corinda Library Wifi','641 Oxley Road','Corinda, 4075',-27.53880237,152.9809091),('537cd0d610afd','D.M. Henderson Park','Granadilla St','MacGregor',-27.57745,153.07603),('537cd0d611b71','Einbunpin Lagoon','Brighton Rd','Sandgate',-27.31947,153.06822),('537cd0d612c17','Everton Park Library Wifi','561 South Pine Road','Everton park, 4053',-27.4053336,152.9904205),('537cd0d613cb1','Fairfield Library Wifi','Fairfield Gardens Shopping Centre, 180 Fairfield Road','Fairfield, 4103',-27.50909038,153.0259709),('537cd0d614ed9','Garden City Library Wifi','Garden City Shopping Centre, Corner Logan and Kessels Road','Upper Mount Gravatt, 4122',-27.56244221,153.0809183),('537cd0d615ff3','Glindemann Park','Logan Rd','Holland Park West',-27.52552,153.06923),('537cd0d6174f6','Grange Library Wifi','79 Evelyn Street','Grange, 4051',-27.42531193,153.0174728),('537cd0d618d15','Gregory Park','Baroona Rd','Paddington',-27.467,152.99981),('537cd0d619e00','Guyatt Park','Sir Fred Schonell Dve','St Lucia',-27.49297,153.00187),('537cd0d61aeda','Hamilton Library Wifi','Corner Racecourt Road and Rossiter Parade','Hamilton, 4007',-27.43790137,153.0642227),('537cd0d61c126','Hidden World Park','Roghan Rd','Fitzgibbon',-27.33971701,153.034981),('537cd0d61d253','Holland Park Library Wifi','81 Seville Road','Holland Park, 4121',-27.52292286,153.0722921),('537cd0d61e429','Inala Library Wifi','Inala Shopping centre, Corsair Ave','Inala, 4077',-27.59828574,152.9735217),('537cd0d61f54a','Indooroopilly Library Wifi','Indrooroopilly Shopping centre, Level 4, 322 Moggill Road','Indooroopilly, 4068',-27.49764287,152.9736471),('537cd0d6206aa','Kalinga Park','Kalinga St','Clayfield',-27.40666,153.05217),('537cd0d62171e','Kenmore Library Wifi','Kenmore Village Shopping Centre, Brookfield Road','Kenmore, 4069',-27.50592852,152.9386437),('537cd0d6229c1','Mitchelton Library Wifi','37 Helipolis Parada','Mitchelton, 4053',-27.41704165,152.9783402),('537cd0d623940','Mt Coot-tha Botanic Gardens Library Wifi','Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road','Toowong, 4066',-27.47529908,152.9760412),('537cd0d624859','Mt Gravatt Library Wifi','8 Creek Road','Mt Gravatt, 4122',-27.53855482,153.0802628),('537cd0d6256fc','Mt Ommaney Library Wifi','Mt Ommaney Shopping Centre, 171 Dandenong Road','Mt Ommaney, 4074',-27.54824198,152.9378099),('537cd0d626691','New Farm Library Wifi','135 Sydney Street','New Farm, 4005',-27.46736574,153.0495841),('537cd0d627780','Nundah Library Wifi','1 Bage Street','Nundah, 4012',-27.40125908,153.0583751),('537cd0d628713','Oriel Park','Cnr of Alexandra & Lancaster Rds','Ascot',-27.42928,153.05768),('537cd0d6296f4','Orleigh Park','Hill End Tce','West End',-27.48995,153.00326),('537cd0d62a968','Post Office Square','Queen & Adelaide Sts','Brisbane',-27.46735,153.02735),('537cd0d62ba06','Rocks Riverside Park','Counihan Rd','Seventeen Mile Rocks',-27.54153,152.95913),('537cd0d62ca98','Sandgate Library Wifi','Seymour Street','Sandgate, 4017',-27.32060523,153.0704927),('537cd0d62dbfe','Stones Corner Library Wifi','280 Logan Road','Stones Corner, 4120',-27.49803575,153.043655),('537cd0d62edc7','Sunnybank Hills Library Wifi','Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads','Sunnybank Hills, 4109',-27.6109253,153.0550706),('537cd0d6301c2','Toowong Library Wifi','Toowon Village Shopping Centre, Sherwood Road','Toowong, 4066',-27.48505116,152.9925091),('537cd0d631345','West End Library Wifi','178 - 180 Boundary Street','West End, 4101',-27.48245078,153.0120763),('537cd0d6324c5','Wynnum Library Wifi','Wynnum Civic Centre, 66 Bay Terrace','Wynnum, 4178',-27.44244894,153.1731968),('537cd0d633719','Zillmere Library Wifi','Corner Jennings Street and Zillmere Road','Zillmere, 4034',-27.36014232,153.0407898);
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Members`
--

DROP TABLE IF EXISTS `Members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Members` (
  `ID` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `SEX` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Members`
--

LOCK TABLES `Members` WRITE;
/*!40000 ALTER TABLE `Members` DISABLE KEYS */;
INSERT INTO `Members` VALUES ('1','admin','','admin',1),('2','Tony','vvilp@163.com','tony',1),('537cd0e782da6','asd','asd@163.com','asd',0);
/*!40000 ALTER TABLE `Members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviews` (
  `ID` varchar(255) NOT NULL,
  `USERID` varchar(255) NOT NULL,
  `ITEMID` varchar(255) NOT NULL,
  `CONTENT` varchar(255) NOT NULL,
  `RATE` int(11) NOT NULL,
  `POSTDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `USERID` (`USERID`),
  KEY `ITEMID` (`ITEMID`),
  CONSTRAINT `Reviews_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `Members` (`ID`),
  CONSTRAINT `Reviews_ibfk_2` FOREIGN KEY (`ITEMID`) REFERENCES `Items` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
INSERT INTO `Reviews` VALUES ('537cd0f64586e','537cd0e782da6','537cd0d5f2c74','I like this wifi\r\n',5,'2014-05-21 16:14:46'),('537cd0faf0f33','537cd0e782da6','537cd0d5f2c74','asd',5,'2014-05-21 16:14:50'),('537cd155ab139','537cd0e782da6','537cd0d5f2c74','asdasdasd',5,'2014-05-21 16:16:21'),('537cd5a5891d6','537cd0e782da6','537cd0d5f4122','5',5,'2014-05-21 16:34:45'),('537cd5b88d082','537cd0e782da6','537cd0d600e73','56',4,'2014-05-21 16:35:04');
/*!40000 ALTER TABLE `Reviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-22  2:58:32
