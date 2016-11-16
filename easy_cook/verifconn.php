<?php

	if (!empty($_POST['pseudo'])) {
		session_start();
        $_SESSION['login'] = $_POST['pseudo'];
        header('Location:index.php');
	}
?>