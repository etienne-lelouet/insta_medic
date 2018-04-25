<?php


function validate($login, $password)
{  
    $conn = connexion();
    
    $query=$conn->prepare('SELECT count(*) AS nb, idPersonne FROM Personne WHERE login = :login AND password = :password');

    $query->bindParam(':login', $login);
    $query->bindParam(':password', $password);

    $query -> execute();

    $res = $query->fetch(PDO::FETCH_ASSOC);

    if (is_null($res)) {
        return false;
    } else {
        return $res;
    }
}

//var_dump(validate('etienne_lelouet', '05a671c66aefea124cc08b76ea6d30bb'));
?>
