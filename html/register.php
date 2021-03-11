<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="./css/mobile.css" />
    <link rel="stylesheet" href="./css/post.css" />
    <link rel="stylesheet" href="./css/left_col.css" />
    <link rel="stylesheet" href="./css/login.css" />
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
            <div class="col-2 text-center" id="left-col">
                <div id="credentials-input">
                    <form>
                        <input class="form-input" type="text" id="fname" name="fname" placeholder="Name"><br>
                        <input class="form-input" type="text" id="lname" name="lname" placeholder="Username"><br>
                        <input class="form-input" type="text" id="lname" name="lname" placeholder="Password"><br>
                        <input class="form-input" type="text" id="lname" name="lname" placeholder="Repeat Password"><br>
                    </form>
                </div>
                <div id="login-button" class="card bg-dark border-secondary container-fluid">

                    <a href="index.php">
                        <div class="card-body">
                            <p class="card-text">Register</p>
                        </div>
                    </a>
                </div>
                <div id="login-messages">
                    <p> <a href="login.php"> Already have an account? </a></p>
                </div>
                <div class="feed-change">
                    <div id="feed-order">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRelevance">
                                Relevance
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRecent" checked>
                                Recent
                            </label>
                        </div>
                    </div>
                </div>
                <div class="about-split">
                    <a href="#" class="link-light">About</a>
                    <span class="link-light"> | </span>
                    <a href="#" class="link-light">FAQ</a>
                </div>
            </div>
            <div class="col-8">
                <div id="center-col">
                    <?php
                    include('./templates/post.php');
                    include('./templates/post.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>