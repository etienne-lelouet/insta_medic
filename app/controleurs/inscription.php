<?php

if (isset($_SESSION['id'])) //si personne est connecté 
{
    header('location: index.php');
} else {
    require 'modele/inscription.php';
    if (isset($_POST['formvalid'])) {

        $data = array();
        $errorlist = array();
        $global = true; //pas erreur
        $compteur=0;
        $postKeys = array_keys($regexValidation);
        foreach ($_POST as $key => $value) {
            if (in_array($key, $postKeys)) {
                $compteur++;
                if (empty($value) && in_array($key, $notMandatory)) {
                    $data[$key] = "";
                    continue;
                } else if (empty($value) || !preg_match($regexValidation[$key], $value)) {
                    $errorlist[$key] = 'Veuillez entrer une valeur valide';
                } else {
                    $data[$key] = $value;
                }
            } else {
                continue;
            }
        }

        if ($compteur != $fieldNumber) {
            header('location: index.php');
        }

        if ($data['password'] != $data['pass2'] && !isset($errorlist['password'])) {
            $errorlist['password'] = 'Les mots de passe ne sont pas identiques, veuillez réessayer';
        } else {
            unset($data['pass2']);
        }

        if (verifier_doublons('login', $data['login'])) {
            $errorlist['login'] = 'Identifiant déjà uilisé, veuillez réessayer';
        }

        if (verifier_doublons('email', $data['email'])) {
            $errorlist['email'] = 'Email déjà uilisé, veuillez réessayer';
        }

        if (empty($errorlist)) {	
            //On rentre dans l'upload d'image
            $maxsize = 3500000;

            if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                $errorlist['image'] = 'Pas d\'image mise en ligne, veuillez réessayer';
                require 'vue/inscription.php';
                exit();
            }

            if ($_FILES['image']['error'] > 0) {
                $errorlist['image'] = 'Erreur lors du telechargement, veuillez réessayer';
                require 'vue/inscription.php';
                exit();
            }

            if ($_FILES['image']['size'] > $maxsize) {
                $errorlist['image'] = 'Le fichier est trop gros, la taille maximale est de 3mo';
                require 'vue/inscription.php';
                exit();
            }

            $extensions_valides = array('jpg', 'jpeg', 'png');
            $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

            if (!in_array($extension_upload, $extensions_valides)) {
                $errorlist['image'] = 'Format de fichier incorrect. Les formats autorisés sont jpg, jpeg et png';
                require 'vue/inscription.php';
                exit();
            }

            // $dimensions = getimagesize($_FILES['image']['tmp_name']);

            // if ($dimensions[0] > $dimensions[1]) {
            //     $errorlist['image'] = 'Les dimensions de l\'image sont incorrectes : il faut qu\'elle soit en mode portrait';
            //     require 'vue/inscription.php';
            //     exit();
            // }

            $data['password'] = md5($data['password']);
            $now = time();

            $fullname = $now * rand(1, 9);
            $urlphoto = $fullname . '.' . $extension_upload;
	    $data['urlphoto'] = $urlphoto;
	    
	    $id = register_user($data);
	    
	    if ($id > 0) {
                $dirname = 'files/' . $id;

                if (!mkdir($dirname, 750)) {
                    $errorlist['error'] = 'Une erreur s\'est produite lors de la creation de votre dossier perso, veuillez réessayer plus tard';
                    require 'vue/inscription.php';
                    exit();
                }
                if (!mkdir($dirname . '/documents', 0750)) {
                    $errorlist['error'] = 'Une erreur s\'est produite pour la creation de votre espace perso, veuillez réessayer plus tard';
                    require 'vue/inscription.php';
                    exit();
                }
                if (!copy('files/index/index.php', $dirname . '/documents/index.php')) {
                    $errorlist['error'] = 'Impossible de copier le fichier de visualisation';
                    require 'vue/inscription.php';
                    exit();

                }
                $fullname = $dirname . '/' . $urlphoto;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $fullname)) {
                    $errorlist['error'] = 'Une erreur s\'est produite lors de l\'upload de votre photo, veuillez réessayer plus tard';
                    require 'vue/inscription.php';
                    exit();

                }
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['level'] = 1;
                header('location: index.php');
            } else {
                $errorlist['error'] = 'Une erreur s\'est produite, lors de la création de votre compte, veuillez réessayer plus tard';
                require 'vue/inscription.php';
                exit();
            }
        }
    }
}
require 'vue/inscription.php';

?>
