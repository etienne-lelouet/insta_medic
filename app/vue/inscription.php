<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>Inscription</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="cellGlobal">
        <div class="container-fluid">
            <div class="row" style="margin: 30px 0 0 0;">
                <h2>JE CREE MON COMPTE</h2>
            </div>
            <div class="trait traitConnection">
                <hr>
            </div>
            <div class="row">
                <div class="cellInscription">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <div class="cellFormulaire">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row infoPerso">
                                            <div class="texteTitre textePerso">
                                                <h5>Informations Personnelles</h5>
                                            </div>
                                            <div class="form-group etatCivile formulaireContent ">
                                                <div class="Etat">Etat civil :</div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="etat_civil" id="inlineRadio1" value="M."> M.
                                                    </label>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="etat_civil" id="inlineRadio2" value="Mme."> Mme.
                                                    </label>
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="etat_civil" id="inlineRadio3" value="Autre" checked="checked"> Autre
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group nom formulaireContent">
                                                <label for="nom">Nom :</label>
                                                <input id="nom" name="nom" class="form-control formulaire">
                                            </div>

                                            <div class="form-group prenom formulaireContent">
                                                <label for="prenom">Prénom :</label>
                                                <input id="prenom" name="prenom" class="form-control formulaire">
                                            </div>

                                            <div class="form-group dateDeNaissance formulaireContent">
                                                <label> Date de naissance :</label>
                                                <input type="text" id="date_naissance" name="date_naissance" class="form-control formulaire" placeholder="JJ/MM/AAAA">
                                            </div>

                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 1 :</label>
                                                <input id="adresse" name="adresse" class="form-control formulaire">
                                            </div>

                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 2 :</label>
                                                <input id="adressecomp" name="adressecomp" class="form-control formulaire">
                                            </div>

                                            <div class="form-group codePostale formulaireContent">
                                                <label>Code postal :</label>
                                                <input id="code_postal" name="code_postal" class="form-control formulaire">
                                            </div>

                                            <div class="form-group ville formulaireContent">
                                                <label> Ville :</label>
                                                <input id="ville" name="ville" class="form-control formulaire">

                                            </div>

                                            <div class="form-group telephone formulaireContent">
                                                <label>Téléphone :</label>
                                                <input id="telephone" name="telephone" class="form-control formulaire">
                                            </div>
                                        </div>

                                        <div class="form-row infoCompte">

                                            <div class="texteTitre texteCompte">
                                                <h5>Informations du Compte</h5>
                                            </div>

                                            <div class="form-group mail formulaireContent">
                                                <label> Login :</label>
                                                <input id="login" name="login" class="form-control formulaire">
                                            </div>

                                            <div class="form-group mail formulaireContent">
                                                <label> Mail :</label>
                                                <input id="email" name="email" class="form-control formulaire " type="email">
                                            </div>

                                            <div class="form-group motDePasse formulaireContent">
                                                <label>Mot de passe :</label>
                                                <input id="password" type="password" name="password" class="form-control formulaire" type="password">
                                            </div>

                                            <div class="form-group motDePasse formulaireContent">
                                                <label> Confirmation de Mot de passe :</label>
                                                <input id="pass2" type="password" name="pass2" class="form-control formulaire">
                                            </div>
                                        </div>

                                        <input type="hidden" name="MAX_FILE_SIZE" value="3500000" />
                                        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                        Ajoutez une photo de profil :
                                        <input id="image" name="image" type="file" style="margin: 30px 0 0 0;">
                                        <input type="hidden" name="formvalid">
                                        <!-- 1er fois sur la page, si tu as déjà valider une fois c'est ok , sinon non -->
                                        <div class="row btnSubmit">
                                            <div class="btnInscription btn btn-lg">
                                                <input class="btn btn-primary" id="submitButton" type="submit" value="JE CREE MON COMPTE" style="cursor:pointer;">
                                            </div>
                                            <div id="error"></div>
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
    <?php require 'footer.php'; ?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="vue/inscription.js"></script>
<script type="text/javascript">

    var arrayError = <?php echo json_encode($errorlist); ?>;

    if (arrayError !=null){

        var keysError = Object.keys(arrayError);
        console.log(arrayError);

        keysError.forEach(function (value) {
            $("#" + value).after("<span id=\"error" + value + "\">" + arrayError[value] + "</span>");
        });
    }

    var arrayData = <?php echo json_encode($data); ?>;

    if(arrayData !=null){

        var keysData = Object.keys(arrayData);

        keysData.forEach(function (value) {
            $("#" + value).val(arrayData[value]);
        });
    }

</script>
</html>