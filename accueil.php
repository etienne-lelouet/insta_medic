<?php
include 'config.php';

function getinfo($id)
{  
    $conn = connexion();
    
    $query='SELECT * FROM Personne WHERE idPersonne = '.$id;

    $res=mysqli_query($conn, $query);

    $rows=mysqli_fetch_assoc($res);

    if (is_null($res)) {
        return false;
    } else {
        return $rows;
    }
}
  
?>
