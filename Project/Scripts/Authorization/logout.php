<?php
	session_start();
	session_destroy();
	header("Location: my_login.php");
?>