<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas — Dwira Harapan</title>
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

    .logo { font-size: 1rem; font-weight: 800; color: white; display: flex; align-items: center; gap: 0.5rem; }

    .header-right { display: flex; align-items: center; gap: 1rem; }

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
      padding: 1.5rem 2rem;
      text-align: center;
      margin-bottom: 1.25rem;
      color: white;
      box-shadow: 0 6px 24px rgba(26,111,196,0.25);
    }

    .banner h1 { font-size: 1.5rem; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 0.2rem; }
    .banner p { font-size: 0.82rem; opacity: 0.8; }

    /* ── Tabs ── */
    .tabs-nav {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 1.25rem;
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

    /* ── Filter ── */
    .filter-bar {
      display: flex;
      gap: 0.5rem;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }

    .filter-btn {
      background: #fff;
      border: 1.5px solid #cce0f5;
      border-radius: 20px;
      padding: 0.35rem 1rem;
      font-size: 0.78rem;
      font-weight: 600;
      color: #4a6380;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s;
      font-family: inherit;
    }

    .filter-btn:hover { border-color: #1a6fc4; color: #1a6fc4; }
    .filter-btn.active { background: #1a6fc4; border-color: #1a6fc4; color: white; }

    /* ── Section Title ── */
    .section-title {
      font-size: 0.9rem;
      font-weight: 700;
      color: #4a6380;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 0.75rem;
    }

    /* ── Tugas Cards ── */
    .tugas-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.1rem 1.5rem;
      margin-bottom: 0.75rem;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 2px 10px rgba(168,212,245,0.15);
      border-left: 4px solid #cce0f5;
      transition: transform 0.15s, box-shadow 0.15s;
    }

    .tugas-card:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(168,212,245,0.3); }
    .tugas-card.sudah   { border-left-color: #059669; }
    .tugas-card.belum   { border-left-color: #1a6fc4; }
    .tugas-card.berakhir { border-left-color: #dc2626; }

    .tugas-icon { font-size: 1.6rem; flex-shrink: 0; }

    .tugas-info { flex: 1; }

    .tugas-judul {
      font-size: 0.92rem;
      font-weight: 700;
      color: #0d2137;
      margin-bottom: 0.35rem;
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
    .badge-belum    { background: #fee2e2; color: #991b1b; }
    .badge-berakhir { background: #f3f4f6; color: #6b7280; }
    .badge-mapel    { background: #e0f2fe; color: #075985; }

    .tugas-right {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 0.5rem;
      flex-shrink: 0;
    }

    .tugas-deadline {
      font-size: 0.78rem;
      font-weight: 700;
      color: #4a6380;
      text-align: right;
    }

    .tugas-deadline .tgl { font-size: 0.7rem; color: #94a3b8; font-weight: 400; }

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

    .btn-sudah {
      background: #d1fae5;
      color: #065f46;
      border-radius: 8px;
      padding: 0.4rem 1rem;
      font-size: 0.75rem;
      font-weight: 700;
      white-space: nowrap;
    }

    /* ── Empty State ── */
    .empty-state {
      background: #fff;
      border-radius: 16px;
      padding: 3rem 2rem;
      text-align: center;
      color: #94a3b8;
      box-shadow: 0 2px 10px rgba(168,212,245,0.15);
    }

    .empty-state .icon { font-size: 2.5rem; margin-bottom: 0.75rem; }
    .empty-state p { font-size: 0.875rem; }
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

  {{-- Filter --}}
  <div class="filter-bar">
    <a href="{{ route('siswa.tugas.index') }}"
      class="filter-btn {{ !request('filter') ? 'active' : '' }}">Semua</a>
    <a href="{{ route('siswa.tugas.index', ['filter' => 'belum']) }}"
      class="filter-btn {{ request('filter') === 'belum' ? 'active' : '' }}">Belum Dikumpulkan</a>
    <a href="{{ route('siswa.tugas.index', ['filter' => 'sudah']) }}"
      class="filter-btn {{ request('filter') === 'sudah' ? 'active' : '' }}">Sudah Dikumpulkan</a>
    <a href="{{ route('siswa.tugas.index', ['filter' => 'aktif']) }}"
      class="filter-btn {{ request('filter') === 'aktif' ? 'active' : '' }}">Aktif</a>
  </div>

  <p class="section-title">Daftar Tugas</p>

  {{-- Tugas List --}}
  @forelse($tugas as $t)
    @php
      $sudah    = $t->sudahDikumpulkan(Auth::id());
      $berakhir = now()->gt($t->deadline);
      $cardClass = $sudah ? 'sudah' : ($berakhir ? 'berakhir' : 'belum');
      $icon      = $sudah ? '✅' : ($berakhir ? '🔒' : '📋');
    @endphp
    <div class="tugas-card {{ $cardClass }}">
      <div class="tugas-icon">{{ $icon }}</div>
      <div class="tugas-info">
        <div class="tugas-judul">{{ $t->judul }}</div>
        <div class="tugas-meta">
          <span class="badge badge-mapel">{{ $t->mata_pelajaran }}</span>
          @if($sudah)
            <span class="badge badge-sudah">✓ Sudah Dikumpulkan</span>
          @elseif($berakhir)
            <span class="badge badge-berakhir">Deadline Terlewat</span>
          @else
            <span class="badge badge-belum">Belum Dikumpulkan</span>
          @endif
        </div>
      </div>
      <div class="tugas-right">
        <div class="tugas-deadline">
          {{ $t->deadline->format('H:i') }}
          <div class="tgl">{{ $t->deadline->format('d M Y') }}</div>
        </div>
        @if($sudah)
          <span class="btn-sudah">✅ Terkumpul</span>
        @elseif(!$berakhir)
          <a href="{{ route('siswa.tugas.kirim', $t->id) }}" class="btn-kumpul">📤 Kumpulkan</a>
        @endif
      </div>
    </div>
  @empty
    <div class="empty-state">
      <div class="icon">📭</div>
      <p>Belum ada tugas saat ini.</p>
    </div>
  @endforelse

</div>
</body>
</html>