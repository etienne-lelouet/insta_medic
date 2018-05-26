<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

if (isset($_REQUEST['action']))
{
    $action = $_REQUEST['action'];
}
else
{
    exit('{"error":"action non renseigné"}');
}

if (isset($_REQUEST['idinscrire']))
{
    $idinscrire = $_REQUEST['idinscrire'];
}
else
{
    exit('{"error":"id non renseigné"}');
}

$resultats = Modele :: confirmation($action, $idinscrire);

if ($resultats)
{
    echo '{"success":"mise à jour effectuée"}';
}
else
{
    echo '{"error":"erreur lors de la mise à jour"}';
}

?>