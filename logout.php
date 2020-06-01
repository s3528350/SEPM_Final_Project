<?php
	session_start();
	unset($_SESSION['admin']);
	unset($_SESSION['assistant']);
	unset($_SESSION['root']);
	header('Location: index.php');
?>
