<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Easy Cook - Compte</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../css/superfish.css" media="screen">
        <script src="../js/jquery-1.9.0.min.js"></script>
        <script src="../js/hoverIntent.js"></script>
        <script src="../js/superfish.js"></script>
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
            include('../include/configuration.php');

            session_start();

            $name = validate_input($_POST['nom']);
            $type = validate_input($_POST['type']);
            $photo = validate_input($_POST['photo']);
            $description = validate_input($_POST['description']);
            $name_utilisateur = $_SESSION["pseudo"];



            


                $nom = md5(uniqid("photo_", false));
            $namei = "images/";
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES["$photo"]) AND $_FILES["$photo"]['error'] == 0)
            {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES["$photo"]['size'] <= 1000000)
                {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES["$photo"]['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                        // On peut valider le fichier et le stocker définitivement

                        $result = move_uploaded_file($_FILES["$photo"]['tmp_name'],$namei);
                        if ($result) echo "Transfert réussi"; else { echo 'echec transfert';}


                    }
                }   
            }



echo $namei;


            $sqlRecette = 'INSERT INTO recette (nom, type, photo, description, name_utilisateur) VALUES("'. $name .'", "'. $type .'", "'. $nom .'", "'. $description .'", "'. $name_utilisateur .'")';
            mysql_query($sqlRecette);
        }else {
            header('Location:../vue/index.php');
        }
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Votre recette a bien été ajouté !</h1>
                    <h2>Récapitulatif :</h2>
                    <br>
                    <img src="images/<?php echo $photo; ?>" alt="<?php echo $photo; ?>" width="100" height="125">
                    <br><br>
                    Nom : <?php echo $name; ?>
                    <br><br>
                    Type : <?php echo $type; ?>
                    <br><br>
                    Description : <?php echo $description; ?>
                    <br><br>
                    <h2><a href="../vue/index.php">Retour</a></h2>
                </div>


                <?php
                function validate_input($input) {
                    return htmlspecialchars(stripslashes(trim($input)));
                }
                include("../include/footer.php");
                ?>