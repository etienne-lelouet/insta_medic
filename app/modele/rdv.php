<?php

//Selectionne tous les RDVs pour le medecin selectionné aujourd'hui
function liste_rdv_medecin($id, $timestamp)
{
	$conn=connexion();
	$now = time();
	$now = $now + 1800;
	$end_day_ts = $timestamp + 86400;
	$query='SELECT * FROM RDV WHERE idMedecin = :id AND startRDV > :now AND startRDV < :end_day_ts'; 
	
	$query=$conn->prepare($query);
	
	$query->bindParam(':id', $id);
	$query->bindParam(':now', $now);
	$query->bindParam(':end_day_ts', $end_day_ts);
	
	$query->execute();
	
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $res;
}

//Selectionne la liste des rendez vous du patient selectionné aujourd'hui
function liste_rdv_patient($id, $timestamp)
{
	$conn=connexion();
	$now = time();
	$now = $now + 1800;
	$end_day_ts = $timestamp + 86400;

	$query = 'SELECT t1.*, t2.*
		FROM RDV t1, Personne t2
		WHERE t1.idPatient = :idpatient AND t1.startRDV > :now AND startRDV < :end_day_ts
		AND t2.idPersonne = t1.idMedecin';
	$query = $conn->prepare($query);
	
	$query->bindParam(':idpatient', $id);
	$query->bindParam(':now', $now);
	$query->bindParam(':end_day_ts', $end_day_ts);
	
	$query->execute();
	
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $res;
}

function getMedInfo($idMedecin)
{
	$conn=connexion();
	$query = "SELECT t1.*, t2.*
		 FROM Personne t1, Medecin t2
		 WHERE t1.idPersonne = :idMedecin AND t2.idPersonne=t1.idPersonne";	
	$query = $conn->prepare($query);
	$query->bindParam(':idMedecin', $idMedecin);
	$query->execute();					                
	$res = $query->fetch(PDO::FETCH_ASSOC);
	return $res;
}


?>
