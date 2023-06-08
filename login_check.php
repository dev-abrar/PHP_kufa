<?php
session_start();

if(!isset($_SESSION['thik'])){
    header('location:../login.php');
}


?>