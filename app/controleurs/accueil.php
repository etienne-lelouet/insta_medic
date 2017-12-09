<?php

if (!isset($_SESSION['id']))
{
    	header('Location: index.php');
}
require_once 'modele/accueil.php';

$res_user=getinfo($_SESSION['id']);

//include de home si $_GET['page'] n'est pas defini ou $_GET['page'] = accueil	 

if (!isset($_GET['page']) || $_GET['page'] == 'accueil')
{
	require 'vue/home.php';
}
