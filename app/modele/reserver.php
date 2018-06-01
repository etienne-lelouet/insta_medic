<?php

function insertRDV($idmedecin, $idpatient, $startRDV, $description)
{
	$conn=connexion();
	$query = 'INSERT INTO rdv (startRDV, endRDV, idPatient, idMedecin, libelleRDV) VALUES (:startRDV, :endRDV, :idPatient, :idMedecin, :description)';

	$query = $conn->prepare($query);
	$endRDV = intval($startRDV)+1800;
	$query->bindParam(':startRDV', $startRDV);
	$query->bindParam(':endRDV', $endRDV);
	$query->bindParam(':idPatient', $idpatient);
	$query->bindParam(':idMedecin', $idmedecin);
	$query->bindParam(':description', $description);

	if ($query -> execute())
	{
		$query2 = 'SELECT count(*) AS nb FROM lien WHERE idMedecin = :idMedecin AND idPatient = :idPatient';
		$query2 = $conn->prepare($query2);
		$query2->bindParam(':idPatient', $idpatient);
		$query2->bindParam(':idMedecin', $idmedecin);
		$query2->execute();
		$res = $query2->fetch(PDO::FETCH_ASSOC);
		if ($res['nb']>0)
		{
			return true;
		}
		else if ($res['nb'] == 0)
		{
		
			$query3 = 'INSERT INTO lien (idMedecin, idPatient) VALUES (:idMedecin, :idPatient)';
			$query3 = $conn->prepare($query3);
			$query3->bindParam(':idMedecin', $idmedecin);
			$query3->bindParam(':idPatient', $idpatient);
			if ($query3 -> execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	else
	{
		return false;
	}
}

function getMedInfo($idMedecin)
{
	$conn=connexion();
	$query = "SELECT t1.*, t2.*
		 FROM personne t1, medecin t2
		 WHERE t1.idPersonne = :idMedecin AND t2.idPersonne=t1.idPersonne";	
	$query = $conn->prepare($query);
	$query->bindParam(':idMedecin', $idMedecin);
	$query->execute();					                
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	return $res;
}
