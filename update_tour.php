<?php
$title = 'Update Tour';
include 'includes/header.php';
include 'includes/login_signup_nav.php';


// Process User details
if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $q = "Select * from $table_tour where id = '$id'";
    $results = mysqli_query($db, $q) or die(mysqli_error($db));
    while ($row = mysqli_fetch_array($results)) {
?>

        <div class="container" id="main-container">
                <div id="signup">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-9 col-lg-6">
                            <form class="content-form" action="edit_tour.php" method="post">
                                <h1 class="text-center">Edit Tour</h1>
                                <input type="hidden" class="form-control" name="edit_id" id="id" value="<?php echo $row['id']; ?>" required="required">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_name" id="name" value="<?php echo $row['name']; ?>" placeholder="Tour Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="edit_min_time" id="description" value="<?php echo $row['min_duration']; ?>" placeholder="Minimum Time" required="required">
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