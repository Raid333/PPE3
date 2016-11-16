<?php
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

if(!empty($pseudo) || !empty($mail) || !empty($pass)) {
    header('Location:connexion.php');
} else {
    echo "Veuillez rentrer tous les champs pour l'inscription" . "<br>";
    echo '<a href="inscription.php">Revenir à la page d inscription</a>';
}
?>