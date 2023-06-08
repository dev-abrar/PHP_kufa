<?php
session_start();
require '../db.php';

$user_id = $_POST['user_id'];
$category = $_POST['category'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = mysqli_real_escape_string($db_connect, $_POST['desp']);



$insert = "INSERT INTO works(user_id, category, sub_title, title, desp)VALUES('$user_id', '$category', '$sub_title', '$title', '$desp')";
mysqli_query($db_connect, $insert);
$last_id = mysqli_insert_id($db_connect);

$thum = $_FILES['thum'];
$explode = explode('.', $thum['name']);
$extn = end($explode);
$allowed = array('png', 'jpg', 'jpeg');
$name = $thum['name'];


if(in_array($extn, $allowed)){
    if($thum['size'] <= 10000000){
        $file_name = $last_id.'.'.$extn;
        $new_locate = '../upload/work/thum/'.$file_name;
        move_uploaded_file($thum['tmp_name'], $new_locate);
        $update = "UPDATE works SET thum='$file_name' WHERE id=$last_id";
        mysqli_query($db_connect, $update);
        header('location:work.php');
    }
    else{
        $_SESSION['extn'] = 'Beshi boro';
        header('location:work.php');
    }
}
else{
    $_SESSION['extn'] = 'Extn mile nai';
    header('location:work.php');
}

$feter = $_FILES['feture'];
$explode2 = explode('.', $feter['name']);
$extn2 = end($explode2);
$allowed2 = array('png', 'jpg', 'jpeg');
$name2 = $feter['name'];


if(in_array($extn2, $allowed2)){
    if($feter['size'] <= 10000000){
        $file_name2 = $last_id.'.'.$extn2;
        $new_locate2 = '../upload/work/feat/'.$file_name2;
        move_uploaded_file($feter['tmp_name'], $new_locate2);
        $update2 = "UPDATE works SET feter='$file_name2' WHERE id=$last_id";
        mysqli_query($db_connect, $update2);
        header('location:work.php');
    }
    else{
        $_SESSION['extn'] = 'Beshi boro';
        header('location:work.php');
    }
}
else{
    $_SESSION['extn'] = 'Extn mile nai';
    header('location:work.php');
}



header('location:work.php');
?>