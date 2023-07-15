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
    <!-- GM API -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHd-5DaClyrVV-arebSbHerUfcPzsmyQc&callback=initMap">
</script>
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
                                    <li><a href="index.php" id="home">Home</a></li>
                                    <li><a href="index.php" id="notif">Notifications</a></li>
                                    <li><a href="index.php" id="messages">Messages</a></li>
                                    <li><a href="index.php" id="protests">Protests</a></li>
                                    <li><a href="index.php" id="uprising">Uprising</a></li>
                                    <li><a href="index.php" id="profile">Profile</a></li>
                                    <li><a href="index.php" id="artOverveiw">Art Overview</a></li>
                                    <li><a href="index.php" id="settings">Settings</a></li>
                                    <li><a href="login.php" id="logout">Log out</a></li>
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
                                <img class="profilePic" src=<?php echo '"' . $_SESSION["img"] . '"' ?> alt="profile" title="profile">
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
                    <h1><span class="back"></span>Search: Divorce</h1>
                </a>
            </div>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>Home</b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <h3>Billboard</h3>
                        <div id="map"></div>
                        <div class='billbrdList'>
                            <div class="bilbrd">
                                <img src="/images/uploads/BringJusticeback.png" alt="bringJustice">
                                <section>
                                    <h6>Bringing Justice Back</h6>
                                    <span>Art by ipsum loren</span>
                                    <p>Azrieli Towers<br>Ipsum Loren</p>
                                </section>
                            </div>
                        </div>
                    </section>
                    <aside id="aside-con">
                    </aside>
                </section>
            </section>
        </main>
        <footer id="footer-con">
            <span class="homePage"></span>
            <a href="index.php"><span class="searchSelM"></span></a>
            <span class="new-prot"><a href="newProtest.php">+</a></span>
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