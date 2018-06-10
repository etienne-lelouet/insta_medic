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
    exit('{"error":"temperature non renseigné"}');
}

if (isset($_REQUEST['tension'])) {
    if (!preg_match('/^[\d]*\/[\d]*$$/', $_REQUEST['tension'])) {

        exit('{"erreur":"tension invalide"}"');
    }
    $data['tension'] = $_REQUEST['tension'];
} else {
    exit('{"error":"tension non renseigné"}');
}

if (isset($_REQUEST['poids'])) {
    if (!preg_match('/^[0-9]*\.?[0-9]+$/', $_REQUEST['poids'])) {

        exit('{"erreur":"poids Invalide"}"');
    }
    $data['poids'] = $_REQUEST['poids'];
} else {
    exit('{"error":"idHospi non renseigné"}');
}

if (isset($_REQUEST['idHospi'])) {
    if (!preg_match('/^[0-9]*$/', $_REQUEST['idHospi'])) {

        exit('{"erreur":"idHospi Invalide"}"');
    }
    $data['idHospi'] = $_REQUEST['idHospi'];
} else {
    exit('{"error":"idHospi non renseigné"}');
}

if (isset($_REQUEST['idInfirmier'])) {
    if (!preg_match('/^[0-9]*$/', $_REQUEST['idInfirmier'])) {

        exit('{"erreur":"idInfirmier Invalide"}"');
    }
    $data['idInfirmier'] = $_REQUEST['idInfirmier'];
} else {
    exit('{"error":"idInfirmier non renseigné"}');
}

if (isset($_REQUEST['autres'])) {
    if (empty($_REQUEST['autres'])) {

        $autres = "";
    }
    $data['autres'] = $_REQUEST['autres'];
}

if (isset($_REQUEST['action'])) {

    if ($_REQUEST['action'] == 'insert' || $_REQUEST['action'] == 'update') {
        $action = $_REQUEST['action'];

        if ($_REQUEST['action'] == 'insert') {
            if (isset($_REQUEST['idPatient'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['idPatient'])) {

                    exit('{"erreur":"action Invalide"}"');
                }
                $data['idPatient'] = $_REQUEST['idPatient'];
            } else {
                exit('{"error":"idDones non renseigné"}');
            }

        } else if ($_REQUEST['action'] == 'update') {
            if (isset($_REQUEST['idDones'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['idDones'])) {

                    exit('{"erreur":"idDones Invalide"}"');
                }
                $data['idDones'] = $_REQUEST['idDones'];
            } else {
                exit('{"error":"idDones non renseigné"}');
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