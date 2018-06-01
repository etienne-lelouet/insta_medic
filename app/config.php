<?php
date_default_timezone_set('Europe/Paris');

header('Content-type: text/html; charset=UTF-8'); //connection à la base de donnée
function connexion ()
{
    $dbhost='localhost';
    $dbuser='wef';
    $dbpass='ppe2018wef';
    $dbname='clinique';
    
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

$regexValidation = array 
(
    "etat_civil" => '/^.*$/',
    "nom" => '/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u',
    "prenom" => '/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u',
    "date_naissance" => '/^(([0-2][0-9]|3[0-1])(\/)(0[0-9]|1[0-2])(\/)[0-9]{4})$/',
    "adresse" => '/^([0-9]+?\s[\p{L}\p{Mn}\p{Pd}\'\s]+?)$/u',
    "adressecomp" => '/^([\p{L}\p{Mn}\d]+?[\p{L}\p{Mn}\p{Pd}\'\s\d]+?)$/u',
    "code_postal" => '/^([\d]{4,8})$/',
    "ville" => '/^([\p{L}\p{Mn}]+([ -]|[\p{L}\p{Mn}])[\p{L}\p{Mn}])+$/u',
    "telephone" => '/^(0[\d]{9})$/',
    "login" => '/^[a-zA-Z]\w{3,14}$/',
    "password" => '/^([\d\p{L}$&*@#%!\-\s]+)$/',
    "pass2" => '/^([\d\p{L}$&*@#%!\-\s]+)$/',
    "email" => '/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/'
);

$notMandatory = array
(
    "adressecomp"
);

$fieldNumber = 13;

if(isset($_GET['regexQuery']))
{
    exit(json_encode($regexValidation));
}
?>
