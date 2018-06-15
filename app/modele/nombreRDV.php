<?php

function getNombreRDV($moisDebut, $moisFin)
{
    $conn = connexion();

    $query = 'SELECT count(*) as nbRDV, t2.idPersonne,t2.nom, t2.prenom 
    FROM rdv t1, personne t2 
    WHERE startRDV > :moisDebut AND startRDV < :moisFin AND t1.idMedecin = t2.idPersonne 
    GROUP BY t2.idPersonne ORDER BY nbRDV DESC'; //grouper par tous les champs

    $query = $conn->prepare($query);
    $query->bindparam(':moisDebut', $moisDebut);
    $query->bindparam(':moisFin', $moisFin);
    $query->execute();
    $res = $query->fetchALL(PDO::FETCH_ASSOC);
    return $res;
}

?>