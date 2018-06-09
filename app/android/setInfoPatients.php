<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

require_once '../config.php';


if (isset($_REQUEST['temperature'])) {
    if (!preg_match('/^[0-9]*\.?[0-9]+$/', $_REQUEST['temperature'])) {

        exit('{"erreur":"temperature Invalide"}"');
    }
    $data['temperature'] = $_REQUEST['temperature'];
} else {
    exit('{"error":"id non renseigné"}');
}

if (isset($_REQUEST['tension'])) {
    if (!preg_match('/^[\d]*\/[\d]*$$/', $_REQUEST['tension'])) {

        exit('{"erreur":"tension invalide"}"');
    }
    $data['tension'] = $_REQUEST['tension'];
} else {
    exit('{"error":"id non renseigné"}');
}

if (isset($_REQUEST['poids'])) {
    if (!preg_match('/^[0-9]*\.?[0-9]+$/', $_REQUEST['poids'])) {

        exit('{"erreur":"poids Invalide"}"');
    }
    $data['poids'] = $_REQUEST['poids'];
} else {
    exit('{"error":"id non renseigné"}');
}

if (isset($_REQUEST['autres'])) {
    if (empty($_REQUEST['idService'])) {

        $autres = "";
    }
    $data['autres'] = $_REQUEST['autres'];
}

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'insert' || $_REQUEST['action'] == 'update') {
        $action = $_REQUEST['action'];

        if ($_REQUEST['action'] == 'insert') {
            if (isset($_REQUEST['poids'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['poids'])) {

                    exit('{"erreur":"poids Invalide"}"');
                }
                $data['poids'] = $_REQUEST['poids'];
            } else {
                exit('{"error":"id non renseigné"}');
            }
        } else if ($_REQUEST['action'] == 'update') {
            if (isset($_REQUEST['poids'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['poids'])) {

                    exit('{"erreur":"poids Invalide"}"');
                }
                $data['poids'] = $_REQUEST['poids'];
            } else {
                exit('{"error":"id non renseigné"}');
            }
        }
    }
} else {
    exit('{"error":"action non renseignée"}');
}

$result = Modele::majData($data, $action);

if (count($result) == 0) {
    exit('{"result":"pas de patients hospitalisés"}"');
} else {
    print(json_encode($result));
}


?>