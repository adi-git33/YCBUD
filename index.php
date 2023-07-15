<?php
include 'db.php';
include 'config.php';

session_start();

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
                        <a href="index.html" id="logo" title="logo"></a>
                    </section>
                    <section id="nav">
                        <nav>
                            <div>
                                <input type="checkbox" class="toggle-menu">
                                <div class="ham"></div>
                                <ul class="menu">
                                    <li><a href="index.html" id="home">Home</a></li>
                                    <li><a href="index.html" id="notif">Notifications</a></li>
                                    <li><a href="index.html" id="messages">Messages</a></li>
                                    <li><a href="index.html" id="protests">Protests</a></li>
                                    <li><a href="index.html" id="uprising">Uprising</a></li>
                                    <li><a href="index.html" id="profile">Profile</a></li>
                                    <li><a href="index.html" id="artOverveiw">Art Overview</a></li>
                                    <li><a href="index.html" id="settings">Settings</a></li>
                                    <li><a href="index.html" id="logout">Log out</a></li>
                                </ul>
                            </div>
                        </nav>
                        <section class='logoM'>
                            <a href="index.html" id="logoM" title="logo"></a>
                        </section>
                        <section id="left-nav">
                            <section class="btns">
                                <a class="btn" href="newProtest.html">New Protest</a>
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
                                aria-expanded="false">
                                <?php
                                echo $_SESSION['name'];
                                ?>
                            </a>
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
                                <li><a class="dropdown-item" href="#">Logout</a></li>
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
                <a href='index.html'>
                    <h1><span class="back"></span>Search: Divorce</h1>
                </a>
            </div>
        </div>
        <?php
        //  $query = "SELECT * FROM tbl_212_categories WHERE cat_name='" . $_GET["cat"] . "'";
        //  $result = mysqli_query($connection,$query);
        //  if(!$result){
        //     die("DB query failed.");
        //  }
        ?>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>Search: Divorce</b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <section class="list">
                            <ul>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<li>
                                        <article class="prots">';
                                    echo '<span>' . $row["post_date"] . '</span>
                                                        <section class="profile">
                                                            <img src="images/fist.png" alt="anonProf" title="anonProf">
                                                        </section>' .
                                        '<h3 class="artTitle"><a href="protest.php?prot_id=' . $row["prot_id"] . '">' . strtoupper($row["prot_title"]) . '</a>' . "|" . '<a href="#">' . $row["name"] . '</a></h3>' .
                                        '<p class="categ"> <a href="#">' . '</a>, <a href="#">Abuse in Family</a>, <a href="#">Violance</a>, <a href="#">LGBTQ</a>, <a href="#">Frustration</a>   <a href="#">Frightened</a>, <a href="#">Lost</a>
                                                        </p>' . '<p class="summary">' . $row["prot_summary"] . '</p>';
                                    echo "</article></li>";
                                }


                                ?>
                                <!-- <li>
                                    <article class="prots">
                                        <span>14 May 2023</span>
                                        <section class="profile">
                                            <img src="images/fist.png" alt="anonProf" title="anonProf">
                                        </section>
                                        <h3 class="artTitle"><a href="protest.html?protId=1">MY HUSBAND ABUSED ME
                                                YESTERDAY</a> | <a href="#"> DANIEL SCHNAPP</a></h3>
                                        <p class="categ"> <a href="#">Divorce</a>, <a href="#">Abuse in Family</a>, <a
                                                href="#">Violance</a>, <a href="#">LGBTQ</a>, <a
                                                href="#">Frustration</a>,
                                            <a href="#">Frightened</a>, <a href="#">Lost</a>
                                        </p>
                                        <p class="summary"> Etiam ut urna nunc. Aliquam pellentesque neque non est
                                            condimentum bibendum. Etiam id lectus eleifend, luctus ligula sit amet,
                                            vehicula magna. Pellentesque ultricies felis luctus sapien egestas commodo.
                                            Nulla aliquet
                                            elementum nulla, sit amet tincidunt felis suscipit vel. Phasellus ultricies,
                                            urna sed porttitor rutrum, quam arcu condimentum metus, nec volutpat justo
                                            augue vitae sem. Etiam sollicitudin, turpis et lobortis
                                            aliquam, sem eros porttitor quam, et ultricies purus tellus at enim. </p>
                                    </article>
                                </li>
                                <li>
                                    <article class="prots">
                                        <span>13 May 2023</span>
                                        <section class="profile">
                                            <img src="images/ronitSearch.png" alt="fist" title="fist">
                                        </section>
                                        <h3 class="artTitle"><a href="protest.html?protId=2">CAN'T GET A GET</a> | <a
                                                href="#">RONIT PERETZ</a></h3>
                                        <p class="categ"><a href="#">Divorce</a>, <a href="#">Wife Abuse</a>, <a
                                                href="#">Abuse in Family</a>, <a href="#">Get</a>, <a
                                                href="#">Violance</a>,
                                            <a href="#">Equality Rights</a>, <a href="#">Israel</a>, <a
                                                href="#">Jewish</a>,
                                            <a href="#">Frustration</a>, <a href="#">Anger</a>
                                        </p>
                                        <p class="summary"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam. </p>
                                    </article>
                                </li>
                                <li>
                                    <article class="prots">
                                        <span>10 May 2023</span>
                                        <section class="profile">
                                            <img src="images/fist.png" alt="fist" title="fist">
                                        </section>
                                        <h3 class="artTitle"><a href="protest.html?protId=3">MY EX-WIFE DOESN'T LET ME
                                                SEE MY CHILDREN </a> | ANONYMOUS</h3>
                                        <p class="categ"><a href="#">Divorce</a>, <a href="#">Cheating</a>, <a
                                                href="#">Get</a>, <a href="#">Israel</a>, <a href="#">Jewish</a>, <a
                                                href="#">Frustration</a>, <a href="#">Anger</a></p>
                                        <p class="summary"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea
                                            commodo consequat. </p>
                                    </article>
                                </li>
                                <li>
                                    <article class="prots">
                                        <span>9 May 2023</span>
                                        <section class="profile">
                                            <img src="images/fist.png" alt="fist" title="fist">
                                        </section>
                                        <h3 class="artTitle"><a href="protest.html?protId=4">MY HUSBAND CHEATED ON ME
                                                AND REFUSES TO GIVE ME A GET </a>| ANONYMOUS</h3>
                                        <p class="categ"><a href="#">Divorce</a>, <a href="#">Cheating</a>, <a
                                                href="#">Get</a>, <a href="#">Israel</a>, <a href="#">Jewish</a>, <a
                                                href="#">Frustration</a>, <a href="#">Anger</a></p>
                                        <p class="summary"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea
                                            commodo consequat. </p>
                                    </article>
                                </li> -->
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
        <footer id="footer-con">
            <span class="homePage"></span>
            <a href="index.html"><span class="searchSelM"></span></a>
            <span class="new-prot"><a href="newProtest.html">+</a></span>
            <span class="uprising"></span>
            <span class="protests"></span>
        </footer>
    </div>
    <script></script>
    <?php
    mysqli_free_result($result);
    ?>
</body>

</html>

<?php
mysqli_close($connection);
?>