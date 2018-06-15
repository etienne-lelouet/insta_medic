<?php

if (!isset($_SESSION['id'])) {
	header('location: index.php');
}

require 'modele/listeRDV.php';

if (isset($_POST['date']))
{
	if(strtotime($_POST['date']))
	{
		$date = strtotime($_POST['date']);
	}
}

if ($_SESSION['status'] == 1) {
	$res = getListeRDV($_SESSION['id'], $date); // on récupère tous les rendez vous
	$now = time();
	$resfutur = array();
	$respasse = array();
	foreach ($res as $val) //on les stocke dans deux arrays différentes selon si ils sont passés ou non
	{
		if ($val['startRDV'] > $now) {
			$resfutur[] = $val;
		} else {
			$respasse[] = $val;
		}
	}
} else if ($_SESSION['status'] == 2) {
	$res = getListeRDVMedecin($_SESSION['id'], $date); // on récupère tous les rendez vous
	$now = time();
	$resfutur = array();
	$respasse = array();
	foreach ($res as $val) //on les stocke dans deux arrays différentes selon si ils sont passés ou non
	{
		if ($val['startRDV'] > $now) {
			$resfutur[] = $val;
		} else {
			$respasse[] = $val;
		}
	}
}

require 'vue/listeRDV.php'

?>
