<?php
  //mysqli & PDO (php database object)
  $db = new PDO("mysql:dbhost=localhost/127.0.0.1; dbname=student_info", "root", "", [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);
