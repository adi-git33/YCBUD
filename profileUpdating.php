<?php
include 'db.php';
include 'config.php';

session_start();

if (!(isset($_SESSION["user_id"]))) {
    header("Location:login.php");
}

$name = $_POST['fullName'];
$desc = $_POST['descp'];
$id = $_SESSION['user_id'];
$pass = $_POST['pass'];
$email = $_POST['email'];


$updateQ = "UPDATE tbl_212_artist SET descp ='$desc' WHERE artist_id='$id';";
$update = mysqli_query($connection, $updateQ) or die('Quary update desc is failed' . mysqli_error($connection));
$update2Q = "UPDATE tbl_212_users SET name ='$name', email = '$email' , password = '$pass' WHERE user_id='$id';";
$update = mysqli_query($connection, $update2Q) or die('Quary update desc is failed' . mysqli_error($connection));

mysqli_free_result($update);
mysqli_close($connection);

header("Location:profile.php?profId=$id");
