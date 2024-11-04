게시판 글쓰기 화면입니다.

<form name="Board_make" action="/board/make" method="post">
	<table board="1">
		<tr>
			<th>제목</th>
			<td>
				<input type="text" name="cont_title" value="" />
			</td>
		</tr>
		<tr>
			<th>내용</th>
			<td>
				<textarea name="cont_detail" rows="8"></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<input type="submit" value="저장">
			</th>
		</tr>
	</table>		
</form>