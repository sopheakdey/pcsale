<?php
	session_start();
	session_destroy();
	header("Location: login.php?page=login");
	exit();
?>