<?php
session_start();
//On inclut le contrôleur s'il existe et s'il est spécifié
require 'vue/header.php';

//si la personne est identifiée, on la redirige vers la page demandée ou l'accueil.
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
        require 'vue/connexion.php';
}

require 'vue/footer.php';
?>