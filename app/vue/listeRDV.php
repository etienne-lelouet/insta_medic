<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<style>
	tr:hover {
			background-color: #E4E4A1;
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
						<?php if ($_SESSION['status'] == 1) : ?>
						<div class="avenir">
						<h6>Vos prochains RDVs:</h6>
						<table>
							<tr>
								<th>Date</th>
								<th>Heure</th>
								<th>Praticien</th>
								<th>Service</th>
							</tr>
							<?php
								foreach ($resfutur as $val) {
									echo '<tr>';
									echo '<th class="tabrdv">' . date('d/m/y', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . date('H:i', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . $val['nom'] . ' ' . $val['prenom'] . '</th>';
									echo '<th class="tabrdv">' . $val['libelle'] . '</th>';
									echo '</tr>';
								}
							?>
							</table>
						</div>
					</div>
					<div class="container-fluid fontGris tableauHoraire" >
						<h6>Vos anciens RDVs:</h6>
						<table>
							<tr>
								<th>Date</th>
								<th>Heure</th>
								<th>Praticien</th>
								<th>Service</th>
							</tr>
							<?php
								foreach ($respasse as $val) {
									echo '<tr>';
									echo '<th class="tabrdv">' . date('d/m/y', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . date('H:i', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . $val['nom'] . ' ' . $val['prenom'] . '</th>';
									echo '<th class="tabrdv">' . $val['libelle'] . '</th>';
									echo '</tr>';
								}
							?>
						</table>
					</div>
					<?php endif; ?>
					<?php if ($_SESSION['status'] == 2) : ?>
					<div class="avenir">
						<h6>Vos prochains RDVs:</h6>
						<table>
							<tr>
								<th>Date</th>
								<th>Heure</th>
								<th>Patient</th>
							</tr>
							<?php
								foreach ($resfutur as $val) {
									echo '<tr>';
									echo '<th class="tabrdv">' . date('d/m/y', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . date('H:i', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . $val['nom'] . ' ' . $val['prenom'] . '</th>';
									echo '</tr>';
								}
							?>
							</table>
						</div>
					</div>
					<div class="container-fluid fontGris tableauHoraire" >
						<h6>Vos anciens RDVs:</h6>
						<table>
							<tr>
								<th>Date</th>
								<th>Heure</th>
								<th>Praticien</th>
							</tr>
							<?php
								foreach ($respasse as $val) {
									echo '<tr>';
									echo '<th class="tabrdv">' . date('d/m/y', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . date('H:i', $val['startRDV']) . '</th>';
									echo '<th class="tabrdv">' . $val['nom'] . ' ' . $val['prenom'] . '</th>';
									echo '</tr>';
								}
							?>
						</table>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>
