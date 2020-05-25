<?php
	session_start();
	unset($_SESSION['login']);
	header('Location: /assignment2-sepm/');
?>
