@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="text-2xl font-bold text-sogan mb-4 font-sans">Jadwal Kegiatan Dusun</h3>
    <div id="calendar" class="bg-white p-4 rounded-xl shadow border border-kunyit"></div>
</div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

{{-- Tooltip CSS --}}
<style>
    .fc-tooltip {
        position: absolute;
        z-index: 10001;
        background-color: #fef3c7;
        color: #1f2937;
        border: 1px solid #facc15;
        padding: 8px 12px;
        font-size: 0.875rem;
        border-radius: 0.5rem;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        pointer-events: none;
        white-space: nowrap;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            height: 'auto',
            events: @json(route('jadwal.data')),
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                if (info.event.url) {
                    window.location.href = info.event.url;
                }
            },
            eventMouseEnter: function(info) {
                const tooltip = document.createElement('div');
                tooltip.className = 'fc-tooltip';
                tooltip.innerHTML = `
                    <strong>${info.event.title}</strong><br/>
                    ${info.event.extendedProps.waktu ?? ''}<br/>
                    ${info.event.extendedProps.lokasi ?? ''}
                `;

                document.body.appendChild(tooltip);
                info.el.setAttribute('data-tooltip-id', tooltip);

                function moveTooltip(e) {
                    tooltip.style.left = (e.pageX + 12) + 'px';
                    tooltip.style.top = (e.pageY + 12) + 'px';
                }

                document.addEventListener('mousemove', moveTooltip);

                info.el.addEventListener('mouseleave', function() {
                    document.body.removeChild(tooltip);
                    document.removeEventListener('mousemove', moveTooltip);
                }, {
                    once: true
                });
            }
        });
        calendar.render();
    });
</script>
@endsection