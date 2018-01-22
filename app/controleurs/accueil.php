<?php

if (!isset($_SESSION['id']))
{
    	header('Location: index.php');
}
require_once 'modele/accueil.php';

$res_user=getinfo($_SESSION['id']);

//include de home si $_GET['page'] n'est pas defini ou $_GET['page'] = accueil	 

if ($res_user['status'] == 2)
{
	if (!isset($_GET['page']) || $_GET['page'] == 'accueil')
	{
		require 'vue/home_medecin.php';
	}
}
else if ($res_user['status'] == 1)
{
	if (!isset($_GET['page']) || $_GET['page'] == 'accueil')
	{
		require 'vue/home_user.php';
	}

}

