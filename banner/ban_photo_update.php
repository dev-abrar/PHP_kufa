<?php
session_start();
require '../db.php';

$uplode_file = $_FILES['photo'];
$explode = explode('.',$uplode_file['name']);
$extn = end($explode);
$allow_ban = array('jpg', 'png', 'gif', 'jpeg');
$file = $uplode_file['name'];


if(in_array($extn, $allow_ban)){
  if($uplode_file['size'] <= 100000000){
    $insert = "INSERT INTO banner_photo (photo)VALUES('$file')";
    mysqli_query($db_connect, $insert);
    $last_id = mysqli_insert_id($db_connect);
    $file_name = $last_id.'.'.$extn;
    $new_locate = '../upload/banner/'.$file_name;
    move_uploaded_file($uplode_file['tmp_name'], $new_locate);
    $update = "UPDATE banner_photo SET photo='$file_name' WHERE id=$last_id";
    mysqli_query($db_connect, $update);
    header('location:banner.php');
  }
  else{
    $_SESSION['ext_ban'] = 'Beshi boro';
    header('location:banner.php');
}
}

else{
    $_SESSION['ext_ban'] = 'Extn Mile nai';
    header('location:banner.php');
}


?>


