<?php

function getListepa($id)
{
	$conn = connexion($id);
	$query = 'SELECT t2.*
		  FROM lien t1, Personne t2 
		  WHERE t1.idMedecin = :id
		  AND t1.idPatient = t2.idPersonne;';
	$query = $conn->prepare($query);
	$query->bindparam(':id', $id);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	$query2 = 'SELECT t1.*, t2.nomService
	FROM Hospitalisation t1, Service t2 WHERE dateSortie IS NULL AND t1.idService = t2.idService';
	$query2 = $conn->prepare($query2);
	$query2->execute();
	$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
	foreach ($res as &$sub) {
		foreach ($res2 as $sub2) {
			if ($sub['idPersonne'] == $sub2['idPersonne']) {
				$sub['hospitalise'] = true;
				$sub['nomService'] = $sub2['nomService'];
				$sub['idChambre'] = $sub2['idChambre'];
			}
		}
	}

	return $res;
}

