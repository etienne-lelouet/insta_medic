<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

if (isset($_REQUEST['email']))
{
    $email = $_REQUEST['email'];
}
else
{
    exit('{"error":"email non renseigné"}');
}

$resultats = Modele :: mesInscriptions($email);

print(json_encode($resultats));

?>