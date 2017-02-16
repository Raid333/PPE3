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

        include("../include/head.php");
        if (empty($_SESSION["pseudo"])) {
            header('Location:connexion.php');
        } else {
        ?>
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>Ajouter une recette :</h1>
                    <h2></h2>
                </div>
               <table>
                   <form enctype="multipart/form-data" method="post" action="../traitement/verif_recette.php">
                       <tr>
                           <td>Nom de la recette : </td>
                           <td><input name="nom" type="text" required/></td>
                           <input name="verification" type="hidden" value="1"/>
                       </tr>
                       <tr>
                           <td>Type de recette : </td>
                           <td><select name="type">
                               <option value="entree">Entrée</option>
                               <option value="plat">Plat</option>
                               <option value="dessert">Dessert</option>
                               <option value="...">...</option>
                           </select></td>
                       </tr>
                       <tr>
                           <td>Photo :</td>
                           <td><input type="file" name="photo" id="fileToUpload" required/></td>
                       </tr>
                       <tr>
                           <td>Descriptif :</td>
                           <td><TEXTAREA name="description" rows=4 cols=40></TEXTAREA></td>
                       </tr>
                       <tr>
                           <td><input type="submit"></td>
                       </tr>
                   </form>
               </table>
            </div>
        </div>
        <?php 
            include("../include/footer.php");
        }
        ?>