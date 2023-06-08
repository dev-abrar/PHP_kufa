<?php
  session_start();
  require '../db.php';
  $id = $_POST['id'];
  $uploaded_file = $_FILES['photo'];
  $after_assoc = explode('.', $uploaded_file['name']);
  $extension = end($after_assoc);
  $allowed_extension = array('png', 'jpg', 'gif');
  if (in_array($extension, $allowed_extension)) {
    if($uploaded_file['size'] <= 10000000){

      $select_img = "SELECT * FROM users WHERE id=$id";
      $result = mysqli_query($db_connect, $select_img);
      $after_assoc_img = mysqli_fetch_assoc($result);
      $delete_from = '../upload/user/'.$after_assoc_img['photo'];
      unlink($delete_from);

      $file_name =$id.'.'.$extension;
      $new_location = '../upload/user/'.$file_name;
      move_uploaded_file($uploaded_file['tmp_name'], $new_location);
      $update = "UPDATE users SET photo='$file_name' WHERE  id=$id";
      mysqli_query($db_connect, $update);
      header('location:profile.php');
    }
    else{
      $_SESSION['error'] = 'File Size Too Large! Max 1 Mb';
      header('location:profile.php');
    }
  }
  else{
    $_SESSION['error'] = 'Invalid Extension!';
    header('location:profile.php');
  }

?>
