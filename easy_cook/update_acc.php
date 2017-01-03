<?php
include("head.php");
?>
<div class="banner-wrap" align="center">
    <?php
    $db = @mysql_connect("localhost", "root", "") or die('Error ' . $base . ' : ' . mysql_error());
    mysql_select_db('base_beta_ec',$db);

    $typeValid = $_POST['valid'];

    $pseudoSession = $_SESSION['pseudo'];

    if ($typeValid == "Envoyer Mail") {
        $NewMail = $_POST['newMail'];
        $sqlNewMail = 'UPDATE utilisateur set mail = "'. $NewMail .'" WHERE pseudo = "'. $pseudoSession .'"';
        $rs = mysql_query($sqlNewMail) or exit(mysql_error);
        echo '<br><p style="color:white">Changement d\'email effectué</p>';
        echo '<p style="color:white">Nouveau Mail : ' . $NewMail . "<br>";
    } else if ($typeValid == "Envoyer mot de passe") {
        $NewPass = $_POST['newPassword'];
        $NewPass2 = $_POST['newPassword2'];
        if ($NewPass == $NewPass2) {
            $cryptage = sha1($NewPass);
            $sqlNewPass = 'UPDATE utilisateur set passe = "'. $cryptage .'"  WHERE pseudo = "'. $pseudoSession .'"';
            $rs = mysql_query($sqlNewPass) or exit(mysql_error);
            echo '<br><p style="color:white">Changement de mot de passe effectué</p>';
            echo '<p style="color:white">Nouveau mot de passe : ' . $NewPass . "<br>";
        } else {
            echo '<br><p style="color:red">Mot de passe non identique !</p>';
        }
    } else {
        header("Location:index.php");
    }

    ?>
</div>
<?php
include("footer.php");
?>