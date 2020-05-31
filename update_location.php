<?php
$title = 'Update User';
include 'includes/header.php';
include 'includes/login_signup_nav.php';


// Process User details
if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $q = "Select * from $table_location where id = '$id'";
    $results = mysqli_query($db, $q) or die(mysqli_error($db));
    while ($row = mysqli_fetch_array($results)) {
?>

        <div class="container" id="main-container">
                <div id="signup">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-9 col-lg-6">
                            <form class="content-form" action="edit_location.php" method="post">
                                <h1 class="text-center">Edit Location</h1>
                                <input type="hidden" class="form-control" name="edit_id" id="id" value="<?php echo $row['id']; ?>" required="required">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_name" id="name" value="<?php echo $row['name']; ?>" placeholder="Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_description" id="description" value="<?php echo $row['description']; ?>" placeholder="Description" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="edit_longitude" id="longitude" value="<?php echo $row['longitude']; ?>" placeholder="Longitude" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="edit_latitude" id="latitude" value="<?php echo $row['latitude']; ?>" placeholder="Latitude" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="edit_minTimeSpent" id="minTimeSpent" min="0" max="100" value="<?php echo $row['minTimeSpent']; ?>" placeholder="Minimum Time Spent" required="required">
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