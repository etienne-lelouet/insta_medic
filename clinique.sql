
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `clinique`
--

DROP DATABASE IF EXISTS `Clinique`;
DROP DATABASE IF EXISTS `clinique`;
CREATE DATABASE IF NOT EXISTS `clinique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinique`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `deletePatient`$$
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

end$$

DROP PROCEDURE IF EXISTS `insertInfirmier`$$
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

end$$

DROP PROCEDURE IF EXISTS `insertMedecin`$$
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

end$$

DROP PROCEDURE IF EXISTS `insertPatient`$$
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

end$$

DROP PROCEDURE IF EXISTS `liste_medecin`$$
CREATE DEFINER=`wef`@`%` PROCEDURE `liste_medecin`(IN `argspe` INT)
BEGIN
    SELECT * FROM medecin
      INNER JOIN personne
        ON medecin.idPersonne = personne.idPersonne
	WHERE medecin.idSpecialite = argspe;

  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `idChambre` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `etage` int(11) DEFAULT NULL,
  `statut` varchar(25) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChambre`),
  KEY `FK_Chambre_idService` (`idService`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(1, 1, 1, 'Occupée', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(2, 2, 1, 'Occupée', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(3, 3, 1, 'Libre', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(4, 4, 1, 'Libre', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(5, 5, 1, 'Libre', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(6, 6, 1, 'Libre', 1);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(7, 7, 2, 'Libre', 2);
INSERT INTO `chambre` (`idChambre`, `numero`, `etage`, `statut`, `idService`) VALUES(8, 8, 2, 'Libre', 2);

-- --------------------------------------------------------

--
-- Structure de la table `donneesbiologiques`
--

DROP TABLE IF EXISTS `donneesbiologiques`;
CREATE TABLE IF NOT EXISTS `donneesbiologiques` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `Taille` int(11) DEFAULT '0',
  `GroupeSanguin` varchar(5) DEFAULT '""',
  `Commentaires` varchar(50) DEFAULT '0',
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Contenu de la table `donneesbiologiques`
--

INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(127, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(130, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(131, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(132, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(133, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(136, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(138, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(139, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(140, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(142, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(143, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(144, 0, NULL, '0');
INSERT INTO `donneesbiologiques` (`idPersonne`, `Taille`, `GroupeSanguin`, `Commentaires`) VALUES(145, 0, NULL, '0');

-- --------------------------------------------------------

--
-- Structure de la table `donneesjournalieres`
--

DROP TABLE IF EXISTS `donneesjournalieres`;
CREATE TABLE IF NOT EXISTS `donneesjournalieres` (
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
  KEY `idInfirmier` (`idInfirmier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `donneesmedicales`
--

