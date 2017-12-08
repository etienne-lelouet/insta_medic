<?php

require 'config.php';


function liste_rdv($id, $timestamp)
{
	$conn=connexion();
	$end_day_ts = $timestamp + 86400;
	$query='SELECT * FROM RDV WHERE idPersonne_1 = :id AND startRDV > :timestamp AND startRDV < :end_day_ts'; 
	
	$query=$conn->prepare($query);
	
	$query->bindParam(':id', $id);
	$query->bindParam(':timestamp', $timestamp);
	$query->bindParam(':end_day_ts', $end_day_ts);
	
	$query->execute();
	
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $res;
}




?>
