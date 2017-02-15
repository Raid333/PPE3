<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TMPS00042</title>
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
        ?>

        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1> "Qui sommes-nous ?"</h1>
                </div>
                <div class="content">
                    <p>La Maison des Ligues (M2L) est une structure financée par le Conseil Régional de Lorraine dont l'administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL), celle-ci est composée de 332 salariés.<br>

                        La Maison des ligues héberge la majorité des ligues sportives régionales, de la ligue de tennis (la plus grosse) à des ligues de sports qui n’ont pas d’employés permanents, comme le bowling ou la plongée sous-marine. La ligue de football occupe 2000 m² de bureaux dans la banlieue de Nancy et ne sera probablement jamais hébergée dans nos locaux. Nous hébergeons également, quelques comités départementaux, ainsi que le CROSL et sa déclinaison départementale : le CDOS (Comité Départemental Olympique et Sportif). La M2L a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales</p>

                    <h1>"En quoi consiste le site ?"</h1><br>
                    <p>EasyCook est un site dédié à la cuisine, elle propose ainsi aux membrex de pouvoir consulter des recettes de cuisines créés spécialement par des cuisiniers professionnel.<br>
                        EasyCook propose tout type de recette, que se soit les entrées, les plats, les desserts et même les coktails pour répondre a toute vos envies</p>

                    <h1>Pour nous contacter</h1> <br>


                    <form action="" method="post">
                    <fieldset><legend><h2>Vos coordonnées :</h2></legend>
                        <p><label for="nom">Pseudo : </label><input type="text" id="pseudo" name="pseudo" tabindex="1" required/></p>
                        <p><label for="email">Email : </label><input type="text" id="email" name="email" tabindex="2" required/></p>
                    </fieldset>

                    <fieldset><legend><h2>Votre message :</h2></legend>
                        <p><label for="objet">Objet : </label><input type="text" id="objet" name="objet" tabindex="3" required/></p>
                        <p><label for="message">Message :</label><textarea id="message" name="message" tabindex="4" cols="30" rows="8" required></textarea></p>
                    </fieldset>
                    <input type="checkbox" name="news" value="news" checked>Pour ne pas recevoir de newletters, veuillez décocher la case<br>
                    <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" /></div>
            </div>
                </div>
            </div>
            </form>
        <?php
        include("footer.php");
        ?>