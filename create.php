<?php
  
   include('db.php');

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);

        $statement = $db->prepare("INSERT INTO users (name,email,password,created_at)
        VALUES(:name, :email, :password, NOW() )");
        $statement->execute([
            ":name" => $name,
            ":email" => $email, 
            ":password" => $password,
        ]);

    header("location: admin.php?registered=1");

    
