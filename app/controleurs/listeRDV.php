<?php

if (!isset($_SESSION['id']))	
{
	header('location: index.php');
}

require 'modele/listeRDV.php';

$res = getListeRDV($_SESSION['id']);

var_dump($res);




require 'vue/listeRDV.php'

?>
