<?php
include 'db.php';
include 'config.php';

$title = $_GET["proTitle"];
$summary = $_GET["proSum"];
$story = $_GET["proStory"];
$allowArt = $_GET["allowArt"]; 
$quary = "INSERT INTO tbl_212_protest (prot_title, prot_summary, prot_story, allow_art) VALUES ('$title', '$summary' , '$story' , '$allowArt');";
$prot = mysqli_query($connection,$quary) or die('Quary one is failed'.mysqli_error($connection));

if($prot == 1){
    $pcategories = $_GET["proCate"];
    $pcategory = explode(',', $pcategories);
    foreach ($pcategory as $pcat) {
        $quary2 = "INSERT INTO tbl_212_categories(cat_name) values ('$pcat') WHERE not exists ( SELECT * FROM tbl_212_categories WHERE cat_name ='$pcat')"  
        $cat = mysqli_query($connection,$quary2) or die('Quary two is failed'. mysqli_error($connection));
        // echo '<a href="#"' . $pcat . '</a>';
        // echo $pcat . ', ';
    }

}

header("Location:index.php");
// session_start();
?>