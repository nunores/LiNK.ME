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
	<link rel="stylesheet" href="create_group.css" />


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
					<h2>Choose the name of your group</h2>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="name-input-group" placeholder="Group name" aria-label="Group name" aria-describedby="basic-addon2">
						<button type="button" id="create-button-final" class="btn btn-dark">Create</button>
					</div>
				</div>
				<div id="center-col-friends">
					<h2>Choose the friends you want in your group</h2>

					<div id="search-friends-group">
						<form class="d-flex">
							<input class="form-control" id="search-group" type="search" placeholder="Search" aria-label="Search">
							<div id="search-icon-phone">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
								</svg>
							</div>
						</form>
					</div>

					<!-- People list -->

					<div class="row people-row">

						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierGoncalves.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @SouOÇalves </span>
										<span id="person-name"> Ricardo Gonçalves </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierLopes.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @LLopes </span>
										<span id="person-name"> Leandro Lopes </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
					<div class="row people-row">
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierCoelho.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @Mine4Phantom </span>
										<span id="person-name"> Hilário Coelho </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierMontanelas.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @PMM </span>
										<span id="person-name"> Paulo Montanelas </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
					<div class="row people-row">
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierResende.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @gares </span>
										<span id="person-name"> Gabriel Resende </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/nunoXavier.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @nunoxavier </span>
										<span id="person-name"> Nuno Xavier </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
					<div class="row people-row">
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierPisco.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @psico </span>
										<span id="person-name"> Xavier Pisco </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierCarvalho.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @Carvalho </span>
										<span id="person-name"> Fernando Carvalho </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
					<div class="row people-row">
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/abelXavier.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @OAbel </span>
										<span id="person-name"> Abel Xavier </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierFernandes.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @Nando </span>
										<span id="person-name"> Fernando Fernandes </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
					<div class="row people-row">
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xicoXavier.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @Xico </span>
										<span id="person-name"> Xico Pereira </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
						<div class="col-5 search-people">
							<div class="post-header">
								<div class="col-4">
								</div>
								<div class="col-1">
									<a href="./other_profile.php">
										<img src="./images/xavierSeixo.jpg" class="rounded-circle search-profile-pic" alt="Profile picture">
									</a>
								</div>
								<div class="post-name col-6">
									<a href="./other_profile.php">
										<span id="name-tag"> @monteiroM </span>
										<span id="person-name"> Miguel Monteiro </span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-1 checkbox">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							</div>
						</div>
					</div>
				</div>
			</div>
</body>

</html>