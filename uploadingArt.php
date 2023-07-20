<?php
include 'db.php';
include 'config.php';

session_start();

$imgPath = $_POST['imagePath'];
$userId = $_SESSION['user_id'];
$protId = $_POST['protId'];
$imgId = $_POST['imageId'];

$query = "SELECT art_id FROM tbl_212_prot_art";
$result = mysqli_query($connection, $query);
$dub = 0;
if (!$result) {
    die("DB query failed.");
} else {
    foreach ($i as $result) {
        if ($i['art_id'] == $imgId)
            $dub++;
    }
    if ($dub == 0) {
        $quary = "INSERT INTO tbl_212_prot_art (art_id, prot_id, user_id, art_path) VALUES ('$imgId', '$protId' , '$userId' , '$imgPath');";
        $uploadArt = mysqli_query($connection, $quary) or die('Quary art is failed' . mysqli_error($connection));

        if ($uploadArt) {
            header("Location:protest.php?protId=$protId");
            exit();
        }
    }else{
        $response = "Art was already uploaded. Choose Another Art.";
        $r = array('retVal' => $response);
        echo json_encode($r);
        exit();
    }
}

mysqli_free_result($result);
mysqli_free_result($catResult);

mysqli_close($connection);



?>