<?php
include 'db.php';
include 'config.php';

session_start();

$state = $_POST['state'];

$uid = $_SESSION["user_id"];
$title = mysqli_real_escape_string($connection, $_POST["proTitle"]);
$summary = mysqli_real_escape_string($connection, $_POST["proSum"]);
$story = mysqli_real_escape_string($connection, $_POST["proStory"]);
if (empty($_POST["allowArt"])) {
    $allowArt = 0;
} else {
    $allowArt = 1;
}

if ($state == 'insert') {
    $quary = "INSERT INTO tbl_212_protest (prot_title, prot_summary, prot_story, allow_art) VALUES ('$title', '$summary' , '$story' , '$allowArt');";
    $prot = mysqli_query($connection, $quary) or die('Quary prot is failed' . mysqli_error($connection));
    $getidq = "SELECT prot_id FROM tbl_212_protest ORDER BY prot_id desc limit 1;";
    $protid = mysqli_query($connection, $getidq) or die('Quary protid is failed' . mysqli_error($connection));
    $idrow = mysqli_fetch_assoc($protid);
    $idrow2 = $idrow['prot_id'];
    $pid = strval($idrow2);
    $quaryprot = "INSERT INTO tbl_212_prot_user(prot_id, user_id) VALUES ('$pid','$uid');";
    $protuser = mysqli_query($connection, $quaryprot) or die('Quary protuser is failed' . mysqli_error($connection));

    if ($prot == 1) {
        $pcategories = $_POST["proCate"];
        $pcategory = explode(',', $pcategories);
        foreach ($pcategory as $pcat) {
            $quary2 = "INSERT INTO tbl_212_categories (cat_name)
            VALUES ('$pcat')
            ON DUPLICATE KEY UPDATE cat_name = cat_name;";
            $cat = mysqli_query($connection, $quary2) or die('Quary cat is failed' . mysqli_error($connection));
            $catidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$pcat';";
            $catid = mysqli_query($connection, $catidquary) or die('Quary catid is failed' . mysqli_error($connection));
            if ($catid && mysqli_num_rows($catid) > 0) {
                $row = mysqli_fetch_assoc($catid);
                $cid = $row['cat_id'];
                $result2 = strval($cid);
                $quary3 = "INSERT INTO tbl_212_prot_cat(prot_id,cat_id) values ('$pid','$result2');";
                $protcat = mysqli_query($connection, $quary3) or die('Quary protcat is failed' . mysqli_error($connection));
            }
        }
    }
} else {
    $upid = $_POST['prot_id'];
    $updateQ = "UPDATE tbl_212_protest set prot_title='$title', prot_summary='$summary', prot_story='$story', allow_art='$allowArt'";
    $update = mysqli_query($connection, $updateQ) or die('Quary update is failed' . mysqli_error($connection));
    $upcategories = $_POST["proCate"];
    $upcategory = explode(',', $upcategories);
    foreach ($upcategory as $upcat) {
        $update2Q = "UPDATE tbl_212_categories SET cat_name='$upcat'
        ON DUPLICATE KEY UPDATE cat_name = '$upcat';";
        $ucat = mysqli_query($connection, $update2Q) or die('Quary cat is failed' . mysqli_error($connection));
        $ucatidquary = "SELECT cat_id FROM tbl_212_categories WHERE cat_name='$upcat';";
        $ucatid = mysqli_query($connection, $ucatidquary) or die('Quary catid update is failed' . mysqli_error($connection));
        if ($ucatid && mysqli_num_rows($ucatid) > 0) {
            $urow = mysqli_fetch_assoc($ucatid);
            $ucid = $urow['cat_id'];
            $uresult2 = strval($ucid);
            $update3Q = "UPDATE tbl_212_prot_cat SET cat_id='$uresult2' WHERE prot_id='$upid';";
            $protcat = mysqli_query($connection, $update3Q) or die('Quary protcat update is failed' . mysqli_error($connection));
        }
    
    }
}


header("Location:protest.php?protId=$pid");
?>