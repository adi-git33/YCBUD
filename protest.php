<?php
include 'db.php';
include 'config.php';

session_start();

if (!(isset($_SESSION["user_id"]))) {
    header("Location:login.php");
}

$protId = $_GET["protId"];
$query = 'SELECT * FROM tbl_212_protest as prot inner join 
    tbl_212_prot_user as prot_user on
    prot_user.prot_id = prot.prot_id
    inner join tbl_212_users as users on
    users.user_id = prot_user.user_id
    where prot.prot_id=' . $protId;

$result = mysqli_query($connection, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else
    die("DB query failed.");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- JQuary -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>
        <?php echo "You Can't Bring Us Down" . $row["prot_title"];
        ?>
    </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div class="sticky-top">
            <header id="head-wrap">
                <section id="header">
                    <section class='deskLogo'>
                        <a href="index.php" id="logo" title="logo"></a>
                    </section>
                    <section id="nav">
                        <nav>
                            <div>
                                <input type="checkbox" class="toggle-menu">
                                <div class="ham"></div>
                                <ul class="menu">
                                    <li><a href="index.php" id="home" class="selected">Home</a></li>
                                    <li><a href="index.php" id="notif">Notifications</a></li>
                                    <li><a href="index.php" id="messages">Messages</a></li>
                                    <li><a href="search.php" id="protests">Protests</a></li>
                                    <?php
                                    if ($_SESSION["user_type"] == "artist") {
                                        echo '<li><a href="index.php" id="artOverveiw">Art Overview</a></li>';
                                    } else {
                                        echo '<li><a href="index.php" id="activist">Activist Art</a></li>';
                                    }
                                    ?>
                                    <li><a href="index.php" id="settings">Settings</a></li>
                                    <li><a href="login.php" id="logout">Log out</a></li>
                                </ul>
                            </div>
                        </nav>
                        <form class="searchCon" role="search">
                            <input class="seachInput" type="search" placeholder="Search" aria-label="Search">
                        </form>
                        <section class='logoM'>
                            <a href="index.php" id="logoM" title="logo"></a>
                        </section>
                        <section id="left-nav">
                            <section class="btns">
                                <a class="btn" href="newProtest.php">New Protest</a>
                                <button class="notf"></button>
                            </section>
                            <section>
                                <img src=<?php echo '"' . $_SESSION["img"] . '"' ?> alt="profile" title="profile">
                            </section>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> <?php
                                echo $_SESSION['name'];
                                ?> </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="profile.php?profId=<?php echo $_SESSION["user_id"]; ?>">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Messages</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </section>
                    </section>
                </section>
            </header>
            <section class="line">
                <svg width="100%" height="1vh">
                    <line x1="0" y1="0" x2="100%" y2="0"></line>
                </svg>
            </section>
            <div class='pageh'>
                <a href='index.php'>
                    <h1><span class="back"></span>
                        <?php
                        echo $row["prot_title"];
                        ?>
                    </h1>
                </a>
            </div>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>
                            <?php
                            echo $row["prot_title"];
                            ?>
                        </b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <section id="protest">
                            <article class="prots">
                                <span>10 May 2023</span>
                                <section class="profile">
                                    <?php
                                    echo '<img src="' . $row["img"] . '" alt="anonProf">';
                                    ?>
                                </section>
                                <?php echo '<h3 class="artTitle"><a href="protest.php?protId=' . $row["prot_id"] . '">' . $row["prot_title"] . '</a> | <a href="profile.php?profId=' . $row["user_id"] . '">' . $row["name"] . '</a></h3>'; ?>
                                <?php
                                $catQuery = 'SELECT cat.cat_name, cat.cat_id FROM tbl_212_categories as cat INNER JOIN tbl_212_prot_cat as prot_cat on cat.cat_id = prot_cat.cat_id WHERE prot_cat.prot_id = ' . $row["prot_id"];
                                $catResult = mysqli_query($connection, $catQuery);
                                if (!$catResult) {
                                    die("DB catQuery failed.");
                                } else {
                                    echo '<p class="categ">';
                                    $count = 0;
                                    while ($catRow = mysqli_fetch_assoc($catResult)) {
                                        if ($count == 0) {
                                            echo '<a href="search.php?catId=' . $catRow["cat_id"] . '">' . $catRow["cat_name"] . '</a>';
                                            $count++;
                                        } else {
                                            echo ', <a href="search.php?catId=' . $catRow["cat_id"] . '">' . $catRow["cat_name"] . '</a>';
                                        }
                                    }
                                    echo '</p>';
                                }
                                ?>
                                <p class="summary">
                                    <?php
                                    echo $row["prot_story"];
                                    ?>
                                </p>
                            </article>
                            <?php if (($_SESSION["user_type"] == "artist") && ($_SESSION["user_id"] != $row["user_id"])) {
                                echo '<section class="reserveBtn">
                                        <section class="icon">
                                        </section>
                                        <a href="uploadArt.php?protId=' . $row['prot_id'] . '">Upload Art</a>
                                    </section>';
                            } ?>
                            <section class="artGal">
                                <section class="icon"></section>
                                <a href="">Art gallary</a>
                            </section>
                            <section class='postTools'>
                                <?php
                                if (($_SESSION["user_id"] == $row["user_id"])) {
                                    echo '<section class="billMobile">
                                    <a href="#" id="billBtmMobile">Billboard</a>
                                </section>
                                <section class="editMobile">
                                    <a href="newProtest.php?protId=' . $row["prot_id"] . '" id="editBtmMobile">Edit</a>
                                </section>
                                <section class="dltMobile">
                                    <a href="delete.php?protId=' . $row['prot_id'] . '" id="dltBtmMobile">Delete</a>
                                </section>';
                                }
                                echo '
                
                                <section class="postToolsBtn">
                                    <button id="likeButton" class="Like"></button>
                                    <span id="likesCount">' . $row['likes'] . '</span>
                                </section>
                                <section class="cmntMobile">
                                    <button id="cmntBtmMobile" class="cmntBtmMobUnSel"></button>
                                    <span>Comment</span>
                                </section>
                                <section class="postToolsBtn">
                                    <button id="followBtn"></button>
                                    <span>Follow</span>
                                </section>
                                <section class="postToolsBtn">
                                    <button id="muteBtn"></button>
                                    <span>Mute</span>
                                </section>';
                                ?>
                            </section>
                            <section class="line">
                                <svg width="100%" height="1vh">
                                    <line x1="2%" y1="0" x2="98%" y2="0"></line>
                                </svg>
                            </section>
                            <form id="cmnInput" class="commentSection">
                                <label class="commentSection">Leave a Comment</label>
                                <textarea id="cmnt" class="form-control commentSection"
                                    placeholder="Type here"></textarea>
                                <input id="sbmcm" class="cmntBtnDisabled commentSection" type="submit" name="Comment"
                                    value="Comment">
                            </form>
                            <section class="line">
                                <svg width="100%" height="1vh">
                                    <line x1="2%" y1="0" x2="98%" y2="0"></line>
                                </svg>
                            </section>
                            <section id='comments'>
                                <section class='cmnts'>
                                    <section>
                                        <?php
                                        if ($row["likes"] > 4) {
                                            echo '<span>All Comments (1)</span>';
                                        } else {
                                            echo '<span>All Comments (0)</span>';
                                        } ?>
                                    </section>
                                    <select name="commSort" class="form-select">
                                        <option value="acsending">Ascending</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="newst">Newst</option>
                                        <option value="author">Author Only</option>
                                    </select>
                                </section>
                                <section class='cmntList'>
                                    <?php if ($row["likes"] > 4) {
                                        echo '<section class="cmntGrid">
                                                 <section class="cmntProf">
                                                     <img src="images/anonM.png" alt="anon" title="anon">
                                                </section>
                                                <a class="user" href="#">ANONYMOUS</a>
                                                <p class="cmntText"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate
                                                commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed
                                                eleifend tristique, tortor mauris molestie elit! Quis autem vel eum iure
                                                reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                                consequatur. </p>
                                            </section>';
                                    } else {
                                        echo '<span>There are not comments yet.</span>';
                                    }
                                    ?>
                                </section>
                            </section>
                        </section>
                    </section>
                    <aside id="aside-con">
                        <section class='protTools'>
                            <?php
                            if (($_SESSION["user_type"] == "artist") && ($_SESSION["user_id"] != $row["user_id"]) && ($row["allow_art"] == 1)) {
                                echo '<div class="artSlot">
                                <svg height="80px" width="2px" class="startLine">
                                    <line x1="0" y1="0" x2="0" y2="100%"></line>
                                </svg>
                                <section class="tool-con">
                                    <a href="uploadArt.php?protId=' . $row['prot_id'] . '">Upload Art</a>
                                    <section class="icon"></section>
                                </section>
                                <svg height="80px" width="2px" class="endLine">
                                    <line x1="0" y1="0" x2="0" y2="100%"></line>
                                </svg>
                            </div>';
                            } else if (($_SESSION["user_id"] == $row["user_id"])) {
                                echo '<div class="billboard">
                                    <svg height="80px" width="2px" class="startLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class="tool-con">
                                        <a href="#">Billboard Protests</a>
                                        <section class="icon">
                                        </section>
                                    </section>
                                    <svg height="80px" width="2px" class="endLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>
                                <div class="editBtn">
                                    <svg height="80px" width="2px" class="startLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class="tool-con">
                                        <a href="newProtest.php?protId=' . $row["prot_id"] . '">Edit</a>
                                        <section class="icon">
                                        </section>
                                    </section>
                                    <svg height="80px" width="2px" class="endLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>
                                <div class="deleteBtn">
                                    <svg height="80px" width="2px" class="startLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class="tool-con">
                                        <a href="delete.php?protId=' . $row['prot_id'] . '">Delete</a>
                                        <section class="icon">
                                        </section>
                                    </section>
                                    <svg height="80px" width="2px" class="endLine">
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>';
                            }
                            ?>
                            <section class='postActivist'>
                                <h2>Activist Arts</h2>
                                <?php
                                if ($row["allow_art"] == 0) {
                                    echo '<span>No Art Allowed</span>';
                                } else {
                                    $artQuery = "SELECT * FROM tbl_212_prot_art WHERE prot_id=" . $row["prot_id"] . " LIMIT 4";
                                    $artResult = mysqli_query($connection, $artQuery);
                                    echo "<section class='artGrid'>";
                                    if ($artResult) {
                                        while ($artRow = mysqli_fetch_assoc($artResult)) {
                                            echo '<section class="artBox">
                                                    <img src="' . $artRow["art_path"] . '" class="rounded">
                                                    </section>';
                                        }
                                        echo "</section>";
                                        mysqli_free_result($artResult);
                                    } else {
                                        die("DB query failed.");
                                    }
                                    $countQuery = "SELECT *, count(*) AS c FROM tbl_212_prot_art WHERE prot_id=" . $row["prot_id"];
                                    $countResult = mysqli_query($connection, $countQuery);
                                    if ($countResult) {
                                        $countRow = mysqli_fetch_assoc($countResult);
                                        if ($countRow["c"] > 0) {
                                            echo '<div><span class="attach"></span><span> ' . $countRow["c"] . ' Art Attached</span></div></section>';
                                        } else {
                                            echo '<div><span>No Art Attached</span></div></section>';
                                        }
                                        mysqli_free_result($countResult);
                                    } else {
                                        die("DB query failed.");
                                    }
                                }
                                ?>
                            </section>
                        </section>
                    </aside>
                </section>
            </section>
        </main>
        <footer>
            <a href="index.php"> <span class="homePage"></span></a>
            <a href="search.php"><span class="srchm"></span></a>
            <a href="newProtest.php"><span class="new-prot">+</span></a>
            <span class="artFeed"></span>
            <a href="profile.php?profId=<?php echo $_SESSION["user_id"]; ?>"><span class="userProf"></span></a>
        </footer>
    </div>
    <script></script>
    <?php
    mysqli_free_result($result);
    mysqli_free_result($catResult);

    ?>
</body>

</html>
<?php
mysqli_close($connection);
?>