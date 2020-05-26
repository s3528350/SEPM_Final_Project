<?php
	$mysql_username = "root";
	$mysql_password = "Rmit1234";
	$mysql_db_name = "humanoid";
	$table_user = "user";
	$table_location = "location";

	$app_name = 'Humanoid';

	// Instantiate and verify SQL db connection
	$db = mysqli_connect(null,$mysql_username,$mysql_password,$mysql_db_name);
	if(!$db)
		die(mysqli_connect_error());

	// Check to keep current session active
	if(!isset($_SESSION)){
		session_start();
	}
?>
