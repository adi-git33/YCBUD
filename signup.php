<?php
include 'db.php';
include 'config.php';

session_start();

$fname = mysqli_real_escape_string($connection, $_POST["signFName"]);
$lname = mysqli_real_escape_string($connection, $_POST["signLName"]);
$fullname = $fname . " " . $lname;
$email = mysqli_real_escape_string($connection, $_POST["signMail"]);
$pass = mysqli_real_escape_string($connection, $_POST["signPass"]);
$role = mysqli_real_escape_string($connection, $_POST["artist"]);

if($role == 'yes'){
    $role = "artist";
} else {
    $role = "protestor";
}

$quary = "INSERT INTO tbl_212_users(name, email, password, user_type) VALUES ('$fullname','$email','$pass','$role');";
$result = mysqli_query($connection, $quary) or die('Quary signup is failed' . mysqli_error($connection));

header('Location:login.php');








