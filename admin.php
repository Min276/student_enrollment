<?php include('db.php') ?>
<?php 
   session_start(); 
   $is_admin = isset($_SESSION['admin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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

<body>

    <div class="container mt-5">
    <?php if (isset($_GET['auth_error'])): ?>
            <div class="alert alert-warning">
              Incorrect Credentials
            </div>
    <?php endif ?>
    <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success">
              Successfully Registered! Please Log in.
            </div>
    <?php endif ?>
    <?php if($is_admin) :?>
    <div class="wrap">
    <h1>Student List</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, perferendis? Et aspernatur ea illo quaerat ducimus quos est doloribus, suscipit blanditiis magni architecto voluptatum quisquam fugiat fuga amet aut iste.</p>
    <?php  
        $statement = $db->query("SELECT * FROM students");
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
            <td><?= $row->dob ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->nrc ?></td>
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
    <a href="logout.php">Log out</a>
    </div>
    <?php else :?>
    <div class="f-wrap">
    <h1 class="h2 mb-4">Log in</h1>
    <form action="authcheck.php" method="post">

       <label for="email" class="form-label">Email</label>
       <input type="text" name="email" class="form-control mb-2"  required>

       <label for="password" class="form-label">Password</label>
       <input type="password" name="password"  class="form-control" required>

       <input type="submit" value="Login" class="btn btn-primary mt-4">
       <a href="register.php" class="btn btn-outline-primary mt-4 ms-3">Register </a>
    </form>
    </div>
    <?php endif ?>
    </div>
</body>
</html>