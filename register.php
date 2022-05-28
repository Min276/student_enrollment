<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<style>
.f-wrap {
        max-width: 400px;
        margin: 0 auto;
    }
</style>

<body>

    <div class="container mt-5">
    <div class="f-wrap">
        <h1 class="h2 mb-4">Register</h1>
        <form action="create.php" method="post">

        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control mb-2"  required>

        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control mb-2"  required>

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password"  class="form-control" required>

        <input type="submit" value="Register" class="btn btn-primary mt-4">
        <a href="login.php" class="btn btn-outline-primary  mt-4 ms-3">Login </a>
        </form>
        </div>
</body>
</html>