<?php
include 'db.php';
include 'config.php';

session_start();

$imgPath = $_POST['imagePath'];
$userId = $_SESSION['user_id'];
$protId = $_POST['protId'];
$imgId = $_POST['imageId'];

echo $protId;

$quary = "INSERT INTO tbl_212_prot_art (art_id, prot_id, user_id, art_path) VALUES ('$imgId', '$protId' , '$userId' , '$imgPath');";
$uploadArt = mysqli_query($connection, $quary) or die('Quary art is failed' . mysqli_error($connection));

header("Location:protest.php?protId=$protId");

?>