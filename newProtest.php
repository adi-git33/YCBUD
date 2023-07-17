<?php
include 'db.php';
include 'config.php';

session_start();

if (!(isset($_SESSION["user_id"]))) {
    header("Location:login.php");
}

if (array_key_exists("prot_id", $_POST)) {
    $prodId = $_POST["prot_id"];
    $query = "SELECT * FROM tbl_212_protest WHERE port_id=" . $prodId;
    $result = mysqli_query($connection, $query);
    $state = "insert";
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $state = "edit";
    }
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
    <title>You Can't Bring Us Down - New Protest</title>
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
                                    <li><a href="index.php" id="home">Home</a></li>
                                    <li><a href="index.php" id="notif">Notifications</a></li>
                                    <li><a href="index.php" id="messages">Messages</a></li>
                                    <li><a href="index.php" id="protests">Protests</a></li>
                                    <li><a href="index.php" id="uprising">Uprising</a></li>
                                    <li><a href="index.php" id="profile">Profile</a></li>
                                    <li><a href="index.php" id="artOverveiw">Art Overview</a></li>
                                    <li><a href="index.php" id="settings">Settings</a></li>
                                    <li><a href="index.php" id="logout">Log out</a></li>
                                </ul>
                            </div>
                        </nav>
                        <section class='logoM'>
                            <a href="index.php" id="logoM" title="logo"></a>
                        </section>
                        <section id="left-nav">
                            <section class="btns">
                                <a class="btn" href="newProtest.php">New Protest</a>
                                <button class="srch"></button>
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                </form>
                                <button class="notf"></button>
                            </section>
                            <section>
                                <img class="profilePic" src="images/barProf.png" alt="profile" title="profile">
                            </section>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> Bar Buskila </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Messages</a></li>
                                <li><a class="dropdown-item" href="#">Followed Categories</a></li>
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
                    <h1><span class="back"></span>New Protest</h1>
                </a>
            </div>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>New Protest</b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <form id="new-prot" action="protesting.php" method="post" autocomplete="on"
                            class="needs-validation" novalidate>
                            <div id="part1">
                                <section>
                                    <label for="validationCustom01" class="form-label">Protest
                                        Title<span>*</span></label>
                                    <input id="validationCustom01" class="form-control" type="text" name="proTitle"
                                        pattern=".{3,100}" value='<?php if ($state == "edit") {
                                            echo $row["prot_title"];
                                        } ?>' required>
                                    <div class="invalid-feedback"> Title is required and must be between 3 to 100
                                        letters. </div>
                                </section>
                                <section>
                                    <label for="validationCustom02" class="form-label">Protest
                                        Summary<span>*</span></label>
                                    <textarea id="validationCustom02" class="form-control sumCon" name="proSum"
                                        maxlength="500" value='<?php if ($state == "edit") {
                                            echo $row["prot_summary"];
                                        } ?>' required></textarea>
                                    <div class="invalid-feedback"> Summery is required and must have max 500 letters.
                                    </div>
                                </section>
                                <section>
                                    <label for="validationCustom03" class="form-label">Personal Protest
                                        Story<span>*</span></label>
                                    <textarea class="form-control proCon" name="proStory" id="validationCustom03"
                                        maxlength="1500" value='<?php if ($state == "edit") {
                                            echo $row["prot_story"];
                                        } ?>' required></textarea>
                                    <div class="invalid-feedback"> Protest story is required and must have max 1,500
                                        letters. </div>
                                </section>
                                <section class="next">
                                    <button class="btn newBtn" id="nextButton">Choose Categories</button>
                                </section>
                            </div>
                            <div id="part2">
                                <section>
                                    <label for="validationCustom04" class="form-label">Categories<span>*</span></label>
                                    <input class="form-control cat" type="text" name="proCate" id="validationCustom04"
                                        value='
                                        <?php
                                        if ($state == "edit") {
                                            $catQuery = 'SELECT cat.cat_name, cat.cat_id FROM tbl_212_categories as cat INNER JOIN tbl_212_prot_cat as prot_cat on cat.cat_id = prot_cat.cat_id WHERE prot_cat.prot_id = ' . $row["prot_id"];
                                            $catResult = mysqli_query($connection, $catQuery);
                                            if (!$catResult) {
                                                die("DB catQuery failed.");
                                            } else {
                                                echo '<p class="categ">';
                                                $count = 0;
                                                while ($catRow = mysqli_fetch_assoc($catResult)) {
                                                    if ($count == 0) {
                                                        echo $catRow["cat_name"];
                                                        $count++;
                                                    } else {
                                                        echo ', ' . $catRow["cat_name"];
                                                    }
                                                }
                                            }
                                        }
                                        ?>' pattern=".{1,}" required>
                                    <div class="invalid-feedback"> Must have at least one category. </div>
                                </section>
                                <section>
                                    <label>Relevant Categories:</label>
                                    <ul class="categoriesUl">
                                        <li class="categoriesLi">LGBTQ</li>
                                        <li class="categoriesLi">Israel</li>
                                        <li class="categoriesLi">Trans</li>
                                        <li class="categoriesLi">Jewish</li>
                                        <li class="categoriesLi">Frustration</li>
                                    </ul>
                                </section>
                                <section>
                                    <input class="form-check" id="allowArt" type="checkbox" name="allowArt">
                                    <label class="allowArt">Allow Activist Art</label>
                                </section>
                                <section id="artSelection">
                                    <label for="validationCustom05">How many activist arts would you like?</label>
                                    <select name="artSelect" class="form-select" id="validationCustom05">
                                        <option value="Unlimited">Unlimited</option>
                                        <option value="5 ">5</option>
                                        <option value="10 ">10</option>
                                        <option value="15 ">15</option>
                                        <option value="20 ">20</option>
                                        <option value="25 ">25</option>
                                    </select>
                                </section>
                                <section>
                                    <button id="backButton">Back</button>
                                    <input class="btn newBtn" type="submit" name="Protest" value="Protest ">
                                </section>
                            </div>
                        </form>
                    </section>
                    <aside id="aside-con">
                        <section class="prog">
                            <h2>Progress</h2>
                            <section>
                                <section class="circlesCon">
                                    <svg id="circle1" height="100 " width="100 ">
                                        <circle cx="50" cy="50 " r="40 "></circle>
                                        <text x="50 " y="60 ">1</text>
                                    </svg>
                                    <svg id="circle2" height="100 " width="100 ">
                                        <circle cx="50 " cy="50 " r="40 "></circle>
                                        <text x="50 " y="60">2</text>
                                    </svg>
                                </section>
                                <section class="lineCon">
                                    <svg height="5 " width="180 ">
                                        <line x1="0 " y1="0 " x2="180 " y2="0" />
                                    </svg>
                                </section>
                            </section>
                        </section>
                    </aside>
                </section>
            </section>
        </main>
        <footer id="footer-con">
            <span class="homePage"></span>
            <a href="index.php"><span class="srchm"></span></a>
            <span class="new-prot"><a href="newProtest.php">+</a></span>
            <span class="uprising"></span>
            <span class="protests"></span>
        </footer>
    </div>
    <script></script>
    <?php
    if ($state == "edit") {
        mysqli_free_result($result);
        mysqli_free_result($catResult);
    }
    ?>
</body>

</html>
<?php
mysqli_close($connection);
?>