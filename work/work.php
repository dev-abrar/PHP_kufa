<?php
session_start();
require '../db.php';
require '../login_check.php';

$select = "SELECT * FROM works";
$select_works = mysqli_query($db_connect, $select);



?>
<?php require '../dashboard_parts/header.php'; ?>

<div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Works List</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Thumnail</th>
                            <th>Details</th>
                        </tr>

                        <?php foreach ($select_works as $kl=> $work) {?>
                          <tr>
                          <td><?=$kl+1?></td>
                            <td>
                                  <?php 
                                 $user_id = $work['user_id'];
                                 $select_res = "SELECT * FROM users WHERE id=$user_id";
                                 $select_works_res = mysqli_query($db_connect, $select_res);
                                 $after_assoc_work = mysqli_fetch_assoc($select_works_res);
                                 echo $after_assoc_work['name'];
                                  ?>
                            </td>
                            <td><?=$work['category']?></td>
                            <td><?=$work['sub_title']?></td>
                            <td><?=substr($work['title'],0 ,20)?></td>
                            <td><?=substr($work['desp'],0 ,20)?></td>
                            <td><img width="100" src="../upload/work/thum/<?=$work['thum']?>" alt=""></td>
                            <td><img width="100" src="../upload/work/feat/<?=$work['feter']?>" alt=""></td>
                          </tr>
                        <?php }?>
                </table>
            </div>
        </div>
      </div> 
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Works</h2>
            </div>
            <div class="card-body">
                <form action="work_post.php" method="POST" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control">
                        <input type="hidden" name="user_id" class="form-control" value="<?=$after_assoc['id']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Desp</label>
                        <textarea name="desp" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Thumnail</label>
                        <input type="file" name="thum" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fetured Image</label>
                        <input type="file" name="feture" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


 <?php require '../dashboard_parts/footer.php'; ?>

 