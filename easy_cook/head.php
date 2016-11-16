<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="icon" href="images/icon.ico" />
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
    <div class="box">
        <div class="panel">
            
            
        <?php 
        session_start(); 
        if (!empty($_SESSION['login'])) {
        echo '<a href="logout.php">Deconnexion</a>'; echo "&nbsp; &nbsp";
        echo "Bienvenue : " . $_SESSION['login']; 
        
        } else {
            echo '<a href="inscription.php">Inscription</a>'; echo "&nbsp; &nbsp";
            echo '<a href="connexion.php">Se Connecter</a>';
        }
        ?>
    </div>
    </div>
<?php


?>
<div class="header-wrap">
    <div class="logo">
        <a href="index.php"><img src="images/easy_cook.png" width="300px" height="250px"></a>
    </div>
    <div class="menu"> <img src="images/menu-left.png" alt="image"/>
        <ul class="sf-menu" id="example">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="about.php">A propos</a></li>
            <li class="current"> <a href="page.php">Recettes</a>
                <ul>
                    <li> <a href="#">consectetuer </a> </li>
                    <li class="current"> <a href="#">Nunc dignissim risus id metus.</a>
                        <ul>
                            <li class="current"><a href="#">Cras ornare tristique elit</a></li>
                            <li><a href="#">Ut aliquam sollicitudin leo</a></li>
                            <li><a href="#">Cras iaculis ultricies nulla.</a></li>
                            <li><a href="#">Aliquam tincidunt </a></li>
                            <li><a href="#">vestibulum nulla nec ante</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Cras iaculis ultricies nulla</a></li>
                    <li> <a href="#">Donec quis dui at</a></li>
                </ul>
            </li>
            <li> <a href="contact.php">Contact</a> </li>
        </ul>
        <img src="images/menu-right.png" alt="image"/> </div>
</div>