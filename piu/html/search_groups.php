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
    <link rel="stylesheet" href="search_groups.css" />
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
                                    <a href="search_posts.php" class="search-option search-option-posts">
                                        Posts
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="#" class="search-option search-option-groups">
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
                                                <a href="./group_page.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-people bi-people-search" viewBox="0 0 16 16">
                                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./group_page.php">
                                                    <span id="person-name"> MIEIC </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 search-people">
                                        <div class="post-header">
                                            <div class="col-4">
                                            </div>
                                            <div class="col-1">
                                                <a href="./group_page.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-people bi-people-search" viewBox="0 0 16 16">
                                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./group_page.php">
                                                    <span id="person-name"> Moita </span>
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
                                                <a href="./group_page.php">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-people bi-people-search" viewBox="0 0 16 16">
                                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="post-name col-6">
                                                <a href="./group_page.php">
                                                    <span id="person-name"> Manus </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--------------------------------------------->

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>