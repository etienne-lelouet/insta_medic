<?php

if (!session_start())
{
    header('Location: index.php');
}

require 'modele/accueil.php';
$res_user=getinfo($_SESSION['id']);


require 'vue/accueil.php';

