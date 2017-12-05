<?php
header('Content-type: text/html; charset=UTF-8');
function connexion ()
{
    $dbhost='163.172.49.216';
    $dbuser='wef';
    $dbpass='ppe2018wef';
    $dbname='Clinique';
    
    $conn= null;

    $conn = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
    $conn->exec('SET CHARACTER SET utf8');
    return $conn;
}

?>
