<?php
	$title = 'Home';
	include 'includes/header.php';
	include 'includes/nav.php';

	// Redirect to home.php if currently logged in
	if(!isset($_SESSION['login'])){
		echo '<script>window.location.href="home.php";</script>';
	}
?>

<div class="container" id="main-container">
	<div id="home">
		<div class="row justify-content-center">
			<?php echo "[HOME CONTENT]";		
			?>
		</div>
	</div>
</div>
