<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Easy Cook - Compte</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/superfish.css" media="screen">
        <script src="js/jquery-1.9.0.min.js"></script>
        <script src="js/hoverIntent.js"></script>
        <script src="js/superfish.js"></script>
        <script>

            // initialise plugins
            jQuery(function(){
                jQuery('#example').superfish({
                    //useClick: true
                });
            });

        </script>

    </head>
    <body>
        <?php
        $verification = $_POST['verification'];
        if ($verification == "1") {
            include('configuration.php');

            session_start();

            $name = validate_input($_POST['nom']);
            $type = validate_input($_POST['type']);
            $photo = validate_input($_POST['photo']);
            $description = validate_input($_POST['description']);
            $name_utilisateur = $_SESSION["pseudo"];

            define('TARGET', '/images/');    // Repertoire cible
            define('MAX_SIZE', 100000);    // Taille max en octets du photo
            define('WIDTH_MAX', 500);    // Largeur max de l'image en pixels
            define('HEIGHT_MAX', 500);    // Hauteur max de l'image en pixels

            // Tableaux de donnees
            $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
            $infosImg = array();

            // Variables
            $extension = '';
            $message = '';
            $nomImage = '';

            /************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
            if( !is_dir(TARGET) ) {
                if( !mkdir(TARGET, 0755) ) {
                    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
                }
            }

            /************************************************************
 * Script d'upload
 *************************************************************/
            if(!empty($_POST['photo']))
            {
                
                // On verifie si le champ est rempli
                if( !empty($_POST['photo']['name']) )
                {
                    // Recuperation de l'extension du photo
                    $extension  = pathinfo($_POST['photo']['name'], PATHINFO_EXTENSION);

                    // On verifie l'extension du photo
                    if(in_array(strtolower($extension),$tabExt))
                    {
                        // On recupere les dimensions du photo
                        $infosImg = getimagesize($_POST['photo']['tmp_name']);

                        // On verifie le type de l'image
                        if($infosImg[2] >= 1 && $infosImg[2] <= 14)
                        {
                            // On verifie les dimensions et taille de l'image
                            if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (POSTize($_POST['photo']['tmp_name']) <= MAX_SIZE))
                            {
                                // Parcours du tableau d'erreurs
                                if(isset($_POST['photo']['error']) 
                                   && UPLOAD_ERR_OK === $_POST['photo']['error'])
                                {
                                    // On renomme le photo
                                    $nomImage = md5(uniqid()) .'.'. $extension;

                                    // Si c'est OK, on teste l'upload
                                    if(move_uploaded_file($_POST['photo']['tmp_name'], TARGET.$nomImage))
                                    {
                                        $message = 'Upload réussi !';
                                    }
                                    else
                                    {
                                        // Sinon on affiche une erreur systeme
                                        $message = 'Problème lors de l\'upload !';
                                    }
                                }
                                else
                                {
                                    $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                                }
                            }
                            else
                            {
                                // Sinon erreur sur les dimensions et taille de l'image
                                $message = 'Erreur dans les dimensions de l\'image !';
                            }
                        }
                        else
                        {
                            // Sinon erreur sur le type de l'image
                            $message = 'Le photo à uploader n\'est pas une image !';
                        }
                    }
                    else
                    {
                        // Sinon on affiche une erreur pour l'extension
                        $message = 'L\'extension du photo est incorrecte !';
                    }
                }
                else
                {
                    // Sinon on affiche une erreur pour le champ vide
                    $message = 'Veuillez remplir le formulaire svp !';
                }
            }
            
            
            $sqlRecette = 'INSERT INTO recette (nom, type, photo, description, name_utilisateur) VALUES("'. $name .'", "'. $type .'", "'. $photo .'", "'. $description .'", "'. $name_utilisateur .'")';
            mysql_query($sqlRecette);
        }else {
            header('Location:index.php');
        }
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Votre recette a bien été ajouté !</h1>
                    <h2>Récapitulatif :</h2>
                    <br>
                    <img src="<?php echo $photo; ?>" alt="" width="100" height="125">
                    <br><br>
                    Nom : <?php echo $name; ?>
                    <br><br>
                    Type : <?php echo $type; ?>
                    <br><br>
                    Description : <?php echo $description; ?>
                    <br><br>
                    <h2><a href="index.php">Retour</a></h2>
                </div>


                <?php

                /************************************************************
 * Script realise par Emacs
 * Crée le 19/12/2004
 * Maj : 23/06/2008
 * Licence GNU / GPL
 * webmaster@apprendre-php.com
 * http://www.apprendre-php.com
 * http://www.hugohamon.com
 *
 * Changelog:
 *
 * 2008-06-24 : suppression d'une boucle foreach() inutile
 * qui posait problème. Merci à Clément Robert pour ce bug.
 *
 *************************************************************/

                /************************************************************
 * Definition des constantes / tableaux et variables
 *************************************************************/

                // Constantes

                ?>

                <?php
                function validate_input($input) {
                    return htmlspecialchars(stripslashes(trim($input)));
                }
                include("footer.php");
                ?>