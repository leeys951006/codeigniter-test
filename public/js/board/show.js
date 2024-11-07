// $(document).ready(function () {
// 	$("#comment_form").on("submit", function (e) {
// 		e.preventDefault(); // 폼 기본 동작 막기

// 		console.log("폼이 제출되었습니다."); // 로그 추가

// 		var formData = {
// 			cont_id: $('input[name="cont_id"]').val(),
// 			com_detail: $('textarea[name="com_detail"]').val(),
// 		};

// 		console.log("폼 데이터:", formData); // 폼 데이터 로그로 출력

// 		$.ajax({
// 			url: "/board/comments",
// 			type: "POST",
// 			data: formData,
// 			success: function (response) {
// 				console.log("서버 응답:", response); // 서버 응답 출력
// 				try {
// 					var res = JSON.parse(response); // JSON 응답 파싱
// 					if (res.success) {
// 						alert("댓글이 성공적으로 저장되었습니다.");
// 						location.reload(); // 페이지 새로고침
// 					} else {
// 						alert("댓글 저장에 실패했습니다: " + res.message);
// 					}
// 				} catch (e) {
// 					console.error("JSON 파싱 오류:", e);
// 					alert("서버로부터 잘못된 응답을 받았습니다.");
// 				}
// 			},
// 			error: function (xhr, status, error) {
// 				console.error("AJAX 오류:", xhr.responseText);
// 				alert("오류가 발생했습니다.");
// 			},
// 		});
// 	});
// });
