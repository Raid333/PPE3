<?php 
include("head2.php");
?>

<div class="banner-wrap" align="center">
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
        echo  '<p style="color:red">Votre pseudo est déjà utilisé !</p>' ;
        echo '<a style="color:red" href="inscription.php">Retour à l inscription</a>';
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
        echo  '<p style="color:red">Veuillez rentrer tous les champs pour s inscrire</p>' ;
        echo '<a style="color:red" href="inscription.php">Retour à l inscription</a>';
    }

    function validate_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }
    ?>
</div>
<?php
include("footer.php");
?>