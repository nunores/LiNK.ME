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
    <link rel="stylesheet" href="about.css" />
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
            <div class="col-12">
                <div id="center-col">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="about">
                                <div class="col-12">
                                    <span class="about-text"> About </span>
                                </div>
                            </div>
                        </div>
                        <div class="row people-section">
                            <div class="container-fluid both-col">
                                <!--------------------------------------------->
                                <div class="col-6 full-screen-col first-col">
                                    <div class="col-title">
                                        <span>About Us</span>
                                    </div>
                                    <div class="about-description first-paragraph">
                                        <span>We are a group of people that have been working from home for almost a year and want a faster way to take a look at our friend's lives while in a quick break from work.</span>
                                    </div>
                                    <div class="about-description second-paragraph">
                                        <span>In this website you'll be able to be linked with other people while working and living at the comfort of your home.</span>
                                    </div>
                                    <img src="./images/bacalhau.png" class="bacalhau" alt="Bacalhau">
                                </div>
                                <div class="col-6 full-screen-col second-col">
                                    <div class="col-title">
                                        <span>Our Team</span>
                                    </div>
                                    <div class="row developers-first-row">
                                        <div class="col-6 developer">
                                            <img src="./images/calves.png" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                            <div class="developer-name">
                                                <span>João Gonçalves</span>
                                            </div>
                                            <div class="developer-user">
                                                <span>@Ranhocas2000</span>
                                            </div>
                                        </div>
                                        <div class="col-6 developer">
                                            <img src="./images/nunores.png" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                            <div class="developer-name">
                                                <span>Nuno Resende</span>
                                            </div>
                                            <div class="developer-user">
                                                <span>@nunores</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  developers-second-row">
                                        <div class="col-6 developer">
                                            <img src="./images/coelho.png" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                            <div class="developer-name">
                                                <span>Pedro Coelho</span>
                                            </div>
                                            <div class="developer-user">
                                                <span>@Mine4Phantom</span>
                                            </div>
                                        </div>
                                        <div class="col-6 developer">
                                            <img src="./images/xavier.png" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                            <div class="developer-name">
                                                <span>Xavier Pisco</span>
                                            </div>
                                            <div class="developer-user">
                                                <span>@psico</span>
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