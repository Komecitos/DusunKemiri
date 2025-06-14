@php
$nama = old('nama', $petadusun->nama ?? '');
$latitude = old('latitude', $petadusun->latitude ?? '');
$longitude = old('longitude', $petadusun->longitude ?? '');
$keterangan = old('keterangan', $petadusun->keterangan ?? '');
@endphp

<div class="mb-3">
    <label for="nama" class="form-label">Nama Lokasi</label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{ $nama }}" required>
</div>

<div class="mb-3">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $latitude }}" required>
</div>

<div class="mb-3">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $longitude }}" required>
</div>

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $keterangan }}</textarea>
</div>