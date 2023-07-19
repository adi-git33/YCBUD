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

if($role = 'artist'){
    $getida = "SELECT user_id FROM tbl_212_users ORDER BY user_id desc limit 1;";
    $result2 = mysqli_query($connection, $getida) or die('Quary signup artist is failed' . mysqli_error($connection));
    $idrow = mysqli_fetch_assoc($result2);
    $idrow2 = $idrow['user_id'];
    $aid = strval($idrow2);
    $artist = "INSERT INTO tbl_212_artist(artist_id) VALUES ('$aid')";
    $result2 = mysqli_query($connection, $artist) or die('Quary signup artist2 is failed' . mysqli_error($connection));

}

header('Location:login.php');








