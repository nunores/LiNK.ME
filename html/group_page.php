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
    <link rel="stylesheet" href="./css/group_page.css" />
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
                <a href="#">
                    <img src="./images/pauloSeixo.png" class="rounded-circle profile-picture" alt="Profile picture">
                    <h2>Paulo Seixo</h2>
                </a>
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
                <div id="notifications">
                    <div id="notifications-title">
                        <p class="text-center">Notifications</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                    </div>
                    <div class="card bg-dark border-secondary container-fluid">
                        <div class="row">
                            <div class="card-body col-8">
                                @JLopes has sent you a friend request
                            </div>
                            <div class="notification-friend-request col-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark border-secondary container-fluid">
                        <div class="row">
                            <div class="card-body col-8">
                                You have new comments in a post
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="col-4 bi bi-arrow-up-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.854 10.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="groups">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="group-carousel">
                                    <a href="#">
                                        <div class="group-image-name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                            </svg>
                                            MIEIC
                                        </div>
                                    </a>
                                </div>
                                <div class="group-carousel">
                                    <a href="#">
                                        <div class="group-image-name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                            </svg>
                                            LBAW
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="group-carousel">
                                    <div class="group-image-name">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                        </svg>
                                        Manus
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                    </div>
                    <button type="button" id="create-group-button" class="btn btn-dark">Create Group</button>
                </div>
                <div>
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
            <div class = "col-2 group-name">
                <p>MIEIC</p>
                <form id="add-search" class="d-flex">
                    <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
                    <div id="search-icon-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </form>
                <div class="person-friends">
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/jlopes.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @JLopes </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/lizandroSilva.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Lizaaandro </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xavierMontanelas.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @XM </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/maria.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Maria </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xavierLopes.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @XLopes </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="post-header person-friends-header">
                        <div class="col-1">
                            <a href="#">
                                <img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
                            </a>
                        </div>
                        <div class="post-name col-6">
                            <a href="#">
                                <span id="name-tag" class="person-friends-name-tag"> @Xico </span>
                            </a>
                        </div>
                        <div class="add-person">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
	<div id="add-post-icon">
		<a href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
				<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
			</svg>
		</a>
	</div>
</body>

</html>