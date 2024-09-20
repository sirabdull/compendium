-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: candidates
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user` varchar(67) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin_type` varchar(67) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('sirabdull','dashnov4','');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_accounts`
--

LOCK TABLES `admin_accounts` WRITE;
/*!40000 ALTER TABLE `admin_accounts` DISABLE KEYS */;
INSERT INTO `admin_accounts` VALUES (5,'sirabdull','dashnov4','super');
/*!40000 ALTER TABLE `admin_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `feedback` longtext NOT NULL,
  `isresolved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Akintayo jide Abdullah','sirabdull70@gmail.com','we didnt get enough questions.',0),(2,'Akintayo jide Abdullah','sirabdull70@gmail.com','you reaLLY TRIED',0),(3,'Akintayo jide Abdullah','sirabdull70@gmail.com','no actual issue though',0),(4,'Akintayo jide Abdullah','sirabdull70@gmail.com','he mad die',0);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(50) NOT NULL,
  `question_image` varchar(7999) /*!100301 COMPRESSED*/ NOT NULL DEFAULT '',
  `subject` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `correct_option` char(1) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'what is an adjective','','english','easy','2022','an adjective is a word that  modify or qualify or verb','an adjective is a doing word','An adjective is the name of things and places','An adjective can be termed as words that come before a noun','1'),(2,'what is a noun','','english','easy','2022','A noun is a name of aperson animal place or thing','a noun is a doing word','a noun is the big fat thign',' a nouin is an action wored','1'),(3,'who is the ftaher of english ','','english','easy','2022','mr osai','my mr Ademukadam','mr ADetumbo','MR chris','1'),(4,'in a sentence what is being reffered to as the sub','','english','easy','2022','the person doing the sentence','the action of which the person doing the sentence is carrying out','all verbs contained within the sentence','all of the above','2'),(5,'there are two main types of letter','','english','easy','2022','supernatural and extraordinary letters ','simple and complex letters','formal and informal letters','letter of request and letter of Apology','3'),(6,'50 x 50 divided by 80 ','','calculation','easy','2022','1000','40','30','94','2'),(7,'who isthe founder of mathematice','','calculation','easy','2022','mark zugerberg','elon musk','mk mukadam','mr folorunsho samuelo','4'),(8,'who id the president of NIgeria','','general','easy','2022','tinubu folorunsho','tinubu ahmed','tinubu micheal','tinibu oga','2'),(9,'how ,many states do we have in Nigeria','','english','easy','2022','36','37','35','55','1'),(10,'i have 10 apples','','english','','2022','','','','','');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registerd_candidates`
--

DROP TABLE IF EXISTS `registerd_candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registerd_candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `email` varchar(67) NOT NULL,
  `fullname` varchar(46) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `verification` tinyint(1) NOT NULL,
  `verification_code` varchar(67) NOT NULL,
  `subscribed` tinyint(1) NOT NULL,
  `subscription_type` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registerd_candidates`
--

LOCK TABLES `registerd_candidates` WRITE;
/*!40000 ALTER TABLE `registerd_candidates` DISABLE KEYS */;
INSERT INTO `registerd_candidates` VALUES (2,'Das12345','sirabdull84@gmail.com','Akintayo Abdullah','2023-12-08 04:00:00',1,'253213',1,'PREMIUM','08145955347'),(7,'1234567','sirabdull70@gmail.com','Akintayo jide Abdullah','2024-01-01 11:00:00',1,'568598',1,'ULTIMATE','08145931080');
/*!40000 ALTER TABLE `registerd_candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `xp` int(11) NOT NULL,
  `rating` mediumtext NOT NULL,
  `progress` varchar(3444) NOT NULL,
  `last_score` varchar(444) NOT NULL,
  `higest_score` varchar(344) NOT NULL,
  `overall_score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats`
--

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` VALUES (3,'sirabdull84@gmail.com','Akintayo Abdullah',105,'0.105','5.05','4','7',24),(5,'sirabdull70@gmail.com','Akintayo Jide',22,'0.022','0.22','0','4',14);
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribed_candidates`
--

DROP TABLE IF EXISTS `subscribed_candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribed_candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(46) NOT NULL,
  `subscription_type` varchar(50) NOT NULL,
  `subscription_date` varchar(100) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `reference` varchar(1090) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribed_candidates`
--

LOCK TABLES `subscribed_candidates` WRITE;
/*!40000 ALTER TABLE `subscribed_candidates` DISABLE KEYS */;
INSERT INTO `subscribed_candidates` VALUES (1,'sirabdull70@gmail.com','ULTIMATE','13/11/2023/00:34:17am','11/02/2024','66418992578965'),(18,'sirabdull70@gmail.com','ULTIMATE','01/01/2024/23:26:55pm','NEVER','88742980568353'),(19,'sirabdull70@gmail.com','ULTIMATE','01/01/2024/23:26:55pm','NEVER','88742980568353'),(20,'sirabdull70@gmail.com','ULTIMATE','01/01/2024/23:26:55pm','NEVER','88742980568353');
/*!40000 ALTER TABLE `subscribed_candidates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-05 14:44:15
