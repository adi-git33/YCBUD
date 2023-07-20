<?php
include 'db.php';
include 'config.php';

session_start();

if (!(isset($_SESSION["user_id"]))) {
    header("Location:login.php");
}

$userQuery = '';

if (isset($_GET['profId'])) {
    $userQuery = "SELECT * FROM tbl_212_users as users
    where users.user_id=" . $_GET['profId'];

    $userResult = mysqli_query($connection, $userQuery);
    if (!$userResult) {
        die("DB query failed.");
    } else {
        $userRow = mysqli_fetch_assoc($userResult);
    }
    if ($userRow["user_type"] == "artist") {
        $userQuery = "SELECT * FROM tbl_212_users as users
        inner join tbl_212_artist as art
        on users.user_id = art.artist_id
        where art.artist_id=" . $userRow["user_id"];
    }
}
$userResult = mysqli_query($connection, $userQuery);
if (!$userResult) {
    die("DB query failed.");
} else {
    $userRow = mysqli_fetch_assoc($userResult);
}


$query = "SELECT * from tbl_212_protest as prot
    inner join tbl_212_prot_user as prot_user
    on prot_user.prot_id = prot.prot_id
    inner join tbl_212_users as users
    on prot_user.user_id = users.user_id
    limit 3";

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
    <title>
        <?php echo "You Can't Bring Us Down - " . $userRow["name"];
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
                <a href='profile.php?profId=<?php echo $_SESSION["user_id"]; ?>'>
                    <h1><span class="back"></span>
                        <?php
                        echo $userRow['name'];
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
                            echo $userRow['name'];
                            ?>
                        </b></h1>
                </div>
                <section>
                    <section id="main-art">
                        <section id="profCon">
                            <section id="userFlex">
                                <section class="userDetails">
                                    <img src=<?php echo '"' . $userRow["img"] . '"' ?> alt="profile" title="profile">
                                    <section>
                                        <form method="post" action="profileUpdating.php">
                                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" name="fullName" value="<?php echo $userRow['name']; ?>">
                            </div>
                                        <?php
                                        if ($userRow["user_type"] == "artist") {
                                            echo '<div class="form-group">
                                            <label for="descp">About</label>';
                                            echo '<input type="text" class="form-control" name="descp" value="'.$userRow["descp"].'"></div>';
                                        }
                                        ?>
                                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $userRow["email"]?>">
                        </div>
                                        
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name="pass" value="<?php echo $userRow["password"];?>">
                        </div>
                                        <input type="submit" class="btn newBtn" name="profUpdate" value="Save">
                                        </form>
                                    </section>
                                </section>
                            </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </main>
        <footer>
            <a href="index.php"> <span class="homePage"></span></a>
            <a href="search.php"><span class="srchm"></span></a>
            <a href="newProtest.php"><span class="new-prot">+</span></a>
            <span class="artFeed"></span>
            <a href="profile.php?profId=<?php echo $_SESSION["user_id"]; ?>"><span class="userProfSel"></span></a>
        </footer>
    </div>
    <script></script>
    <?php
    mysqli_free_result($result);
    if ($userRow["user_type"] == "artist") {
        mysqli_free_result($artResult);
    } else {
        mysqli_free_result($popularResult);
    }
    ?>
</body>

</html>
<?php
mysqli_close($connection);
?>