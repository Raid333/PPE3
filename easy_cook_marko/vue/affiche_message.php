<?php
include('../include/head.php');
?>

<?php
include('../include/configuration.php');
$id_message = $_GET['id_message'];
$requeteMessage = 'SELECT * FROM message where id="' . $id_message . '"';
$rq = mysql_query($requeteMessage);
$rqq = mysql_fetch_assoc($rq);
?>
    <div class="page-wrap">
        <div class="panel">
            <div class="title">
                <h1><?php echo "Objet message : " . '"' . $rqq['objet'] . '"'; ?></h1>
                <h2>Message : </h2>
                <p><?= $rqq['contenu']; ?></p><br>
                <h2>Expéditeur : <?= $rqq['envoyeur']; ?></h2>


            </div>

            <form action="../traitement/traitement_message.php" method="post">
                <input type="hidden" name="check" value="supp">
                <input type="hidden" name="id_message" value="<?= $id_message; ?>">
                <input type="submit" value="Supprimer le message">
            </form>
        </div>
    </div>

<?php

include('../include/footer.php');
?>