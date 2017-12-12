<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<style>
	.passe
	{
		background-color : #ffffff;
		padding-top : 10px;
		padding-left: 10px;
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
						<div class="avenir">
							<u><h4>Vos rendez vous à venir :</h4></u>
							<?php
							foreach ($resfutur as $val) //on affiche tous els futurs RDV ici
							{
									if (!empty($val['libelleRDV'])) //si le rendez vous a un libelle on affiche un texte different
									{
										echo '<p>Rendez vous le '.date('d/m/y', $val['startRDV']).'à '.date('H:i', $val['startRDV']).' avec '.$val['nom'].' '.$val['prenom'].' du service de '.$val['libelle'].' description : '.$val['libelleRDV'].'</p>';
									
									}
									else
									{
										echo '<p>Rendez vous le '.date('d/m/y', $val['startRDV']).'à '.date('H:i', $val['startRDV']).' avec '.$val['nom'].' '.$val['prenom'].' du service de '.$val['libelle'].'</p>';
									}
							}
							?>
						</div>
					</div>
					<div class="container-fluid fontGris tableauHoraire" style="margin-top:10px;">
							<u><h4>Vos rendez vous passés :</h4></u>
							<?php
							foreach ($respasse as $val)
							{
								if (!empty($val['libelleRDV'])) //si le rendez vous a un libelle on affiche un texte different
								{
										echo '<p>Rendez vous le '.date('d/m/y', $val['startRDV']).'à '.date('H:i', $val['startRDV']).' avec '.$val['nom'].' '.$val['prenom'].' du service de '.$val['libelle'].' description : '.$val['libelleRDV'].'</p>';
									
								}
								else
								{
										echo '<p>Rendez vous le '.date('d/m/y', $val['startRDV']).'à '.date('H:i', $val['startRDV']).' avec '.$val['nom'].' '.$val['prenom'].' du service de '.$val['libelle'].'</p>';
								}
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
