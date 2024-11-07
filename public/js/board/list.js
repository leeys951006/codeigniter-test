$(document).ready(function () {
    $(".btn-delete").on("click", function () {
        var cont_id = $(this).data("id");

        if (confirm("정말 삭제하시겠습니까?")) {
            $.ajax({
                url: "/board/delete/" + cont_id,
                type: "POST",
                dataType: 'json',
                data: { _method: "DELETE" },
                success: function (response) {
                    if (response.success) {
                        alert("글이 삭제되었습니다.");
                        location.reload();
                    } else {
                        alert("삭제에 실패했습니다: " + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("서버 오류 발생: JSON 응답이 아닙니다.");

                },
            });
        }
    });
});