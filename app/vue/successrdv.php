<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Etat du rendez-vous</title>
</head>

<body>
	<?php require 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 cellMain">
				<?php require 'barre.php' ?>
				<div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
					<div class="container-fluid fontGris confirmationRDV">
						<h6>Etat du rendez-vous</h6>
						<form action="" method="POST">
							<p> Le rendez-vous du :
								<?php echo date('d-m-Y', $_POST['startRDV']).' à '.date('H:i', $_POST['startRDV']); ?>
							</p>
							<p>avec le praticien
								<?php echo $res['etat_civil'].' '.$res['nom'].' '.$res['prenom']; ?> a bien été confirmé.</p>
							<input type="hidden" name="startRDV" value="<?php echo $_POST['startRDV']; ?> ">
							<input type="hidden" name="idMedecin" value="<?php echo $_POST['idMedecin']; ?> ">
							<input type="hidden" name="formvalid">
							<input type="submit" value="Retour à l'accueil" class="btn btn-primary" href="index.php">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>