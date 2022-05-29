<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    .wrap {
        margin: 0 auto;
        max-width: 1200px;
    }
    .f-wrap {
        max-width: 400px;
        margin: 0 auto;
    }
</style>
<?php
session_start();
   $registered = isset($_SESSION['register']);
   $enrolled = isset($_GET['enrolled']);
?>
<body>
    <div class="container mt-5">
    <?php if($registered && $enrolled) : ?>
    <div class="wrap">
    <h1>You've successfully registered for the 2022-2023 Academic Year !!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, perferendis? Et aspernatur ea illo quaerat ducimus quos est doloribus, suscipit blanditiis magni architecto voluptatum quisquam fugiat fuga amet aut iste.</p>
    <?php 
        $id = $_GET["enrolled"];

        $statement = $db->query("SELECT * FROM students WHERE id=$id");
        $rows = $statement->fetchAll();
    ?>
    <table class="table table-striped table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>NRC</th>
            <th>Courses</th>
            <th>Registered at</th>
        </tr>
        <?php foreach($rows as $row) : ?>
        <tr>
            <td><?= $row-> id ?></td>
            <td><?= $row-> name ?></td>
            <td><?= $row-> dob ?></td>
            <td><?= $row-> email ?></td>
            <td><?= $row-> nrc ?></td>
            <?php $datas = explode(" ", $row-> courses)?>
            <td>
            <?php foreach($datas as $data ) : ?>
            <span class="badge rounded-pill bg-secondary"><?= $data ?></span>
            <?php endforeach ?>
            </td>
            <td><?= $row-> registered_at ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <a href="update.php">Register Again ?</a>
    
    </div>

    <?php else : ?>
    <div class="f-wrap">
    <h1 class="h2 mb-4">Register</h1>
    <form action="student_register.php" method="post">

       <label for="name" class="form-label">Name</label>
       <input type="text" name="name"  class="form-control mb-2" required>

       <label for="dob" class="form-label">Date of Birth</label>
       <input type="date" name="dob" class="form-control mb-2"  required>

       <label for="nrc" class="form-label">NRC</label>
       <input type="text" name="nrc" class="form-control mb-2"  required>

       <label for="email" class="form-label">Email</label>
       <input type="email" name="email" class="form-control mb-2"  required>

       <label for="courses" class="form-label d-block mb-2">Courses</label>
       
       <?php 
            $core_subjects = $db->query("SELECT * FROM core_subjects");
            $core_datas = $core_subjects->fetchAll();

            $elective_subjects = $db->query("SELECT * FROM elective_subjects");
            $elective_datas = $elective_subjects->fetchAll();
       ?>

            <?php foreach($core_datas as $data) : ?>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="courses[]" value="<?= $data-> courses ?>" class="form-check-input mb-2">
                <label class="form-check-label" for="course<?= $data-> id ?>">
                    <?= $data-> courses ?>
                </label>
            </div>
            <?php endforeach ?>
            <?php foreach($elective_datas as $data) : ?>
            <div class="form-check form-check-inline">
                <input type="radio" name="courses[]" value="<?= $data-> courses ?>" class="form-check-input mb-2">
                <label class="form-check-label" for="course<?= $data-> id ?>">
                    <?= $data-> courses ?>
                </label>
            </div>
            <?php endforeach ?>
       <input type="submit" value="Register" class="btn btn-primary mt-4 d-block">
    </form>
    </div>
    </div>
    <?php endif ?>
</body>
</html>