<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Sekolah - {{ Auth::user()->kelas }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', Arial, sans-serif; }
    body { background: #f4f8ff; min-height: 100vh; }

    .header { background: #a8d4f5; display: flex; align-items: center; justify-content: space-between; padding: 0.85rem 2rem; width: 100%; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
    .logo { font-size: 1rem; font-weight: 700; color: #0d2137; display: flex; align-items: center; gap: 0.4rem; }
    .user-info { font-size: 0.82rem; font-weight: 600; color: #0d2137; }

    .main-container { max-width: 860px; margin: 0 auto; padding: 1.75rem 1.5rem; }

    .banner { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 18px; padding: 1.25rem 1.5rem; text-align: center; margin-bottom: 1rem; box-shadow: 0 2px 10px rgba(168,212,245,0.2); }
    .banner h1 { font-size: 1.4rem; font-weight: 700; color: #0d2137; margin-bottom: 0.25rem; }
    .banner p { font-size: 0.82rem; color: #6b8aaa; }

    .tabs-nav { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 18px; padding: 0.7rem 1.25rem; display: flex; justify-content: space-between; margin-bottom: 1.25rem; box-shadow: 0 2px 10px rgba(168,212,245,0.15); gap: 0.75rem; }
    .tab-btn { background: #a8d4f5; color: #0d2137; border: none; border-radius: 20px; padding: 0.4rem 2rem; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: background 0.2s, color 0.2s; flex: 1; text-decoration: none; text-align: center; display: block; }
    .tab-btn:hover { background: #1a6fc4; color: #fff; }
    .tab-btn.active { background: #1a6fc4; color: #fff; }

    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.25rem; }
    .structure-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.25rem; }

    .card { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 18px; padding: 1rem 1.25rem; color: #0d2137; font-size: 0.875rem; font-weight: 500; box-shadow: 0 2px 8px rgba(168,212,245,0.15); }
    .card-small { min-height: 90px; display: flex; align-items: center; justify-content: center; text-align: center; font-weight: 600; font-size: 0.9rem; }
    .card-large { min-height: 110px; }

    .section-title { font-size: 0.95rem; font-weight: 700; color: #0d2137; margin-bottom: 0.75rem; }

    /* Tugas list */
    .tugas-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 1.25rem; }
    .tugas-item { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 14px; padding: 1rem 1.25rem; display: flex; align-items: center; justify-content: space-between; gap: 12px; box-shadow: 0 2px 8px rgba(168,212,245,0.1); }
    .tugas-item.sudah { border-left: 4px solid #059669; }
    .tugas-item.belum { border-left: 4px solid #1a6fc4; }
    .tugas-item.berakhir { border-left: 4px solid #dc2626; }
    .tugas-info { display: flex; flex-direction: column; gap: 3px; flex: 1; }
    .tugas-judul { font-size: 0.9rem; font-weight: 700; color: #0d2137; }
    .tugas-meta { font-size: 0.78rem; color: #4a6380; }
    .badge { font-size: 0.72rem; font-weight: 600; padding: 0.2rem 0.65rem; border-radius: 99px; white-space: nowrap; }
    .badge-sudah   { background: #d1fae5; color: #065f46; }
    .badge-belum   { background: #dbeafe; color: #1e40af; }
    .badge-berakhir { background: #fee2e2; color: #b91c1c; }
    .btn-kumpul { background: #1a6fc4; color: white; border: none; border-radius: 8px; padding: 0.4rem 1rem; font-size: 0.78rem; font-weight: 600; text-decoration: none; white-space: nowrap; transition: all 0.2s; }
    .btn-kumpul:hover { background: #155da0; color: white; }

    .empty-state { text-align: center; padding: 2rem; color: #6b8fa8; }

    /* Form catatan */
    .card form { display: flex; flex-direction: column; gap: 0.5rem; }
    .card form label { font-size: 0.78rem; font-weight: 600; color: #4a6380; text-transform: uppercase; letter-spacing: 0.04em; }
    .card form input, .card form textarea { width: 100%; padding: 0.55rem 0.9rem; border: 1.5px solid #a8cde8; border-radius: 10px; background: #eaf4fc; font-size: 0.875rem; color: #0d2137; outline: none; transition: border-color 0.2s, background 0.2s; }
    .card form input:focus, .card form textarea:focus { border-color: #1a6fc4; background: #fff; }
    .card form textarea { min-height: 100px; resize: vertical; }
    .card form button { align-self: flex-start; background: #1a6fc4; color: #ffffff; border: none; border-radius: 10px; padding: 0.5rem 1.75rem; font-size: 0.875rem; font-weight: 700; cursor: pointer; transition: background 0.2s, transform 0.15s; }
    .card form button:hover { background: #155da0; transform: translateY(-1px); }

    .logout-btn { background: none; border: 1.5px solid #0d2137; border-radius: 8px; padding: 0.3rem 0.9rem; font-size: 0.78rem; font-weight: 600; color: #0d2137; cursor: pointer; transition: all 0.2s; }
    .logout-btn:hover { background: #dc3545; border-color: #dc3545; color: white; }
  </style>
</head>
<body>

<header class="header">
  <div class="logo">📖 Portal Sekolah</div>
  <div class="d-flex align-items-center gap-3">
    <span class="user-info">{{ Auth::user()->name }} · Absen {{ Auth::user()->absen }}</span>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Log Out</button>
    </form>
  </div>
</header>

<div class="main-container">

  {{-- Banner --}}
  <section class="banner"> <br>
    <h1>Selamat datang, {{ Auth :: user()->name }} ( {{ Auth :: user()->absen }} )</h1>
    <h1>KELAS {{ strtoupper(Auth::user()->kelas) }}</h1> <br>
    <p>SMK Dwira Harapan &nbsp;·&nbsp; Tahun Ajaran 2025/2026</p> <br>
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
    $totalMapel  = $tugas->pluck('mata_pelajaran')->unique()->count();
    $totalTugas  = $tugas->count();
    $sudahKirim  = $tugas->filter(fn($t) => $t->sudahDikumpulkan(Auth::id()))->count();
    $belumKirim  = $totalTugas - $sudahKirim;
  @endphp

  <div class="stats-grid">
    <div class="card card-small">Mata Pelajaran<br><span style="font-size:1.4rem; color:#1a6fc4;">{{ $totalMapel }}</span></div>
    <div class="card card-small">Tugas Aktif<br><span style="font-size:1.4rem; color:#1a6fc4;">{{ $totalTugas }}</span></div>
    <div class="card card-small">Sudah Dikumpulkan<br><span style="font-size:1.4rem; color:#059669;">{{ $sudahKirim }}</span></div>
  </div>

  {{-- Struktur Kelas --}}
  <h3 class="section-title">Struktur Kelas</h3>
  <div class="structure-grid">
    <div class="card card-large" style="display:flex; flex-direction:column; gap:4px;">
      <span style="font-size:0.72rem; font-weight:700; color:#6b8aaa; text-transform:uppercase;">Ketua Kelas</span>
      <span style="font-weight:600;">-</span>
    </div>
    <div class="card card-large" style="display:flex; flex-direction:column; gap:4px;">
      <span style="font-size:0.72rem; font-weight:700; color:#6b8aaa; text-transform:uppercase;">Wali Kelas</span>
      <span style="font-weight:600;">-</span>
    </div>
    <div class="card card-large" style="display:flex; flex-direction:column; gap:4px;">
      <span style="font-size:0.72rem; font-weight:700; color:#6b8aaa; text-transform:uppercase;">Wakil Ketua</span>
      <span style="font-weight:600;">-</span>
    </div>
  </div>

  {{-- Tugas Terbaru --}}
  <h3 class="section-title">📌 Tugas Terbaru</h3>
  <div class="tugas-list">
    @forelse($tugas->take(5) as $t)
      @php
        $sudah    = $t->sudahDikumpulkan(Auth::id());
        $berakhir = now()->gt($t->deadline);
        $itemClass = $sudah ? 'sudah' : ($berakhir ? 'berakhir' : 'belum');
      @endphp
      <div class="tugas-item {{ $itemClass }}">
        <div class="tugas-info">
          <span class="tugas-judul">{{ $t->judul }}</span>
          <span class="tugas-meta">📚 {{ $t->mata_pelajaran }} &nbsp;·&nbsp; ⏰ {{ $t->deadline->format('d M Y, H:i') }}</span>
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
      <div class="card empty-state">
        <p>Belum ada tugas untuk kelasmu saat ini.</p>
      </div>
    @endforelse
  </div>

  {{-- Catatan --}}
  <h3 class="section-title">Tambah Catatan</h3>
  <div class="card" style="min-height:auto; padding: 1.25rem;">
    <form action="/catatan" method="POST">
      @csrf
      <label>Judul Catatan</label>
      <input type="text" name="judul" placeholder="Contoh: Rangkuman Bab 3">
      <label>Isi Catatan</label>
      <textarea name="isi" placeholder="Tulis catatanmu di sini..."></textarea>
      <button type="submit">Kirim</button>
    </form>
  </div>

</div>
</body>
</html> 