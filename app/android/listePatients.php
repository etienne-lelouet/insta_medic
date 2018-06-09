<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';


if (isset($_REQUEST['idService']))
{
    if (!preg_match('/^\d{1,}$/', $_REQUEST['idService'])) {

        exit('{"erreur":"id In"}"');
    }
    $idService = $_REQUEST['idService'];
}
else
{
    exit('{"error":"id non renseigné"}');
}

$result = Modele :: listerPatients($idService);

if (count($result) == 0)
{
    exit('{"result":"pas de patients hospitalisés"}"');
}
else
{
    print(json_encode($result));
}


?>