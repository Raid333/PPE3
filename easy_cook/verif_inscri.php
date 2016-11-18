<?php


//Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=base_beta_ec' , 'root' , '');
} catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}


//Récupération des données envoyées par l'utilisateur
$pseudo = validate_input($_POST['pseudo']);
$mail = validate_input($_POST['mail']);
$passe = validate_input($_POST['passe']);

//Cryptage du mot de passe
$cryptage = sha1($passe);



$requette = $bdd->query("SELECT pseudo FROM utilisateur WHERE pseudo='$pseudo'");
$check_pseudo = $requette->fetch(PDO::FETCH_ASSOC);

//Vérification si le pseudo existe déjà dans la base de donnée 
if($check_pseudo == '1' || $check_pseudo > '1') {
    echo "Votre pseudo est déjà utilisé" . "<br>";
    echo '<a href="inscription.php">Revenir à la page d inscription</a>';
}
//Vérification si les champs sont vide ou non
else if(!empty($pseudo) && !empty($mail) && !empty($passe)) {
    $tab = array(
        'pseudo' => $pseudo,
        'mail' => $mail,
        'passe' => $cryptage);

    //Si tous est en ordre, on envoi la requette au serveur pour enregistrer l'utilisateur dans la base de données
    $requette = "INSERT INTO utilisateur(pseudo, passe, mail) VALUE(:pseudo, :passe, :mail)";
    $sql = $bdd->prepare($requette);
    $sql->execute($tab);
    header('Location:connexion.php');
} else {
    echo "Veuillez rentrer tous les champs sous le bon format pour l'inscription" . "<br>";
    echo '<a href="inscription.php">Revenir à la page d inscription</a>';
}

function validate_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}
?>