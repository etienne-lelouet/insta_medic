<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">

    <meta charset="utf-8" />
    <title>Home</title>
</head>

<body>
    <header class="cellHeader">
        <div class="container-fluid">
            <div class="row floflo">
                <div class="col-xs-12 col-lg-12">
                    <div class="cell-logo">
                        <a href="index.html">
                            <img src="img/logo.png" alt="logo">
                        </a>
                        <h1>Clinique</h1>
                        <h1>Geoffroy Saint-Hilaire </h1>
                    </div>
                    <div class="cellEspacePerso">
                        <h3> MON ESPACE PERSONNEL </h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <div class="col-sm-3 col-md-2 col-lg-2 partieGauche menu">
                    <div class="container-fluid fontGris">
                        <div class="row">
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <div class="mesInfos">
                                    <h5>Mes Informations</h5>
				    <img src=<?php echo "files/".$_SESSION['id']."/".$res_user['urlphoto']; ?> alt="photo">
				    <h4><?php echo $res_user['nom']; ?></h4>
				    <h4><?php echo $res_user['prenom']; ?></h4>
                                </div>
                                <a class="flex-sm-fill text-sm-center nav-link" href="#">Active</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="#">Link</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="#">Link</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="index.php?page=logout">Se deconnecter</a>
                            </nav>

                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris">
                        <div class="row all">
                        <div class="col-lg-6">
                            <h4>Subheading</h4>
                            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

                            <h4>Subheading</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit
                                amet fermentum.</p>

                            <h4>Subheading</h4>
                            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        </div>

                        <div class="col-lg-6">
                            <h4>Subheading</h4>
                            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

                            <h4>Subheading</h4>
                            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit
                                amet fermentum.</p>

                            <h4>Subheading</h4>
                            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="piedDePage">
            <ul>
                <li>Informations légales</li>
                <li>Propriété intellectuelle</li>
                <li>Conditions d'utilisateurs</li>
                <li>Aides</li>
            </ul>
	</div>
    </footer>
</body>

</html>