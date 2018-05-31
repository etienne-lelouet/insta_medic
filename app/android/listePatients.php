<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';


if (isset($_REQUEST['idService']))
{
    if (!preg_match('/^\d{1,}$/', $_REQUEST['idService'])) {

        exit('{"erreur":"Pas d\'id fourni"}"');
    }
    $idService = $_REQUEST['idService'];
}
else
{
    exit('{"error":"login non renseigné"}');
}

$result [] = Modele :: listerPatients($idService);

if ($result[0]['nb'] == 0)
{
    exit('{"result":"pas de patients hospitalisés"}"');
}

print(json_encode($result));

?>