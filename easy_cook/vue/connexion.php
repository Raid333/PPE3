<?php 
include("../include/head2.php");
?>
<?php
session_start();
$_SESSION['verif_c'] = 1;
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
<form action="../traitement/verif_conn.php" method="post">
  <h2><span></span> Connexion </h2>
  <span> </span>
  <input type="text" placeholder="Pseudo" name="pseudo" required/>
  <span></span>
  <input type="password" placeholder="Mot de passe" name="passe" required/>
  <input type="submit"/>
</form>
</div>

<?php
include("../include/footer.php");
?>