@extends('layouts.admin')

@section('title', 'Tambah Warga')

@section('content')
<h2 class="text-2xl font-semibold text-orange-700 mb-6">Tambah Data Warga</h2>

<a href="{{ route('admin.warga') }}" class="inline-block mb-4 px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
    Kembali
</a>

@if ($errors->any())
<div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
    <strong>Terjadi kesalahan:</strong>
    <ul class="mt-2 list-disc list-inside text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.warga.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-base font-roboto">
    @csrf

    @foreach ([
    ['nama', 'Nama'],
    ['no_kk', 'No. KK'],
    ['nik', 'NIK'],
    ['telepon', 'Telepon'],
    ['pekerjaan', 'Pekerjaan'],
    ['nomor_rumah', 'Nomor Rumah'],
    ] as [$name, $placeholder])
    <div>
        <input type="text" name="{{ $name }}" placeholder="{{ $placeholder }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
            required autocomplete="off" value="{{ old($name) }}">
        @error($name) <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    @endforeach

    <div>
        <select name="status_KK"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
            required autocomplete="off">
            <option value="">-- Status KK --</option>
            @foreach(['Kepala Keluarga','Suami','Istri','Anak','Famili Lain'] as $status)
            <option value="{{ $status }}" {{ old('status_KK') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
        @error('status_KK') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="date" name="tanggal_lahir"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
            required autocomplete="off" value="{{ old('tanggal_lahir') }}">
        @error('tanggal_lahir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    @foreach ([
    ['jenis_kelamin', 'Jenis Kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan']],
    ['status_perkawinan', 'Status Perkawinan', ['Lajang', 'Menikah', 'Janda', 'Duda']],
    ['agama', 'Agama', ['Islam','Kristen Protestan','Kristen Katolik','Hindu','Buddha','Konghucu']],
    ['golongan_darah', 'Golongan Darah', ['A+','A-','B+','B-','AB+','AB-','O+','O-']],
    ['kategori_penduduk', 'Kategori Penduduk', ['Tetap','Pindah','Meninggal']],
    ['pendidikan_terakhir', 'Pendidikan Terakhir', ['Tidak Sekolah','SD / Sederajat','SMP / Sederajat','SMA / Sederajat','D1/D2','D3','S1','S2','S3','Lainnya']],
    ['rt', 'RT', ['01','02']],
    ['rw', 'RW', ['01','02','03']],
    ] as [$name, $label, $options])
    <div>
        <select name="{{ $name }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
            required autocomplete="off">
            <option value="">-- {{ $label }} --</option>
            @foreach ($options as $key => $val)
            @php $val = is_string($key) ? $key : $val; @endphp
            <option value="{{ $val }}" {{ old($name) == $val ? 'selected' : '' }}>
                {{ is_string($key) ? $val : $val }}
            </option>
            @endforeach
        </select>
        @error($name) <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    @endforeach

    <div class="col-span-1 md:col-span-2">
        <textarea name="alamat" placeholder="Alamat Lengkap"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
            required autocomplete="off">{{ old('alamat') }}</textarea>
        @error('alamat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-1 md:col-span-2 flex justify-end">
        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-2 rounded transition">
            Simpan
        </button>
    </div>
</form>

{{-- Roboto Font --}}
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endsection