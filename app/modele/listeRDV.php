<?php

require 'config.php';

function getListeRDV($id)
{
	$conn=connexion();
	$query = 'SELECT t1.*, t2.*, t3.*, t4.libelle 
		  FROM RDV t1, Personne t2, Medecin t3, Specialite t4
		  WHERE t1.idPersonne = :id
		  AND t1.idPersonne_1 = t3.idPersonne
		  AND t2.idPersonne = t3.idPersonne 
		  AND t3.idSpecialite = t4.idSpecialite';
	$query = $conn->prepare($query);
	$query->bindparam(':id', $id);
	$query->execute();
	$res=$query->fetchAll(PDO::FETCH_ASSOC);

	return $res;

}

