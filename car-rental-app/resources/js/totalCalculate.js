$(function () {
    function dateDiffInDays(a, b) {
        const _MS_PER_DAY = 1000 * 60 * 60 * 24;
        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
        return Math.floor((utc2 - utc1) / _MS_PER_DAY);
    }

    // Funkcja do obliczenia ceny
    function calculateTotalPrice() {
        var x = $("#daily_price").val().split(" - ");
        const dailyPrice = parseFloat(x[1]);
        const pickUpDate = new Date($("#pick_up_date").val());
        const returnDate = new Date($("#return_date").val());

        if (isNaN(dailyPrice)) {
            $("#total_price").val("");
            return;
        }

        const days = dateDiffInDays(pickUpDate, returnDate);
        const totalPrice = dailyPrice * days;
        $("#total_price").val(totalPrice.toFixed(2));
    }

    // Wywołaj funkcję przy zmianie dat lub ceny dziennie
    $("#pick_up_date, #return_date, #daily_price").on(
        "change",
        calculateTotalPrice
    );
});
