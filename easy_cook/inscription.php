<?php 
include("head2.php");
?>
<?php
session_start();

?>
<div class="banner-wrap" align="center">
    <form action="verif_inscri.php" method="post">
        <h2><span></span> Inscription </h2>
        <br><br>
        <input type="text" placeholder="Pseudo" name="pseudo" required/>
        <br><br>
        <input type="text" placeholder="Email" name="mail" required/>
        <br><br>
        <input type="password" placeholder="Mot de passe" name="passe" required/>
        <br>
        Vous êtes ?
        <select name="type">
            <option value="..."></option>
            <option value="utilisateur">Utilisateur</option>
            <option value="cuisinier">Cuisinier</option>
        </select>
        <br>
        <input type="submit" value="Valider"/>
    </form>
</div>
<?php
include("footer.php");
?>