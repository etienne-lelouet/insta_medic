<?php
header('Content-type: text/html; charset=UTF-8'); //connection à la base de donnée
function connexion ()
{
    $dbhost='163.172.49.216';
    $dbuser='wef';
    $dbpass='ppe2018wef';
    $dbname='Clinique';
    
    $conn= null;

    try 
    {
	    $conn = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//retour erreur supèrieur 
	    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	    $conn->setAttribute(PDO::ATTR_TIMEOUT, 5); //si session dépasse 5seconde donc arrete
        $conn->exec('SET CHARACTER SET utf8');
    }
    catch (PDOException $error) 
    {
	    echo '<b>An error occured!</b><br />' . $error->getMessage();
	    exit();
    }	    
    return $conn;
}

?>
