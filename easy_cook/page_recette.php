<?php
include ('head.php');
?>
<?php
include('configuration.php');
$nomRecette = $_GET['nom_recette'];
$requeteRecette = 'SELECT * FROM recette where nom="' . $nomRecette . '"';
$rq = mysql_query($requeteRecette);
$rq = mysql_fetch_assoc($rq);
?>
<div class="page-wrap">
    <div class="panel">
        <div class="title">
            <h1><?php echo $nomRecette; ?></h1>
            <div class="content"> <img src="images/<?php echo $rq['photo']; ?>" height="200px" width="200px" alt="" />
                <h2><?php echo $rq['type']; ?></h2>
            </div>

            <p><?php echo $rq ['description']; ?><br/>
                <br/>
            </p>

        </div>
    </div>
</div>



<?php
include ('footer.php');
?>