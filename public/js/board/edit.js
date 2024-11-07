$(document).ready(function () {
	$("#edit_form").on("submit", function (e) {
		e.preventDefault(); // 기본 폼 제출 동작을 막음

		var formData = {
			cont_title: $('input[name="cont_title"]').val(),
			cont_detail: $('textarea[name="cont_detail"]').val(),
			_method: "PUT",
		};

		$.ajax({
			url: "/board/update/" + $('input[name="cont_id"]').val(),
			type: "POST",
			data: formData,
			success: function (response) {
				if (response.success) {
					alert("글이 성공적으로 수정되었습니다.");
					window.location.href = "/board";
				} else {
					alert("수정에 실패했습니다.");
				}
			},
			error: function (xhr, status, error) {
				alert("오류가 발생했습니다.");
			},
		});
	});
});
