<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>SELECTION DU PRATICIEN</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <?php require 'barre.php' ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris">
                        <h6>Selectionnez le praticien</h6>
                        <?php
                        foreach ($res as $spe) {
                            echo '<form action="index.php?page=rdv" method="post">';
                            echo '<div class="row praticien">';
                            echo '<div class="col-sm-7 col-md-8 col-lg-8">';
                            echo $spe['nom'] . ' ' . $spe['prenom'];
                            echo '<input type="hidden" name="id" value="' . $spe['idPersonne'] . '" />';
                            echo '</div>';
                            echo '<div class="col-sm-5 col-md-4 col-lg-4">';
                            echo '<input type="submit" value="Valider" class="btn btn-primary"/>';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>