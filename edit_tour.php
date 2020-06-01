<?php
include 'includes/header.php';
include 'includes/login_signup_nav.php';
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $location1 = $_POST['edit_location1'];
    $location2 = $_POST['edit_location2'];
    $location3 = $_POST['edit_location3'];
    $min_time = $_POST['edit_min_time'];
    $q = "UPDATE $table_tour set name='$name', location1='$location1', location2='$location2' ,location3='$location3' where id = '$id' ";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header("Location: memberPanel.php");
}
?>