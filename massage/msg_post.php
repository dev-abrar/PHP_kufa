<?php
session_start();
require '../db.php';

date_default_timezone_set('Asia/Dhaka');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date = date("Y-m-d h:i") ;

$insert ="INSERT INTO massage(name, email, massage, date )VALUES('$name', '$email', '$message', '$date')";
mysqli_query($db_connect, $insert);

$_SESSION['msg'] = 'Your Massage sent Successfully ';
header('location:../portfolio/index.php#contact');

?>

