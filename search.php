<?php
include 'db.php';
include 'config.php';

session_start();

if (!(isset($_SESSION["user_id"]))) {
    header("Location:login.php");
}


if (isset($_GET['cat_id'])) {
    $category = $_GET["cat_id"];
    $query = "SELECT * from tbl_212_protest as prot
    inner join tbl_212_prot_user as prot_user
    on prot_user.prot_id = prot.prot_id
    inner join tbl_212_users as users
    on prot_user.user_id = users.user_id
    inner join tbl_212_prot_cat as prot_cat 
    on prot_cat.prot_id = prot.prot_id
    inner join tbl_212_categories as cat
    on cat.cat_id = prot_cat.cat_id
    where cat.cat_id = " . $category;
} else {
    $query = "SELECT * from tbl_212_protest as prot
    inner join tbl_212_prot_user as prot_user
    on prot_user.prot_id = prot.prot_id
    inner join tbl_212_users as users
    on prot_user.user_id = users.user_id";
}
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}
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
    <title>You Can't Bring Us Down - Search</title>
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
                                <li><a class="dropdown-item" href="#">Profile</a></li>
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
                    <h1><span class="back"></span>Search</h1>
                </a>
            </div>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>Search</b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <section class="list">
                            <ul>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li>
                                        <article class="prots">';
                                    echo '<span>' . substr($row["post_date"], 0, 10) . '</span>
                                                        <section class="profile">
                                                            <img src="' . $row["img"] . '" alt="anonProf" title="anonProf">
                                                        </section>' .
                                        '<h3 class="artTitle"><a href="protest.php?protId=' . $row["prot_id"] . '">' . $row["prot_title"] . '</a>' . " | " . '<a href="#">' . $row["name"] . '</a></h3>';
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
                                    echo '<p class="summary">' . $row["prot_summary"] . '</p> </article></li>';
                                }
                                ?>
                            </ul>
                        </section>
                    </section>
                    <aside id="aside-con">
                        <div class="search-aside">
                            <div>
                                <input type="checkbox" class="form-check">
                                <label>Art Included</label>
                            </div>
                            <section>
                                <label><span class="sorts">Sort</span></label>
                                <select class="form-select">
                                    <option>Date Posted</option>
                                    <option>Liked</option>
                                    <option>Comments</option>
                                </select>
                            </section>
                            <section>
                                <span class="sorts">Filter</span>
                                <section class="filter">
                                    <section>
                                        <h4>Include</h4>
                                        <label>Locations</label>
                                        <input type="text" class="form-control">
                                        <label>Categories</label>
                                        <input type="text" class="form-control">
                                    </section>
                                    <section>
                                        <h4>Exclude</h4>
                                        <label>Location</label>
                                        <input type="text" class="form-control">
                                        <label>Categories</label>
                                        <input type="text" class="form-control">
                                    </section>
                                </section>
                            </section>
                            <a class="btn sortAnd">Sort and Filter</a>
                        </div>
                    </aside>
                </section>
            </section>
        </main>
        <footer>
            <a href="index.php"> <span class="homePage"></span></a>
            <a href="search.php"><span class="srchm"></span></a>
            <a href="newProtest.php"><span class="new-prot">+</span></a>
            <span class="artFeed"></span>
            <span class="userProf"></span>
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