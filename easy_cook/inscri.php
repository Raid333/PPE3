<?php 
	include("head2.php");
 ?>

<div class="banner-wrap" align="center">
<?php
	$err = false;
?>
  <form method="post" action="inscription.php">
  	<table>
  		<tr>
  			<td><h1><font color="orange">Inscription</font></h1></td>
  		</tr>
  		<tr>
  			<td>Votre pseudo :

  			</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="pseudo">

  			<?php
  			if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  			if (empty($_POST['pseudo'])) {
				$err = true;
				echo "<font color=\"red\">Veuillez rentrer votre pseudo ! </font><br>";
			} else {
				$pseudo = validate_input($_POST['pseudo']);
			}
		}
		?>
		</td>
  		</tr>
  		<tr>
  			<td>Votre Email :</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="mail">
  			<?php
  			if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  					if (empty($_POST['mail'])) {
						$err = true;
						echo "<font color=\"red\">Veuillez rentrer votre mail ! </font><br>";
					} else {
						if(filter_var(validate_input($_POST['mail']), FILTER_VALIDATE_EMAIL)) {
						$mail = validate_input($_POST['mail']);
					} else {
						$err = true;
						echo "<font color=\"red\">Veuillez rentrer un mail valide ! </font><br>";
					}
				}
			}
	?>
  			</td>
  		</tr>
  		<tr>
  			<td>Votre mot de passe :</td>
  		</tr>
  		<tr>
  			<td><input type="password" name="pass">
  			<?php
  			if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  					if (empty($_POST['pass'])) {
						$err = true;
						echo "<font color=\"red\">Veuillez rentrer un mot de passe ! </font><br>";
					} else {
						$pass = sha1(validate_input($_POST['pass']));
			}
		}
	?>
  			</td>
  		</tr>
  		<tr>
  			<td><input type="submit" name="inscription" value="Inscription"></td>
  		</tr>
  		<?php
  			if($err == false && (!empty($pseudo)) && (!empty($mail)) && (!empty($pass))) {
  				header("Location:index.php");
  			} 
  		?>
  		<?php
			function validate_input( $input) {
   		 return htmlspecialchars(stripslashes(trim($input)));
		}
	?>
  	</table>
  </form>
</div>

<?php
	include("footer.php");
?>