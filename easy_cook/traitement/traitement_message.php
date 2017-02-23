<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 16/02/2017
 * Time: 13:19
 */
include('../include/configuration.php');
$pseudo = validate_input($_POST['pseudo']);
$email = validate_input($_POST['email']);
$objet = validate_input($_POST['objet']);
$message = validate_input($_POST['message']);
$check = $_POST['check'];
$id_message = $_POST['id_message'];

if ($check == "add") {
    $rq = @mysql_query('INSERT INTO message (objet, contenu, envoyeur) VALUES ("' . $objet . '","' . $message . '","' . $pseudo . '")');


    header('Location:../vue/contact.php');
} else {
    mysql_query('DELETE FROM message where id="'. $id_message . '"');
    header ('Location:../vue/admin_message.php');
}
function validate_input($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}
?>