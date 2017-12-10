<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8" />
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
						<table>
							<tr>
								<th>Horaire</th>
								<th>Disponibilité</th>
							</tr>
							<?php
				  foreach($planning as $key => $val)
				  {
					echo '<tr class="cliquable">';
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
						echo '<th class="rdv">'.$val['libelleRdv'].'</th>';
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
	<?php require 'footer.php'; ?>
</body>

</html>
