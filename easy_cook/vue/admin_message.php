<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Easy Cook - Compte</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

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
include("../include/head.php");
if (empty($_SESSION["pseudo"])) {
    header('Location:connexion.php');
}
?>
<div class="page">

    <div class="panel">
        <div class="title">
            <h2>Message(s) des utilisateurs :</h2>
        </div>
        <?php
        $sql = 'SELECT * FROM message';
        $sql2 = "SELECT SUBSTR(contenu,1,30) FROM message";
        $rq = mysql_query($sql);
        $rqq = mysql_query($sql2);
        $tab = mysql_fetch_row($rqq);
        echo "<table border='1'>";
        echo "<th>Objet</th>";
        echo "<th>Début message...</th>";
        echo "<th>Expéditeur</th>";
        while ($donnee = mysql_fetch_assoc($rq)) {
            echo '<tr>';
            echo '<td>';
            ?>
            <a href="affiche_message.php?id_message=<?= $donnee['id']; ?>"><?= $donnee['objet']; ?></a>
            <?php
            echo "</td>";
            echo "<td>";
            ?>
            <a href="affiche_message.php?id_message=<?= $donnee['id']; ?>"><?= $tab[0] . "..."; ?></a>
            <?php
            echo "</td>";
            echo "<td>";
            ?>
            <a href="affiche_message.php?id_message=<?= $donnee['id']; ?>"><?= $donnee['envoyeur']; ?></a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</div>

<?php
include("../include/footer.php");


?>