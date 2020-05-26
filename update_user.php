<?php
include 'includes/header.php';
include 'includes/login_signup_nav.php';
if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $fname = $_POST['edit_fname'];
    $lname = $_POST['edit_lname'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $q = "UPDATE users set fname='$fname', lname='$lname', email='$email', password = SHA('$password') where id = '$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header("Location: adminPanel.php");
}
?>