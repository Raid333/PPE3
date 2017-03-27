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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <div class="w3-content w3-section" style="width:800px;height: 300px;">
        <img class="mySlides" src="../images/banner1.jpg" style="width:800px;height: 300px;">
        <img class="mySlides" src="../images/banner2.jpg" style="width:800px;height: 300px;">
        <img class="mySlides" src="../images/banner3.jpg" style="width:800px;height: 300px;">
        <img class="mySlides" src="../images/banner4.jpg" style="width:800px;height: 300px;">
        <img class="mySlides" src="../images/banner5.jpg" style="width:800px;height: 300px;">
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 3000);
        }
    </script>
<center><h3>Recettes du moment :</h3></center>

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