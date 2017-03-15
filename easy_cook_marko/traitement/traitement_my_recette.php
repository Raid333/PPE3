<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/02/2017
 * Time: 17:00
 */

include('../include/configuration.php');

$id_recette = $_GET['id_recette'];
$sql = 'SELECT * FROM recette where id="'. $id_recette . '"';
$rq = mysql_query($sql);
$test = mysql_fetch_assoc($rq);
unlink("../images/" . $test['photo']);
$sqlDeleteRecette = 'DELETE FROM recette where id = "'.$id_recette.'"';
$rq = mysql_query($sqlDeleteRecette);
header('Location:../vue/my_recette.php');

/* dfsdfsf */



