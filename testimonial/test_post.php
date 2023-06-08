<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$sub_name = $_POST['sub_name'];
$desp = mysqli_real_escape_string($db_connect, $_POST['desp']);

$up_file = $_FILES['photo'];
$explode = explode('.', $up_file['name']);
$extn = end($explode);
$allowed = array('png', 'jpg', 'gif');
$photo_name = $up_file['name'];

if(in_array($extn, $allowed)){
    $insert = "INSERT INTO test(photo, desp, name, sub_name)VALUES('$photo_name', '$desp','$name','$sub_name')";
    mysqli_query($db_connect, $insert);
    $last_id = mysqli_insert_id($db_connect);
    $file_name = $last_id.'.'.$extn;
    $new_locate = '../upload/test/'.$file_name;
    move_uploaded_file($up_file['tmp_name'], $new_locate);
    $update = "UPDATE test SET photo ='$file_name', desp='$desp', name='$name', sub_name='$sub_name' WHERE id=$last_id";
    mysqli_query($db_connect, $update);
    header('location:test.php');
}

else{
    $_SESSION['ulta'] = 'Extn Nai';
    header('location:test.php');
}



?>