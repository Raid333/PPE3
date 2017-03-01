<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>test</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" href="../images/icon.ico" />
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
    <div class="box">
        <div class="panel">


            <?php 
            $db = @mysql_connect("localhost", "root", "") or die('Error ' . $base . ' : ' . mysql_error());
            mysql_select_db('base_beta_ec',$db);

            session_start(); 
            if (!empty($_SESSION['pseudo'])) {
                echo '<a href="../traitement/logout.php">Deconnexion</a>'; echo "&nbsp; &nbsp";
                echo "Bienvenue : " . $_SESSION['pseudo'];
                $requeteType = 'SELECT * FROM utilisateur where pseudo = "'. $_SESSION['pseudo'] .'"';
                $rq = mysql_query($requeteType);
                $tab = mysql_fetch_assoc($rq);

            } else {
                echo '<a href="../vue/inscription.php">Inscription</a>'; echo "&nbsp; &nbsp";
                echo '<a href="../vue/connexion.php">Se Connecter</a>';
            }
            ?>
        </div>
    </div>
    <div class="header-wrap">
        <div class="logo">
            <a href="../vue/index.php"><img src="../images/easy_cook.png" width="300px" height="250px"></a>
        </div>
        <div class="menu"> <img src="../images/menu-left.png" alt="image"/>
            <ul class="sf-menu" id="example">
                <li><a href="../vue/index.php">Accueil</a></li>
                <li><a href="../vue/compte.php">Mon compte</a>
                    <?php
                    if (!empty($_SESSION['pseudo'])) {
                        if ($tab['type'] == "cuisinier") {
                            echo '
                        <ul>
                            <li class="current"><a href="../vue/add_recette.php">Ajouter une recette</a></li>
                            <li class="current"><a href="../vue/my_recette.php">Mes Recettes</a></li>
                            </ul>';
                        } else if ($tab['pseudo'] == "admin") {
                            echo '<ul>
                            <li class="current"><a href="../vue/admin_message.php">Messagerie</a></li>
                            </ul>';
                        }
                    }
                    ?>
                </li>
                <li class="current"> <a href="../vue/recette.php">Recettes</a>
                </li>
                <li> <a href="../vue/contact.php">A propos</a>

                </li>
            </ul>
            <img src="../images/menu-right.png" alt="image"/> </div>
    </div>