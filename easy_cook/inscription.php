<?php 
include("head2.php");
?>
<div class="banner-wrap" align="center">
<form action="verif_inscri.php" method="post">
  <h2><span></span> Inscription </h2>
  <br><br>
  <input type="text" placeholder="Pseudo" name="pseudo"/>
  <br><br>
  <input type="text" placeholder="Email" name="mail"/>
  <br><br>
  <input type="password" placeholder="Mot de passe" name="passe"/>
  <br>
  <input type="submit" value="Valider"/>
</form>
</div>
<?php
	include("footer.php");
?>