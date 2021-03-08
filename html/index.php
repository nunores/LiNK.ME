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
					<?php
					include('./templates/post.php');
					include('./templates/post.php');
					?>
				</div>
			</div>

		</div>
	</div>
	<div id="add-post-icon" class="add-post-icon">
		<a href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
				<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
			</svg>
		</a>
	</div>
</body>

</html>