DROP TABLE IF EXISTS `donneesmedicales`;
CREATE TABLE IF NOT EXISTS `donneesmedicales` (
  `idDonneesMedicales` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `idPatient` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idDonneesMedicales`),
  KEY `idPersonne` (`idMedecin`),
  KEY `FK_idPatient` (`idPatient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `donneesmedicales`
--

INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(23, 'Ephytelium stratifié squameux', 127, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(24, 'test 132', 132, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(25, 'teeeeeeeeeeest 127', 127, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(26, 'retest 132', 132, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(27, 'retest3 gsd 132', 132, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(28, 'retest 132 fdsq', 132, 78);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(29, 'test', 142, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(30, 'testtest', 139, 63);
INSERT INTO `donneesmedicales` (`idDonneesMedicales`, `contenu`, `idPatient`, `idMedecin`) VALUES(32, 'tezsts', 130, 63);

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

DROP TABLE IF EXISTS `hospitalisation`;
CREATE TABLE IF NOT EXISTS `hospitalisation` (
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
  KEY `idPersonne` (`idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`idHospi`, `motif`, `dateEntree`, `dateSortie`, `commentaire`, `idService`, `idPersonne`, `idChambre`) VALUES(3, 'Arythmie', '2018-05-01', NULL, NULL, 1, 127, 1);
INSERT INTO `hospitalisation` (`idHospi`, `motif`, `dateEntree`, `dateSortie`, `commentaire`, `idService`, `idPersonne`, `idChambre`) VALUES(4, 'Délirium tremens', '2018-05-01', NULL, NULL, 2, 130, 7);
INSERT INTO `hospitalisation` (`idHospi`, `motif`, `dateEntree`, `dateSortie`, `commentaire`, `idService`, `idPersonne`, `idChambre`) VALUES(5, 'Urgence AVC', '2018-04-01', '2018-05-04', 'Libéré, gardé sous suivi', 1, 127, 2);
INSERT INTO `hospitalisation` (`idHospi`, `motif`, `dateEntree`, `dateSortie`, `commentaire`, `idService`, `idPersonne`, `idChambre`) VALUES(6, 'test', '2018-05-03', NULL, 'TEEEEEEEEEEEEEEEEEEEST', 1, 136, 3);
INSERT INTO `hospitalisation` (`idHospi`, `motif`, `dateEntree`, `dateSortie`, `commentaire`, `idService`, `idPersonne`, `idChambre`) VALUES(7, 'test', '2018-05-03', NULL, 'TEEEEEEEEEEEEEEEEEEEST', 1, 139, 4);

-- --------------------------------------------------------

--
-- Structure de la table `infirmier`
--

DROP TABLE IF EXISTS `infirmier`;
CREATE TABLE IF NOT EXISTS `infirmier` (
  `dateEmbauche` varchar(45) DEFAULT NULL,
  `idPersonne` int(11) NOT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `FK_Infirmier_idService` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infirmier`
--

INSERT INTO `infirmier` (`dateEmbauche`, `idPersonne`, `idService`) VALUES('25/05/2018', 134, 1);
INSERT INTO `infirmier` (`dateEmbauche`, `idPersonne`, `idService`) VALUES('03/05/2010', 135, 2);
INSERT INTO `infirmier` (`dateEmbauche`, `idPersonne`, `idService`) VALUES('31/05/2018', 137, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMedecin` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `DateCreation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idMedecin` (`idMedecin`),
  KEY `fk_lien_idPatient` (`idPatient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `lien`
--

INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(18, 78, 127, '2018-05-29 20:33:13');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(19, 63, 127, '2018-05-29 21:15:03');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(20, 63, 130, '2018-05-29 22:24:49');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(21, 63, 132, '2018-05-29 22:35:39');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(22, 78, 132, '2018-05-29 22:36:46');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(23, 78, 130, '2018-05-31 16:12:42');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(24, 63, 139, '2018-05-31 17:22:06');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(25, 78, 142, '2018-05-31 22:24:19');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(26, 63, 142, '2018-05-31 22:24:41');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(27, 78, 136, '2018-05-31 14:33:42');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(28, 78, 143, '2018-05-31 14:38:47');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(29, 63, 143, '2018-05-31 15:12:09');
INSERT INTO `lien` (`id`, `idMedecin`, `idPatient`, `DateCreation`) VALUES(30, 78, 145, '2018-05-31 19:10:46');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `listepatienthospitalise`
--
DROP VIEW IF EXISTS `listepatienthospitalise`;
CREATE TABLE IF NOT EXISTS `listepatienthospitalise` (
`idPatient` int(11)
,`nom` varchar(50)
,`prenom` varchar(50)
,`date_naissance` varchar(45)
,`urlphoto` varchar(75)
,`motif` varchar(50)
,`dateEntree` date
,`dateSortie` date
,`idService` int(11)
,`idHospi` int(11)
,`nomService` varchar(25)
,`idChambre` int(11)
,`etage` int(11)
);
-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `dateEmbauche` varchar(45) DEFAULT NULL,
  `dateDiplome` varchar(45) DEFAULT NULL,
  `grade` varchar(25) DEFAULT NULL,
  `idPersonne` int(11) NOT NULL,
  `idSpecialite` int(11) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonne`),
  KEY `FK_Medecin_idSpecialite` (`idSpecialite`),
  KEY `FK_Medecin_idService` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`dateEmbauche`, `dateDiplome`, `grade`, `idPersonne`, `idSpecialite`, `idService`) VALUES('25/2/2010', '29/10/2015', 'chef de service', 63, 2, 2);
INSERT INTO `medecin` (`dateEmbauche`, `dateDiplome`, `grade`, `idPersonne`, `idSpecialite`, `idService`) VALUES('03/12/17', '03/08/1990', 'Praticien Hospitalier', 78, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `idMedicament` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idMedicament`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(1, 'Bromazépan');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(2, 'Paracetamol');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(3, 'Simvastatine');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(4, 'Amoxiciline');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(5, 'Fluoxetine');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(6, 'Prozac');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(7, 'Omeprazole');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(8, 'Ramipril');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(9, 'Sildenafil');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(10, 'Simvastatine');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(11, 'Amoxiciline');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(12, 'Fluoxetine');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(13, 'Prozac');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(14, 'Omeprazole');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(15, 'Ramipril');
INSERT INTO `medicament` (`idMedicament`, `Nom`) VALUES(16, 'Sildenafil');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

DROP TABLE IF EXISTS `ordonnance`;
CREATE TABLE IF NOT EXISTS `ordonnance` (
  `idOrdonnance` int(11) NOT NULL AUTO_INCREMENT,
  `dateordonnance` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TextOrdonnance` text NOT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idMedecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrdonnance`),
  KEY `FK_Ordonnance_idPersonne` (`idPatient`),
  KEY `FK_Ordonnance_idPersonne_1` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `ordonnance`
--

INSERT INTO `ordonnance` (`idOrdonnance`, `dateordonnance`, `TextOrdonnance`, `idPatient`, `idMedecin`) VALUES(9, '2018-06-03 22:10:31', 'tezt', 127, 63);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(63, 'Mlle', 'De Monaco', 'Stephanie', '17/11/1996', '25 test', 'testtest', '75000', 'Test', '0111111111', 'test25', 'test34@test.com', '05a671c66aefea124cc08b76ea6d30bb', 'testestsetest.jpg', '2017-12-07 19:07:35', 2);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(78, 'Mme', 'Mader', 'Jean Pierre', '17/03/1964', '9 rue broussais', '', '75015', 'Paris', '0106783359', 'mader_jeanpierre', 'jeanpierremader@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 'jeanpierre.jpg', '2017-12-08 13:54:25', 2);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(127, 'M.', 'Le Louët', 'Etienne', '17/11/1996', '24 Villa de Lourcine', 'Boite 40', '75014', 'Paris', '0754848257', 'etienne_lelouet', 'etiennelelouet@outlook.com', '05a671c66aefea124cc08b76ea6d30bb', '1527618297.jpg', '2018-05-29 20:24:57', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(130, 'Mme.', 'chat', 'chatchat', '11/09/1997', '20 rue des chats', '', '75010', 'Paris', '0102030405', 'chat', 'chat@gmail.com', '316e6bb49f736392f2023c166e19dd88', '4582874916.jpg', '2018-05-29 22:16:12', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(131, 'Autre', 'trash', 'trash', '17/11/1996', '666 trash', '', '75000', 'Trash', '0111111111', 'trash', 'trash@trash.com', '30639096bfe4ec4b9f17696ef1d02b9f', '3055250492.jpg', '2018-05-29 22:20:46', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(132, 'Mme.', 'Le Louet', 'Marie-Anne', '20/11/1992', '6 Rue de l''Amiral Mouchez', '', '75013', 'Paris', '0837462859', 'Marieanne', 'marieanne1@free.fr', '098f6bcd4621d373cade4e832627b4f6', '13748632884.png', '2018-05-29 22:31:16', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(133, 'Autre', 'test', 'test', '17/11/1996', '24 test', 'test', '75000', 'test', '0111111111', 'test456', 'testtest@est.com', '05a671c66aefea124cc08b76ea6d30bb', '9166627482.png', '2018-05-31 14:54:07', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(134, 'M.', 'House', 'Grigory', '12/05/1963', '10 Rue du Cherche-Midi', '', '75005', 'Paris', '0715787826', 'ghouse', 'ghouse@test.com', '05a671c66aefea124cc08b76ea6d30bb', 'test.jpg', '2018-05-31 16:12:05', 3);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(135, 'Mme', 'Lillo', 'Agnes', '22/11/1964', '24 rue du marechal Joffre', '', '75013', 'Paris', '0745867895', 'a_lillo', 'alillo@test.com', '05a671c66aefea124cc08b76ea6d30bb', 'test.pnh', '2018-05-31 16:14:00', 3);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(136, 'Autre', 'test', 'test', '17/12/1965', '24 ets', '', '75000', 'test', '0111111111', 'testtest', 'test256@test.com', '05a671c66aefea124cc08b76ea6d30bb', '1527778618.jpg', '2018-05-31 16:56:58', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(137, 'M.', 'Cissé', 'Steeve', '03/12/1964', '13 rue des vallons', '', '75015', 'Paris', '0190785696', 'scisse', 'scisse@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 'default.jpg', '2018-05-31 20:41:17', 3);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(138, 'M.', 'Buis', 'Florian', '29/10/1991', '7 Rue de la Paix', '', '91600', 'Savigny-Sur-Orge', '0111111111', 'fbuis', 'fbuis@test.com', '05a671c66aefea124cc08b76ea6d30bb', '9167195208.jpg', '2018-05-31 17:11:08', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(139, 'Autre', 'Thibault ', 'Colin', '21/09/1995', '36 rue des ecoles', '', '75005', 'Paris', '0111111111', 'tobicolin', 'tibtib@test.com', '05a671c66aefea124cc08b76ea6d30bb', '6111465260.jpg', '2018-05-31 17:18:35', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(140, 'M.', 'Julite', 'Nil', '17/11/1996', '2 rue fernand', '', '75014', 'Paris', '0111111111', 'njulite', 'njulite@test.com', '05a671c66aefea124cc08b76ea6d30bb', '4583604261.jpg', '2018-05-31 17:48:07', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(141, 'Autre', 'libel', 'lolol', '17/11/1996', '24 test', 'test', '91170', 'viry chatillon', '0111111111', 'narth', 'narth@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '13750960455.jpg', '2018-05-31 22:21:35', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(142, 'Autre', 'etset', 'estfnjezk', '17/11/1996', '24 test', '', '75000', 'Test', '0111111111', 'testtest245', 'test78@tese.com', '05a671c66aefea124cc08b76ea6d30bb', '10695192410.jpg', '2018-05-31 22:23:50', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(143, 'Autre', 'buis', 'buis', '29/10/1991', '7 rue de la paix ', '', '91170', 'viry chatillon', '0111111111', 'justepourvoir', 'justepourvoir@gmail.com', 'f532a397fe7671763732bc4f6c14fed7', '12223544872.jpg', '2018-05-31 14:38:29', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(144, 'Autre', 'libel', 'estfnjezk', '29/10/1991', '24 test', '', '74000', 'viry chatillon', '0111111111', 'jpvsicamarche', 'jpv@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12223561960.jpg', '2018-05-31 15:14:05', 1);
INSERT INTO `personne` (`idPersonne`, `etat_civil`, `nom`, `prenom`, `date_naissance`, `adresse`, `adressecomp`, `code_postal`, `Ville`, `telephone`, `login`, `email`, `password`, `urlphoto`, `date_creation`, `status`) VALUES(145, 'M.', 'test', 'test', '17/11/1996', '24 test', 'test', '75000', 'test', '0111111111', 'test256', 'test256@est.Lcom', '05a671c66aefea124cc08b76ea6d30bb', '1527959419.jpg', '2018-05-31 19:10:19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

DROP TABLE IF EXISTS `prescrire`;
CREATE TABLE IF NOT EXISTS `prescrire` (
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
  KEY `fk_prescrire_medicament` (`idMedicament`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `prescrire`
--

INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(1, 7, 63, 127, '06/04/2017', NULL, 'Prise orale, a chaque repas');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(2, 10, 78, 130, '18/11/2016', NULL, '2 fois par jour au levé et au coucher, asséchement de la peau probable, prévoir crème hydratante.');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(5, 7, 63, 138, '06/04/2017', NULL, 'Prise orale, a chaque repas');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(6, 10, 78, 127, '18/11/2016', NULL, '2 fois par jour au levé et au coucher, asséchement de la peau probable, prévoir crème hydratante.');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(9, 1, 63, 127, '13/11/1996', '', 'sdffsdfsqqfsd');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(10, 7, 63, 127, '13/11/2018', '', '');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(11, 1, 63, 127, '12/03/2018', '', '');
INSERT INTO `prescrire` (`idPrescription`, `idMedicament`, `idMedecin`, `idPatient`, `DateDebut`, `DateFin`, `Commentaire`) VALUES(12, 1, 63, 127, '18/11/2016', '18/12/2016', '2 fois par jour au lever et au coucher, asséchement de la peau probable, prévoir crème hydratante.');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `idrdv` int(11) NOT NULL AUTO_INCREMENT,
  `startRDV` int(11) DEFAULT NULL,
  `endRDV` int(11) NOT NULL,
  `libelleRDV` varchar(100) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idMedecin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrdv`),
  KEY `FK_RDV_idPersonne` (`idPatient`),
  KEY `FK_RDV_idPersonne_1` (`idMedecin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `rdv`
--

INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(57, 1527750000, 1527751800, 'Céphalées', 127, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(58, 1527755400, 1527757200, 'Mal au coeur', 127, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(59, 1544085000, 1544086800, 'aze', 130, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(60, 1527663600, 1527665400, 'J''ai mal au nerfs', 132, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(61, 1527749280, 1527751080, 'J''ai mal au coeur', 132, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(62, 1527867000, 1527868800, 'test test', 130, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(63, 1527924600, 1527926400, 'test', 139, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(64, 1527924600, 1527926400, 'test', 142, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(65, 1527930000, 1527931800, 'etez', 142, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(66, 1527946200, 1527948000, 'deafa', 136, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(67, 1527953400, 1527955200, '1231', 143, 78);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(68, 1527949800, 1527951600, '', 143, 63);
INSERT INTO `rdv` (`idrdv`, `startRDV`, `endRDV`, `libelleRDV`, `idPatient`, `idMedecin`) VALUES(69, 1528192800, 1528194600, 'il pourrait etre beaucoup plus popre ce site de merde', 145, 78);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idService` int(11) NOT NULL AUTO_INCREMENT,
  `nomService` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idService`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`idService`, `nomService`) VALUES(1, 'Cardiologie');
INSERT INTO `service` (`idService`, `nomService`) VALUES(2, 'Neurologie');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpecialite` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idSpecialite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`idSpecialite`, `libelle`) VALUES(1, 'Cardiologie');
INSERT INTO `specialite` (`idSpecialite`, `libelle`) VALUES(2, 'Neurologie');

-- --------------------------------------------------------

--
-- Structure de la vue `listepatienthospitalise`
--
DROP TABLE IF EXISTS `listepatienthospitalise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wef`@`%` SQL SECURITY DEFINER VIEW `listepatienthospitalise` AS select `personne`.`idPersonne` AS `idPatient`,`personne`.`nom` AS `nom`,`personne`.`prenom` AS `prenom`,`personne`.`date_naissance` AS `date_naissance`,`personne`.`urlphoto` AS `urlphoto`,`hospitalisation`.`motif` AS `motif`,`hospitalisation`.`dateEntree` AS `dateEntree`,`hospitalisation`.`dateSortie` AS `dateSortie`,`hospitalisation`.`idService` AS `idService`,`hospitalisation`.`idHospi` AS `idHospi`,`service`.`nomService` AS `nomService`,`chambre`.`idChambre` AS `idChambre`,`chambre`.`etage` AS `etage` from (((`personne` join `hospitalisation`) join `chambre`) join `service`) where ((`hospitalisation`.`idPersonne` = `personne`.`idPersonne`) and (`hospitalisation`.`idChambre` = `chambre`.`idChambre`) and (`hospitalisation`.`idService` = `service`.`idService`));

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `donneesbiologiques`
--
ALTER TABLE `donneesbiologiques`
  ADD CONSTRAINT `FK_DossierPat_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `donneesjournalieres`
--
ALTER TABLE `donneesjournalieres`
  ADD CONSTRAINT `donneesjournalieres_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  ADD CONSTRAINT `donneesjournalieres_ibfk_2` FOREIGN KEY (`idHospitalisation`) REFERENCES `hospitalisation` (`idHospi`),
  ADD CONSTRAINT `fk_donneesjournalieres_idInfirmier` FOREIGN KEY (`idInfirmier`) REFERENCES `infirmier` (`idPersonne`);

--
-- Contraintes pour la table `donneesmedicales`
--
ALTER TABLE `donneesmedicales`
  ADD CONSTRAINT `donneesmedicales_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  ADD CONSTRAINT `donneesmedicales_ibfk_2` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`);

--
-- Contraintes pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD CONSTRAINT `FK_Hospitalisation_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `Hospitalisation_Chambre_idChambre_fk` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`idChambre`),
  ADD CONSTRAINT `hospitalisation_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `donneesbiologiques` (`idPersonne`);

--
-- Contraintes pour la table `infirmier`
--
ALTER TABLE `infirmier`
  ADD CONSTRAINT `FK_Infirmier_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `FK_Infirmier_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`);

--
-- Contraintes pour la table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `lien_ibfk_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  ADD CONSTRAINT `lien_ibfk_2` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `FK_Medecin_idPersonne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `FK_Medecin_idService` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `FK_Medecin_idSpecialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`);

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `FK_Ordonnance_idPersonne` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`),
  ADD CONSTRAINT `FK_Ordonnance_idPersonne_1` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`);

--
-- Contraintes pour la table `prescrire`
--
ALTER TABLE `prescrire`
  ADD CONSTRAINT `fk_prescrire_medicament` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`idMedicament`),
  ADD CONSTRAINT `fk_prescrir_idMedecin` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  ADD CONSTRAINT `fk_prescrir_idPersonne` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_rdv_idMedecin` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idPersonne`),
  ADD CONSTRAINT `fk_rdv_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `donneesbiologiques` (`idPersonne`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
