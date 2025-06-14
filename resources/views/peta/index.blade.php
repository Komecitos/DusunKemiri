@extends('layouts.app')

<style>
    #map {
        height: 500px;
        width: 100%;
        border-radius: 12px;
        z-index: 0;
    }

    .leaflet-container {
        z-index: 0 !important;
    }
</style>

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Peta Dusun Kemiri</h2>

    <div id="map" style="height: 500px; width: 100%; border-radius: 12px;"></div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    let map = L.map('map').setView([-7.8504876
        ,110.2001684], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    const lokasi = @json($lokasi);
    lokasi.forEach(item => {
        L.marker([item.latitude, item.longitude])
            .addTo(map)
            .bindPopup(`<b>${item.nama}</b><br>${item.keterangan}`);
    });
</script>

@endpush