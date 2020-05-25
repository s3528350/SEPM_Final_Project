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
				<h1>Header</h1>
				<h3>Small Header</h3>
			</div>
			<a class="btn btn-lg btn-primary" href="signup.php">Signup </a>
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
					<i class="fas fa-file-image fa-4x"></i>
					<h3>Create Locations</h3>
					<p>Lorem ipsum text</p>
				</div>
				<div class="about-item col-md-4 col-sm-12 col-xs-12">
					<i class="fas fa-cloud-upload-alt fa-4x"></i>
					<h3>Create Tours</h3>
					<p>Lorem ipsum text</p>
				</div>
				<div class="about-item col-md-4 col-sm-12 col-xs-12">
					<i class="fas fa-globe-americas fa-4x"></i>
					<h3>Another Header</h3>
					<p>Lorem ipsum text</p>
				</div>
			</div>
		</div>
	</div>
	<div id="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2>Explain what we do</h2>
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-image">
					<img src="/img/landing_page/app_engine.svg" alt="Google App Engine Logo">
				</div>
				<div class="col-sm feature-detail">
					<h3>Service 1</h3>
					<p>Lorem ipsum text</p>
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-detail">
					<h3>Service 2</h3>
					<p>Lorem ipsum text</p>
				</div>
				<div class="col-sm feature-image">
					<img src="/img/landing_page/cloud_datastore.svg" alt="Google Cloud Datastore Logo">
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-image">
					<img src="/img/landing_page/cloud_sql.svg" alt="Google Cloud SQL Logo">
				</div>
				<div class="col-sm feature-detail">
					<h3>Service 3</h3>
					<p>Lorem ipsum text</p>
				</div>
			</div>
			<div class="row feature-row">
				<div class="col-sm feature-detail">
					<h3>Service 4</h3>
					<p>Lorem ipsum text</p>
				</div>
				<div class="col-sm feature-image">
					<img src="/img/landing_page/cloud_storage.svg" alt="Google Cloud Storage API Logo">
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>