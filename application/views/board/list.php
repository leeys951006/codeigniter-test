<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>list</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./public/css/board/list.css">
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

					<a href="/members/join" class="text-black text-decoration-none mx-3">회원가입</a>
					
					<?php if ($this->session->userdata('mb_email')): ?>
						<!-- <span><?php echo $this->session->userdata('mb_email'); ?></span> -->
						<a class="Logout_button text-white text-decoration-none btn btn-danger" href="/members/logout">Logout</a>
					<?php else: ?>
						<a class="Login_button text-white text-decoration-none btn btn-primary" href="/members/login">Login</a>
					<?php endif; ?>
			</nav>
		</header>

	<div class="container-fluid mt-3 py-0 px-3 w-100">
	<h1 class="text-center py-4 px-2">게시판 글 보기</h1>
		<div class="d-flex justify-content-center w-100">
			<table class="table table-light">
				<tr class="table-primary">
						<th class="text-center">제목</th>
						<th class="text-center">내용</th>
						<th class="text-center">작성일</th>
						<th class="text-center">관리</th>
				</tr>
			<?php
			$currentUserEmail = $this->session->userdata('mb_email');
			foreach ($list as $ls) {
			?>

				<tr class="table-light">
							<td class="table-light truncate-text">
								<?=$ls->cont_title;?>
							</td>
							<td class="table-light truncate-text">
								<?=$ls->cont_detail;?>
							</td>
							<td class="table-light">
								<?=$ls->cont_created_at;?>
							</td>
							<td class="table-light">
								<a href="/board/show/<?=$ls->cont_id;?>" class="btn btn-outline-primary">글보기</a>
								<?php if ($ls->cont_mb_id === $currentUserEmail): ?>
									<a href="/board/edit/<?=$ls->cont_id;?>" class="btn btn-outline-primary">수정</a>
								<?php endif; ?>
								<button class="btn btn-outline-danger btn-delete" data-id="<?=$ls->cont_id;?>">
									삭제
								</button>
							</td>
				</tr>

			<?php
			}
			?>
				<tr>
					<th class="text-center" colspan="10">
						<?=$pages;?>
					</th>
				</tr>
			</table>
			
		</div>
		<div class="d-flex justify-content-end">
				<a href="/board/create" class="text-white text-decoration-none btn btn-primary btn-sm me-3 rounded-0">글쓰기</a>
		</div>
	</div>
			
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board/list.js"></script>
</body>
</html>

