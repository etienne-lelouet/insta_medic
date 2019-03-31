-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: clinique
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chambre` (
  `idChambre` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `etage` int(11) DEFAULT NULL,
  `statut` varchar(25) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChambre`),
  KEY `FK_Chambre_idService` (`idService`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chambre`
--

LOCK TABLES `chambre` WRITE;
/*!40000 ALTER TABLE `chambre` DISABLE KEYS */;
INSERT INTO `chambre` VALUES (1,1,1,'Occupée',1),(2,2,1,'Occupée',1),(3,3,1,'Libre',1),(4,4,1,'Libre',1),(5,5,1,'Libre',1),(6,6,1,'Libre',1),(7,7,2,'Libre',2),(8,8,2,'Libre',2);
/*!40000 ALTER TABLE `chambre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donneesbiologiques`
--

DROP TABLE IF EXISTS `donneesbiologiques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donneesbiologiques` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `Taille` int(11) DEFAULT '0',
  `GroupeSanguin` varchar(5) DEFAULT '""',
  `Commentaires` varchar(50) DEFAULT '0',
  PRIMARY KEY (`idPersonne`),
  CONSTRAINT `FK_DossierPat_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donneesbiologiques`
--

LOCK TABLES `donneesbiologiques` WRITE;
/*!40000 ALTER TABLE `donneesbiologiques` DISABLE KEYS */;
INSERT INTO `donneesbiologiques` VALUES (127,0,NULL,'0'),(130,0,NULL,'0'),(131,0,NULL,'0'),(132,0,NULL,'0'),(133,0,NULL,'0'),(136,0,NULL,'0'),(138,0,NULL,'0'),(139,0,NULL,'0'),(140,0,NULL,'0'),(142,0,NULL,'0'),(143,0,NULL,'0'),(144,0,NULL,'0'),(145,0,NULL,'0');
/*!40000 ALTER TABLE `donneesbiologiques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donneesjournalieres`
--

DROP TABLE IF EXISTS `donneesjournalieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donneesjournalieres` (
  `idDonnes` int(11) NOT NULL AUTO_INCREMENT,
  `temperature` float NOT NULL,
  `tension` varchar(100) NOT NULL,
  `poids` float NOT NULL,
  `autres` varchar(500) NOT NULL,
  `derniereMaj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPatient` int(11) NOT NULL,
  `idHospitalisation` int(11) NOT NULL,
  `idInfirmier` int(11) NOT NULL,
  PRIMARY KEY (`idDonnes`),
  KEY `idPatient` (`idPatient`),
  KEY `idHospitalisation` (`idHospitalisation`),
  KEY `idInfirmier` (`idInfirmier`),
  CONSTRAINT `donneesjournalieres_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  CONSTRAINT `donneesjournalieres_ibfk_2` FOREIGN KEY (`idHospitalisation`) REFERENCES `hospitalisation` (`idHospi`),
  CONSTRAINT `fk_donneesjournalieres_idInfirmier` FOREIGN KEY (`idInfirmier`) REFERENCES `infirmier` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donneesjournalieres`
--

LOCK TABLES `donneesjournalieres` WRITE;
/*!40000 ALTER TABLE `donneesjournalieres` DISABLE KEYS */;
INSERT INTO `donneesjournalieres` VALUES (14,999,'94/94',99,'wjwbdb','2018-07-23 09:55:17',136,6,134);
/*!40000 ALTER TABLE `donneesjournalieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donneesmedicales`
--

DROP TABLE IF EXISTS `donneesmedicales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donneesmedicales` (
  `idDonneesMedicales` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `idPatient` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idDonneesMedicales`),
  KEY `idPersonne` (`idMedecin`),
  KEY `FK_idPatient` (`idPatient`),
  CONSTRAINT `donneesmedicales_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  CONSTRAINT `donneesmedicales_ibfk_2` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donneesmedicales`
--

