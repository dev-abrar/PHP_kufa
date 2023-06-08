<?php 
session_start();
require '../db.php';

$id =$_GET['id'];

$delete = "DELETE FROM test WHERE id=$id";
mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'DELETE';
header('location:test.php');

?>