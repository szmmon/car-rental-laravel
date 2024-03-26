const pick_up_date = flatpickr("#pick_up_date", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
    altInput: true,
    altFormat: "F j, Y H:i",
    onChange: function (sel_date, date_str) {
        return_date.set("minDate", date_str);
    },
});
const return_date = flatpickr("#return_date", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minDate: "today",
    altInput: true,
    altFormat: "F j, Y H:i",
});
