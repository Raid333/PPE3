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
        $db = @mysql_connect("localhost", "root", "") or die('Error ' . $base . ' : ' . mysql_error());
        mysql_select_db('base_beta_ec',$db);
        
        session_start();
        
        $name = $_POST['nom'];
        $type = $_POST['type'];
        $photo = $_POST['photo'];
        $description = $_POST['description'];
        $name_utilisateur = $_SESSION["pseudo"];

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
                include("footer.php");
                ?>