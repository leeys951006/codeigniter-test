<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>show</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./public/css/board/show.css">
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
<div class="container">
		<h1 class="text-center py-4 px-2">게시판 글 보기</h1>
		<div class="content_table mb-5">
			<table class="table table-secondary">
			<tr class="table-primary">
					<th class="text-center">제목</th>
					<td class="table-light" style="word-wrap: break-word; max-width: 400px;">
						<?= htmlspecialchars($view->cont_title); ?>
					</td>
			</tr>
			<tr class="table-primary">
					<th class="text-center">내용</th>
					<td class="table-light" style="word-wrap: break-word; max-width: 400px;">
						<?= htmlspecialchars($view->cont_detail); ?>
					</td>
			</tr>
			<tr class="table-primary">
					<th class="text-center">작성일</th>
					<td class="table-light wrap-text">
						<?=$view->cont_created_at;?>
					</td>
			</tr>
			<tr class="table-primary">
					<th class="text-center" colspan="2">
							<a class="text-decoration-none" href="/board">목록</a>
					</th>
			</tr>    
			</table>
		</div>

	<p>댓글 작성</p>
	<form class="mb-5" name="board_comments" action="/board/comments" method="post">
		<input type="hidden" name="cont_id" value="<?= $view->cont_id; ?>">
		<table class="w-100">
			<tr>
				<td class="px-2 py-2">
					<textarea class="form-control w-100" name="com_detail" rows="8"></textarea>
				</td>
				<td class="text-center">
					<input class="btn btn-primary" type="submit" value="저장">
				</td>
			</tr>
		</table>		
	</form>

	<p>댓글목록</p>
	<?php if (!empty($comments)): ?>
			<?php foreach ($comments as $comment): ?>
				<p><?= htmlspecialchars($comment->com_detail); ?></p>
				<p><small>작성일: <?= $comment->com_created_at; ?></small></p>
				<hr>
			<?php endforeach; ?>
	<?php else: ?>
			<p>댓글이 없습니다.</p>
	<?php endif; ?>
	</div>


	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board/show.js"></script> <!-- 절대 경로 -->
</body>
</html>

