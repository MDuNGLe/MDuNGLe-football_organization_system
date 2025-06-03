import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

document.addEventListener('DOMContentLoaded', function () {
    let createEvent = true;
    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'ru',
        timeZone: 'none',
        firstDay: 1,
        dragScroll: true,
        editable: true,
        selectable: true,
        eventOverlap: false,
        // slotEventOverlap: false,
        plugins: [timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'timeGridWeek,timeGridDay', // user can switch between the two
        },
        events: async function (info, successCallback, failureCallback) {
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
        },
        select: function (info) {

            if (createEvent) {

                const title = prompt("Введите местоположение события:");
                const data = {
                    title: title,
                    start: info.start,
                    end: info.end,
                };
                if (title) {
                    calendar.addEvent(data);

                    updateForm({...info,title});
                }
                calendar.unselect();
                createEvent = false;
            }
        },

        eventDrop: function (info) {
            if (!info.event.id) {
                updateForm(info.event);
            }
             else {
                info.revert();
            }
        },

        eventResize: function (info) {
            // console.log(info.event.id);
            if (!info.event.id) {
                updateForm(info.event);
            }
            else {
                info.revert();
            }

        },

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

function updateForm(info) {
    const title = document.querySelector('input[name="title"]');
    const startInput = document.querySelector('input[name="start_at"]');
    const endInput = document.querySelector('input[name="end_at"]');

    if (startInput && endInput && title) {
        title.value = info.title;
        startInput.value = info.startStr;
        endInput.value = info.endStr;

        // startInput.value = formatDateTimeLocal(info.start);
        // endInput.value = formatDateTimeLocal(info.end);
    }
}

// function formatDateTimeLocal(date) {
//     if (!date) return '';
//     const d = new Date(date);
//     const pad = (n) => n.toString().padStart(2, '0');
//     return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}`;
// }