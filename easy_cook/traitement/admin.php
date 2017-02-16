<?php

include('../include/configuration.php');

$id_utilisateur = $_GET['id_utilisateur'];

$sqlDeleteUtilisateur = 'DELETE FROM utilisateur where id = "'.$id_utilisateur.'"';
$rq = mysql_query($sqlDeleteUtilisateur);

$id_recette = $_GET['id_recette'];
$sqlDeleteRecette = 'DELETE FROM recette where id = "'.$id_recette.'"';
$rqq = mysql_query($sqlDeleteRecette);

header('Location:../vue/compte.php');