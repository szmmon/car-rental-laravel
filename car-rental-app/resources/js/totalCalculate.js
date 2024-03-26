$(function () {
    function dateDiffInDays(a, b) {
        const _MS_PER_DAY = 1000 * 60 * 60 * 24;
        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
        return Math.floor((utc2 - utc1) / _MS_PER_DAY);
    }

    function calculateTotalPrice() {
        var x = $("#daily_price option:selected").text().split(" - ");
        const dailyPrice = parseFloat(x[1]);
        const pickUpDate = new Date($("#pick_up_date").val());
        const returnDate = new Date($("#return_date").val());
        // console.log(x);

        if (isNaN(dailyPrice)) {
            $("#total_price").val("");
            return;
        }

        const days = dateDiffInDays(pickUpDate, returnDate);
        // console.log(days);
        const totalPrice = dailyPrice * days;
        if (totalPrice <= 0) {
            console.log("here");
            alert("Min 1 day required");
            return;
        }
        $(".total_price").val(totalPrice.toFixed(2));
        $(".total_price").text(totalPrice.toFixed(2));
    }

    $("#pick_up_date, #return_date, #daily_price").on(
        "change",
        calculateTotalPrice
    );
    calculateTotalPrice();
});
