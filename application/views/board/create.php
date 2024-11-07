<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./public/css/board/show.css">
</head>
<body>

<div class="container">
		<h1 class="text-center py-4 px-2">
			게시판 글 쓰기
		</h1>

		<form name="Board_make" action="/board/make" method="post">
			<div class="content_edit">
				<table class="table table-secondary">
					<tr class="table-primary">
						<th class="text-center">
							제목
						</th>
						<td class="table-light" style="word-wrap: break-word; max-width: 400px;">
						<input class="form-control w-100" type="text" name="cont_title" value="" />
						</td>
					</tr>
					<tr class="table-primary">
						<th class="text-center">
							내용
						</th>
						<td class="table-light" style="word-wrap: break-word; max-width: 400px;">
						<textarea class="form-control w-100 " name="cont_detail" rows="8"></textarea>
						</td>
					</tr>
					<tr class="table-primary">
						<th colspan="2">
							<div class="text-end mx-3">
								<input class="btn btn-primary" type="submit" value="저장">
							</div>
						</th>
					</tr>
				</table>		
			</div>
		</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="./public/js/board/create.js"></script>
</body>
</html>