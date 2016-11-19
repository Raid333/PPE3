<?php 
include("head2.php");
?>


<div class="banner-wrap" align="center">
<!--
    <form action="verif_conn.php" method="post">
        <table>
            <tr>
                <td>Pseudo</td> 
                <td> <input type="text" name="pseudo"></td> 
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td><input type="password" name="passe"></td>  
            </tr>
            <tr>
                <td><input type="submit" name="envoyer"></td>
            </tr>
        </table>
    </form>
-->
<form action="verif_conn.php" method="post">
  <h2><span></span> Connexion </h2>
  <span> </span>
  <input type="text" placeholder="Pseudo" name="pseudo"/>
  <span></span>
  <input type="password" placeholder="Mot de passe" name="passe"/>
  <input type="submit"/>
</form>
</div>

<?php
include("footer.php");
?>