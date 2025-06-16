<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin - Dusun Kemiri</title>
</head>

<body>
    <h1>Dashboard Admin</h1>

    <p>Jumlah Warga: {{ $jumlahWarga }}</p>
    <p>Jumlah Berita: {{ $jumlahBerita }}</p>

    <a href="{{ route('admin.warga') }}">Kelo tla Data Warga</a> <br>
    <a href="{{ route('admin.berita.index') }}">Kelola Berita</a>
</body>

</html>