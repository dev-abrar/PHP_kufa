<?php
session_start();
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM menus";
$select_menu = mysqli_query($db_connect, $select);



?>
<?php require '../dashboard_parts/header.php'; ?>

<div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h1>Services</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Menu List</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_menu as $kl=>$menu) {?>
                        <tr>
                            <td><?=$kl+1?></td>
                            <td><?=$menu['name']?></td>
                            <td><?=$menu['sec_id']?></td>
                            <td>
                            <button data-id="delete_menu.php?id=<?=$menu['id']?>" class="btn btn-danger d_btn">Delete</button>
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
                <h2>Add Menu</h2>
            </div>
            <div class="card-body">
                <form action="menu_post.php" method="POST">
                     <div class="mb-3">
                        <label for="" class="form-label">Menu Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Section ID</label>
                        <input type="text" name="sec_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Menu</button>
                    </div>
                </form>
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