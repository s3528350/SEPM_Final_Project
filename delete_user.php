<?php
include 'includes/header.php';
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $q = "delete from users where id = '$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));

    if(mysqli_query($db, $q)){
        echo '<div class="alert alert-warning" role="alert">You have not completely filled the signup form.</div>';
        header("Location: adminPanel.php");
    }
    else{
        $_SESSION['success'] = "User could not be deleted";
        header("Location: adminPanel.php");
    }
}
?>