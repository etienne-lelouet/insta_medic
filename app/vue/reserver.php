<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
<title>CONFIRMEZ CES INFORMATIONS</title>
</head>

<body>
	<?php require 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 cellMain">
				<?php require 'barre.php' ?>
				<div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
					<form action="" method="POST">
					<p> Praticien : <?php echo $res['etat_civil'].' '.$res['nom'].' '.$res['prenom']; ?> </p>
					<p> Rendez vous le : <?php echo date('d-m-Y', $_POST['startRDV']).' à '.date('H:i', $_POST['startRDV']); ?>
					<input type="hidden" name="startRDV" value="<?php echo $_POST['startRDV']; ?> ">
					<input type="hidden" name="idMedecin" value="<?php echo $_POST['idMedecin']; ?> ">
					<input type="hidden" name="formvalid">
					<input type="submit" value="CONFIRMER CES INFORMATIONS">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>
