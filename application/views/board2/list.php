<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Board2</title>
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
				<button type="button" class="btn btn-primary">Login</button>	
			</nav>
		</header>

    <table border="1">
      <tr>
        <th>제목</th>
        <th>작성일</th>
        <th>관리</th>
      </tr>
    <?php
    foreach ($list as $ls) {
    ?>

    <tr>
				<td><?=$ls->cont_title;?></td>
				<td><?=$ls->cont_created_at;?></td>
				<td>
					<a href="/board2/show/<?=$ls->cont_id;?>">View</a>
					<a href="/board2/edit/<?=$ls->cont_id;?>">Edit</a>
					<a href="/board2/delete/<?=$ls->cont_id;?>">Delete</a>
				</td>
		</tr>

    <?php
    }
    ?>

    </table>

    <a href="/board2/create">글쓰기</a>
  </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board.js"></script>
</body>
</html>