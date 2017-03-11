<?php
include('../include/head.php');
?>
<div class="page">
    <div class="panel">
        <div class="title">
            <h1>Vos recettes :</h1>
            <h2><?php echo "Nom de compte : " . $_SESSION['pseudo']; ?></h2>
            <?php
            $pseudoSession = $_SESSION['pseudo'];
            include('../include/configuration.php');
            $sqlSelectMyRecette = 'SELECT * FROM recette where name_utilisateur = "'. $pseudoSession .'"';
            $rq = mysql_query($sqlSelectMyRecette) or exit(mysql_error());
            echo "<table border='1' style='width:70%' >";
                echo "<tr>";
                echo "<th>Photo</th>";
                echo "<th>Nom</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                while ($donnee = mysql_fetch_assoc($rq)) {
                    echo "<tr>";
                    echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?= $donnee['nom']; ?>"><img src="../images/<?= $donnee['photo']; ?>" alt="<?= $donnee['photo']; ?>" width="100" height="100"></a>
            <?php
                    echo "</td>";
                    echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?= $donnee['nom']; ?>"><?= $donnee["nom"]; ?></a>
            <?php
                    echo "</td>";
                    echo "<td id='test_tableau'>";?>
                    <a href="../traitement/traitement_my_recette.php?id_recette=<?= $donnee['id']; ?>"><img src="../images/croix.png" alt="" width="25" height="25"></a>
                    <?= "</td>";
                    echo "</tr>";
                }
                echo "</table>";




            ?>
        </div>
    </div>
    <?php
    include('../include/footer.php');
    ?>