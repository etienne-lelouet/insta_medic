<?php

function getListepa($id)
{
	$conn=connexion($id);
	$query = 'SELECT t1.*, t2.*
		  FROM lien t1, Personne t2 
		  WHERE t1.idMedecin = :id
		  AND t1.idPatient = t2.idPersonne;';
	$query = $conn->prepare($query);
	$query->bindparam(':id', $id);
	$query->execute();
	$res=$query->fetchAll(PDO::FETCH_ASSOC);

	return $res;
}

