<?php

$db = @mysql_connect("localhost", "root", "") or die('Error ' . $base . ' : ' . mysql_error());
mysql_select_db('base_beta_ec',$db);

?>