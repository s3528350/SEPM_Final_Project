<?php
$title = 'Sign Up';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

// Prepare error message triggers
$form_input_error = false;
$password_match_error = false;
$email_exists_error = false;
$password_requirements_error = false;
$email_requirements_error = false;

//user input from html form
if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirmation = $_POST['confirmPassword'];
	$rights = $_POST['rights'];

	//Check password strength
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	//Check email validation
	$validateEmail = preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);

	//if submit button is pressed
	if (isset($_POST['submit'])) {
		// Validate form inputs are not empty
		if ($fname == NULL || $lname == NULL || $email == NULL || $password == NULL || $password_confirmation == NULL) {
			$form_input_error = true;
		}
		// checking if both passwords match
		elseif ($password != $password_confirmation) {
			$password_match_error = true;

			// check if password meets requirements
		} elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
			$password_requirements_error = true;
		} elseif (!$validateEmail) {
			$email_requirements_error = true;
		} else {
			// Search database for email existence
			$q = "select email from $table_user where email = '$email'";
			$result = mysqli_query($db, $q);
			if ($row = mysqli_fetch_assoc($result)) {
				// Trigger error alert for email existing in database
				$email_exists_error = true;
			} else {
				$q = "insert into $table_user values(null,'$fname','$lname','$email',SHA('$password'),SHA('$password_confirmation'),'$rights',now(),now())";
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
				<form class="content-form" action="signup.php" method="post">
					<h1 class="text-center">Create an account</h1>
					<?php
					// Display error message if form is missing inputs
					if ($form_input_error == true)
						echo '<div class="alert alert-warning" role="alert">You have not completely filled the signup form.</div>';
					// Display error message if passwords do not match
					elseif ($password_match_error == true)
						echo '<div class="alert alert-danger" role="alert">Those passwords did not match. Please try again.</div>';
					// Display error message if email was found in database
					elseif ($email_exists_error == true)
						echo '<div class="alert alert-warning" role="alert">The email you have entered currently belongs to an account. Please try another email.</div>';
					// Display error message if password does not meet requirements
					elseif ($password_requirements_error == true)
						echo '<div class="alert alert-warning" role="alert">Please include an uppercase and lowercase letter and a number and a special character and make sure your password is atleast 8 digits long</div>';
					elseif ($email_requirements_error == true)
						echo '<div class="alert alert-warning" role="alert">Please use a valid email address</div>';
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
						<select class="form-control" id="exampleSelect1" name="rights">
							<option value='admin'>Admin</option>
							<option value='assistant'>Assistant</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Sign up">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>