<?php
	$title = 'Sign Up';
	include 'includes/header.php';
	include 'includes/login_signup_nav.php';
	// SIGNUP FORM
	// Receive input from client side
	$form_input_error = false;
	$password_match_error = false;
	$email_exists_error = false;
if(isset($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password'],$_POST['confirmPassword'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirmation = $_POST['confirmPassword'];

	// Prepare error message triggers

	
	// Verify email uniqueness
	if(isset($_POST['submit'])){
		// Validate form inputs are not empty
		if($fname == NULL || $lname == NULL || $email == NULL || $password == NULL || $password_confirmation == NULL) {
			$form_input_error = true;
		} elseif($password != $password_confirmation) {
			$password_match_error = true;
		} else {
			// Search datastore for if email input exists
			$q = "select email from users where email = '$email'";
            $result = mysqli_query($db, $q);
			if($row = mysqli_fetch_assoc($result)){
				// Trigger error alert for email existing in datastore
				$email_exists_error = true;
			}
			else {
				$q = "insert into users values(null,'$fname','$lname','$email',SHA('$password'),SHA('$password_confirmation'))";
				mysqli_query($db, $q) or die(mysqli_error($db));
				// Start a new session and redirect to home.php
				$_SESSION['login'] = $email;
				echo '<script>window.location.href="home.php";</script>';
			}
		}
}
}
?>

<div class="container" id="main-container">
	<div id="signup">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-9 col-lg-6">
				<form class="content-form" action="signup.php" method="post">
					<h1 class="text-center">Create an account</h1>
					<?php
						// Display error message if form is missing inputs
						if($form_input_error == true)
							echo '<div class="alert alert-warning" role="alert">You have not completely filled the signup form.</div>';
						// Display error message if passwords do not match
						elseif($password_match_error == true)
							echo '<div class="alert alert-danger" role="alert">Those passwords did not match. Please try again.</div>';
						// Display error message if email was found in datastore
						elseif($email_exists_error == true)
							echo '<div class="alert alert-warning" role="alert">The email you have entered currently belongs to an account. Please try another email.</div>';
					?>
					<div class="form-group">
						<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required="required">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required="required">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up">
					</div>
				</form>
				<div class="text-center">
					<p>Already have an account? <a href="login">Login here</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>