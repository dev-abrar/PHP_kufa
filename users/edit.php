<?php
require '../db.php';
require '../login_check.php';



$id = $_GET['id'];
$select = "SELECT * FROM users WHERE id=$id";
$select_user = mysqli_query($db_connect, $select);
$after_accoc = mysqli_fetch_assoc($select_user);

?>

<?php require '../dashboard_parts/header.php'; ?>   

  <div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card  mt-5">
                <div class="card-header">
                    <h1>Update Users</h1>
                </div>
                <div class="card-body">
                    <form action="update.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="<?= $after_accoc['id'] ?>">
                            <input type="text" name="name" class="form-control" value="<?=$after_accoc['name']?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" value="<?=$after_accoc['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" placeholder="Password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php require '../dashboard_parts/footer.php'; ?> 
 
