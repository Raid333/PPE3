<?php 
	include("head2.php");
 ?>


<div class="banner-wrap" align="center">
  <form action="connexion.php" method="post">
  <?php $err = false; 
  		$pseudo = "";
  		$pass = "";
  ?>
  	<table>
  		<tr>
  			<td><h1><font color="orange">Connexion</font></h1></td>
  		</tr>
  		<tr>
  			<td>Pseudo :</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="pseudo">
  	<?php 
  				//On test si l'utilisateur à bien soumis le formulaire :
  				if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
  			if (empty($_POST['pseudo'])) {
				$err = true;
				echo "<font color=\"red\">Veuillez rentrer votre pseudo ! </font><br>";
			} 
		}
  	?>

  			</td>
  		</tr>
  		<tr>
  			<td>Mot de passe :</td>
  		</tr>
  		<tr>
  			<td><input type="password" name="pass">
  	<?php
  			if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
  					if (empty($_POST['pass'])) {
						$err = true;
						echo "<font color=\"red\">Veuillez rentrer un mot de passe ! </font><br>";
					} 
		}

	?>
  			</td>
  		</tr>
  		<tr>
  			<td><input type="submit" name="connexion" value="Connexion"></td>
  		</tr>
  	</table>
  </form>
</div>
<!-- <?php
	// if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
	// 	header ('Location:index.php');
	// }else {
	// 	$err = true;
	// }
?> -->
<?php
	$connexion = mysqli_connect('localhost', 'root', '', 'base_beta_ec');
				$sql = 'SELECT * FROM utilisateur WHERE pseudo="'.mysqli_real_escape_string($connexion, $_POST['pseudo']) . "AND passe" . mysqli_real_escape_string($connexion, $_POST['pass']).'"';

                                    $requette = mysqli_query($connexion, $sql) or die('Erreur SQL !<br />'.$sql.'<br />');
                                    $data = mysqli_fetch_array($requette);

                                    mysqli_free_result($requette);
                                    mysqli_close($connexion);
                                    // Si on obtiens un résultat, c'est que le l'utilisateur est bien enregistré dans la bdd
                                   if ($data != null) {
                                        session_start();
                                        $_SESSION['login'] = $data['pseudo'];
                                        header('Location:index.php');
                                        exit();
                                    }else {
                                    	echo "L'utilisateur n'est pas connu dans la base de données";
                                    }
?>
<?php
			function validate_input($input) {
   		 return htmlspecialchars(stripslashes(trim($input)));
		}
	?>
<?php
	include("footer.php");
?>