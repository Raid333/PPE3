<?php
include('../include/head.php');

if (!isset($_SESSION['pseudo'])) {
    header('Location:connexion.php');
} else {


// { Début - Première partie
    if (!empty($_POST) OR !empty($_FILES)) {
        $_SESSION['sauvegarde'] = $_POST;
        $_SESSION['sauvegardeFILES'] = $_FILES;

        $fichierActuel = $_SERVER['PHP_SELF'];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $fichierActuel .= '?' . $_SERVER['QUERY_STRING'];
        }

        header('Location: ' . $fichierActuel);
        exit;
    }
// } Fin - Première partie

// { Début - Seconde partie
    if (isset($_SESSION['sauvegarde'])) {
        $_POST = $_SESSION['sauvegarde'];
        $_FILES = $_SESSION['sauvegardeFILES'];

        unset($_SESSION['sauvegarde'], $_SESSION['sauvegardeFILES']);
    }
// } Fin - Seconde partie

    ?>

    <div class="page">
    <div class="panel">
    <div class="title">

    </div>
    <form class="form-horizontal" method="post" action="recette.php">
        <fieldset>

            <!-- Form Name -->
            <legend>Rechercher une recette</legend>

            <!-- Search input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="searchinput">Nom</label>
                <div class="col-md-4">
                    <input id="searchinput" name="name" type="search" class="form-control input-md">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Type de recette</label>
                <div class="col-md-4">
                    <select id="selectbasic" name="type" class="form-control">
                        <option value="entree">Entrée</option>
                        <option value="plat">Plat</option>
                        <option value="dessert">Dessert</option>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="valide" value="valider" class="btn btn-primary">Rechercher
                    </button>
                </div>
            </div>

        </fieldset>
    </form>
    <br>
    <center>
    <?php

    if (isset($_POST['valide'])) {
        $nom = validate_input($_POST['name']);
        $_SESSION['nomRecette'] = $nom;
        $type = $_POST['type'];
        $_SESSION['typeRecette'] = $type;
        include('../include/configuration.php');

        $requeteRecherche = 'SELECT * FROM recette where type = "' . $type . '" and nom like "%' . $nom . '%"';
        $rq = mysql_query($requeteRecherche);
        echo "<table border='1' style='width:70%'>";
        echo "<tr>";
        echo "<th>Photo</th>";
        echo "<th>Nom</th>";
        echo "</tr>";
        while ($donnee = mysql_fetch_assoc($rq)) {
            echo "<tr>";
            echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?php echo $donnee['nom']; ?>"><img
                    src="../images/<?php echo $donnee['photo']; ?>" alt="<?php echo $donnee['photo']; ?>"
                    width="100" height="100"></a>
            <?php
            echo "</td>";
            echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?php echo $donnee['nom']; ?>"><?php echo $donnee["nom"]; ?></a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        $requeteAllRecette = 'SELECT * FROM recette';
        $rqq = mysql_query($requeteAllRecette);

        echo "<table border='1' style='width:70%'>";
        echo "<tr>";
        echo "<th>Photo</th>";
        echo "<th>Nom</th>";
        echo "</tr>";
        while ($donnee = mysql_fetch_assoc($rqq)) {
            echo "<tr>";
            echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?php echo $donnee['nom']; ?>"><img
                    src="../images/<?php echo $donnee['photo']; ?>" alt="<?php echo $donnee['photo']; ?>"
                    width="100" height="100"></a>
            <?php
            echo "</td>";
            echo "<td>";
            ?>
            <a href="page_recette.php?nom_recette=<?php echo $donnee['nom']; ?>"><?php echo $donnee["nom"]; ?></a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
                ?>

            </center>

        </div>
    </div>


    <?php
    function validate_input($input)
    {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    include('../include/footer.php');

?>