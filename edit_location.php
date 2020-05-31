<?php
include 'includes/header.php';
include 'includes/login_signup_nav.php';
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $description = $_POST['edit_description'];
    $longitude = $_POST['edit_longitude'];
    $latitude = $_POST['edit_latitude'];
    $minTimeSpent = $_POST['edit_minTimeSpent'];

    $q = "UPDATE $table_location set id='$id', name='$name', description='$description', longitude = '$longitude',latitude = '$latitude',minTimeSpent = '$minTimeSpent' where id = '$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header("Location: memberPanel.php");
}
?>