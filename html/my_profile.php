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
	<link rel="stylesheet" href="./css/profile.css" />
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
				<div class="person-friends">
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/jlopes.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @JLopes </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/lizandroSilva.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Lizaaandro </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xavierMontanelas.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @XM </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/maria.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Maria </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xavierLopes.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @XLopes </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
					<div class="post-header person-friends-header">
						<div class="col-1">
							<a href="./other_profile.php">
								<img src="./images/xicoXavier.jpg" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
							</a>
						</div>
						<div class="post-name col-6">
							<a href="./other_profile.php">
								<span id="name-tag" class="person-friends-name-tag"> @Xico </span>
							</a>
						</div>
					</div>
				</div>
				<div id="groups">
					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="group-carousel">
									<a href="./other_profile.php">
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
				<div>
					<a href="#" class="link-danger">Delete account</a>
				</div>
			</div>
			<div class="col-8">
				<div id="center-col">
					<div class="profile-info my-profile">
						<div>
							<img src="./images/pauloSeixo.png" class="rounded-circle profile-info-picture" alt="joao0903 profile picture">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil" id="change-photo" viewBox="0 0 16 16">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
							</svg>
						</div>
						<span id="profile-name-tag">@SeixoPaulo</span>
						<br>
						<span id="profile-person-name">Paulo Seixo
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" id="change-name" viewBox="0 0 16 16">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
							</svg>
						</span>
						<a class="link-primary" data-bs-toggle="collapse" href="#change-password-form" role="button" aria-expanded="false" aria-controls="change-password-form" id="change-password">
							Change password
						</a>
						<div class="collapse" id="change-password-form">
							<div class="card bg-dark border-secondary">
								<form action="" class="">
									<input type="text" class="form-control bg-dark change-password-input" placeholder="Old password">
									<input type="text" class="form-control bg-dark change-password-input" placeholder="New password">
									<input type="text" class="form-control bg-dark change-password-input" placeholder="Confirm password">
									<input type="submit" class="form-control change-password-input bg-dark">
								</form>
							</div>
						</div>
					</div>
					<div class="post">
						<div class="container-fluid">
							<div class="row">
								<div class="post-header">
									<div class="col-1">
										<a href="other_profile.php">
											<img src="./images/pauloSeixo.png" class="rounded-circle post-profile-pic" alt="Profile picture">
										</a>
									</div>
									<div class="post-name col-10">
										<a href="other_profile.php">
											<span id="name-tag"> @SeixoPaulo </span>
											<span id="person-name"> Paulo Seixo </span>
										</a>
									</div>
									<div class="col-1 three-dots">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
											<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
										</svg>
									</div>
								</div>
							</div>
							<div class="row">
								<a href="#">
									<div class="post-text">
										<span id="text-description">Já só faltam 4 dias!!!</span>
									</div>
									<div class="post-content">
										<img src="./images/timesSquare.png" alt="Times Square">
									</div>
								</a>
							</div>
							<div class="row">
								<div class="post-icons">
									<div class="row align-items-center">
										<div class="col-2">
											<div id="post-like">
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
													<path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
												</svg>
												<span> 15 </span>
											</div>
										</div>
										<div class="col-2">
											<div id="post-dislike">
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
													<path d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z" />
												</svg>
												<span> 3 </span>
											</div>
										</div>
										<div class="col">
											<div id="post-comment-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
													<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
													<path d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
												</svg>
												<span> 2 </span>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<div class="post-date-date">
													<span> 20-12-2019 </span>
												</div>
											</div>
											<div class="row">
												<div class="post-date-time">
													<span> 17:32 </span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="post-comments">
							<hr>
							<div class="comment">
								<div class="container-fluid">
									<div class="row">
										<div class="col-2">
											<a href="#">
												<img src="./images/xavierCarvalho.jpg" class="rounded-circle post-comment-pic" alt="Profile picture">
											</a>
										</div>
										<div class="col-9 post-comment-div">
											<span class="post-comment-text"> Mal posso esperar!!!! </span>
										</div>
										<div class="col-1 three-dots post-comment-div">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
												<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
											</svg>
										</div>
									</div>
								</div>
							</div>

							<div class="comment">
								<hr>
								<div class="container-fluid">
									<div class="row">
										<div class="col-2">
											<a href="#">
												<img src="./images/maria.png" class="rounded-circle post-comment-pic" alt="Profile picture">
											</a>
										</div>
										<div class="col-9 post-comment-div">
											<span class="post-comment-text"> Não te esqueças de mim depois ahah </span>
										</div>
										<div class="col-1 three-dots post-comment-div">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
												<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
											</svg>
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