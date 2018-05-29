<?php

    function check_if_exists_lien($idPatient, $idMedecin)
    {
        $conn = connexion();
        $query = "SELECT count(*) AS nb FROM lien WHERE idMedecin = :idMedecin AND idPatient = :idPatient";
        $query = $conn->prepare($query);
        $query->bindparam(':idMedecin', $idMedecin);
        $query->bindparam(':idPatient', $idPatient);
        $query->execute();
        $res = $query->fetch(PDO::FETCH_ASSOC);
        if($res['nb'] >0)
        {
            return true;
        }
        else
        {
            return false;   
        }
    }
?>