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
        include("head.php");    
        if (empty($_SESSION["pseudo"])) {
            header('Location:connexion.php');
        } else if ($_SESSION['pseudo'] == "admin") {
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Compte administrateur :</h1>
                    <h2>Comptes contenus dans la base de donnée :</h2>
                </div>
                <?php
            $sqlUtilisateur = 'SELECT * FROM utilisateur where pseudo not like "admin"';
            $sqlRecette = 'SELECT * FROM recette';
            $rq = mysql_query ($sqlUtilisateur);
            $rqq = mysql_query ($sqlRecette);

            echo "<table border='1' style='width:70%'>";
            echo "<tr>";
            echo "<th>nom compte</th>";
            echo "<th>type</th>";
            echo "<th>action</th>";
            echo "</tr>";
            
            //Boucle listant les utilisateurs dans la base
            while ($donnee = mysql_fetch_assoc($rq)) {

                echo "<tr>";
                echo "<td>";

                echo $donnee['pseudo']; 

                echo "</td>";
                echo "<td>";

                echo $donnee['type']; 

                echo "</td>";
                echo "<td>";
                ?>
                <a href="admin.php?id_utilisateur=<?php echo $donnee['id']; ?>">SUPPRIMER</a>
                <?php
                echo "</td>";
                echo "</tr>";


            }
            echo "</table>";
                ?>
                <br>
                <div class="title">
                    <h2>Recettes contenues dans la base de donnée :</h2>
                </div>
                <?php
                ?>

                <div class="title">


                </div>
                <?php
            echo "<table border='1' style='width:70%'>";
            echo "<tr>";
            echo "<th>nom recette</th>";
            echo "<th>type</th>";
            echo "<th>action</th>";
            echo "</tr>";

            //Boucle listant les recettes dans la base
            while ($donnee = mysql_fetch_assoc($rqq)) {

                echo "<tr>";
                echo "<td>";

                echo $donnee['nom']; 

                echo "</td>";
                echo "<td>";

                echo $donnee['type']; 

                echo "</td>";
                echo "<td>";
                ?>
                <a href="admin.php?id_recette=<?php echo $donnee['id']; ?>">SUPPRIMER</a>
                <?php
                echo "</td>";
                echo "</tr>";


            }
            echo "</table>";
                ?>
            </div></div>
        <?php
        } else {
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Votre Compte :</h1>
                    <h2><?php echo "Nom de compte : " . $_SESSION['pseudo']; ?></h2>
                </div>
                <?php
            $pseudoSession = $_SESSION['pseudo'];
            //            try {
            //                $cnx = mysqli_connect ('localhost', 'root', '', 'base_beta_ec');
            //            } catch (Exception $e) {
            //                die ('Erreur : ' . $e->getMessage());
            //            }
            include('configuration.php');


            $sqlMail = 'SELECT * FROM utilisateur WHERE pseudo = "'. $pseudoSession .'" ';
            $rs = mysql_query($sqlMail) or exit(mysql_error());
            $row = mysql_fetch_array($rs);
            echo "Vous êtes : " . $row['type']. "<br>";
            echo "Votre email : " . $row['mail'] . "<br><br>";
                ?>
                <table>
                    <form method="post" action="update_acc.php">
                        <tr>
                            <td>Changer d'email : </td>
                            <td><input name='newMail'required/></td>
                            <td><input type='submit' name='valid' value='Envoyer Mail'></td>
                        </tr>
                    </form>
                    <form method="post" action="update_acc.php">
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <td>Changer de mot de passe : </td>
                            <td><input name='newPassword' type="password" required/></td>
                        </tr>
                        <tr>
                            <td>Retaper votre mot de passe : </td>
                            <td><input name='newPassword2' type='password' required/> </td>
                            <td><input name='valid' type='submit' value="Envoyer mot de passe"></td>
                        </tr>

                    </form>
                </table>
            </div>
        </div>
        <?php 

        }

        include("footer.php");


        ?>