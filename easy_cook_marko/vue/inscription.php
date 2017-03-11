<?php 
include("../include/head2.php");
?>
<?php
session_start();

?>
<div class="banner-wrap" align="center">
    <form action="../traitement/verif_inscri.php" method="post">
        <h3><span></span> Inscription </h3>
        <br><br>
        <input type="text" placeholder="Pseudo" name="pseudo" required/>
        <br><br>
        <input type="text" placeholder="Email" name="mail" required/>
        <br><br>
        <input type="password" placeholder="Mot de passe" name="passe" required/>
        <br>
        <h3>Vous êtes ?</h3>
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
include("../include/footer.php");
?>