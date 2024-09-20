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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'what is an adjective','','english','easy','2022','an adjective is a word that  modify or qualify or verb','an adjective is a doing word','An adjective is the name of things and places','An adjective can be termed as words that come before a noun','1'),(2,'what is a noun','','english','easy','2022','A noun is a name of aperson animal place or thing','a noun is a doing word','a noun is the big fat thign',' a nouin is an action wored','1'),(3,'who is the ftaher of english ','','english','easy','2022','mr osai','my mr Ademukadam','mr ADetumbo','MR chris','1'),(4,'in a sentence what is being reffered to as the sub','','english','easy','2022','the person doing the sentence','the action of which the person doing the sentence is carrying out','all verbs contained within the sentence','all of the above','2'),(5,'there are two main types of letter','','english','easy','2022','supernatural and extraordinary letters ','simple and complex letters','formal and informal letters','letter of request and letter of Apology','3'),(6,'50 x 50 divided by 80 ','','calculation','easy','2022','1000','40','30','94','2'),(7,'who isthe founder of mathematice','','calculation','easy','2022','mark zugerberg','elon musk','mk mukadam','mr folorunsho samuelo','4'),(8,'who id the president of NIgeria','','general','easy','2022','tinubu folorunsho','tinubu ahmed','tinubu micheal','tinibu oga','2'),(9,'how ,many states do we have in Nigeria','','general','easy','2022','36','37','66','55','1');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-11 19:24:50
