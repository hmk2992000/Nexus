<?php
	session_start();
	unset($_SESSION['useradmin']);
	header("location: login.php");
?>