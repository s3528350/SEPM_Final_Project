<?php
$title = 'Tour';
include 'includes/header.php';
include 'includes/login_signup_nav.php';
?>

<div class="container" id="main-container">
    <div id="signup">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-9 col-lg-6">
                <h1 class="text-center">Tour</h1>
                <?php
                $tourname = $_GET['name'];

                $q = "select * from $table_tour where name = '$tourname'";

                $results = mysqli_query($db, $q) or die(mysqli_error($db));

                while ($row = mysqli_fetch_array($results)) {
                    print "<h2>{$row['name']}</h4>";
                    print "<h3>Type:{$row['type']}</h3>";
                    print "<h3>Minimum Duration: {$row['min_duration']}</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</div>