<?php 
session_start();
require 'db.php';

if(!isset($_SESSION['thik'])){
    header('location:login.php');
}

?>

<?php require 'dashboard_parts/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Well Come to Dashboard, <strong><?=$after_assoc['name']?></strong></h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora totam accusamus quibusdam iusto non recusandae! At, atque temporibus. Voluptatibus itaque dolor excepturi optio harum nulla? Temporibus incidunt velit molestiae illum?</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'dashboard_parts/footer.php'; ?>