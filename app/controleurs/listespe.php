<?php
session_start();
require 'modele/listespe.php';

$res=listespe();

require 'vue/listespecialites.php';

?>
