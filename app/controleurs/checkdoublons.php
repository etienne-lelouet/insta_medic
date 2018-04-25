<?php

require 'modele/inscription.php';

if (!isset($_GET)) {
    $res = array("error" => "nodata");
    exit(json_encode($res));
}
else
{
    if(isset($_GET['login']))
    {
        if(preg_match('/^[a-zA-Z]\w{3,14}$/', $_GET['login']))
        {
            if (verifier_doublons('login', $_GET['login']))
            {
                $res = array("error" => "loginAlreadyExist");
                exit(json_encode($res));
            }
            else
            {
                $res = array("login"=>"valid");
                exit(json_encode($res));
            }
        }
    }
    else if(isset($_GET['email']))
    {
        if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
        {
            if (verifier_doublons('email', $_GET['email']))
            {
                $res = array("error" => "mailAlreadyExist");
                exit(json_encode($res));
            }
            else
            {
                $res = array("mail"=>"valid");
                exit(json_encode($res));
            }
        }
    }
}


    