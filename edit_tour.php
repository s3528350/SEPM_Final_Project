<?php
include 'includes/header.php';
include 'includes/login_signup_nav.php';
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $min_time = $_POST['edit_min_time'];
    $q = "UPDATE $table_tour set name='$name', where id = '$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header("Location: memberPanel.php");
}
?>