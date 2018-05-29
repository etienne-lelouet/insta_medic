<?php

if (!isset($_POST['id']))
{
	header('location: index.php');
}

require 'modele/listemedecins.php';

$res=liste($_POST['id']);

require 'vue/listemedecins.php';
