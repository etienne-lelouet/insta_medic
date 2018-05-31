<?php var_dump($res); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>
        <?php echo $res['prenom'] . ' ' . $res['nom']; ?>
    </title>
    <style>
        .information img {
  max-width: 200px;
}

iframe {
  min-width: 1020px;
  min-height: 200px;
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
                    <div class="container-fluid fontGris">
                        <div class="information">
                            <div class="informationGeneral">
                            <h6>Les informations générales :</h6>
                                <!-- ici les informations générales -->
                                <?php
                                if (file_exists('files/' . $res['idPersonne'] . '/' . $res['urlphoto'])) {
                                    echo '<img src="files/' . $res['idPersonne'] . '/' . $res['urlphoto'] . '" />';
                                } else {
                                    echo '<img src="files/default.jpg">';
                                }
                                ?>
                                <p><u>Nom</u> : <?php echo $res['nom']; ?></p>
                                <p><u>Prenom</u> : <?php echo $res['prenom']; ?></p>
                                <p><u>Né le</u> : <?php echo $res['date_naissance']; ?></p>
                                <p><u>Adresse</u> : <?php echo $res['adresse']; ?></p>
                                <?php
                                if (!empty($res['adressecomp'])) {
                                    echo '<p><u>Adresse 2</u> : ' . $res['adressecomp'] . '</p>';
                                }
                                ?>
                                <p><u>Ville</u> : <?php echo $res['Ville']; ?>
                                <?php echo $res['code_postal']; ?></p>
                                <p><u>Télephone</u> : <?php echo $res['telephone']; ?></p>
                                <p><u>Adresse mail</u> : <?php echo $res['email']; ?></p>
                            </div>
                            <div class="informationAutre">
                            <h6>Les autres informations :</h6>
                                <?php if ($res['status'] == 1) : ?>

                                <!-- si on a affaire a un patient-->
                                <p><u>Poids</u> : <?php echo $res['Taille']; ?></p>
                                <p><u>Taille</u> : <?php echo $res['Poids']; ?></p>
                                <p><u>Groupe Sanguin</u> : <?php echo $res['GroupeSanguin']; ?></p>

                                <?php endif; ?>

                                <?php if ($res['status'] == 2) : ?>

                                <!-- si on a affaire a un medecin-->
                                <p><u>Poste</u> : <?php echo $res['grade']; ?></p>
                                <p><u>Service</u> : <?php echo $res['nomService']; ?></p>
                                <p><u>En poste depuis le</u> : <?php echo $res['dateEmbauche']; ?></p>

                                <?php endif; ?>

                            </div>
                            <?php
                            echo '<iframe src="files/' . $res['idPersonne'] . '/documents/" ></iframe>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>