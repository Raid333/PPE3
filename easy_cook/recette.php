<?php
include('head.php');
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
                        <button id="singlebutton" name="valide" value="valider" class="btn btn-primary">Rechercher</button>
                    </div>
                </div>

            </fieldset>
        </form>
        <br>
        <center>
            <?php
            $valide = $_POST['valide'];
            if ($valide == "valider") {
                $nom = validate_input($_POST['name']);
                $type = $_POST['type'];
                include('configuration.php');

                $requeteRecherche = 'SELECT * FROM recette where type = "'. $type .'" and nom like "%'. $nom .'%"';
                $rq = mysql_query($requeteRecherche);

                while ($donnee = mysql_fetch_assoc($rq)) {
                    echo  $donnee["nom"] . "&nbsp; &nbsp" . $donnee['description'] ."<br>";
                }
            } else {

            }
            ?>
        </center>

    </div>
</div>


<?php
function validate_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}
include('footer.php');
?>