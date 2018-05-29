<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title><?php echo $res['prenom'].' '.$res['nom']; ?></title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <?php require 'barre.php' ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris">
                        <?php echo '<img src="files/'.$res['idPersonne'].'/'.$res['urlphoto'].'" />'; ?>
                        <?php echo $res['nom']; ?>
                        <?php echo $res['prenom']; ?>









                        <?php
                            echo '<iframe src="files/'.$res['idPersonne'].'/documents/" ></iframe>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  require 'footer.php'; ?>
</body>

</html>