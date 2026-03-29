<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas — Dwira Harapan</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', Arial, sans-serif; }
    body { background: #f4f8ff; min-height: 100vh; }

    .header { background: #a8d4f5; display: flex; align-items: center; justify-content: space-between; padding: 0.85rem 2rem; width: 100%; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
    .logo { font-size: 1rem; font-weight: 700; color: #0d2137; }
    .user-info { font-size: 0.82rem; font-weight: 600; color: #0d2137; }
    .logout-btn { background: none; border: 1.5px solid #0d2137; border-radius: 8px; padding: 0.3rem 0.9rem; font-size: 0.78rem; font-weight: 600; color: #0d2137; cursor: pointer; transition: all 0.2s; }
    .logout-btn:hover { background: #dc3545; border-color: #dc3545; color: white; }

    .main-container { max-width: 860px; margin: 0 auto; padding: 1.75rem 1.5rem; }

    .banner { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 18px; padding: 1.25rem 1.5rem; text-align: center; margin-bottom: 1rem; box-shadow: 0 2px 10px rgba(168,212,245,0.2); }
    .banner h1 { font-size: 1.4rem; font-weight: 700; color: #0d2137; margin-bottom: 0.25rem; }
    .banner p { font-size: 0.82rem; color: #6b8aaa; }

    .tabs-nav { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 18px; padding: 0.7rem 1.25rem; display: flex; justify-content: space-between; margin-bottom: 1.25rem; box-shadow: 0 2px 10px rgba(168,212,245,0.15); gap: 0.75rem; }
    .tab-btn { background: #a8d4f5; color: #0d2137; border: none; border-radius: 20px; padding: 0.4rem 2rem; font-size: 0.85rem; font-weight: 600; cursor: pointer; flex: 1; text-decoration: none; text-align: center; display: block; transition: background 0.2s, color 0.2s; }
    .tab-btn:hover { background: #1a6fc4; color: #fff; }
    .tab-btn.active { background: #1a6fc4; color: #fff; }

    .section-title { font-size: 1rem; font-weight: 700; color: #1e3a5f; margin-bottom: 14px; }

    /* Filter */
    .filter-bar { display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap; }
    .filter-btn { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 20px; padding: 0.35rem 1rem; font-size: 0.78rem; font-weight: 600; color: #4a6380; cursor: pointer; text-decoration: none; transition: all 0.2s; }
    .filter-btn:hover, .filter-btn.active { background: #1a6fc4; border-color: #1a6fc4; color: white; }

    /* Tugas card */
    .tugas-card { background: #fff; border-radius: 14px; padding: 16px 20px; margin-bottom: 12px; display: flex; align-items: center; gap: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); text-decoration: none; color: inherit; transition: transform 0.15s, box-shadow 0.15s; border-left: 4px solid transparent; }
    .tugas-card:hover { transform: translateY(-2px); box-shadow: 0 4px 14px rgba(0,0,0,0.1); }
    .tugas-card.sudah { border-left-color: #059669; }
    .tugas-card.belum { border-left-color: #1a6fc4; }
    .tugas-card.berakhir { border-left-color: #dc2626; }

    .tugas-icon { font-size: 1.8rem; flex-shrink: 0; }
    .tugas-info { flex: 1; }
    .tugas-judul { font-weight: 700; font-size: 0.95rem; color: #1e3a5f; margin-bottom: 6px; }
    .tugas-meta { font-size: 0.8rem; color: #64748b; display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }

    .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
    .badge-sudah    { background: #d1fae5; color: #065f46; }
    .badge-belum    { background: #fee2e2; color: #991b1b; }
    .badge-berakhir { background: #f3f4f6; color: #6b7280; }
    .badge-mapel    { background: #dbeafe; color: #1e40af; }

    .tugas-right { display: flex; flex-direction: column; align-items: flex-end; gap: 8px; flex-shrink: 0; }
    .tugas-deadline { font-size: 0.78rem; color: #475569; font-weight: 600; text-align: right; }
    .tugas-deadline .tgl { font-size: 0.72rem; color: #94a3b8; font-weight: 400; }

    .btn-kumpul { background: #1a6fc4; color: white; border: none; border-radius: 8px; padding: 0.35rem 0.9rem; font-size: 0.78rem; font-weight: 600; text-decoration: none; transition: all 0.2s; white-space: nowrap; }
    .btn-kumpul:hover { background: #155da0; color: white; }
    .btn-sudah { background: #d1fae5; color: #065f46; border-radius: 8px; padding: 0.35rem 0.9rem; font-size: 0.78rem; font-weight: 600; white-space: nowrap; }

    .empty-state { background: #fff; border-radius: 14px; padding: 48px 20px; text-align: center; color: #94a3b8; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    .empty-state .icon { font-size: 2.5rem; margin-bottom: 12px; }
  </style>
</head>
<body>

<header class="header">
  <div class="logo">📖 Portal Sekolah</div>
  <div style="display:flex; align-items:center; gap:12px;">
    <span class="user-info">{{ Auth::user()->name }} · Absen {{ Auth::user()->absen }}</span>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Log Out</button>
    </form>
  </div>
</header>

<div class="main-container">

  <section class="banner">
    <h1>KELAS {{ strtoupper(Auth::user()->kelas) }}</h1>
    <p>SMK Dwira Harapan &nbsp;·&nbsp; Tahun Ajaran 2025/2026</p>
  </section>

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