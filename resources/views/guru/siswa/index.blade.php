<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Siswa — Dwira Harapan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
      background: #f0f6ff;
      min-height: 100vh;
      display: flex;
    }

    /* ================= SIDEBAR ================= */
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
      top: 0;
      left: 0;
      bottom: 0;
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

    /* ================= MAIN ================= */
    .main-content {
      margin-left: 180px;
      flex: 1;
      padding: 2rem 2.5rem;
    }

    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;

      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 12px;
    }

    .page-header h1 {
      font-size: 1.6rem;
      font-weight: 700;
      color: #0d2137;
      margin: 0;
    }

    /* ================= TABLE CARD ================= */
    .table-card {
      background: white;
      border: 1.5px solid #dce8f5;
      border-radius: 14px;
      overflow: hidden;
    }

    .table-card-header {
      padding: 1rem 1.5rem;
      border-bottom: 1.5px solid #eaf4fc;

      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
    }

    .table-card-header h5 {
      font-size: 1rem;
      font-weight: 700;
      color: #0d2137;
      margin: 0;
    }

    /* ================= SEARCH ================= */
    .search-input {
      width: 240px;

      border: 1.5px solid #a8cde8;
      border-radius: 8px;

      padding: 0.45rem 0.9rem;

      font-size: 0.85rem;
      color: #0d2137;
      background: #f0f6ff;

      outline: none;
    }

    .search-input:focus {
      border-color: #1a6fc4;
      background: #fff;
    }

    /* ================= TABLE ================= */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead th {
      font-size: 0.78rem;
      font-weight: 700;
      color: #4a6380;

      text-transform: uppercase;
      letter-spacing: 0.05em;

      padding: 0.75rem 1rem;
      background: #f5faff;

      border-bottom: 1.5px solid #dce8f5;
    }

    tbody td {
      font-size: 0.875rem;
      color: #0d2137;

      padding: 0.75rem 1rem;
      border-bottom: 1px solid #eaf4fc;

      vertical-align: middle;
    }

    tbody tr:last-child td {
      border-bottom: none;
    }

    tbody tr:hover td {
      background: #f5faff;
    }

    /* ================= BUTTON ================= */
    .btn-edit {
      background: #d1fae5;
      color: #065f46;
      border: none;

      border-radius: 6px;
      padding: 0.3rem 0.75rem;

      font-size: 0.78rem;
      font-weight: 600;

      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 4px;

      transition: all 0.2s;
    }

    .btn-edit:hover {
      background: #a7f3d0;
      color: #047857;
    }

    .btn-delete {
      background: #fee2e2;
      color: #b91c1c;
      border: none;

      border-radius: 6px;
      padding: 0.3rem 0.75rem;

      font-size: 0.78rem;
      font-weight: 600;

      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 4px;

      transition: all 0.2s;
    }

    .btn-delete:hover {
      background: #fecaca;
      color: #991b1b;
    }

    /* ================= FOOTER TABLE ================= */
    .table-footer {
      padding: 1rem 1.5rem;
      border-top: 1.5px solid #eaf4fc;

      display: flex;
      justify-content: space-between;
      align-items: center;

      font-size: 0.82rem;
      color: #4a6380;
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
      text-align: center;
      padding: 3rem;
      color: #6b8fa8;
    }

    .empty-state .empty-icon {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <div>
      <img src="{{ asset('img/logodwira.png') }}" alt="" width="150px">
    </div>
    <nav style="width:100%;">
      <a href="{{ route('guru.dashboard') }}" class="nav-item-link">🏠 Dashboard</a>
      <a href="{{ route('guru.buat-akun') }}" class="nav-item-link">➕ Tambahkan Akun</a>
      <a href="{{ route('guru.siswa.index') }}" class="nav-item-link active">👥 Data Siswa</a>
      <a href="{{ route('guru.tugas.index') }}" class="nav-item-link">📋 Tugas Saya</a>
      <a href="{{ route('guru.tugas.create') }}" class="nav-item-link">➕ Tambah Tugas</a>
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

  <div class="main-content">

    <div class="page-header">
      <h1>👥 Data Siswa</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" style="border-radius:10px; font-size:0.875rem;">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="table-card">
      <div class="table-card-header">
        <h5>Daftar Siswa</h5>
        <form method="GET" action="{{ route('guru.siswa.index') }}">
          <input
            type="text"
            name="search"
            class="search-input"
            placeholder="🔍 Cari nama, email, kelas..."
            value="{{ request('search') }}">
        </form>
      </div>

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Absen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($siswa as $i => $s)
          <tr>
            <td>{{ $siswa->firstItem() + $i }}</td>
            <td><span style="font-weight:600;">{{ $s->name }}</span></td>
            <td style="color:#4a6380;">{{ $s->email }}</td>
            <td>{{ $s->kelas ?? '-' }}</td>
            <td>{{ $s->absen ?? '-' }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('guru.siswa.edit', $s->id) }}" class="btn-edit">✏ Edit</a>
                <form action="{{ route('guru.siswa.destroy', $s->id) }}" method="POST"
                  onsubmit="return confirm('Hapus siswa {{ $s->name }}?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn-delete">🗑 Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">
              <div class="empty-state">
                <div class="empty-icon">👥</div>
                <p style="margin:0; font-size:0.875rem;">Belum ada siswa terdaftar.</p>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

      @if($siswa->hasPages())
      <div class="table-footer">
        <span>Menampilkan {{ $siswa->firstItem() }}–{{ $siswa->lastItem() }} dari {{ $siswa->total() }} siswa</span>
        {{ $siswa->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
      @endif
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>