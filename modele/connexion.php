<?php
include '../config.php';

function validate($login, $password)
{  
    $conn = connexion();
    
    $login = mysqli_escape_string($conn, $login);
    $password = mysqli_escape_string($conn, $password);
    $query='SELECT count(*) AS nb, idPersonne FROM Personne WHERE login = "'.$login.'" AND password = "'.$password.'"';

    $res=mysqli_query($conn, $query);

    $rows=mysqli_fetch_assoc($res);

    if (is_null($res)) {
        return false;
    } else {
        return $rows;
    }
}
  
?>