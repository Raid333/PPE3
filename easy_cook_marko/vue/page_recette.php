<?php
include('../include/head.php');
?>
<title>Recette : <?php echo $nomRecette; ?></title>
<?php
include('../include/configuration.php');
$id_recette = $_GET['id_recette'];
$requeteRecette = 'SELECT * FROM recette where id="' . $id_recette . '"';
$rq = mysql_query($requeteRecette);
$rq = mysql_fetch_assoc($rq);
?>
<div class="page-wrap">
    <div class="panel">
        <div class="title">
            <h1><?php echo $rq['nom']; ?></h1>
            <div class="content"> <img src="../images/<?php echo $rq['photo']; ?>" height="200px" width="200px" alt="" />
                <h2><?php echo $rq['type']; ?></h2>
            </div>

            <p><?php echo $rq ['description']; ?><br/>
                <br/>
            </p>

        </div>
    </div>
</div>



<?php
include('../include/footer.php');
?>