<?php

require 'modele/listepa.php';

$res=getListepa($_SESSION['id']);

require 'vue/listepa.php';

?>
