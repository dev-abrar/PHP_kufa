<?php
require '../db.php';
require '../login_check.php';

$id = $_GET['id'];

$update = "UPDATE massage SET status=1  WHERE id=$id";
$update_res = mysqli_query($db_connect, $update);

$select = "SELECT * FROM massage WHERE id=$id";
$select_res = mysqli_query($db_connect, $select);
$massage = mysqli_fetch_assoc($select_res);
?>

<?php require '../dashboard_parts/header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card  ">
            <div class="card-header">
                <h1>Users List</h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td><?=$massage['name']?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$massage['email']?></td>
                    </tr>
                    <tr>
                        <td>Massage</td>
                        <td><?=$massage['massage']?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../dashboard_parts/footer.php'; ?>