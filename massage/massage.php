<?php
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM massage";
$select_res = mysqli_query($db_connect, $select);

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
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Massage</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach($select_res as $sl=>$msg) {?>
                    <tr class="<?=($msg['status'] == 0)?'bg-light':''?>">
                        <td><?=$sl+1?></td>
                        <td><?=$msg['name']?></td>
                        <td><?=$msg['email']?></td>
                        <td><?=substr($msg['massage'], 0, 10).'... more'?></td>
                        <td>
                            <a href="massage_view.php?id=<?=$msg['id']?>" class="btn btn-info">View</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../dashboard_parts/footer.php'; ?>