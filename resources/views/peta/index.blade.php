@extends('layouts.app')

@section('content')
<div class="container py-6 px-4 mx-auto">
    <h2 class="text-2xl font-bold text-sogan mb-4">Peta Dusun Kemiri</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        {{-- Peta --}}
        <div class="col-span-1 md:col-span-3 relative">
            <div id="map" class="w-full h-[500px] rounded-xl border border-kunyit shadow-md"></div>
        </div>

        {{-- Legenda --}}
        <div class="col-span-1 space-y-4">
            <div class="bg-white p-4 rounded-xl shadow border-l-4 border-kunyit">
                <h3 class="font-semibold text-lg text-sogan mb-3">Keterangan</h3>
                <div class="space-y-3 text-sm text-gray-700">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/masjid.png') }}" alt="Masjid" class="w-6 h-6"> <span>Masjid</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/office.png') }}" alt="Balai Dusun" class="w-6 h-6"> <span>Balai Dusun</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/shop.png') }}" alt="Warung" class="w-6 h-6"> <span>Warung</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/default-marker.png') }}" alt="Lainnya" class="w-6 h-6"> <span>Lainnya</span>
                    </div>
                </div>
            </div>

            {{-- Info --}}
            <div class="bg-sogan/10 p-4 rounded-xl text-sm text-darkText">
                <p><strong class="text-sogan">Info:</strong> Klik marker pada peta untuk melihat detail lokasi.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([-7.8, 110.2001684], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    // Custom icons
    const icons = {
        Masjid: L.icon({
            iconUrl: @json(asset('images/icons/masjid.png')),
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36],
        }),
        Pak_Dukuh: L.icon({
            iconUrl: @json(asset('images/icons/office.png')),
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36],
        }),
        warung: L.icon({
            iconUrl: @json(asset('images/icons/shop.png')),
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36],
        }),
        default: L.icon({
            iconUrl: @json(asset('images/icons/default-marker.png')),
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36],
        }),
    };

    const lokasi = @json($lokasi);

    lokasi.forEach(item => {
        const icon = icons[item.kategori] || icons.default;

        L.marker([item.latitude, item.longitude], {
                icon
            }).addTo(map)
            .bindPopup(`<div class="text-sm"><strong>${item.nama}</strong><br>${item.keterangan || ''}</div>`);
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                const userMarker = L.marker([userLat, userLng], {
                        icon: L.icon({
                            iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64113.png',
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        })
                    }).addTo(map)
                    .bindPopup("Lokasi Anda Saat Ini")
                    .openPopup();

                map.setView([userLat, userLng], 15);
            },
            function(error) {
                console.warn("Lokasi tidak bisa diakses:", error.message);
            }
        );
    } else {
        alert("Browser Anda tidak mendukung geolokasi.");
    }
</script>
@endpush