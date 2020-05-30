<?php
$title = 'Add Tour';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

// Prepare error message triggers
$form_input_error = false;
$tour_exists_error = false;

//user input from html form
if (isset($_POST['name'], $_POST['type'], $_POST['min_duration'])) {
	$name = $_POST['name'];
	$type = $_POST['type'];
	$min_duration = $_POST['min_duration'];

	//if submit button is pressed
	if (isset($_POST['submit'])) {
		// Validate form inputs are not empty
		if ($name == NULL || $type == NULL || $min_duration == NULL) {
			$form_input_error = true;
		}
		// else {
		// 	// Search database for location existence
		// 	$q = "select id from $table_tour where name = '$name' || type = '$type' || min_duration = '$min_duration'";
		//     $result = mysqli_query($db, $q);
		// 	if($row = mysqli_fetch_assoc($result)){
		// 		// Trigger error alert for email existing in database
		// 		$tour_exists_error = true;
		// 	}
		else {
			$q = "insert into $table_tour values(null,'$name','$type','$min_duration',now(),now())";
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
				<form class="content-form" action="add_tour.php" method="post">
					<h1 class="text-center">Add a Tour</h1>
					<?php
					// Display error message if form is missing inputs
					if ($form_input_error == true)
						echo '<div class="alert alert-warning" role="alert">You have not completely filled the form.</div>';
					// Display error message if location exists
					elseif ($tour_exists_error == true)
						echo '<div class="alert alert-warning" role="alert">Location Already Exists</div>';
					?>
					<div class="form-group">
						<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="required">
					</div>
					<div class="form-group">
					<select id="menu" class="form-control" name="type" onchange="navigate();">
						<option value="#">Select Tour Type..</option>
						<?php
						$q = "select distinct type from $table_tour_type";
						$results = mysqli_query($db, $q) or die(mysqli_error($db));

						while ($row = mysqli_fetch_array($results)) {

							print "<option value= {$row['type']}>{$row['type']}</option>";
						}
						?>
					</select>

					</div>
					<div class="form-group">
					<select id="menu" class="form-control" name="type" onchange="navigate();">
						<option value="#">Select Location</option>
						<?php
						$q = "select distinct name from $table_location";
						$results = mysqli_query($db, $q) or die(mysqli_error($db));

						while ($row = mysqli_fetch_array($results)) {

							print "<option value= {$row['name']}>{$row['name']}</option>";
						}
						?>
					</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="min_duration" id="min_duration" placeholder="Minimum Duration" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Add Tour">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>