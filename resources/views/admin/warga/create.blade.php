@extends('layouts.admin')

@section('title', 'Tambah Warga')

@section('content')
<h2 class="text-lg font-bold mb-4">Tambah Warga</h2>

<form action="{{ route('admin.warga.store') }}" method="POST" class="space-y-4">
    @csrf

    <input type="text" name="nama" placeholder="Nama" class="input" required>
    <input type="text" name="no_kk" placeholder="No. KK" class="input" required>
    <input type="text" name="nik" placeholder="NIK" class="input" required>
    <input type="date" name="tanggal_lahir" class="input" required>

    <select name="jenis_kelamin" class="input" required>
        <option value="">-- Jenis Kelamin --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>

    <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="input" required>
    <input type="text" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir" class="input" required>
    <textarea name="alamat" placeholder="Alamat" class="input" required></textarea>
    <input type="text" name="dusun" placeholder="Dusun" class="input" required>
    <input type="text" name="rt_rw" placeholder="RT/RW" class="input" required>

    <button type="submit" class="btn btn-green">Simpan</button>
</form>
@endsection