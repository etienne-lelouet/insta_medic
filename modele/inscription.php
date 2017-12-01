<?php
header('Content-type: text/html; charset=UTF-8');
include 'config.php';

function verifier_doublons($fieldname, $fieldvalue)
{
    $conn=connexion();
    $query = 'SELECT count(*) as count FROM Personne WHERE '.$fieldname.' = "'.$fieldvalue.'"';
    $res=mysqli_query($conn, $query);
    $rows=mysqli_fetch_assoc($res);
    if ($rows['count']>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function register_user($data)
{
    $conn=connexion();
    $query = 'INSERT INTO Personne (etat_civil, nom, prenom, date_naissance, adresse, adressecomp, code_postal, ville, telephone, login, email, password) VALUES ("'.$data['etat_civil'].'", "'.$data['nom'].'", "'.$data['prenom'].'", "'.$data['date_naissance'].'", "'.$data['adresse'].'", "'.$data['adressecomp'].'", "'.$data['code_postal'].'", "'.$data['ville'].'", "'.$data['telephone'].'", "'.$data['login'].'", "'.$data['email'].'", "'.$data['password'].'")';
    mysqli_query($conn,$query);
    $id= mysqli_insert_id($conn);
    return $id;
}


?>