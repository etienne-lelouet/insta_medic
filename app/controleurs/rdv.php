<?php

require('modele/rdv.php');

if (!isset($_SESSION['id']))	
{
	header('location: index.php');
}
if (!isset($_POST['id']))
{
	header('location: index.php?page=listespe');
}


if (!isset($_GET['date']))
{
	$begin_day_ts = mktime(0, 0, 0);
}
else
{
	//le code pour la date
}

$res = liste_rdv($_POST['id'], $begin_day_ts);

$beginworkday=$begin_day_ts+32400;
$endworkday=$begin_day_ts+64800;
$planning=array();
while($beginworkday < $endworkday)
{
	foreach ($res as $value)
	{
		if ($beginworkday == $value['startRDV'])
		{
			$planning[$beginworkday]=$value;
			$beginworkday=$beginworkday+1800;
			break;
		}
	}	
	$planning[$beginworkday]=false;
	$beginworkday=$beginworkday+1800;
}

require 'vue/rdv.php';
