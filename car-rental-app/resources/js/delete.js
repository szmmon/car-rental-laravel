$(function () {
    $(".car-delete").click(function () {
        console.log($(this).data("id"));
        $.ajax({
            method: "DELETE",
            url: "http://localhost:8000/cars/" + $(this).data("id"),
            // data: {$id = },
        })
            .done(function (data) {
                alert("works");
                window.location.reload();
            })
            .fail(function (data) {
                alert("error");
            });
    });
});
