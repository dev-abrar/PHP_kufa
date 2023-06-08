<?php
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT COUNT(*) as ruhi FROM users WHERE email='$email'";
$select_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);


if($after_assoc['ruhi'] == 1){
    $select2 = "SELECT * FROM users WHERE email='$email'";
    $select_res2 = mysqli_query($db_connect, $select2);
    $after_assoc2 = mysqli_fetch_assoc($select_res2);

    if(password_verify($password, $after_assoc2['password'])){
        $_SESSION['thik'] = 'Thik';
        $_SESSION['id'] = $after_assoc2['id'];
        header('location:dashboard.php');
    }
    else{
        $_SESSION['vul'] = 'Password Ta Mile nai';
        header('location:login.php');
    }
}
else{
    $_SESSION['invalid'] = 'Email Ta Dewa nai';
    header('location:login.php');
}


?>