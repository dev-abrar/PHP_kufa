<?php
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM brand WHERE id=$id";
$select_status_res = mysqli_query($db_connect, $select_status);
$after_assoc_status = mysqli_fetch_assoc($select_status_res);

if($after_assoc_status['status'] == 1){
    $update = "UPDATE brand SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:brand.php');
}

else{
    $update2 = "UPDATE brand SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update2);
    header('location:brand.php');
}


?>