document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const eventsUrl = calendarEl.dataset.url;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: window.innerWidth < 768 ? 'listMonth' : 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listMonth'
        },
        locale: 'id',
        events: eventsUrl,
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        eventDidMount: function (info) {
            const title = info.event.title || 'Kegiatan';
            const start = info.event.start
                ? info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                : '';
            const end = info.event.end
                ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                : '';

            let timeText = '';
            if (start && end) {
                timeText = `${start} - ${end}`;
            } else if (start) {
                timeText = `${start}`;
            }

            const tooltipText = `${title}\n${timeText}`;

            info.el.setAttribute('title', tooltipText);
        },
        windowResize: function () {
            const newView = window.innerWidth < 768 ? 'listMonth' : 'dayGridMonth';
            calendar.changeView(newView);
        },
    });

    calendar.render();
});
