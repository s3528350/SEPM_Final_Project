<?php
$title = 'Log In';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

$form_input_error = false;
$login_fail_error = false;
$email_requirements_error = false;

// Receive input from client side
if (isset($_POST['email'], $_POST['password'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	//valide email
	$validateEmail = preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);

	// Verify email uniqueness
	if (isset($_POST['submit'])) {
		// Validate form inputs are not empty
		if ($email == NULL || $password == NULL) {
			$form_input_error = true;
		} else {
			$q = "select * from $table_user where email = '$email' && password = SHA('$password')";
			$result = mysqli_query($db, $q);
			$usertype = mysqli_fetch_assoc($result);
			if ($usertype['rights'] == "root") {
				$_SESSION['root'] = $email;
				header('Location: adminPanel.php');
			} 
			else if ($usertype['rights'] == "assistant") {
				$_SESSION['assistant'] = $email;
				header('Location: index.php');
			}
			else if ($usertype['rights'] == "admin") {
				$_SESSION['admin'] = $email;
				header('Location: index.php');
			}
			if (!isset($usertype)) {
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
				<form class="content-form" action="login.php" method="post">
					<h1 class="text-center">Log in</h1>
					<?php
					// Display error message if form is missing inputs
					if ($form_input_error == true)
						echo '<div class="alert alert-warning" role="alert">You have not completed filling the login form.</div>';
					// Display error message if login fails
					elseif ($login_fail_error == true)
						echo '<div class="alert alert-danger" role="alert">Your details were incorrect and we could not log you in. Please try again.</div>';
					elseif ($email_requirements_error == true)
						echo '<div class="alert alert-warning" role="alert">Please use a valid email address</div>';
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
			</div>
		</div>
	</div>
</div>
</body>

</html>