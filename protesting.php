<?php
include 'db.php';
include 'config.php';
session_start();
static $prodId = 6;
$prodId++; 
$uid = $_SESSION["user_id"];
$title = $_POST["proTitle"];
$summary = $_POST["proSum"];
$story = $_POST["proStory"];
if(empty($_POST["allowArt"])){
    $allowArt = 0; 
} else {
    $allowArt = 1;
}

$quary = "INSERT INTO tbl_212_protest (prot_id,prot_title, prot_summary, prot_story, allow_art) VALUES ('$prodId','$title', '$summary' , '$story' , '$allowArt');";
$prot = mysqli_query($connection,$quary) or die('Quary prot is failed'.mysqli_error($connection));
$quaryprot = "INSERT INTO tbl_212_prot_user(prot_id, user_id) VALUES ('$prodId','$uid');";
$protuser = mysqli_query($connection,$quaryprot) or die('Quary protuser is failed'.mysqli_error($connection));

if($prot == 1){
    $pcategories = $_POST["proCate"];
    $pcategory = explode(',', $pcategories);
    foreach ($pcategory as $pcat) {
        $quary2 = "INSERT IGNORE INTO tbl_212_categories(cat_name) SELECT '$pcat' FROM tbl_212_categories WHERE not exists ( SELECT * FROM tbl_212_categories WHERE cat_name ='$pcat');" ;
        if(!$quary2 == 0) {

            $cat = mysqli_query($connection,$quary2) or die('Quary cat is failed'. mysqli_error($connection));
        }
        $catidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$pcat';";
        $catid = mysqli_query($connection,$catidquary) or die('Quary catid is failed'. mysqli_error($connection));
        if($catid && mysqli_num_rows($catid) > 0){
            $row = mysqli_fetch_assoc($catid);
            $cid = $row['cat_id'];
            $result2 =  strval($cid);
            $quary3 = "INSERT INTO tbl_212_prot_cat(prot_id,cat_id) values ('$prodId','$result2');";
            $protcat = mysqli_query($connection,$quary3) or die('Quary protcat is failed'. mysqli_error($connection));
        }
    }
}
header("Location:protest.php?protId=$prodId");
?>