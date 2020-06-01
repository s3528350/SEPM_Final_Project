<?php
include 'includes/header.php';
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $q = "delete from $table_tour_type where id = '$id'";
    mysqli_query($db, $q) or die(mysqli_error($db));
    header('Location: memberPanel.php');
}
?>