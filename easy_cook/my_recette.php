<?php
include('head.php');
?>
<div class="page">
    <div class="panel">
        <div class="title">
            <h1>Vos recettes :</h1>
            <h2><?php echo "Nom de compte : " . $_SESSION['pseudo']; ?></h2>
            <?php
            $pseudoSession = $_SESSION['pseudo'];
            include('configuration.php');
            $sqlSelectMyRecette = 'SELECT * FROM recette where name_utilisateur = "'. $pseudoSession .'"';
            $rq = mysql_query($sqlSelectMyRecette) or exit(mysql_error());
            $tab = mysql_fetch_array($rq);

            while ($donnee = mysql_fetch_assoc($rq)) {
                echo $donnee["type"] . "&nbsp; &nbsp" . $donnee["nom"] . "<br>";
            }



            ?>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>