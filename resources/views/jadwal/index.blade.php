@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4  flex justify-center">
    <div class="w-full md:w-4/5 lg:w-4/5">
        <h3 class="text-2xl font-bold text-sogan mb-6 font-sans text-center">Jadwal Kegiatan Dusun</h3>
        <div id="calendar" class="bg-white p-4 rounded-xl shadow border border-kunyit" data-url="{{ route('jadwal.data') }}"></div>
    </div>
</div>

{{-- FullCalendar CSS --}}
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<style>
    .fc .fc-list-day-cushion {
        background-color: #fefae0;
        color: #7f5539;
        font-weight: bold;
        padding: 10px;
    }

    .fc .fc-list-event-title {
        color: #7f5539;
        font-weight: 500;
    }

    .fc .fc-list-empty {
        color: #999;
        font-style: italic;
        padding: 10px;
    }

    .fc .fc-button {
        background-color: #d4a373;
        border: none;
    }
</style>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="{{ asset('js/jadwal/jadwal.js') }}"></script>
@endpush