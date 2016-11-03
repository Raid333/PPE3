<?php 
	include("head2.php");
 ?>


<div class="banner-wrap" align="center">
  <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="post">
  <?php $err = " "; ?>
  	<table>
  		<tr>
  			<td><h1>Connexion</h1></td>
  		</tr>
  		<tr>
  			<td>Pseudo :</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="pseudo"></td>
  		</tr>
  		<tr>
  			<td>Mot de passe :</td>
  		</tr>
  		<tr>
  			<td><input type="password" name="pass"></td>
  		</tr>
  		<tr>
  			<td><input type="submit" name="envoi"></td>
  		</tr>
  		
  	</table>
  </form>
</div>
<?php
	if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
		header ('Location:index.php');
	}else {
		$err = "Veuillez bien rentrer vos identifiants";
	}
?>
<?php echo $err; ?>
<?php
	include("footer.php");
?>