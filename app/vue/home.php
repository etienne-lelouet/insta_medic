<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">

    <meta charset="utf-8" />
    <title>Home</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <?php require 'barre.php'; ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris">
                        <div class="row all">
                            <div class="col-lg-6">
                                <p>
                                    <a href="index.php?page=listespe" />PRENDRE RENDEZ VOUS</a>
                                </p>
                                <p>
                                    <a href="index.php?page=listeRDV">VOIR MES RENDEZ VOUS</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>