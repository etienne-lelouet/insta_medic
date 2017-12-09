<?php
require_once 'modele/accueil.php';
require_once 'controleurs/accueil.php';
?>
                <div class="col-sm-3 col-md-2 col-lg-2 partieGauche menu">
                    <div class="container-fluid fontGris">
                        <div class="row">
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <div class="mesInfos">
				    <h5>Mes Informations</h5>
				<?php
				    $url = "files/".$_SESSION['id']. "/".$res_user['urlphoto'];
				    if (file_exists($url))
				    {  
					    echo '<img src="'.$url.'">';
				    }
				    else
				    {
					    echo '<img src="files/default.jpg">';
				    }
                                  ?>
                                    <h4>
                                        <?php echo $res_user['nom']; ?>
                                    </h4>
                                    <h4>
                                        <?php echo $res_user['prenom']; ?>
                                    </h4>
                                </div>
                                <a class="flex-sm-fill text-sm-center nav-link" href="index.php">Mon Compte</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="index.php?page=logout">Se deconnecter</a>
                            </nav>
                        </div>
                    </div>
                </div>

