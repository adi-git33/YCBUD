<?php
include 'db.php';
include 'config.php';

$query = "SELECT DISTINCT * FROM tbl_212_protest AS prot INNER JOIN tbl_212_prot_user AS prot_user ON prot_user.prot_id = prot.prot_id
    INNER JOIN tbl_212_users AS users ON prot_user.user_id = users.user_id";

if (isset($_POST["artInclude"])) {
    $artInclude = mysqli_real_escape_string($connection, $_POST["artInclude"]);
    $query .= " WHERE allow_art=1";
} else {
    $query .= " WHERE allow_art=1 OR allow_art=0";
}

if (isset($_POST["sort"])) {
    $sortBy = mysqli_real_escape_string($connection, $_POST["sort"]);
    if ($sortBy == "dateA")
        $query .= " ORDER BY prot.post_date ASC";
    else if ($sortBy == "dateD")
        $query .= " ORDER BY prot.post_date DESC";
    else if ($sortBy == "likeA")
        $query .= " ORDER BY prot.likes ASC";
    else if ($sortBy == "likeD")
        $query .= " ORDER BY prot.likes DESC";
}

$query .= " LIMIT 30";

// echo $query;

$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}

$list = '<ul>';

while ($row = mysqli_fetch_assoc($result)) {
    $list .= '<li><article class="prots">';
    $list .= '<span>' . substr($row["post_date"], 0, 10) . '</span><section class="profile"><img src="' . $row["img"] . '" alt="anonProf" title="anonProf"></section>' .
        '<h3 class="artTitle"><a href="protest.php?protId=' . $row["prot_id"] . '">' . $row["prot_title"] . '</a>' . " | " . '<a href="#">' . $row["name"] . '</a></h3>';
    $catQuery = 'SELECT cat.cat_name, cat.cat_id FROM tbl_212_categories as cat INNER JOIN tbl_212_prot_cat as prot_cat on cat.cat_id = prot_cat.cat_id WHERE prot_cat.prot_id = ' . $row["prot_id"];
    $catResult = mysqli_query($connection, $catQuery);
    if (!$catResult) {
        die("DB catQuery failed.");
    } else {
        $list .= '<p class="categ">';
        $count = 0;
        while ($catRow = mysqli_fetch_assoc($catResult)) {
            if ($count == 0) {
                $list .= '<a href="search.php?catId=' . $catRow["cat_id"] . '">' . $catRow["cat_name"] . '</a>';
                $count++;
            } else {
                $list .= ', <a href="search.php?catId=' . $catRow["cat_id"] . '">' . $catRow["cat_name"] . '</a>';
            }
        }
        $list .= '</p>';
    }
    $list .= '<p class="summary">' . $row["prot_summary"] . '</p> <section class="postToolsBtn">
    <button id="likeButton" class="Like"></button>
    <span id="likesCount">' . $row['likes'] . '</span>
    </section>';
    $list .= '</article></li>';
}
$list .= '</ul>';

// echo $list;
$response = array('retVal' => $list);
echo json_encode($response);

mysqli_free_result($result);
// mysqli_free_result($catResult);

mysqli_close($connection);



?>