<?php

if (!isset($_GET['start_time'])
{
	header('location: index.php?page=specialite');
}

require 'modele/reserver.php';










require 'vue/reserver.php';

