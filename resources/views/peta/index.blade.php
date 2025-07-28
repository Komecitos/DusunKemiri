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
                        <img src="{{ asset('images/icons/mosque.png') }}" alt="Masjid" class="w-6 h-6"> <span>Masjid</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/home.png') }}" alt="Home" class="w-6 h-6"> <span>Perangkat Dusun</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/tree-silhouette.png') }}" alt="Pathuk" class="w-6 h-6"> <span>Pathuk</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/school.png') }}" alt="Sekolah" class="w-6 h-6"> <span>Sekolah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/grave (1).png') }}" alt="Kuburan" class="w-6 h-6"> <span>Kuburan</span>
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
    window.dusunMapData = {
        lokasi: @json($lokasi),
        iconUrls: {
            masjid: "{{ asset('images/icons/mosque.png') }}",
            rumah: "{{ asset('images/icons/home.png') }}",
            dukuh: "{{ asset('images/icons/home.png') }}",
            perangkat_desa: "{{ asset('images/icons/home.png') }}",
            pathuk: "{{ asset('images/icons/tree-silhouette.png') }}",
            sekolah: "{{ asset('images/icons/school.png') }}",
            kuburan: "{{ asset('images/icons/grave (1).png') }}",
        }
    };
</script>



<script src="{{ asset('js/peta.js') }}"></script>

@endpush