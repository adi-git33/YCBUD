<?php
include 'db.php';
include 'config.php';

session_start();

if (!empty($_POST["loginMail"])) {
    $query = "SELECT * FROM tbl_212_users WHERE email='"
        . $_POST["loginMail"]
        . "' and password='"
        . $_POST["loginPass"] . "'";
    // echo $query; to check the db link

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["name"] = $row['name'];
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["user_type"] = $row['user_type'];
        header('Location: ' . URL);
    } else {
        $message = "Invalid Email or Password!";
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
                        <a href="index.html" id="logo" title="logo"></a>
                    </section>
                    <section class='logoM'>
                        <a href="index.html" id="logoM" title="logo"></a>
                    </section>
                </section>
                </section>
            </header>
            <section class="line">
                <svg width="100%" height="1vh">
                    <line x1="0" y1="0" x2="100%" y2="0"></line>
                </svg>
            </section>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div class="login">
                    <div class="titles">
                        <h1 class="selected"><a href="login.php">Login</a></h1>
                        <h2><a href="sign.php">Sign Up</a></h2>
                    </div>
                    <form action="#" method="post" id="frmlg">
                        <div class="form-group">
                            <label for="loginMail">Email</label>
                            <input type="email" class="form-control" name="loginMail" id="loginMail"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="loginPass">Password</label>
                            <input type="password" class="form-control" name="loginPass" id="loginPass"
                                placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn newBtn">Login</button>
                        <div class="error-message">
                            <?php if (isset($message)) {
                                echo $message;
                            } ?>
                        </div>
                    </form>
            </section>
            <div class="logProt"></div>
        </main>
    </div>
    <script></script>
</body>

</html>
<?php
mysqli_close($connection);
?>