LOCK TABLES `donneesmedicales` WRITE;
/*!40000 ALTER TABLE `donneesmedicales` DISABLE KEYS */;
INSERT INTO `donneesmedicales` VALUES (23,'Ephytelium stratifié squameux',127,63),(24,'test 132',132,63),(25,'teeeeeeeeeeest 127',127,63),(26,'retest 1gors',132,63),(27,'retest3 gsd 132',132,63),(28,'retest 132 fdsq',132,78),(29,'test',142,63),(30,'testtest',139,63),(32,'tezsts',130,63),(33,'retest 132 arzazazeeaz',132,63),(34,'retest 132 zbrem',132,63),(35,'retest 132 zbrem',132,63),(36,'retest 132 fdsqtretrezterz',132,63);
/*!40000 ALTER TABLE `donneesmedicales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospitalisation`
--

DROP TABLE IF EXISTS `hospitalisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospitalisation` (
  `idHospi` int(11) NOT NULL AUTO_INCREMENT,
  `motif` varchar(50) DEFAULT NULL,
  `dateEntree` date DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `commentaire` text,
  `idService` int(11) DEFAULT NULL,
  `idPersonne` int(11) DEFAULT NULL,
  `idChambre` int(11) NOT NULL,
  PRIMARY KEY (`idHospi`),
  KEY `FK_Hospitalisation_idService` (`idService`),
  KEY `Hospitalisation_Chambre_idChambre_fk` (`idChambre`),
  KEY `idPersonne` (`idPersonne`),
  CONSTRAINT `FK_Hospitalisation_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  CONSTRAINT `Hospitalisation_Chambre_idChambre_fk` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`idChambre`),
  CONSTRAINT `hospitalisation_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `donneesbiologiques` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospitalisation`
--

LOCK TABLES `hospitalisation` WRITE;
/*!40000 ALTER TABLE `hospitalisation` DISABLE KEYS */;
INSERT INTO `hospitalisation` VALUES (3,'Arythmie','2018-05-01',NULL,NULL,1,127,1),(4,'Délirium tremens','2018-05-01',NULL,NULL,2,130,7),(5,'Urgence AVC','2018-04-01','2018-05-04','Libéré, gardé sous suivi',1,127,2),(6,'test','2018-05-03',NULL,'TEEEEEEEEEEEEEEEEEEEST',1,136,3),(7,'test','2018-05-03',NULL,'TEEEEEEEEEEEEEEEEEEEST',1,139,4);
/*!40000 ALTER TABLE `hospitalisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infirmier`
--

DROP TABLE IF EXISTS `infirmier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infirmier` (
  `dateEmbauche` varchar(45) DEFAULT NULL,
  `idPersonne` int(11) NOT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `FK_Infirmier_idService` (`idService`),
  CONSTRAINT `FK_Infirmier_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  CONSTRAINT `FK_Infirmier_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infirmier`
--

LOCK TABLES `infirmier` WRITE;
/*!40000 ALTER TABLE `infirmier` DISABLE KEYS */;
INSERT INTO `infirmier` VALUES ('25/05/2018',134,1),('03/05/2010',135,2),('31/05/2018',137,1);
/*!40000 ALTER TABLE `infirmier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lien`
--

DROP TABLE IF EXISTS `lien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `DateCreation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idMedecin` (`idMedecin`),
  KEY `fk_lien_idPatient` (`idPatient`),
  CONSTRAINT `lien_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  CONSTRAINT `lien_ibfk_2` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lien`
--

LOCK TABLES `lien` WRITE;
/*!40000 ALTER TABLE `lien` DISABLE KEYS */;
INSERT INTO `lien` VALUES (18,78,127,'2018-05-29 18:33:13'),(19,63,127,'2018-05-29 19:15:03'),(20,63,130,'2018-05-29 20:24:49'),(21,63,132,'2018-05-29 20:35:39'),(22,78,132,'2018-05-29 20:36:46'),(23,78,130,'2018-05-31 14:12:42'),(24,63,139,'2018-05-31 15:22:06'),(25,78,142,'2018-05-31 20:24:19'),(26,63,142,'2018-05-31 20:24:41'),(27,78,136,'2018-05-31 12:33:42'),(28,78,143,'2018-05-31 12:38:47'),(29,63,143,'2018-05-31 13:12:09'),(30,78,145,'2018-05-31 17:10:46');
/*!40000 ALTER TABLE `lien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `listepatienthospitalise`
--

DROP TABLE IF EXISTS `listepatienthospitalise`;
/*!50001 DROP VIEW IF EXISTS `listepatienthospitalise`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `listepatienthospitalise` AS SELECT 
 1 AS `idPatient`,
 1 AS `nom`,
 1 AS `prenom`,
 1 AS `date_naissance`,
 1 AS `urlphoto`,
 1 AS `motif`,
 1 AS `dateEntree`,
 1 AS `dateSortie`,
 1 AS `idService`,
 1 AS `idHospi`,
 1 AS `nomService`,
 1 AS `idChambre`,
 1 AS `etage`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medecin` (
  `dateEmbauche` varchar(45) DEFAULT NULL,
  `dateDiplome` varchar(45) DEFAULT NULL,
  `grade` varchar(25) DEFAULT NULL,
  `idPersonne` int(11) NOT NULL,
  `idSpecialite` int(11) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `FK_Medecin_idSpecialite` (`idSpecialite`),
  KEY `FK_Medecin_idService` (`idService`),
  CONSTRAINT `FK_Medecin_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  CONSTRAINT `FK_Medecin_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  CONSTRAINT `FK_Medecin_idSpecialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medecin`
--

LOCK TABLES `medecin` WRITE;
/*!40000 ALTER TABLE `medecin` DISABLE KEYS */;
INSERT INTO `medecin` VALUES ('25/2/2010','29/10/2015','chef de service',63,2,2),('03/12/17','03/08/1990','Praticien Hospitalier',78,1,1);
/*!40000 ALTER TABLE `medecin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicament` (
  `idMedicament` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idMedicament`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicament`
--

LOCK TABLES `medicament` WRITE;
/*!40000 ALTER TABLE `medicament` DISABLE KEYS */;
INSERT INTO `medicament` VALUES (1,'Bromazépan'),(2,'Paracetamol'),(3,'Simvastatine'),(4,'Amoxiciline'),(5,'Fluoxetine'),(6,'Prozac'),(7,'Omeprazole'),(8,'Ramipril'),(9,'Sildenafil'),(10,'Simvastatine'),(11,'Amoxiciline'),(12,'Fluoxetine'),(13,'Prozac'),(14,'Omeprazole'),(15,'Ramipril'),(16,'Sildenafil');
/*!40000 ALTER TABLE `medicament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordonnance`
--

DROP TABLE IF EXISTS `ordonnance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordonnance` (
  `idOrdonnance` int(11) NOT NULL AUTO_INCREMENT,
  `dateordonnance` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TextOrdonnance` text NOT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idMedecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrdonnance`),
  KEY `FK_Ordonnance_idPersonne` (`idPatient`),
  KEY `FK_Ordonnance_idPersonne_1` (`idMedecin`),
  CONSTRAINT `FK_Ordonnance_idPersonne` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  CONSTRAINT `FK_Ordonnance_idPersonne_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordonnance`
--

LOCK TABLES `ordonnance` WRITE;
/*!40000 ALTER TABLE `ordonnance` DISABLE KEYS */;
INSERT INTO `ordonnance` VALUES (9,'2018-06-03 20:10:31','tezt',127,63),(10,'2018-06-10 02:20:48','tzetzertzretzer',132,63);
/*!40000 ALTER TABLE `ordonnance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `etat_civil` varchar(10) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `date_naissance` varchar(45) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `adressecomp` varchar(100) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `Ville` varchar(45) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `urlphoto` varchar(75) DEFAULT 'default.png',
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (63,'Mlle','De Monaco','Stephanie','17/11/1996','25 test','testtest','75000','Test','0111111111','test25','test34@test.com','05a671c66aefea124cc08b76ea6d30bb','testestsetest.jpg','2017-12-07 18:07:35',2),(78,'Mme','Mader','Jean Pierre','17/03/1964','9 rue broussais','','75015','Paris','0106783359','mader_jeanpierre','jeanpierremader@gmail.com','05a671c66aefea124cc08b76ea6d30bb','jeanpierre.jpg','2017-12-08 12:54:25',2),(127,'M.','Le Louët','Etienne','17/11/1996','24 Villa de Lourcine','Boite 40','75014','Paris','0754848257','etienne_lelouet','etiennelelouet@outlook.com','05a671c66aefea124cc08b76ea6d30bb','1527618297.jpg','2018-05-29 18:24:57',1),(130,'Mme.','chat','chatchat','11/09/1997','20 rue des chats','','75010','Paris','0102030405','chat','chat@gmail.com','316e6bb49f736392f2023c166e19dd88','4582874916.jpg','2018-05-29 20:16:12',1),(131,'Autre','trash','trash','17/11/1996','666 trash','','75000','Trash','0111111111','trash','trash@trash.com','30639096bfe4ec4b9f17696ef1d02b9f','3055250492.jpg','2018-05-29 20:20:46',1),(132,'Mme.','Le Louet','Marie-Anne','20/11/1992','6 Rue de l\'Amiral Mouchez','','75013','Paris','0837462859','Marieanne','marieanne1@free.fr','098f6bcd4621d373cade4e832627b4f6','13748632884.png','2018-05-29 20:31:16',1),(133,'Autre','test','test','17/11/1996','24 test','test','75000','test','0111111111','test456','testtest@est.com','05a671c66aefea124cc08b76ea6d30bb','9166627482.png','2018-05-31 12:54:07',1),(134,'M.','House','Grigory','12/05/1963','10 Rue du Cherche-Midi','','75005','Paris','0715787826','ghouse','ghouse@test.com','05a671c66aefea124cc08b76ea6d30bb','test.jpg','2018-05-31 14:12:05',3),(135,'Mme','Lillo','Agnes','22/11/1964','24 rue du marechal Joffre','','75013','Paris','0745867895','a_lillo','alillo@test.com','05a671c66aefea124cc08b76ea6d30bb','test.pnh','2018-05-31 14:14:00',3),(136,'Autre','test','test','17/12/1965','24 ets','','75000','test','0111111111','testtest','test256@test.com','05a671c66aefea124cc08b76ea6d30bb','1527778618.jpg','2018-05-31 14:56:58',1),(137,'M.','Cissé','Steeve','03/12/1964','13 rue des vallons','','75015','Paris','0190785696','scisse','scisse@gmail.com','05a671c66aefea124cc08b76ea6d30bb','default.jpg','2018-05-31 18:41:17',3),(138,'M.','Buis','Florian','29/10/1991','7 Rue de la Paix','','91600','Savigny-Sur-Orge','0111111111','fbuis','fbuis@test.com','05a671c66aefea124cc08b76ea6d30bb','9167195208.jpg','2018-05-31 15:11:08',1),(139,'Autre','Thibault ','Colin','21/09/1995','36 rue des ecoles','','75005','Paris','0111111111','tobicolin','tibtib@test.com','05a671c66aefea124cc08b76ea6d30bb','6111465260.jpg','2018-05-31 15:18:35',1),(140,'M.','Julite','Nil','17/11/1996','2 rue fernand','','75014','Paris','0111111111','njulite','njulite@test.com','05a671c66aefea124cc08b76ea6d30bb','4583604261.jpg','2018-05-31 15:48:07',1),(141,'Autre','libel','lolol','17/11/1996','24 test','test','91170','viry chatillon','0111111111','narth','narth@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','13750960455.jpg','2018-05-31 20:21:35',1),(142,'Autre','etset','estfnjezk','17/11/1996','24 test','','75000','Test','0111111111','testtest245','test78@tese.com','05a671c66aefea124cc08b76ea6d30bb','10695192410.jpg','2018-05-31 20:23:50',1),(143,'Autre','buis','buis','29/10/1991','7 rue de la paix ','','91170','viry chatillon','0111111111','justepourvoir','justepourvoir@gmail.com','f532a397fe7671763732bc4f6c14fed7','12223544872.jpg','2018-05-31 12:38:29',1),(144,'Autre','libel','estfnjezk','29/10/1991','24 test','','74000','viry chatillon','0111111111','jpvsicamarche','jpv@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','12223561960.jpg','2018-05-31 13:14:05',1),(145,'M.','test','test','17/11/1996','24 test','test','75000','test','0111111111','test256','test256@est.Lcom','05a671c66aefea124cc08b76ea6d30bb','1527959419.jpg','2018-05-31 17:10:19',1),(146,'M.','Joube','Sylvain','12/12/1812','69 rue Jacquie et Michel','','66099','Montcuq','0669696969','groscul','groscul@gmail.com','78d1a0fddcd80f7e2f430fafae076cae','7699369665.jpeg','2018-10-18 14:45:33',1);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescrire`
--

DROP TABLE IF EXISTS `prescrire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescrire` (
  `idPrescription` int(11) NOT NULL AUTO_INCREMENT,
  `idMedicament` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `DateDebut` varchar(15) NOT NULL,
  `DateFin` varchar(15) DEFAULT NULL,
  `Commentaire` text,
  PRIMARY KEY (`idPrescription`),
  KEY `fk_patientPersonne_id` (`idPatient`),
  KEY `idMedecin` (`idMedecin`),
  KEY `fk_prescrire_medicament` (`idMedicament`),
  CONSTRAINT `fk_prescrir_idMedecin` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  CONSTRAINT `fk_prescrir_idPersonne` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  CONSTRAINT `fk_prescrire_medicament` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`idMedicament`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescrire`
--

LOCK TABLES `prescrire` WRITE;
/*!40000 ALTER TABLE `prescrire` DISABLE KEYS */;
INSERT INTO `prescrire` VALUES (1,7,63,127,'06/04/2017',NULL,'Prise orale, a chaque repas'),(2,10,78,130,'18/11/2016',NULL,'2 fois par jour au levé et au coucher, asséchement de la peau probable, prévoir crème hydratante.'),(5,7,63,138,'06/04/2017',NULL,'Prise orale, a chaque repas'),(6,10,78,127,'18/11/2016',NULL,'2 fois par jour au levé et au coucher, asséchement de la peau probable, prévoir crème hydratante.'),(9,1,63,127,'13/11/1996','','sdffsdfsqqfsd'),(10,7,63,127,'13/11/2018','',''),(11,1,63,127,'12/03/2018','',''),(12,1,63,127,'18/11/2016','18/12/2016','2 fois par jour au lever et au coucher, asséchement de la peau probable, prévoir crème hydratante.'),(13,5,63,132,'10/06/2018','','prise 3 fois par jours parceque j\'ai pas de diplome de medecine');
/*!40000 ALTER TABLE `prescrire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rdv` (
  `idrdv` int(11) NOT NULL AUTO_INCREMENT,
  `startRDV` int(11) DEFAULT NULL,
  `endRDV` int(11) NOT NULL,
  `libelleRDV` varchar(100) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idMedecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrdv`),
  KEY `FK_RDV_idPersonne` (`idPatient`),
  KEY `FK_RDV_idPersonne_1` (`idMedecin`),
  CONSTRAINT `fk_rdv_idMedecin` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  CONSTRAINT `fk_rdv_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rdv`
--

LOCK TABLES `rdv` WRITE;
/*!40000 ALTER TABLE `rdv` DISABLE KEYS */;
INSERT INTO `rdv` VALUES (57,1527750000,1527751800,'Céphalées',127,78),(58,1527755400,1527757200,'Mal au coeur',127,63),(59,1544085000,1544086800,'aze',130,63),(60,1527663600,1527665400,'J\'ai mal au nerfs',132,63),(61,1527749280,1527751080,'J\'ai mal au coeur',132,78),(62,1527867000,1527868800,'test test',130,78),(63,1527924600,1527926400,'test',139,63),(64,1527924600,1527926400,'test',142,78),(65,1527930000,1527931800,'etez',142,63),(66,1527946200,1527948000,'deafa',136,78),(67,1527953400,1527955200,'1231',143,78),(68,1527949800,1527951600,'',143,63),(69,1528192800,1528194600,'il pourrait etre beaucoup plus popre ce site de merde',145,78),(70,1529314200,1529316000,'',136,78);
/*!40000 ALTER TABLE `rdv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `idService` int(11) NOT NULL AUTO_INCREMENT,
  `nomService` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idService`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Cardiologie'),(2,'Neurologie');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite` (
  `idSpecialite` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idSpecialite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite`
--

LOCK TABLES `specialite` WRITE;
/*!40000 ALTER TABLE `specialite` DISABLE KEYS */;
INSERT INTO `specialite` VALUES (1,'Cardiologie'),(2,'Neurologie');
/*!40000 ALTER TABLE `specialite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'clinique'
--
/*!50003 DROP PROCEDURE IF EXISTS `deletePatient` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`wef`@`%` PROCEDURE `deletePatient`(IN `id` INT(11))
    NO SQL
begin

DELETE FROM `clinique`.`rdv` WHERE `rdv`.`idPersonne` = id;
DELETE FROM `clinique`.`donneesbiologiques` WHERE `donneesbiologiques`.`idPersonne` = id;
DELETE FROM `clinique`.`donneesmedicales` WHERE `donneesmedicales`.`idPersonne` = id;
DELETE FROM `clinique`.`prescrire` WHERE `lien`.`idPatient` = id;
DELETE FROM `clinique`.`hospitalisation` WHERE `hospitalisation`.`idPersonne` = id;
DELETE FROM `clinique`.`lien` WHERE `lien`.`idPersonne` = id;
DELETE FROM `clinique`.`personne` WHERE `personne`.`idPersonne` = id;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertInfirmier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`wef`@`%` PROCEDURE `insertInfirmier`(IN `argetat_civil` VARCHAR(10), IN `argnom` VARCHAR(50), IN `argprenom` VARCHAR(50), IN `argdate_naissance` VARCHAR(45), IN `argadresse` VARCHAR(150), IN `argadressecomp` VARCHAR(100), IN `argcode_postal` VARCHAR(10), IN `argville` VARCHAR(45), IN `argtelephone` VARCHAR(25), IN `arglogin` VARCHAR(50), IN `argemail` VARCHAR(75), IN `argpassword` VARCHAR(100), IN `argurlphoto` VARCHAR(75), IN `argdateEmbauche` VARCHAR(45), IN `argidService` INT(11))
begin 

    declare argid int(3);
	declare argInfir int(3);

    INSERT INTO personne (etat_civil, nom, prenom, date_naissance, adresse, adressecomp, code_postal, Ville,
     telephone, login, email, password, urlphoto) 
    VALUES (argetat_civil, argnom, argprenom, argdate_naissance, argadresse, argadressecomp, argcode_postal,
     argville, argtelephone, arglogin, argemail, argpassword, argurlphoto);

    INSERT INTO infirmier (dateEmbauche, idPersonne, idService)
    VALUES (argdateEmbauche, LAST_INSERT_ID(), argidService);
	
	SELECT LAST_INSERT_ID();

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertMedecin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`wef`@`%` PROCEDURE `insertMedecin`(IN `argetat_civil` VARCHAR(10), IN `argnom` VARCHAR(50), IN `argprenom` VARCHAR(50), IN `argdate_naissance` VARCHAR(45), IN `argadresse` VARCHAR(150), IN `argadressecomp` VARCHAR(100), IN `argcode_postal` VARCHAR(10), IN `argville` VARCHAR(45), IN `argtelephone` VARCHAR(25), IN `arglogin` VARCHAR(50), IN `argemail` VARCHAR(75), IN `argpassword` VARCHAR(100), IN `argurlphoto` VARCHAR(75), IN `argdateEmbauche` VARCHAR(45), IN `argdateDiplome` VARCHAR(45), IN `arggrade` VARCHAR(25), IN `argidSpecialite` INT(11), IN `argidService` INT(11))
begin 

	declare argid int(3);
	declare argmed int(3);

	INSERT INTO personne (etat_civil, nom, prenom, date_naissance, adresse, adressecomp, code_postal, Ville,
     telephone, login, email, password, urlphoto) 
    VALUES (argetat_civil, argnom, argprenom, argdate_naissance, argadresse, argadressecomp, argcode_postal,
     argville, argtelephone, arglogin, argemail, argpassword, argurlphoto);

    INSERT INTO medecin (dateEmbauche, dateDiplome, grade, idPersonne, idSpecialite, idService) 
    VALUES (argdateEmbauche, argdateDiplome, arggrade, LAST_INSERT_ID(), argidSpecialite, argidService);

	SELECT LAST_INSERT_ID();

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertPatient` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`wef`@`%` PROCEDURE `insertPatient`(IN `argetat_civil` VARCHAR(10), IN `argnom` VARCHAR(50), IN `argprenom` VARCHAR(50), IN `argdate_naissance` VARCHAR(45), IN `argadresse` VARCHAR(150), IN `argadressecomp` VARCHAR(100), IN `argcode_postal` VARCHAR(10), IN `argville` VARCHAR(45), IN `argtelephone` VARCHAR(25), IN `arglogin` VARCHAR(50), IN `argemail` VARCHAR(75), IN `argpassword` VARCHAR(100), IN `argurlphoto` VARCHAR(75))
begin 

    declare argid int(3);
    declare argdossier int(3);

    INSERT INTO personne (etat_civil, nom, prenom, date_naissance, adresse, adressecomp, code_postal, Ville,
     telephone, login, email, password, urlphoto) 
    VALUES (argetat_civil, argnom, argprenom, argdate_naissance, argadresse, argadressecomp, argcode_postal,
     argville, argtelephone, arglogin, argemail, argpassword, argurlphoto);

	INSERT INTO donneesbiologiques (idPersonne, Taille, GroupeSanguin, Poids)
	VALUES (LAST_INSERT_ID(), 0, NULL, 0);
	
	SELECT LAST_INSERT_ID();

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `liste_medecin` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`wef`@`%` PROCEDURE `liste_medecin`(IN `argspe` INT)
BEGIN
    SELECT * FROM medecin
      INNER JOIN personne
        ON medecin.idPersonne = personne.idPersonne
	WHERE medecin.idSpecialite = argspe;

  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `listepatienthospitalise`
--

/*!50001 DROP VIEW IF EXISTS `listepatienthospitalise`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`wef`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `listepatienthospitalise` AS select `personne`.`idPersonne` AS `idPatient`,`personne`.`nom` AS `nom`,`personne`.`prenom` AS `prenom`,`personne`.`date_naissance` AS `date_naissance`,`personne`.`urlphoto` AS `urlphoto`,`hospitalisation`.`motif` AS `motif`,`hospitalisation`.`dateEntree` AS `dateEntree`,`hospitalisation`.`dateSortie` AS `dateSortie`,`hospitalisation`.`idService` AS `idService`,`hospitalisation`.`idHospi` AS `idHospi`,`service`.`nomService` AS `nomService`,`chambre`.`idChambre` AS `idChambre`,`chambre`.`etage` AS `etage` from (((`personne` join `hospitalisation`) join `chambre`) join `service`) where ((`hospitalisation`.`idPersonne` = `personne`.`idPersonne`) and (`hospitalisation`.`idChambre` = `chambre`.`idChambre`) and (`hospitalisation`.`idService` = `service`.`idService`)) */;
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

-- Dump completed on 2019-01-16 10:32:03
