<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Easy Cook - Accueil</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/icon.ico"/>
    <link rel="stylesheet" href="../css/superfish.css" media="screen">
    <script src="../js/jquery-1.9.0.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.js"></script>

    <script>

        // initialise plugins
        jQuery(function () {
            jQuery('#example').superfish({
                //useClick: true
            });
        });

    </script>

</head>
<body>
<?php
include('../include/head.php');
?>

<div class="clear"></div>
<div class="banner-wrap">
    <div class="banner"><img src="../images/banner1.jpg" alt=""></div>

</div>
<center><h3>Recettes du moment :</h3></center>
<?php

//for ($i = 0;$i < 3; $i++) {
//    $sql = "SELECT * FROM recette WHERE id=";
//    $rq = mysql_query($sql);
//   $tab = mysql_fetch_assoc($rq);
//  echo $tab[$i] .  "<br>";
//}
?>
<div class="page-wrap">
    <div class="wrap">

        <?php
        $tab = mysql_fetch_assoc(mysql_query('SELECT * FROM recette ORDER BY RAND() LIMIT 1'));
        $tableau = mysql_fetch_assoc(mysql_query('SELECT * FROM recette ORDER BY RAND() LIMIT 1'));
      ?>

        <div class="panel">
            <div class="title">
                <h1><?= $tab['nom']; ?></h1>

            </div>
            <div class="content"><img src="../images/<?= $tab['photo']; ?>" alt="" height="200px" width="200px"/>
                <p><?= $tab['description']; ?><br/>
                    <br/>
                </p>

                <div class="button floatLeft"><a href="page_recette.php?id_recette=<?php echo $tab['id']; ?>">Voir...</a></div>
            </div>
        </div>

        <div class="panel">
            <div class="title">
                <h1><?= $tableau['nom']; ?></h1>

            </div>
            <div class="content"><img src="../images/<?= $tableau['photo']; ?>" alt="" height="200px" width="200px"/>
                <p><?= $tableau['description']; ?><br/>
                    <br/>
                </p>

                <div class="button floatLeft"><a href="page_recette.php?id_recette=<?php echo $tableau['id']; ?>">Voir...</a></div>
            </div>
        </div>


    </div>


</div>
<?php
include("../include/footer.php");
?>