<?php

function getListepa($id)
{
	$conn=connexion($id);
	$query = 'SELECT t1.*, t2.*, t3.* 
		  FROM lien t1, Personne t2, Patient t3
		  WHERE t1.idMedecin = :id
		  AND t1.idPatient = t2.idPersonne
		  AND t1.idPatient = t3.idPersonne;';
	$query = $conn->prepare($query);
	$query->bindparam(':id', $id);
	$query->execute();
	$res=$query->fetchAll(PDO::FETCH_ASSOC);

	return $res;
}

