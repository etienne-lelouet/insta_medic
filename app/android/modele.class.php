<?php
class Modele
{
    private static $pdo;

    public static function connexion()
    {
        try {
            Modele::$pdo = new PDO("mysql:host=163.172.49.216;dbname=clinique", "wef", "ppe2018wef", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (exception $e) {
            echo $e . '</br />';
        }
    }

    public static function verifConnexion($login, $password)
    {
	
	Modele::connexion();

        $password = md5($password);

        $requete = "SELECT count(*) as nb, t1.*, t2.idService, t3.nomService FROM personne t1, infirmier t2, service t3
        WHERE t1.login = :login AND t1.password = :password 
        AND t1.status = 3 AND t1.idPersonne = t2.idPersonne AND t2.idService = t3.idService";
        $select = Modele::$pdo->prepare($requete);

        $data = array(":login" => $login, ":password" => $password);

        $select->execute($data);
        $res = $select->fetchAll(PDO::FETCH_ASSOC); 
		
        return $res;
    }

    public static function listerPatients($idService)
    {
        Modele::connexion();

        $requete = "SELECT * FROM listepatienthospitalise WHERE idService = :idService AND dateSortie IS NULL";

        $select = Modele::$pdo->prepare($requete);
        $select->bindParam(':idService', $idService);
        $select->execute();
        $resultats = $select->fetchAll();
        return $resultats;
    }

    public static function getDonneesJournalieres($idPatient)
    {
        Modele::connexion();

        $now = time();
        $tsToday = strtotime(date('d.m.Y', $now));

        $requete = "SELECT t1.*, t2.* FROM donneesjournalieres t1, patient t2 WHERE derniereMAJ > :now AND idPatient = :idPatient AND dateSortie IS NULL";

        $select = Modele::$pdo->prepare($requete);
        $select->execute();
        $resultats = $select->fetchAll();
        return $resultats;
    }

    public static function insertionDonneesJournalieres($data)
    {
        Modele::connexion();
        $requete = "INSERT INTO donneesjournalieres (temperature, tension, poids, autres, idPatient, idHospitalisation, idInfirmier) 
        VALUES (:temperature, :tension, :poids, :autres, :idPatient, :idHospitalisation, :idInfirmier)";
        $data=prepData($data);
        $insert = Modele::$pdo->prepare($requete);

        if ($insert->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateDonneesJournalieres($data)
    {
        Modele::connexion();

        $requete = "UPDATE donneesjournalieres SET temperature = :temperature, poids = : poids, autres = :autres, 
                                                idPatient = :idPatient, idHospitalistion = :idHospitalistion,
                                                idInfirmier = :idInfirmier 
                                                WHERE idDonnees = :idDonnees";
        $data=prepData($data);

        $select = Modele::$pdo->prepare($requete);
        if ($select->execute($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function prepData($data)
    {
        $res = array();
        foreach ($data as $key => $value) {
            $keyRes = ':' . $key;
            $res[$keyRes] = $value;
        }

        return $res;
    }
}
?>
