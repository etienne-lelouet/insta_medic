<?php

require('modele/rdv.php');

if (!isset($_SESSION['id'])
{
	header('location: index.php');
}

	
