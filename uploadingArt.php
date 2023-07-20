<?php
include 'db.php';
include 'config.php';

session_start();

$imgPath = $_POST['imagePath'];
$userId = $_SESSION['user_id'];
$protId = $_POST['protId'];
$imgId = $_POST['imageId'];

    try{
        $quary = "INSERT INTO tbl_212_prot_art (art_id, prot_id, user_id, art_path) VALUES ('$imgId', '$protId' , '$userId' , '$imgPath');";
        $uploadArt = mysqli_query($connection, $quary) or die('Quary art is failed' . mysqli_error($connection));
        
        if ($uploadArt) {
            header("Location:protest.php?protId=$protId");
            exit();
        }
    } catch (Exception $e)
    {
        $response = "Art was already uploaded, Choose Another Art.";
        header("Location:http://se.shenkar.ac.il/students/2022-2023/web1/dev_212/uploadArt.php?protId=$protId&error=$response");
        exit();
    }


mysqli_free_result($result);
mysqli_free_result($catResult);

mysqli_close($connection);


?>