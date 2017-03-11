<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 27/02/2017
 * Time: 17:00
 */

include('../include/configuration.php');

$id_recette = $_GET['id_recette'];

$sqlDeleteRecette = 'DELETE FROM recette where id = "'.$id_recette.'"';
$rq = mysql_query($sqlDeleteRecette);


header('Location:../vue/my_recette.php');