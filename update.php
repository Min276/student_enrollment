<?php
session_start();

unset($_SESSION["register"]);

header("location: index.php");