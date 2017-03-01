<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Easy Cook - Accueil</title>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
<link rel="icon" href="../images/icon.ico" />

<link rel="stylesheet" href="../css/superfish.css" media="screen">
<script src="../js/jquery-1.9.0.min.js"></script>
<script src="../js/hoverIntent.js"></script>
<script src="../js/superfish.js"></script>
<script>

		// initialise plugins
		jQuery(function(){
			jQuery('#example').superfish({
				//useClick: true
			});
		});

		</script>

</head>
<body>
<?php
  include('../include/head.php');
?>

<div class="clear"></div>
<div class="banner-wrap">
  <div class="banner"> <img src="../images/banner1.jpg" alt="banner" /> </div>

</div>
<center><h2>Recettes du moment :</h2></center>
<?php

//for ($i = 0;$i < 3; $i++) {
//    $sql = "SELECT * FROM recette WHERE id=";
//    $rq = mysql_query($sql);
 //   $tab = mysql_fetch_assoc($rq);
  //  echo $tab[$i] .  "<br>";
//}
?>
<div class="page-wrap">
  <div class="wrap">
      <div class="panel">
          <div class="title">
              <h1>Lorem ipsum dolor sit amet, consectetur adip isonsequat </h1>
              <h2>Nulla elit est, commodo id ultrices et, sollicitudin a odioras tortor ante, placerat at posuer</h2>
          </div>
          <div class="content"> <img src="../images/image1.jpg" alt="" />
              <p>Mnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt.<br />
                  <br />
              </p>
              <p>Eque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam. </p>
              <div class="button floatLeft"><a href="#">More</a></div>
          </div>
      </div>
      <div class="panel">
          <div class="title">
              <h1>Lorem ipsum dolor sit amet, consectetur adip isonsequat </h1>
              <h2>Nulla elit est, commodo id ultrices et, sollicitudin a odioras tortor ante, placerat at posuer</h2>
          </div>
          <div class="content"> <img src="../images/image1.jpg" alt="" />
              <p>Mnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt.<br />
                  <br />
              </p>
              <p>Eque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam. </p>
              <div class="button floatLeft"><a href="#">More</a></div>
          </div>
      </div>
    </div>






</div>
<?php
  include("../include/footer.php");
?>