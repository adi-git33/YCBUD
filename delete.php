<?php
include 'db.php';
include 'config.php';

session_start();

$pid = $_GET['protId'];
$quary = "DELETE FROM tbl_212_protest WHERE prot_id=" . $pid;
$result = mysqli_query($connection, $quary) or die('Quary delete is failed' . mysqli_error($connection));

$quary2 = "DELETE FROM tbl_212_prot_user WHERE prot_id=" . $pid;
$result = mysqli_query($connection, $quary2) or die('Quary delete2 is failed' . mysqli_error($connection));

$quary3 = "DELETE FROM tbl_212_prot_cat WHERE prot_id=" . $pid;
$result = mysqli_query($connection, $quary3) or die('Quary delete3 is failed' . mysqli_error($connection));

$quary4 = "DELETE FROM tbl_212_prot_art WHERE prot_id=" . $pid;
$result = mysqli_query($connection, $quary4) or die('Quary delete3 is failed' . mysqli_error($connection));


header("Location:index.php");

mysqli_free_result($result);

mysqli_close($connection);

header("Location:http://se.shenkar.ac.il/students/2022-2023/web1/dev_212/index.php");



