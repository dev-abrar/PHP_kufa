<?php
session_start();
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM service";
$select_ser = mysqli_query($db_connect, $select);

?>
<?php require '../dashboard_parts/header.php'; ?>

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>Services</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_ser as $kl=>$ser) {?>
                        <tr>
                            <td><?=$kl+1?></td>
                            <td><i class="<?=$ser['icon']?>"></i></td>
                            <td><?=$ser['title']?></td>
                            <td><?=$ser['desp']?></td>
                            <td>
                                <a class="btn btn-<?=($ser['status'] == 1)?'success':'light'?>" href="ser_status.php?id=<?=$ser['id']?>"><?=($ser['status'] == 1)?'Active':'Deactive'?></a>
                            </td>
                            <td>
                            <button data-id="delete_ser.php?id=<?=$ser['id']?>" class="btn btn-danger d_btn">Delete</button>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Services</h2>
            </div>
            <?php
                      $fonts = array (
                        'fa-wordpress',
                        'fa-html5',
                        'fa-css3',
                        'fa-reddit-square',
                        'fa-ioxhost',
                        'fa-grav',
                        'fa-database',
                       
                      );
                ?>
            <div class="card-body">
                <form action="service_post.php" method="POST">
                <?php foreach($fonts as $icon) {?>
                                <i style="font-size: 30px; margin-right: 5px; font-family: fontawesome;" class="fa <?=$icon?>"></i>
                <?php }?>
                <div class="mb-3">
                        <input type="text" id="icon" name="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control">
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