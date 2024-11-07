$(document).ready(function () {
	$(".btn-delete").on("click", function () {
		var cont_id = $(this).data("id"); // 삭제할 게시글의 ID

		if (confirm("정말 삭제하시겠습니까?")) {
			$.ajax({
				url: "/board/delete/" + cont_id,
				type: "POST",
				data: { _method: "DELETE" },
				success: function (response) {
					try {
						var res = JSON.parse(response); // JSON 응답 파싱
						if (res.success) {
							alert("글이 삭제되었습니다.");
							location.reload(); // 페이지 새로고침
						} else {
							alert("삭제에 실패했습니다: " + res.message);
						}
					} catch (e) {
						console.error("JSON 파싱 오류:", e);
						alert("서버로부터 잘못된 응답을 받았습니다.");
					}
				},
				error: function (xhr, status, error) {
					alert("오류가 발생했습니다.");
					console.error("에러 응답:", xhr.responseText);
				},
			});
		}
	});
});
