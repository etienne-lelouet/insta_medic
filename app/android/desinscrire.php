<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

if (isset($_REQUEST['idinscrire']))
{
    $idinscrire = $_REQUEST['idinscrire'];
}
else
{
    exit('{"error":"id non renseigné"}');
}

$resultats = Modele :: desinscrire($idinscrire);

if ($resultats)
{
    echo '{"success":"suppresion effectuée"}';
}
else
{
    echo '{"error":"erreur lors de la suppression"}';
}

?>