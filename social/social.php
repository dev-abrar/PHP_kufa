<?php
session_start();
require '../db.php';
require '../login_check.php';

$select_social= "SELECT * FROM social";
$select_social_res = mysqli_query($db_connect, $select_social);

?>

<?php require '../dashboard_parts/header.php'; ?> 

<div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h1>Update Social Icon</h1>
                </div>
                <?php
                      $fonts = array (
                        'fa-facebook',
                        'fa-facebook-f',
                        'fa-facebook-official',
                        'fa-facebook-square',
                        'fa-twitter',
                        'fa-twitter-square',
                        'fa-instagram',
                        'fa-telegram',
                        'fa-linkedin',
                        'fa-linkedin-square',
                        'fa-youtube',
                        'fa-youtube-play',
                        'fa-youtube-square',
                        'fa-yahoo',
                        'fa-pinterest',
                        'fa-pinterest-p',
                        'fa-pinterest-square',
                        'fa-snapchat',
                        'fa-snapchat-ghost',
                        'fa-snapchat-square',
                      );
                ?>
                <div class="card-body">
                    <form action="icon_post.php" method="POST">
                        <div class="mb-3">
                            <?php foreach($fonts as $icon) {?>
                                <i style="font-family: fontawesome; margin-right: 5px; font-size: 30px;" class="fa <?=$icon?>"></i>
                            <?php }?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="link" class="form-control" placeholder="link">
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
                    <h1>Icon List</h1>
                </div>
                <?php if(isset($_SESSION['limit'])) {?>
                    <strong class="alert alert-danger"><?=$_SESSION['limit']?></strong>
                <?php } unset($_SESSION['limit'])?>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_social_res as $key=>$icon) {?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><i style="font-family: fontawesome;" class="<?=$icon['icon']?>"></i></td>
                            <td><a target="_blank" href="<?=$icon['link']?>"><?=$icon['link']?></a></td>
                            <td>
                                <a class="btn btn-<?=($icon['status'] == 1)?'success':'light'?>" href="social_status.php?id=<?=$icon['id']?>"><?=($icon['status'] == 1)?'Active':'Deactive'?></a>
                            <td>
                                <button data-id="delete_social.php?id=<?=$icon['id']?>" class="btn btn-danger d_btn">Delete</button>
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

<script>
   $('.fa').click(function(){
     var icon_class = $(this).attr('class');
     $('#icon').attr('value', icon_class);
   });

</script>