-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gp_20
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.33-MariaDB

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
-- Table structure for table `anexo`
--

DROP TABLE IF EXISTS `anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anexo`
--

LOCK TABLES `anexo` WRITE;
/*!40000 ALTER TABLE `anexo` DISABLE KEYS */;
INSERT INTO `anexo` VALUES (22,'Poncha da Serra de Aguajoaodavidosky@gmail.com2019-01-18','../uploads/Poncha da Serra de Aguajoaodavidosky@gmail.com2019-01-18.'),(23,'Poncha da Serra de Aguajoaodavidosky@gmail.com2019-01-18','../uploads/Poncha da Serra de Aguajoaodavidosky@gmail.com2019-01-18.jpgjpg'),(24,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.jpgjpg'),(25,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.jpgjpg'),(26,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.jpgjpg'),(27,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.'),(28,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.'),(29,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.'),(30,'FlorDoValeadmin@ponchadvisor.com2019-01-18','../uploads/FlorDoValeadmin@ponchadvisor.com2019-01-18.jpgjpg'),(31,'Cantinho da Serraadmin@ponchadvisor.com2019-01-18','../uploads/Cantinho da Serraadmin@ponchadvisor.com2019-01-18.jpgjpg'),(32,'Cantinho da Serraadmin@ponchadvisor.com2019-01-18','../uploads/Cantinho da Serraadmin@ponchadvisor.com2019-01-18.jpgjpg');
/*!40000 ALTER TABLE `anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bar`
--

DROP TABLE IF EXISTS `bar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bar` varchar(45) DEFAULT NULL,
  `concelho` varchar(50) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `descricao` tinytext,
  `data_registo` date DEFAULT NULL,
  `classificacao` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_bar_UNIQUE` (`nome_bar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bar`
--

LOCK TABLES `bar` WRITE;
/*!40000 ALTER TABLE `bar` DISABLE KEYS */;
INSERT INTO `bar` VALUES (1,'Poncha++','Ribeira Brava',-23.67,179.391,'Poncha orientada a objectos','2018-02-23',4),(3,'Poncha da Serra de Agua','Ribeira Brava',-21.8233,175.01,'A melhor poncha da cidade e arredores','2017-04-03',4.5),(4,'Nr2','Funchal',-12.3122,133.312,'Centro da cidade, terraço agradavel','2017-05-16',2),(5,'Cu de Judas','Ponta do Sol',-45.414,140.165,'Poncha do Sol. Desconto de rodadas','2017-03-02',3),(6,'Petiscos','Santa Cruz',5.274,80.543,'Doses, Poncha e Futebol','2018-06-14',4),(7,'Village','Machico',83.5313,-12.6316,'Pub for the whole family','2017-06-09',2),(10,'Cantinho da Serra','Santana',59.614,124.613,'Restaurante c/ comida caseira','2018-11-27',3.5),(11,'Ponchalense','Funchal',NULL,NULL,'poncha da ma','2019-01-22',4),(12,'Bar dos Mongos','MongoTown',NULL,NULL,'Pocha good!','2019-01-25',2.5);
/*!40000 ALTER TABLE `bar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `avaliacao` varchar(500) DEFAULT NULL,
  `classificacao` tinyint(4) DEFAULT NULL,
  `data_comentario` date DEFAULT NULL,
  `data_visita` date DEFAULT NULL,
  `idbar` int(11) DEFAULT NULL,
  `idutilizador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (2,'Boa poncha','Mas ja vi melhor',4,'2019-01-18','2019-01-01',3,5),(3,'Poncha daquela','daquela que eu gosto',2,'2019-01-18','2018-11-13',3,5),(4,'cerveja é melhor','não atino poncha',4,'2019-01-18','2019-01-03',3,5),(5,'stuff','stuffen',4,'2019-01-18','2018-08-09',2,1),(6,'stuff','stuffen',4,'2019-01-18','2018-08-09',2,1),(7,'dasda','            dada',4,'2019-01-18','2019-01-02',2,1),(8,'dada','            adada',4,'2019-01-18','2019-01-03',2,1),(9,'dada','            dada',4,'2019-01-18','2019-01-08',2,1),(10,'dada','            dada',4,'2019-01-18','2019-01-08',2,1),(12,'uai','ts gonna work',4,'2019-01-18','2019-01-01',10,1),(13,'Shonhato','MUCHARNIO',3,'2019-01-18','2019-01-20',10,1);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_has_anexo`
--

DROP TABLE IF EXISTS `comentario_has_anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_has_anexo` (
  `comentario_id` int(11) DEFAULT NULL,
  `anexo_id` int(11) DEFAULT NULL,
  KEY `comentario_id_idx` (`comentario_id`),
  KEY `anexo_id_idx` (`anexo_id`),
  CONSTRAINT `anexo_id` FOREIGN KEY (`anexo_id`) REFERENCES `anexo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `comentario_id` FOREIGN KEY (`comentario_id`) REFERENCES `comentario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_has_anexo`
--

LOCK TABLES `comentario_has_anexo` WRITE;
/*!40000 ALTER TABLE `comentario_has_anexo` DISABLE KEYS */;
INSERT INTO `comentario_has_anexo` VALUES (NULL,24),(NULL,24),(NULL,27),(8,27),(8,27),(12,31),(13,31);
/*!40000 ALTER TABLE `comentario_has_anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(64) DEFAULT NULL,
  `data_expiracao` date DEFAULT NULL,
  `token_U_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `U_ID_idx` (`token_U_ID`) USING BTREE,
  CONSTRAINT `utilizador_ID` FOREIGN KEY (`token_U_ID`) REFERENCES `utilizador` (`U_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilizador` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `u_email` varchar(80) DEFAULT NULL,
  `u_password` char(64) DEFAULT NULL,
  `recov_token` varchar(64) DEFAULT NULL,
  `adminaccess` tinyint(4) DEFAULT '0',
  `barAssoc` int(11) DEFAULT NULL,
  UNIQUE KEY `U_ID_UNIQUE` (`U_ID`),
  UNIQUE KEY `u_email_UNIQUE` (`u_email`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `id_bar_idx` (`barAssoc`),
  CONSTRAINT `id_bar` FOREIGN KEY (`barAssoc`) REFERENCES `bar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizador`
--

LOCK TABLES `utilizador` WRITE;
/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` VALUES (1,'Administrador','admin','admin@ponchadvisor.com','$2y$10$njkrgranjrgnfgdmnfgdney4Nxy13CCn9pR9VCCAtKcLOlfNPypyG',NULL,1,NULL),(2,'Tarrasso da Esquina','MasterTarrasque','teste@ponchadvisor.com','$2y$10$njkrgranjrgnfgdmnfgdnecNpUMdUQC1ZLEZN5lzzs1J.BAp5GXFK',NULL,0,NULL),(5,'David Camacho','Dcamacho','joaodavidosky@gmail.com','$2y$10$njkrgranjrgnfgdmnfgdnexVEqDOISITc6/91g9LsFlf2JLn4mZoC','d5d511a9c6efaa722b61f08001b9f012e3d0e2fa87f29fda7c7490eb0aac1fe6',0,NULL),(6,'John Doe da Silva','JohnSilvas','JSilvas@ponchadvisor.com','$2y$10$njkrgranjrgnfgdmnfgdnexVEqDOISITc6/91g9LsFlf2JLn4mZoC',NULL,0,NULL);
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'gp_20'
--

--
-- Dumping routines for database 'gp_20'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-30  9:44:44
