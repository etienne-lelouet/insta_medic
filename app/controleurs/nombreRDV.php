<?php

    require_once('modele/nombreRDV.php');

    if ($_SESSION['status'] == 1)
    {
        header('location: index.php');
    }

    $moisDebut = 1527804593;
    $moisFin =  1530310193;

    $listeRDV = getNombreRDV($moisDebut, $moisFin);

    require_once('vue/nombreRDV.php');

?>