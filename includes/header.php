<?php
	// Require app configuration file
	require __DIR__ . '/../app.php';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php if(empty($title)){echo $app_name;}else{echo $title." | ".$app_name;}; ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
	<header class="navbar navbar-expand-md navbar-light">
