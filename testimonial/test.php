<?php
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM test";
$test_res = mysqli_query($db_connect, $select);
?>

<?php require '../dashboard_parts/header.php'; ?>   

<div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card  mt-5">
                <div class="card-header">
                    <h1>Update Testimonial</h1>
                </div>
                <?php if(isset($_SESSION['ulta'])) {?>
                    <strong class="alert alert-danger"><?=$_SESSION['ulta']?></strong>
                <?php } unset($_SESSION['ulta'])?>
                <div class="card-body">
                    <form action="test_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="desp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="sub_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h1>Users List</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Desp</th>
                            <th>Name</th>
                            <th>Sub Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($test_res as $sl=>$test) {?>
                        <tr>
                            <td><?=$sl+1?></td>
                            <td><img width="100" src="../upload/test/<?=$test['photo']?>" alt=""></td>
                            <td><?=$test['desp']?></td>
                            <td><?=$test['name']?></td>
                            <td><?=$test['sub_name']?></td>
                            <td>
                                <a class="btn btn-<?=($test['status'] == 1)?'success':'light'?>" href="test_status.php?id=<?=$test['id']?>"><?=($test['status'] == 1)?'Active':'Deactive'?></a>
                            <td>
                                <button data-id="delete_test.php?id=<?=$test['id']?>" class="btn btn-danger d_btn">Delete</button>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.d_btn').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                link = $(this).attr('data-id');
                window.location.href = link;
            }
        })
    });
</script>

<?php if(isset($_SESSION['delete'])) {?>
<script>
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    )
</script>
<?php } unset($_SESSION['delete'])?>

    <?php require '../dashboard_parts/footer.php'; ?>  