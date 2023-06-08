<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO service(icon, title, desp)VALUES('$icon', '$title', '$desp')";
mysqli_query($db_connect, $insert);
header('location:edit_service.php');
?>