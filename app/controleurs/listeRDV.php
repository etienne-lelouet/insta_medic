<?php

if (!isset($_SESSION['id']))	
{
	header('location: index.php');
}

require 'modele/listeRDV.php';

$res = getListeRDV($_SESSION['id']);

require 'vue/listeRDV.php'

?>
