<?php
    require_once 'modele/accueil.php';
    require_once 'modele/personne.php';

    if($_SESSION['status'] != 2 || !isset($_GET['id']) || is_int($_GET['id']))
    {
        header("location: index.php") ;
    }
    else if(check_if_exists_lien($_GET['id'], $_SESSION['id']))
    {
        header("location: index.php") ;
    }


    $res = getinfo($_GET['id']);

    //var_dump($res);


    require 'vue/personne.php';