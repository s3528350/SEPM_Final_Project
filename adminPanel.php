<?php
$title = 'Admin Panel';
include 'includes/header.php';
include 'includes/login_signup_nav.php';

// Prepare error message triggers
$form_input_error = false;
$password_match_error = false;
$email_exists_error = false;
$password_requirements_error = false;
$email_requirements_error = false;

$user_deleted = false;

//user input from html form
if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirmation = $_POST['confirmPassword'];

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
      $q = "select email from users where email = '$email'";
      $result = mysqli_query($db, $q);
      if ($row = mysqli_fetch_assoc($result)) {
        // Trigger error alert for email existing in database
        $email_exists_error = true;
      } else {
        $q = "insert into $table_user values(null,'$fname','$lname','$email',SHA('$password'),SHA('$password_confirmation'),false,now())";
        mysqli_query($db, $q) or die(mysqli_error($db));
        echo '<script>window.location.href="/assignment2-sepm/adminPanel.php";</script>';
      }
    }
  }
}

?>
<div class="container" id="main-container">
  <h1 class="text-center">Admin Panel</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Locations</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tours</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <?php include 'includes/users.php'?>  
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <?php include 'includes/locations.php'?>   
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <?php include 'includes/tours.php'?>                    
  </div>

  <?php
  include('includes/footer.php');
  ?>