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
                            <h6>Les informations générales :<h6>
                                <!-- ici les informations générales -->
                                <?php echo '<img src="files/'.$res['idPersonne'].'/'.$res['urlphoto'].'" />'; ?>
                                <?php echo $res['nom']; ?>
                                <?php echo $res['prenom']; ?>
                                <?php echo $res['date_naissance']; ?>
                                <?php echo $res['adresse']; ?>
                                <?php echo $res['adressecomp']; ?>
                                <?php echo $res['date_naissance']; ?>
                                <?php echo $res['Ville']; ?>
                                <?php echo $res['code_postal']; ?>
                                <?php echo $res['telephone']; ?>
                                <?php echo $res['emeail']; ?>
                            </div>
                            <div class="informationAutre">
                            <h6>Les autres informations :<h6>
                                <?php if($res['status'] == 1) : ?>

                                <!-- si on a affaire a un patient-->
                                <?php echo $res['Taille']; ?>
                                <?php echo $res['Poids']; ?>
                                <?php echo $res['GroupeSanguin']; ?>

                                <?php endif; ?>

                                <?php if($res['status'] == 2) : ?>

                                <!-- si on a affaire a un medecin-->
                                <?php echo $res['grade']; ?>
                                <?php echo $res['nomService']; ?>
                                <?php echo $res['dateEmbauche']; ?>

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