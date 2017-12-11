<?php


require 'config.php';

function verifier_doublons($fieldname, $fieldvalue)
{   
    $conn = connexion();
    
    $query=$conn->prepare('SELECT count(*) AS nb FROM Personne WHERE '.$fieldname.' = :fieldvalue');

    $query->bindParam(':fieldvalue', $fieldvalue);

    $query -> execute();

    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res['nb']==0) 
    {
        return false;
    } 
    else 
    {
        return true;//quelqu'un utilise deja donc peut pas s'inscrire
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
	
    $query = "call insertPatient(:etat_civil, :nom, :prenom, :date_naissance, :adresse, :adressecomp, :code_postal, :ville, :telephone, :login, :email, :password, :urlphoto)"; 

    $query = $conn->prepare($query);
    
    if ($query -> execute($insertdata))
    {
	    $res=$query->fetchAll();
	    return $res[0]['argid'];
    }
    else
    {
	    $query -> debugDumpParams();
	    return 0;
    }
}


?>
