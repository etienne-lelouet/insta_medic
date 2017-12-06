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
	
    $query = "call insertPatient('M.', 'test', 'test', '17/11/1996', '25 test' 'testtest', '75000', 'Test', '0111111111', 'test3' 'test3@test.com', 'testtsetset', 'testestsetest.jpg')"; 
    
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
