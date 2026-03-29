<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semua Pengumpulan — Dwira Harapan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    body { background: #f0f6ff; min-height: 100vh; display: flex; }
    .sidebar { width: 180px; min-height: 100vh; background: #ffffff; border-right: 1px solid #dce8f5; display: flex; flex-direction: column; align-items: center; padding: 1.5rem 0.75rem; position: fixed; top: 0; left: 0; bottom: 0; }
    .sidebar-logo-placeholder { width: 70px; height: 70px; background: #1a6fc4; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 0.7rem; text-align: center; margin-bottom: 1.5rem; line-height: 1.2; }
    .nav-item-link { display: flex; align-items: center; gap: 0.5rem; width: 100%; padding: 0.6rem 0.9rem; border-radius: 10px; text-decoration: none; color: #4a6380; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; margin-bottom: 0.25rem; }
    .nav-item-link:hover { background: #eaf4fc; color: #1a6fc4; }
    .nav-item-link.active { background: #1a6fc4; color: white; font-weight: 600; }
    .sidebar-bottom { margin-top: auto; width: 100%; }
    .btn-logout { width: 100%; padding: 0.6rem; background: #f0f6ff; border: 1.5px solid #a8cde8; border-radius: 10px; color: #1a3a52; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: all 0.2s; }
    .btn-logout:hover { background: #dc3545; border-color: #dc3545; color: white; }
    .main-content { margin-left: 180px; flex: 1; padding: 2rem 2.5rem; }
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 12px; }
    .page-header h1 { font-size: 1.6rem; font-weight: 700; color: #0d2137; margin: 0; }

    /* Stat chips */
    .stat-chips { display: flex; gap: 10px; margin-bottom: 1.5rem; flex-wrap: wrap; }
    .stat-chip { background: white; border: 1.5px solid #dce8f5; border-radius: 10px; padding: 0.6rem 1.2rem; display: flex; flex-direction: column; align-items: center; min-width: 110px; }
    .stat-chip .chip-value { font-size: 1.3rem; font-weight: 800; color: #0d2137; }
    .stat-chip .chip-label { font-size: 0.72rem; font-weight: 600; color: #6b8fa8; }
    .stat-chip.green .chip-value { color: #059669; }
    .stat-chip.red .chip-value { color: #dc2626; }

    .table-card { background: white; border: 1.5px solid #dce8f5; border-radius: 14px; overflow: hidden; }
    .table-card-header { padding: 1rem 1.5rem; border-bottom: 1.5px solid #eaf4fc; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .table-card-header h5 { font-size: 1rem; font-weight: 700; color: #0d2137; margin: 0; }
    .search-input { border: 1.5px solid #a8cde8; border-radius: 8px; padding: 0.45rem 0.9rem; font-size: 0.85rem; background: #f0f6ff; color: #0d2137; width: 240px; outline: none; }
    .search-input:focus { border-color: #1a6fc4; background: #fff; }
    table { width: 100%; border-collapse: collapse; }
    thead th { font-size: 0.78rem; font-weight: 700; color: #4a6380; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.75rem 1rem; background: #f5faff; border-bottom: 1.5px solid #dce8f5; }
    tbody td { font-size: 0.875rem; color: #0d2137; padding: 0.75rem 1rem; border-bottom: 1px solid #eaf4fc; vertical-align: middle; }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: #f5faff; }
    .badge-status { font-size: 0.75rem; font-weight: 600; padding: 0.25rem 0.7rem; border-radius: 99px; }
    .badge-tepat { background: #d1fae5; color: #065f46; }
    .badge-telat { background: #fee2e2; color: #b91c1c; }
    .badge-type { font-size: 0.72rem; font-weight: 600; padding: 0.2rem 0.6rem; border-radius: 6px; }
    .badge-pdf { background: #fee2e2; color: #b91c1c; }
    .badge-image { background: #dbeafe; color: #1e40af; }
    .btn-download { background: #1a6fc4; color: white; border: none; border-radius: 6px; padding: 0.3rem 0.75rem; font-size: 0.78rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; transition: all 0.2s; }
    .btn-download:hover { background: #155da0; color: white; }
    .table-footer { padding: 1rem 1.5rem; border-top: 1.5px solid #eaf4fc; display: flex; justify-content: space-between; align-items: center; font-size: 0.82rem; color: #4a6380; flex-wrap: wrap; gap: 8px; }
    .empty-state { text-align: center; padding: 3rem; color: #6b8fa8; }
    .empty-state .empty-icon { font-size: 2.5rem; margin-bottom: 0.5rem; }
  </style>
</head>
<body>

<div class="sidebar">
  <div>
    <img src="{{ asset('img/logodwira.png') }}" alt="" width="150px">
  </div>
  <nav style="width:100%;">
    <a href="{{ route('guru.dashboard') }}" class="nav-item-link">🏠 Dashboard</a>
    <a href="{{ route('guru.tugas.index') }}" class="nav-item-link">📋 Tugas Saya</a>
    <a href="{{ route('guru.tugas.create') }}" class="nav-item-link">➕ Tambah Tugas</a>
    <a href="{{ route('guru.siswa.index') }}" class="nav-item-link">👥 Data Siswa</a>
    <a href="{{ route('guru.semua-tugas.index') }}" class="nav-item-link">📚 Semua Tugas</a>
    <a href="{{ route('guru.semua-pengumpulan.index') }}" class="nav-item-link active">📥 Pengumpulan</a>
  </nav>
  <div class="sidebar-bottom">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn-logout">Log Out</button>
    </form>
  </div>
</div>

<div class="main-content">

  <div class="page-header">
    <h1>📥 Semua Pengumpulan</h1>
  </div>

  {{-- Stat Chips --}}
  <div class="stat-chips">
    <div class="stat-chip">
      <span class="chip-value">{{ $pengumpulan->total() }}</span>
      <span class="chip-label">Total Kiriman</span>
    </div>
    <div class="stat-chip green">
      <span class="chip-value">{{ $totalTepat }}</span>
      <span class="chip-label">Tepat Waktu</span>
    </div>
    <div class="stat-chip red">
      <span class="chip-value">{{ $totalTerlambat }}</span>
      <span class="chip-label">Terlambat</span>
    </div>
  </div>

  <div class="table-card">
    <div class="table-card-header">
      <h5>Daftar Semua Pengumpulan</h5>
      <form method="GET" action="{{ route('guru.semua-pengumpulan.index') }}">
        <input type="text" name="search" class="search-input"
          placeholder="🔍 Cari nama siswa, judul tugas..."
          value="{{ request('search') }}">
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Judul Tugas</th>
          <th>Tipe</th>
          <th>Waktu Kirim</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pengumpulan as $i => $p)
        <tr>
          <td>{{ $pengumpulan->firstItem() + $i }}</td>
          <td><span style="font-weight:600;">{{ $p->siswa->name }}</span></td>
          <td>{{ $p->siswa->kelas }}</td>
          <td style="color:#1a6fc4; font-weight:500;">{{ $p->tugas->judul }}</td>
          <td>
            <span class="badge-type badge-{{ $p->file_type }}">
              {{ strtoupper($p->file_type) }}
            </span>
          </td>
          <td>
            <div>{{ \Carbon\Carbon::parse($p->submitted_at)->format('d M Y') }}</div>
            <div style="font-size:0.78rem; color:#6b8fa8;">{{ \Carbon\Carbon::parse($p->submitted_at)->format('H:i') }}</div>
          </td>
          <td>
            @if($p->status === 'tepat_waktu')
              <span class="badge-status badge-tepat">Tepat Waktu</span>
            @else
              <span class="badge-status badge-telat">Terlambat</span>
            @endif
          </td>
          <td>
            <a href="{{ route('guru.kiriman.download', $p->id) }}" class="btn-download">⬇ Download</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="8">
            <div class="empty-state">
              <div class="empty-icon">📭</div>
              <p style="margin:0; font-size:0.875rem;">Belum ada pengumpulan tugas.</p>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>

    @if($pengumpulan->hasPages())
    <div class="table-footer">
      <span>Menampilkan {{ $pengumpulan->firstItem() }}–{{ $pengumpulan->lastItem() }} dari {{ $pengumpulan->total() }} kiriman</span>
      {{ $pengumpulan->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
    @endif
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>