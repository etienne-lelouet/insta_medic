<?php

function listespe()
{
	$conn=connexion();
	$query = 'SELECT * FROM specialite';
	$query = $conn->prepare($query);
	$query -> execute();
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	return $res;
}

