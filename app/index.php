<?php
session_start();

if (isset($_SESSION['id']) || $_GET['page'] == "inscription")//si id du tableau est crée il set...
{
        if (!empty($_GET['page']) && is_file('controleurs/' . $_GET['page'] . '.php')) //si oui etla personne demande une page en particulier si existe
        {
                require_once 'controleurs/' . $_GET['page'] . '.php';//donc on le redirige
                //require : prend tous le contenu et copier le script 
                //require once; inclue le fichier seulement s'il n'est pas inclut
        } else {
                require_once 'controleurs/accueil.php';
        }

} else {
        require_once 'controleurs/connexion.php';
}

?>
