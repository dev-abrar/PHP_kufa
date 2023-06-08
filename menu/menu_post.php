<?php
session_start();
require '../db.php';
 
$name = $_POST['name'];
$sec_id = $_POST['sec_id'];




$insert = "INSERT INTO menus(name, sec_id)VALUES('$name', '$sec_id')";
mysqli_query($db_connect, $insert);
header('location:menu.php');


?>