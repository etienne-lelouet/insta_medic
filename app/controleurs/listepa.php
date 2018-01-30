<?php
session_start();
require 'modele/listepa.php';


$res=getListepa($_SESSION['id']);

foreach ($res as $sub)
{
    var_dump($sub);
    echo '<br />';
}

require 'vue/listepa.php';

?>
