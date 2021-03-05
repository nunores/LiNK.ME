<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
		<link rel="stylesheet" href="style.css"/>
		<title>Title of the document</title>
	</head>
	<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container-fluid">
				<h1 class="link-primary"> 
					<a href="#">LiNK.ME</a>
				</h1>
				
				<form class="d-flex">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search">
				</form>
				<div>
					<a href="#" class="link-primary">MyProfile</a>
					<span class="link-primary"> | </span>
					<a href="#" class="link-primary">LogOut</a>
				</div>
			</div>
		</nav>
    </header>

	<div class="container-fluid">
  		<div class="row">
    		<div class="col-2 text-center" id="left-col">
				<img src="https://thispersondoesnotexist.com/image" class="rounded profile-picture" alt="Profile picture">
				<h2>Paulo Seixo</h2>
				<div class="fedd-change">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
						<label class="form-check-label" for="flexRadioDefault1">
							Relevance
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
						<label class="form-check-label" for="flexRadioDefault2">
							Recent
						</label>
					</div>
				</div>
    		</div>
    		<div class="col-8" id="center-col">
        		<div class="post">
              		<div class="post-header">
                		<img src="https://thispersondoesnotexist.com/image" class="rounded post-profile-pic" alt="Profile picture">
						<!--<div class="container">
						<div class="row align-items-start">
							<div class="col-6">
							One of three columns
							</div>
						</div>
						</div>-->
						<div class="post-name">
							<span> @JLopes </span>
							<span> João Correia Lopes </span>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
							<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
						</svg>
					</div>
              	</div>
            </div>
    	</div>
  	</div>
	
<!--
	<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
		<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
		<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
	</svg>
-->
  	</body>
</html>
