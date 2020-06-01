<?php
include 'includes/header.php';
include 'includes/login_signup_nav.php';
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $type = $_POST['edit_type'];

    $q = "UPDATE $table_tour_type set id = '$id', type = '$type' where id='$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header("Location: memberPanel.php");
}
?>