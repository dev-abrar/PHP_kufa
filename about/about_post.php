<?php
session_start();
require '../db.php';

$id= $_POST['id'];
$sub_title= $_POST['sub_title'];
$title= $_POST['title'];
$desp = mysqli_real_escape_string($db_connect, $_POST['desp']);

$update = "UPDATE about SET sub_title='$sub_title', title='$title', desp='$desp'";
mysqli_query($db_connect, $update);
header('location:about.php');



?>