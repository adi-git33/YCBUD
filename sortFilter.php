<?php
include 'db.php';
include 'config.php';

$count = 0;
$query = "SELECT DISTINCT * from tbl_212_protest as prot
    inner join tbl_212_prot_user as prot_user
    on prot_user.prot_id = prot.prot_id
    inner join tbl_212_users as users
    on prot_user.user_id = users.user_id
    inner join tbl_212_prot_cat as prot_cat 
    on prot_cat.prot_id = prot.prot_id
    inner join tbl_212_categories as cat
    on cat.cat_id = prot_cat.cat_id";
$first = 0;
$zero = 0;
if (isset($_POST["include"])) {
    $include = isset($_POST["include"]) ? $_POST["include"] : array();
    if (count($include) > 0) {
        foreach ($include as $i) {
            if ($i == 0) {
                $zero = 1;
            }
        }
        if ($zero == 0) {
            if ($count > 0)
                $query .= " AND ";
            else
                $query .= " Where ";

            $query .= "cat.cat_id IN(";
            foreach ($include as $i) {
                if ($first == 0) {
                    $query .= $i;
                    $first++;
                }
                if ($i == 0)
                    $query .= $i;
                else
                    $query .= ", " . $i;
            }
            $query .= ")";
            $count++;
        }

    }
}

$first = 0;
$zero = 0;
if (isset($_POST["exclude"])) {
    $exclude = isset($_POST["exclude"]) ? $_POST["exclude"] : array();
    if (count($exclude) > 0) {
        foreach ($exclude as $i) {
            if ($i == 0) {
                $zero = 1;
            }
        }
        if ($zero == 0) {
            if ($count > 0)
                $query .= " AND ";
            else
                $query .= " Where ";

            $query .= "not(cat.cat_id IN(";
            foreach ($exclude as $i) {
                if ($first == 0) {
                    $query .= $i;
                    $first++;
                } else
                    $query .= ", " . $i;
            }
            $query .= "))";
            $count++;
        }
    }
}

if (isset($_POST["artInclude"])) {
    $artInclude = mysqli_real_escape_string($connection, $_POST["artInclude"]);
    if ($artInclude == 1) {
        if ($count > 0)
            $query .= " AND allow_art=1";
        else
            $query .= " WHERE allow_art=1";
        $count++;
    }
}

if (isset($_POST["sort"])) {
    $sortBy = mysqli_real_escape_string($connection, $_POST["sort"]);
    if ($sortBy == "dateA")
        $query .= " ORDER BY prot.post_date ASC";
    else
        $query .= " ORDER BY prot.post_date DESC";
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
    $list .= '<p class="summary">' . $row["prot_summary"] . '</p> </article></li>';
}
$list .= '</ul>';

// echo $list;

// echo '{"retVal":"'. $list. '"}';
// $response = array('retVal' => $list);
// echo json_encode($response);

$response = array('retVal' => $list);

echo json_encode($response); 

mysqli_free_result($result);
mysqli_free_result($catResult);

mysqli_close($connection);


?>