<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa — Dwira Harapan</title>
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
    .form-card { background: #ffffff; border: 1.5px solid #dce8f5; border-radius: 14px; padding: 2rem; max-width: 600px; }
    .info-box { background: #eaf4fc; border: 1.5px solid #a8cde8; border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.82rem; color: #1a3a52; margin-bottom: 1.5rem; }
    .info-box span { font-weight: 600; color: #1a6fc4; }
    .form-label { font-size: 0.82rem; font-weight: 600; color: #1a3a52; margin-bottom: 5px; }
    .form-control, .form-select { border: 1.5px solid #a8cde8; border-radius: 10px; background: #f0f6ff; font-size: 0.875rem; color: #0d2137; padding: 0.5rem 0.9rem; transition: all 0.2s; }
    .form-control:focus, .form-select:focus { border-color: #1a6fc4; background: #fff; box-shadow: 0 0 0 3px rgba(26,111,196,0.15); }
    .form-select:disabled { background: #dde9f3; color: #7a9ab5; cursor: not-allowed; }
    .error-text { font-size: 0.78rem; color: #dc3545; margin-top: 4px; }
    .divider { height: 1px; background: linear-gradient(to right, transparent, #a8cde8, transparent); margin: 1.5rem 0; }
    .btn-simpan { background: #1a6fc4; color: white; border: none; border-radius: 10px; padding: 0.55rem 1.5rem; font-size: 0.875rem; font-weight: 600; transition: all 0.2s; }
    .btn-simpan:hover { background: #155da0; transform: translateY(-1px); }
    .btn-batal { background: #f0f6ff; color: #4a6380; border: 1.5px solid #a8cde8; border-radius: 10px; padding: 0.55rem 1.5rem; font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: all 0.2s; }
    .btn-batal:hover { background: #dce8f5; color: #1a3a52; }
    .btn-hapus { background: #fee2e2; color: #b91c1c; border: none; border-radius: 10px; padding: 0.55rem 1.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: all 0.2s; }
    .btn-hapus:hover { background: #fecaca; color: #991b1b; }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-logo-placeholder">DWIRA<br>HARAPAN</div>
  <nav style="width:100%;">
    <a href="{{ route('guru.dashboard') }}" class="nav-item-link">🏠 Dashboard</a>
    <a href="{{ route('guru.tugas.index') }}" class="nav-item-link">📋 Tugas Saya</a>
    <a href="{{ route('guru.tugas.create') }}" class="nav-item-link">➕ Tambah Tugas</a>
    <a href="{{ route('guru.siswa.index') }}" class="nav-item-link active">👥 Data Siswa</a>
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
    <h1>✏️ Edit Siswa</h1>
    <a href="{{ route('guru.siswa.index') }}" class="btn-batal">← Kembali</a>
  </div>

  <div class="form-card">

    <div class="info-box">
      ✏️ Mengedit data siswa: <span>{{ $siswa->name }}</span>
    </div>

    @if($errors->any())
      <div class="alert alert-danger mb-4" style="border-radius:10px; font-size:0.85rem;">
        <ul class="mb-0 ps-3">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('guru.siswa.update', $siswa->id) }}" method="POST">
      @csrf
      @method('PUT')

      {{-- Nama --}}
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name"
          value="{{ old('name', $siswa->name) }}"
          class="form-control @error('name') is-invalid @enderror"
          placeholder="Nama lengkap siswa">
        @error('name') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email"
          value="{{ old('email', $siswa->email) }}"
          class="form-control @error('email') is-invalid @enderror"
          placeholder="email@example.com">
        @error('email') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      <div class="divider"></div>

      {{-- Absen --}}
      <div class="mb-3">
        <label for="absen" class="form-label">Nomor Absen</label>
        <input type="number" id="absen" name="absen"
          value="{{ old('absen', $siswa->absen) }}"
          class="form-control @error('absen') is-invalid @enderror"
          placeholder="Contoh: 12">
        @error('absen') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Tingkat & Kelas --}}
      <div class="row g-3 mb-4">
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

      {{-- Buttons --}}
      <div class="d-flex gap-3 flex-wrap">
        <button type="submit" class="btn-simpan">💾 Simpan Perubahan</button>
        <a href="{{ route('guru.siswa.index') }}" class="btn-batal">Batal</a>
      </div>

    </form>

    {{-- Hapus Siswa --}}
    <div class="divider"></div>
    <form action="{{ route('guru.siswa.destroy', $siswa->id) }}" method="POST"
      onsubmit="return confirm('Yakin ingin menghapus siswa {{ $siswa->name }}?')">
      @csrf @method('DELETE')
      <button type="submit" class="btn-hapus">🗑 Hapus Siswa Ini</button>
    </form>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const kelasList = {
    'X':   ['PH 1','PH 2','PH 3','KULINER 1','KULINER 2','KULINER 3','TKC 1','TKC 2','PPLG 1','PPLG 2'],
    'XI':  ['PH 1','KULINER 1','KULINER 2','TKC 1','PPLG 1','PPLG 2'],
    'XII': ['PH 1','PH 2','KULINER 1','KULINER 2','KULINER 3','TKC 1','TKC 2','PPLG 1']
  };

  const oldKelas = "{{ old('kelas', $siswa->kelas) }}";

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
      opt.value = val; opt.text = k;
      if (oldKelas === val) opt.selected = true;
      kelasEl.appendChild(opt);
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    if (!oldKelas) return;
    const tingkat = oldKelas.split(' ')[0];
    document.getElementById('tingkat').value = tingkat;
    updateKelas();
  });
</script>
</body>
</html>