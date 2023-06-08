<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$number = $_POST['number'];
$desp = $_POST['desp'];

$insert = "INSERT INTO number(icon, number, desp)VALUES('$icon', '$number', '$desp')";
mysqli_query($db_connect, $insert);
header('location:counter.php');
?>