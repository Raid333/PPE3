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

        //Test pour upload les photos des recettes sur le serveurs

        //            $content_dir = 'images/'; // dossier où sera déplacé le fichier
        //
        //            $tmp_file = $_POST['photo'];
        //
        //            if( !is_uploaded_file($tmp_file) )
        //            {
        //                exit("Le fichier est introuvable");
        //            }
        //
        //            // on vérifie maintenant l'extension
        //            $type_file = $_POST['photo'];
        //
        //            if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
        //            {
        //                exit("Le fichier n'est pas une image");
        //            }
        //
        //            // on copie le fichier dans le dossier de destination
        //            $name_file = $_POST['photo'];
        //
        //            if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
        //            {
        //                exit("Impossible de copier le fichier dans $content_dir");
        //            }
        //
        //            echo "Le fichier a bien été upload
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Votre message a bien été envoyé</h1>
                    <br><br>
                    <h2>Objet : </h2>Mes recettes crée ne s'affiche pas
                    <br><br>
                    <h2>Message : </h2>Bonjour, étant cuisinier au sein de la M2l, je poste régulièrement des recettes sur le site. Mais depuis hier midi, lorsque j'accède sur la page "mes recettes" rien de s'affiche <br>
                    Es-ce normal ?
                    <br><br>
                    Cordialement,
                    <br><br>
                    Cuisto
                    <br><br>

                </div>


                <?php
                function validate_input($input) {
                    return htmlspecialchars(stripslashes(trim($input)));
                }
                include("footer.php");
                ?>