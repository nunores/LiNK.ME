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
	<link rel="stylesheet" href="./css/other_profile.css" />
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
					</div>
				</div>
				<div>
					<a href="#" class="link-light">About</a>
					<span class="link-light"> | </span>
					<a href="#" class="link-light">FAQ</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>