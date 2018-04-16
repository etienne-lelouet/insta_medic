<?php

require_once 'config.php';

function getinfo($id)
{  
    $conn = connexion();
    
    $query='SELECT * FROM Personne WHERE idPersonne = :id';

    $query = $conn -> prepare($query);

    $query -> bindparam(':id', $id);   

    $query -> execute();

    $res = $query -> fetch(PDO::FETCH_ASSOC);

    return $res;
}
  
?>
