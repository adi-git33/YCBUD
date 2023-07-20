<?php
include 'db.php';
include 'config.php';

session_start();
session_destroy();
header('Location:http://se.shenkar.ac.il/students/2022-2023/web1/dev_212/login.php');

?>