<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<style>
	.cliquable:hover
	{
		background-color : #E4E4A1;
	}
	</style>
	<title>SELECTIONNEZ UN CRENEAU HORAIRE</title>
</head>

<body>
	<?php require 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 cellMain">
				<?php require 'barre.php' ?>
				<div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
					<div class="container-fluid fontGris tableauHoraire">
					<?php
					foreach ($res as $val)
					{
						echo '<p>Rendez vous le '.date('d/m/y', $val['startRDV']).'à '.date('H:i', $val['startRDV']).' avec '.$val['nom'].' '.$val['prenom'].' du service de '.$val['libelle'].'</p>';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>
