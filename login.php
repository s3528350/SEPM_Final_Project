<?php
$title = 'Log In';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

$form_input_error = false;
$login_fail_error = false;

// Receive input from client side
if (isset($_POST['email'], $_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Prepare error message triggers


	// Verify email uniqueness
	if (isset($_POST['submit'])) {
		// Validate form inputs are not empty
		if ($email == NULL || $password == NULL) {
			$form_input_error = true;
		} else {
			// Search datastore to check login credentials
			$q = "select email, password from users where email = '$email' && password = SHA('$password')";
			$result = mysqli_query($db, $q);
			if ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['login'] = $email;
				echo '<script>window.location.href="home.php";</script>';
			} else {
				// Trigger error alert for email not existing
				$login_fail_error = true;
			}
		}
	}
}
?>

<div class="container" id="main-container">
	<div id="login">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-9 col-lg-6">
				<form class="content-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<h1 class="text-center">Log in</h1>
					<?php
					// Display error message if form is missing inputs
					if ($form_input_error == true)
						echo '<div class="alert alert-warning" role="alert">You have not completed filling the login form.</div>';
					// Display error message if login fails
					elseif ($login_fail_error == true)
						echo '<div class="alert alert-danger" role="alert">Your details were incorrect and we could not log you in. Please try again.</div>';
					?>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Log in">
					</div>
				</form>
				<div class="text-center">
					<p>Not a member? <a href="signup.php">Sign up now</a>.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>