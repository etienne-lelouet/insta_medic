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
                                                        <input class="form-check-input" type="radio" name="etat_civil" id="inlineRadio3" value="Autre"> Autre
                                                    </label>
                                                    <?php if ($pasdetatcivil==true): ?>
                                                        <span>Veuillez cocher une des cases</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group nom formulaireContent">
                                                <label for="inputNom">Nom :</label>
                                                <?php if ($pasdenom == true): ?>
                                                    <input name="nom" class="form-control formulaire" id="inputNom"><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="nom" class="form-control formulaire" id="inputNom" value="<?php echo $data['nom']; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group prenom formulaireContent">
                                                <label for="inputprenom">Prénom :</label>
                                                <?php if ($pasdeprenom == true): ?>
                                                    <input name="prenom" class="form-control formulaire" id="inputPrenom" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="prenom" class="form-control formulaire" id="inputPrenom" value="<?php echo $data['prenom']; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group dateDeNaissance formulaireContent">
                                                <label> Date de naissance :</label>
                                                <?php if ($pasdedate == true): ?>
                                                    <input type="text" name="date_naissance" class="form-control formulaire" placeholder="JJ/MM/AAAA" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input type="text" name="date_naissance" class="form-control formulaire" placeholder="JJ/MM/AAAA" value="<?php echo $data['date_naissance']; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 1 :</label>
                                                <?php if ($pasdadresse == true): ?>
                                                    <input name="adresse"class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="adresse"class="form-control formulaire" value="<?php echo $data['adresse']; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group adresse formulaireContent">
                                                <label>Adresse 2 :</label>
                                                <?php if ($expression == true): ?>
                                                    <input name="adressecomp" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="adressecomp" class="form-control formulaire" value="<?php echo $data['adressecomp']; ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group codePostale formulaireContent">
                                                <label>Code postal :</label>
                                                <?php if ($pasdecode == true): ?>
                                                    <input name="code_postal" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="code_postal" class="form-control formulaire" value="<?php echo $data['code_postal']; ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group ville formulaireContent">
                                                <label> Ville :</label>
                                                <?php if ($pasdeville == true): ?>
                                                    <input name="ville" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="ville" class="form-control formulaire" value="<?php echo $data['ville']; ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group telephone formulaireContent">
                                                <label>Téléphone :</label>
                                                <?php if ($pasdetelephone == true): ?>
                                                    <input name="telephone" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="telephone" class="form-control formulaire" value="<?php echo $data['telephone']; ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-row infoCompte">
                                            <div class="texteTitre texteCompte">
                                                <h5>Informations du Compte</h5>
                                            </div>
                                            <div class="form-group mail formulaireContent">
                                                <label> Login :</label>
                                                <?php if ($pasdelogin == true): ?>
                                                    <input name="login" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input name="login" class="form-control formulaire" value="<?php echo $data['login']; ?>">
                                                <?php endif; ?>
                                                <?php if($logindouble==true):?>
                                                    <span>Cet identifiant est deja utilisé</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group mail formulaireContent">
                                                <label> Mail :</label>
                                                <?php if ($pasdemail == true): ?>
                                                    <input name="email" class="form-control formulaire " type="email" ><span>Veuillez entrer une valeur valide</span><span></span>
                                                <?php else: ?>
                                                    <input name="email" class="form-control formulaire" type="email" value="<?php echo $data['email']; ?>">
                                                <?php endif; ?>
                                                <?php if($maildouble==true):?>
                                                    <span>Cet email est deja utilisé</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group motDePasse formulaireContent">
                                                <label>Mot de passe :</label>
                                                <?php if ($pasdepassword == true): ?>
                                                    <input type="password" name="password" class="form-control formulaire" type="password" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input type="password" name="password" class="form-control formulaire" type="password" value="<?php echo $data['password']; ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group motDePasse formulaireContent">
                                                <label> Confirmation de Mot de passe :</label>
                                                <?php if ($pasdepass2 == true): ?>
                                                    <input type="password" name="pass2" class="form-control formulaire" ><span>Veuillez entrer une valeur valide</span>
                                                <?php else: ?>
                                                    <input type="password" name="pass2" class="form-control formulaire" value="<?php echo $_POST['pass2']; ?>">
                                                <?php endif; ?>
                                            </div>
                                            <?php if($passdiff==true):?>
                                                <span>Veuillez entrer deux mots de passe identiques</span>
                                            <?php endif; ?>
                                        </div>

                                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
                                        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                        Ajoutez une photo de profil :
					                    <input name="image" type="file" style="margin: 30px 0 0 0;"><?php echo $errorimage; ?>
                                        <input type="hidden" name="formvalid">
                                        <!-- 1er fois sur la page, si tu as déjà valider une fois c'est ok , sinon non -->
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
