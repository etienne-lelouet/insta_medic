<?php

require 'config.php';

function listespe()
{
	$conn=connexion();
	$query = 'SELECT * FROM Specialite';
	$query = $conn->prepare($query);
	$query -> execute();
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	return $res;
}

