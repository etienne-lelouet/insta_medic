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
	<title>LISTE DES RENDEZ VOUS</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <?php require 'barre.php' ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris tableauHoraire">
                    <table>
							<tr>
								<th>Nombre Rendez vous</th>
								<th>Nom/Prenom Praticien</th>
							</tr>
                            <?php
                            foreach ($listeRDV as $val) {
                                echo '<tr>';
                                echo '<th class="tabrdv">' . $val['nbRDV'] . '</th>';
                                echo '<th class="tabrdv">' . $val['nom']. ' '.$val['prenom'] . '</th>';
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