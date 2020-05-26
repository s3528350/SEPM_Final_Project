<?php
	// Redirect to home.php if currently logged in
	if(isset($_SESSION['login']))
		echo '<script>window.location.href="home.php";</script>';
?>

<div class="container justify-content-center">
	<a class="navbar-brand" href="/"><img src="img/layouts/logo.png" alt="Gallery Logo"></a>
</div>
</header>
