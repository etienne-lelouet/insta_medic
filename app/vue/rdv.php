<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/csscustom.css" />
	<meta charset="utf-8" />
	<title>SELECTIONNEZ LE CRENEAU HORAIRE</title>
</head>

<body>
	<?php require 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 cellMain">
				<?php require 'barre.php' ?>
				<div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
					<div class="container-fluid fontGris">
						<h6>Choissisz le créneau</h6>
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
				echo date('H:i', $key);
				echo '</td>';
				if (!is_array($val))
				{
					echo '<th class="cliquable"><a href="index.php?page=reserver&start_time='.$key.'">CRENEAU DISPONIBLE</a></th>';
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