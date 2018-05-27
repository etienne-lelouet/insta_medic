<?php
class Modele
{
    private static $pdo;

    public static function connexion()
    {
        try {
            Modele::$pdo = new PDO("mysql:host=163.172.49.216;dbname=Clinique", "wef", "ppe2018wef");
        } catch (exception $e) {
            echo $e . '</br />';
        }
    }

    public static function verifConnexion($login, $password)
    {
	
	Modele::connexion();

        $password = md5($password);

        $requete = "SELECT count(*), t1.*, t2.idService, t3.nomService FROM Personne t1, Infirmier t2, Service t3
        WHERE t1.login = :login AND t1.password = :password 
        AND t1.status = 3 AND t1.idPersonne = t2.idPersonne AND t2.idService = t3.idService";

        $select = Modele::$pdo->prepare($requete);

        $data = array(":login" => $login, ":password" => $password);

        $select->execute($data);

        $res = $select->fetch();
	
        return $res;
    }

    public static function listerlespatients($idService)
    {
        Modele::connexion();

        $now = time();
        $tsToday = strtotime(date('d.m.Y', $now));

        $requete = "SELECT t1.*, t2.nom, t2.prenom, t2.date_naissance, t3.numero, t3.etage
                    FROM Hospitalisation t1, Personne t2, Chambre t3,
                    WHERE t1.idPersonne = t2.idPersonne 
                    AND t1.idService = :idService
                    AND t1.idChambre = t3.idChambre
                    AND t1.idPersonne NOT IN ( SELECT * FROM donneesJournalieres 
                                                   WHERE derniereMaj < :tsToday )";

        $select = Modele::$pdo->prepare($requete);
        $select->execute();
        $resultats = $select->fetchAll();
        return $resultats;
    }

    public static function insertionDonneesJournalieres($data)
    {
        Modele::connexion();
        $requete = "INSERT INTO donneesJournalieres (temperature, tension, poids, autres, idPatient, idHospitalisation, idInfirmier) 
        VALUES (:temperature, :tension, :poids, :autres, :idPatient, :idHospitalisation, :idInfirmier)";

        $insert = Modele::$pdo->prepare($requete);

        if ($insert->execute($donnees)) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateDonneesJournalieres($data)
    {
        Modele::connexion();

        $requete = "UPDATE donneesJournalieres SET WHERE idDonnees = :idDonnees";

        $strSet = '';

        $res = array();

        foreach ($data as $key => $sub) {
            if ($key != "idDonnees") {
                $strSet .= $key . "= :" . $key;
            }
        }


        $select = Modele::$pdo->prepare($requete);
        $donnees = array(":action" => $action, ":idinscrire" => $idinscrire);
        if ($select->execute($donnees)) {
            return true;
        } else {
            return false;
        }
    }

    public static function desinscrire($idinscrire)
    {
        Modele::connexion();
        $requete = "DELETE from inscrire WHERE idinscrire = :idinscrire";

        $select = Modele::$pdo->prepare($requete);
        $donnees = array(":idinscrire" => $idinscrire);
        if ($select->execute($donnees)) {
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
