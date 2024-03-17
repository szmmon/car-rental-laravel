$(function () {
    // Pobierz element input datetime-local
    const $datetimeInput = $("#pick-up-date");

    // Utwórz obiekt daty i czasu dla aktualnej daty
    const currentDate = new Date();

    // Ustaw atrybut min na bieżącą datę i czas w formacie ISO (YYYY-MM-DDTHH:MM)
    const formattedDate = currentDate.toISOString().slice(0, 16); // Ucinamy sekundy
    $datetimeInput.attr("min", formattedDate);
});
