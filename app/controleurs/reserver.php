<?php
if (!isset($_POST['startRDV']) || !isset($_POST['idMedecin']))
{
	header('location: index.php?page=listespe');
}

require 'modele/reserver.php';

if (!isset($_POST['formvalid']))
{
	$res=getMedInfo($_POST['idMedecin']);
	$res=$res[0];
	require 'vue/reserver.php';

}

if (isset($_POST['formvalid']))
{
<<<<<<< HEAD
	if (insertRDV($_POST['idMedecin'], $_SESSION['id'],$_POST['startRDV']))
	{
		header('location: index.php?page=success');
	}
	else
	{
		$erreurrdv='erreur lors de la reservation, veuillez réessayer';
		require 'vue/reserver.php';
	}	
=======
	//echo 'normalement ça reserve';
	//insertRDV($_POST['startRDV');	
	require 'vue/successrdv.php';
>>>>>>> 7b6e340e3d5ba9b7ee2879c55c6f11a556d7bd1d
}


