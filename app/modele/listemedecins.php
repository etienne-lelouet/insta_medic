<?php
require 'config.php';
function liste($id)
{
	$conn = connexion();

	$query = 'call liste_medecin (:id)';
	$query = $conn->prepare($query);
	$query->bindParam('id', $id);
	$query->execute();
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	return $res;
}

