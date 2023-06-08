<?php

require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM number";
$select_number = mysqli_query($db_connect, $select);


?>
<?php require '../dashboard_parts/header.php'; ?>
<div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h1>Icon List</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_number as $key=>$count) {?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><i style="font-family: fontawesome;" class="<?=$count['icon']?>"></i></td>
                            <td><?=$count['number']?></td>
                            <td><?=$count['desp']?></td>
                            <td>
                                <a class="btn btn-<?=($count['status'] == 1)?'success':'light'?>" href="count_status.php?id=<?=$count['id']?>"><?=($count['status'] == 1)?'Active':'Deactive'?></a>
                            <td>
                                <button data-id="delete_counter.php?id=<?=$count['id']?>" class="btn btn-danger d_btn">Delete</button>
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
                <h2>Edit Counter</h2>
            </div>
            <?php
                      $fonts = array (
                        'fa-user-circle',
                        'fa-thumbs-up',
                        'fa-briefcase',
                        'fa-female',
                        'fa-ioxhost',
                        'fa-grav',
                        'fa-database',
                       
                      );
                ?>
            <div class="card-body">
                <form action="count_post.php" method="POST">
                <?php foreach($fonts as $icon) {?>
                                <i style="font-size: 30px; margin-right: 5px; font-family: fontawesome;" class="fa <?=$icon?>"></i>
                <?php }?>
                <div class="mb-3">
                        <input type="text" id="icon" name="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="number" name="number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="desp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Skill</button>
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

 <script>
    $('.fa').click(function(){
        var icon_class = $(this).attr('class');
        $('#icon').attr('value', icon_class);
    });
 </script>