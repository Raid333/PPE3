<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Easy Cook - Compte</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/superfish.css" media="screen">
    <script src="../js/jquery-1.9.0.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.js"></script>
    <script>

        // initialise plugins
        jQuery(function () {
            jQuery('#example').superfish({
                //useClick: true
            });
        });

    </script>

</head>
<body>
<?php
$verification = $_POST['verification'];
if ($verification == "1") {
    include('../include/configuration.php');

    session_start();

// recup des valeurs
    $name = validate_input($_POST['nom']);
    $type = validate_input($_POST['type']);
    $description = validate_input($_POST['description']);
    $name_utilisateur = $_SESSION["pseudo"];

    $tabverif = mysql_fetch_assoc(mysql_query ('SELECT nom FROM recette WHERE nom="'. $name .'"'));


    if ($tabverif['nom'] == $name) {
        ?>

        <div class="page-wrap">
        <div class="page">
            <div class="panel">
                <div class="title">
                    <h1>La recette "<?= $name; ?>" est déjà présente</h1>

        <br><br>
        <h2><a href="../vue/index.php">Retour</a></h2>
        </div>
        </div>
    <?php
    }else {

    $codeErreur = $_FILES['photo'] ['error'];


    $photo = $_FILES['photo'];

    copy($photo['tmp_name'], "../images/" . $photo['name']);
    $rq = mysql_query('INSERT INTO recette (nom, type, photo, description, name_utilisateur) VALUES ("' . $name . '","' . $type . '","' . $photo['name'] . '","' . $description . '", "' . $name_utilisateur . '")');


    ?>
            <div class="page-wrap">
                <div class="page">
                    <div class="panel">
                        <div class="title">
                            <h1>Votre recette a bien été ajouté ! </h1>
                            <h2>Récapitulatif :</h2>
                            <br>
                            <img src="../images/<?php echo $photo['name']; ?>" alt="<?php echo $photo['name']; ?>"
                                 width="100"
                                 height="125">
                            <br><br>
                            Nom : <?php echo $name; ?>
                            <br><br>
                            Type : <?php echo $type; ?>
                            <br><br>
                            Description : <?php echo $description; ?>
                            <br><br>
                            <h2><a href="../vue/index.php">Retour</a></h2>
                        </div>
                    </div>

<?php
}}
function validate_input($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}

include("../include/footer.php");
?>