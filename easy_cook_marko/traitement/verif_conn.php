<?php 
include("../include/head2.php");
?>


<div class="banner-wrap" align="center">
<?php
//session_start();
//$pseudo = $_POST['pseudo'];
//$passe = $_POST['passe'];
// $_SESSION['pseudo'] = $_POST['pseudo'];
//$tab = array(
//'pseudo' => $pseudo,
//'passe' => $passe);
//
//try {
//    $bdd = new PDO('mysql:host=localhost;dbname=base_beta_ec', 'root', '');
//} catch (Exception $e) {
//    die("Problème lors de la connexion à la base de donnée" . $e->getMessage());
//}
//if (empty($pseudo) || empty($passe)) {
//    echo "Veuillez remplir tous les champs de connexion";
//    echo '<a href="connexion.php">Revenir à la page de connexion</a>';
//} else {
//    $requette = "SELECT COUNT(*) FROM utilisateur WHERE pseudo=':pseudo' AND passe=':passe'";
//    $sql = $bdd->prepare($requette);
//    $sql->execute($tab);
//    if ($sql['COUNT(*)'] == 1) 
//        header("Location:index.php");
//    
//}

session_start();
if ($_SESSION['verif_c'] != 1) {
    header('Location:../vue/connexion.php');
}else {
//Récupération des données rentrée par l'utilisateur
$_SESSION["pseudo"]=$_POST["pseudo"];
$_SESSION["passe"]=$_POST["passe"];

$pseudo = $_POST['pseudo'];
$passe = $_POST['passe'];
$cryptage = sha1($passe);

//Connexion à la base de donnée
try {$bdd = new PDO('mysql:host=localhost;dbname=base_beta_ec', 'root', '');}
catch (Exception $e) {die("L'accès à la base de donnée est impossible.");}
  

$requettePseudo = $bdd->query("SELECT pseudo FROM utilisateur WHERE pseudo='$pseudo'");
$requettePasse = $bdd->query("SELECT pseudo FROM utilisateur WHERE passe='$cryptage'");

$check_pseudo = $requettePseudo->fetch(PDO::FETCH_BOUND);
$check_passe = $requettePasse->fetch(PDO::FETCH_BOUND);

if ($check_pseudo == 'TRUE' && $check_passe == 'TRUE') {
    $_SESSION['log'] = 1;
    header('Location:../vue/index.php');
    
}else {
    echo  '<p style="color:red"> pseudo et/ou mot de passe non reconnu </p>' ;
    echo '<a style="color:red" href="../vue/connexion.php">Retour à la connexion</a>';
    session_destroy();
}
//Si les champs sont remplis, une requette est envoyé à la base de donnée pour vérifier si le compte existe bien
//if(($_SESSION["pseudo"] == "") or($_SESSION['passe'] == "")) {
//    echo "veuillez saisir un login et un mot de passe" . "<br>";
//    echo '<a href="connexion.php">Revenir à la page de connexion</a>';
//}
//else {
//        $st = $bdd->query("SELECT COUNT(*) FROM administrateur WHERE pseudo='".$_SESSION["pseudo"]."' AND password='".$_SESSION["passe"]."'");
//    }
    
//    if ($st['COUNT(*)'] == 1)
//        header("Location:index.php");

}
?>
</div>
<?php
include("../include/footer.php");
?>