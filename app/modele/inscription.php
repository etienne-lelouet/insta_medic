<?php
header('Content-type: text/html; charset=UTF-8');
include 'config.php';

function verifier_doublons($fieldname, $fieldvalue)
{   
    $conn = connexion();
    
    $query=$conn->prepare('SELECT count(*) AS nb, idPersonne FROM Personne WHERE '.$fieldname.' = :fieldvalue');

    $query->bindParam(':fieldvalue', $fieldvalue);

    $query -> execute();

    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res['nb']==0) 
    {
        return false;
    } else 
    {
        return true;
    }
}

function register_user($data)
{
    $conn=connexion();
    $insertdata=array();
    foreach ($data as $key => &$val)
    {
	    $newkey=':'.$key;
	    $insertdata[$newkey]=$val;
    }

    $query = 'INSERT INTO Personne (etat_civil, nom, prenom, date_naissance, adresse, adressecomp, code_postal, ville, telephone, login, email, password, urlphoto) 
    VALUES (:etat_civil, :nom, :prenom, :date_naissance, :adresse, :adressecomp, :code_postal, :ville, :telephone, :login, :email, :password, :urlphoto)';
    
    $query = $conn->prepare($query);
    
    if ($query -> execute($insertdata))
    {
	    return ($conn -> lastInsertId());
    }
    else
    {
	    return false;
    }
}


?>
