<?php


function getinfo($id)
{
    $conn = connexion();

    $query = 'SELECT * FROM personne WHERE idPersonne = :id';
    $query = $conn->prepare($query);
    $query->bindparam(':id', $id);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res['status'] == 1) {
        $query2 = 'SELECT * FROM DonneesBiologiques WHERE idPersonne = :id';
        $query2 = $conn->prepare($query2);
        $query2->bindparam(':id', $id);
        $query2->execute();
        $res2 = $query2->fetch(PDO::FETCH_ASSOC);
        $res = array_merge($res, $res2);
    } else if ($res['status'] == 2) {
        $query2 = 'SELECT t1.*, t2.nomService FROM Medecin t1, Service t2 WHERE idPersonne = :id AND t1.idService = t2.idService';
        $query2 = $conn->prepare($query2);
        $query2->bindparam(':id', $id);
        $query2->execute();
        $res2 = $query2->fetch(PDO::FETCH_ASSOC);
        $res = array_merge($res, $res2);
    }

    return $res;
}

?>
