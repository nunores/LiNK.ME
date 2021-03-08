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
	<link rel="stylesheet" href="./css/add_post.css" />
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
			<div class="col-8">
				<div id="center-col">
					<div class="add-post container-fluid">
						<div class="add-post-header">
							<div class="row">
								<div class="col-1">
									<a href="#">
										<img src="./images/pauloSeixo.png" class="rounded-circle post-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-10">
									<a href="#">
										<span id="name-tag"> @SeixoPaulo </span>
										<span id="person-name"> Paulo Seixo </span>
									</a>
								</div>
							</div>
						</div>
						<form>
							<textarea class="form-control add-post-textarea" aria-label="With textarea" placeholder="Insert text here..."></textarea>
							<label><input type="file" class="form-control" id="add-post-file">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
									<path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
								</svg>
							</label>
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
								<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
								<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
							</svg>
							<span class="glyphicon glyphicon-send"></span>
						</form>
					</div>
					<?php
					include('./templates/post.php');
					include('./templates/post.php');
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="return-icon" class="add-post-icon">
		<a href="index.php">
			<svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
			</svg>
		</a>
	</div>
</body>

</html>