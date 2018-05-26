<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';

if (isset($_REQUEST['login']))
{
    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $_REQUEST['login'])) {

        exit('{"erreur":"login invalide"}"');
    }

    $login = $_REQUEST['login'];
}
else
{
    exit('{"error":"login non renseigné"}');
}

if (isset($_REQUEST['password']))
{
    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $_REQUEST['password'])) {

        exit('{"erreur":"mot de passe invalide"}"');
    }
    $password = $_REQUEST['password'];
}
else
{
    exit('{"error":"mdp non renseigné"}');
}

$result [] = Modele :: verifConnexion($login, $mdp);

print(json_encode($result));
?>