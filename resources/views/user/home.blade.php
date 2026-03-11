<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Sekolah - KELAS XI PPLG</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<div class="main-container">

    <header class="header">
        <div class="logo">
            <span>📖</span> Portal Sekolah
        </div>
        <div class="search-bar"></div>
    </header>

    <section class="banner">
        <h1>KELAS XI PPLG</h1>
        <p>SMK Pariwisata Triatmajaya, Tahun Ajaran 2025/2026</p>
    </section>

    <nav class="tabs-nav">
        <button class="tab-btn active">Ringkasan</button>
        <button class="tab-btn">Siswa</button>
        <button class="tab-btn">Jadwal</button>
        <button class="tab-btn">Tugas</button>
    </nav>

    <div class="stats-grid">
        <div class="card card-small">Total Siswa : 30</div>
        <div class="card card-small">Mata Pelajaran : 12</div>
        <div class="card card-small">Tugas : 5</div>
        <div class="card card-small">Tahun Ajaran : 2025/2026</div>
    </div>

    <h3 class="section-title">Struktur Kelas</h3>

    <div class="structure-grid">
        <div class="card card-large">Ketua Kelas : -</div>
        <div class="card card-large">Wali Kelas : -</div>
        <div class="card card-large">Wakil Ketua : -</div>
    </div>

    <h3 class="section-title">Tambah Catatan</h3>

    <div class="card card-large">
        <form action="/catatan" method="POST">
            
            @csrf

            <label>Judul Catatan</label>
            <input type="text" name="judul" placeholder="Masukkan judul">

            <label>Isi Catatan</label>
            <textarea name="isi" placeholder="Tulis catatan..."></textarea>

            <button type="submit">Kirim</button>

        </form>
    </div>

</div>

</body>
</html>