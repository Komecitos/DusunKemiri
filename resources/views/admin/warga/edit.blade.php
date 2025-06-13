@extends('layouts.admin') {{-- Sesuaikan dengan layout dashboard admin-mu --}}

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Data Warga</h2>

    <form action="{{ route('admin.warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama" class="block font-semibold">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $warga->nama) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="no_kk" class="block font-semibold">No. KK</label>
                <input type="text" name="no_kk" value="{{ old('no_kk', $warga->no_kk) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="nik" class="block font-semibold">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $warga->nik) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="tanggal_lahir" class="block font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="jenis_kelamin" class="block font-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select w-full" required>
                    <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label for="pekerjaan" class="block font-semibold">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="pendidikan_terakhir" class="block font-semibold">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $warga->pendidikan_terakhir) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="dusun" class="block font-semibold">Dusun</label>
                <input type="text" name="dusun" value="{{ old('dusun', $warga->dusun) }}" class="form-input w-full" required>
            </div>

            <div>
                <label for="rt_rw" class="block font-semibold">RT / RW</label>
                <input type="text" name="rt_rw" value="{{ old('rt_rw', $warga->rt_rw) }}" class="form-input w-full" required>
            </div>
        </div>

        <div class="mt-4">
            <label for="alamat" class="block font-semibold">Alamat Lengkap</label>
            <textarea name="alamat" rows="3" class="form-textarea w-full" required>{{ old('alamat', $warga->alamat) }}</textarea>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('admin.warga') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-black px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection