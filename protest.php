<?php 
// include 'db.php';
// include 'config.php';

// session_start();

	//get data from DB
	// $protId = $_GET["prot_id"];
	// $query 	= "SELECT * FROM tbl_212_protest where id=" . $protId;
	// // echo $query;
	// $result = mysqli_query($connection, $query);
	// if($result) {
	// 	$row 	= mysqli_fetch_assoc($result);//there is only 1 with id=X
	// }
	// else die("DB query failed.");
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
    <title>You Can't Bring Us Down - Can't get a Get </title>
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
                    <h1><span class="back"></span>Can't get a Get</h1>
                </a>
            </div>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>
                        Can't get a Get
                        <?php 
                        // echo $row["prot_title"];
                        ?>
                    </b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <section id="protest">
                            <article class="prots">
                                <span>10 May 2023</span>
                                <section class="profile">
                                    <img src="images/ronitSearch.png" alt="fist" title="fist">
                                </section>
                                <h3 class='artTitle'> CAN'T GET A GET
                                <?php 
                                // echo strtoupper($row["prot_title"]);
                                ?>    
                                | <a href="#">RONIT PERETZ

                                <?php // echo strtoupper($row["user_name"]); ?>
                                </a></h3>
                                <p class="categ"><a href="#">Divorce</a>, <a href="#">Wife Abuse</a>, <a href="#">Abuse
                                        in Family</a>, <a href="#">Get</a>, <a href="#">Violance</a>, <a
                                        href="#">Equality Rights</a>, <a href="#">Israel</a>, <a href="#">Jewish</a>, <a
                                        href="#">Frustration</a>, <a href="#">Anger</a>
                                </p>
                                <p class="summary">
                                <?php
                                // echo $row["prot_story"];
                                ?>    
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                    sunt in culpa qui officia deserunt mollit anim id est
                                    laborum." Section 1.10.32 of "de Finibus Bonorum et Malorum", quaerat voluptatem.
                                    "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae
                                    ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos qui ratione voluptatem
                                    sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                                    labore et dolore magnam aliquam quaerat voluptatem. Ut
                                    enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                                    laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure
                                    reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                    consequatur. </p>
                            </article>
                            <section class='postTools'>
                                <section class="postToolsBtn">
                                    <button id="likeButton" class="Like"></button>
                                    <span id="likesCount">5</span>
                                </section>
                                <section class='cmntMobile'>
                                    <button id="cmntBtmMobile" class="cmntBtmMobUnSel"></button>
                                    <span>Comment</span>
                                </section class="postToolsBtn">
                                <section>
                                    <button id="followBtn"></button>
                                    <span>Follow</span>
                                </section>
                                <section class="postToolsBtn">
                                    <button id="muteBtn"></button>
                                    <span>Mute</span>
                                </section>
                            </section>
                            <section class="line">
                                <svg width="100%" height="1vh">
                                    <line x1="2%" y1="0" x2="98%" y2="0"></line>
                                </svg>
                            </section>
                            <form id="cmnInput" class="commentSection">
                                <label class="commentSection">Leave a Comment</label>
                                <textarea id="cmnt" class="form-control commentSection" placeholder="Type here"></textarea>
                                <input id="sbmcm" class="cmntBtnDisabled commentSection" type="submit" name="Comment" value="Comment">
                            </form>
                            <section class="line">
                                <svg width="100%" height="1vh">
                                    <line x1="2%" y1="0" x2="98%" y2="0"></line>
                                </svg>
                            </section>
                            <section id='comments'>
                                <section class='cmnts'>
                                    <section>
                                        <span>All Comments (1)</span>
                                    </section>
                                    <select name="commSort" class="form-select">
                                        <option value="acsending">Ascending</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="newst">Newst</option>
                                        <option value="author">Author Only</option>
                                    </select>
                                </section>
                                <section class='cmntList'>
                                    <span class='displayNone'>There are not comments yet.</span>
                                    <section class="cmntGrid">
                                        <section class="cmntProf">
                                            <img src="images/fist.png" alt="anon" title="anon">
                                        </section>
                                        <a class="user" href="#">ANONYMOUS</a>
                                        <p class="cmntText"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate
                                            commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed
                                            eleifend
                                            tristique, tortor mauris molestie elit! Quis autem vel eum iure
                                            reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                            consequatur. </p>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                    <?php 
			        // mysqli_free_result($result);
                    ?>
                    <aside id="aside-con">
                        <section class='protTools'>
                            <div class="artSlot">
                                <svg height="80px" width="2px" class='startLine'>
                                    <line x1="0" y1="0" x2="0" y2="100%"></line>
                                </svg>
                                <section class='tool-con'>
                                    <span>Reserve Art Slot</span>
                                    <section class='icon'>
                                    </section>
                                </section>
                                <svg height="80px" width="2px" class='startLine'>
                                    <line x1="0" y1="0" x2="0" y2="100%"></line>
                                </svg>
                            </div>
                            <section class='activistArt'>
                                <span>No Art Limitation</span>
                                <section>
                                    <h3>Activist Arts</h3>
                                    <section class='artGrid'>
                                        <section class='artBox1'>
                                        </section>
                                        <section class='artBox2'>
                                        </section>
                                    </section>
                                    <div>
                                        <span class='attach'></span><span> 2 Art Attached</span>
                                        <span class='displayNone'>No Art Attached</span>
                                    </div>
                                </section>
                            </section>
                        </section>
                    </aside>
                </section>
            </section>
        </main>
        <footer id="footer-con">
            <span class="homePage"></span>
            <a href="index.html"><span class="srchm"></span></a>
            <span class="new-prot"><a href="newProtest.html">+</a></span>
            <span class="uprising"></span>
            <span class="protests"></span>
        </footer>
    </div>
    <script></script>
</body>

</html>
<?php
//close DB connection
// mysqli_close($connection);
?>