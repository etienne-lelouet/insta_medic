<?php
require_once 'config.php';


function insertRDV($idmedecin, $idpatient, $startRDV)
{
	$conn=connexion();
	$query = 'INSERT INTO RDV (startRDV, endRDV, idPersonne, idPersonne_1) VALUES (:startRDV, :endRDV, :idPersonne, :idPersonne_1)';

	$query = $conn->prepare($query);
	$endRDV = intval($startRDV)+1800;
	$query->bindParam(':startRDV', $startRDV);
	$query->bindParam(':endRDV', $endRDV);
	$query->bindParam(':idPersonne', $idpatient);
	$query->bindParam('idPersonne_1', $idmedecin);

	if ($query -> execute())
	{
		$query2 = 'SELECT count(*) AS nb FROM lien WHERE idMedecin = :idPersonne_1 AND idPatient = :idPersonne';
		$query2 = $conn->prepare($query2);
		$query2->bindParam(':idPersonne', $idpatient);
		$query2->bindParam(':idPersonne_1', $idmedecin);
		$query2->execute();
		$res = $query2->fetch(PDO::FETCH_ASSOC);
		if ($res['nb']>0)
		{
			echo 'ui ui';
			return true;
		}
		else if ($res['nb'] == 0)
		{
			echo 'non non';
			$query3 = 'INSERT INTO lien (idMedecin, idPatient) VALUES (:idPersonne_1, :idPersonne)';
			$query3 = $conn->prepare($query3);
			$query3->bindParam(':idPersonne_1', $idmedecin);
			$query3->bindParam(':idPersonne', $idpatient);
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
		 FROM Personne t1, Medecin t2
		 WHERE t1.idPersonne = :idMedecin AND t2.idPersonne=t1.idPersonne";	
	$query = $conn->prepare($query);
	$query->bindParam(':idMedecin', $idMedecin);
	$query->execute();					                
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	return $res;
}
