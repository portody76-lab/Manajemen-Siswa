<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK Dwira Harapan — {{ Auth::user()->kelas }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    /* ── Reset ── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #eef4fb; min-height: 100vh; color: #0d2137; }

    /* ── Header ── */
    .header {
      background: linear-gradient(90deg, #5baee8 0%, #a8d4f5 100%);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.9rem 2.5rem;
      box-shadow: 0 2px 12px rgba(91,174,232,0.25);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .logo {
      font-size: 1rem;
      font-weight: 800;
      color: white;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      letter-spacing: -0.01em;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .user-info {
      font-size: 0.82rem;
      font-weight: 600;
      color: #0d2137;
      background: rgba(255,255,255,0.5);
      padding: 0.3rem 0.8rem;
      border-radius: 20px;
    }

    .logout-btn {
      background: #ffffff;
      border: none;
      border-radius: 8px;
      padding: 0.35rem 1rem;
      font-size: 0.78rem;
      font-weight: 700;
      color: #1a6fc4;
      cursor: pointer;
      transition: all 0.2s;
      font-family: inherit;
    }

    .logout-btn:hover { background: #dc3545; color: white; }

    /* ── Main ── */
    .main { max-width: 820px; margin: 0 auto; padding: 2rem 1.5rem; }

    /* ── Banner ── */
    .banner {
      background: linear-gradient(135deg, #1a6fc4 0%, #4baee8 100%);
      border-radius: 20px;
      padding: 1.75rem 2rem;
      text-align: center;
      margin-bottom: 1.25rem;
      color: white;
      box-shadow: 0 6px 24px rgba(26,111,196,0.25);
    }

    .banner .welcome {
      font-size: 0.82rem;
      font-weight: 600;
      opacity: 0.85;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      margin-bottom: 0.3rem;
    }

    .banner h1 {
      font-size: 1.6rem;
      font-weight: 800;
      letter-spacing: -0.02em;
      margin-bottom: 0.2rem;
    }

    .banner p {
      font-size: 0.82rem;
      opacity: 0.8;
    }

    /* ── Tabs ── */
    .tabs-nav {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
      background: #fff;
      border-radius: 16px;
      padding: 0.6rem;
      box-shadow: 0 2px 10px rgba(168,212,245,0.2);
    }

    .tab-btn {
      flex: 1;
      background: transparent;
      color: #4a6380;
      border: none;
      border-radius: 12px;
      padding: 0.55rem 1rem;
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      display: block;
      transition: all 0.2s;
      font-family: inherit;
    }

    .tab-btn:hover { background: #eef4fb; color: #1a6fc4; }
    .tab-btn.active { background: #1a6fc4; color: #fff; box-shadow: 0 3px 10px rgba(26,111,196,0.3); }

    /* ── Stats ── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .stat-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.25rem 1rem;
      text-align: center;
      box-shadow: 0 2px 10px rgba(168,212,245,0.2);
      transition: transform 0.2s;
    }

    .stat-card:hover { transform: translateY(-2px); }

    .stat-card .stat-label {
      font-size: 0.72rem;
      font-weight: 700;
      color: #6b8aaa;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 0.4rem;
    }

    .stat-card .stat-value {
      font-size: 1.8rem;
      font-weight: 800;
      color: #1a6fc4;
      line-height: 1;
    }

    /* ── Section Title ── */
    .section-title {
      font-size: 0.9rem;
      font-weight: 700;
      color: #4a6380;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 0.75rem;
    }

    /* ── Struktur Kelas ── */
    .structure-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .struktur-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.1rem 1.25rem;
      box-shadow: 0 2px 10px rgba(168,212,245,0.2);
      min-height: 90px;
    }

    .struktur-card .role {
      font-size: 0.68rem;
      font-weight: 700;
      color: #6b8aaa;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 0.35rem;
    }

    .struktur-card .name {
      font-size: 0.9rem;
      font-weight: 600;
      color: #0d2137;
    }

    /* ── Tugas Terbaru ── */
    .tugas-list { display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 1.5rem; }

    .tugas-item {
      background: #fff;
      border-radius: 14px;
      padding: 1rem 1.25rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      box-shadow: 0 2px 8px rgba(168,212,245,0.15);
      border-left: 4px solid #cce0f5;
      transition: transform 0.15s;
    }

    .tugas-item:hover { transform: translateY(-1px); }
    .tugas-item.sudah { border-left-color: #059669; }
    .tugas-item.belum { border-left-color: #1a6fc4; }
    .tugas-item.berakhir { border-left-color: #dc2626; }

    .tugas-info { flex: 1; }

    .tugas-judul {
      font-size: 0.9rem;
      font-weight: 700;
      color: #0d2137;
      margin-bottom: 0.25rem;
    }

    .tugas-meta {
      font-size: 0.75rem;
      color: #6b8aaa;
      display: flex;
      gap: 0.5rem;
      align-items: center;
      flex-wrap: wrap;
    }

    .badge {
      display: inline-block;
      padding: 0.2rem 0.6rem;
      border-radius: 99px;
      font-size: 0.7rem;
      font-weight: 600;
    }

    .badge-sudah    { background: #d1fae5; color: #065f46; }
    .badge-belum    { background: #dbeafe; color: #1e40af; }
    .badge-berakhir { background: #fee2e2; color: #b91c1c; }
    .badge-mapel    { background: #e0f2fe; color: #075985; }

    .btn-kumpul {
      background: #1a6fc4;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 0.4rem 1rem;
      font-size: 0.75rem;
      font-weight: 700;
      text-decoration: none;
      white-space: nowrap;
      transition: background 0.2s;
      font-family: inherit;
    }

    .btn-kumpul:hover { background: #155da0; color: white; }

    .empty-card {
      background: #fff;
      border-radius: 14px;
      padding: 2rem;
      text-align: center;
      color: #94a3b8;
      font-size: 0.875rem;
      box-shadow: 0 2px 8px rgba(168,212,245,0.15);
    }

    /* ── Form Catatan ── */
    .form-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.5rem;
      box-shadow: 0 2px 10px rgba(168,212,245,0.2);
    }

    .form-card form { display: flex; flex-direction: column; gap: 0.75rem; }

    .form-card label {
      font-size: 0.72rem;
      font-weight: 700;
      color: #6b8aaa;
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    .form-card input,
    .form-card textarea {
      width: 100%;
      padding: 0.65rem 1rem;
      border: 1.5px solid #cce0f5;
      border-radius: 10px;
      background: #f4f8ff;
      font-size: 0.875rem;
      color: #0d2137;
      outline: none;
      transition: border-color 0.2s, background 0.2s;
      font-family: inherit;
    }

    .form-card input:focus,
    .form-card textarea:focus {
      border-color: #1a6fc4;
      background: #fff;
    }

    .form-card textarea { min-height: 100px; resize: vertical; }

    .form-card button {
      align-self: flex-start;
      background: #1a6fc4;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.55rem 1.75rem;
      font-size: 0.875rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s;
      font-family: inherit;
    }

    .form-card button:hover { background: #155da0; transform: translateY(-1px); }
  </style>
</head>
<body>

{{-- Header --}}
<header class="header">
  <div class="logo">
    <img src="{{ asset('img/logodwira.png') }}" alt="Logo" style="height: 40px; width: auto;">
    SMK Dwira Harapan
  </div>
  <div class="header-right">
    <span class="user-info">{{ Auth::user()->name }} · Absen {{ Auth::user()->absen }}</span>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Log Out</button>
    </form>
  </div>
</header>

{{-- Main --}}
<div class="main">

  {{-- Banner --}}
  <section class="banner">
    <p class="welcome">Selamat Datang, {{ Auth::user()->name }}</p>
    <h1>KELAS {{ strtoupper(Auth::user()->kelas) }}</h1>
    <p>SMK Dwira Harapan &nbsp;·&nbsp; Tahun Ajaran 2025/2026</p>
  </section>

  {{-- Tabs --}}
  <nav class="tabs-nav">
    <a href="{{ route('siswa.dashboard') }}"
      class="tab-btn {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
      Halaman Utama
    </a>
    <a href="{{ route('siswa.tugas.index') }}"
      class="tab-btn {{ request()->routeIs('siswa.tugas.*') ? 'active' : '' }}">
      Tugas
    </a>
  </nav>

  {{-- Stats --}}
  @php
    $totalMapel = $tugas->pluck('mata_pelajaran')->unique()->count();
    $totalTugas = $tugas->count();
    $sudahKirim = $tugas->filter(fn($t) => $t->sudahDikumpulkan(Auth::id()))->count();
  @endphp

  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-label">Mata Pelajaran</div>
      <div class="stat-value">{{ $totalMapel }}</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Tugas Aktif</div>
      <div class="stat-value">{{ $totalTugas }}</div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Sudah Dikumpulkan</div>
      <div class="stat-value" style="color:#059669;">{{ $sudahKirim }}</div>
    </div>
  </div>

  {{-- Struktur Kelas --}}
  <p class="section-title">Struktur Kelas</p>
  <div class="structure-grid">
    <div class="struktur-card">
      <div class="role">Ketua Kelas</div>
      <div class="name">—</div>
    </div>
    <div class="struktur-card">
      <div class="role">Wali Kelas</div>
      <div class="name">—</div>
    </div>
    <div class="struktur-card">
      <div class="role">Wakil Ketua</div>
      <div class="name">—</div>
    </div>
  </div>

  {{-- Tugas Terbaru --}}
  <p class="section-title">📌 Tugas Terbaru</p>
  <div class="tugas-list">
    @forelse($tugas->take(5) as $t)
      @php
        $sudah    = $t->sudahDikumpulkan(Auth::id());
        $berakhir = now()->gt($t->deadline);
        $itemClass = $sudah ? 'sudah' : ($berakhir ? 'berakhir' : 'belum');
      @endphp
      <div class="tugas-item {{ $itemClass }}">
        <div class="tugas-info">
          <div class="tugas-judul">{{ $t->judul }}</div>
          <div class="tugas-meta">
            <span class="badge badge-mapel">{{ $t->mata_pelajaran }}</span>
            ⏰ {{ $t->deadline->format('d M Y, H:i') }}
          </div>
        </div>
        @if($sudah)
          <span class="badge badge-sudah">✓ Terkumpul</span>
        @elseif($berakhir)
          <span class="badge badge-berakhir">Berakhir</span>
        @else
          <a href="{{ route('siswa.tugas.kirim', $t->id) }}" class="btn-kumpul">📤 Kumpulkan</a>
        @endif
      </div>
    @empty
      <div class="empty-card">Belum ada tugas untuk kelasmu saat ini.</div>
    @endforelse
  </div>

</div>
</body>
</html>