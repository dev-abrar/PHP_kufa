<?php
session_start();
require '../db.php';

$id =$_GET['id'];

$select ="SELECT * FROM skills WHERE id=$id";
$select_skil_res = mysqli_query($db_connect, $select);
$after_assoc_skil = mysqli_fetch_assoc($select_skil_res);


if($after_assoc_skil['status'] == 1){
    $update = "UPDATE skills SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:about.php');
}

else{
    $update2 = "UPDATE skills SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update2);
    header('location:about.php');
}





?>