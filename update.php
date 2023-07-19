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
$updateQ = "UPDATE tbl_212_protest set prot_title='$title', prot_summary='$summary', prot_story='$story', allow_art='$allowArt' WHERE prot_id='$upid';";
$update = mysqli_query($connection, $updateQ) or die('Quary update is failed' . mysqli_error($connection));
$upcategories = $_POST["proCate"];
$upcategory = explode(', ', $upcategories);
foreach ($upcategory as $upcat) {
    // echo $upcat;
    $quary2 = "INSERT INTO tbl_212_categories (cat_name)
    VALUES ('$upcat')
    ON DUPLICATE KEY UPDATE cat_name = cat_name;";
    $cat = mysqli_query($connection, $quary2) or die('Quary cat is failed' . mysqli_error($connection));
    $ucatidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$upcat';";
    $ucatid = mysqli_query($connection, $ucatidquary) or die('Quary catid update is failed' . mysqli_error($connection));
    if ($ucatid && mysqli_num_rows($ucatid) > 0) {
        $urow = mysqli_fetch_assoc($ucatid);
        $ucid = $urow['cat_id'];
        $uresult2 = strval($ucid);
        $update3Q = "INSERT IGNORE INTO tbl_212_prot_cat(prot_id,cat_id) VALUES ('$upid','$uresult2');";
        $protcat = mysqli_query($connection, $update3Q) or die('Quary protcat update is failed' . mysqli_error($connection));
    }
        $existingCat ="SELECT cat.cat_id FROM tbl_212_categories as cat inner join
        tbl_212_prot_cat as prot_cat on cat.cat_id = prot_cat.cat_id
        inner join tbl_212_protest as prot on prot.prot_id = prot_cat.prot_id
        where prot.prot_id='$upid' AND cat.cat_name='$upcat';";
        $res = mysqli_query($connection, $existingCat) or die('Quary existing cat is failed' . mysqli_error($connection));
        if($res && mysqli_num_rows($res) == 0){
            $drow = mysqli_fetch_assoc($res);
            $dcid = $urow['cat_id'];
            $deleteVal = strval($dcid);
            $deleteQ = "DELETE FROM tbl_212_prot_cat WHERE prot_id='$upid' AND cat_id='$deleteVal';";
            $deleteResult = mysqli_query($connection, $deleteQ) or die('Quary protcat update is failed' . mysqli_error($connection));

        }

    
    // mysqli_free_result($protcat);
    // mysqli_free_result($ucatid);
    // mysqli_free_result($update);
    // mysqli_free_result($checkResult);
    // mysqli_free_result($ucat);

}
header("Location:protest.php?protId=$upid");
