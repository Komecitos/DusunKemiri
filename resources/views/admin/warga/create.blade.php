@extends('layouts.admin')

@section('title', 'Tambah Data Warga')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 border-gray-300 border-2 rounded-xl shadow-md font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Tambah Data Warga</h2>

    <a href="{{ route('admin.warga') }}" class="inline-block mb-6 px-4 py-2 bg-sogan text-white border border-kunyit rounded hover:bg-kunyit hover:text-sogan text-sm transition">
        Kembali ke Daftar
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

    <form action="{{ route('admin.warga.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-darkText">
        @csrf

        <div>
            <label for="nama" class="block text-sm font-medium mb-1 ml-1">Nama</label>
            <input type="text" name="nama" placeholder="Nama" class="form-input" required value="{{ old('nama') }}">
            @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tanggal_lahir" class="block text-sm font-medium mb-1 ml-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-input" value="{{ old('tanggal_lahir') }}">
            @error('tanggal_lahir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="nik" class="block text-sm font-medium mb-1 ml-1">NIK</label>
            <input type="text" name="nik" placeholder="NIK" class="form-input" required value="{{ old('nik') }}">
            @error('nik') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="no_kk" class="block text-sm font-medium mb-1 ml-1">No. KK</label>
            <input type="text" name="no_kk" placeholder="No. KK" class="form-input" required value="{{ old('no_kk') }}">
            @error('no_kk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="jenis_kelamin" class="block text-sm font-medium mb-1 ml-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-input">
                <option value="">Pilih Jenis Kelamin </option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="pekerjaan" class="block text-sm font-medium mb-1 ml-1">Pekerjaan</label>
            <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-input" value="{{ old('pekerjaan') }}">
            @error('pekerjaan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="pendidikan_terakhir" class="block text-sm font-medium mb-1 ml-1">Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir"
                class="form-input w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
                required autocomplete="off">
                <option value="">Pilih Pendidikan Terakhir </option>
                @foreach ([
                'Tidak Sekolah',
                'SD / Sederajat',
                'SMP / Sederajat',
                'SMA / Sederajat',
                'D1/D2',
                'D3',
                'S1',
                'S2',
                'S3',
                'Lainnya'
                ] as $pendidikan)
                <option value="{{ $pendidikan }}" {{ old('pendidikan_terakhir') == $pendidikan ? 'selected' : '' }}>
                    {{ $pendidikan }}
                </option>
                @endforeach
            </select>
            @error('pendidikan_terakhir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>


        <div>
            <label for="agama" class="block text-sm font-medium mb-1 ml-1">Agama</label>
            <select name="agama" class="form-input">
                <option value="">Pilih Agama </option>
                @foreach (['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Kepercayaan Lain'] as $agama)
                <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                @endforeach
            </select>
            @error('agama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="golongan_darah" class="block text-sm font-medium mb-1 ml-1">Golongan Darah</label>
            <select name="golongan_darah" class="form-input">
                <option value="">Pilih Golongan Darah</option>
                @foreach (['A', 'B', 'AB', 'O', 'A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-', 'Tidak Tahu'] as $gol)
                <option value="{{ $gol }}" {{ old('golongan_darah') == $gol ? 'selected' : '' }}>{{ $gol }}</option>
                @endforeach
            </select>
            @error('golongan_darah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="status_perkawinan" class="block text-sm font-medium mb-1 ml-1">Status Perkawinan</label>
            <select name="status_perkawinan" class="form-input">
                <option value="">Pilih Status </option>
                @foreach (['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati'] as $status)
                <option value="{{ $status }}" {{ old('status_perkawinan') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            @error('status_perkawinan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="kategori_penduduk" class="block text-sm font-medium mb-1 ml-1">Kategori Penduduk</label>
            <select name="kategori_penduduk" class="form-input">
                <option value="">Pilih Kategori</option>
                @foreach (['Tetap', 'Kontrak', 'Pendatang', 'Lainnya'] as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori_penduduk') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                @endforeach
            </select>
            @error('kategori_penduduk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="rt" class="block text-sm font-medium mb-1 ml-1">RT</label>
            <select name="rt" class="form-input">
                <option value="">Pilih RT</option>
                @for ($i = 1; $i <= 4; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ old('rt') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
            </select>
            @error('rt') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="rw" class="block text-sm font-medium mb-1 ml-1">RW</label>
            <select name="rw" class="form-input">
                <option value="">Pilih RW</option>
                @for ($i = 1; $i <= 2; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ old('rw') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
            </select> @error('rw') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="nomor_rumah" class="block text-sm font-medium mb-1 ml-1">Nomor Rumah</label>
            <input type="text" name="nomor_rumah" placeholder="No. Rumah" class="form-input" value="{{ old('nomor_rumah') }}">
            @error('nomor_rumah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label for="alamat" class="block text-sm font-medium mb-1 ml-1">Alamat</label>
            <textarea name="alamat" rows="2" placeholder="Alamat" class="form-input">{{ old('alamat') }}</textarea>
            @error('alamat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="status_KK" class="block text-sm font-medium mb-1 ml-1">Status KK</label>
            <select name="status_KK" class="form-input">
                <option value="">Pilih Status KK</option>
                @foreach (['Kepala Keluarga', 'Istri', 'Anak', 'Menantu', 'Orang Tua', 'Cucu', 'Mertua', 'Famili Lain'] as $status)
                <option value="{{ $status }}" {{ old('status_KK') == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            @error('status_KK') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="telepon" class="block text-sm font-medium mb-1 ml-1">No. Telepon</label>
            <input type="text" name="telepon" placeholder="08xxxxxxxxxx" class="form-input" value="{{ old('telepon') }}">
            @error('telepon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2 flex justify-end mt-6">
            <button type="submit" class="bg-sogan text-white font-medium px-6 py-2 rounded hover:bg-kunyit hover:text-sogan transition">
                Tambah Data
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