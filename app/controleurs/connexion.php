<?php

require 'modele/connexion.php';

if (isset($_POST['formvalid'])) {

    $login = $_POST['login'];


    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $login)) {

        $global = false;
        $mauvaislogin = true;
    }

    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $password)) {

        $global = false;
        $mauvaispass = true;
    }

    if (!$global) {
        $password = md5($password);
        $rows = validate($login, $password);

        if ($rows['nb'] == 1) {
            session_start();
            $_SESSION['id'] = $rows['idPersonne'];
            header('location: index.php');
        } else {
            $coupleincorrect = true;
        }
    }
}

require 'vue/connexion.php';

?>
