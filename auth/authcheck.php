<?php
   include('../db/db.php');

   session_start();

   $email = $_POST['email'];
   $password = md5($_POST['password']);

//    function findByEmailAndPassword($email, $password){
        $statement = $db->prepare("SELECT * FROM users WHERE
        email=:email AND password =:password");
        $statement->execute(
            [":email" => $email, ":password" => $password]
        );
        $check = $statement->fetch();
        // return $row ?? false;
    // }

    // $check = findByEmailAndPassword($email, $password);

    if($check){
        $_SESSION['admin'] = true;
        header("location: ../admin.php");
    }else {
        unset($_SESSION['admin']);
        header("location: ../admin.php?auth_error=1");
    }

