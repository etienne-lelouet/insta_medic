<?php
header('Content-type: text/html; charset=UTF-8');
function connexion ()
{
    $dbhost='163.172.49.216';
    $dbuser='wef';
    $dbpass='ppe2018wef';
    $dbname='Clinique';
    
    $conn= null;
    try 
    {
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    catch (Exception $exp)
    {
        echo "erreur de connexion au serveur";
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
?>