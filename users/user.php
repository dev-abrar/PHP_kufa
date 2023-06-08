<?php  
session_start();
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM users";
$select_user = mysqli_query($db_connect, $select);

?>


<?php require '../dashboard_parts/header.php'; ?> 
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1>Users List</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_user as $key=>$user) {?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$user['name']?></td>
                            <td><?=$user['email']?></td>
                            <td><img height="100" src="../upload/user/<?=$user['photo']?>" alt=""></td>
                            <td>
                                <a href="edit.php?id=<?=$user['id']?>" class="btn btn-primary">Edit</a>
                                <button data-id="delete.php?id=<?=$user['id']?>" class="btn btn-danger d_btn">Delete</button>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $('.d_btn').click(function(){
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
