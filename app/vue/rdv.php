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
						<h6>Choissisz le créneau</h6>
						<form action="" method="post">
						<input type="text" name="date" placeholder="dd.mm.yyyy">
						<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
						<input type="submit" value="Aller à cette date">
						</form>
						<div>
						<center>Planning de <?php echo $resmed['prenom'].' '.$resmed['nom'].' le '.date('d/m/Y', $begin_day_ts); ?></center>
						<table>
							<tr>
								<th>Horaire</th>
								<th>Disponibilité</th>
							</tr>
							<?php
				  foreach($planning as $key => $val)
				  {
					echo '<tr>';
					echo '<td>';
					echo date('H:i', $key); //date argument (format du temxp) times temps unix
					echo '</td>';
					if (!is_array($val))
					{ 
						echo '<th><form action="index.php?page=reserver" method="post">
						<input type="hidden" name="startRDV" value="'.$key.'">
						<input type="hidden" name="idMedecin" value="'.$_POST['id'].'">
						<input type="submit" value="CRENEAU DISPONIBLE" class="btn btn-primary">
						</form>
						</th>';
					}
					else
					{
						if ($val[1]=='passe')
						{
							echo '<th class="done">Ce creneau horaire est passé</th>';
						}
						else if ($val[1]=='autreRDV')
						{
							echo '<th class="rdv">Ce créneau horaire est déja réservé</th>';
						}
						else
						{
							echo '<th class="rdv">Rendez vous avec '.$val['etat_civil'].' '.$val['prenom'].' '.$val['nom'].'</th>';
						}
					}
					echo '</tr>';
				  }
				?>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>
