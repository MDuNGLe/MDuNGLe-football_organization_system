document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'ru',
        timeZone: 'none',
        firstDay: 1,
        plugins: [FullCalendar.TimeGrid],
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'timeGridWeek,timeGridDay', // user can switch between the two
        },
        events: async function(info, successCallback, failureCallback) {
            const url = 'http://localhost:8000/api/matches'
            const response = await fetch(url, {
                method: "GET", // *GET, POST, PUT, DELETE, etc.
                mode: "same-origin", // no-cors, *cors, same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                credentials: "same-origin", // include, *same-origin, omit
                headers: {
                    "Accept": "application/json",
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: "follow", // manual, *follow, error
                referrerPolicy: "no-referrer", // no-referrer, *client
                // body: JSON.stringify(data), // body data type must match "Content-Type" header
            });
            if (!response.ok) {
                failureCallback(new ErrorEvent("Не удалось найти запрос"));
            }
            const data = await response.json();
            // console.log(data);
            successCallback(data);
        }
        // {
        //   title  : 'event1',
        //   start  : '2025-05-05'
        // },
        // {
        //   title  : 'event2',
        //   start  : '2025-05-05',
        //   end    : '2025-05-05',
        // },
        // {
        //   title  : 'event3',
        //   start  : '2025-05-09T12:30:00',
        //   allDay : false // will make the time show
        // }

    });
    calendar.render();
});