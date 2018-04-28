<?php

session_start();

require_once "config.php";

if (isset($_SESSION['id']) || $_GET['page']=="inscription" || isset($_GET['queryType']))
{
        if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php'))
        {
                require_once 'controleurs/'.$_GET['page'].'.php';
        } 
        else 
        {
                require_once 'controleurs/accueil.php';
        }
}
else
{
        require_once 'controleurs/connexion.php';
}

?>
