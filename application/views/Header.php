<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Board</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./public/css/board.css">
</head>
<body>
	
		<header class="header">
			<nav class="navbar navbar-expand-lg bg-body-tertiary vw-100">
				<div class="container-fluid">
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
				     <ul class="navbar-nav">
				      	<li class="nav-item">
				          <a class="nav-link car-know" href="/board">게시판1</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link car-maint" href="/board2">게시판2</a>
				        </li>
					</div>
					<button type="button" class="btn btn-primary">
   			 	<a class="Login_button text-white text-decoration-none" href="/members/login">Login</a>
					</button>
			</nav>
		</header>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board.js"></script>
</body>
</html>