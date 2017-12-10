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
	//echo 'normalement ça reserve';
	//insertRDV($_POST['startRDV');	
	require 'vue/successrdv.php';
}


