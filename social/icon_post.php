<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO social(icon, link)VALUES('$icon','$link')";
mysqli_query($db_connect, $insert);
header('location:social.php');




?>