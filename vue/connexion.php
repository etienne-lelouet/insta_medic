<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
    <div class="cellGlobal">
        <div class="container-fluid">
            <div class="row">
                <div class="cell cellInscription">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6 col-lg-6">
                                <h2>JE VEUX UN COMPTE</h2>
                                <div class="trait traitInscription">
                                    <hr>

                                    <h4>L’espace personnel qui me rend bien des services.</h4>
                                </div>
                                <div class="contenu">
                                    <p>En créant mon compte ameli, je peux : </p>
                                    <table>
                                        <tr>
                                            <td>- Suivre mes remboursements</td>
                                            <td>- Télécharger mes attestations</td>
                                            <td>- Obtenir un rendez-vous</td>
                                            <td>- Contacter ma clinique par email</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="btnInscription btn">
                                    <a href="index.php?page=inscription" class="btn btn-primary" role="button">Je crée mon compte</a>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell cellConnection">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6 col-lg-6">
                                <h2>J'ACCÈDE A MON COMPTE</h2>
                                <div class="trait traitConnection">
                                    <hr>

                                </div>
                                <div class="champGlobal">
                                    <form method = "post" action = "controleurs/connexion.php">
                                        <div class="champIdentifiant champInput form-group">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            <input name="login" type="text" class="form-control" placeholder="Mon identifiant">
                                        </div>

                                        <div class="champMdp champInput form-group">
                                            <input name="password" type="text" class="form-control" placeholder="Mon mot de passe">
                                        </div>

                                        <div class="mdpOublier">
                                            <a href="mdpoublie">J'ai oublié mon mot de passe</a>
                                        </div>

                                        <input type="hidden" name="formvalid">

                                        <div class="btnIConnection btn">
                                            <input type='submit'><button type="button" class="btn btn-primary">CONNEXION</button></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>