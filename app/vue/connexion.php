<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">
    <meta charset="utf-8" />
    <title>Login</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="cellGlobal">
        <div class="container-fluid">
            <div class="row">
                <div class="cell cellInscription col-xs-6 col-lg-6 ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="compte">
                                <h2>JE VEUX UN COMPTE</h2>
                                <div class="trait traitInscription">
                                    <hr>

                                    <h4>L’espace personnel qui me rend bien des services.</h4>
                                </div>
                                <div class="contenu">
                                    <p>En créant mon compte ameli, je peux : </p>
                                    <table>
                                        <tr>
                                            <td>- Télécharger mes ordonnances</td>
                                            <td>- Obtenir un rendez-vous</td>
                                            <td>- Contacter ma clinique par email</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="btnInscription btn">
                                    <a href="index.php?page=inscription" class="btn btn-primary" role="button">JE CREE MON COMPTE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell cellConnection col-xs-6 col-lg-6 ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="compte">
                                <h2>J'ACCÈDE A MON COMPTE</h2>
                                <div class="trait traitConnection">
                                    <hr>
                                </div>
                                <div class="champGlobal">
                                    <form method="post" action="">
                                        <div class="champIdentifiant champInput form-group">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <input type="text" class="form-control" placeholder="Mon identifiant" name="login">
                                        </div>
                                        <div class="champMdp champInput form-group">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            <input class="form-control" placeholder="Mon mot de passe" type="password" name="password">
                                        </div>
                                        <div class="btnIConnection btn">
                                            <a>
                                                <input type="submit" value="CONNEXION" class="btn btn-primary" style="cursor:pointer;" />
                                            </a>
                                        </div>
                                        <input type="hidden" name="formvalid">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>
