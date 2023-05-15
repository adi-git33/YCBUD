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
        <script src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>You Can't Bring Us Down - New Post </title>
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
                                    <img class="profilePic" src="../images/barProf.png" alt="profile" title="profile">
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
                        <h1><span class="back"></span>
                            <?php echo $_GET["proTitle"] ?>
                        </h1>
                    </a>
                </div>
            </div>
            <main id="main-wrap">
                <section id="contant">
                    <div>
                        <h1><b>
                                <?php echo $_GET["proTitle"] ?>
                            </b></h1>
                    </div>
                    <section>
                        <section id="main-con">
                            <section id="protest">
                                <article class="prots">
                                    <span>13 May 2023</span>
                                    <section class="profile">
                                        <img src="../images/barProf.png" alt="fist" title="fist">
                                    </section>
                                    <h3 class='artTitle'>
                                        <?php $pn = $_GET["proTitle"];
                                        $cpn = strtoupper($pn);
                                        echo $cpn; ?> | <a href="#">bar buskila</a>
                                    </h3>
                                    <p class="categ">
                                        <?php
                                        $pcategories = $_GET["proCate"];
                                        $pcategory = explode(',', $pcategories);
                                        foreach ($pcategory as $pcat) {
                                            echo '<a href="#"' . $pcat . '</a>';
                                            echo $pcat . ', ';
                                        }
                                        ?>
                                        </a>
                                    </p>
                                    <p class="summary">
                                        <?php echo $_GET["proStory"]; ?>
                                    </p>
                                </article>
                                <section class='postTools'>
                                    <section>
                                        <button id="likeButton" class="Like"></button>
                                        <span id="likesCount">0</span>
                                    </section>
                                    <section class='cmntMobile'>
                                        <button id="cmntBtmMobile" class="cmntBtmMobUnSel"></button>
                                        <span>Commnet</span>
                                    </section>
                                    <section class='billMobile'>
                                        <button id="billBtmMobile"></button>
                                        <span>Billboard</span>
                                    </section>
                                    <section class='editMobile'>
                                        <button id="editBtmMobile"></button>
                                        <span>Edit</span>
                                    </section>
                                    <section class='dltMobile'>
                                        <button id="dltBtmMobile"></button>
                                        <span>Delete</span>
                                    </section>
                                </section>
                                <section class="line">
                                    <svg width="100%" height="1vh">
                                        <line x1="2%" y1="0" x2="98%" y2="0"></line>
                                    </svg>
                                </section>
                                <form>
                                    <label>Leave a Comment</label>
                                    <textarea class="form-control" placeholder="Type here"></textarea>
                                    <input class="cmntBtnDisabled" type="submit" name="Comment" value="Comment">
                                </form>
                                <section class="line">
                                    <svg width="100%" height="1vh">
                                        <line x1="2%" y1="0" x2="98%" y2="0">
                                    </svg>
                                </section>
                                <section id='comments'>
                                    <section class='cmnts'>
                                        <section>
                                            <span>All Comments (0)</span>
                                        </section>
                                        <select name="commSort" class="form-select">
                                            <option value="acsending">Ascending</option>
                                            <option value="oldest">Oldest</option>
                                            <option value="newst">Newst</option>
                                            <option value="author">Author Only</option>
                                        </select>
                                    </section>
                                    <section class='cmntList'>
                                        <span>There are not comments yet.</span>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <aside id="aside-con">
                            <section class='protTools'>
                                <div class="billboard">
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class='tool-con'>
                                        <span>Billboard Protests</span>
                                        <section class='icon'>
                                        </section>
                                    </section>
                                    <section class="icon">
                                    </section>
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>
                                <div class='editBtn'>
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class='tool-con'>
                                        <span>Edit</span>
                                        <section class='icon'>
                                        </section>
                                    </section>
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>
                                <div class='deleteBtn'>
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                    <section class='tool-con'>
                                        <span>Delete</span>
                                        <section class='icon'>
                                        </section>
                                    </section>
                                    <svg height="80px" width="2px" class='startLine'>
                                        <line x1="0" y1="0" x2="0" y2="100%"></line>
                                    </svg>
                                </div>
                                <section class='activistArt'>
                                    <span>
                                        <?php if (isset($_GET["allowArt"])) {
                                            $artSelect = $_GET["artSelect"];
                                            if ($artSelect == "Unlimited") {
                                                echo 'No Art Limitation';
                                            } else
                                                echo 'Art Slots :' . $artSelect;
                                        } else
                                            echo 'No Art Allowed' ?>
                                        </span>
                                        <section>
                                            <h3>Activist Arts</h3>
                                            <div>
                                                <span class='attach'></span><span> No Art Attached</span>
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
                    <a href="index.html"><span class="searchSelM"></span></a>
                    <span class="new-prot"><a href="newProtest.html">+</a></span>
                    <span class="uprising"></span>
                    <span class="protests"></span>
                </footer>
            </div>
        </body>

        </html>