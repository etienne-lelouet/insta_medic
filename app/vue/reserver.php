<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>CONFIRMEZ CES INFORMATIONS</title>
	<style>
		.description {
			width: 50%;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<?php require 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-lg-12 cellMain">
				<?php require 'barre.php' ?>
				<div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
					<div class="container-fluid fontGris confirmationRDV">
						<h6>CONFIRMEZ CES INFORMATIONS</h6>
						<form action="" method="POST">
							<h5> Praticien :</h5>
							<p>
								<?php echo $res['etat_civil'] . ' ' . $res['nom'] . ' ' . $res['prenom']; ?> </p>
							<p>
								<?php echo $res['email']; ?> </p>
							<p>
								<?php echo $res['telephone']; ?> </p>
							<br/>
							<p> Rendez-vous le :
								<?php echo date('d-m-Y', $_POST['startRDV']) . ' à ' . date('H:i', $_POST['startRDV']); ?>
							</p>
							<input type="textarea" class="description" name="description" placeholder="Ecrivez une courte description de votre demande">
							<input type="hidden" name="startRDV" value="<?php echo $_POST['startRDV']; ?> ">
							<input type="hidden" name="idMedecin" value="<?php echo $_POST['idMedecin']; ?> ">
							<input type="hidden" name="formvalid">
							<input type="submit" value="CONFIRMER CES INFORMATIONS" class="btn btn-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>

</html>