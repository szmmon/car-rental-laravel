$(function () {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var navbar = $(".navbar");
        if (scroll > 50) {
            navbar.removeClass("transparent").addClass("scrolled");
        } else {
            navbar.removeClass("scrolled").addClass("transparent");
        }
    });

    // Simulate Ajax content loading
    setTimeout(function () {}, 1500); // Delay for demonstration purpose
});

// $(document).ready(function () {
//     $(".datetimepicker").datetimepicker({
//         minDate: "today",
//         altInput: true,
//         altFormat: "F j, Y",
//         // dateFormat: "YYYY-MM-DD HH:mm:ss",
//         // Format daty i godziny
//     });
// });
