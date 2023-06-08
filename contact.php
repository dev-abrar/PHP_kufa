<?php 
require 'db.php';

session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
// $regex = preg_match('@[A-Z]@', $password);
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$flag = true;

// Name
if(empty($name)){
    $_SESSION['name'] = 'Naam De';
    $flag = false;
    header('location:form.php');
}

// Email
if(empty($email)){
    $_SESSION['email'] = 'Email De';
    $flag = false;
    header('location:form.php');
}

else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['email'] = 'Email vul';
        $flag = false;
        header('location:form.php');
    }
}

// Password
if(empty($password)){
    $_SESSION['password'] = 'Password De';
    $flag = false;
    header('location:form.php');
}

// else{
//     if(!$regex){
//         $_SESSION['password'] = 'Password Vul';
//         $flag = false;
//         header('location:form.php');
//     }
// }

if($flag){
   $insert = "INSERT INTO users(name, email, password)VALUE('$name', '$email', '$after_hash')";
   mysqli_query($db_connect, $insert);


   $_SESSION['success'] = 'Register Successful';
   header('location:form.php');
}

else{
    $_SESSION['name_value'] = $name;
    $_SESSION['email_value'] = $email;
    header('location:form.php');
}

    



?>