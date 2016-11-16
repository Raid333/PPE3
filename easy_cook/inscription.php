<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
   <?php $erreur = ""; ?>
    <form action="verif_inscri.php" method="post">
        <input name="pseudo"> PSEUDO<br>
        <input name="mail"> MAIL<br>
        <input type="password" name="pass"> MOT DE PASSE<br>
        <input type="submit" value="envoyer">
        
    </form>
</body>
</html>