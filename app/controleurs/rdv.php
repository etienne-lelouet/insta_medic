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


if (!isset($_POST['date']))
{
	$begin_day_ts = mktime(0, 0, 0);
}
else
{
	$date = $_POST['date'];
	if(!preg_match('/([0-2][0-9]|3[0-1])(\/|-|\.)(0[0-9]|1[0-2])(\/|-|\.)[0-9]{4}/', $date))
	{
		$begin_day_ts = mktime(0, 0, 0);
	}
	else
	{
		$date=strtotime($date);

		if ($date < mktime(0, 0, 0))
		{	
			$begin_day_ts = mktime(0, 0, 0);
		}
		else
		{
			$begin_day_ts = $date;
		}
	}
}

$res = liste_rdv_medecin($_POST['id'], $begin_day_ts);

$res2 = liste_rdv_patient($_SESSION['id'], $begin_day_ts);

$resmed = getMedInfo($_POST['id']);
$resmed = $resmed;
$now = time();
$beginworkday=$begin_day_ts+32400;
$endworkday=$begin_day_ts+64800;
$planning=array();
while($beginworkday < $endworkday)
{
	if($beginworkday > $now +1800)
	{
		foreach ($res2 as $value)
		{
			if ($beginworkday == $value['startRDV'])
			{
				$resTemp = getMedInfo($value['idPersonne_1']);
				$planning[$beginworkday]='<th class="rdv">Rendez vous avec '.$resTemp['etat_civil'].' '.$resTemp['nom'].' '.$resTemp['prenom'].'</th>';
				$beginworkday=$beginworkday+1800;
				continue(2);
			}
		}
		foreach ($res as $value)
		{
			if ($beginworkday == $value['startRDV'])
			{
				// if($value['idPersonne'] == $_SESSION['id'])
				// {
				// 	$resTemp = getMedInfo($value['idPersonne_1']);
				// 	$planning[$beginworkday]='<th class="rdv">Rendez vous avec '.$resTemp['etat_civil'].' '.$resTemp['nom'].' '.$resTemp['prenom'].'</th>';
				// 	break;
				// }
				$planning[$beginworkday]='<th class="rdv">Ce créneau horaire est déja réservé</th>';
				$beginworkday=$beginworkday+1800;
				break;
			}
		}

		$planning[$beginworkday] = false;
	}
	else
	{
		$planning[$beginworkday]='<th class="done">Ce creneau horaire est passé</th>';
	}	
	$beginworkday=$beginworkday+1800;
}

require 'vue/rdv.php';
