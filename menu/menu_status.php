<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$select_ser = "SELECT * FROM service WHERE id=$id";
$select_ser_res = mysqli_query($db_connect, $select_ser);
$after_assoc_ser = mysqli_fetch_assoc( $select_ser_res);

if($after_assoc_ser['status'] == 1){
  $update = "UPDATE service SET status=0 WHERE id=$id";
  mysqli_query($db_connect, $update);
  header('location:edit_service.php');
}

else{
    $update2 = "UPDATE service SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update2);
    header('location:edit_service.php');
}

?>