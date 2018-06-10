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
    exit('{"erreur":"temperature non renseigné"}');
}

if (isset($_REQUEST['tension'])) {
    if (!preg_match('/^[\d]*\/[\d]*$$/', $_REQUEST['tension'])) {

        exit('{"erreur":"tension invalide"}"');
    }
    $data['tension'] = $_REQUEST['tension'];
} else {
    exit('{"erreur":"tension non renseigné"}');
}

if (isset($_REQUEST['poids'])) {
    if (!preg_match('/^[0-9]*\.?[0-9]+$/', $_REQUEST['poids'])) {

        exit('{"erreur":"poids Invalide"}"');
    }
    $data['poids'] = $_REQUEST['poids'];
} else {
    exit('{"erreur":"idHospi non renseigné"}');
}

if (isset($_REQUEST['idInfirmier'])) {
    if (!preg_match('/^[0-9]*$/', $_REQUEST['idInfirmier'])) {

        exit('{"erreur":"idInfirmier Invalide"}"');
    }
    $data['idInfirmier'] = $_REQUEST['idInfirmier'];
} else {
    exit('{"erreur":"idInfirmier non renseigné"}');
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

                    exit('[{"erreur":"action Invalide"}]');
                }
                $data['idPatient'] = $_REQUEST['idPatient'];
            } else {
                exit('[{"erreur":"idDones non renseigné"}]');
            }

            if (isset($_REQUEST['idHospi'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['idHospi'])) {
            
                    exit('[{"erreur":"idHospi Invalide"}]');
                }
                $data['idHospi'] = $_REQUEST['idHospi'];
            } else {
                exit('[{"erreur":"idHospi non renseigné"}]');
            }

        } else if ($_REQUEST['action'] == 'update') {
            if (isset($_REQUEST['idDonnees'])) {
                if (!preg_match('/^[0-9]*$/', $_REQUEST['idDonnees'])) {

                    exit('[{"erreur":"idDonnees Invalide"}]');
                }
                $data['idDonnees'] = $_REQUEST['idDonnees'];
            } else {
                exit('[{"erreur":"idDonnees non renseigné"}]');
            }
        }
    }
} else {
    exit('{"erreur":"action non renseignée"}');
}

$result = '[{"result":"'.Modele::majData($data, $action).'"}]';

print(json_encode($result));



?>
