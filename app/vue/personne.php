<?php var_dump($res); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>
        <?php echo $res['prenom'].' '.$res['nom']; ?>
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
                                <?php echo '<img src="files/'.$res['idPersonne'].'/'.$res['urlphoto'].'" />'; ?>
                                <p><?php echo $res['nom']; ?>
                                <?php echo $res['prenom']; ?></p>
                                <p><?php echo $res['adresse']; ?></p>
                                <p><?php echo $res['adressecomp']; ?></p>
                                <p><?php echo $res['Ville']; ?>
                                <?php echo $res['code_postal']; ?></p>

                                <p><?php echo $res['date_naissance']; ?></p>
                                <p><?php echo $res['telephone']; ?></p>
                                <p><?php echo $res['email']; ?></p>
                            </div>
                            <div class="informationAutre">
                            <h6>Les autres informations :</h6>
                                <?php if($res['status'] == 1) : ?>

                                <!-- si on a affaire a un patient-->
                                <p><?php echo $res['Taille']; ?></p>
                                <p><?php echo $res['Poids']; ?></p>
                                <p><?php echo $res['GroupeSanguin']; ?></p>

                                <?php endif; ?>

                                <?php if($res['status'] == 2) : ?>

                                <!-- si on a affaire a un medecin-->
                                <p><?php echo $res['grade']; ?></p>
                                <p><?php echo $res['nomService']; ?></p>
                                <p><?php echo $res['dateEmbauche']; ?></p>

                                <?php endif; ?>

                            </div>
                            <?php
                            echo '<iframe src="files/'.$res['idPersonne'].'/documents/" ></iframe>';
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  require 'footer.php'; ?>
</body>

</html>