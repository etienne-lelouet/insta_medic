<?php

if (!isset($_SESSION['id']))
{
    header('Location: index.php');
}
require 'modele/accueil.php';

$res_user=getinfo($_SESSION['id']);


var_dump($res_user);
require 'vue/home.php';

