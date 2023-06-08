<?php
require '../db.php';

$id = $_GET['id'];

$select_ban_status = "SELECT * FROM banner_photo WHERE id=$id";
$select_ban_status_res = mysqli_query($db_connect, $select_ban_status);
$after_assoc_ban_status = mysqli_fetch_assoc($select_ban_status_res);


if($after_assoc_ban_status['status'] == 1){
    $update = "UPDATE banner_photo SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:banner.php');
}

else{
    $update = "UPDATE banner_photo SET status=0";
    mysqli_query($db_connect, $update);

    $update2 = "UPDATE banner_photo SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update2);
    header('location:banner.php');
}


?>