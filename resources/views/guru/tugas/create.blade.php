<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Tugas — Dwira Harapan</title>
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
    .page-header { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.6rem; font-weight: 700; color: #0d2137; margin: 0; }
    .form-card { background: #ffffff; border: 1.5px solid #dce8f5; border-radius: 14px; padding: 2rem; max-width: 700px; }
    .form-label { font-size: 0.82rem; font-weight: 600; color: #1a3a52; margin-bottom: 5px; }
    .form-control, .form-select { border: 1.5px solid #a8cde8; border-radius: 10px; background: #f0f6ff; font-size: 0.875rem; color: #0d2137; padding: 0.5rem 0.9rem; transition: all 0.2s; }
    .form-control:focus, .form-select:focus { border-color: #1a6fc4; background: #fff; box-shadow: 0 0 0 3px rgba(26,111,196,0.15); }
    .form-select:disabled { background: #dde9f3; color: #7a9ab5; cursor: not-allowed; }
    textarea.form-control { resize: vertical; min-height: 120px; }
    .error-text { font-size: 0.78rem; color: #dc3545; margin-top: 4px; }
    .divider { height: 1px; background: linear-gradient(to right, transparent, #a8cde8, transparent); margin: 1.5rem 0; }
    .btn-simpan { background: #1a6fc4; color: white; border: none; border-radius: 10px; padding: 0.55rem 1.5rem; font-size: 0.875rem; font-weight: 600; transition: all 0.2s; }
    .btn-simpan:hover { background: #155da0; transform: translateY(-1px); }
    .btn-batal { background: #f0f6ff; color: #4a6380; border: 1.5px solid #a8cde8; border-radius: 10px; padding: 0.55rem 1.5rem; font-size: 0.875rem; font-weight: 600; text-decoration: none; transition: all 0.2s; }
    .btn-batal:hover { background: #dce8f5; color: #1a3a52; }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-logo-placeholder">DWIRA<br>HARAPAN</div>
  <nav style="width:100%;">
    <a href="{{ route('guru.dashboard') }}" class="nav-item-link">🏠 Dashboard</a>
    <a href="{{ route('guru.tugas.index') }}" class="nav-item-link">📋 Tugas Saya</a>
    <a href="{{ route('guru.tugas.create') }}" class="nav-item-link active">➕ Tambah Tugas</a>
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

<div class="main-content">
  <div class="page-header">
    <h1>➕ Tambah Tugas</h1>
  </div>

  <div class="form-card">
    @if($errors->any())
      <div class="alert alert-danger mb-4" style="border-radius:10px; font-size:0.85rem;">
        <ul class="mb-0 ps-3">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('guru.tugas.store') }}" method="POST">
      @csrf

      {{-- Judul --}}
      <div class="mb-3">
        <label for="judul" class="form-label">Judul Tugas</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
          class="form-control @error('judul') is-invalid @enderror"
          placeholder="Contoh: Ulangan Harian Bab 3">
        @error('judul') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Deskripsi --}}
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi / Instruksi</label>
        <textarea id="deskripsi" name="deskripsi"
          class="form-control @error('deskripsi') is-invalid @enderror"
          placeholder="Tuliskan instruksi tugas secara lengkap...">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      <div class="divider"></div>

      {{-- Mata Pelajaran --}}
      <div class="mb-3">
        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
        <select id="mata_pelajaran" name="mata_pelajaran"
          class="form-select @error('mata_pelajaran') is-invalid @enderror">
          <option value="">-- Pilih Mata Pelajaran --</option>
          @foreach($mataPelajaran as $mp)
            <option value="{{ $mp->nama }}"
              {{ old('mata_pelajaran') === $mp->nama ? 'selected' : '' }}>
              {{ $mp->nama }}
            </option>
          @endforeach
        </select>
        @error('mata_pelajaran') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Tingkat & Kelas Target --}}
      <div class="row g-3 mb-3">
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
          <label for="kelas_target" class="form-label">Kelas Target</label>
          <select id="kelas_target" name="kelas_target"
            class="form-select @error('kelas_target') is-invalid @enderror" disabled>
            <option value="">-- Pilih tingkat dulu --</option>
          </select>
          @error('kelas_target') <div class="error-text">{{ $message }}</div> @enderror
        </div>
      </div>

      {{-- Deadline --}}
      <div class="mb-4">
        <label for="deadline" class="form-label">Deadline</label>
        <input type="datetime-local" id="deadline" name="deadline" value="{{ old('deadline') }}"
          class="form-control @error('deadline') is-invalid @enderror">
        @error('deadline') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Buttons --}}
      <div class="d-flex gap-3">
        <button type="submit" class="btn-simpan">💾 Simpan Tugas</button>
        <a href="{{ route('guru.tugas.index') }}" class="btn-batal">Batal</a>
      </div>

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

  const oldKelas = "{{ old('kelas_target') }}";

  function updateKelas() {
    const tingkat = document.getElementById('tingkat').value;
    const kelasEl = document.getElementById('kelas_target');
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