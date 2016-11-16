<?php
	$pseudo = $mail = $pass = "";
	$err = false;

	// Vérification si les champs sont remplis ou non
	if (empty($_POST['pseudo'])) {
		$err = true;
		echo "Veuillez rentrer votre pseudo ! <br>";
	} else {
		$pseudo = validate_input($_POST['pseudo']);
	}
	if (empty($_POST['mail'])) {
		$err = true;
		echo "Veuillez rentrer votre mail ! <br>";
	} else {
		if(filter_var(validate_input($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
			$mail = validate_input($_POST['mail']);
		} else {
			$err = true;
			echo "Veuillez rentrer un mail valide ! <br>";
		}
	}
	if (empty($_POST['pass'])) {
		$err = true;
		echo "Veuillez rentrer un mot de passe ! <br>";
	} else {
		$pass = sha1(validate_input($_POST['pass']));
	}

	if ($err = false) {
		//Connexion à la base de données
		$connexion = mysqli_connect("localhost" , "root" , "");
		if (!$connexion) {
			die ("Problème de connexion à la base de données" . mysqli_connect_error());
		}
		mysqli_select_db($connexion , "base_beta_ec");

		//Ajout des comptes sur la table utilisateur
		

		if (!mysqli_query($connexion , $requette)) {
			echo "Problème lors de l'inscription d'un nouveau utilisateur ". mysqli_error($connexion);
		} else {
			echo "Bienvenue : " . $_POST['pseudo'] . " !";
		}


	}






	function validate_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}