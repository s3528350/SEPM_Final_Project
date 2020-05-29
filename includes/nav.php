<div class="container">
	<?php
		// Display the following when logged in as root or admin user
	if (isset($_SESSION['admin']) || isset($_SESSION['root'])) {
	?>
		<a class="navbar-brand mr-auto" href="/assignment2-sepm/"><img src="img/layouts/logo.png" alt="Humanoid Logo"></a>
		<ul class="navbar-nav flex-row">
			<li><a class="btn btn-light mr-2" href="adminPanel.php">Admin Panel</a></li>
			<li><a class="btn btn-danger" href="logout.php">Log out</a></li>
		</ul>
	<?php
		// Display the following when logged in as assistant user
	} else if (isset($_SESSION['assistant'])) {
	?>
		<a class="navbar-brand mr-auto" href="/assignment2-sepm/"><img src="img/layouts/logo.png" alt="Humanoid Logo"></a>
		<ul class="navbar-nav flex-row">
			<li><a class="btn btn-light mr-2" href="memberPanel.php">Members Panel</a></li>
			<li><a class="btn btn-danger" href="logout.php">Log out</a></li>
		</ul>
	<?php
		// Otherwise display the following when not logged in
	} else {
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
	<?php } ?>
</div>
</header>