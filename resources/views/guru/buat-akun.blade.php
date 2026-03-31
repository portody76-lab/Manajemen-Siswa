<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Akun — Dwira Harapan</title>
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

    /* ================= MAIN CONTENT ================= */
    .main-content {
      margin-left: 180px;
      flex: 1;
      padding: 2rem 3rem;
    }

    .page-header {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 2rem;
      max-width: 1100px;
      margin-left: auto;
      margin-right: auto;
    }

    .page-header h1 {
      font-size: 1.6rem;
      font-weight: 700;
      color: #0d2137;
      margin: 0;
    }

    /* ================= FORM ================= */
    .form-card {
      background: #ffffff;
      border: 1.5px solid #dce8f5;
      border-radius: 14px;
      padding: 2.5rem;
      width: 100%;
      max-width: 1100px;
      margin: 0 auto;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-full {
      grid-column: 1 / -1;
    }

    .form-label {
      font-size: 0.82rem;
      font-weight: 600;
      color: #1a3a52;
      margin-bottom: 5px;
    }

    .form-control,
    .form-select {
      border: 1.5px solid #a8cde8;
      border-radius: 10px;
      background: #f0f6ff;

      font-size: 0.875rem;
      color: #0d2137;

      padding: 0.5rem 0.9rem;
      transition: all 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #1a6fc4;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(26, 111, 196, 0.15);
    }

    .form-select:disabled {
      background: #dde9f3;
      color: #7a9ab5;
      cursor: not-allowed;
    }

    .error-text {
      font-size: 0.78rem;
      color: #dc3545;
      margin-top: 4px;
    }

    .divider {
      height: 1px;
      background: linear-gradient(to right, transparent, #a8cde8, transparent);
      margin: 1.5rem 0;
    }

    /* ================= BUTTON ================= */
    .btn-simpan {
      background: #1a6fc4;
      color: white;
      border: none;

      border-radius: 10px;
      padding: 0.55rem 1.5rem;

      font-size: 0.875rem;
      font-weight: 600;

      transition: all 0.2s;
    }

    .btn-simpan:hover {
      background: #155da0;
      transform: translateY(-1px);
    }

    .btn-batal {
      background: #f0f6ff;
      color: #4a6380;

      border: 1.5px solid #a8cde8;
      border-radius: 10px;

      padding: 0.55rem 1.5rem;

      font-size: 0.875rem;
      font-weight: 600;

      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-batal:hover {
      background: #dce8f5;
      color: #1a3a52;
    }

    /* ================= ROLE TOGGLE ================= */
    .role-toggle {
      display: flex;
      gap: 10px;
      margin-bottom: 0;
    }

    .role-btn {
      flex: 1;
      padding: 0.65rem;

      border: 1.5px solid #a8cde8;
      border-radius: 10px;
      background: #f0f6ff;

      color: #4a6380;
      font-size: 0.875rem;
      font-weight: 600;

      cursor: pointer;
      text-align: center;
      transition: all 0.2s;
    }

    .role-btn:hover {
      border-color: #1a6fc4;
      color: #1a6fc4;
    }

    .role-btn.active-guru {
      background: #1a6fc4;
      border-color: #1a6fc4;
      color: white;
    }

    .role-btn.active-siswa {
      background: #059669;
      border-color: #059669;
      color: white;
    }

    /* ================= SISWA FIELD ================= */
    .siswa-only {
      display: none;
    }

    .siswa-only.show {
      display: block;
    }

    .siswa-only-row {
      display: none;
    }

    .siswa-only-row.show {
      display: flex;
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
      <a href="{{ route('guru.buat-akun') }}" class="nav-item-link active">➕ Tambahkan Akun</a>
      <a href="{{ route('guru.siswa.index') }}" class="nav-item-link">👥 Data Siswa</a>
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
      <h1>🧑‍💼 Buat Akun</h1>
    </div>

    <div class="form-card">

      @if(session('success'))
      <div class="alert alert-success mb-4" style="border-radius:10px; font-size:0.85rem;">
        ✅ {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger mb-4" style="border-radius:10px; font-size:0.85rem;">
        <ul class="mb-0 ps-3">
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ route('guru.buat-akun.store') }}" method="POST">
        @csrf

        {{-- Role Toggle --}}
        <div class="form-grid">
          <div class="mb-3">
            <label class="form-label">Role Akun</label>
            <div class="role-toggle">
              <div class="role-btn active-guru" id="btnGuru" onclick="setRole('guru')">
                👨‍🏫 Guru
              </div>
              <div class="role-btn" id="btnSiswa" onclick="setRole('siswa')">
                👨‍🎓 Siswa
              </div>
            </div>
            <input type="hidden" name="role" id="roleInput" value="{{ old('role', 'guru') }}">
            @error('role') <div class="error-text">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="divider"></div>

        {{-- Nama --}}
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="Nama lengkap">
          @error('name') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="email@example.com">
          @error('email') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Minimal 8 karakter">
          @error('password') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation"
            class="form-control"
            placeholder="Ulangi password">
        </div>

        {{-- Field khusus Siswa --}}
        <div id="siswaFields">
          <div class="divider siswa-only" id="dividerSiswa"></div>

          {{-- Absen --}}
          <div class="mb-3 siswa-only" id="fieldAbsen">
            <label for="absen" class="form-label">Nomor Absen</label>
            <input type="number" id="absen" name="absen" value="{{ old('absen') }}"
              class="form-control @error('absen') is-invalid @enderror"
              placeholder="Contoh: 12">
            @error('absen') <div class="error-text">{{ $message }}</div> @enderror
          </div>

          {{-- Tingkat & Kelas --}}
          <div class="row g-3 mb-3 siswa-only-row" id="fieldKelas">
            <div class="col-md-4">
              <label for="tingkat" class="form-label">Tingkat</label>
              <select id="tingkat" class="form-select" onchange="updateKelas()">
                <option value="">-- Pilih --</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
              </select>
            </div>
            <div class="col-md-8">
              <label for="kelas" class="form-label">Kelas</label>
              <select id="kelas" name="kelas"
                class="form-select @error('kelas') is-invalid @enderror" disabled>
                <option value="">-- Pilih tingkat dulu --</option>
              </select>
              @error('kelas') <div class="error-text">{{ $message }}</div> @enderror
            </div>
          </div>
        </div>

        {{-- Buttons --}}
        <div class="d-flex gap-3 mt-2 form-full">
          <button type="submit" class="btn-simpan">💾 Buat Akun</button>
          <a href="{{ route('guru.dashboard') }}" class="btn-batal">Batal</a>
        </div>

      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const kelasList = {
      'X': ['PH 1', 'PH 2', 'PH 3', 'KULINER 1', 'KULINER 2', 'KULINER 3', 'TKC 1', 'TKC 2', 'PPLG 1', 'PPLG 2'],
      'XI': ['PH 1', 'KULINER 1', 'KULINER 2', 'TKC 1', 'PPLG 1', 'PPLG 2'],
      'XII': ['PH 1', 'PH 2', 'KULINER 1', 'KULINER 2', 'KULINER 3', 'TKC 1', 'TKC 2', 'PPLG 1']
    };

    function setRole(role) {
      document.getElementById('roleInput').value = role;

      const btnGuru = document.getElementById('btnGuru');
      const btnSiswa = document.getElementById('btnSiswa');

      // Reset buttons
      btnGuru.className = 'role-btn';
      btnSiswa.className = 'role-btn';

      if (role === 'guru') {
        btnGuru.classList.add('active-guru');
        // Sembunyikan field siswa
        document.querySelectorAll('.siswa-only').forEach(el => el.classList.remove('show'));
        document.querySelectorAll('.siswa-only-row').forEach(el => el.classList.remove('show'));
      } else {
        btnSiswa.classList.add('active-siswa');
        // Tampilkan field siswa
        document.querySelectorAll('.siswa-only').forEach(el => el.classList.add('show'));
        document.querySelectorAll('.siswa-only-row').forEach(el => el.classList.add('show'));
      }
    }

    function updateKelas() {
      const tingkat = document.getElementById('tingkat').value;
      const kelasEl = document.getElementById('kelas');
      kelasEl.innerHTML = '';
      if (!tingkat) {
        kelasEl.disabled = true;
        kelasEl.innerHTML = '<option value="">-- Pilih tingkat dulu --</option>';
        return;
      }
      kelasEl.disabled = false;
      kelasEl.innerHTML = '<option value="">-- Pilih kelas --</option>';
      kelasList[tingkat].forEach(function(k) {
        const val = tingkat + ' ' + k;
        const opt = document.createElement('option');
        opt.value = val;
        opt.text = k;
        kelasEl.appendChild(opt);
      });
    }

    // Restore state saat validasi gagal
    document.addEventListener('DOMContentLoaded', function() {
      const oldRole = "{{ old('role', 'guru') }}";
      const oldKelas = "{{ old('kelas') }}";

      setRole(oldRole);

      if (oldKelas) {
        const tingkat = oldKelas.split(' ')[0];
        document.getElementById('tingkat').value = tingkat;
        updateKelas();
        document.getElementById('kelas').value = oldKelas;
      }
    });
  </script>
</body>

</html>