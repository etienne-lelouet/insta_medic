<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';


if (isset($_REQUEST['login'])) {
    if (!preg_match($regexValidation['login'], $_REQUEST['login'])) {

        exit('[{"erreur":"login invalide"}]"');
    }
    $login = $_REQUEST['login'];
} else {
    exit('[{"erreur":"login non renseigné"}]');
}

if (isset($_REQUEST['password'])) {
    if (!preg_match($regexValidation['password'], $_REQUEST['password'])) {

        exit('[{ "erreur":"mot de passe invalide" }]');
    }
    $password = $_REQUEST['password'];
} else {
    exit('[{"erreur":"mdp non renseigné"}]');
}

$result = Modele::verifConnexion($login, $password);

if ($result[0]['nb'] == 0) {
    exit('[{ "erreur":"couple invalide" }]');
}

print(json_encode($result));

?>
