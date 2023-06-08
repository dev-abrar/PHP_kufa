<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$select = "SELECT * FROM test WHERE id=$id";
$counter_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($counter_res);

if($after_assoc ['status'] == 1){
    $update ="UPDATE test SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:test.php');
}

else{
    $update2 ="UPDATE test SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update2);
    header('location:test.php');
}

?>