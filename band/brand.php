<?php
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM brand";
$select_brand= mysqli_query($db_connect, $select);


?>

<?php require '../dashboard_parts/header.php'; ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card  ">
            <div class="card-header">
                <h1>Brand List</h1>
            </div>
            <div class="card-body">
                <table class="table table-dark table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Brands</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach($select_brand as $sl=>$brand) {?>
                    <tr>
                        <td><?=$sl+1?></td>
                        <td><img width="100" src="../upload/brand/<?=$brand['brand']?>" alt=""></td>
                        <td>
                            <a class="btn btn-<?=($brand['status'] == 1)?'success':'light'?>"
                                href="brand_status.php?id=<?=$brand['id']?>"><?=($brand['status'] == 1)?'Active':'Deactive'?></a>
                        </td>
                        <td>
                            <button data-id='delete_brand.php?id=<?=$brand['id']?>' type="submit"
                                class="btn btn-danger d_btn">Delete</button>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add New Logo</h3>
            </div>

            <?php if(isset($_SESSION['extn'])) {?>
            <strong class="text-danger"><?=$_SESSION['extn']?></strong>
            <?php } unset($_SESSION['extn'])?>
            <div class="card-body">
                <form action="brand_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="logo">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Logo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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