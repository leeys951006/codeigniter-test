게시판 글 수정 화면입니다.

<form name="Board_update" action="/board/update/<?=$edit->cont_id;?>" method="post">
  <input type="hidden" name="_method" value="PUT" />
	<table board="1">
		<tr>
			<th>제목</th>
			<td>
				<input type="text" name="cont_title" value="<?=$edit->cont_title;?>" />
			</td>
		</tr>
		<tr>
			<th>내용</th>
			<td>
				<textarea name="cont_detail" rows="8"><?=$edit->cont_detail;?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<input type="submit" value="수정하기" />
        <a href="/board">목록</a>
			</th>
		</tr>
	</table>		
</form>