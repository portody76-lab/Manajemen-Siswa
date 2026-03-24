<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Sekolah - KELAS XI PPLG</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link>
  
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Plus Jakarta Sans', Arial, sans-serif;
    }

    body {
      background: #f4f8ff;
      min-height: 100vh;
    }

    /* ── Header ── */
    .header {
      background: #a8d4f5;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.85rem 2rem;
      width: 100%;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .logo {
      font-size: 1rem;
      font-weight: 700;
      color: #0d2137;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .search-bar {
      width: 160px;
      height: 32px;
      background: #ffffff;
      border-radius: 20px;
      border: 1.5px solid #cce0f5;
    }

    /* ── Main Container ── */
    .main-container {
      max-width: 860px;
      margin: 0 auto;
      padding: 1.75rem 1.5rem;
    }

    /* ── Banner ── */
    .banner {
      background: #ffffff;
      border: 1.5px solid #cce0f5;
      border-radius: 18px;
      padding: 1.25rem 1.5rem;
      text-align: center;
      margin-bottom: 1rem;
      box-shadow: 0 2px 10px rgba(168,212,245,0.2);
    }

    .banner h1 {
      font-size: 1.4rem;
      font-weight: 700;
      color: #0d2137;
      margin-bottom: 0.25rem;
    }

    .banner p {
      font-size: 0.82rem;
      color: #6b8aaa;
    }

    /* ── Tabs Nav ── */
    .tabs-nav {
      background: #ffffff;
      border: 1.5px solid #cce0f5;
      border-radius: 18px;
      padding: 0.7rem 1.25rem;
      display: flex;
      justify-content: space-between;
      margin-bottom: 1.25rem;
      box-shadow: 0 2px 10px rgba(168,212,245,0.15);
      flex: 1;
       gap: 0.75rem;
    }

    .tab-btn {
      background: #a8d4f5;
      color: #0d2137;
      border: none;
      border-radius: 20px;
      padding: 0.4rem 2rem;
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      flex: 1;
    }

    .tab-btn:hover {
      background: #1a6fc4;
      color: #fff;
    }

    /* ── Stats Grid ── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.25rem;
    }

    /* ── Structure Grid ── */
    .structure-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.25rem;
    }

    /* ── Cards ── */
    .card {
      background: #ffffff;
      border: 1.5px solid #cce0f5;
      border-radius: 18px;
      padding: 1rem 1.25rem;
      color: #0d2137;
      font-size: 0.875rem;
      font-weight: 500;
      box-shadow: 0 2px 8px rgba(168,212,245,0.15);
    }

    .card-small {
      min-height: 90px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .card-large {
      min-height: 110px;
    }

    /* ── Section Title ── */
    .section-title {
      font-size: 0.95rem;
      font-weight: 700;
      color: #0d2137;
      margin-bottom: 0.75rem;
    }

    /* ── Form Catatan ── */
    .card form {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .card form label {
      font-size: 0.78rem;
      font-weight: 600;
      color: #4a6380;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .card form input,
    .card form textarea {
      width: 100%;
      padding: 0.55rem 0.9rem;
      border: 1.5px solid #a8cde8;
      border-radius: 10px;
      background: #eaf4fc;
      font-size: 0.875rem;
      color: #0d2137;
      outline: none;
      transition: border-color 0.2s, background 0.2s;
    }

    .card form input:focus,
    .card form textarea:focus {
      border-color: #1a6fc4;
      background: #fff;
    }

    .card form textarea {
      min-height: 100px;
      resize: vertical;
    }

    .card form button {
      align-self: flex-start;
      background: #1a6fc4;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      padding: 0.5rem 1.75rem;
      font-size: 0.875rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s;
    }

    .card form button:hover {
      background: #155da0;
      transform: translateY(-1px);
    }
    .tab-btn.active {
    background: #1a6fc4;
    color: #fff;
}
    </style>
  </link>
</head>
<body>

<header class="header">
  <div class="logo">📖 Portal Sekolah</div>
  <div class="search-bar"></div>
</header>

<div class="main-container">

  <section class="banner">
    <h1>KELAS XI PPLG</h1>
    <p>SMK Pariwisata Triatmajaya, Tahun Ajaran 2025/2026</p>
  </section>

  <nav class="tabs-nav">
        <a href="{{ route('siswa.dashboard') }}" 
        class="tab-btn {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}"
        style="text-decoration:none; text-align:center;">
        Halaman Utama
        </a>
        <a href="{{ route('siswa.tugas.index') }}" 
        class="tab-btn {{ request()->routeIs('siswa.tugas.*') ? 'active' : '' }}"
        style="text-decoration:none; text-align:center;">
        Tugas
        </a>
    </nav>

  <div class="stats-grid">
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

  <div class="card" style="min-height:auto; padding: 1.25rem;">
    <form action="/catatan" method="POST">
      @csrf
      <label>Judul Catatan</label>
      <input type="text" name="judul">

      <label>Isi Catatan</label>
      <textarea name="isi"></textarea>

      <button type="submit">Kirim</button>
    </form>
  </div>

</div>

</body>
</html>