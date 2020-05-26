<?php
$title = 'Edit user';
include 'includes/header.php';
include 'includes/login_signup_nav.php';


// Process User details
if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $q = "Select * from users where id = '$id'";
    $results = mysqli_query($db, $q) or die(mysqli_error($db));
    while ($row = mysqli_fetch_array($results)) {
?>

        <div class="container" id="main-container">
                <div id="signup">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-9 col-lg-6">
                            <form class="content-form" action="update_user.php" method="post">
                                <h1 class="text-center">Edit User</h1>
                                <input type="hidden" class="form-control" name="edit_id" id="fname" value="<?php echo $row['id']; ?>" placeholder="First Name" required="required">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_fname" id="fname" value="<?php echo $row['fname']; ?>" placeholder="First Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_lname" id="lname" value="<?php echo $row['lname']; ?>" placeholder="Last Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="edit_email" id="email" value="<?php echo $row['email']; ?>" placeholder="Email Address" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="edit_password" id="password" value="<?php echo $row['password']; ?>" placeholder="Password" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="update_btn" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    }
}
?>
<div class="card-body">
    <?php
    include('includes/footer.php');
    ?>