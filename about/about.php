<?php
session_start();
require '../db.php';
require '../login_check.php';

$select_about = "SELECT * FROM about";
$select_about_res = mysqli_query($db_connect, $select_about);
$after_accoc_about = mysqli_fetch_assoc($select_about_res);

$select_skill = "SELECT * FROM skills";
$select_skill_res = mysqli_query($db_connect, $select_skill);
?>

<?php require '../dashboard_parts/header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1>Update Users</h1>
            </div>
            <div class="card-body">
                <form action="about_post.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="sub_title" class="form-control"
                            value="<?=$after_accoc_about['sub_title']?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" value="<?=$after_accoc_about['title'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="desp" class="form-control" value="<?=$after_accoc_about['desp'] ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h2>All Skills</h2>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Percentage</th>
                            <th>Status</th>
                        </tr>

                        <?php foreach($select_skill_res as $kl=>$skill) {?>
                        <tr>
                            <td><?=$kl+1?></td>
                            <td><?=$skill['title']?></td>
                            <td><?=$skill['desp']?></td>
                            <td><?=$skill['percentage']?></td>
                            <td>
                            <a class="btn btn-<?=($skill['status'] == 1)?'success':'light'?>" href="skill_status.php?id=<?=$skill['id']?>"><?=($skill['status'] == 1)?'Active':'Deactive'?></a>
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
                <h2>Add Skills</h2>
            </div>
            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Desp</label>
                        <input type="text" name="desp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Percentage</label>
                        <input type="number" name="percentage" class="form-control">
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