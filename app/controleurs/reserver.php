<?php
if (!isset($_POST['startRDV']) || !isset($_POST['idMedecin'])) {
	header('location: index.php?page=listespe');
}

require 'modele/reserver.php';

if (!isset($_POST['formvalid'])) {
	$res = getMedInfo($_POST['idMedecin']);
	$res = $res[0];
	require 'vue/reserver.php';

}

if (isset($_POST['formvalid'])) {
	if (insertRDV($_POST['idMedecin'], $_SESSION['id'], $_POST['startRDV'], $_POST['description'])) {
		header('location: index.php?page=listeRDV');
	} else {
		$erreurrdv = 'erreur lors de la reservation, veuillez réessayer';
		require 'vue/reserver.php';
	}
}


