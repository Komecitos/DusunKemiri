@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 px-4">
    <h2 class="text-2xl font-bold text-orange-500 mb-6">Jadwal Kegiatan Dusun</h2>

    <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
        <div id="calendar" class="text-sm"></div>
    </div>
</div>
@endsection

@push('styles')
<!-- FullCalendar & Tippy CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<link href="https://unpkg.com/tippy.js@6/themes/light.css" rel="stylesheet" />

<!-- Custom Calendar Styling -->
<style>
    .fc .fc-toolbar-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1f2937;
        /* text-gray-800 */
    }

    .fc .fc-button-primary {
        background-color: #f97316;
        border-color: #f97316;
        color: white;
        font-weight: 500;
    }

    .fc .fc-button-primary:hover {
        background-color: #ea580c;
        border-color: #ea580c;
    }
</style>
@endpush

@push('scripts')
<!-- FullCalendar & Tippy.js -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
    // Fungsi untuk menghitung pasaran Jawa berdasarkan tanggal
    function getPasaran(date) {
        const pasaran = ['Legi', 'Pahing', 'Pon', 'Wage', 'Kliwon'];
        const refDate = new Date('2025-01-01'); // Tanggal referensi Legi
        const selisihHari = Math.floor((date - refDate) / (1000 * 60 * 60 * 24));
        const index = (selisihHari % 5 + 5) % 5;
        return pasaran[index];
    }

    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            height: 'auto',
            aspectRatio: 1.5,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listWeek'
            },
            events: @json(route('jadwal.data')),

            // Menambahkan pasaran di kiri atas setiap tanggal
            dayCellDidMount: function(info) {
                const date = info.date;
                const pasaran = getPasaran(date);

                const badge = document.createElement('div');
                badge.innerText = pasaran;
                badge.style.fontSize = '0.7rem';
                badge.style.color = '#f97316';
                badge.style.position = 'absolute';
                badge.style.top = '2px';
                badge.style.left = '4px';

                info.el.style.position = 'relative';
                info.el.appendChild(badge);
            },

            // Tooltip saat hover event
            eventDidMount: function(info) {
                tippy(info.el, {
                    content: `
                        <strong>${info.event.title}</strong><br>
                        ${info.event.extendedProps.keterangan || ''}
                    `,
                    allowHTML: true,
                    theme: 'light',
                    animation: 'shift-away',
                    placement: 'top',
                    delay: [100, 100],
                });
            },

            // Navigasi jika diklik
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                if (info.event.url) {
                    window.location.href = info.event.url;
                }
            }
        });

        calendar.render();
    });
</script>
@endpush