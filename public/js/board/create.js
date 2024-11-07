$(document).ready(function () {
	$('form[name="Board_make"]').on("submit", function (e) {
		e.preventDefault();

		var formData = {
			cont_title: $('input[name="cont_title"]').val(),
			cont_detail: $('textarea[name="cont_detail"]').val(),
		};

		$.ajax({
			url: "/board/make",
			type: "POST",
			data: formData,
			success: function (response) {
				if (response.success) {
					alert("글이 성공적으로 저장되었습니다.");
					window.location.href = "/board"; // 리스트 페이지로 리디렉션
				} else {
					alert("글 저장에 실패했습니다.");
				}
			},
			error: function (xhr, status, error) {
				alert("오류가 발생했습니다. 다시 시도해 주세요.");
			},
		});
	});
});
