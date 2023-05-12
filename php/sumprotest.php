<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- JQuary -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="faviconb.ico">
    <title>You Can't Bring Us Down</title>
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
                    <section>
                        <a href="index.html" id="logo" title="logo"></a>
                    </section>
                    <section id="nav">
                        <nav>
                            <ul>
                                <li><a href="index.html" id="home">Home</a></li>
                                <li><a href="index.html" id="protests">Protests</a></li>
                                <li><a href="index.html" id="uprising">Uprising</a></li>
                                <li><a href="index.html" id="profile">Profile</a></li>
                                <li><a href="index.html" id="artOverveiw">Art Overview</a></li>
                            </ul>
                        </nav>
                        <section id="left-nav">
                            <section class="btns">
                                <button class="new-prot"><a href="newProtest.html">New Protest</a></button>
                                <button class="srch"></button>
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                </form>
                                <button class="notf"></button>
                            </section>
                            <section>
                                <img class="profilePic" src="images/ronitProf.png" alt="profile" title="profile">
                            </section>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Bar Buskila </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Messages</a></li>
                                <li><a class="dropdown-item" href="#">Followed Categories</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                            </ul>
                        </section>
                    </section>
                </section>
            </header>
            <section class="line">
                <svg width="100%" height="1vh">
                    <line x1="0" y1="0" x2="100%" y2="0">
                </svg>
            </section>
        </div>
        <main id="main-wrap">
            <section id="contant">
                <div>
                    <h1><b>
                        <?php echo $_GET["proTitle"]?></b></h1>
                </div>
                <section>
                    <section id="main-con">
                        <section id="protest">
                            <article class="prots">
                                <span>13 May 2023</span>
                                <section class="profile">
                                    <img src="images/ronitSearch.png" alt="fist" title="fist">
                                </section>
                                <h3> <?php $pn = $_GET["proTitle"];
                                $cpn = strtoupper($pn);
                                echo $cpn ; ?> | <a href="#">RONIT PERETZ</a></h3>
                                <p class="categ">
                                    <?php 
                                    if(isset($pcategories['proCate'])){
                                        // $category = $categories['proCate'];
                                        $pcategory = explode(',', $pcategories);
                                        foreach ($pcategory as $pcat){
                                            echo '<a href="#"' . $pcat . '</a>' . ', ';
                                            // echo  $pcat . ', ';
                                    }
                                    }
                                    else echo "Y NO WORK";
                                    // $pcategories =
                                    //   echo $_GET["proCate"];
                                    // } 
                                    ?>
                                </p>
                                <p class="summary"><?php echo $_GET["proStory"]; ?> </p>
                            </article>
                            <section>
                                <button id="likeButton" class="Like"></button>
                                <span id="likesCount">0</span>
                            </section>
                            <section class="line">
                                <svg width="100%" height="1vh">
                                    <line x1="2%" y1="0" x2="98%" y2="0">
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
                                    <!-- <span>There are not comments yet.</span> -->
                                    <section class="cmntGrid">
                                        <section class="cmntProf">
                                            <img src="images/fist.png" alt="anon" title="anon">
                                        </section>
                                        <span class="user" href="#">ANONYMOUS</a></span>
                                        <p class="cmntText"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend
                                            tristique, tortor mauris molestie elit! Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur. </p>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                    <aside id="aside-con">
                        <section class='protTools'>
                            <button class="billboard">
                                <span>Billboard Protests</span>
                                <section>
                                </section>
                            </button>
                            <button class='editBtn'>
                                <span>Edit</span>
                                <section>
                                </section>
                            </button>
                            <button class='deleteBtn'>
                                <span>Delete</span>
                                <section>
                                </section>
                            </button>
                            <section class='activistArt'>
                                <span>
                                    <?php if(isset($_GET["allowArt"])){
                                        $artSelect =  $_GET["artSelect"];
                                        if($artSelect == "Unlimited"){
                                            echo 'No Art Limitation';
                                        }
                                        else
                                        echo 'Art Slots :' . $artSelect;
                                    } 
                                    else echo 'No art allowed' ?>
                                </span>
                                <section>
                                    <h3>Activist Arts</h3>
                                </section>
                            </section>
                        </section>
                    </aside>
                </section>
            </section>
        </main>
    </div>
</body>

</html>