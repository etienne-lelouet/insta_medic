<?php
    require_once 'modele/accueil.php';
    require_once 'modele/personne.php';

    if(!isset($_GET['id']))
    {
        header("location: index.php") ;
    }
    if ($_GET['id'] != $_SESSION['id'])
    {
        if(!check_if_exists_lien($_GET['id'], $_SESSION['id']))
        {
            header("location: index.php") ;
        }
    }

    $res = getinfo($_GET['id']);


    require 'vue/personne.php';