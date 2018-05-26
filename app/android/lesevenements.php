<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

$res = Modele :: listerevenements();
echo json_encode($res);

?>