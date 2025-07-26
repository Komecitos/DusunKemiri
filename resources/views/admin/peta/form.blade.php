@php
$nama = old('nama', $petadusun->nama ?? '');
$latitude = old('latitude', $petadusun->latitude ?? '');
$longitude = old('longitude', $petadusun->longitude ?? '');
$keterangan = old('keterangan', $petadusun->keterangan ?? '');
@endphp

<div class="space-y-4 font-roboto">
    <div>
        <label for="nama" class="block text-sogan font-semibold mb-1">Nama Lokasi</label>
        <input type="text" name="nama" id="nama" value="{{ $nama }}"
            class="w-full border border-kunyit rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit"
            required>
    </div>

    <div>
        <label for="latitude" class="block text-sogan font-semibold mb-1">Latitude</label>
        <input type="text" name="latitude" id="latitude" value="{{ $latitude }}"
            class="w-full border border-kunyit rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit"
            required>
    </div>

    <div>
        <label for="longitude" class="block text-sogan font-semibold mb-1">Longitude</label>
        <input type="text" name="longitude" id="longitude" value="{{ $longitude }}"
            class="w-full border border-kunyit rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit"
            required>
    </div>

    <div>
        <label for="keterangan" class="block text-sogan font-semibold mb-1">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3"
            class="w-full border border-kunyit rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit">{{ $keterangan }}</textarea>
    </div>
</div>