<?php
$title = 'Add Tour';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

// Prepare error message triggers
$form_input_error = false;
$tour_exists_error = false;

//user input from html form
if (isset($_POST['type'])) {
	$type = $_POST['type'];

	//if submit button is pressed
	if (isset($_POST['submit'])) {
		// Validate form inputs are not empty
		if ($type == NULL) {
			$form_input_error = true;
		}
		else {
			$q = "insert into $table_tour_type values(null,'$type',now(),now())";
			mysqli_query($db, $q) or die(mysqli_error($db));
			echo '<script>window.location.href="/assignment2-sepm/memberPanel.php";</script>';
		}
	}
}
?>

<div class="container" id="main-container">
	<div id="signup">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-9 col-lg-6">
				<form class="content-form" action="add_tour_type.php" method="post">
					<h1 class="text-center">Add a Tour Type</h1>
					<?php
					// Display error message if form is missing inputs
					if ($form_input_error == true)
						echo '<div class="alert alert-warning" role="alert">You have not completely filled the form.</div>';
					// Display error message if location exists
					elseif ($tour_exists_error == true)
						echo '<div class="alert alert-warning" role="alert">Location Already Exists</div>';
					?>
					<div class="form-group">
						<input type="text" class="form-control" name="type" id="name" placeholder="Tour Type" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Add Tour Type">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>