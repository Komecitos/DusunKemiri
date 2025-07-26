@extends('layouts.admin')

@section('title', 'Edit Data Warga')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Edit Data Warga</h2>

    <a href="{{ route('admin.warga') }}" class="inline-block mb-6 px-4 py-2 bg-kunyit/10 text-sogan border border-kunyit rounded hover:bg-kunyit/20 text-sm transition">
        ← Kembali ke Daftar
    </a>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.warga.update', $warga->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-darkText">
        @csrf
        @method('PUT')

        <div>
            <input type="text" name="nama" placeholder="Nama" class="form-input" required value="{{ old('nama', $warga->nama) }}">
            @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="nik" placeholder="NIK" class="form-input" required value="{{ old('nik', $warga->nik) }}">
            @error('nik') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="no_kk" placeholder="No. KK" class="form-input" required value="{{ old('no_kk', $warga->no_kk) }}">
            @error('no_kk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <select name="jenis_kelamin" class="form-input" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-input" value="{{ old('pekerjaan', $warga->pekerjaan) }}">
            @error('pekerjaan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir" class="form-input" value="{{ old('pendidikan_terakhir', $warga->pendidikan_terakhir) }}">
            @error('pendidikan_terakhir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="agama" placeholder="Agama" class="form-input" value="{{ old('agama', $warga->agama) }}">
            @error('agama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="golongan_darah" placeholder="Golongan Darah" class="form-input" value="{{ old('golongan_darah', $warga->golongan_darah) }}">
            @error('golongan_darah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="status_perkawinan" placeholder="Status Perkawinan" class="form-input" value="{{ old('status_perkawinan', $warga->status_perkawinan) }}">
            @error('status_perkawinan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="kategori_penduduk" placeholder="Kategori Penduduk" class="form-input" value="{{ old('kategori_penduduk', $warga->kategori_penduduk) }}">
            @error('kategori_penduduk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="rt" placeholder="RT" class="form-input" value="{{ old('rt', $warga->rt) }}">
            @error('rt') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="rw" placeholder="RW" class="form-input" value="{{ old('rw', $warga->rw) }}">
            @error('rw') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="nomor_rumah" placeholder="Nomor Rumah" class="form-input" value="{{ old('nomor_rumah', $warga->nomor_rumah) }}">
            @error('nomor_rumah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="status_KK" placeholder="Status KK" class="form-input" value="{{ old('status_KK', $warga->status_KK) }}">
            @error('status_KK') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="text" name="telepon" placeholder="Telepon" class="form-input" value="{{ old('telepon', $warga->telepon) }}">
            @error('telepon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <textarea name="alamat" placeholder="Alamat Lengkap" class="form-input" required>{{ old('alamat', $warga->alamat) }}</textarea>
            @error('alamat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2 flex justify-end mt-6">
            <button type="submit" class="bg-sogan text-white font-medium px-6 py-2 rounded hover:bg-sogan/90 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }

    .form-input {
        @apply w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-kunyit focus:border-kunyit text-sm;
    }
</style>
@endpush