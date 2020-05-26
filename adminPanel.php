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
                $q = "insert into users values(null,'$fname','$lname','$email',SHA('$password'),SHA('$password_confirmation'),false,now())";
                mysqli_query($db, $q) or die(mysqli_error($db));
                echo '<script>window.location.href="/assignment2-sepm/adminPanel.php";</script>';
            }
        }
    }
}

?>
<div class="container" id="main-container">
<h1 class="text-center">Admin Panel</h1>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <a type="button" class="btn btn-primary" href="signup.php">Add User</a>
    </h6>
  

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> ID </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th>Email </th>
            <th>Created at </th>
            <th>Rights </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php
                        //creating a query to fetch user details from database
                        $q = "select * from users";
                        $results = mysqli_query($db, $q) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($results)) {?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php if($row['is_admin'] == 1){
                echo "Admin";
            }
            else{
                echo "Assistant";
            }?></td>
            <td>
                <form action="process_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
</div>
<?php
include('includes/footer.php');
?>