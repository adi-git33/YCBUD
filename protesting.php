<?php
include 'db.php';
include 'config.php';
session_start();

$uid = $_SESSION["user_id"]
$title = $_GET["proTitle"];
$summary = $_GET["proSum"];
$story = $_GET["proStory"];
$allowArt = $_GET["allowArt"]; 
$quary = "INSERT INTO tbl_212_protest (prot_title, prot_summary, prot_story, allow_art) VALUES ('$title', '$summary' , '$story' , '$allowArt');";
$prot = mysqli_query($connection,$quary) or die('Quary prot is failed'.mysqli_error($connection));
$id = $_GET["prot_id"];

$quaryprot = "INSERT INTO tbl_212_prot_user(prot_id, user_id) VALUES('$id','$uid');";
$protuser = mysqli_query($connection,$quaryprot) or die('Quary protuser is failed'.mysqli_error($connection));


if($prot == 1){
    $pcategories = $_GET["proCate"];
    $pcategory = explode(',', $pcategories);
    foreach ($pcategory as $pcat) {
        $quary2 = "INSERT INTO tbl_212_categories(cat_name) values ('$pcat') WHERE not exists ( SELECT * FROM tbl_212_categories WHERE cat_name ='$pcat')"  
        $cat = mysqli_query($connection,$quary2) or die('Quary cat is failed'. mysqli_error($connection));
        $catidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$pcat';";
        $catid = mysqli_query($connection,$catidquary) or die('Quary catid is failed'. mysqli_error($connection));
        $quary3 = "INSERT INTO tbl_212_prot_cat(prot_id,cat_id) values ('$id','$catid');";
        $protcat = mysqli_query($connection,$quary3) or die('Quary protcat is failed', mysqli_error($connection));
    }
}

header("Location:protest?protId='$id'.php");
?>