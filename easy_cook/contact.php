<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TMPS00042</title>
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
       <h2>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.</h2>
      </div>
      <div class="content">
        <form>
          <div class="contact-form mar-top30">
            <label> <span>Full name</span>
            <input type="text" class="input_text" name="name" id="name"/>
            </label>
            <label> <span>Email</span>
            <input type="text" class="input_text" name="email" id="email"/>
            </label>
            <label> <span>Subject</span>
            <input type="text" class="input_text" name="subject" id="subject"/>
            </label>
            <label> <span>Message</span>
            <textarea class="message" name="feedback" id="feedback"></textarea>
            <input type="button" class="button" value="Submit " />
            </label>
          </div>
        </form>
        <div class="address">
          <div class="panel">
            <div class="title">
              <h1>Address - 01</h1>
            </div>
            <div class="content">
              <p>Block No:5, Some where Road,<br />
                City name, State, Country name</p>
              <p class="padTop"><span>Phone :</span> 000 888 88888</p>
              <p><span>Email :</span> <a href="mailto:info@companyname.com">info@companyname.com</a></p>
            </div>
          </div>
        </div>
        <div class="address">
        	<div class="panel ">
            <div class="title">
              <h1>Address - 02</h1>
            </div>
            <div class="content">
              <p>Block No:5, Some where Road,<br />
                City name, State, Country name</p>
              <p class="padTop"><span>Phone :</span> 000 888 88888</p>
              <p><span>Email :</span> <a href="mailto:info@companyname.com">info@companyname.com</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
</div>
<?php 
  include("footer.php");
 ?>