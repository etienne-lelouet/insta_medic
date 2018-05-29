
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>Template</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12 cellMain">
                <?php require 'barre.php' ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
                    <div class="container-fluid fontGris">
                        <div class="avenir">
						<h6>Vos Patients:</h6>
                            <table>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Hospitalisé</th>
                                    <th>Service</th>
                                    <th>Chambre</th>
                                </tr>
                                <?php
                                foreach ($res as $val) {
                                    echo '<tr>';
                                    echo '<td><a href="index.php?page=personne&id=' . $val['idPersonne'] . '">' . $val['nom'] . '</a></td>';
                                    echo '<td class="tabrdv">' . $val['prenom'] . '</td>';
                                    if ($val['hospitalise'] == true)
                                    {
                                        echo '<td class="tabrdv">OUI</td>';
                                    }
                                    else
                                    {
                                        
                                    echo '<td class="tabrdv">Non</td>';
                                    }
                                    if ($val['hospitalise'] == true && isset($val['nomService']))
                                    {
                                        echo '<td class="tabrdv">'.$val['nomService'].'</td>';
                                    }
                                    else
                                    {
                                        echo '<td class="tabrdv">-</td>';
                                    }
                                    if ($val['hospitalise'] == true && isset($val['idChambre']))
                                    {
                                        echo '<td class="tabrdv">'.$val['idChambre'].'</td>';
                                    }
                                    else
                                    {
                                        echo '<td class="tabrdv">-</td>';
                                    }
                                    echo '</tr></a>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>