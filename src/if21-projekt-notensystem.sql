
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
-- Table structure for table `schüler`
--

DROP TABLE IF EXISTS `schüler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schüler` (
  `Schüler-ID` int(11) NOT NULL AUTO_INCREMENT,
  `Schüler-Name` text NOT NULL,
  `Passwort` text NOT NULL,
  PRIMARY KEY (`Schüler-ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schüler`
--

LOCK TABLES `schüler` WRITE;
/*!40000 ALTER TABLE `schüler` DISABLE KEYS */;
INSERT INTO `schüler` VALUES (1,'beispielschüler','$2y$10$KHkUwP42UFBn9rM7Dwb7Iulh/J5JTECbf6HM2nE.POW.EwflYq8je');
/*!40000 ALTER TABLE `schüler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schüleransicht`
--

DROP TABLE IF EXISTS `schüleransicht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schüleransicht` (
  `Schüler-ID` int(11) NOT NULL,
  `Lehrer-Name` text NOT NULL,
  `Kurs` text NOT NULL,
  `Note` int(2) NOT NULL,
  `Halbjahr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schüleransicht`
--

LOCK TABLES `schüleransicht` WRITE;
/*!40000 ALTER TABLE `schüleransicht` DISABLE KEYS */;
INSERT INTO `schüleransicht` VALUES (1,'Klingebiel','if21',12,0),(1,'Klingebiel','if21',13,1),(1,'Klingebiel','if21',10,2),(1,'Klingebiel','if21',8,3),(1,'Klingebiel','if21',11,4),(1,'Klingebiel','if21',15,5),(1,'Salomon','Mathematik',15,0),(1,'Salomon','Mathematik',12,1),(1,'Salomon','Mathematik',7,2),(1,'Salomon','Mathematik',13,3),(1,'Salomon','Mathematik',0,4),(1,'Salomon','Mathematik',6,5);
/*!40000 ALTER TABLE `schüleransicht` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

