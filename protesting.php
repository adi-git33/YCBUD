<?php
include 'db.php';
include 'config.php';

$title = $_GET["proTitle"];
$summary = $_GET["proSum"];
$story = $_GET["proStory"];
$allowArt = $_GET["allowArt"]; 
$quary = "INSERT INTO tbl_212_protest (prot_title, prot_summary, prot_story, allow_art) VALUES ('$title', '$summary' , '$story' , '$allowArt');";
mysqli_query($connection,$quary);

header("Location:index.php");
// session_start();
?>