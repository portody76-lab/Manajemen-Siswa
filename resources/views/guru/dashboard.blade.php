<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Guru — Dwira Harapan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }

    body {
      background: #f0f6ff;
      min-height: 100vh;
      display: flex;
    }

    /* ── Sidebar ── */
    .sidebar {
      width: 180px;
      min-height: 100vh;
      background: #ffffff;
      border-right: 1px solid #dce8f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 1.5rem 0.75rem;
      position: fixed;
      top: 0; left: 0; bottom: 0;
    }

    .sidebar-logo-placeholder {
      width: 70px;
      height: 70px;
      background: #1a6fc4;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
      font-size: 0.7rem;
      text-align: center;
      margin-bottom: 1.5rem;
      line-height: 1.2;
    }

    .nav-item-link {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      width: 100%;
      padding: 0.6rem 0.9rem;
      border-radius: 10px;
      text-decoration: none;
      color: #4a6380;
      font-size: 0.85rem;
      font-weight: 500;
      transition: all 0.2s;
      margin-bottom: 0.25rem;
    }

    .nav-item-link:hover {
      background: #eaf4fc;
      color: #1a6fc4;
    }

    .nav-item-link.active {
      background: #1a6fc4;
      color: white;
      font-weight: 600;
    }

    .sidebar-bottom {
      margin-top: auto;
      width: 100%;
    }

    .btn-logout {
      width: 100%;
      padding: 0.6rem;
      background: #f0f6ff;
      border: 1.5px solid #a8cde8;
      border-radius: 10px;
      color: #1a3a52;
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-logout:hover {
      background: #dc3545;
      border-color: #dc3545;
      color: white;
    }

    /* ── Main Content ── */
    .main-content {
      margin-left: 180px;
      flex: 1;
      padding: 2rem 2.5rem;
    }

    .page-header {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 2rem;
    }

    .page-header h1 {
      font-size: 1.6rem;
      font-weight: 700;
      color: #0d2137;
      margin: 0;
    }

    /* ── Stat Cards ── */
    .stat-card {
      background: #ffffff;
      border: 1.5px solid #dce8f5;
      border-radius: 14px;
      padding: 1rem 1.25rem;
      text-align: center;
    }

    .stat-card .stat-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #1a3a52;
      margin-bottom: 0.5rem;
    }

    .stat-card .stat-value {
      font-size: 1.4rem;
      font-weight: 700;
      color: #0d2137;
      border: 2px solid #a8cde8;
      border-radius: 8px;
      padding: 0.15rem 0.75rem;
      display: inline-block;
    }

    .btn-view {
      background: #1a6fc4;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 0.35rem 1rem;
      font-size: 0.85rem;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.2s;
    }

    .btn-view:hover {
      background: #155da0;
      color: white;
    }

    /* ── Table Card ── */
    .table-card {
      background: #ffffff;
      border: 1.5px solid #dce8f5;
      border-radius: 14px;
      padding: 1.25rem;
      margin-top: 1.5rem;
    }

    .search-input {
      border: 1.5px solid #a8cde8;
      border-radius: 8px;
      padding: 0.45rem 0.9rem;
      font-size: 0.85rem;
      background: #f0f6ff;
      color: #0d2137;
      width: 260px;
      outline: none;
      margin-bottom: 1rem;
    }

    .search-input:focus {
      border-color: #1a6fc4;
      background: #fff;
    }

    table { width: 100%; border-collapse: collapse; }

    thead th {
      font-size: 0.8rem;
      font-weight: 700;
      color: #4a6380;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      padding: 0.6rem 0.75rem;
      border-bottom: 1.5px solid #dce8f5;
    }

    tbody td {
      font-size: 0.875rem;
      color: #0d2137;
      padding: 0.65rem 0.75rem;
      border-bottom: 1px solid #eaf4fc;
    }

    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: #f5faff; }

    .badge-role {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 0.25rem 0.6rem;
      border-radius: 99px;
    }

    .badge-guru  { background: #d1fae5; color: #065f46; }
    .badge-siswa { background: #dbeafe; color: #1e40af; }

    .btn-edit {
      background: #1a6fc4;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 0.3rem 0.75rem;
      font-size: 0.78rem;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.2s;
    }
    .btn-edit:hover { background: #155da0; color: white; }

    .btn-delete {
      background: #dc3545;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 0.3rem 0.75rem;
      font-size: 0.78rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }
    .btn-delete:hover { background: #b02a37; }

    .pagination-wrap {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1rem;
      font-size: 0.82rem;
      color: #4a6380;
    }
  </style>
</head>
<body>

{{-- ── Sidebar ── --}}
<div class="sidebar">
  <div class="sidebar-logo-placeholder">DWIRA<br>HARAPAN</div>

  <nav style="width:100%;">
    <a href="{{ route('guru.dashboard') }}" class="nav-item-link active">🏠 Dashboard</a>
    <a href="{{ route('guru.tugas.index') }}" class="nav-item-link">📋 Tugas Saya</a>
    <a href="{{ route('guru.tugas.create') }}" class="nav-item-link">➕ Tambah Tugas</a>
    <a href="{{ route('guru.siswa.index') }}" class="nav-item-link">👥 Data Siswa</a>
    <a href="{{ route('guru.semua-tugas.index') }}" class="nav-item-link">📚 Semua Tugas</a>
    <a href="{{ route('guru.semua-pengumpulan.index') }}" class="nav-item-link">📥 Pengumpulan</a>
  </nav>

  <div class="sidebar-bottom">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn-logout">Log Out</button>
    </form>
  </div>
</div>

{{-- ── Main Content ── --}}
<div class="main-content">

  <div class="page-header">
    <span style="font-size:1.6rem;">👤</span>
    <h1>Dashboard Guru</h1>
  </div>

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" style="border-radius:10px; font-size:0.875rem;">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Stat Cards --}}
  <div class="row g-3 mb-2">
    <div class="col-auto">
      <div class="stat-card">
        <div class="stat-label">Total Users</div>
        <div class="stat-value">{{ $totalSiswa }}</div>
      </div>
    </div>
    <div class="col-auto">
      <div class="stat-card">
        <div class="stat-label">Total Tugas</div>
        <div class="stat-value">{{ $totalTugas }}</div>
      </div>
    </div>
    <div class="col-auto">
      <div class="stat-card">
        <div class="stat-label">Lihat Tugas</div>
        <div class="mt-2">
          <a href="{{ route('guru.semua-tugas.index') }}" class="btn-view">View Tasks</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Table --}}
  <div class="table-card">
    <form method="GET" action="{{ route('guru.dashboard') }}">
      <input
        type="text"
        name="search"
        class="search-input"
        placeholder="🔍 Search User..."
        value="{{ request('search') }}"
      >
    </form>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <span class="badge-role badge-{{ $user->role }}">
              {{ ucfirst($user->role) }}
            </span>
          </td>
          <td>
            <div class="d-flex gap-2">
              <a href="{{ route('guru.siswa.edit', $user->id) }}" class="btn-edit">✏ Edit</a>
              <form action="{{ route('guru.siswa.destroy', $user->id) }}" method="POST" style="display:inline;"
                onsubmit="return confirm('Hapus pengguna ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">🗑 Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align:center; color:#6b7fa3; padding:1.5rem;">
            Tidak ada user ditemukan.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>

    <div class="pagination-wrap">
      <span>Menampilkan {{ $users->firstItem() }}–{{ $users->lastItem() }} dari {{ $users->total() }} pengguna</span>
      {{ $users->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>