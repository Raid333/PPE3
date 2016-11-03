<?php 
	include("head2.php");
 ?>

<div class="banner-wrap" align="center">
  <form method="post" action="head.php">
  	<table>
  		<tr>
  			<td><h1>Inscription</h1></td>
  		</tr>
  		<tr>
  			<td>Votre pseudo :</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="pseudo"></td>
  		</tr>
  		<tr>
  			<td>Votre Email :</td>
  		</tr>
  		<tr>
  			<td><input type="text" name="mail"></td>
  		</tr>
  		<tr>
  			<td>Votre mot de passe :</td>
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
	include("footer.php");
?>