$(function () {
    $(".record-delete").click(function () {
        // console.log($(this).data("id"));
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, keep it",
        }).then((result) => {
            if (result.isConfirmed) {
                if (window.location.href.includes("cars")) {
                    $.ajax({
                        method: "DELETE",
                        url: "http://localhost:8000/cars/" + $(this).data("id"),
                        // data: {$id = },
                    })
                        .done(function (data) {
                            window.location.reload();
                        })
                        .fail(function (data) {
                            alert("error");
                        });
                } else if (window.location.href.includes("users")) {
                    $.ajax({
                        method: "DELETE",
                        url:
                            "http://localhost:8000/users/" + $(this).data("id"),
                        // data: {$id = },
                    })
                        .done(function (data) {
                            window.location.reload();
                        })
                        .fail(function (data) {
                            alert("error");
                        });
                }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Cancelled", "Your record is safe :)", "error");
            }
        });
    });
});
