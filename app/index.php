<?php
session_start();

if (isset($_SESSION['id']) || $_GET['page']=="inscription")
{
        if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php')) 
        {
                require 'controleurs/'.$_GET['page'].'.php';
        } 
        else 
        {
                require 'controleurs/accueil.php';
        }

} //sinon, on la redirige vers la page de connexion.
else
{
        require 'controleurs/connexion.php';
}

?>
