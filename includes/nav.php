<div class="container">
	<?php
		// Display the following when logged in
		if(isset($_SESSION['login'])):
	?>
	<a class="navbar-brand mr-auto" href="home.php"><img src="img/layouts/logo.png" alt="Humanoid Logo"></a>
	<ul class="navbar-nav flex-row">
		<li><a class="btn btn-danger" href="logout.php">Log out</a></li>
	</ul>
	<?php
		// Otherwise display the following when not logged in
		else:
	?>
	<a class="navbar-brand" href="/assignment2-sepm/"><img src="img/layouts/logo.png" alt="Humanoid Logo"></a>
	<a class="btn btn-light d-md-none ml-auto mr-3" href="login">Log in</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerNav" aria-controls="headerNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="headerNav">
		<ul class="navbar-nav mr-auto">
			<li><a class="btn btn-block btn-light mr-2" href="#about">About</a></li>
			<li><a class="btn btn-block btn-light mr-2" href="#features">Services</a></li>
		</ul>
		<ul class="navbar-nav">
			<li><a class="btn btn-block btn-primary" href="login.php">Login</a></li>
		</ul>
	</div>
	<?php endif; ?>
</div>
</header>