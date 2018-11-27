-- MySQL dump 10.16  Distrib 10.1.30-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: mail
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

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
-- Table structure for table `disposition`
--

DROP TABLE IF EXISTS `disposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disposition` (
  `id_disposition` int(4) NOT NULL AUTO_INCREMENT,
  `disposition_at` varchar(50) NOT NULL,
  `disposition_date` date NOT NULL,
  `dess` text NOT NULL,
  `notification` varchar(50) NOT NULL,
  `id_mail` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_disposition`),
  KEY `id_mail` (`id_mail`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `disposition_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disposition`
--

LOCK TABLES `disposition` WRITE;
/*!40000 ALTER TABLE `disposition` DISABLE KEYS */;
INSERT INTO `disposition` VALUES (7,'bar','2018-02-27','dsafdsfdsf','penting',11,1);
/*!40000 ALTER TABLE `disposition` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `status_disposisi` AFTER INSERT ON `disposition`
 FOR EACH ROW update mail_in set status = '1' where id_mail = new.id_mail */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `instansi`
--

DROP TABLE IF EXISTS `instansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instansi` (
  `id_instansi` int(4) NOT NULL AUTO_INCREMENT,
  `instansi_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instansi`
--

LOCK TABLES `instansi` WRITE;
/*!40000 ALTER TABLE `instansi` DISABLE KEYS */;
INSERT INTO `instansi` VALUES (1,'SEKOLAH MENENGAH KEJURUAN NEGERI 1 DENPASAR','Jalan Hos Cokroaminoto No. 84 Denpasar','(0361) 422401','(0361) 425603','www.smkn1denpasar.sch.id','contact@smkn1denpasar.sch.id','logo.png');
/*!40000 ALTER TABLE `instansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_in`
--

DROP TABLE IF EXISTS `mail_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_in` (
  `id_mail` int(4) NOT NULL AUTO_INCREMENT,
  `mail_code` varchar(50) NOT NULL,
  `incoming_at` date NOT NULL,
  `mail_date` date NOT NULL,
  `mail_from` varchar(50) NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `dess` text NOT NULL,
  `status` int(5) NOT NULL,
  `file` varchar(50) NOT NULL,
  `id_mail_type` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `id_mail_type` (`id_mail_type`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `mail_in_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`),
  CONSTRAINT `mail_in_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_in`
--

LOCK TABLES `mail_in` WRITE;
/*!40000 ALTER TABLE `mail_in` DISABLE KEYS */;
INSERT INTO `mail_in` VALUES (11,'qw gg','0000-00-00','2018-02-27','qw gg','qwe gg','qwe gg','qwe gg',1,'-',1,1),(12,'UDG/1225/SUR-MAS','2018-02-27','2018-02-28','Stikom Bali','STM','unddd','asdsad',0,'-',1,1),(13,'sdf','2018-02-27','2018-02-27','sdfsdf','sdfsdf','sdf','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0,'download (1).png',1,1);
/*!40000 ALTER TABLE `mail_in` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_disposisi` AFTER DELETE ON `mail_in` FOR EACH ROW DELETE FROM disposition WHERE id_mail=old.id_mail */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `mail_out`
--

DROP TABLE IF EXISTS `mail_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_out` (
  `id_mail_out` int(4) NOT NULL AUTO_INCREMENT,
  `mail_code` varchar(50) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `dess` text NOT NULL,
  `file` varchar(50) NOT NULL,
  `id_mail_type` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_mail_out`),
  KEY `id_mail_type` (`id_mail_type`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `mail_out_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`),
  CONSTRAINT `mail_out_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_out`
--

LOCK TABLES `mail_out` WRITE;
/*!40000 ALTER TABLE `mail_out` DISABLE KEYS */;
INSERT INTO `mail_out` VALUES (4,'asdsd','2018-02-15','qweqweqwe','qweqwe','qweqwe','_',1,1),(5,'rtyrtyret','2018-02-27','rtyrty','rtyrt','tyrtyrty','-',2,1),(6,'bar','0000-00-00','sdfsdf','sdfsdf','sdfsdf','-',1,1);
/*!40000 ALTER TABLE `mail_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_type`
--

DROP TABLE IF EXISTS `mail_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_type` (
  `id_mail_type` int(4) NOT NULL AUTO_INCREMENT,
  `mail_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mail_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_type`
--

LOCK TABLES `mail_type` WRITE;
/*!40000 ALTER TABLE `mail_type` DISABLE KEYS */;
INSERT INTO `mail_type` VALUES (1,'pemberitahuan'),(2,'undangan');
/*!40000 ALTER TABLE `mail_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','Bratha','admin'),(4,'kepala','kepala','Arip','kepala_kantor'),(6,'resepsionis','resepsionis','Ketut','resepsionis'),(8,'ocha','ocha','ocha','resepsionis');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_disposition`
--

DROP TABLE IF EXISTS `view_disposition`;
/*!50001 DROP VIEW IF EXISTS `view_disposition`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_disposition` (
  `id_disposition` tinyint NOT NULL,
  `disposition_at` tinyint NOT NULL,
  `disposition_date` tinyint NOT NULL,
  `dess` tinyint NOT NULL,
  `notification` tinyint NOT NULL,
  `mail_code` tinyint NOT NULL,
  `incoming_at` tinyint NOT NULL,
  `mail_from` tinyint NOT NULL,
  `fullname` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_disposition`
--

/*!50001 DROP TABLE IF EXISTS `view_disposition`*/;
/*!50001 DROP VIEW IF EXISTS `view_disposition`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_disposition` AS select `disposition`.`id_disposition` AS `id_disposition`,`disposition`.`disposition_at` AS `disposition_at`,`disposition`.`disposition_date` AS `disposition_date`,`disposition`.`dess` AS `dess`,`disposition`.`notification` AS `notification`,`mail_in`.`mail_code` AS `mail_code`,`mail_in`.`incoming_at` AS `incoming_at`,`mail_in`.`mail_from` AS `mail_from`,`user`.`fullname` AS `fullname` from ((`disposition` join `mail_in`) join `user`) where ((`disposition`.`id_mail` = `mail_in`.`id_mail`) and (`disposition`.`id_user` = `user`.`id_user`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-27 13:43:54
