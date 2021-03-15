document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var initialLocaleCode = 'es';
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap',
        timeZone: 'UTC',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        events: 'eventos.php',
        locale: initialLocaleCode,
        buttonIcons: false, // show the prev/next text
        weekNumbers: false,
        dayMaxEvents: true, // allow "more" link when too many events
        /*events: [{ // this object will be "parsed" into an Event Object
            title: 'The Title', // a property!
            start: '2021-01-01', // a property!
            end: '2021-01-02' // a property! ** see important note below about 'end' **
        }]*/

    });
    calendar.render();
});