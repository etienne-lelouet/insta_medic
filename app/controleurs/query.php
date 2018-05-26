<?php

require_once 'modele/inscription.php';
require_once 'config.php';
function checkdoublons()
{
    if ($_GET['field'] == 'login') {
        if (preg_match('/^[a-zA-Z]\w{3,14}$/', $_GET['value'])) {
            if (verifier_doublons('login', $_GET['value'])) {
                $res = array("res" => false);
                exit(json_encode($res));
            } else {
                $res = array("res" => true);
                exit(json_encode($res));
            }
        }
    } else if ($_GET['field'] == 'email') {
        if (filter_var($_GET['value'], FILTER_VALIDATE_EMAIL)) {
            if (verifier_doublons('email', $_GET['value'])) {
                $res = array("res" => false);
                exit(json_encode($res));
            } else {
                $res = array("res" => true);
                exit(json_encode($res));
            }
        }
    }
}


function validate($regex, $value)
{
    $bool = preg_match($regex, $value);
    $res = array("res" => boolval($bool));
    exit(json_encode($res));
}


if (!isset($_GET)) {
    $res = array("error" => "nodata");
    exit(json_encode($res));
} else {
    switch ($_GET['queryType']) {
        case 'checkdoublons':
            checkdoublons();
        case 'validate':
            validate($regexValidation[$_GET['field']], $_GET['value']);
    }
}


    