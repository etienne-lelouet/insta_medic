<?php

if (isset($_SESSION['id'])) //si personne est connecté 
{
    header('location: index.php');
}
else
{
    require 'modele/inscription.php';
    if (isset($_POST['formvalid']))
    {
        $data=array();
        $global=true; //pas erreur

        if(!empty($_POST['etat_civil']))
        {
            $data['etat_civil']=$_POST['etat_civil'];
        }
        else
        {
            $pasdetatcivil=true;
            $global=false; //erreur 
        }

        if(!empty($_POST['nom']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u', $_POST['nom']))
        {
            $data['nom']=$_POST['nom'];
        }
        else
        {
            $pasdenom=true;
            $global=false;
        }

        if(!empty($_POST['prenom']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}\p{Pd}\'\s]+?)+$/u', $_POST['prenom']))
        {
            $data['prenom']=$_POST['prenom'];
        }
        else
        {
            $pasdeprenom=true;
            $global=false;
        }

        if(!empty($_POST['date_naissance']) && preg_match('/^(([0-2][0-9]|3[0-1])(\/)(0[0-9]|1[0-2])(\/)[0-9]{4})$/',$_POST['date_naissance']))
        {
            $data['date_naissance']=$_POST['date_naissance'];
        }
        else
        {
            $pasdedate=true;
            $global=false;
        }

        if(!empty($_POST['adresse']) && preg_match('/^([0-9]+?\s[\p{L}\p{Mn}\p{Pd}\'\s]+?)$/u', $_POST['adresse']))
        {
            $data['adresse']=$_POST['adresse'];
        }
        else
        {
            $pasdadresse=true;
            $global=false;
        }

        if(empty($_POST['adressecomp']))
	{
	    $data['adressecomp']=""; 
        }
        else if (!preg_match('/^([\p{L}\p{Mn}\d]+?[\p{L}\p{Mn}\p{Pd}\'\s\d]+?)$/u', $_POST['adressecomp']))
	{
	    $mauvaiseadresse = true;
	    $global=false;
	}
	else
	{
            $data['adressecomp']=$_POST['adressecomp'];
	}
        if(!empty($_POST['code_postal']) && preg_match('/^([\d]{4,8})$/', $_POST['code_postal']))
        {
            $data['code_postal']=$_POST['code_postal'];
        }
        else
        {
            $pasdecode=true;
            $global=false;
        }

        if(!empty($_POST['ville']) && preg_match('/^(?:[\p{L}\p{Mn}]+?[\p{L}\p{Mn}]+?)+$/u', $_POST['ville']))
        {
            $data['ville']=$_POST['ville'];
        }
        else
        {
            $pasdeville=true;
            $global=false;
        }

        if(!empty($_POST['telephone']) && preg_match ('/^(0[\d]{9})$/', $_POST['telephone']))
        {
            $data['telephone']=$_POST['telephone'];
        }
        else
        {
            $pasdetelephone=true;
            $global=false;
        }

        if(!empty($_POST['login']) && preg_match('/^[a-zA-Z]\w{3,14}$/', $_POST['login']))
        {
            $data['login']=$_POST['login'];
        }
        else
        {
            $pasdelogin=true;
            $global=false;
        }

        if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $data['email']=$_POST['email'];
        }
        else
        {
            $pasdemail=true;
            $global=false;
        }

        if(!empty($_POST['password']) && preg_match('/^([\d\p{L}$&*@#%!\-\s]+)$/', $_POST['password']))
        {
            $data['password']=$_POST['password'];
        }
        else
        {
            $pasdepassword=true;
            $global=false;
        }

        if(!empty($_POST['pass2']) && preg_match('/^([\d\p{L}$&*@#%!\-\s]+)$/', $_POST['pass2']))
        {
            $pass2=$_POST['pass2'];
	}
        else
        {
            $pasdepass2=true;
            $global=false;
        }

        if ($data['password']!=$pass2)
        {
            $global=false;
            $passdiff=true;
        }

	if (isset($data['login']))
	{
	    if(verifier_doublons('login', $data['login']))
	    {
		 $global=false;
		 $logindouble=true;
	    }
	}

	if (isset($data['email']))
	{
		if(verifier_doublons('email', $data['email']))
		{
		    $global=false;
		    $maildouble=true;
		}
	}

	if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) 
	{
		$global=false;
		$errorimage='Pas d\'image mise en ligne, veuillez réessayer';
		require 'vue/inscription.php';
		exit();
	}
	

        ////On rentre dans l'upload d'image
        $maxsize=$_POST['MAX_FILE_SIZE'];
        $path=$_SERVER['DOCUMENT_ROOT'].'/clinique/files/';


        if ($_FILES['image']['error'] > 0)
        {
            $errorimage='Erreur lors du telechargement, veuillez réessayer';
            $global=false;
        }
        
        if ($_FILES['image']['size'] > $maxsize)
        {
            $errorimage = "Le fichier est trop gros, la taille maximale est de 3mo";
            $global=false;
        }
        
        $extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
        $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

        if (!in_array($extension_upload,$extensions_valides))
        {
            $errorimage='Format de fichier incorrect. Les formats autorisés sont jpg, jpeg et png';
            $global=false;
        }

        $dimensions=getimagesize($_FILES['image']['tmp_name']);
    
        if($global)
	{
            if ($dimensions[0]>$dimensions[1])
            {
                $errorimage = 'Les dimensions de l\'image sont incorrectes';
                $global=false;
	    }

            $data['password']=md5($data['password']);	
	    $now=time();
            $fullname=$now*rand(1,9);    
	    $urlphoto=$fullname.'.'.$extension_upload;
	    $data['urlphoto']=$urlphoto;
	    $id=register_user($data);
	    if($id>0)
            {
	        $dirname='files/'.$id;

               	if (!mkdir($dirname, 0777))
		{
			exit('une erreur est survenue, veuillez réessayer ultérieurement');	
		}


		$fullname = $dirname.'/'.$urlphoto;	

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $fullname))
                {
                    if (mkdir($dirname.'/espaceclient', 0777))
                    {
                        session_start();
                        $_SESSION['id']=$id;
			$_SESSION['level']=1;
			header ('location: index.php');
		    }
		    else 
		    {
			    exit('une erreur est survenue, veuillez réessayer ultèrieurement');
		    }
		}
		else
		{
			exit('erreur uplaod image');
		}
            }
        }
    }
    require 'vue/inscription.php';
}

?>
