<?php
include 'includes/header.php';
include 'includes/nav.php';

// Redirect to home.php if currently logged in
if (isset($_SESSION['login'])) {
	echo '<script>window.location.href="home.php";</script>';
}
?>

<div id="landing-page">
	<div id="hero">
		<div class="container">
			<div id="hero-detail">
				<h1 style="color: #4285f4;">Humanoid Robot Touring System</h1>
				<h3>Small Header</h3>
			</div>
		</div>
	</div>
	<div id="about">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>How It Works</h2>
				</div>
			</div>
				
			<div class="row fluid">
			<div class="about-item col-md-4 col-sm-12 col-xs-12">
					<div class="col-sm User-logo">
						<img src="img/landing_page/User.png" alt="User Logo">
					</div>
					<h3>Create an Account</h3>
					<p>Create an account and keep track of all your saved data</p>
				</div>
				<div class="about-item col-md-4 col-sm-12 col-xs-12">
					<div class="col-sm location-logo">
					<img src="img/landing_page/Location.png" alt="Location Logo">
				</div>
					<h3>Create Locations</h3>
					<p>Create locations and edit existing locations</p>
				</div>
				<div class="about-item col-md-4 col-sm-12 col-xs-12">
				<div class="col-sm touring-logo">
					<img src="img/landing_page/Touring.png" alt="Touring Logo">
				</div>
					<h3>Create Tours</h3>
					<p>Choose from a set of tour types and create new tours that can be edited at any time</p>
				</div>
				
			</div>
		</div>
	</div>
	<div id="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>Our servies</h2>
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-image">
					<img src="img/landing_page/Lock.png" alt="User Authentication Logo">
				</div>
				<div class="col-sm feature-detail">
					<h3>User Authentication</h3>
					<p>Our website has advanced user authentication security measurements that ensure your account's safety. </br>
					Creating an account also grants you access to to all your saved locations and tours with options to edit them at any time.</p>
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-detail">
					<h3>Adding Locations</h3>
					<p>You can add locations you wish to tour, which are stored in your account for ease of accessibility.
					Options to edit existing locations or adding newer locations is always available.</p>
				</div>
				<div class="col-sm feature-image">
					<img src="img/landing_page/Location_Services.png" alt="Locations Logo">
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-image">
					<img src="img/landing_page/Humanoid_Robot.png" alt="Tours Logo">
				</div>
				<div class="col-sm feature-detail">
					<h3>Tours</h3>
					<p>Choose from a set of tour types available on our website, and set a tour on the desired location you wish to tour.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>