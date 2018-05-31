<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';


if (isset($_REQUEST['idPatient']))
{
    if (!preg_match('/^\d{1,}$/', $_REQUEST['idPatient'])) {

        exit('{"erreur":"Pas d\'id fourni"}"');
    }
    $idPatient = $_REQUEST['idPatient'];
}
else
{
    exit('{"error":"login non renseigné"}');
}

$result [] = Modele :: getDonneesJournalieres($idPatient);

if (count($result) == 0)
{
    exit('{"result":"pas de patients hospitalisés"}"');
}

print(json_encode($result));

?>