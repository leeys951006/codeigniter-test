<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
	<div class="body-page">
		<header id="header" class="header">
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


					<a href="/members/join" class="text-black text-decoration-none mx-3">회원가입</a>
					<!-- 로그인, 로그아웃 버튼 -->
					<?php if ($this->session->userdata('mb_email')): ?>
						<!-- <span><?php echo $this->session->userdata('mb_email'); ?></span> -->
						<a class="Logout_button text-white text-decoration-none btn btn-danger" href="/members/logout">Logout</a>
					<?php else: ?>
						<a class="Login_button text-white text-decoration-none btn btn-primary" href="/members/login">Login</a>
					<?php endif; ?>
			</nav>
			<!-- <div class="main-page vw-100 vh-100 bg-white">
			</div> -->
		</header>	
	</div>


	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board.js"></script>
</body>
</html>