
<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select_icon = "SELECT * FROM social WHERE id=$id";
$select_icon_res = mysqli_query($db_connect, $select_icon);
$after_assoc_icon = mysqli_fetch_assoc($select_icon_res);

if($after_assoc_icon['status'] == 1){
    $select_icon3 = "SELECT COUNT(*) as total FROM social WHERE status=0";
    $select_icon_res3 = mysqli_query($db_connect, $select_icon3);
    $after_assoc_icon3 = mysqli_fetch_assoc($select_icon_res3);

    if($after_assoc_icon3['total'] > 3){
        $_SESSION['limit'] = '2 tar kom deactive kora jaibo na';
        header('location:social.php');
    }
    else{
        $update3 = "UPDATE social SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update3);
        header('location:social.php');
    }
}

else{
    $select_icon2 = "SELECT COUNT(*) as total_icon FROM social WHERE status=1";
    $select_icon_res2 = mysqli_query($db_connect, $select_icon2);
    $after_assoc_icon2 = mysqli_fetch_assoc($select_icon_res2);

    if($after_assoc_icon2['total_icon'] == 4){
        $_SESSION['limit'] = '4 tar beshi active kora jaibo na';
        header('location:social.php');
    }
    else{
        $update2 = "UPDATE social SET status=1 WHERE id=$id";
        mysqli_query($db_connect, $update2);
        header('location:social.php');
    }
}
 

?>