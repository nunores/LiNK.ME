<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./css/mobile.css" />
    <link rel="stylesheet" href="./css/post.css" />
    <link rel="stylesheet" href="./css/left_col.css" />
    <link rel="stylesheet" href="search_posts.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <title>LiNK.ME</title>
</head>

<body>
    <header>
        <?php
        include('./templates/navbar.php');
        ?>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php
            include('./templates/left_col.php');
            ?>
            <div class="col-10">
                <div id="center-col">
                    <div class="container-fluid">
                        <div class="row search-options-row">
                            <div class="search-options">
                                <div class="col-3">
                                    <a href="search_people.php" class="search-option search-option-people">
                                        People
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="search-option search-option-posts">
                                        Posts
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="search_groups.php" class="search-option search-option-groups">
                                        Groups
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row people-section">
                            <div class="container-fluid">
                                <!--------------------------------------------->
                                <div class="row people-row">
                                    <div class="col-6 search-people">
                                        <div class="post-header">
                                            <div class="col-4">
                                            </div>
                                            <div class="col-1">
                                                <a href="./other_profile.php">
                                                    <img src="./images/jlopes.png" class="rounded-circle search-profile-pic" alt="Profile picture">
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./post_page.php">
                                                    <span id="name-tag"> @JLopes </span>
                                                    <span id="person-name"> Eu e o Xavier fomos à moita </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 search-people">
                                        <div class="post-header">
                                            <div class="col-4">
                                            </div>
                                            <div class="col-1">
                                                <a href="./other_profile.php">
                                                    <img src="./images/xavierPisco.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./post_page.php">
                                                    <span id="name-tag"> @psico </span>
                                                    <span id="person-name"> Mais um dia mais uma tarde a mamar finos </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row people-row">
                                    <div class="col-6 search-people">
                                        <div class="post-header">
                                            <div class="col-4">
                                            </div>
                                            <div class="col-1">
                                                <a href="./other_profile.php">
                                                    <img src="./images/joao0903.png" class="rounded-circle search-profile-pic" alt="Profile picture">
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./post_page.php">
                                                    <span id="name-tag"> @joao0903 </span>
                                                    <span id="person-name"> Eu e o Xavier :) </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>