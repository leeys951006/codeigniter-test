<table border="1">
	<tr>
		<th>제목</th>
		<td><?=$view->cont_title;?></td>
	</tr>
	<tr>
		<th>내용</th>
		<td><?=$view->cont_detail;?></td>
	</tr>
	<tr>
		<th>작성일</th>
		<td><?=$view->cont_created_at;?></td>
	</tr>
	<tr>
		<th colspan="2">
			<a href="/board2">목록</a>
		</th>
	</tr>	
</table>

<form name="board2_comments" action="/board2/comments" method="post">
	<input type="hidden" name="cont_id" value="<?= $view->cont_id; ?>">
	<table border="1">
		<tr>
			<th>내용</th>
			<td>
				<textarea name="com_detail" rows="8"></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<input type="submit" value="저장">
			</th>
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