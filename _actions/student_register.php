<?php

    include('../db/db.php');

    session_start();

    // print_r($_POST['name']);

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $nrc = $_POST['nrc'];
    $email = $_POST['email'];
    $courses = $_POST['courses'];
  
    
    $statement = $db->prepare("INSERT INTO students (name,dob,nrc,email,courses,registered_at)
     VALUES(:name, :dob, :nrc, :email, :courses, NOW() )");

    $statement->execute([
        ":name" => $name,
        ":dob" => $dob,
        ":nrc" => $nrc,
        ":email" => $email,
        ":courses" => implode(" " ,$courses)
    ]);
   $id = $db->lastInsertId();
    // $db->query("INSERT INTO students (name,dob,nrc,email,course)
    // VALUES('$name', '$dob', '$nrc', '$email', '$course')");

    $_SESSION['register'] = true;

    header("location: ../index.php". "?enrolled=$id");
