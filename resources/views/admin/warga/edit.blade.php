@extends('layouts.admin')

@section('title', 'Edit Data Warga')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 border-gray-300 border-2 rounded-xl shadow-md font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Edit Data Warga</h2>

    <a href="{{ route('admin.warga') }}" class="inline-block mb-6 px-4 py-2 bg-sogan text-white border border-kunyit rounded hover:bg-kunyit hover:text-sogan text-sm transition">
        Kembali
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
            <label for="nama" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nama</label>
            <input type="text" name="nama" placeholder="Nama" class="form-input" required value="{{ old('nama', $warga->nama) }}">
            @error('nama') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir"
                class="form-input"
                required
                value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}">
            @error('tanggal_lahir')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nik" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nomor Induk Kependudukan</label>
            <input type="text" name="nik" placeholder="NIK"
                class="form-input" required
                value="{{ old('nik', $warga->nik) }}"
                maxlength="16" pattern="\d*" inputmode="numeric">
            @error('nik') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="no_kk" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nomor Kartu Keluarga</label>
            <input type="text" name="no_kk" placeholder="No. KK"
                class="form-input" required
                value="{{ old('no_kk', $warga->no_kk) }}"
                maxlength="16" pattern="\d*" inputmode="numeric">
            @error('no_kk') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>


        <div>
            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-input" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jenis_kelamin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="pekerjaan" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Pekerjaan</label>
            <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-input" value="{{ old('pekerjaan', $warga->pekerjaan) }}">
            @error('pekerjaan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="pendidikan_terakhir" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Pendidikan Terakhir</label>
            <select name="pendidikan_terakhir" class="form-input">
                @php
                $options = [
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
                ];
                @endphp

                @foreach ($options as $option)
                <option value="{{ $option }}" {{ old('pendidikan_terakhir', $warga->pendidikan_terakhir ?? '') == $option ? 'selected' : '' }}>
                    {{ $option }}
                </option>
                @endforeach
            </select>

            @error('pendidikan_terakhir')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="agama" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Agama</label>
            <select name="agama" class="form-input">
                @php
                $agamaOptions = [
                'Islam',
                'Kristen Protestan',
                'Kristen Katolik',
                'Hindu',
                'Buddha',
                'Konghucu',
                'Kepercayaan Lain'
                ];
                @endphp

                @foreach ($agamaOptions as $agama)
                <option value="{{ $agama }}" {{ old('agama', $warga->agama ?? '') == $agama ? 'selected' : '' }}>
                    {{ $agama }}
                </option>
                @endforeach
            </select>

            @error('agama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="golongan_darah" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Golongan Darah</label>
            <select name="golongan_darah" class="form-input">
                @php
                $golonganDarahOptions = ['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-', 'A', 'B', 'AB', 'O', 'Tidak Tahu'];
                @endphp

                @foreach ($golonganDarahOptions as $gol)
                <option value="{{ $gol }}" {{ old('golongan_darah', $warga->golongan_darah ?? '') == $gol ? 'selected' : '' }}>
                    {{ $gol }}
                </option>
                @endforeach
            </select>

            @error('golongan_darah')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="status_perkawinan" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Status Perkawinan</label>
            <select name="status_perkawinan" class="form-input">
                @php
                $statusPerkawinanOptions = ['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati'];
                @endphp

                @foreach ($statusPerkawinanOptions as $status)
                <option value="{{ $status }}" {{ old('status_perkawinan', $warga->status_perkawinan ?? '') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
                @endforeach
            </select>

            @error('status_perkawinan')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="kategori_penduduk" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Kategori Penduduk</label>
            <select name="kategori_penduduk" class="form-input">
                @php
                $kategoriPendudukOptions = ['Tetap', 'Kontrak', 'Pendatang', 'Lainnya'];
                @endphp

                @foreach ($kategoriPendudukOptions as $kategori)
                <option value="{{ $kategori }}" {{ old('kategori_penduduk', $warga->kategori_penduduk ?? '') == $kategori ? 'selected' : '' }}>
                    {{ $kategori }}
                </option>
                @endforeach
            </select>

            @error('kategori_penduduk')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="rt" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Rukun Tetangga (RT)</label>
            <select name="rt" class="form-input">
                @for ($i = 1; $i <= 4; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ old('rt', $warga->rt ?? '') == sprintf('%02d', $i) ? 'selected' : '' }}>
                    RT {{ sprintf('%02d', $i) }}
                    </option>
                    @endfor
            </select>

            @error('rt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="rw" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Rukun Warga (RW)</label>
            <select name="rw" class="form-input">
                @for ($i = 1; $i <= 2; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ old('rw', $warga->rw ?? '') == sprintf('%02d', $i) ? 'selected' : '' }}>
                    RW {{ sprintf('%02d', $i) }}
                    </option>
                    @endfor
            </select>

            @error('rw')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nomor_rumah" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nomor Rumah</label>
            <input type="text" name="nomor_rumah" placeholder="Nomor Rumah" class="form-input" value="{{ old('nomor_rumah', $warga->nomor_rumah) }}">
            @error('nomor_rumah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="status_KK" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Status di KK</label>
            <select name="status_KK" class="form-input">
                <option value="">-- Pilih Status KK --</option>
                <option value="Kepala Keluarga" {{ old('status_KK', $warga->status_KK) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                <option value="Istri" {{ old('status_KK', $warga->status_KK) == 'Istri' ? 'selected' : '' }}>Istri</option>
                <option value="Anak" {{ old('status_KK', $warga->status_KK) == 'Anak' ? 'selected' : '' }}>Anak</option>
                <option value="Menantu" {{ old('status_KK', $warga->status_KK) == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                <option value="Orang Tua" {{ old('status_KK', $warga->status_KK) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                <option value="Cucu" {{ old('status_KK', $warga->status_KK) == 'Cucu' ? 'selected' : '' }}>Cucu</option>
                <option value="Mertua" {{ old('status_KK', $warga->status_KK) == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                <option value="Famili Lain" {{ old('status_KK', $warga->status_KK) == 'Famili Lain' ? 'selected' : '' }}>Famili Lain</option>
            </select>
            @error('status_KK')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="telepon" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nomor Telepon</label>
            <input type="text" name="telepon" placeholder="Telepon" class="form-input" value="{{ old('telepon', $warga->telepon) }}">
            @error('telepon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
            <label for="alamat" class="block text-sm font-medium text-gray-600 mb-1 ml-1">AlAMAT Lengkap</label>
            <textarea name="alamat" placeholder="Alamat Lengkap" class="form-input" required>{{ old('alamat', $warga->alamat) }}</textarea>
            @error('alamat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2 flex justify-end mt-6">
            <button type="submit" class="bg-sogan text-white font-medium px-6 py-2 rounded hover:bg-kunyit hover:text-sogan transition">
                Update
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