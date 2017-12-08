<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <title>SELECTIONNEZ LE CRENEAU HORAIRE</title>
    <style>
	table
	{
		border-collapse:collapse;
	}
	table, td
	{
		height:50px;
		width:100px;
	}
	table, tr
	{
		width:200px;
	}
    </style>

</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
	    <div class="col-xs-12 col-lg-12 cellMain">
		<?php require 'barre.php' ?>
                <div class="col-sm-9 col-md-10 col-lg-10 partieDroite">
		    <div class="container-fluid fontGris">
			<table border=1>
                    	<?php
                          foreach($planning as $key => $val)
			  {
			 	echo '<tr>';
				echo '<td>';
				echo date('H:i', $key);
				echo '</td>';
				if (!is_array($val))
				{
					echo '<td class="cliquable">pas de rdv ici</td>';
				}
				else
				{
					echo '<td class="rdv">'.$val['libelleRdv'].'</td>';
				}
				echo '</tr>';
			  }
                     	?>
		       </table>
                    </div>
		</div>
            </div>
        </div>
    </div>	  
    <?php  require 'footer.php'; ?>
</body>
</html>
