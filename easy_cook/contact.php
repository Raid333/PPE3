<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Easy-Cook</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
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
  include("head.php");
?>
<div class="page">
  <div class="panel">
      <div class="title">
        <h1>Contact</h1>
       <h2>Pour nous contacter, poser une question :</h2>
      </div>
      <div class="content">
        <form>
          <div class="contact-form mar-top30">
            <label> <span>Nom</span>
            <input type="text" class="input_text" name="name" id="name"/>
            </label>
            <label> <span>Email</span>
            <input type="text" class="input_text" name="email" id="email"/>
            </label>
            <label> <span>Objet</span>
            <input type="text" class="input_text" name="subject" id="subject"/>
            </label>
            <label> <span>Message</span>
            <textarea class="message" name="feedback" id="feedback"></textarea>
            <input type="button" class="button" value="Valider" />
            </label>
          </div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
</div>
<?php 
  include("footer.php");
 ?>