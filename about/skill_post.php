<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$desp = $_POST['desp'];
$percentage = $_POST['percentage'];


$insert = "INSERT INTO skills(title, desp, percentage) VALUES('$title', '$desp', '$percentage')";
mysqli_query($db_connect, $insert);
header("location:about.php");


?>