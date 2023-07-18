<?php
include 'db.php';
include 'config.php';

session_start();

$uid = $_SESSION["user_id"];
$title = mysqli_real_escape_string($connection, $_POST["proTitle"]);
$summary = mysqli_real_escape_string($connection, $_POST["proSum"]);
$story = mysqli_real_escape_string($connection, $_POST["proStory"]);
if (empty($_POST["allowArt"])) {
    $allowArt = 0;
} else {
    $allowArt = 1;
}


$upid = $_POST['prot_id'];
$updateQ = "UPDATE tbl_212_protest set prot_title='$title', prot_summary='$summary', prot_story='$story', allow_art='$allowArt'";
$update = mysqli_query($connection, $updateQ) or die('Quary update is failed' . mysqli_error($connection));
$upcategories = $_POST["proCate"];
$upcategory = explode(', ', $upcategories);
foreach ($upcategory as $upcat) {
    echo $upcat;
    $checkQuery = "SELECT cat_name FROM tbl_212_categories WHERE cat_name='$upcat'";
    $checkResult = mysqli_query($connection, $checkQuery);
    if (mysqli_num_rows($checkResult) == 0) {
    $update2Q = "UPDATE tbl_212_categories SET cat_name='$upcat';";
    $ucat = mysqli_query($connection, $update2Q) or die('Quary cat is failed' . mysqli_error($connection));
    }
    $ucatidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$upcat';";
    $ucatid = mysqli_query($connection, $ucatidquary) or die('Quary catid update is failed' . mysqli_error($connection));
    if ($ucatid && mysqli_num_rows($ucatid) > 0) {
        $urow = mysqli_fetch_assoc($ucatid);
        $ucid = $urow['cat_id'];
        $uresult2 = strval($ucid);
        $update3Q = "UPDATE tbl_212_prot_cat SET cat_id='$uresult2' WHERE prot_id='$upid';";
        $protcat = mysqli_query($connection, $update3Q) or die('Quary protcat update is failed' . mysqli_error($connection));
    }
    
    // mysqli_free_result($protcat);
    // mysqli_free_result($ucatid);
    // mysqli_free_result($update);
    // mysqli_free_result($checkResult);
    // mysqli_free_result($ucat);

}
header("Location:protest.php?protId=$upid");
