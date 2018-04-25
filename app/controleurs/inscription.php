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

        if (!empty($_POST['etat_civil'])) {
            $data['etat_civil'] = $_POST['etat_civil'];
        } else {
            $errorlist[] = "etat_civil";
        }

        if (!empty($_POST['nom']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u', $_POST['nom'])) {
            $data['nom'] = $_POST['nom'];
        } else {
            $errorlist[] = "nom";

        }

        if (!empty($_POST['prenom']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u', $_POST['prenom'])) {
            $data['prenom'] = $_POST['prenom'];
        } else {
            $errorlist[] = "prenom";
        }

        if (!empty($_POST['date_naissance']) && preg_match('/^(([0-2][0-9]|3[0-1])(\/)(0[0-9]|1[0-2])(\/)[0-9]{4})$/', $_POST['date_naissance'])) {
            $data['date_naissance'] = $_POST['date_naissance'];
        } else {
            $errorlist[] = "date_naissance";
        }

        if (!empty($_POST['adresse']) && preg_match('/^([0-9]+?\s[\p{L}\p{Mn}\p{Pd}\'\s]+?)$/u', $_POST['adresse'])) {
            $data['adresse'] = $_POST['adresse'];
        } else {
            $errorlist[] = "adresse";
        }

        if (empty($_POST['adressecomp'])) {
            $data['adressecomp'] = "";
        } else if (!preg_match('/^([\p{L}\p{Mn}\d]+?[\p{L}\p{Mn}\p{Pd}\'\s\d]+?)$/u', $_POST['adressecomp'])) {
            $errorlist[] = "adressecomp";
        } else {
            $data['adressecomp'] = $_POST['adressecomp'];
        }
        if (!empty($_POST['code_postal']) && preg_match('/^([\d]{4,8})$/', $_POST['code_postal'])) {
            $data['code_postal'] = $_POST['code_postal'];
        } else {
            $errorlist[] = "code_postal";
        }

        if (!empty($_POST['ville']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}]+?)+$/u', $_POST['ville'])) {
            $data['ville'] = $_POST['ville'];
        } else {
            $errorlist[] = "ville";
        }

        if (!empty($_POST['telephone']) && preg_match('/^(0[\d]{9})$/', $_POST['telephone'])) {
            $data['telephone'] = $_POST['telephone'];
        } else {
            $errorlist[] = "telephone";
        }

        if (!empty($_POST['login']) && preg_match('/^[a-zA-Z]\w{3,14}$/', $_POST['login'])) {
            $data['login'] = $_POST['login'];
        } else {
            $errorlist[] = "login";
        }

        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email'] = $_POST['email'];
        } else {
            $errorlist[] = "email";
        }

        if (!empty($_POST['password']) && preg_match('/^([\d\p{L}$&*@#%!\-\s]+)$/', $_POST['password'])) {
            $data['password'] = $_POST['password'];
        } else {
            $errorlist[] = "password";
        }

        if (!empty($_POST['pass2']) && preg_match('/^([\d\p{L}$&*@#%!\-\s]+)$/', $_POST['pass2'])) {
            $pass2 = $_POST['pass2'];
        } else {
            $errorlist[] = "pass2";
        }

        if ($data['password'] != $pass2) {
            $errorlist[] = "passdiff";
        }

        if (isset($data['login'])) {
            if (verifier_doublons('login', $data['login'])) {
                $errorlist[] = "login_double";
            }
        }

        if (isset($data['email'])) {
            if (verifier_doublons('email', $data['email'])) {
                $errorlist[] = "mail_double";
            }
        }

        if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
            $global = false;
            $errorimage = 'Pas d\'image mise en ligne, veuillez réessayer';
        }
	

        ////On rentre dans l'upload d'image
        $maxsize = $_POST['MAX_FILE_SIZE'];
        $path = $_SERVER['DOCUMENT_ROOT'] . '/clinique/files/';


        if ($_FILES['image']['error'] > 0) {
            $errorlist[] = 'Erreur lors du telechargement, veuillez réessayer';
            require 'vue/inscription.php';
            exit();
        }

        if ($_FILES['image']['size'] > $maxsize) {
            $errorlist[] = "Le fichier est trop gros, la taille maximale est de 3mo";
            require 'vue/inscription.php';
            exit();
        }

        $extensions_valides = array('jpg', 'jpeg', 'png');
        $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

        if (!in_array($extension_upload, $extensions_valides)) {
            $errorlist[] = 'Format de fichier incorrect. Les formats autorisés sont jpg, jpeg et png';
            require 'vue/inscription.php';
            exit();
        }

        $dimensions = getimagesize($_FILES['image']['tmp_name']);

        if (!empty($errorlist)) {
            if ($dimensions[0] > $dimensions[1]) {
                $errorlist[] = 'Les dimensions de l\'image sont incorrectes : il faut qu\'elle soit en mode portrait';
                require 'vue/inscription.php';
                exit();
            }

            $data['password'] = md5($data['password']);
            $now = time();
            $fullname = $now * rand(1, 9);
            $urlphoto = $fullname . '.' . $extension_upload;
            $data['urlphoto'] = $urlphoto;
            $id = register_user($data);
            if ($id > 0) {
                $dirname = 'files/' . $id;

                if (!mkdir($dirname, 0777)) {
                    $errorlist[] = 'erreur lors de la création de votre espace personnel';
                    require 'vue/inscription.php';
                    exit();
                }


                $fullname = $dirname . '/' . $urlphoto;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $fullname)) {
                    if (mkdir($dirname . '/espaceclient', 0777)) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['level'] = 1;
                        header('location: index.php');
                    } else {
                        $errorlist[] = 'Erreur lors de la création de votre espace personnel';
                        require 'vue/inscription.php';
                        exit();
                    }
                } else {
                    $errorlist[] = 'Erreur lors de l\'upload d\'image';
                    require 'vue/inscription.php';
                    exit();
                }
            }
        }
    }
    require 'vue/inscription.php';
}

?>
