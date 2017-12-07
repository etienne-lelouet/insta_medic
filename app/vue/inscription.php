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
            <div class="row">
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
                                                        <input class="form-check-input" type="radio" name="etat_civil" id="inlineRadio3" value="Autre"> Autre
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group nom formulaireContent">
                                                <label for="inputNom">Nom :</label>
                                                <input class="form-control formulaire" id="inputNom" name="nom">
                                            </div>
                                            <div class="form-group prenom formulaireContent">
                                                <label for="inputprenom">Prénom :</label>
                                                <input class="form-control formulaire" id="inputPrenom" name="prenom">
                                            </div>
                                            <div class="form-group dateDeNaissance formulaireContent">
                                                <label> Date de naissance :</label>
                                                <input class="form-control formulaire" placeholder="JJ/MM/AAAA" name="date_naissance">
                                            </div>

                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 1 :</label>
                                                <input class="form-control formulaire" name="adresse">
                                            </div>
                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 2 :</label>
                                                <input class="form-control formulaire" name="adressecomp">
                                            </div>
                                            <div class="form-group codePostale formulaireContent">
                                                <label>Code postal :</label>
                                                <input class="form-control formulaire" name="code_postal">
                                            </div>
                                            <div class="form-group ville formulaireContent">
                                                <label> Ville :</label>
                                                <input class="form-control formulaire" name="ville">
                                            </div>
                                            <div class="form-group telephone formulaireContent">
                                                <label>Téléphone :</label>
                                                <input class="form-control formulaire" name="telephone">
                                            </div>
                                        </div>
                                        <div class="form-row infoCompte">
                                            <div class="texteTitre texteCompte">
                                                <h5>Informations du Compte</h5>
                                            </div>
                                            <div class="form-group mail formulaireContent">
                                                <label> Login :</label>
                                                <input class="form-control formulaire" name="login">
                                            </div>
                                            <div class="form-group mail formulaireContent">
                                                <label> Mail :</label>
                                                <input class="form-control formulaire" type="email" name="email">
                                            </div>
                                            <div class="form-group motDePasse formulaireContent">
                                                <label>Mot de passe :</label>
                                                <input class="form-control formulaire" type="password" name="password">
                                            </div>

                                            <div class="form-group motDePasse formulaireContent">
                                                <label> Confirmation de Mot de passe :</label>
                                                <input class="form-control formulaire" type="password" name="pass2">
                                            </div>
                                        </div>

                                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
                                        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                        Ajoutez une photo de profil :
                                        <input name="image" type="file">
                                        <input type="hidden" name="formvalid">
                                        <div class="row btnSubmit">
                                            <div class="btnInscription btn btn-lg">
                                                <input class="btn btn-primary" type="submit" value="JE CREE MON COMPTE" style="cursor:pointer;">
                                            </div>
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

</html>