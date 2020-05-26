<?php
	$title = 'Add Location';
	include 'includes/header.php';
	include 'includes/login_signup_nav.php';
	
	// Prepare error message triggers
	$form_input_error = false;
	$location_exists_error = false;

	//user input from html form
if(isset($_POST['name'],$_POST['description'],$_POST['longitude'],$_POST['latitude'],$_POST['minTimeSpent'])){
	$name = $_POST['name'];
	$description = $_POST['description'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$minTimeSpent = $_POST['minTimeSpent'];

	//if submit button is pressed
	if(isset($_POST['submit'])){
		// Validate form inputs are not empty
		if($name == NULL || $description == NULL || $longitude == NULL || $latitude == NULL || $minTimeSpent == NULL) {
			$form_input_error = true;
        } 
		else {
			// Search database for location existence
			$q = "select id from $table_location where name = '$name' || longitude = '$longitude' && latitude = '$latitude'";
            $result = mysqli_query($db, $q);
			if($row = mysqli_fetch_assoc($result)){
				// Trigger error alert for email existing in database
				$location_exists_error = true;
			}
			else {
				$q = "insert into $table_location values(null,'$name','$description','$longitude','$latitude','$minTimeSpent',null,now())";
				mysqli_query($db, $q) or die(mysqli_error($db));
				echo '<script>window.location.href="/assignment2-sepm/adminPanel.php";</script>';
			}
		}
}
}
?>

<div class="container" id="main-container">
	<div id="signup">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-9 col-lg-6">
				<form class="content-form" action="add_location.php" method="post">
					<h1 class="text-center">Create an account</h1>
					<?php
						// Display error message if form is missing inputs
						if($form_input_error == true)
							echo '<div class="alert alert-warning" role="alert">You have not completely filled the form.</div>';
						// Display error message if location exists
						elseif($location_exists_error == true)
							echo '<div class="alert alert-warning" role="alert">Location Already Exists</div>';
					?>
					<div class="form-group">
						<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="required">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="description" id="description" placeholder="Description" required="required">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" required="required">
                    </div>
                    <div class="form-group">
						<input type="text" class="form-control" name="latitude" id="latitude" placeholder="Longitude" required="required">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="minTimeSpent" id="minTimeSpent" placeholder="Minimum time spent" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up">
					</div>
				</form>
				<div class="text-center">
					<p>Already have an account? <a href="login.php">Login here</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>