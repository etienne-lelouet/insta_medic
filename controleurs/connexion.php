<?php

require '../modele/connexion.php';

if (isset($_POST['formvalid'])) {

    $login=$_POST['login'];


    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $login)) {

        header('Location: index.php?error=badlogin');
        exit();
    }

    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/', $password)) {
        
        header('Location: index.php?error=badlogin');
        exit();
    }

    $password=md5($password);
    $rows=validate($login, $password);
    
    if ($rows['nb']==1) {
        session_start();
        $_SESSION['id']=$rows['idPersonne'];
        header('location: ../index.php');
    } else {
        header('location: ../index.php?error=badlogin');    
    }
}

include 'vue/connexion.php';

?>